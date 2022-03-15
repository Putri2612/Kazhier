<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Vender;
use App\Traits\ApiResponse;
use App\Traits\CanManageIDs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    use ApiResponse, CanManageIDs;

    public function get($supplier_id) {
        $user = Auth::user();

        $query = Vender::select(
            'id AS suppliers_id',
            'name AS suppliers_name',
            'contact AS suppliers_cell',
            'shipping_address AS suppliers_address',
            'email AS suppliers_email',
        )->where('created_by', $user->creatorId());

        if($supplier_id == 'all') {
            $supplier = $query->get();
        } else {
            $supplier = $query->where('id', $supplier_id)->first();
        }

        return $this->FetchSuccessResponse($supplier);
    }

    public function create (Request $request) {
        if(!Auth::user()->can('create vender')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'suppliers_name'    => 'required',
            'suppliers_cell'    => 'required',
            'suppliers_address' => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('One or more parameter are missing');
        }

        $user   = Auth::user();
        $email  = $request->has('suppliers_email') ? $request->input('suppliers_email') : '';

        $vender = Vender::firstOrNew([
            'name'          => $request->input('suppliers_name'),
            'created_by'    => $user->creatorId()
        ], [
            'contact'       => $request->input('suppliers_cell'),
            'billing_name'  => $request->input('suppliers_name'),
            'billing_phone' => $request->input('suppliers_cell'),
            'billing_address'=> $request->input('suppliers_address'),
            'shipping_name'  => $request->input('suppliers_name'),
            'shipping_phone' => $request->input('suppliers_cell'),
            'shipping_address'=> $request->input('suppliers_address'),
            'email'         => $email,
            'vender_id'     => $this->VenderNumber()
        ]);

        if(!$vender->exists) {
            $vender->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function edit (Request $request, $supplier_id) {
        if(!Auth::user()->can('edit vender')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'suppliers_name'    => 'required',
            'suppliers_cell'    => 'required',
            'suppliers_address' => 'required'
        ]);

        if($validator->fails()) {
            $message = '';
            foreach($validator->errors()->all() as $key => $fail) {
                $message .= $fail;
                if($key < count($validator->errors()->all())) {
                    $message .= '\n';
                }
            }
            return $this->FailedResponse($message);
        }

        $user   = Auth::user();
        $email  = $request->has('suppliers_email') ? $request->input('suppliers_email') : '';

        $vender = Vender::where('id', $supplier_id)->where('created_by', $user->creatorId())->first();
        if(empty($vender)) {
            return $this->NotFoundResponse();
        }

        $vender->name               = $request->input('suppliers_name');
        $vender->contact            = $request->input('suppliers_cell');
        $vender->billing_name       = $request->input('suppliers_name');
        $vender->billing_phone      = $request->input('suppliers_cell');
        $vender->billing_address    = $request->input('suppliers_address');
        $vender->shipping_name      = $request->input('suppliers_name');
        $vender->shipping_phone     = $request->input('suppliers_cell');
        $vender->shipping_address   = $request->input('suppliers_address');
        $vender->email              = $email;
        $vender->save();

        return $this->EditSuccessResponse();
    }

    public function destroy($supplier_id) {
        if(!Auth::user()->can('delete vender')) {
            return $this->UnauthorizedResponse();
        }
        $user       = Auth::user();
        $creatorId  = $user->creatorId();
        $category = Vender::where('created_by', '=', $creatorId)->where('id' ,'=', $supplier_id)->first();
        if(!$category) {
            return $this->NotFoundResponse();
        }

        $category->delete();
        return $this->DeleteSuccessResponse();
    }
}
