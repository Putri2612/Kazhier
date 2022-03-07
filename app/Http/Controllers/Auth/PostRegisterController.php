<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DefaultValue;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostRegisterController extends Controller
{

    private $validationRule = [
        'items' => 'required|not_in:[]',
    ];

    public function index() {
        return view('auth.post-register.index');
    }

    public function revenue(Request $request) {
        if(!empty($request->all())){
            $request->validate($this->validationRule);

            $revenues = json_decode($request->input('items'));

            foreach($revenues as $revenue) {
                $category = DefaultValue::GetByName($revenue);
                if(!empty($category)){
                    ProductServiceCategory::insert([
                        'name'          => $category->name,
                        'color'         => $category->color,
                        'type'          => 1,
                        'created_by'    => Auth::user()->creatorId()
                    ]);
                } else {
                    ProductServiceCategory::insert([
                        'name'          => $revenue,
                        'color'         => '0087f8',
                        'type'          => 1,
                        'created_by'    => Auth::user()->creatorId()
                    ]);
                }
            }

            return redirect()->route('initial-setup.expense');
        } else {
            $defaults = DefaultValue::Get('income');
            $revenues = [];
            $bait       = [];
            $length     = $defaults->count();
            $baitCount  = $length - ceil($length / 5);

            for($index = 0; $index < $length; $index++){
                if($index < $baitCount) {
                    array_push($revenues, $defaults[$index]->name);
                } else {
                    array_push($bait, $defaults[$index]->name);
                }
            }

            return view('auth.post-register.revenue', compact('revenues', 'bait'));
        }
    }

    public function expense(Request $request) {
        if(!empty($request->all())){
            $request->validate($this->validationRule);

            $expenses = json_decode($request->input('items'));

            foreach($expenses as $expense) {
                $category = DefaultValue::GetByName($expense);
                if(!empty($category)){
                    ProductServiceCategory::insert([
                        'name'          => $category->name,
                        'color'         => $category->color,
                        'type'          => 2,
                        'created_by'    => Auth::user()->creatorId()
                    ]);
                } else {
                    ProductServiceCategory::insert([
                        'name'          => $expense,
                        'color'         => '996b69',
                        'type'          => 2,
                        'created_by'    => Auth::user()->creatorId()
                    ]);
                }
            }

            return redirect()->route('initial-setup.product-category');
        } else {
            $defaults   = DefaultValue::Get('expense');
            $expenses   = [];
            $bait       = [];
            $length     = $defaults->count();
            $baitCount  = $length - ceil($length / 5);

            for($index = 0; $index < $length; $index++){
                if($index < $baitCount) {
                    array_push($expenses, $defaults[$index]->name);
                } else {
                    array_push($bait, $defaults[$index]->name);
                }
            }

            return view('auth.post-register.expense', compact('expenses', 'bait'));
        }
    }

    public function product_category(Request $request) {
        if(!empty($request->all())){
            $request->validate($this->validationRule);

            $products = json_decode($request->input('items'));

            foreach($products as $product) {
                $category = DefaultValue::GetByName($product);
                if(!empty($category)){
                    ProductServiceCategory::insert([
                        'name'          => $category->name,
                        'color'         => $category->color,
                        'type'          => 0,
                        'created_by'    => Auth::user()->creatorId()
                    ]);
                } else {
                    ProductServiceCategory::insert([
                        'name'          => $product,
                        'color'         => '70f880',
                        'type'          => 0,
                        'created_by'    => Auth::user()->creatorId()
                    ]);
                }
            }

            return redirect()->route('initial-setup.unit');
        } else {
            $defaults   = DefaultValue::Get('product service');
            $products   = [];
            $bait       = [];
            $length     = $defaults->count();
            $baitCount  = $length - ceil($length / 5);

            for($index = 0; $index < $length; $index++){
                if($index < $baitCount) {
                    array_push($products, $defaults[$index]->name);
                } else {
                    array_push($bait, $defaults[$index]->name);
                }
            }

            return view('auth.post-register.product', compact('products', 'bait'));
        }
    }

    public function unit(Request $request) {
        if(!empty($request->all())){
            $request->validate($this->validationRule);

            $units = json_decode($request->input('items'));

            foreach($units as $unit) {
                ProductServiceUnit::insert([
                    'name'          => $unit,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }

            return redirect()->route('initial-setup.method');
        } else {
            $defaults   = DefaultValue::Get('unit');
            $units      = [];
            $bait       = [];
            $length     = $defaults->count();
            $baitCount  = $length - ceil($length / 5);

            for($index = 0; $index < $length; $index++){
                if($index < $baitCount) {
                    array_push($units, $defaults[$index]->name);
                } else {
                    array_push($bait, $defaults[$index]->name);
                }
            }

            return view('auth.post-register.unit', compact('units', 'bait'));
        }
    }
    
    public function paymentMethod(Request $request) {
        if(!empty($request->all())){
            $request->validate($this->validationRule);

            $methods = json_decode($request->input('items'));

            foreach($methods as $method) {
                PaymentMethod::insert([
                    'name'          => $method,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }

            return redirect()->route('initial-setup.tax');
        } else {
            $defaults   = DefaultValue::Get('payment method');
            $methods    = [];
            $bait       = [];
            $length     = $defaults->count();
            $baitCount  = $length - ceil($length / 5);
            
            for($index = 0; $index < $length; $index++){
                if($index < $baitCount) {
                    array_push($methods, $defaults[$index]->name);
                } else {
                    array_push($bait, $defaults[$index]->name);
                }
            }

            return view('auth.post-register.method', compact('methods', 'bait'));
        }
    }

    public function tax(Request $request) {
        if(!empty($request->all())){
            $request->validate($this->validationRule);

            $taxes = json_decode($request->input('items'));

            foreach($taxes as $tax) {
                Tax::insert([
                    'name'          => $tax->label,
                    'rate'          => $tax->value,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }

            return redirect()->route('initial-setup.complete');
        } else {
            $defaults   = DefaultValue::Get('tax');
            $taxes      = [];
            $bait       = [];
            $length     = $defaults->count();
            $baitCount  = $length - ceil($length / 5);
            for($index = 0; $index < $length; $index++){
                if($index < $baitCount) {
                    array_push($taxes, ['label' => $defaults[$index]->name, 'value' => $defaults[$index]->value]);
                } else {
                    array_push($bait, ['label' => $defaults[$index]->name, 'value' => $defaults[$index]->value]);
                }
            }

            return view('auth.post-register.tax', compact('taxes', 'bait'));
        }
    }

    public function complete() {
        Auth::user()->initialize();

        return view('auth.post-register.complete');
    }

    public function skip() {
        Auth::user()->initialize();

        return redirect()->route('dashboard');
    }
}
