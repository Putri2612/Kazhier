<?php

namespace App\Http\Controllers;

use App\Classes\Helper;
use App\Classes\Pagination;
use App\Models\BankAccount;
use App\Models\Bill;
use App\Models\BillPayment;
use App\Models\BillProduct;
use App\Models\CustomField;
use App\Mail\BillPaymentCreate;
use App\Mail\BillSend;
use App\Mail\VenderBillSend;
use App\Models\PaymentMethod;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceStockChange;
use App\Models\Transaction;
use App\Models\Utility;
use App\Models\Vender;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    use CanManageBalance, CanProcessNumber, CanRedirect, ApiResponse;

    public function index(Request $request)
    {
        if(\Auth::user()->can('manage bill'))
        {
            $creatorId = Auth::user()->creatorId();

            $vender = Vender::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
            $vender->prepend(__('All'), '');

            $status = [];
            foreach(Bill::$statuses as $stat) {
                $status[] = __($stat);
            }

            $query = Bill::with(['vender', 'category'])->where('created_by', '=', $creatorId);
            if(!empty($request->vender))
            {
                $query->where('id', '=', $request->vender);
            }
            if(!empty($request->bill_date))
            {
                $date_range = explode(' - ', $request->bill_date);
                $query->whereBetween('bill_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $bills = $query->get();

            return view('bill.index', compact('bills', 'vender', 'status'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage bill')) {
            return $this->UnauthorizedResponse();
        }
        
        $validator = Validator::make($request->all(), [
            'page'          => 'nullable|numeric',
            'limit'         => 'nullable|numeric',
            'issue_date'    => 'nullable|regex:/^[\d\-\s]*/i',
            'vender'        => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query = Bill::where('created_by', Auth::user()->creatorId());
        
        if(!empty($request->input('bill_date')))
        {
            $date_range = explode(' - ', $request->input('bill_date'));
            $query->whereBetween('bill_date', $date_range);
        }

        if(!empty($request->input('vender')))
        {
            $query->where('vender_id', '=', $request->input('vender'));
        }
        $page = Pagination::getTotalPage($query, $request);
        if($page === false) {
            return $this->NotFoundResponse();
        }

        $bills = $query->with(['vender:id,name', 'category:id,name'])
            ->select('id', 'bill_id', 'bill_date', 'due_date', 'vender_id', 'status', 'category_id')
            ->where('created_by', Auth::user()->creatorId())
            ->orderBy('bill_date', 'desc')
            ->orderBy('bill_id', 'desc')
            ->skip($page['skip'])->take($page['limit'])
            ->get();

        if($bills->isEmpty()) {
            return $this->NotFoundResponse();
        }
        foreach ($bills as $bill) {
            $bill->bill_number  = $bill->billNumber();
            $bill->status       = $bill->getStatus();
        }
        return $this->PaginationSuccess($bills, $page['totalPage']);
    }

    public function create()
    {

        if(\Auth::user()->can('create bill'))
        {
            $creatorId = Auth::user()->creatorId();
            $customFields   = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'bill')->get();
            $category       = ProductServiceCategory::where('created_by', $creatorId)->where('type', 2)->get()->pluck('name', 'id');
            $category->prepend(__('Select Category'), '');
            $category       = $category->union(['new.product-category' => __('Create new category')]);

            $bill_number    = \Auth::user()->billNumberFormat($this->billNumber());
            $venders        = Vender::where('created_by', $creatorId)->get()->pluck('name', 'id');
            $venders->prepend(__('Select Vender'), '');
            $venders        = $venders->union(['new.vender' => __('Create new vender')]);

            $product_services   = ProductService::where('created_by', $creatorId)->get()->pluck('name', 'id');
            $product_services   = $product_services->union(['new.productservice' => __('Create new product / service')]);

            return view('bill.create', compact('venders', 'bill_number', 'product_services', 'category', 'customFields'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create bill'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'vender_id' => 'required',
                                   'bill_date' => 'required',
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
            $bill                   = new Bill();
            $bill->bill_id          = $this->billNumber();
            $bill->vender_id        = $request->input('vender_id');;
            $bill->bill_date        = $request->input('bill_date');
            $bill->status           = 0;
            $bill->due_date         = $request->input('due_date');
            $bill->category_id      = $request->input('category_id');
            $bill->order_number     = $request->input('order_number');
            $bill->signed_by        = $request->input('signed_by');
            $bill->signee_position  = $request->input('signee_position');
            $bill->discount_apply   = $request->has('discount_apply') ? 1 : 0;
            $bill->created_by       = Auth::user()->creatorId();
            $bill->served_by        = Auth::user()->id;
            $bill->save();
            CustomField::saveData($bill, $request->input('customField'));
            $products = $request->input('items');

            foreach ($products as $product) {
                $quantity   = $this->ReadableNumberToFloat($product['quantity']);
                $tax        = $this->ReadableNumberToFloat($product['tax']);
                $discount   = isset($product['discount']) ? $this->ReadableNumberToFloat($product['discount']) : 0;
                $price      = $this->ReadableNumberToFloat($product['price']);

                $item = ProductService::find($product['item']);
                $item->quantity += $quantity;
                $item->save();

                $billProduct             = new BillProduct();
                $billProduct->bill_id    = $bill->id;
                $billProduct->product_id = $product['item'];
                $billProduct->quantity   = $quantity;
                $billProduct->tax        = $tax;
                $billProduct->discount   = $discount;
                $billProduct->price      = $price;
                $billProduct->save();

                $history = new ProductServiceStockChange;
                $history->bill_id       = $bill->id;
                $history->product_id    = $item->id;
                $history->quantity      = $quantity;
                $history->date          = $bill->bill_date;
                $history->created_by    = Auth::user()->creatorId();
                $history->save();
            }

            return redirect()->route('bill.index', $bill->id)->with('success', __('Bill successfully created.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function show(Bill $bill)
    {

        if(Auth::user()->can('show bill'))
        {
            if($bill->created_by == Auth::user()->creatorId())
            {
                $billPayment = BillPayment::where('bill_id', $bill->id)->first();
                $vender      = $bill->vender;
                $iteams      = $bill->items;

                return view('bill.view', compact('bill', 'vender', 'iteams', 'billPayment'));
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


    public function edit(Bill $bill)
    {
        if(Auth::user()->can('edit bill'))
        {
            $creatorId = Auth::user()->creatorId();
            $category   = ProductServiceCategory::where('created_by', $creatorId)->where('type', 2)->get()->pluck('name', 'id');
            $category->prepend(__('Select Category'), '');
            $category   = $category->union(['new.product-category' => __('Create new category')]);

            $bill_number    = Auth::user()->billNumberFormat($this->billNumber());
            $venders        = Vender::where('created_by', $creatorId)->get()->pluck('name', 'id');
            $venders->prepend(__('Select Vender'), '');
            $venders        = $venders->union(['new.vender' => __('Create new vender')]);

            $product_services   = ProductService::where('created_by', $creatorId)->get()->pluck('name', 'id');
            $product_services   = $product_services->union(['new.productservice' => __('Create new product / service')]);

            $bill->customField  = CustomField::getData($bill, 'bill');
            $customFields       = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'bill')->get();

            return view('bill.edit', compact('venders', 'product_services', 'bill', 'bill_number', 'category', 'customFields'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Bill $bill)
    {
        if(Auth::user()->can('edit bill'))
        {

            if($bill->created_by == \Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'vender_id' => 'required',
                                       'bill_date' => 'required',
                                       'due_date' => 'required',
                                       'items' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('bill.edit', $bill->id)->with('error', $messages->first());
                }
                $bill->vender_id      = $request->input('vender_id');
                $bill->bill_date      = $request->input('bill_date');
                $bill->due_date       = $request->input('due_date');
                $bill->order_number   = $request->input('order_number');
                $bill->discount_apply = $request->has('discount_apply') ? 1 : 0;
                $bill->signed_by        = $request->input('signed_by');
                $bill->signee_position  = $request->input('signee_position');
                $bill->category_id    = $request->input('category_id');
                $bill->save();
                CustomField::saveData($bill, $request->input('customField'));
                $products = $request->input('items');

                $removedProducts = BillProduct::where('bill_id', $bill->id)->whereNotIn('product_id',collect($products)->pluck('item'))->get();
                ProductServiceStockChange::where('bill_id', $bill->id)->whereIn('product_id', $removedProducts)->delete();

                foreach ($removedProducts as $product) {
                    $item = ProductService::find($product['item']);
                    if(!empty($item)) {
                        $item->quantity -= $product->quantity;
                        $item->save();
                    }
                    $product->delete();
                }

                foreach($products as $product){
                    $quantity   = $this->ReadableNumberToFloat($product['quantity']);
                    $tax        = $this->ReadableNumberToFloat($product['tax']);
                    $discount   = isset($product['discount']) ? $this->ReadableNumberToFloat($product['discount']) : 0;
                    $price      = $this->ReadableNumberToFloat($product['price']);

                    $stockChange = $quantity;
                    $billProduct = BillProduct::find($product['id']);
                    if($billProduct == null) {
                        $billProduct = new BillProduct();
                        $billProduct->bill_id    = $bill->id;
                    } else {
                        $stockChange -= $billProduct->quantity;
                    }

                    $item = ProductService::find($product['item']);
                    $item->quantity += $stockChange;
                    $item->save();

                    $billProduct->product_id = $product['item'];
                    $billProduct->quantity   = $quantity;
                    $billProduct->tax        = $tax;
                    $billProduct->discount   = $discount;
                    $billProduct->price      = $price;
                    $billProduct->save();

                    $history = ProductServiceStockChange::where('bill_id', $bill->id)
                                ->where('product_id', $item->id)
                                ->first();
                    $history->quantity  = $quantity;
                    $history->date      = $bill->bill_date;
                    $history->save();
                }


                return redirect()->back()->with('success', __('Bill successfully updated.'));
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

    public function destroy(Bill $bill)
    {
        if(\Auth::user()->can('delete bill'))
        {
            if($bill->created_by == \Auth::user()->creatorId())
            {
                $bill->delete();
                $items = BillProduct::where('bill_id', $bill->id)->select('product_id', 'quantity')
                            ->with(['product'])->get();
                foreach($items as $item) {
                    $product = $item->product;
                    $product->quantity -= $item->quantity;
                    $product->save();
                }
                ProductServiceStockChange::where('bill_id', $bill->id)->delete();
                BillProduct::where('bill_id', '=', $bill->id)->delete();

                $payments = BillPayment::select('account_id', 'date', DB::raw('SUM(amount) AS amount'))
                            ->where('bill_id', $bill->id)
                            ->groupBy('date', 'account_id')
                            ->get();
                foreach($payments as $payment) {
                    $this->AddBalance($payment->account_id, $payment->amount, $payment->date);
                }
                BillPayment::where('bill_id', $bill->id)->delete();

                return redirect()->route('bill.index')->with('success', __('Bill successfully deleted.'));
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

    function billNumber()
    {
        $latest = Bill::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->bill_id + 1;
    }

    public function product(Request $request)
    {
        $data['product']        = $product = ProductService::find($request->product_id);
        $data['unit']           = $product->unit ? $product->unit->name : '';
        $data['taxRate']        = $taxRate = ($product->taxes) ? $product->taxes->rate : 0;
        $purchasePrice          = $product->purchase_price;
        $quantity               = 1;
        $taxPrice               = ($taxRate / 100) * ($purchasePrice * $quantity);
        $product->purchase_price= $this->FloatToReadableNumber($purchasePrice);
        $data['totalAmount']    = $this->FloatToReadableNumber(($purchasePrice * $quantity) + $taxPrice);

        return json_encode($data);
    }

    public function productDestroy(Request $request)
    {
        if(\Auth::user()->can('delete bill product'))
        {
            BillProduct::where('id', '=', $request->id)->delete();

            return redirect()->back()->with('success', __('Bill product successfully deleted.'));

        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function sent($id)
    {
        if(\Auth::user()->can('send bill'))
        {
            $bill            = Bill::where('id', $id)->first();
            $bill->send_date = date('Y-m-d');
            $bill->status    = 1;
            $bill->save();

            $vender = Vender::where('id', $bill->vender_id)->first();

            $bill->name = !empty($vender) ? $vender->name : '';
            $bill->bill = \Auth::user()->billNumberFormat($bill->bill_id);

            $billId    = Crypt::encrypt($bill->id);
            $bill->url = route('bill.pdf', $billId);

            try
            {
                Mail::to($vender->email)->send(new BillSend($bill));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Bill successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return $this->RedirectDenied();
        }

    }

    public function payment($bill_id)
    {
        if(\Auth::user()->can('create payment bill'))
        {
            $bill       = Bill::where('id', $bill_id)->first();
            $venders    = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('bill.payment', compact('venders', 'categories', 'payments', 'accounts', 'bill'));
        }
        else
        {
            return $this->RedirectDenied();

        }
    }

    public function createPayment(Request $request, $bill_id)
    {
        if(\Auth::user()->can('create payment bill'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'payment_method' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            $billPayment                 = new BillPayment();
            $billPayment->bill_id        = $bill_id;
            $billPayment->date           = $request->input('date');
            $billPayment->amount         = $amount;
            $billPayment->account_id     = $request->input('account_id');
            $billPayment->payment_method = $request->input('payment_method');
            $billPayment->reference      = $request->input('reference');
            $billPayment->description    = $request->input('description');
            $billPayment->created_by     = Auth::user()->creatorId();
            $billPayment->save();
            $this->AddBalance($request->input('account_id'), -($amount), $request->input('date'));

            $bill  = Bill::where('id', $bill_id)->first();
            $due   = $bill->getDue();
            $total = $bill->getTotal();

            if($bill->status == 0)
            {
                $bill->send_date = date('Y-m-d');
                $bill->save();
            }

            if($due <= 0)
            {
                $bill->status = 4;
                $bill->save();
            }
            else
            {
                $bill->status = 3;
                $bill->save();
            }
            $billPayment->user_id    = $bill->vender_id;
            $billPayment->user_type  = 'Vender';
            $billPayment->type       = 'Partial';
            $billPayment->created_by = \Auth::user()->id;
            $billPayment->payment_id = $billPayment->id;
            $billPayment->category   = 'Bill';

            Transaction::addTransaction($billPayment);

            $vender         = Vender::where('id', $bill->vender_id)->first();
            $payment_method = PaymentMethod::where('id', $request->payment_method)->first();

            $payment         = new BillPayment();
            $payment->name   = $vender['name'];
            $payment->method = $payment_method['name'];
            $payment->date   = $request->date;
            $payment->amount = Auth::user()->priceFormat($amount);
            $payment->bill   = 'bill ' . Auth::user()->billNumberFormat($billPayment->bill_id);

            try
            {
                Mail::to($vender['email'])->send(new BillPaymentCreate($payment));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->back()->with('success', __('Payment successfully added.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }

    }

    public function paymentDestroy(Request $request, $bill_id, $payment_id)
    {

        if(\Auth::user()->can('delete payment bill'))
        {
            $billPayment = BillPayment::where('id', '=', $payment_id)->first();
            $this->AddBalance($billPayment->account_id, $billPayment->amount, $billPayment->date);
            $billPayment->delete();
            
            $bill = Bill::where('id', $bill_id)->first();
            $due  = $bill->getDue();
            if($due > 0)
            {
                $bill->status = 3;
                $bill->save();
            }

            $type = 'Partial';
            $user = 'Vender';
            Transaction::destroyTransaction($payment_id, $type, $user);

            return redirect()->back()->with('success', __('Payment successfully deleted.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function venderBill(Request $request)
    {
        if(\Auth::user()->can('manage vender bill'))
        {

            $status = Bill::$statuses;

            $query = Bill::where('vender_id', '=', \Auth::user()->vender_id)->where('status', '!=', '0')->where('created_by', \Auth::user()->creatorId());

            if(!empty($request->vender))
            {
                $query->where('id', '=', $request->vender);
            }
            if(!empty($request->bill_date))
            {
                $date_range = explode(' - ', $request->bill_date);
                $query->whereBetween('bill_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $bills = $query->get();


            return view('bill.index', compact('bills', 'status', 'vender'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function venderBillShow($bill_id)
    {
        if(Auth::user()->can('show bill'))
        {
            $bill = Bill::where('id', $bill_id)->first();

            if($bill->created_by == Auth::user()->creatorId())
            {
                $vender = $bill->vender;
                $iteams = $bill->items;

                return view('bill.view', compact('bill', 'vender', 'iteams'));
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

    public function vender(Request $request)
    {
        $vender = Vender::where('id', '=', $request->id)->first();

        return view('bill.vender_detail', compact('vender'));
    }


    public function venderBillSend($bill_id)
    {
        return view('vender.bill_send', compact('bill_id'));
    }

    public function venderBillSendMail(Request $request, $bill_id)
    {
        $validator = Validator::make(
            $request->all(), [
                               'email' => 'required|email',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $email = $request->email;
        $bill  = Bill::where('id', $bill_id)->first();

        $vender     = Vender::where('id', $bill->vender_id)->first();
        $bill->name = !empty($vender) ? $vender->name : '';
        $bill->bill = \Auth::user()->billNumberFormat($bill->bill_id);

        $billId    = Crypt::encrypt($bill->id);
        $bill->url = route('bill.pdf', $billId);

        try
        {
            Mail::to($email)->send(new VenderBillSend($bill));
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Bill successfully sent.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));

    }

    public function shippingDisplay(Request $request, $id)
    {
        $bill = Bill::find($id);

        if($request->is_display == 'true')
        {
            $bill->shipping_display = 1;
        }
        else
        {
            $bill->shipping_display = 0;
        }
        $bill->save();

        return redirect()->back()->with('success', __('Shipping address status successfully changed.'));
    }

    public function duplicate($bill_id)
    {
        if(\Auth::user()->can('duplicate bill'))
        {
            $bill = Bill::where('id', $bill_id)->first();

            $duplicateBill                   = new Bill();
            $duplicateBill->bill_id          = $this->billNumber();
            $duplicateBill->vender_id        = $bill['vender_id'];
            $duplicateBill->bill_date        = date('Y-m-d');
            $duplicateBill->due_date         = $bill['due_date'];
            $duplicateBill->send_date        = null;
            $duplicateBill->category_id      = $bill['category_id'];
            $duplicateBill->order_number     = $bill['order_number'];
            $duplicateBill->status           = 0;
            $duplicateBill->shipping_display = $bill['shipping_display'];
            $duplicateBill->created_by       = $bill['created_by'];
            $duplicateBill->served_by        = $bill['served_by'];
            $duplicateBill->save();

            if($duplicateBill)
            {
                $billProduct = BillProduct::where('bill_id', $bill_id)->get();
                foreach($billProduct as $product)
                {
                    $duplicateProduct             = new BillProduct();
                    $duplicateProduct->bill_id    = $duplicateBill->id;
                    $duplicateProduct->product_id = $product->product_id;
                    $duplicateProduct->quantity   = $product->quantity;
                    $duplicateProduct->tax        = $product->tax;
                    $duplicateProduct->discount   = $product->discount;
                    $duplicateProduct->price      = $product->price;
                    $duplicateProduct->save();
                }
            }


            return redirect()->back()->with('success', __('Bill duplicate successfully.'));

        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function previewBill($template, $color)
    {
        $objUser  = \Auth::user();
        $settings = Utility::settings();
        $bill     = new Bill();

        $vendor                   = new \stdClass();
        $vendor->email            = '<Email>';
        $vendor->shipping_name    = '<Vendor Name>';
        $vendor->shipping_country = '<Country>';
        $vendor->shipping_state   = '<State>';
        $vendor->shipping_city    = '<City>';
        $vendor->shipping_phone   = '<Vendor Phone Number>';
        $vendor->shipping_zip     = '<Zip>';
        $vendor->shipping_address = '<Address>';
        $vendor->billing_name     = '<Vendor Name>';
        $vendor->billing_country  = '<Country>';
        $vendor->billing_state    = '<State>';
        $vendor->billing_city     = '<City>';
        $vendor->billing_phone    = '<Vendor Phone Number>';
        $vendor->billing_zip      = '<Zip>';
        $vendor->billing_address  = '<Address>';

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

        $bill->bill_id          = 1;
        $bill->issue_date       = date('Y-m-d H:i:s');
        $bill->due_date         = date('Y-m-d H:i:s');
        $bill->signed_by        = '<Signee Name>';
        $bill->signee_position  = '<Signee Position>';
        $bill->items            = $items;

        $preview = 1;
        $color   = '#' . $color;

        $logo                       = asset(Storage::url('logo/'));
        $settings                   = Utility::settings();
        $company_logo               = $settings['company_logo'];
        $settings['company_city']   = $settings['company_city'] ?: '<Company City>';
        $img                        = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png'));
        $img                        .= '?'.config('asset-version.img.logo');

        return view('bill.templates.' . $template, compact('bill', 'preview', 'color', 'img', 'settings', 'vendor'));
    }

    public function bill($bill_id)
    {
        $settings = Utility::settings();
        $billId   = Crypt::decrypt($bill_id);

        $bill  = Bill::where('id', $billId)->first();
        $data  = DB::table('settings');
        $data  = $data->where('created_by', '=', $bill->created_by);
        $data1 = $data->get();

        foreach($data1 as $row)
        {
            $settings[$row->name] = $row->value;
        }

        $vendor = $bill->vender;

        $items = [];
        foreach($bill->items as $product)
        {
            $item           = new \stdClass();
            $item->name     = !empty($product->product) ? $product->product->name : '';
            $item->quantity = $product->quantity;
            $item->tax      = $product->tax;
            $item->discount = $product->discount;
            $item->price    = $product->price;
            $items[]        = $item;
        }

        $bill->items = $items;

        //Set your logo
        $logo                       = asset(Storage::url('logo/'));
        $settings                   = Utility::settings();
        $company_logo               = $settings['company_logo'];
        $settings['company_city']   = $settings['company_city'];
        $img                        = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png'));

        if($bill)
        {
            $color = '#' . $settings['bill_color'];

            return view('bill.templates.' . $settings['bill_template'], compact('bill', 'color', 'settings', 'vendor', 'img'));
        }
        else
        {
            return $this->RedirectDenied();
        }

    }

    public function thermal($bill_id)
    {
        $settings = Utility::settings();
        $billId   = Crypt::decrypt($bill_id);

        $bill  = Bill::where('id', $billId)->first();
        $data  = DB::table('settings');
        $data  = $data->where('created_by', '=', $bill->created_by);
        $data1 = $data->get();

        foreach($data1 as $row)
        {
            $settings[$row->name] = $row->value;
        }

        $vendor = $bill->vender;

        $items = [];
        foreach($bill->items as $product)
        {
            $item           = new \stdClass();
            $item->name     = !empty($product->product) ? $product->product->name : '';
            $item->quantity = $product->quantity;
            $item->tax      = $product->tax;
            $item->discount = $product->discount;
            $item->price    = $product->price;
            $items[]        = $item;
        }

        $bill->items = $items;

        //Set your logo
        $logo           = asset(Storage::url('logo/'));
        $company_logo   = Utility::getValByName('company_logo');
        $img            = asset($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo.png'));
        $img            .= '?'.config('asset-version.img.logo');

        if($bill)
        {
            $color = '#' . $settings['bill_color'];

            return view('bill.templates.thermal', compact('bill', 'color', 'settings', 'vendor', 'img'));
        }
        else
        {
            return $this->RedirectDenied();
        }

    }

    public function saveBillTemplateSettings(Request $request)
    {
        $post = $request->all();
        unset($post['_token']);

        if(isset($post['bill_template']) && (!isset($post['bill_color']) || empty($post['bill_color'])))
        {
            $post['bill_color'] = "ffffff";
        }

        foreach($post as $key => $data)
        {
            \DB::insert(
                'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ', [
                                                                                                                                             $data,
                                                                                                                                             $key,
                                                                                                                                             \Auth::user()->creatorId(),
                                                                                                                                         ]
            );
        }

        return redirect()->back()->with('success', __('Bill Setting updated successfully'));
    }

}


