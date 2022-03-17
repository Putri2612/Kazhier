<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Traits\ApiResponse;
use App\Traits\CanManageIDs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use ApiResponse, CanManageIDs;
    public function get(){
        $customers  = Customer::where('created_by', '=', Auth::user()->creatorId())->get();
        $data       = [];
        
        foreach($customers as $customer) {
            $email  = $customer->email ? $customer->email : 'noemail@example.com';
            array_push($data, [
                'id'                => $customer->id,
                'customer_id'       => $customer->customer_id,
                'customer_name'     => $customer->name,
                'customer_cell'     => $customer->contact,
                'customer_address'  => $customer->billing_address,
                'customer_email'    => $email,
                'customer_category' => $customer->category_id,
            ]);
        }

        return $this->FetchSuccessResponse($data);
    }

    public function name($name) {
        $customer = Customer::where('created_by', Auth::user()->creatorId())->where('name', $name)->first();
        if(empty($customer)) {
            return $this->NotFoundResponse();
        }

        $email  = $customer->email ? $customer->email : 'noemail@example.com';
        $output = [
            'id'                => $customer->id,
            'customer_id'       => $customer->customer_id,
            'customer_name'     => $customer->name,
            'customer_cell'     => $customer->contact,
            'customer_address'  => $customer->billing_address,
            'customer_email'    => $email,
            'customer_category' => $customer->category_id,
        ];

        return $this->FetchSuccessResponse($output);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create customer')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'customer_name'     => 'required',
            'customer_cell'     => 'required',
            'customer_address'  => 'required'
        ]);

        if($validator->fails()){
            return $this->FailedResponse('Customer name, phone number, and address are required');
        }

        $customer = Customer::firstOrNew([
            'name'          => $request->input('customer_name'),
            'created_by'    => Auth::user()->creatorId()
        ],[
            'contact'           => $request->input('customer_cell'),
            'email'             => $request->has('customer_email') ? $request->input('customer_email') : 'noemail@example.com',
            'billing_name'      => $request->input('customer_name'),
            'billing_phone'     => $request->input('customer_cell'),
            'billing_address'   => $request->input('customer_address'),
            'category_id'       => empty($request->input('customer_category')) ? null : $request->input('customer_category'),
            'customer_id'       => $this->CustomerNumber()
        ]);

        
        if(!$customer->exists){
            $customer->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function edit(Request $request, $customer_id) {
        if(!Auth::user()->can('edit customer')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'customer_name'     => 'required',
            'customer_cell'     => 'required',
            'customer_address'  => 'required'
        ]);

        if($validator->fails()){
            return $this->FailedResponse('Customer name, phone number, and address are required');
        }

        $customer = Customer::where('id', $customer_id)->where('created_by', Auth::user()->creatorId())->first();

        if(empty($customer)) {
            return $this->NotFoundResponse();
        }

        $customer->name             = $request->input('customer_name'); 
        $customer->created_by       = Auth::user()->creatorId(); 
        $customer->contact          = $request->input('customer_cell'); 
        $customer->email            = $request->has('customer_email') ? $request->input('customer_email') : 'noemail@example.com'; 
        $customer->billing_name     = $request->input('customer_name'); 
        $customer->billing_phone    = $request->input('customer_cell'); 
        $customer->billing_address  = $request->input('customer_address'); 
        $customer->category_id      = empty($request->input('customer_category')) ? null : $request->input('customer_category'); 
        $customer->customer_id      = $this->CustomerNumber(); 

        return $this->EditSuccessResponse();
    }

    public function destroy($id) {
        if(!Auth::user()->can('delete customer')) {
            return $this->UnauthorizedResponse();
        }
        $user       = Auth::user();
        $creatorId  = $user->creatorId();
        $category = Customer::where('created_by', '=', $creatorId)->where('id' ,'=', $id)->first();
        if(!$category) {
            return $this->NotFoundResponse();
        }

        $category->delete();
        return $this->SuccessWithoutDataResponse('Data successfully deleted');
    }
}
