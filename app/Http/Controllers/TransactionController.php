<?php

namespace App\Http\Controllers;

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
        if(\Auth::user()->can('manage transaction'))
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
        if(!Auth::user()->can('manage revenue')) {
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
        $settings = Utility::settings();

        $totalData = Transaction::where('created_by', Auth::user()->creatorId())->count();
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

        $query = Transaction::with(['bankAccount:id,bank_name,holder_name'])
                ->select('id', 'amount', 'description', 'date', 'account', 'type', 'category')
                ->where('created_by', Auth::user()->creatorId())
                ->orderBy('date', 'desc')
                ->skip($skip)->take($limit);

        if(!empty($request->input('date')))
        {
            $date_range = explode(' - ', $request->input('date'));
            $query->whereBetween('date', $date_range);
        }

        if(!empty($request->input('account')))
        {
            $query->where('account_id', '=', $request->input('account'));
        }

        $transaction = $query->get();

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

        if($transaction->isEmpty()) {
            return $this->NotFoundResponse();
        } else {
            return $this->FetchSuccessResponse([
                'data'      => $transaction,
                'pages'     => $totalPage,
                'currency'  => $settings['site_currency'],
                'date'      => $format,
            ]);
        }
    }

}
