<?php

namespace App\Http\Controllers;

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

        $query = PaymentMethod::where('created_by', Auth::user()->creatorId());
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

        $methods = $query->select('id', 'name')
                    ->skip($skip)->take($limit)
                    ->get();
        if(empty($methods)) {
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
            'data'      => $methods,
            'pages'     => $totalPage,
            'currency'  => $settings['site_currency'],
            'date'      => $format,
        ]);
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
