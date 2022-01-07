<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\InvoiceProduct;
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

    public function create(Request $request) {
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
            return $this->FailedResponse('One or more parameter is missing');
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

    public function destroy($order_id) {
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
