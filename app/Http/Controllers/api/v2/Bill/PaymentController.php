<?php

namespace App\Http\Controllers\api\v2\Bill;

use App\Classes\Pagination;
use App\Http\Controllers\Controller;
use App\Models\BillPayment;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    use ApiResponse, CanManageBalance;

    public function get(Request $request, $bill_id) {
        if(!Auth::user()->can('manage bill')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'          => 'nullable|numeric',
            'limit'         => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query = BillPayment::where('bill_id', $bill_id);

        $page = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $payments = $query->select(
                    'id', 
                    'date',
                    'amount',
                    'bill_id', 
                    'account_id',
                    'served_by',
                )->with([
                    'paymentMethod',
                    'bankkAccount',
                    'server'
                ])->orderBy('date', 'desc')
                ->skip($page['skip'])->take($page['limit'])
                ->get();

        return $this->FetchSuccessResponse([
            'data'  => $payments, 
            'pages' => $page['totalPage']
        ]);
    }
}
