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
        $user = Auth::user();

        $query = ProductService::select(
            'id AS product_id',
            'sku AS product_code',
            'name AS product_name',
            'sale_price AS product_sell_price',
            'category_id AS product_category_id',
            'unit_id AS product_unit_id',
            'type AS product_type',
            'quantity AS product_stock',
            'tax_id AS product_tax_id'
        )->where('created_by', '=', $user->creatorId());

        if($product_id == 'all'){
            $products = $query->get();
        } else {
            $products = $query->where('id', '=', $product_id)->first();
        }

        
        return $this->FetchSuccessResponse($products);
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
            'category_id'   => $category,
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
