<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceCategory;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductServiceCategoryController extends Controller
{
    use ApiResponse;

    private $defaultColor   = ['b2f0b3', 'b2cdf0', 'f0c2b2'];
    private $categories     = ['product' => 0, 'income' => 1, 'expense' => 2];
    //
    public function get($type = 'product') {

        if(!isset($this->categories[$type])) {
            return $this->NotFoundResponse();
        }

        $type = $this->categories[$type];
        
        $user = Auth::user();

        $categories = ProductServiceCategory::select(
            'id AS product_category_id', 
            'name AS product_category_name', 
            'color AS product_category_color'
        )->where('created_by', '=', $user->creatorId())->where('type', '=', $type)->get();

        return $this->FetchSuccessResponse($categories);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create constant category')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'category_name' => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Category name is missing');
        }

        $type   = $request->has('category_type') ? $request->input('category_type') : 0;
        $color  = $request->has('category_color') ? $request->input('category_color') : $this->defaultColor[$type];
        
        $category = ProductServiceCategory::firstOrNew([
            'name'      => $request->input('category_name'),
            'created_by'=> Auth::user()->creatorId()
        ], [
            'type'      => $type,
            'color'     => $color,
        ]);
        
        if(!$category->exists){
            $category->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function edit(Request $request, $category_id) {
        if(!Auth::user()->can('create constant category')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'category_name' => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Category name is missing');
        }

        $type   = $request->has('category_type') ? $request->input('category_type') : 0;
        $color  = $request->has('category_color') ? $request->input('category_color') : $this->defaultColor[$type];

        $category = ProductServiceCategory::where('created_by', Auth::user()->creatorId())->where('id', $category_id)->first();

        if(empty($category)) {
            return $this->NotFoundResponse();
        }

        $category->name     = $request->input('category_name');
        $category->type     = $type;
        $category->color    = $color;
        $category->save();
        
        return $this->EditSuccessResponse();
    }

    public function destroy($id) {
        if(!Auth::user()->can('delete constant category')) {
            return $this->UnauthorizedResponse();
        }
        $user       = Auth::user();
        $creatorId  = $user->creatorId();
        $category = ProductServiceCategory::where('created_by', '=', $creatorId)->where('id' ,'=', $id)->first();
        if(!$category) {
            return $this->NotFoundResponse();
        }

        $category->delete();
        return $this->SuccessWithoutDataResponse('Data successfully deleted');
    }
}
