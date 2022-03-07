<?php

namespace App\Http\Controllers;

use App\Exports\RevenueExport;
use App\Imports\RevenueImport;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\InvoicePayment;
use App\Mail\BillPaymentCreate;
use App\Mail\InvoicePaymentCreate;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\Transaction;
use App\Traits\CanImport;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use App\Traits\CanUploadFile;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class RevenueController extends Controller
{
    use CanManageBalance,
        CanProcessNumber,
        CanUploadFile,
        CanRedirect, 
        CanImport;
    
    public function index(Request $request)
    {
        if(\Auth::user()->can('manage revenue'))
        {
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend(__('All'), '');

            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');

            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type','=',1)->get()->pluck('name', 'id');
            $category->prepend(__('All'), '');

            $payment = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payment->prepend(__('All'), '');


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
            return $this->RedirectDenied();
        }
    }


    public function create()
    {

        if(\Auth::user()->can('create revenue'))
        {
            $customers  = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customers->prepend(__('Select customer'), null);
            $customers  = $customers->union(['new.customer' => __('Create new customer')]);

            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type','=',1)->get()->pluck('name', 'id');
            $categories->prepend(__('Select category'), null);
            $categories = $categories->union(['new.product-category' => __('Create new category')]);

            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments->prepend(__('Select payment method'), null);
            $payments   = $payments->union(['new.payment-method' => __('Create new payment method')]);

            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts->prepend(__('Select bank account'), null);
            $accounts   = $accounts->union(['new.bank-account' => __('Create new bank account')]);

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

            $validator = Validator::make(
                $request->all(), [
                                   'date' => 'required',
                                   'amount' => 'required',
                                   'account_id' => 'required',
                                   'category_id' => 'required',
                                   'payment_method' => 'required',
                                   'reference' => 'mimes:png,jpeg,jpg,pdf',
                               ]
            );
            if($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            $revenue                 = new Revenue();
            $revenue->date           = $request->input('date');
            $revenue->amount         = $amount;
            $revenue->account_id     = $request->input('account_id');
            $revenue->customer_id    = ($request->input('customer_id') != '' ? $request->input('customer_id') : null);
            $revenue->category_id    = $request->input('category_id');
            $revenue->payment_method = $request->input('payment_method');
            $revenue->description    = $request->input('description');
            $revenue->created_by     = \Auth::user()->creatorId();

            if($request->hasFile('reference')){
                $revenue->reference      = $this->UploadFile($request->file('reference'), 'reference');
            }
            $revenue->save();

            $this->AddBalance($request->input('account_id'), $amount, $request->input('date'));

            $category            = ProductServiceCategory::where('id', $request->input('category_id'))->first();
            $revenue->payment_id = $revenue->id;
            $revenue->type       = 'Payment';
            $revenue->category   = $category->name;
            $revenue->user_id    = $revenue->customer_id;
            $revenue->user_type  = 'Customer';

            Transaction::addTransaction($revenue);

            $customer = Customer::where('id',  $request->input('customer_id'))->first();
            if(!empty($customer)){
                $payment          = new InvoicePayment();
                $payment->name    = $customer['name'];
                $payment->date    = \Auth::user()->dateFormat($request->input('date'));
                $payment->amount  = \Auth::user()->priceFormat($amount);
                $payment->invoice = '';

                try {
                    Mail::to($customer['email'])->send(new InvoicePaymentCreate($payment));
                } catch(\Exception $e) {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }
            }


            return redirect()->route('revenue.index')->with('success', __('Revenue successfully created.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        }
        else
        {
            return $this->RedirectDenied();
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
            $customers->prepend(__('Select customer'), null);
            $customers  = $customers->union(['new.customer' => __('Create new customer')]);

            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type','=',1)->get()->pluck('name', 'id');
            $categories->prepend(__('Select category'), null);
            $categories = $categories->union(['new.product-category' => __('Create new category')]);

            $payments   = PaymentMethod::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $payments->prepend(__('Select payment method'), null);
            $payments   = $payments->union(['new.payment-method' => __('Create new payment method')]);

            $accounts   = BankAccount::select('*', \DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $accounts->prepend(__('Select bank account'), null);
            $accounts   = $accounts->union(['new.bank-account' => __('Create new bank account')]);

            $revenue->amount = $this->FloatToReadableNumber($revenue->amount);

            return view('revenue.edit', compact('customers', 'categories', 'payments', 'accounts', 'revenue'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Revenue $revenue)
    {
        if(\Auth::user()->can('edit revenue')) {

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

            if($request->hasFile('reference')){
                if($revenue->reference != 'nofile.svg'){
                    $revenue->reference = $this->ReplaceFile($revenue->reference, $request->file('reference'), 'reference');
                } else {
                    $revenue->reference = $this->UploadFile($request->file('reference'), 'reference');
                }
            }

            $amount = $this->ReadableNumberToFloat($request->input('amount'));
            $difference = $revenue->amount - $amount;
            $this->AddBalance($request->input('account_id'), $difference, $request->input('date'));
            
            $revenue->date           = $request->input('date');
            $revenue->amount         = $amount;
            $revenue->account_id     = $request->input('account_id');
            $revenue->customer_id    = ($request->input('customer_id') != '' ? $request->input('customer_id') : null);;
            $revenue->category_id    = $request->input('category_id');
            $revenue->payment_method = $request->input('payment_method');
            $revenue->description    = $request->input('description');
            $revenue->save();

            $category            = ProductServiceCategory::where('id', $request->category_id)->first();
            $revenue->category   = $category->name;
            $revenue->payment_id = $revenue->id;
            $revenue->type       = 'Payment';


            Transaction::editTransaction($revenue);

            return redirect()->route('revenue.index')->with('success', __('Revenue successfully updated.'));
        } else {
            return $this->RedirectDenied();
        }
    }


    public function destroy(Revenue $revenue)
    {

        if(\Auth::user()->can('delete revenue')) {
            if($revenue->created_by == \Auth::user()->creatorId()) {
                if($revenue->reference != "nofile.svg"){
                    $this->DeleteFile($revenue->reference, 'reference');
                }

                $this->AddBalance($revenue->account_id, -($revenue->amount), $revenue->date);
                $revenue->delete();
                $type = 'Payment';
                $user = 'Customer';
                Transaction::destroyTransaction($revenue->id, $type, $user);

                return redirect()->route('revenue.index')->with('success', __('Revenue successfully deleted.'));
            } else {
                return $this->RedirectDenied();
            }
        } else {
            return $this->RedirectDenied();
        }
    }

    public function export() {
        if(Auth::user()->type == 'company'){
            return Excel::download(new RevenueExport, 'revenues.xlsx');
        } else {
            return $this->RedirectDenied();
        }
    }

    public function import() {
        if(Auth::user()->type == 'company'){
            return view('revenue.import');
        } else {
            return $this->RedirectDenied();
        }
    }

    public function storeImport(Request $request) {
        if(Auth::user()->type == 'company') {
            $validator = Validator::make($request->all(), [
                'date'          => 'required',
                'amount'        => 'required',
                'account'       => 'required',
                'category'      => 'required',
                'payment_method'=> 'required',
                'path'          => 'required',
            ]);

            if($validator->fails()) {
                $message = '';
                foreach($validator->errors()->all() as $error) {
                    $message .= "{$error} \n";
                }
                return response($message, 400);
            }

            $headings = [
                'date'          => $request->input('date'),
                'amount'        => $request->input('amount'),
                'account'       => $request->input('account'),
                'category'      => $request->input('category'),
                'payment_method'=> $request->input('payment_method'),
                'description'   => $request->input('description'),
                'customer'      => $request->input('customer'),
            ];

            if(Storage::exists($request->input('path'))) {
                try {
                    Excel::import(new RevenueImport($headings, Auth::user()), storage_path('app/').$request->input('path'));
                } catch(NoFileException $noData) {
                    $failed = $noData->getMessage();
                } catch (Exception $e) {
                    $fails = $e->getMessage();
                }
                $output['message'] = __('Import success');
                
                if(!empty($fails)) {
                    $output['fails'] = $fails;
                }
                if(!empty($failed)) {
                    $output['failed'] = $failed;
                }

                Storage::delete($request->input('path'));
                return response()->json($output);
            } else {
                return response(__('File not found', 404));
            }
        } else {
            return $this->RedirectDenied();
        }
    }
}
