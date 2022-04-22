<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\BankAccount;
use App\Models\Transaction;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    use ApiResponse;
    public function index(Request $request)
    {
        if(Auth::user()->can('manage transaction'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');

            return view('transaction.index', compact('account'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage transaction')) {
            return $this->UnauthorizedResponse();
        }
        
        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
            'date'              => 'nullable|regex:/^[\d\-\s]*/i',
            'account'           => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }
        
        $query = Transaction::where('created_by', Auth::user()->creatorId());
        if(!empty($request->input('date')))
        {
            $date_range = explode(' - ', $request->input('date'));
            $query->whereBetween('date', $date_range);
        }

        if(!empty($request->input('account')))
        {
            $query->where('account_id', '=', $request->input('account'));
        }

        $page   = Pagination::getTotalPage($query, $request);
        if($page === false) {
            return $this->NotFoundResponse();
        }

        $transaction = $query->with(['bankAccount:id,bank_name,holder_name'])
                ->select('id', 'amount', 'description', 'date', 'account', 'type', 'category')
                ->where('created_by', Auth::user()->creatorId())
                ->orderBy('date', 'desc')
                ->skip($page['skip'])->take($page['limit'])
                ->get();

        if($transaction->isEmpty()) {
            return $this->NotFoundResponse();
        } 
        return $this->PaginationSuccess($transaction, $page['totalPage']);
    }

}
