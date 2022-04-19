<?php

namespace App\Http\Controllers;

use App\Classes\Helper;
use App\Exports\PaymentExport;
use App\Imports\PaymentImport;
use App\Models\BankAccount;
use App\Models\BillPayment;
use App\Mail\BillPaymentCreate;
use App\Mail\SendWorkspaceInvication;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\ProductServiceCategory;
use App\Models\Transaction;
use App\Models\Utility;
use App\Models\Vender;
use App\Traits\ApiResponse;
use App\Traits\CanImport;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use App\Traits\CanUploadFile;
use Exception;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class PaymentController extends Controller
{
    use CanManageBalance, 
        CanProcessNumber, 
        CanUploadFile, 
        CanRedirect, 
        CanImport,
        ApiResponse;

    public function index(Request $request)
    {
        if(Auth::user()->can('manage payment'))
        {
            $creatorId = Auth::user()->creatorId();
            $vender = Vender::select('name', 'id')
                    ->where('created_by', '=', $creatorId)
                    ->pluck('name', 'id');
            $vender->prepend(__('All'), '');

            $account = BankAccount::select('holder_name', 'id')
                    ->where('created_by', '=', $creatorId)
                    ->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');

            $category = ProductServiceCategory::select('name', 'id')
                    ->where('created_by', '=', $creatorId)
                    ->where('type', '=', 2)
                    ->pluck('name', 'id');
            $category->prepend(__('All'), '');

            $payment = PaymentMethod::select('name', 'id')
                    ->where('created_by', '=', $creatorId)
                    ->pluck('name', 'id');
            $payment->prepend(__('All'), '');


            return view('payment.index', compact('account', 'category', 'payment', 'vender'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage payment')) {
            return $this->UnauthorizedResponse();
        }
        
        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
            'date'              => 'nullable|regex:/^[\d\-\s]*/i',
            'account'           => 'nullable|numeric',
            'category'          => 'nullable|numeric',
            'vender'            => 'nullable|numeric',
            'payment_method'    => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }
        $settings = Utility::settings();

        $totalData = Payment::where('created_by', Auth::user()->creatorId())->count();
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

        $query = Payment::with(['bankAccount:id,bank_name,holder_name', 'vender:id,name', 'category:id,name', 'paymentMethod:id,name'])
                ->select('id', 'amount', 'description', 'date', 'vender_id', 'account_id', 'category_id', 'payment_method')
                ->where('created_by', Auth::user()->creatorId())
                ->orderBy('date', 'desc')
                ->skip($skip)->take($limit);

        if(!empty($request->input('date')))
        {
            $date_range = explode(' - ', $request->input('date'));
            $query->whereBetween('date', $date_range);
        }

        if(!empty($request->input('vender')))
        {
            $query->where('vender_id', '=', $request->input('vender'));
        }
        if(!empty($request->input('account')))
        {
            $query->where('account_id', '=', $request->input('account'));
        }

        if(!empty($request->input('category')))
        {
            $query->where('category_id', '=', $request->input('category'));
        }

        if(!empty($request->input('payment')))
        {
            $query->where('payment_method', '=', $request->input('payment'));
        }

        $payments = $query->get();

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

        if($payments->isEmpty()) {
            return $this->NotFoundResponse();
        } else {
            return $this->FetchSuccessResponse([
                'data'      => $payments,
                'pages'     => $totalPage,
                'currency'  => $settings['site_currency'],
                'date'      => $format,
            ]);
        }
    }


    public function create()
    {
        if(Auth::user()->can('create payment'))
        {
            $creatorId = Auth::user()->creatorId();
            $venders    = Vender::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
            $venders->prepend(__('Select vender'), null);
            $venders    = $venders->union(['new.vender' => __('Create new vender')]);

            $categories = ProductServiceCategory::where('created_by', '=', $creatorId)->where('type', '=', 2)->get()->pluck('name', 'id');
            $categories->prepend(__('Select category'), null);
            $categories = $categories->union(['new.product-category' => __('Create new category')]);

            $payments   = PaymentMethod::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
            $payments->prepend(__('Select payment method'), null);
            $payments   = $payments->union(['new.payment-method' => __('Create new payment method')]);

            $accounts   = BankAccount::select('*', DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', $creatorId)->get()->pluck('name', 'id');
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

        if(Auth::user()->can('create payment'))
        {

            $validator = Validator::make(
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
            $payment->created_by     = Auth::user()->creatorId();

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
                $payment->date   = Helper::DateFormat($request->input('date'));
                $payment->amount = Auth::user()->priceFormat($amount);
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
        if(Auth::user()->can('edit payment'))
        {
            $creatorId = Auth::user()->creatorId();
            $venders    = Vender::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
            $venders->prepend(__('Select vender'), null);
            $venders    = $venders->union(['new.vender' => __('Create new vender')]);

            $categories = ProductServiceCategory::where('created_by', '=', $creatorId)->where('type', '=', 2)->get()->pluck('name', 'id');
            $categories->prepend(__('Select category'), null);
            $categories = $categories->union(['new.product-category' => __('Create new category')]);

            $payments   = PaymentMethod::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
            $payments->prepend(__('Select payment method'), null);
            $payments   = $payments->union(['new.payment-method' => __('Create new payment method')]);

            $accounts   = BankAccount::select('*', DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', $creatorId)->get()->pluck('name', 'id');
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
        if(Auth::user()->can('edit payment'))
        {

            $validator = Validator::make(
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
        if(Auth::user()->can('delete payment'))
        {
            if($payment->created_by == Auth::user()->creatorId())
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

    public function import() {
        if(Auth::user()->type == 'company'){
            return view('payment.import');
        } else {
            return $this->RedirectDenied();
        }
    }

    public function storeImport(Request $request) {
        if(Auth::user()->type == 'company') {
            $validator = Validator::make($request->all(), [
                'headings'      => 'required',
                'path'          => 'required',
            ]);

            if($validator->fails()) {
                $message = '';
                foreach($validator->errors()->all() as $error) {
                    $message .= "{$error} \n";
                }
                return response($message, 400);
            }

            $input = explode(',', $request->input('headings'));

            $headings = [
                'date'          => in_array('date', $input) ? 'date' : null,
                'amount'        => in_array('amount', $input) ? 'amount' : null,
                'account'       => in_array('bank_account', $input) ? 'bank_account' : null,
                'category'      => in_array('category', $input) ? 'category' : null,
                'payment_method'=> in_array('payment_method', $input) ? 'payment_method' : null,
                'description'   => in_array('description', $input) ? 'description' : null,
                'vender'        => in_array('vendor_name', $input) ? 'vendor_name' : null,
            ];

            $notFound = array_keys($headings, null, true);

            if(count($notFound)) {
                $keys = ucwords(implode(', ', $notFound));
                if(Storage::exists($request->input('path'))) {
                    Storage::delete($request->input('path'));
                }
                return response()->json(['empty' => $keys, 'count' => count($notFound)], 400);
            }

            if(Storage::exists($request->input('path'))) {
                try {
                    Excel::import(new PaymentImport($headings, Auth::user()), storage_path('app/').$request->input('path'));
                } catch(NoFileException $noData) {
                    $failed = $noData->getMessage();
                } catch (Exception $e) {
                    $fails = $e->getMessage();
                }
                $output['message'] = __('Import success');
                
                if(!empty($fails)) {
                    $output['failed'] = $fails;
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
