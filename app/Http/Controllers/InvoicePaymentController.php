<?php

namespace App\Http\Controllers;

use App\Classes\Helper;
use App\Mail\InvoicePaymentCreate;
use App\Mail\PaymentReminder;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Transaction;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InvoicePaymentController extends Controller
{
    use CanRedirect, CanManageBalance, CanProcessNumber;

    public function create($invoice_id) {
        if(Auth::user()->can('create payment invoice')) {
            $invoice = Invoice::where('id', $invoice_id)
                        ->where('created_by', Auth::user()->creatorId())
                        ->first();

            $payments   = PaymentMethod::select('name', 'id')
                            ->where('created_by', '=', Auth::user()->creatorId())
                            ->pluck('name', 'id');

            $accounts   = BankAccount::select('id', DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))
                            ->where('created_by', Auth::user()->creatorId())
                            ->pluck('name', 'id');

            return view('invoice.payment', compact('payments', 'accounts', 'invoice'));
        }
    }

    public function store(Request $request, $invoice_id) {
        if(Auth::user()->can('create payment invoice')) {
            $validator = Validator::make($request->all(), [
                'date' => 'required',
                'amount' => 'required',
                'account_id' => 'required',
                'payment_method' => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            $invoicePayment                 = new InvoicePayment();
            $invoicePayment->invoice_id     = $invoice_id;
            $invoicePayment->date           = $request->input('date');
            $invoicePayment->amount         = $amount;
            $invoicePayment->account_id     = $request->input('account_id');
            $invoicePayment->payment_method = $request->input('payment_method');
            $invoicePayment->reference      = $request->input('reference');
            $invoicePayment->description    = $request->input('description');
            $invoicePayment->created_by     = Auth::user()->creatorId();
            $invoicePayment->save();
            $this->AddBalance($request->input('account_id'), $amount, $request->input('date'));

            $invoice = Invoice::with(['customer'])->where('id', $invoice_id)->first();
            $due     = $invoice->getDue();
            
            if($invoice->status == 0)
            {
                $invoice->send_date = date('Y-m-d');
                $invoice->save();
            }

            $invoice->updateStatus();

            $invoicePayment->user_id    = $invoice->customer_id;
            $invoicePayment->user_type  = 'Customer';
            $invoicePayment->type       = 'Partial';
            $invoicePayment->created_by = Auth::user()->id;
            $invoicePayment->payment_id = $invoicePayment->id;
            $invoicePayment->category   = 'Invoice';

            Transaction::addTransaction($invoicePayment);

            $customer = $invoice->customer;

            if(!empty($customer->email) && !str_contains($customer->email ,'@example.com')) {
                $payment            = $invoicePayment;
                $payment->name      = $customer->name;
                $payment->date      = Helper::DateFormat($request->input('date'));
                $payment->amount    = Auth::user()->priceFormat($amount);
                $payment->invoice   = 'invoice ' . Auth::user()->invoiceNumberFormat($invoice->invoice_id);
                $payment->dueAmount = Auth::user()->priceFormat($invoice->getDue());
    
                try
                {
                    Mail::to($customer->email)->send(new InvoicePaymentCreate($payment));
                }
                catch(\Exception $e)
                {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }
            }


            return redirect()->back()->with('success', __('Payment successfully added.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        } else {
            return $this->RedirectDenied();
        }
    }

    public function destroy(Request $request, $invoice_id, $payment_id) {
        if(Auth::user()->can('delete payment invoice'))
        {
            $invoicePayment = InvoicePayment::where('id', '=', $payment_id)->first();
            $this->AddBalance($invoicePayment->account_id, -($invoicePayment->amount), $invoicePayment->date);
            $invoicePayment->delete();
            
            $invoice = Invoice::where('id', $invoice_id)->first();
            $invoice->updateStatus();

            $type = 'Partial';
            $user = 'Customer';
            Transaction::destroyTransaction($payment_id, $type, $user);

            return redirect()->back()->with('success', __('Payment successfully deleted.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function reminder($invoice_id) {
        $invoice            = Invoice::find($invoice_id);
        $customer           = Customer::where('id', $invoice->customer_id)->first();
        $invoice->dueAmount = Auth:: user()->priceFormat($invoice->getDue());
        $invoice->name      = $customer['name'];
        $invoice->date      = Helper::DateFormat($invoice->send_date);
        $invoice->invoice   = Auth::user()->invoiceNumberFormat($invoice->invoice_id);

        try
        {
            Mail::to($customer['email'])->send(new PaymentReminder($invoice));
        }
        catch(\Exception $e)
        {
            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
        }

        return redirect()->back()->with('success', __('Payment reminder successfully send.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
    }
}
