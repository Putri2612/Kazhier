<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Transaction;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    use ApiResponse, CanManageBalance;
    public function get(Request $request) {
        $expense = Payment::select(
            'id AS expense_id',
            'description AS expense_note',
            'amount AS expense_amount',
            'date AS expense_date',
            'category_id AS expense_category',
            'account_id AS expense_account',
            'payment_method AS expense_payment_method',
        )
        ->where('created_by', Auth::user()->creatorId());
        if(!empty($request->input('search_text'))) {
            $search = $request->input('search_text');
            $expense->where('description', 'LIKE', "%{$search}%");
        }
        $expense = $expense->get();

        return $this->FetchSuccessResponse($expense);
    }

    public function create(Request $request) {
        if(!Auth::user()->can('create payment')){
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'expense_amount'            => 'required',
            'expense_date'              => 'required',
            'expense_category'          => 'required',
            'expense_payment_method'    => 'required',
            'expense_account'           => 'required',
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
        $creatorId = $user->creatorId();

        $account = BankAccount::where('created_by', $creatorId)->where('id', $request->input('expense_account'))->first();
        if(empty($account)) {
            $account = BankAccount::where('created_by', $creatorId)->first();
            if(empty($account)) {
                return $this->FailedResponse('You don\'t have any bank account');
            }
        }
        $account = $account->id;

        $category = ProductServiceCategory::where('created_by', $creatorId)->where('id', $request->input('expense_category'))->first();
        if(empty($category)) {
            $category = ProductServiceCategory::where('created_by', $creatorId)->where('type', 2)->first();
            if(empty($category)) {
                return $this->FailedResponse('You don\'t have any expense category');
            }
        }
        $category = $category->id;

        $method = PaymentMethod::where('created_by', $creatorId)->where('id', $request->input('expense_payment_method'))->first();
        if(empty($method)) {
            $method = PaymentMethod::where('created_by', $creatorId)->first()->id;
            if(empty($method)) {
                return $this->FailedResponse('You don\'t have any payment method');
            }
        }
        $method = $method->id;

        $payment = new Payment();
        $payment->amount        = $request->input('expense_amount');
        $payment->date          = $request->input('expense_date');
        $payment->category_id   = $category;
        $payment->account_id    = $account;
        $payment->payment_method= $method;
        $payment->description   = $request->has('expense_note') ? $request->input('expense_note') : '';
        $payment->vender_id     = $request->has('supplier_id') ? $request->input('supplier_id') : null;
        $payment->served_by     = $user->id;
        $payment->created_by    = $creatorId;
        $payment->save();

        $this->AddBalance($payment->account_id, -$payment->amount, $payment->date);

        $category            = $payment->category;
        $payment->payment_id = $payment->id;
        $payment->type       = 'Payment';
        $payment->category   = $category->name;
        $payment->user_id    = 0;
        $payment->user_type  = 'Vender';

        Transaction::addTransaction($payment);

        return $this->CreateSuccessResponse();
    }

    public function edit(Request $request, $payment_id) {
        if(!Auth::user()->can('edit payment')){
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'expense_amount'            => 'required',
            'expense_date'              => 'required',
            'expense_category'          => 'required',
            'expense_payment_method'    => 'required',
            'expense_account'           => 'required',
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
        $creatorId = $user->creatorId();

        $account = BankAccount::where('created_by', $creatorId)->where('id', $request->input('expense_account'))->first();
        if(empty($account)) {
            $account = BankAccount::where('created_by', $creatorId)->first();
            if(empty($account)) {
                $account = BankAccount::where('created_by', $creatorId)->first();
            }
        }

        $account = $account->id;

        $category = ProductServiceCategory::where('created_by', $creatorId)->where('id', $request->input('expense_category'))->first();
        if(empty($category)) {
            $category = ProductServiceCategory::where('created_by', $creatorId)->where('type', 2)->first();
            if(empty($category)) {
                return $this->FailedResponse('You don\'t have this expense category');
            }
        }
        $category = $category->id;

        $method = PaymentMethod::where('created_by', $creatorId)->where('id', $request->input('expense_payment_method'))->first();
        if(empty($method)) {
            $method = PaymentMethod::where('created_by', $creatorId)->first()->id;
            if(empty($method)) {
                return $this->FailedResponse('You don\'t have this payment method');
            }
        }
        $method = $method->id;

        $payment = Payment::where('created_by', $creatorId)->where('id', $payment_id)->first();

        if(empty($payment)) {
            return $this->NotFoundResponse();
        }

        $this->AddBalance($payment->account_id, $payment->amount, $payment->date);

        $payment->amount        = $request->input('expense_amount');
        $payment->date          = $request->input('expense_date');
        $payment->category_id   = $category;
        $payment->account_id    = $account;
        $payment->payment_method= $method;
        $payment->vender_id     = $request->has('supplier_id') ? $request->input('supplier_id') : $payment->vender_id;
        $payment->description   = $request->has('expense_note') ? $request->input('expense_note') : $payment->description;
        $payment->save();

        $this->AddBalance($payment->account_id, -$payment->amount, $payment->date);

        $category            = $payment->category;
        $payment->payment_id = $payment->id;
        $payment->type       = 'Payment';
        $payment->category   = $category->name;
        $payment->user_id    = 0;
        $payment->user_type  = 'Vender';

        Transaction::addTransaction($payment);

        return $this->EditSuccessResponse();
    }

    public function destroy($expense_id) {
        if(!Auth::user()->can('delete payment')) {
            return $this->UnauthorizedResponse();
        }

        $user = Auth::user();
        $payment = Payment::where('created_by', $user->creatorId())->where('id', $expense_id)->first();

        if(empty($payment)){
            return $this->NotFoundResponse();
        }

        $this->AddBalance($payment->account_id, $payment->amount, $payment->date);
        $payment->delete();

        $type = 'Payment';
        $user = 'Vender';
        Transaction::destroyTransaction($payment->id, $type, $user);

        return $this->DeleteSuccessResponse();
    }
}
