<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CustomerCategory;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerCategoryController extends Controller
{
    use ApiResponse;
    public function get($category_id) {
        $user = Auth::user();
        $creatorId = $user->creatorId();
        $query = CustomerCategory::select(
            'id AS category_id',
            'name AS category_name',
            'discount AS category_discount',
            'discount_type AS category_discount_type',
            'max_discount AS category_max_discount'
            )->where('created_by', $creatorId);
        if($category_id == 'all') {
            $category = $query->get();
        } else {
            $category = $query->where('id', $category_id)->first();
        }

        return $this->FetchSuccessResponse($category);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'category_name'             => 'required',
        ]);
        if($validator->fails()) {
            return $this->FailedResponse('Category name is missing');
        }

        $discount       = empty($request->input('category_discount')) ? 0 : $request->input('category_discount');
        $maxDiscount    = empty($request->input('category_max_discount')) ? 0 : $request->input('category_max_discount');
        $type           = empty($request->input('category_discount_type')) ? 1 : $request->input('category_discount_type');

        $user = Auth::user();
        $creatorId = $user->creatorId();
        
        $category                   = new CustomerCategory();
        $category->name             = $request->input('name');
        $category->discount         = $discount;
        $category->discount_type    = $type;
        $category->max_discount     = $maxDiscount;
        $category->created_by       = $creatorId;
        $category->save();

        return $this->CreateSuccessResponse();
    }

    public function destroy($category_id) {
        $category = CustomerCategory::where('created_by', Auth::user()->creatorId())
                    ->where('id', $category_id)->first();

        if(empty($category)) {
            return $this->NotFoundResponse();
        }

        if($category->customers->count()) {
            return $this->FailedResponse('Please delete related customers of this category.');
        }

        $category->delete();

        return $this->DeleteSuccessResponse();
    }
}
