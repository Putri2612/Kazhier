<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\BillPayment;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Transaction;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    use ApiResponse;
    public function get(){
        $user       = Auth::user();

        $accounts   = BankAccount::select(
            'id AS account_id', 
            'holder_name AS account_holder_name', 
            'bank_name AS account_bank_name',
            'account_number',
            'current_balance AS account_current_balance'
            )->where('created_by', '=', $user->creatorId())->get();

        return $this->FetchSuccessResponse($accounts);
    }

    public function create(Request $request) {
        $validator  = Validator::make($request->all(), [
            'account_holder_name'       => 'required',
            'account_bank_name'         => 'required',
            'account_number'            => 'required',
            'account_opening_balance'   => 'required',
            'account_contact_number'    => 'required'
        ]);

        if($validator->fails()) {
            return $this->FailedResponse('One or more parameter is missing');
        }

        $user       = Auth::user();
        $creatorId  = $user->creatorId();
        if($user->countBankAccount() >= $user->getPlan->max_bank_accounts && $user->getPlan->max_bank_accounts != -1){
            return $this->FailedResponse(__('Your bank account limit is over, Please upgrade plan.'));
        }

        $bankAccount = BankAccount::firstOrNew([
            'holder_name'   => $request->input('account_holder_name'),
            'bank_name'     => $request->input('account_bank_name'),
            'account_number'=> $request->input('account_number'),
            'created_by'    => $creatorId,
        ], [
            'opening_balance'   => $request->input('account_opening_balance'),
            'current_balance'   => 0,
            'contact_number'    => $request->input('account_contact_number'),
            'bank_address'      => $request->has('account_bank_address') ? $request->input('account_bank_address') : '',
        ]);

        if(!$bankAccount->exists) {
            $bankAccount->save();
            return $this->CreateSuccessResponse();
        } else {
            return $this->FailedDataExistResponse();
        }
    }

    public function destroy($account_id) {
        $user = Auth::user();
        
        $account = BankAccount::where('created_by', '=', $user->creatorId())
                    ->where('id', '=', $account_id)->first();
        
        if($account) {
            $revenue        = Revenue::where('account_id', $account_id)->first();
            $invoicePayment = InvoicePayment::where('account_id', $account_id)->first();
            $transaction    = Transaction::where('account', $account_id)->first();
            $payment        = Payment::where('account_id', $account_id)->first();
            $billPayment    = BillPayment::where('account_id', $account_id)->first();

            if(!empty($revenue) && !empty($invoicePayment) && !empty($transaction) && !empty($payment) && !empty($billPayment)) {
                return $this->FailedResponse(__('Please delete related record of this account.'));
            }

            $account->forceDelete();
            DB::table('balance')->where('account_id', '=', $account_id)->where('created_by', '=', $user->creatorId())->delete();

            return $this->SuccessWithoutDataResponse('Data successfully deleted');
        }
    }
}
