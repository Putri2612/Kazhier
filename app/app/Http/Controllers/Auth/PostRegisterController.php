<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DefaultValue;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostRegisterController extends Controller
{
    public function index() {
        return view('auth.post-register.index');
    }

    public function revenue(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'items' => 'required',
            ]);

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

            return redirect()->route('post-register.expense');
        } else {
            $defaults = DefaultValue::Get('revenue');
            $revenues = [];
            foreach($defaults as $default){
                array_push($revenues, $default->name);
            }

            return view('auth.post-register.revenue', compact('revenues'));
        }
    }

    public function expense(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'items' => 'required',
            ]);

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

            return redirect()->route('post-register.product-category');
        } else {
            $defaults = DefaultValue::Get('payment');
            $expenses = [];
            foreach($defaults as $default){
                array_push($expenses, $default->name);
            }

            return view('auth.post-register.expense', compact('expenses'));
        }
    }

    public function product_category(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'items' => 'required',
            ]);

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

            return redirect()->route('post-register.unit');
        } else {
            $defaults = DefaultValue::Get('product service');
            $products = [];
            foreach($defaults as $default){
                array_push($products, $default->name);
            }

            return view('auth.post-register.product', compact('products'));
        }
    }

    public function unit(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'items' => 'required',
            ]);

            $units = json_decode($request->input('items'));

            foreach($units as $unit) {
                ProductServiceUnit::insert([
                    'name'          => $unit,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }

            return redirect()->route('post-register.method');
        } else {
            $defaults = DefaultValue::Get('unit');
            $units = [];
            foreach($defaults as $default){
                array_push($units, $default->name);
            }

            return view('auth.post-register.unit', compact('units'));
        }
    }
    
    public function paymentMethod(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'items' => 'required',
            ]);

            $methods = json_decode($request->input('items'));

            foreach($methods as $method) {
                PaymentMethod::insert([
                    'name'          => $method,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }

            return redirect()->route('post-register.tax');
        } else {
            $defaults = DefaultValue::Get('payment method');
            $methods = [];
            foreach($defaults as $default){
                array_push($methods, $default->name);
            }

            return view('auth.post-register.method', compact('methods'));
        }
    }

    public function tax(Request $request) {
        if(!empty($request->all())){
            $request->validate([
                'items' => 'required',
            ]);

            $taxes = json_decode($request->input('items'));

            foreach($taxes as $tax) {
                Tax::insert([
                    'name'          => $tax->label,
                    'rate'          => $tax->value,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }

            return redirect()->route('post-register.complete');
        } else {
            $defaults = DefaultValue::Get('tax');
            $taxes = [];
            foreach($defaults as $default){
                array_push($taxes, ['label' => $default->name, 'value' => $default->value]);
            }

            return view('auth.post-register.tax', compact('taxes'));
        }
    }

    public function complete() {
        return view('auth.post-register.complete');
    }
}
