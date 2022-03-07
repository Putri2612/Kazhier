<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\BillPayment;
use App\Models\CustomField;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Transaction;
use App\Models\Plan;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BankAccountController extends Controller
{
    use CanManageBalance, CanProcessNumber;

    public function index()
    {
        if(Auth::user()->can('create bank account'))
        {
            $accounts = BankAccount::where('created_by', '=', Auth::user()->creatorId())->get();
            foreach($accounts as $account){
                $account->current_balance   = $this->GetCurrentBalance($account);
            }
            return view('bankAccount.index', compact('accounts'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create bank account'))
        {
            $customFields = CustomField::where('module', '=', 'account')->get();

            return view('bankAccount.create', compact('customFields'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create bank account'))
        {

            $validator = Validator::make(
                $request->all(), 
                [
                    'holder_name' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'opening_balance' => 'required',
                    'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('bank-account.index')->with('error', $messages->first());
            }

                $objUser    = Auth::user();
                $total_user = $objUser->countBankAccount();
                $plan       = Plan::find($objUser->plan);
                if($total_user < $plan->max_bank_accounts || $plan->max_bank_accounts == -1)
                {
                    $opening_balance    = $this->ReadableNumberToFloat($request->input('opening_balance'));

                    $account                  = new BankAccount();
                    $account->holder_name     = $request->input('holder_name');
                    $account->bank_name       = $request->input('bank_name');
                    $account->account_number  = $request->input('account_number');
                    $account->opening_balance = $opening_balance;
                    $account->current_balance = 0;
                    $account->contact_number  = $request->input('contact_number');
                    $account->bank_address    = $request->input('bank_address');
                    $account->created_by      = Auth::user()->creatorId();
                    $account->save();
                    CustomField::saveData($account, $request->input('customField'));

                    return redirect()->route('bank-account.index')->with('success', __('Account successfully created.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Your bank account limit is over, Please upgrade plan.'));
                }

        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(BankAccount $bankAccount)
    {
        if(Auth::user()->can('edit bank account'))
        {
            if($bankAccount->created_by == Auth::user()->creatorId())
            {
                $bankAccount->customField       = CustomField::getData($bankAccount, 'account');
                $customFields                   = CustomField::where('module', '=', 'account')->get();

                $bankAccount->opening_balance   = number_format($bankAccount->opening_balance, 2, ',', '.');

                return view('bankAccount.edit', compact('bankAccount', 'customFields'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, BankAccount $bankAccount)
    {
        if(Auth::user()->can('create bank account'))
        {

            $validator = \Validator::make(
                $request->all(), 
                [
                    'holder_name' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'opening_balance' => 'required',
                    'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('bank-account.index')->with('error', $messages->first());
            }

            $opening_balance    = $this->ReadableNumberToFloat($request->input('opening_balance'));
            

            $bankAccount->holder_name     = $request->input('holder_name');
            $bankAccount->bank_name       = $request->input('bank_name');
            $bankAccount->account_number  = $request->input('account_number');
            $bankAccount->opening_balance = $opening_balance;
            $bankAccount->contact_number  = $request->input('contact_number');
            $bankAccount->bank_address    = $request->input('bank_address');
            $bankAccount->created_by      = Auth::user()->creatorId();
            $bankAccount->save();
            CustomField::saveData($bankAccount, $request->input('customField'));

            return redirect()->route('bank-account.index')->with('success', __('Account successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(BankAccount $bankAccount)
    {
        if(Auth::user()->can('delete bank account'))
        {
            if($bankAccount->created_by == Auth::user()->creatorId())
            {
                $revenue        = Revenue::where('account_id', $bankAccount->id)->first();
                $invoicePayment = InvoicePayment::where('account_id', $bankAccount->id)->first();
                $transaction    = Transaction::where('account', $bankAccount->id)->first();
                $payment        = Payment::where('account_id', $bankAccount->id)->first();
                $billPayment    = BillPayment::where('account_id', $bankAccount->id)->first();

                if(!empty($revenue) && !empty($invoicePayment) && !empty($transaction) && !empty($payment) && !empty($billPayment))
                {
                    return redirect()->route('bank-account.index')->with('error', __('Please delete related record of this account.'));
                }
                else
                {
                    $bankAccount->forceDelete();

                    return redirect()->route('bank-account.index')->with('success', __('Account successfully deleted.'));
                }

            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
