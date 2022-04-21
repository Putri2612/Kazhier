<?php

namespace App\Http\Controllers;

use App\Models\CustomerCategory;
use App\Models\Utility;
use App\Traits\ApiResponse;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerCategoryController extends Controller
{
    use CanProcessNumber, CanRedirect, ApiResponse;
    public function index() {
        $categories = CustomerCategory::where('created_by', Auth::user()->creatorId())->get();

        return view('customer.category.index', compact('categories'));
    }

    public function get(Request $request) {
        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query = CustomerCategory::where('created_by', Auth::user()->creatorId());
        $totalData = (clone $query)->count();
        $page = 1;
        $limit = 10;

        if(!empty($request->input('page'))) {
            $page = intval($request->input('page'));
        }

        if(!empty($request->input('limit'))) {
            $limit = intval($request->input('limit'));
        }
        $totalPage  = ceil($totalData / $limit);
        $skip       = ($page - 1) * $limit;

        if($page > $totalPage) {
            return $this->NotFoundResponse();
        }

        $categories = $query->select('id', 'name', 'discount', 'discount_type AS type', 'max_discount')
                    ->skip($skip)->take($limit)
                    ->get();
        if(empty($categories)) {
            return $this->NotFoundResponse();
        }
        $settings = Utility::settings();
        $dateFormat = [
            'short' => [
                'year'  => 'numeric',
                'month' => 'short',
                'day'   => 'numeric'
            ],
            'long' => [
                'year'  => 'numeric',
                'month' => 'long',
                'day'   => 'numeric',
            ], 
            'numeric' => [
                'year'  => 'numeric',
                'month' => 'numeric',
                'day'   => 'numeric'
            ]
        ];
        if(in_array($settings['site_date_format'], array_keys($dateFormat))) {
            $format = $dateFormat[$settings['site_date_format']];
        } else {
            $format = $dateFormat['short'];
        }

        return $this->FetchSuccessResponse([
            'data'      => $categories,
            'pages'     => $totalPage,
            'currency'  => $settings['site_currency'],
            'date'      => $format,
        ]);
    }

    public function create() {
        $types = [];

        foreach(CustomerCategory::$DiscountType as $type) {
            array_push($types, __($type));
        }

        return view('customer.category.create', compact('types'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
        ]);

        if($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->route('customer-category.index')->with('error', $messages->first());
        }

        $discount   = empty($request->input('discount')) ? 0 : $this->ReadableNumberToFloat($request->input('discount'));
        $maxDiscount= empty($request->input('max_discount')) ? 0 : $this->ReadableNumberToFloat($request->input('max_discount'));

        $category                   = new CustomerCategory();
        $category->name             = $request->input('name');
        $category->discount         = $discount;
        $category->discount_type    = $request->input('discount_type');
        $category->max_discount     = $maxDiscount;
        $category->created_by       = Auth::user()->creatorId();
        $category->save();

        return redirect()->route('customer-category.index')->with('success', __('Customer category successfully created.'));
    }

    public function edit(CustomerCategory $customer_category) {
        $types = CustomerCategory::$DiscountType;
        

        return view('customer.category.edit', compact('types', 'customer_category'));
    }

    public function update(Request $request, CustomerCategory $customer_category) {
        
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
        ]);

        if($validator->fails()){
            $messages = $validator->getMessageBag();

            return redirect()->route('customer-category.index')->with('error', $messages->first());
        }

        $discount   = empty($request->input('discount')) ? 0 : $this->ReadableNumberToFloat($request->input('discount'));
        $maxDiscount= empty($request->input('max_discount')) ? 0 : $this->ReadableNumberToFloat($request->input('max_discount'));

        $customer_category->name             = $request->input('name');
        $customer_category->discount         = $discount;
        $customer_category->discount_type    = $request->input('discount_type');
        $customer_category->max_discount     = $maxDiscount;
        $customer_category->save();

        return redirect()->route('customer-category.index')->with('success', __('Customer category successfully updated.'));
    }

    public function destroy(CustomerCategory $category) {
        if($category->created_by == Auth::user()->creatorId()) {
            if($category->customers->count()) {
                return redirect()->route('customer-category.index')->with('error', __('Please delete related customers of this category.'));
            }

            $category->delete();

            return redirect()->route('customer-category.index')->with('success', __('Customer category successfully deleted.'));
        } else {
            $this->RedirectDenied();
        }
    }
}
