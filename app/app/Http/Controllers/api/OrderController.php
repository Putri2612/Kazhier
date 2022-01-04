<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\InvoiceProduct;
use App\Models\ProductServiceCategory;
use App\Traits\CanManageBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use CanManageBalance;

    public function index() {
        $user       = Auth::user();
        $creatorID  = $user->creatorId();
        $invoices   = Invoice::where('created_by', '=', $creatorID)->get();
        
        foreach ($invoices as $invoice) {
            $data[] = [
                'order_id'      => $invoice->id,
                'invoice_id'    => $invoice->invoice_id,
                'order_time'    => 
            ];
        }
        

        return response()->json($data);
    }

    public function create(Request $request) {
        $user       = Auth::user();
        $creatorID  = $user->creatorId();
        $products   = $request->input('products');

        $customer   = Customer::firstOrNew([
            'name'      => $request->input('customer_name')
        ], [
            'contact'           => $request->has('customer_phone') ? $request->input('customer_phone') : 000000,
            'billing_name'      => $request->input('customer_name'),
            'billing_phone'     => $request->has('customer_phone') ? $request->input('customer_phone') : 000000,
            'billing_address'   => $request->has('customer_address') ? $request->input('customer_address') : '-',
            'shipping_name'     => $request->input('customer_name'),
            'shipping_phone'    => $request->has('customer_phone') ? $request->input('customer_phone') : 000000,
            'shipping_address'  => $request->has('customer_address') ? $request->input('customer_address') : '-',
            'customer_id'       => $this->customerNumber($creatorID),
        ]);
        $customer->save();

        $datetime = $request->input('order_date') . ' ' . $request->input('order_time');
        $datetime = Carbon::createFromFormat('Y-m-d H:i:s', $datetime);
        
        $invoice                    = new Invoice();
        $invoice->invoice_id        = $this->invoiceNumber($creatorID);
        $invoice->customer_id       = $customer->id;
        $invoice->status            = 4;
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

        $invoicePayment                 = new InvoicePayment();
        $invoicePayment->invoice_id     = $invoice->id;
        $invoicePayment->date           = $request->input('order_date');
        $invoicePayment->amount         = $request->input('order_price');
        $invoicePayment->account_id     = $request->input('order_payment_method');
        $invoicePayment->payment_method = $request->input('payment_method');
        $invoicePayment->reference      = '';
        $invoicePayment->description    = '';
        $invoicePayment->created_by     = $creatorID;
        $invoicePayment->save();
        $this->AddBalance($request->input('order_payment_method'), $request->input('order_price'), $request->input('order_date'));

        return response()->json(['message' => 'Successfully stored']);
    }

    private function invoiceNumber($id) {
        $latest = Invoice::where('created_by', '=', $id)->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->invoice_id + 1;
    }

    private function customerNumber($id) {
        $latest = Customer::where('created_by', '=', $id)->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->customer_id + 1;
    }
}
