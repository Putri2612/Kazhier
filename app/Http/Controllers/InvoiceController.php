<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use App\Models\ActivityLog;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\CustomField;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\InvoiceProduct;
use App\Mail\CustomerInvoiceSend;
use App\Mail\InvoicePaymentCreate;
use App\Mail\InvoiceSend;
use App\Mail\PaymentReminder;
use App\Models\Milestone;
use App\Models\PaymentMethod;
use App\Models\Products;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\Task;
use App\Models\Transaction;
use App\Models\Utility;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    use CanManageBalance, CanProcessNumber, CanRedirect;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['invoice']]);
    }

    public function index(Request $request)
    {
        if(Auth::user()->can('manage invoice'))
        {

            $customer = Customer::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend(__('All'), '');

            $status = [];
            // foreach (Invoice::$statuses as $stat) {
            //     $status[] = __($stat);
            // }

            $query = Invoice::with(['customer', 'category'])->where('created_by', '=', Auth::user()->creatorId());

            if(!empty($request->customer))
            {
                $query->where('id', '=', $request->customer);
            }
            if(!empty($request->issue_date))
            {
                $date_range = explode(' - ', $request->issue_date);
                $query->whereBetween('issue_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $invoices = $query->get();

            return view('invoice.index', compact('invoices', 'customer', 'status'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function create()
    {

        if(Auth::user()->can('create invoice'))
        {
            $customFields       = CustomField::where('module', '=', 'invoice')->get();
            $invoice_number     = Auth::user()->invoiceNumberFormat($this->invoiceNumber());
            $customers          = Customer::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customers->prepend(__('Select Customer'), '');
            $category           = ProductServiceCategory::where('created_by', Auth::user()->creatorId())->where('type', 1)->get()->pluck('name', 'id');
            $category->prepend(__('Select Category'), '');
            $product_services   = ProductService::where('created_by', Auth::user()->creatorId())->where('quantity', '>', 0)->get()->pluck('name', 'id');

            $category           = $category->union(['new.product-category' => __('Create new category')]);
            $customers          = $customers->union(['new.customer' => __('Add new customer')]);
            $product_services   = $product_services->union(['new.productservice' => __('Create new product / service')]);
            $type        = Utility::settings();
            $type        = isset($type['invoice_type']) ? $type['invoice_type'] : 0;

            return view('invoice.create', compact('customers', 'invoice_number', 'product_services', 'category', 'customFields', 'type'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function customer(Request $request)
    {
        $customer = Customer::where('id', '=', $request->id)->where('created_by', Auth::user()->creatorId())->first();

        return response()->json(['view' => view('invoice.customer_detail', compact('customer'))->render(), 'category' => $customer->category]) ;
    }

    public function product(Request $request)
    {

        // $taxPaidByUser = $request->has('paid_by_user') && $request->input('paid_by_user') == 'true';
        $taxPaidByUser = true;

        $data['product']     = $product = ProductService::find($request->product_id);
        $data['unit']        = $product->unit ? $product->unit->name : '';
        $data['taxRate']     = $taxRate = ($product->taxes) ? $product->taxes->rate : 0;
        $salePrice           = $product->sale_price;
        $quantity            = $product->quantity > 0 ? 1 : 0;
        $data['stock']       = $product->quantity;
        $taxPrice            = ($taxRate / 100) * ($salePrice * $quantity);
        $product->sale_price = $this->FloatToReadableNumber($salePrice);
        $product->purchase_price = $this->FloatToReadableNumber($product->purchase_price);
        $data['totalAmount'] = $this->FloatToReadableNumber(($salePrice * $quantity) + ($taxPaidByUser ? $taxPrice : 0));

        return json_encode($data);
    }

    public function productBySKU(Request $request)
    {

        // $taxPaidByUser = $request->has('paid_by_user') && $request->input('paid_by_user') == 'true';
        $taxPaidByUser = true;

        $data['product']     = $product = ProductService::where('sku', $request->input('sku'))->where('created_by', Auth::user()->creatorId())->first();
        $data['unit']        = $product->unit ? $product->unit->name : '';
        $data['taxRate']     = $taxRate = ($product->taxes) ? $product->taxes->rate : 0;
        $salePrice           = $product->sale_price;
        $quantity            = $product->quantity > 0 ? 1 : 0;
        $data['stock']       = $product->quantity;
        $taxPrice            = ($taxRate / 100) * ($salePrice * $quantity);
        $product->sale_price = $this->FloatToReadableNumber($salePrice);
        $product->purchase_price = $this->FloatToReadableNumber($product->purchase_price);
        $data['totalAmount'] = $this->FloatToReadableNumber(($salePrice * $quantity) + ($taxPaidByUser ? $taxPrice : 0));

        return json_encode($data);
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create invoice'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'customer_id' => 'required',
                                   'issue_date' => 'required',
                                   'due_date' => 'required',
                                   'category_id' => 'required',
                                   'items' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $invoice                 = new Invoice();
            $invoice->invoice_id     = $this->invoiceNumber();
            $invoice->customer_id    = $request->input('customer_id');
            $invoice->status         = 0;
            $invoice->type           = $request->input('type');
            $invoice->issue_date     = $request->input('issue_date');
            $invoice->due_date       = $request->input('due_date');
            $invoice->category_id    = $request->input('category_id');
            $invoice->ref_number     = $request->input('ref_number');
            $invoice->discount_apply = $request->input('discount_apply') !== null ? 1 : 0;
            $invoice->customer_tax   = $request->has('customer_tax');
            $invoice->created_by     = Auth::user()->creatorId();
            $invoice->served_by      = Auth::user()->id;
            $invoice->save();
            CustomField::saveData($invoice, $request->input('customField'));
            $products = $request->input('items');

            foreach($products as $product) {
                $quantity   = $this->ReadableNumberToFloat($product['quantity']);
                $tax        = $this->ReadableNumberToFloat($product['tax']);
                $discount   = isset($product['discount']) ? $this->ReadableNumberToFloat($product['discount']) : 0;
                $price      = $this->ReadableNumberToFloat($product['price']);

                $item = ProductService::find($product['item']);
                $item->quantity -= $quantity;
                $item->save();
                
                $invoiceProduct             = new InvoiceProduct();
                $invoiceProduct->invoice_id = $invoice->id;
                $invoiceProduct->product_id = $product['item'];
                $invoiceProduct->quantity   = $quantity;
                $invoiceProduct->tax        = $tax;
                $invoiceProduct->discount   = $discount;
                $invoiceProduct->price      = $price;
                $invoiceProduct->save();
            }

            $message = __('Invoice successfully created.');

            $settings = Utility::settings();
            if((!isset($settings['invoice_automail']) || $settings['invoice_automail']) && Auth::user()->can('send invoice')) {
                $invoice->send_date = date('Y-m-d');
                $invoice->status    = 1;
                $invoice->save();
    
                $customer         = Customer::where('id', $invoice->customer_id)->first();
                $invoice->name    = !empty($customer) ? $customer->name : '';
                $invoice->invoice = Auth::user()->invoiceNumberFormat($invoice->invoice_id);
    
                $invoiceId    = Crypt::encrypt($invoice->id);
                $invoice->url = route('invoice.pdf', $invoiceId);
    
                if($customer->email){
                    try {
                        Mail::to($customer->email)->send(new InvoiceSend($invoice));
                    } catch(Exception $e) {
                        $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                    }
                }
            } else if(isset($settings['invoice_automail']) && !$settings['invoice_automail']) {
                $message .= ' '.__('Please manually send the invoice to customer.');
            } else if (!Auth::user()->can('send invoice')) {
                $message .= ' '.__('Invoice cannot be sent because user does not have the permission to do it.');
            }

            return redirect()->route('invoice.index', $invoice->id)->with('success', $message);
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function edit(Invoice $invoice)
    {
        if(Auth::user()->can('edit invoice'))
        {
            $invoice_number = Auth::user()->invoiceNumberFormat($invoice->invoice_id);
            $customers      = Customer::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $category       = ProductServiceCategory::where('created_by', Auth::user()->creatorId())->where('type', 1)->get()->pluck('name', 'id');
            $category->prepend(__('Select Category'), '');
            $product_services = ProductService::where('created_by', Auth::user()->creatorId())->where('quantity', '>', 0)->get()->pluck('name', 'id');

            $invoice->customField = CustomField::getData($invoice, 'invoice');
            $customFields         = CustomField::where('module', '=', 'invoice')->get();

            $category           = $category->union(['new.product-category' => __('Create new category')]);
            $customers          = $customers->union(['new.customer' => __('Add new customer')]);
            $product_services   = $product_services->union(['new.productservice' => __('Create new product / service')]);

            return view('invoice.edit', compact('customers', 'product_services', 'invoice', 'invoice_number', 'category', 'customFields'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Invoice $invoice)
    {

        if(Auth::user()->can('edit invoice'))
        {
            if($invoice->created_by == Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'customer_id' => 'required',
                                       'issue_date' => 'required',
                                       'due_date' => 'required',
                                       'category_id' => 'required',
                                       'items' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('invoice.edit', $invoice->id)->with('error', $messages->first());
                }

                $products = $request->input('items');
                $checkStock = ProductService::where('created_by', Auth::user()->creatorId())->whereIn('id', collect($products)->pluck('item'))->where('quantity', 0)->count();
                if($checkStock) {
                    return redirect()->back()->with('error', __('Empty stock'));
                }

                $invoice->customer_id    = $request->input('customer_id');
                $invoice->issue_date     = $request->input('issue_date');
                $invoice->due_date       = $request->input('due_date');
                $invoice->ref_number     = $request->input('ref_number');
                $invoice->discount_apply = $request->input('discount_apply') !== null ? 1 : 0;
                $invoice->category_id    = $request->input('category_id');
                $invoice->customer_tax   = $request->has('customer_tax');
                $invoice->save();
                CustomField::saveData($invoice, $request->input('customField'));

                $removedProduct = InvoiceProduct::where('invoice_id', $invoice->id)->whereNotIn('product_id', collect($products)->pluck('item'))->get();
                foreach($removedProduct as $product) {
                    $item = ProductService::find($product->product_id);
                    if(!empty($item)) {
                        $item->quantity += $product->quantity;
                        $item->save();
                    }
                    $product->delete();
                }

                foreach($products as $product) {
                    $quantity   = $this->ReadableNumberToFloat($product['quantity']);
                    $tax        = $this->ReadableNumberToFloat($product['tax']);
                    $discount   = isset($product['discount']) ? $this->ReadableNumberToFloat($product['discount']) : 0;
                    $price      = $this->ReadableNumberToFloat($product['price']);

                    $stockChange = $quantity;

                    $invoiceProduct = InvoiceProduct::find($product['id']);
                    if($invoiceProduct == null)
                    {
                        $invoiceProduct             = new InvoiceProduct();
                        $invoiceProduct->invoice_id = $invoice->id;
                    } else {
                        $stockChange -= $invoiceProduct->quantity;
                    }

                    $item = ProductService::find($product['item']);
                    $item->quantity -= $stockChange;
                    $item->save();

                    $invoiceProduct->product_id = $product['item'];
                    $invoiceProduct->quantity   = $quantity;
                    $invoiceProduct->tax        = $tax;
                    $invoiceProduct->discount   = $discount;
                    $invoiceProduct->price      = $price;
                    $invoiceProduct->save();
                }

                return redirect()->back()->with('success', __('Invoice successfully updated.'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    function invoiceNumber()
    {
        $latest = Invoice::where('created_by', '=', Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->invoice_id + 1;
    }

    public function show(Invoice $invoice)
    {
        if(Auth::user()->can('show invoice'))
        {
            if($invoice->created_by == Auth::user()->creatorId())
            {
                $invoicePayment = InvoicePayment::where('invoice_id', $invoice->id)->first();

                $customer = $invoice->customer;
                $iteams   = $invoice->items;

                return view('invoice.view', compact('invoice', 'customer', 'iteams', 'invoicePayment'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function destroy(Invoice $invoice)
    {
        if(Auth::user()->can('delete invoice'))
        {
            if($invoice->created_by == Auth::user()->creatorId())
            {
                $invoice->delete();
                InvoiceProduct::where('invoice_id', '=', $invoice->id)->delete();

                return redirect()->route('invoice.index')->with('success', __('Invoice successfully deleted.'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function productDestroy(Request $request)
    {

        if(Auth::user()->can('delete invoice product'))
        {
            InvoiceProduct::where('id', '=', $request->id)->delete();

            return redirect()->back()->with('success', __('Bill product successfully deleted.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function customerInvoice(Request $request)
    {
        if(Auth::user()->can('manage customer invoice'))
        {

            $status = Invoice::$statuses;

            $query = Invoice::where('customer_id', '=', Auth::user()->id)->where('status', '!=', '0')->where('created_by', Auth::user()->creatorId());

            if(!empty($request->issue_date))
            {
                $date_range = explode(' - ', $request->issue_date);
                $query->whereBetween('issue_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $invoices = $query->get();

            return view('invoice.index', compact('invoices', 'status'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function customerInvoiceShow($invoice_id)
    {
        if(Auth::user()->can('show invoice'))
        {
            $invoice = Invoice::where('id', $invoice_id)->first();
            if($invoice->created_by == Auth::user()->creatorId())
            {
                $customer = $invoice->customer;
                $iteams   = $invoice->items;

                return view('invoice.view', compact('invoice', 'customer', 'iteams'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function sent($id)
    {
        if(Auth::user()->can('send invoice'))
        {
            $invoice            = Invoice::where('id', $id)->first();
            $invoice->send_date = date('Y-m-d');
            $invoice->status    = 1;
            $invoice->save();

            $customer         = Customer::where('id', $invoice->customer_id)->first();
            $invoice->name    = !empty($customer) ? $customer->name : '';
            $invoice->invoice = Auth::user()->invoiceNumberFormat($invoice->invoice_id);

            $invoiceId    = Crypt::encrypt($invoice->id);
            $invoice->url = route('invoice.pdf', $invoiceId);

            if($customer->email){
                try
                {
                    Mail::to($customer->email)->send(new InvoiceSend($invoice));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }
            }

            return redirect()->back()->with('success', __('Invoice successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function customerInvoiceSend($invoice_id)
    {
        return view('customer.invoice_send', compact('invoice_id'));
    }

    public function customerInvoiceSendMail(Request $request, $invoice_id)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'email' => 'required|email',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $email   = $request->email;
        $invoice = Invoice::where('id', $invoice_id)->first();

        $customer         = Customer::where('id', $invoice->customer_id)->first();
        $invoice->name    = !empty($customer) ? $customer->name : '';
        $invoice->invoice = Auth::user()->invoiceNumberFormat($invoice->invoice_id);

        $invoiceId    = Crypt::encrypt($invoice->id);
        $invoice->url = route('invoice.pdf', $invoiceId);

        try
        {
            Mail::to($email)->send(new CustomerInvoiceSend($invoice));
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Invoice successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));

    }

    public function shippingDisplay(Request $request, $id)
    {
        $invoice = Invoice::find($id);

        if($request->is_display == 'true')
        {
            $invoice->shipping_display = 1;
        }
        else
        {
            $invoice->shipping_display = 0;
        }
        $invoice->save();

        return redirect()->back()->with('success', __('Shipping address status successfully changed.'));
    }

    public function duplicate($invoice_id)
    {
        if(Auth::user()->can('duplicate invoice'))
        {
            $invoice                            = Invoice::where('id', $invoice_id)->first();
            $duplicateInvoice                   = new Invoice();
            $duplicateInvoice->invoice_id       = $this->invoiceNumber();
            $duplicateInvoice->customer_id      = $invoice['customer_id'];
            $duplicateInvoice->issue_date       = date('Y-m-d');
            $duplicateInvoice->due_date         = $invoice['due_date'];
            $duplicateInvoice->send_date        = null;
            $duplicateInvoice->category_id      = $invoice['category_id'];
            $duplicateInvoice->ref_number       = $invoice['ref_number'];
            $duplicateInvoice->status           = 0;
            $duplicateInvoice->shipping_display = $invoice['shipping_display'];
            $duplicateInvoice->created_by       = $invoice['created_by'];
            $duplicateInvoice->served_by        = $invoice['served_by'];
            $duplicateInvoice->save();

            if($duplicateInvoice)
            {
                $invoiceProduct = InvoiceProduct::where('invoice_id', $invoice_id)->get();
                foreach($invoiceProduct as $product)
                {
                    $duplicateProduct             = new InvoiceProduct();
                    $duplicateProduct->invoice_id = $duplicateInvoice->id;
                    $duplicateProduct->product_id = $product->product_id;
                    $duplicateProduct->quantity   = $product->quantity;
                    $duplicateProduct->tax        = $product->tax;
                    $duplicateProduct->discount   = $product->discount;
                    $duplicateProduct->price      = $product->price;
                    $duplicateProduct->save();
                }
            }

            return redirect()->back()->with('success', __('Invoice duplicate successfully.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function previewInvoice($template, $color)
    {
        $objUser  = Auth::user();
        $settings = Utility::settings();
        $invoice  = new Invoice();

        $customer                   = new \stdClass();
        $customer->email            = '<Email>';
        $customer->shipping_name    = '<Customer Name>';
        $customer->shipping_country = '<Country>';
        $customer->shipping_state   = '<State>';
        $customer->shipping_city    = '<City>';
        $customer->shipping_phone   = '<Customer Phone Number>';
        $customer->shipping_zip     = '<Zip>';
        $customer->shipping_address = '<Address>';
        $customer->billing_name     = '<Customer Name>';
        $customer->billing_country  = '<Country>';
        $customer->billing_state    = '<State>';
        $customer->billing_city     = '<City>';
        $customer->billing_phone    = '<Customer Phone Number>';
        $customer->billing_zip      = '<Zip>';
        $customer->billing_address  = '<Address>';

        $items = [];
        for($i = 1; $i <= 3; $i++)
        {
            $item           = new \stdClass();
            $item->name     = 'Item ' . $i;
            $item->quantity = 1;
            $item->tax      = 5;
            $item->discount = 50;
            $item->price    = 100;
            $items[]        = $item;
        }

        $invoice->invoice_id = 1;
        $invoice->issue_date = date('Y-m-d H:i:s');
        $invoice->due_date   = date('Y-m-d H:i:s');
        $invoice->items      = $items;


        $preview = 1;
        $color   = '#' . $color;

        $logo         = asset(Storage::url('logo/'));
        $company_logo = Utility::getValByName('company_logo');
        $img          = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png'));

        return view('invoice.templates.' . $template, compact('invoice', 'preview', 'color', 'img', 'settings', 'customer'));
    }

    public function invoice($invoice_id)
    {
        $settings = Utility::settings();

        $invoiceId = Crypt::decrypt($invoice_id);
        $invoice   = Invoice::where('id', $invoiceId)->first();

        $data  = DB::table('settings');
        $data  = $data->where('created_by', '=', $invoice->created_by);
        $data1 = $data->get();

        foreach($data1 as $row)
        {
            $settings[$row->name] = $row->value;
        }

        $customer = $invoice->customer;
        $items    = [];
        foreach($invoice->items as $product)
        {
            $item           = new \stdClass();
            $item->name     = !empty($product->product) ? $product->product->name : '';
            $item->quantity = $product->quantity;
            $item->tax      = $product->tax;
            $item->discount = $product->discount;
            $item->price    = $product->price;
            $items[]        = $item;
        }

        $invoice->items = $items;

        //Set your logo
        $logo         = asset(Storage::url('logo/'));
        $company_logo = Utility::getValByName('company_logo');
        $img          = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png'));

        if($invoice)
        {
            $color = '#' . $settings['invoice_color'];

            return view('invoice.templates.' . $settings['invoice_template'], compact('invoice', 'color', 'settings', 'customer', 'img'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function thermal($invoice_id) {
        $settings = Utility::settings();

        $invoiceId = Crypt::decrypt($invoice_id);
        $invoice   = Invoice::where('id', $invoiceId)->first();

        $data  = DB::table('settings');
        $data  = $data->where('created_by', '=', $invoice->created_by);
        $data1 = $data->get();

        foreach($data1 as $row)
        {
            $settings[$row->name] = $row->value;
        }

        $customer = $invoice->customer;
        $items    = [];
        foreach($invoice->items as $product)
        {
            $item           = new \stdClass();
            $item->name     = !empty($product->product) ? $product->product->name : '';
            $item->quantity = $product->quantity;
            $item->tax      = $product->tax;
            $item->discount = $product->discount;
            $item->price    = $product->price;
            $items[]        = $item;
        }

        $invoice->items = $items;

        //Set your logo
        $logo         = asset(Storage::url('logo/'));
        $company_logo = Utility::getValByName('company_logo');
        $img          = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png'));

        if($invoice)
        {
            $color = '#' . $settings['invoice_color'];

            return view('invoice.templates.thermal', compact('invoice', 'color', 'settings', 'customer', 'img'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function saveTemplateSettings(Request $request)
    {
        $post = $request->all();
        unset($post['_token']);

        if(isset($post['invoice_template']) && (!isset($post['invoice_color']) || empty($post['invoice_color'])))
        {
            $post['invoice_color'] = "ffffff";
        }
        if(!isset($post['invoice_automail'])) {
            $post['invoice_automail'] = false;
        } else {
            $post['invoice_automail'] = true;
        }

        foreach($post as $key => $data)
        {
            \DB::insert(
                'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                             $data,
                                                                                                                                             $key,
                                                                                                                                             Auth::user()->creatorId(),
                                                                                                                                         ]
            );
        }

        return redirect()->back()->with('success', __('Invoice Setting updated successfully'));
    }

    public function export() {
        return Excel::download(new InvoiceExport, 'invoices.xlsx');
    }
}
