<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\InvoiceProduct;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use App\Traits\CanManageIDs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use CanManageBalance, CanManageIDs, ApiResponse;

    public function index() {
        $user       = Auth::user();
        $creatorID  = $user->creatorId();
        $invoices   = Invoice::where('created_by', '=', $creatorID)->get();
        $data       = [];
        
        foreach ($invoices as $invoice) {
            array_push($data, [
                'order_id'              => $invoice->id,
                'invoice_id'            => $invoice->invoice_id,
                'order_time'            => date_format($invoice->issue_date, 'H:i:s'),
                'order_date'            => date_format($invoice->issue_date, 'Y-m-d'),
                'order_price'           => $invoice->getTotal(),
                'order_payment_method'  => $invoice->status > 2 ? $invoice->payments()->first()->bankAccount->bank_name . ' ' . $invoice->payments()->first()->bankAccount->holder_name : 'unpaid',
                'customer_name'         => $invoice->customer->name,
                'status'                => Invoice::$statuses[$invoice->status],
                'served_by'             => $invoice->served_by
            ]);
        }
        

        return $this->FetchSuccessResponse($data);
    }

    public function detail($order_id) {
        $items = InvoiceProduct::select(
                    'invoice_products.id AS order_details_id',
                    'invoice_products.invoice_id',
                    'invoice_products.quantity AS product_quantity',
                    'product_services.name AS product_name',
                    'product_service_units.name AS product_weight',
                    'invoice_products.price AS product_price',
                    'invoices.issue_date AS product_order_date',
                )
                ->where('invoice_products.invoice_id', $order_id)
                ->where('invoices.created_by', Auth::user()->creatorId())
                ->join('product_services', 'invoice_products.product_id', '=', 'product_services.id')
                ->join('invoices', 'invoice_products.invoice_id', '=', 'invoices.id')
                ->join('product_service_units', 'product_services.unit_id', '=', 'product_service_units.id')
                ->get();
        return $this->FetchSuccessResponse($items);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create invoice')){
            return $this->UnauthorizedResponse();
        }

        $validator  = Validator::make($request->all(), [
            'order_date'            => 'required',
            'order_time'            => 'required',
            'order_category_id'     => 'required',
            'customer_name'         => 'required',
            'products'              => 'required',
            'order_price'           => 'required',
            'order_payment_method'  => 'required',
            'payment_method'        => 'required',
        ]);

        if($validator->fails()){
            $message = '';
            foreach($validator->errors()->all() as $key => $fail) {
                $message .= $fail;
                if($key < count($validator->errors()->all())) {
                    $message .= '\n';
                }
            }
            return $this->FailedResponse($message);
        }
        
        $user       = Auth::user();
        $creatorID  = $user->creatorId();
        $products   = $request->input('products');
        $products   = gettype($products) == 'string' ? json_decode($products): $products;

        $customer   = Customer::firstOrNew([
            'name'      => $request->input('customer_name'),
            'created_by'=> $creatorID,
        ], [
            'email'             => $request->has('customer_email') ? $request->input('customer_email') : 'noemail@example.com',
            'contact'           => $request->has('customer_phone') ? $request->input('customer_phone') : '000000',
            'billing_name'      => $request->input('customer_name'),
            'billing_phone'     => $request->has('customer_phone') ? $request->input('customer_phone') : '000000',
            'billing_address'   => $request->has('customer_address') ? $request->input('customer_address') : 'no address',
            'shipping_name'     => $request->input('customer_name'),
            'shipping_phone'    => $request->has('customer_phone') ? $request->input('customer_phone') : '000000',
            'shipping_address'  => $request->has('customer_address') ? $request->input('customer_address') : 'no address',
            'customer_id'       => $this->CustomerNumber(),
        ]);
        if(!$customer->exists){
            $customer->save();
        }

        $datetime = $request->input('order_date') . ' ' . $request->input('order_time');
        $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime);
        
        $invoice                    = new Invoice();
        $invoice->invoice_id        = $this->InvoiceNumber();
        $invoice->customer_id       = $customer->id;
        $invoice->status            = 2;
        $invoice->issue_date        = $datetime;
        $invoice->due_date          = $datetime;
        $invoice->category_id       = $request->input('order_category_id');
        $invoice->ref_number        = $request->has('ref_number') ? $request->input('ref_number') : '';
        $invoice->discount_apply    = $request->has('discount_apply') ? 1 : 0;
        $invoice->created_by        = $creatorID;
        $invoice->served_by         = $user->id;
        $invoice->save();

        foreach($products as $product) {
            if(gettype($product) == 'string') {
                $product = json_decode($product);
            }
            $quantity   = $product->product_qty;
            $tax        = $product->product_tax;
            $discount   = isset($product->discount) ? $product->discount : 0;
            $price      = $product->product_price;

            $item   = ProductService::find($product->product_id);
            $item->quantity -= $quantity;
            $item->save();
            
            $invoiceProduct             = new InvoiceProduct();
            $invoiceProduct->invoice_id = $invoice->id;
            $invoiceProduct->product_id = $product->product_id;
            $invoiceProduct->quantity   = $quantity;
            $invoiceProduct->tax        = $tax;
            $invoiceProduct->discount   = $discount;
            $invoiceProduct->price      = $price;
            $invoiceProduct->save();
        }

        $bankAccount    = BankAccount::where('id', '=', $request->input('order_payment_method'))->where('created_by', '=', $creatorID)->first();
        if($bankAccount) {
            $accountId  = $bankAccount->id;
        } else {
            $accountId  = BankAccount::select('id')->where('created_by', '=', $creatorID)->first()->id;
        }

        $invoicePayment                 = new InvoicePayment();
        $invoicePayment->invoice_id     = $invoice->id;
        $invoicePayment->date           = $request->input('order_date');
        $invoicePayment->amount         = $request->input('order_price');
        $invoicePayment->account_id     = $accountId;
        $invoicePayment->payment_method = $request->input('payment_method');
        $invoicePayment->reference      = '';
        $invoicePayment->description    = '';
        $invoicePayment->served_by      = $user->id;
        $invoicePayment->created_by     = $creatorID;
        $invoicePayment->save();
        $this->AddBalance($accountId, $request->input('order_price'), $request->input('order_date'));

        if($invoice->getDue() == 0) {
            $invoice->status = 4;
        } else if ($invoice->getDue() == $invoice->getTotal()) {
            $invoice->status = 2;
        } else {
            $invoice->status = 3;
        }
        $invoice->save();

        return $this->CreateSuccessResponse();
    }

    public function edit(Request $request, $order_id) {
        if(!Auth::user()->can('edit invoice')){
            return $this->UnauthorizedResponse();
        }

        $validator  = Validator::make($request->all(), [
            'order_date'            => 'required',
            'order_time'            => 'required',
            'order_category_id'     => 'required',
            'customer_name'         => 'required',
            'products'              => 'required',
            'order_price'           => 'required',
            'order_payment_method'  => 'required',
            'payment_method'        => 'required',
        ]);

        if($validator->fails()){
            $message = '';
            foreach($validator->errors()->all() as $key => $fail) {
                $message .= $fail;
                if($key < count($validator->errors()->all())) {
                    $message .= '\n';
                }
            }
            return $this->FailedResponse($message);
        }
        $user       = Auth::user();
        $creatorID  = $user->creatorId();
        $products   = $request->input('products');

        $products   = gettype($products) == 'string' ? json_decode($products): $products;

        $customer   = Customer::firstOrNew([
            'name'      => $request->input('customer_name'),
            'created_by'=> $creatorID,
        ], [
            'email'             => $request->has('customer_email') ? $request->input('customer_email') : 'noemail@example.com',
            'contact'           => $request->has('customer_phone') ? $request->input('customer_phone') : '000000',
            'billing_name'      => $request->input('customer_name'),
            'billing_phone'     => $request->has('customer_phone') ? $request->input('customer_phone') : '000000',
            'billing_address'   => $request->has('customer_address') ? $request->input('customer_address') : 'no address',
            'shipping_name'     => $request->input('customer_name'),
            'shipping_phone'    => $request->has('customer_phone') ? $request->input('customer_phone') : '000000',
            'shipping_address'  => $request->has('customer_address') ? $request->input('customer_address') : 'no address',
            'customer_id'       => $this->CustomerNumber(),
        ]);
        if(!$customer->exists){
            $customer->save();
        }

        $invoice = Invoice::where('id', $order_id)->where('created_by', $creatorID)->first();
        if(empty($invoice)) {
            return $this->NotFoundResponse();
        }

        $datetime = $request->input('order_date') . ' ' . $request->input('order_time');
        $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime);

        $invoice->customer_id       = $customer->id;
        $invoice->status            = 2;
        $invoice->issue_date        = $datetime;
        $invoice->due_date          = $datetime;
        $invoice->category_id       = $request->input('order_category_id');
        $invoice->ref_number        = $request->has('ref_number') ? $request->input('ref_number') : '';
        $invoice->customer_tax      = $request->has('customer_tax') && boolval($request->input('customer_tax'));
        $invoice->save();

        $removedProduct = InvoiceProduct::where('invoice_id', $invoice->id)->whereNotIn('product_id', collect($products)->pluck('product_id'))->get();
        foreach($removedProduct as $product) {
            $item = ProductService::find($product->product_id);
            if(!empty($item)) {
                $item->quantity += $product->quantity;
                $item->save();
            }
            $product->delete();
        }

        foreach($products as $product) {
            if(gettype($product) == 'string') {
                $product = json_decode($product);
            }
            $quantity   = $product->product_qty;
            $tax        = $product->product_tax;
            $discount   = isset($product->discount) ? $product->discount : 0;
            $price      = $product->product_price;

            $stockChange = $quantity;
            $item   = ProductService::find($product->product_id);
            if(empty($item)) {
                continue;
            }

            $invoiceProduct = InvoiceProduct::find($product->product_id);
            if($invoiceProduct == null)
            {
                $invoiceProduct             = new InvoiceProduct();
                $invoiceProduct->invoice_id = $invoice->id;
            } else {
                $stockChange -= $invoiceProduct->quantity;
            }

            $item->quantity -= $stockChange;
            $item->save();
            
            $invoiceProduct->product_id = $product->product_id;
            $invoiceProduct->quantity   = $quantity;
            $invoiceProduct->tax        = $tax;
            $invoiceProduct->discount   = $discount;
            $invoiceProduct->price      = $price;
            $invoiceProduct->save();
        }

        $bankAccount    = BankAccount::where('id', '=', $request->input('order_payment_method'))->where('created_by', '=', $creatorID)->first();
        if($bankAccount) {
            $accountId  = $bankAccount->id;
        } else {
            $accountId  = BankAccount::select('id')->where('created_by', '=', $creatorID)->first()->id;
        }

        $invoicePayment                 = InvoicePayment::where('invoice_id', $invoice->id)->first();

        if(!empty($invoicePayment)) {
            $prevAmount     = $invoicePayment->amount;
            $prevAccount    = $invoicePayment->account_id;
            $this->AddBalance($prevAccount, -$prevAccount, $request->input('order_date'));
            
        } else {
            $invoicePayment = new InvoicePayment();
            $invoicePayment->invoice_id = $invoice->id;
        }


        $invoicePayment->date           = $request->input('order_date');
        $invoicePayment->amount         = $request->input('order_price');
        $invoicePayment->account_id     = $accountId;
        $invoicePayment->payment_method = $request->input('payment_method');
        $invoicePayment->save();
        $this->AddBalance($accountId, $request->input('order_price'), $request->input('order_date'));

        if($invoice->getDue() == 0) {
            $invoice->status = 4;
        } else if ($invoice->getDue() == $invoice->getTotal()) {
            $invoice->status = 2;
        } else {
            $invoice->status = 3;
        }
        $invoice->save();

        return $this->EditSuccessResponse();
    }

    public function destroy($order_id) {
        if(!Auth::user()->can('delete invoice')) {
            return $this->UnauthorizedResponse();
        }
        $user       = Auth::user();
        $creatorID  = $user->creatorId();
        $order      = Invoice::where('created_by', '=', $creatorID)->where('id', '=', $order_id)->first();

        if(!$order) {
            return $this->NotFoundResponse();
        }

        foreach($order->payments as $payment) {
            $this->AddBalance($payment->account_id, $payment->amount, $payment->date);
            $payment->delete();
        }

        InvoiceProduct::where('invoice_id', '=', $order_id)->delete();

        $order->delete();

        return $this->SuccessWithoutDataResponse('Data successfully deleted');
    }
}
