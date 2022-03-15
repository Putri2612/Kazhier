<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaxController extends Controller
{
    use ApiResponse;

    public function get($tax_id){
        $user   = Auth::user();
        $query  = Tax::select(
            'id AS tax_id',
            'name AS tax_name',
            'rate AS tax_rate'
        )->where('created_by', '=', $user->creatorId());
        if($tax_id == 'all') {
            $tax    = $query->get();
        } else {
            $tax    = $query->where('id', '=', $tax_id)->first();
        }

        return $this->FetchSuccessResponse($tax);
    }
    
    public function create(Request $request) {
        if(!Auth::user()->can('create constant tax')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'tax_name'  => 'required',
            'tax_rate'  => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Tax name or rate is missing');
        }

        $user = Auth::user();

        $tax    = Tax::firstOrNew([
            'name'      => $request->input('tax_name'),
            'created_by'=> $user->creatorId(),
        ], [
            'rate'      => $request->input('tax_rate')
        ]);

        if(!$tax->exists){
            $tax->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function edit(Request $request, $tax_id) {
        if(!Auth::user()->can('edit constant tax')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'tax_name'  => 'required',
            'tax_rate'  => 'required'
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

        $user = Auth::user();

        $tax = Tax::where('id', $tax_id)->where('created_by', $user->creatorId())->first();
        if(empty($tax)) {
            return $this->NotFoundResponse();
        }

        $tax->name  = $request->input('tax_name');
        $tax->rate  = $request->input('tax_rate');
        $tax->save();
            
        return $this->EditSuccessResponse();
    }

    public function destroy($tax_id) {
        if(!Auth::user()->can('delete constant tax')){
            return $this->UnauthorizedResponse();
        }
        $tax = Tax::where('created_by', Auth::user()->creatorId())->where('id', $tax_id)->first();

        if(empty($tax)){
            return $this->NotFoundResponse();
        }

        $tax->delete();
        return $this->DeleteSuccessResponse();
    }
}
