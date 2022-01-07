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
                'customer_email'    => $email
            ]);
        }

        return $this->FetchSuccessResponse($data);
    }

    public function create(Request $request) {
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
            'email'             => $request->has('customer_email') ? $request->input('customer_email') : '',
            'billing_name'      => $request->input('customer_name'),
            'billing_phone'     => $request->input('customer_cell'),
            'billing_address'   => $request->input('customer_address'),
            'customer_id'       => $this->CustomerNumber()
        ]);

        
        if(!$customer->exists){
            $customer->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function destroy($id) {
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
