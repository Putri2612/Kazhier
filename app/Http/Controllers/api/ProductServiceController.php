<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductServiceController extends Controller
{
    //
    use ApiResponse;
    public function get($product_id = 'all') {
        $query = ProductService::select(
            'product_services.id AS product_id',
            'product_services.sku AS product_code',
            'product_services.name AS product_name',
            'product_services.sale_price AS product_sell_price',
            'product_service_categories.name AS product_category',
            'product_service_units.name AS product_weight_unit',
            'product_services.type AS product_type',
            'product_services.quantity AS product_stock',
            'taxes.rate AS product_tax_rate'
        )->where('product_services.created_by', '=', Auth::user()->creatorId());

        if(strtolower($product_id) != 'all'){
            $products = $query->where('product_services.id', '=', $product_id);   
        }

        $query->join('product_service_units', 'product_services.unit_id', '=', 'product_service_units.id')
            ->join('product_service_categories', 'product_services.category_id', '=', 'product_service_categories.id')
            ->join('taxes', 'product_services.tax_id', '=', 'taxes.id');
        
        if(strtolower($product_id) == 'all') {
            $products = $query->get();
        } else {
            $products = $query->first();
        }

        
        return $this->FetchSuccessResponse($products);
    }

    public function getBySKU($product_sku) {
        $query = ProductService::select(
            'product_services.id AS product_id',
            'product_services.sku AS product_code',
            'product_services.name AS product_name',
            'product_services.sale_price AS product_sell_price',
            'product_service_categories.name AS product_category',
            'product_service_units.name AS product_weight_unit',
            'product_services.type AS product_type',
            'product_services.quantity AS product_stock',
            'taxes.rate AS product_tax_rate'
        )->where('product_services.created_by', '=', Auth::user()->creatorId())->where('product_services.id', '=', $product_sku);

        $product = $query->join('product_service_units', 'product_services.unit_id', '=', 'product_service_units.id')
            ->join('product_service_categories', 'product_services.category_id', '=', 'product_service_categories.id')
            ->join('taxes', 'product_services.tax_id', '=', 'taxes.id')->first();
        
        return $this->FetchSuccessResponse($product);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create product & service')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'product_name'          => 'required',
            'product_code'          => 'required',
            'category_id'           => 'required',
            'product_sell_price'    => 'required',
            'product_buy_price'     => 'required',
            'product_weight_unit_id'=> 'required',
            'product_stock'         => 'required',
            'product_tax_id'        => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('One or more parameter are missing');
        }

        $user = Auth::user();
        $creatorId = $user->creatorId();
        $types  = [1 => 'product', 2 => 'service'];
        $type   = $request->has('product_type') ? $request->input('product_type') : 1;

        $category = ProductServiceCategory::find($request->input('category_id'));
        if($category->created_by != $creatorId) {
            $category = ProductServiceCategory::where('created_by', $creatorId)->first()->id;
        }

        $product_service    = ProductService::firstOrNew([
            'name'          => $request->input('product_name'),
            'created_by'    => $creatorId,
        ], [
            'sku'           => $request->input('product_code'),
            'category_id'   => $category->id,
            'sale_price'    => $request->input('product_sell_price'),
            'purchase_price'=> $request->input('product_buy_price'),
            'unit_id'       => $request->input('product_weight_unit_id'),
            'quantity'      => $request->input('product_stock'),
            'tax_id'        => $request->input('product_tax_id'),
            'type'          => $types[$type]
        ]);

        if(!$product_service->exists) {
            $product_service->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }
    
    public function edit(Request $request, $product_id) {
        if(!Auth::user()->can('edit product & service')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'product_name'          => 'required',
            'product_code'          => 'required',
            'category_id'           => 'required',
            'product_sell_price'    => 'required',
            'product_buy_price'     => 'required',
            'product_weight_unit_id'=> 'required',
            'product_stock'         => 'required',
            'product_tax_id'        => 'required'
        ]);

        if($validator->fails()) {
            $message = '';
            foreach($validator->errors()->all() as $key => $fail) {
                $message .= $fail;
                if($key < count($validator->errors()->all())) {
                    $message .= '\n';
                }
            }
            return $this->FailedResponse($message);
        }

        $user = Auth::user();
        $creatorId = $user->creatorId();
        $types  = [1 => 'product', 2 => 'service'];
        $type   = $request->has('product_type') ? $request->input('product_type') : 1;

        $category = ProductServiceCategory::find($request->input('category_id'));
        if($category->created_by != $creatorId) {
            $category = ProductServiceCategory::where('created_by', $creatorId)->first()->id;
        }

        $product_service = ProductService::where('created_by', $creatorId)->where('id', $product_id)->first();
        if(empty($product_service)) {
            return $this->NotFoundResponse();
        }

        $product_service->name              = $request->input('product_name');
        $product_service->sku               = $request->input('product_code');
        $product_service->category_id       = $category->id;
        $product_service->sale_price        = $request->input('product_sell_price');
        $product_service->purchase_price    = $request->input('product_buy_price');
        $product_service->unit_id           = $request->input('product_weight_unit_id');
        $product_service->quantity          = $request->input('product_stock');
        $product_service->tax_id            = $request->input('product_tax_id');
        $product_service->type              = $types[$type];
        $product_service->save();

        return $this->EditSuccessResponse();
    }

    public function destroy($product_id) {
        if(!Auth::user()->can('delete product & service')) {
            return $this->UnauthorizedResponse();
        }
        $user   = Auth::user();
        $product = ProductService::where('created_by', $user->creatorId())->where('id', $product_id)->first();
        if(empty($product)) {
            return $this->NotFoundResponse();
        }

        $product->delete();

        return $this->DeleteSuccessResponse();
    }
}
