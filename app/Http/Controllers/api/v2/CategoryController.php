<?php

namespace App\Http\Controllers\api\v2;

use App\Classes\Pagination;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Invoice;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResponse;
    private $types = [
        'product-service'   => 0, 
        'income'            => 1, 
        'expense'           => 2
    ];

    public function get(Request $request, $type) {
        if(!Auth::user()->can('manage constant category')) {
            return $this->UnauthorizedResponse();
        }

        if(empty($type) || !array_key_exists($type, $this->types)) {
            return $this->NotFoundResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }
        $type = $this->types[$type];

        $query = ProductServiceCategory::where('created_by', Auth::user()->creatorId())
                ->where('type', $type);

        $page = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $categories = $query->select('name', 'id')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();

        if($categories->isEmpty()) {
            return $this->NotFoundResponse();
        }

        return $this->PaginationSuccess($categories, $page['totalPage']);
    }

    public function create(Request $request, $type) {
        if(!Auth::user()->can('create constant category')) {
            return $this->UnauthorizedResponse();
        }

        if(empty($type) || !array_key_exists($type, $this->types)) {
            return $this->NotFoundResponse();
        }

        $validator = Validator::make(
            $request->all(), 
            [
                'name' => 'required|max:20',
                'color' => 'required',
            ]
        );
        if($validator->fails())
        {
            return $this->FailedResponse('Some data are missing');
        }

        $category             = new ProductServiceCategory();
        $category->name       = $request->name;
        $category->color      = $request->color;
        $category->type       = $this->types[$type];
        $category->created_by = Auth::user()->creatorId();
        $category->save();

        return $this->CreateSuccessResponse();
    }

    public function update(Request $request, $type, $id) {
        if(!Auth::user()->can('edit constant category')) {
            return $this->UnauthorizedResponse();
        }

        if(empty($type) || !array_key_exists($type, $this->types)) {
            return $this->NotFoundResponse();
        }

        $validator = Validator::make(
            $request->all(), 
            [
                'name' => 'required|max:20',
                'color' => 'required',
            ]
        );
        if($validator->fails())
        {
            return $this->FailedResponse('Some data are missing');
        }

        $category = ProductServiceCategory::find($id);
        $type = $this->types[$type];

        if(
            empty($category) ||
            $category->type != $type ||
            $category->created_by != Auth::user()->creatorId()
        ) {
            return $this->NotFoundResponse();
        }

        $category->name     = $request->name;
        $category->color    = $request->color;
        $category->save();

        return $this->EditSuccessResponse();
    }

    public function destroy($type, $id) {
        if(!Auth::user()->can('delete constant category')) {
            return $this->UnauthorizedResponse();
        }

        if(empty($type) || !array_key_exists($type, $this->types)) {
            return $this->NotFoundResponse();
        }

        $category   = ProductServiceCategory::find($id);
        $type_name  = $type;
        $type       = $this->types[$type];

        if(
            empty($category) ||
            $category->type != $type ||
            $category->created_by != Auth::user()->creatorId()
        ) {
            return $this->NotFoundResponse();
        }

        $count = 0;

        if($type_name == 'product-service') {
            $count += ProductService::where('category_id', $id)->count();
        } else if ($type_name == 'income') {
            $count += Revenue::where('category_id', $id)->count();
            $count += Invoice::where('category_id', $id)->count();
        } else if ($type_name == 'expense') {
            $count += Revenue::where('category_id', $id)->count();
            $count += Bill::where('category_id', $id)->count();
        }

        if(empty($count)) {
            $category->delete();

            return $this->DeleteSuccessResponse();
        } else {
            return $this->FailedResponse('Please delete related records of this category.');
        }
    }
}
