<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceUnit;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductServiceUnitController extends Controller
{
    use ApiResponse;
    public function get($unit_id) {
        $user   = Auth::user();
        $query  = ProductServiceUnit::select(
            'id AS weight_unit_id',
            'name AS weight_unit_name'
        )->where('created_by', '=', $user->creatorId());

        if($unit_id == 'all'){
            $unit = $query->get();
        } else {
            $unit = $query->where('id', '=', $unit_id)->first();
        }

        return $this->FetchSuccessResponse($unit);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create constant unit')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Unit name is missing');
        }

        $user = Auth::user();

        $unit = ProductServiceUnit::firstOrNew([
            'name'          => $request->input('unit_name'),
            'created_by'    => $user->creatorId()
        ], []);

        if(!$unit->exists) {
            $unit->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function edit(Request $request, $unit_id) {
        if(!Auth::user()->can('create constant unit')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'unit_name' => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Unit name is missing');
        }

        $unit = ProductServiceUnit::where('id', $unit_id)->where('created_by', Auth::user()->creatorId())->first();
        if(empty($unit)) {
            return $this->NotFoundResponse();
        }
        $unit->name = $request->input('unit_name');
        $unit->save();
        
        return $this->EditSuccessResponse();
    }

    public function destroy($unit_id) {
        if(!Auth::user()->can('delete constant unit')) {
            return $this->UnauthorizedResponse();
        }
        $user = Auth::user();
        $unit = ProductServiceUnit::where('id', $unit_id)->where('created_by', $user->creatorId())->first();

        if(empty($unit)) {
            return $this->NotFoundResponse();
        } else {
            $unit->delete;
            return $this->DeleteSuccessResponse();
        }
    }
}
