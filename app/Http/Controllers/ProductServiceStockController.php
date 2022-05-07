<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\ProductService;
use App\Models\ProductServiceStockChange;
use App\Traits\ApiResponse;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductServiceStockController extends Controller
{
    use CanRedirect,
        CanProcessNumber,
        ApiResponse;

    public function index() {
        if(!Auth::user()->can('manage product & service')) {
            return $this->RedirectDenied();
        }

        return view('productServiceStock.index');
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage product & service')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'  => 'nullable|numeric',
            'limit' => 'nullable|numeric',
            'sku'   => 'nullable'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query  = ProductService::where('created_by', Auth::user()->creatorId());
        if(!empty($request->input('sku'))) {
            $query->where('sku', $request->input('sku'));
        }

        $page   = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $products   = $query->select('id', 'sku', 'name', 'type', 'quantity')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();

        if($products->isEmpty()) {
            return $this->NotFoundResponse();
        }

        return $this->PaginationSuccess($products, $page['totalPage']);
    }

    public function show($product_id) {
        if(!Auth::user()->can('manage product & service')) {
            return $this->UnauthorizedResponse();
        }

        $product = ProductService::where('created_by', Auth::user()->creatorId())
                ->where('id', $product_id)->first();

        if(empty($product)) {
            return $this->NotFoundResponse();
        }

        return view('productServiceStock.show', compact('product'));
    }

    public function history(Request $request, $product_id) {
        if(!Auth::user()->can('manage product & service')) {
            return $this->UnauthorizedResponse();
        }

        $query = ProductServiceStockChange::where('created_by', Auth::user()->creatorId())
                ->where('product_id', $product_id);
        
        $page = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $history = $query->select('id', 'date', 'quantity', 'product_id', 'invoice_id', 'bill_id', 'description', 'created_at')
                    ->orderBy('date', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->with(['invoice:id,invoice_id', 'bill:id,bill_id', 'product:id,unit_id', 'product.unit:id,name'])
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();
        if($history->isEmpty()) {
            return $this->NotFoundResponse();
        }

        return $this->PaginationSuccess($history, $page['totalPage']);
    }

    private $operations = [ 'add', 'reduce' ];

    public function modify($product_id, $operation) {
        if(!Auth::user()->can('manage product & service')) {
            return $this->UnauthorizedResponse();
        }

        if(!in_array($operation, $this->operations)) {
            return $this->NotFoundResponse();
        }

        $product = ProductService::where('created_by', Auth::user()->creatorId())
                ->where('id', $product_id)->first();

        if(empty($product)) {
            return $this->NotFoundResponse();
        }

        return view('productServiceStock.modify', compact('product', 'operation'));
    }

    public function update(Request $request, $operation) {
        if(!Auth::user()->can('manage product & service')) {
            return $this->RedirectDenied();
        }

        if(!in_array($operation, $this->operations)) {
            return $this->RedirectNotFound();
        }
        
        $validator = Validator::make($request->all(), [
            'id'    => 'required|numeric',
            'date'  => 'required|date',
            'amount'=> 'required',
        ]);

        if($validator->fails()) {
            $message = $validator->getMessageBag();
            return redirect()->back()->with('error', $message);
        }

        $product = ProductService::where('created_by', Auth::user()->creatorId())
        ->where('id', $request->input('id'))->first();

        if(empty($product)) {
            return $this->RedirectNotFound();
        }

        $amount = $this->ReadableNumberToFloat($request->input('amount'));

        if($operation == 'reduce') {
            $amount = -$amount;
        }
        $product->quantity += $amount;

        if($product->quantity < 0) {
            return redirect()->back()->with('error', __('Not enough stock'));
        }

        $product->save();

        $history = new ProductServiceStockChange;
        $history->date          = $request->input('date');
        $history->quantity      = $amount;
        $history->description   = $request->input('description');
        $history->product_id    = $request->input('id');
        $history->created_by    = Auth::user()->creatorId();
        $history->save();

        $operation = ucfirst($operation);

        return redirect()->route('product-stock.index')->with('success', __("Stock {$operation}ed"));
    }
}
