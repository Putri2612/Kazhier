<?php

namespace App\Http\Controllers\api\v2;

use App\Classes\Pagination;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Traits\ApiResponse;
use App\Traits\CanProcessNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    use ApiResponse, 
        CanProcessNumber;
    
    public function get(Request $request) {

        if(!Auth::user()->can('manage assets')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'  => 'nullable|numeric',
            'limit' => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query  = Asset::where('created_by', Auth::user()->creatorId());

        $page   = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $assets = $query->select('id', 'name', 'purchase_date', 'supported_date', 'type', 'amount', 'description')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();

        return $this->PaginationSuccess($assets, $page['totalPage']);
    }

    public function types() {
        return $this->FetchSuccessResponse(Asset::$types);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create assets')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'type'              => 'required',
            'purchase_date'     => 'required',
            'supported_date'    => 'required',
            'amount'            => 'required',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Some data is missing');
        }

        $amount = $this->ReadableNumberToFloat($request->input('amount'));

        $asset                  = new Asset();
        $asset->name            = $request->input('name');
        $asset->type            = $request->input('type');
        $asset->purchase_date   = $request->input('purchase_date');
        $asset->supported_date  = $request->input('supported_date');
        $asset->amount          = $amount;
        $asset->description     = $request->input('description');
        $asset->created_by      = Auth::user()->creatorId();
        $asset->save();

        return $this->CreateSuccessResponse();
    }

    public function update(Request $request, $id) {
        if(!Auth::user()->can('edit assets')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'purchase_date' => 'required',
            'supported_date' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('Some data is missing');
        }

        $asset = Asset::where('created_by', Auth::user()->creatorId())
                ->where('id', $id)
                ->first();
        
        if(empty($asset)) {
            return $this->NotFoundResponse();
        }

        $amount = $this->ReadableNumberToFloat($request->input('amount'));

        $asset->name           = $request->input('name');
        $asset->type           = $request->input('type');
        $asset->purchase_date  = $request->input('purchase_date');
        $asset->supported_date = $request->input('supported_date');
        $asset->amount         = $amount;
        $asset->description    = $request->input('description');
        $asset->save();

        return $this->EditSuccessResponse();
    }

    public function destroy($id) {
        if(!Auth::user()->can('delete assets')) {
            return $this->UnauthorizedResponse();
        }

        $asset = Asset::where('created_by', Auth::user()->creatorId())
                ->where('id', $id)
                ->first();

        if(empty($asset)) {
            return $this->NotFoundResponse();
        }

        $asset->delete();

        return $this->DeleteSuccessResponse();
    }
}
