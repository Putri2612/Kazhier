<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\InvoicePayment;
use App\Mail\BillPaymentCreate;
use App\Mail\InvoicePaymentCreate;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\Transaction;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RevenueController extends Controller
{
    
    public function index(Request $request)
    {
        if(\Auth::user()->can('manage revenue'))
        {
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend('All', '');

            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('All', '');

            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type','=',1)->get()->pluck('name', 'id');
            $category->prepend('All', '');

            $payment = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payment->prepend('All', '');


            $query = Revenue::where('created_by', '=', \Auth::user()->creatorId());

            if(!empty($request->date))
            {
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('date', $date_range);
            }

            if(!empty($request->customer))
            {
                $query->where('id', '=', $request->customer);
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
            $revenues = $unsorted->sortByDesc('date')->values()->all();

            return view('revenue.index', compact('revenues', 'customer', 'account', 'category', 'payment'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {

        if(\Auth::user()->can('create revenue'))
        {
            $customers  = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customers->prepend(__('Select customer'), null);
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type','=',1)->get()->pluck('name', 'id');
            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('revenue.create', compact('customers', 'categories', 'payments', 'accounts'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create revenue'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'category_id' => 'required',
                                   'payment_method' => 'required',
                                   'reference' => 'mimes:png,jpeg,jpg,pdf',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $revenue                 = new Revenue();
            $revenue->date           = $request->date;
            $revenue->amount         = $request->amount;
            $revenue->account_id     = $request->account_id;
            $revenue->customer_id    = $request->customer_id;
            $revenue->category_id    = $request->category_id;
            $revenue->payment_method = $request->payment_method;
            $revenue->description    = $request->description;
            $revenue->created_by     = \Auth::user()->creatorId();

            if(!empty($request->reference)){
                $originalRefName         = $request->file('reference')->getClientOriginalName();
                $referenceImageName      = \Auth::user()->creatorId() . '_R_' . uniqid() . '_' . $originalRefName;
                $path                    = $request->file('reference')->storeAs('public/reference', $referenceImageName);
                $revenue->reference      = $referenceImageName;
            }
            $revenue->save();

            \Auth::user()->addBalance($request->date, $request->amount, $request->account_id);

            $category            = ProductServiceCategory::where('id', $request->category_id)->first();
            $revenue->payment_id = $revenue->id;
            $revenue->type       = 'Payment';
            $revenue->category   = $category->name;
            $revenue->user_id    = $revenue->customer_id;
            $revenue->user_type  = 'Customer';

            Transaction::addTransaction($revenue);

            $customer = Customer::where('id',  $request->customer_id)->first();
            $payment          = new InvoicePayment();
            $payment->name    = $customer['name'];
            $payment->date    = \Auth::user()->dateFormat($request->date);
            $payment->amount  = \Auth::user()->priceFormat($request->amount);
            $payment->invoice = '';

            try
            {
                Mail::to($customer['email'])->send(new InvoicePaymentCreate($payment));
            }
            catch(\Exception $e)
            {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }

            return redirect()->route('revenue.index')->with('success', __('Revenue successfully created.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Revenue $revenue){
        return view('revenue.show', compact('revenue'));
    }

    public function edit(Revenue $revenue)
    {
        if(\Auth::user()->can('edit revenue'))
        {
            $customers  = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customers->prepend(__('Select customer'), '');
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type','=',1)->get()->pluck('name', 'id');
            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('revenue.edit', compact('customers', 'categories', 'payments', 'accounts', 'revenue'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Revenue $revenue)
    {
        if(\Auth::user()->can('edit revenue'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'category_id' => 'required',
                                   'payment_method' => 'required',
                                   'reference' => 'mimes:png,jpeg,jpg,pdf',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            if(!empty($request->reference)){
                $dir                     = storage_path('app/public/reference/');
                $imgPath                 = $dir . $revenue->reference;

                if(File::exists($imgPath) && $revenue->reference != 'nofile.svg'){
                    File::delete($imgPath);
                }

                $originalRefName         = $request->file('reference')->getClientOriginalName();
                $referenceImageName      = \Auth::user()->creatorId() . '_R_' . uniqid() . '_' . $originalRefName;
                $path                    = $request->file('reference')->storeAs('public/reference', $referenceImageName);
                $revenue->reference      = $referenceImageName;
            }
            $difference = $revenue->amount - $request->amount;
            \Auth::user()->addBalance($request->date, $difference, $request->account_id);
            
            $revenue->date           = $request->date;
            $revenue->amount         = $request->amount;
            $revenue->account_id     = $request->account_id;
            $revenue->customer_id    = $request->customer_id;
            $revenue->category_id    = $request->category_id;
            $revenue->payment_method = $request->payment_method;
            
            $revenue->description    = $request->description;
            $revenue->save();

            $category            = ProductServiceCategory::where('id', $request->category_id)->first();
            $revenue->category   = $category->name;
            $revenue->payment_id = $revenue->id;
            $revenue->type       = 'Payment';


            Transaction::editTransaction($revenue);

            return redirect()->route('revenue.index')->with('success', __('Revenue successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Revenue $revenue)
    {

        if(\Auth::user()->can('delete revenue'))
        {
            if($revenue->created_by == \Auth::user()->creatorId())
            {
                $dir                     = storage_path('app/public/reference/');
                $imgPath                 = $dir . $revenue->reference;
                
                if(File::exists($imgPath) && $revenue->reference != "nofile.svg"){
                    File::delete($imgPath);
                }
                \Auth::user()->addBalance($revenue->date, -($revenue->amount), $revenue->account_id);
                $revenue->delete();
                $type = 'Payment';
                $user = 'Customer';
                Transaction::destroyTransaction($revenue->id, $type, $user);

                return redirect()->route('revenue.index')->with('success', __('Revenue successfully deleted.'));
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
