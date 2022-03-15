<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    use ApiResponse;
    public function get($method_id = 'all') {
        if(strtolower($method_id) != 'all') {
            $method = PaymentMethod::select('id', 'name')->where('id', $method_id)->where('created_by', Auth::user()->creatorId())->first();

            if(empty($method)) {
                return $this->NotFoundResponse();
            }

            return $this->FetchSuccessResponse($method);
        } else {
            $method = PaymentMethod::select('id', 'name')->where('created_by', Auth::user()->creatorId())->get();

            if($method->isEmpty()) {
                return $this->NotFoundResponse();
            }

            return $this->FetchSuccessResponse($method);
        }
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create constant payment method')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
                'name' => 'required|max:20',
            ]
        );

        if($validator->fails()) {
            return $this->FailedResponse('name is missing');
        }
        $paymentMethod             = new PaymentMethod();
        $paymentMethod->name       = $request->name;
        $paymentMethod->created_by = Auth::user()->creatorId();
        $paymentMethod->save();

        return $this->CreateSuccessResponse();
    }

    public function edit(Request $request, $method_id) {
        if(!Auth::user()->can('edit constant payment method')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
                'name' => 'required|max:20',
            ]
        );

        if($validator->fails()) {
            return $this->FailedResponse('name is missing');
        }

        $paymentMethod  = PaymentMethod::where('id', $method_id)->where('created_by', Auth::user()->creatorId())->first();

        if(empty($paymentMethod)) {
            return $this->NotFoundResponse();
        }

        $paymentMethod->name    = $request->name;
        $paymentMethod->save();

        return $this->EditSuccessResponse();
    }

    public function destroy($method_id) {
        if(!Auth::user()->can('delete constant payment method')) {
            return $this->UnauthorizedResponse();
        }

        $paymentMethod  = PaymentMethod::where('id', $method_id)->where('created_by', Auth::user()->creatorId())->first();

        if(empty($paymentMethod)) {
            return $this->NotFoundResponse();
        }

        $paymentMethod->delete();

        return $this->DeleteSuccessResponse();
    }
}
