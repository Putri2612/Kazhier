<?php

namespace App\Http\Controllers;

use App\Exports\PaymentExport;
use App\Models\BankAccount;
use App\Models\BillPayment;
use App\Mail\BillPaymentCreate;
use App\Mail\SendWorkspaceInvication;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Transaction;
use App\Models\Vender;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use App\Traits\CanUploadFile;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    use CanManageBalance, CanProcessNumber, CanUploadFile, CanRedirect;

    public function index(Request $request)
    {
        if(\Auth::user()->can('manage payment'))
        {
            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $vender->prepend(__('All'), '');

            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');

            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get()->pluck('name', 'id');
            $category->prepend(__('All'), '');

            $payment = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payment->prepend(__('All'), '');

            $query = Payment::where('created_by', '=', \Auth::user()->creatorId());

            if(!empty($request->date))
            {
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('date', $date_range);
            }

            if(!empty($request->vender))
            {
                $query->where('id', '=', $request->vender);
            }
            if(!empty($request->account))
            {
                $query->where('account_id', '=', $request->account);
            }

            if(!empty($request->category))
            {
                $query->where('category_id', '=', $request->category);
            }

            if(!empty($request->payment))
            {
                $query->where('payment_method', '=', $request->payment);
            }
            $unsorted = $query->get();
            $payments = $unsorted->sortByDesc('date')->values()->all();


            return view('payment.index', compact('payments', 'account', 'category', 'payment', 'vender'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create payment'))
        {
            $venders    = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $venders->prepend(__('Select vender'), null);
            $venders    = $venders->union(['new.vender' => __('Create new vender')]);

            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get()->pluck('name', 'id');
            $categories->prepend(__('Select category'), null);
            $categories = $categories->union(['new.product-category' => __('Create new category')]);

            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments->prepend(__('Select payment method'), null);
            $payments   = $payments->union(['new.payment-method' => __('Create new payment method')]);

            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts->prepend(__('Select bank account'), null);
            $accounts   = $accounts->union(['new.bank-account' => __('Create new bank account')]);

            return view('payment.create', compact('venders', 'categories', 'payments', 'accounts'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {

        if(\Auth::user()->can('create payment'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'category_id' => 'required',
                                   'payment_method' => 'required',
                                   'reference' => 'mimes:png,jpg,jpeg,pdf',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            $payment                 = new Payment();
            $payment->date           = $request->input('date');
            $payment->amount         = $amount;
            $payment->account_id     = $request->input('account_id');
            $payment->vender_id      = ($request->input('vender_id') != '' ? $request->input('vender_id') : null);
            $payment->category_id    = $request->input('category_id');
            $payment->payment_method = $request->input('payment_method');
            $payment->description    = $request->input('description');
            $payment->created_by     = \Auth::user()->creatorId();

            if($request->hasFile('reference')){
                $payment->reference  = $this->UploadFile($request->file('reference'), 'reference');
            }

            $payment->save();

            $this->AddBalance($request->input('account_id'), -($amount), $request->input('date'));

            $category            = ProductServiceCategory::where('id', $request->input('category_id'))->first();
            $payment->payment_id = $payment->id;
            $payment->type       = 'Payment';
            $payment->category   = $category->name;
            $payment->user_id    = $payment->vender_id;
            $payment->user_type  = 'Vender';

            Transaction::addTransaction($payment);

            $vender          = Vender::where('id', $request->input('vender_id'))->first();

            if(!empty($vender)){
                $payment_method  = PaymentMethod::where('id', $request->input('payment_method'))->first();
                $payment         = new BillPayment();
                $payment->name   = $vender['name'];
                $payment->method = $payment_method['name'];
                $payment->date   = \Auth::user()->dateFormat($request->input('date'));
                $payment->amount = \Auth::user()->priceFormat($amount);
                $payment->bill   = '';

                try {
                    Mail::to($vender['email'])->send(new BillPaymentCreate($payment));
                } catch(\Exception $e) {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }
            }

            return redirect()->route('payment.index')->with('success', __('Payment successfully created.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function show(Payment $payment){
        return view('payment.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        if(\Auth::user()->can('edit payment'))
        {
            $venders    = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $venders->prepend(__('Select vender'), null);
            $venders    = $venders->union(['new.vender' => __('Create new vender')]);

            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get()->pluck('name', 'id');
            $categories->prepend(__('Select category'), null);
            $categories = $categories->union(['new.product-category' => __('Create new category')]);

            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments->prepend(__('Select payment method'), null);
            $payments   = $payments->union(['new.payment-method' => __('Create new payment method')]);

            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts->prepend(__('Select bank account'), null);
            $accounts   = $accounts->union(['new.bank-account' => __('Create new bank account')]);

            $payment->amount = $this->FloatToReadableNumber($payment->amount);

            return view('payment.edit', compact('venders', 'categories', 'payments', 'accounts', 'payment'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Payment $payment)
    {
        if(\Auth::user()->can('edit payment'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'category_id' => 'required',
                                   'payment_method' => 'required',
                                   'reference' => 'mimes:png,jpg,jpeg,pdf'
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if($request->hasFile('reference')){
                if($payment->reference != 'nofile.svg'){
                    $payment->reference = $this->ReplaceFile($payment->reference, $request->file('reference'), 'reference');
                } else {
                    $payment->reference = $this->UploadFile($request->file('reference'), 'reference');
                }
            }

            $amount = $this->ReadableNumberToFloat($request->input('amount'));
            $difference = $amount - $payment->amount;
            $this->AddBalance($request->input('account_id'), -($difference), $request->input('date'));

            $payment->date           = $request->input('date');
            $payment->amount         = $amount;
            $payment->account_id     = $request->input('account_id');
            $payment->vender_id      = ($request->input('vender_id') != '' ? $request->input('vender_id') : null);
            $payment->category_id    = $request->input('category_id');
            $payment->payment_method = $request->input('payment_method');
            $payment->description    = $request->input('description');
            $payment->save();

            $category            = ProductServiceCategory::where('id', $request->category_id)->first();
            $payment->category   = $category->name;
            $payment->payment_id = $payment->id;
            $payment->type       = 'Payment';
            Transaction::editTransaction($payment);

            return redirect()->route('payment.index')->with('success', __('Payment successfully updated.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }


    public function destroy(Payment $payment)
    {
        if(\Auth::user()->can('delete payment'))
        {
            if($payment->created_by == \Auth::user()->creatorId())
            {
                if($payment->reference != "nofile.svg"){
                    $this->DeleteFile($payment->reference, 'reference');
                }

                $this->AddBalance($payment->account_id, $payment->amount, $payment->date);

                $payment->delete();
                $type = 'Payment';
                $user = 'Vender';
                Transaction::destroyTransaction($payment->id, $type, $user);

                return redirect()->route('payment.index')->with('success', __('Payment successfully deleted.'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function export() {
        if(Auth::user()->type == 'company'){
            return Excel::download(new PaymentExport, 'payments.xlsx');
        } else {
            return $this->RedirectDenied();
        }
    }
}
