<?php

namespace App\Http\Controllers\api\v2;

use App\Classes\Pagination;
use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\BillPayment;
use App\Models\CustomField;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Transfer;
use App\Traits\ApiResponse;
use App\Traits\CanProcessNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    use ApiResponse, 
        CanProcessNumber;

    public function get(Request $request) {
        if(!Auth::user()->can('manage bank account')) {
            return $this->UnauthorizedResponse();
        }

        $query = BankAccount::where('created_by', Auth::user()->creatorId());
        
        $page = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $accounts = $query->select(
                        'id', 
                        'holder_name', 
                        'bank_name', 
                        'account_number', 
                        'contact_number', 
                        'bank_address'
                    )->skip($page['skip'])->take($page['limit'])
                    ->get();
        
        return $this->PaginationSuccess($accounts, $page['totalPage']);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create bank account')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make(
            $request->all(),
            [
                'holder_name'       => 'required',
                'bank_name'         => 'required',
                'account_number'    => 'required',
                'opening_balance'   => 'required',
                'contact_number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]
        );

        if($validator->fails()) {
            return $this->FailedResponse('Some data is missing');
        }

        $user       = Auth::user();
        $total_bank = $user->countBankAccount();
        $plan       = $user->activePlan;
        $max_bank   = $plan->max_bank_accounts;
        if ($total_bank < $max_bank || $max_bank == -1) {
            $opening_balance    = $this->ReadableNumberToFloat($request->input('opening_balance'));

            $account                  = new BankAccount();
            $account->holder_name     = $request->input('holder_name');
            $account->bank_name       = $request->input('bank_name');
            $account->account_number  = $request->input('account_number');
            $account->opening_balance = $opening_balance;
            $account->current_balance = 0;
            $account->contact_number  = $request->input('contact_number');
            $account->bank_address    = $request->input('bank_address');
            $account->created_by      = $user->creatorId();
            $account->save();
            CustomField::saveData($account, $request->input('customField'));


            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedResponse(__('You already have :number bank accounts, please upgrade to create more', ['number' => $max_bank]));
        }
    }

    public function update(Request $request, $id) {
        if(!Auth::user()->can('edit bank account')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make(
            $request->all(),
            [
                'holder_name'       => 'required',
                'bank_name'         => 'required',
                'account_number'    => 'required',
                'opening_balance'   => 'required',
                'contact_number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]
        );

        if($validator->fails()) {
            return $this->FailedResponse('Some data is missing');
        }

        $account = BankAccount::find($id);

        if(empty($account) || $account->created_by != Auth::user()->creatorId()) {
            return $this->NotFoundResponse();
        }

        $opening_balance    = $this->ReadableNumberToFloat($request->input('opening_balance'));

        $account->holder_name     = $request->input('holder_name');
        $account->bank_name       = $request->input('bank_name');
        $account->account_number  = $request->input('account_number');
        $account->opening_balance = $opening_balance;
        $account->contact_number  = $request->input('contact_number');
        $account->bank_address    = $request->input('bank_address');
        $account->created_by      = Auth::user()->creatorId();
        $account->CurrentBalance();
        $account->save();
        CustomField::saveData($account, $request->input('customField'));

        return $this->EditSuccessResponse();
    }

    public function destroy($id) {
        if(!Auth::user()->can('delete bank account')) {
            return $this->UnauthorizedResponse();
        }

        $account = BankAccount::find($id);

        if(empty($account) || $account->created_by != Auth::user()->creatorId()) {
            return $this->NotFoundResponse();
        }

        $revenues   = Revenue::where('account_id', $id)->count();
        $invoices   = InvoicePayment::where('account_id', $id)->count();
        $payments   = Payment::where('account_id', $id)->count();
        $bills      = BillPayment::where('account_id', $id)->count();
        $transfers  = Transfer::where('from_account', $id)
                    ->orWhere('to_account', $id)
                    ->count();

        if(
            empty($revenues) && 
            empty($invoices) &&
            empty($payments) &&
            empty($bills) &&
            empty($transfers)
        ) {
            $account->forceDelete();

            DB::table('balance')->where('account_id', $id) 
                ->delete();

            return $this->DeleteSuccessResponse();
        } else {
            return $this->FailedResponse('Please delete related record of this account.');
        }
    }
}
