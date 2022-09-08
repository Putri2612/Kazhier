<?php

namespace App\Http\Controllers\api\v2\Bill;

use App\Classes\Pagination;
use App\Http\Controllers\Controller as BaseController;
use App\Models\Bill;
use App\Models\BillPayment;
use App\Models\BillProduct;
use App\Models\CustomField;
use App\Models\ProductService;
use App\Models\ProductServiceStockChange;
use App\Models\Utility;
use App\Models\Vender;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use ApiResponse, CanProcessNumber, CanManageBalance;

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
            ->select(
                'id', 'bill_id', 
                'bill_date', 
                'due_date', 
                'vender_id', 
                'status', 
                'category_id',
                'served_by'
            )
            ->with(['vender:id,name', 'category:id,name', 'server:id,name'])
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

    public function find($id) {
        if(!Auth::user()->can('manage bill')) {
            return $this->UnauthorizedResponse();
        }

        $bill = Bill::where('created_by', Auth::user()->creatorId())
                ->where('id', $id)
                ->with(['vender', 'items', 'category', 'server'])
                ->first();

        if(empty($bill)) {
            return $this->NotFoundResponse();
        }

        return $this->FetchSuccessResponse($bill);
    }

    public function store(Request $request) {
        if(!Auth::user()->can('create bill')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'vender_id'     => 'required',
            'bill_date'     => 'required',
            'due_date'      => 'required',
            'category_id'   => 'required',
            'items'         => 'required',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        DB::beginTransaction();
        try {
            $bill               = new Bill();
            $bill->bill_id      = $this->billNumber();
            $bill->vender_id    = $request->input('vender_id');
            $bill->bill_date    = $request->input('bill_date');
            $bill->status       = 0;
            $bill->due_date     = $request->input('due_date');
            $bill->category_id  = $request->input('category_id');
            $bill->order_number = $request->input('order_number');
            $bill->created_by   = Auth::user()->creatorId();
            $bill->served_by    = Auth::user()->id;
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

                $history = new ProductServiceStockChange();
                $history->bill_id       = $bill->id;
                $history->product_id    = $item->id;
                $history->quantity      = $quantity;
                $history->date          = $bill->bill_date;
                $history->created_by    = Auth::user()->creatorId();
                $history->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return $this->FailedResponse('Something went wrong', 500);
        }

        $settings = Utility::settings();
        if(
            !empty($settings['bill_automail']) && 
            $settings['bill_automail'] &&
            Auth::user()->can('send bill')
        ) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, route('api.v2.bill.send', $bill->id));
            curl_setopt($curl, CURLOPT_PUT, true);

            $response = curl_exec($curl);
            if(!curl_errno($curl)) {
                $response = (json_decode($response))->message;
            }

            curl_close($curl);

            return $this->SuccessWithoutDataResponse($response);
        }

        return $this->CreateSuccessResponse();
    }

    public function update(Request $request, $bill_id) {
        if(!Auth::user()->can('edit bill')) {
            return $this->UnauthorizedResponse();
        }

        $bill = Bill::find($bill_id);

        if(empty($bill) || $bill->created_by != Auth::user()->creatorId()) {
            return $this->NotFoundResponse();
        }

        $validator = Validator::make($request->all(), [
            'vender_id' => 'required',
            'bill_date' => 'required',
            'due_date'  => 'required',
            'items'     => 'required',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Input invalid');
        }

        DB::beginTransaction();

        try {
            $bill->vender_id    = $request->input('vender_id');
            $bill->bill_date    = $request->input('bill_date');
            $bill->due_date     = $request->input('due_date');
            $bill->order_number = $request->input('order_number');
            $bill->category_id  = $request->input('category_id');
            $bill->save();

            CustomField::saveData($bill, $request->input('customField'));
            $products = $request->input('items');

            $removedProducts = BillProduct::where('bill_id', $bill->id)
                ->whereNotIn('product_id',collect($products)->pluck('item'))
                ->get();
            ProductServiceStockChange::where('bill_id', $bill->id)
                ->whereIn('product_id', $removedProducts)
                ->delete();

            foreach ($removedProducts as $product) {
                $item = ProductService::find($product['item']);
                if(!empty($item)) {
                    $item->quantity -= $product->quantity;
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
                $billProduct = BillProduct::find($product['id']);
                if(empty($billProduct)) {
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

            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            return $this->FailedResponse('Something went wrong', 500);
        }

        return $this->EditSuccessResponse();
    }

    public function delete($bill_id) {
        if(!Auth::user()->can('delete bill')) {
            return $this->UnauthorizedResponse();
        }

        $bill = Bill::find($bill_id);

        if(empty($bill) || $bill->created_by != Auth::user()->creatorId()) {
            return $this->NotFoundResponse();
        }

        DB::beginTransaction();

        try {
            $bill->delete();

            $items = BillProduct::where('bill_id', $bill_id)
                ->select('product_id', 'quantity')
                ->with(['product'])->get();

            foreach($items as $item) {
                $product = $item->product;
                $product->quantity -= $item->quantity;
                $product->save();
            }

            ProductServiceStockChange::where('bill_id', $bill_id)->delete();
            BillProduct::where('bill_id', $bill_id)->delete();
            $payments = BillPayment::select('account_id', 'date', DB::raw('SUM(amount) AS amount'))
                        ->where('bill_id', $bill->id)
                        ->groupBy('date', 'account_id')
                        ->get();
            foreach($payments as $payment) {
                $this->AddBalance($payment->account_id, $payment->amount, $payment->date);
            }
            BillPayment::where('bill_id', $bill->id)->delete();

            DB::commit();
        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            return $this->FailedResponse('Something went wrong', 500);
        }

        return $this->DeleteSuccessResponse();
    }

    private function billNumber() {
        $latest = Bill::select('bill_id')
                ->toBase()
                ->where('created_by', Auth::user()->creatorId())
                ->latest()
                ->first();
        if(empty ($latest)) {
            return 1;
        }

        return $latest->bill_id + 1;
    }
}
