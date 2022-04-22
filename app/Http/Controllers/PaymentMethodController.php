<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\DefaultValue;
use App\Models\PaymentMethod;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    use ApiResponse;

    public function index()
    {
        if(\Auth::user()->can('manage constant payment method'))
        {
            $paymentMethods = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('paymentMethod.index', compact('paymentMethods'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage constant payment method')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query  = PaymentMethod::where('created_by', Auth::user()->creatorId());
        $page   = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $methods = $query->select('id', 'name')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();

        if(empty($methods)) {
            return $this->NotFoundResponse();
        }

        return $this->PaginationSuccess($methods, $page['totalPage']);
    }

    public function create()
    {
        if(\Auth::user()->can('create constant payment method'))
        {
            $methods    = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name');
            $defaults   = DefaultValue::where('type', '=', 'payment method')->whereNotIn('name', $methods)->get()->pluck('name');

            return view('paymentMethod.create', compact('defaults'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create constant payment method'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:20',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('payment-method.index')->with('error', $messages->first());
            }
            $paymentMethod             = new PaymentMethod();
            $paymentMethod->name       = $request->name;
            $paymentMethod->created_by = \Auth::user()->creatorId();
            $paymentMethod->save();

            return redirect()->route('payment-method.index')->with('success', __('Payment method successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(PaymentMethod $paymentMethod)
    {
        if(\Auth::user()->can('edit constant payment method'))
        {
            if($paymentMethod->created_by == \Auth::user()->creatorId())
            {
                return view('paymentMethod.edit', compact('paymentMethod'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        if(\Auth::user()->can('edit constant payment method'))
        {
            if($paymentMethod->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('payment-method.index')->with('error', $messages->first());
                }
                $paymentMethod->name = $request->name;
                $paymentMethod->save();

                return redirect()->route('payment-method.index')->with('success', __('Payment method successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        if(\Auth::user()->can('delete constant payment method'))
        {
            if($paymentMethod->created_by == \Auth::user()->creatorId())
            {
                $paymentMethod->delete();

                return redirect()->route('payment-method.index')->with('success', __('Payment method successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
