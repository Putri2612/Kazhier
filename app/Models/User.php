<?php

namespace App\Models;

use App\Traits\TimeGetter;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, HasApiTokens;
    use Notifiable, TimeGetter;

    protected $appends = ['profile'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'avatar',
        'lang',
        'delete_status',
        'plan',
        'plan_expire_date',
        'created_by',
        'referral_token',
        'referred_by',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_active'       => 'datetime',
    ];

    public function order_request(){
        return $this->hasMany(Order::class,'plan_id','id');
    }
    public $settings;

    public function activePlan() {
        if($this->type == 'company') {
            return $this->belongsTo(Plan::class, 'plan');
        } else if($this->type != 'super admin') {
            $user = User::find($this->creatorId());
            return $user->activePlan();
        }
    }
    public function planActive() {
        if($this->type == 'company') {
            return $this->plan || $this->plan_expire_date >= date('Y-m-d');
        } else if($this->type != 'super admin') {
            $user = User::find($this->creatorId());
            return $user->planActive();
        }
    }

    public function authId()
    {
        return $this->id;
    }

    public function creatorId()
    {
        if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
    }

    public function cryptId() {
        if($this->type == 'company' || $this->type == 'super admin') {
            $id = $this->creatorId();
            return Crypt::encrypt($id);
        } else {
            return null;
        }
    }


    public function currentLanguage()
    {
        return $this->lang;
    }

    public function priceFormat($price)
    {
        $settings = Utility::settings();

        return (($settings['site_currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . ' ' . number_format($price, 2, ',', '.') . ' ' . (($settings['site_currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
    }

    public function currencySymbol()
    {
        $settings = Utility::settings();

        return $settings['site_currency_symbol'];
    }

    public function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public function timeFormat($time)
    {
        $settings = Utility::settings();

        return date($settings['site_time_format'], strtotime($time));
    }

    public function invoiceNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["invoice_prefix"] . sprintf("%05d", $number);
    }

    public function proposalNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["proposal_prefix"] . sprintf("%05d", $number);
    }

    public function billNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["bill_prefix"] . sprintf("%05d", $number);
    }

    public function assignPlan($planID, $duration = 1)
    {
        $same = $this->plan == $planID;
        $plan = Plan::find($planID);
        if($plan)
        {
            $this->plan = $plan->id;
            if($same && $plan->duration != 'unlimited'){
                $startingDate = Carbon::createFromFormat('Y-m-d', $this->plan_expire_date);
            } else {
                $startingDate = Carbon::now();
            }
            if($plan->duration == 'month')
            {
                $this->plan_expire_date = $startingDate->addMonths($duration)->isoFormat('YYYY-MM-DD');
            }
            else if($plan->duration == 'year')
            {
                $this->plan_expire_date = $startingDate->addYears($duration)->isoFormat('YYYY-MM-DD');
            } else if ($plan->duration == 'unlimited') {
                $this->plan_expire_date = null;
            }
            $this->save();

            $userQuery = User::where('created_by', '=', $this->creatorId())
                            ->where('type', '!=', 'super admin')
                            ->where('type', '!=', 'company');

            $bankQuery = BankAccount::withTrashed()->where('created_by', '=', $this->creatorId());
            
            
            $users      = (clone $userQuery)->count();
            $accounts   = (clone $bankQuery)->count();
            

            if($plan->max_users == -1)
            {
                $updateActivate = (clone $userQuery)->update(['is_active' => 1]);
            }
            else
            {
                $updateDelete = (clone $userQuery)->update(['is_active' => 0]);
                $updateActivate = (clone $userQuery)->limit($plan->max_users)->update(['is_active' => 1]);
            }
            $now = Carbon::now();
            if($plan->max_bank_accounts == -1)
            {
                $updateActivate = (clone $bankQuery)->update(['deleted_at' => null]);
            }
            else
            {
                $updateDelete   = (clone $bankQuery)->update(['deleted_at' => $now]);
                $updateActivate = (clone $bankQuery)->offset(0)->limit($plan->max_bank_accounts)->update(['deleted_at' => null]);
            }


            
            return ['is_success' => true];
        }
        else
        {
            return [
                'is_success' => false,
                'error' => 'Plan is deleted.',
            ];
        }
    }

    public function initialize() {
        $this->initialized = 1;
        $planID = Plan::select('id')->where('price', '>', 0)->orderBy('price', 'asc')->first()->id;
        $this->assignPlan($planID, 2);
    }

    public function customerNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["customer_prefix"] . sprintf("%05d", $number);
    }

    public function venderNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["vender_prefix"] . sprintf("%05d", $number);
    }

    public function countUsers()
    {
        return User::where('type', '!=', 'super admin')->where('type', '!=', 'company')->where('created_by', '=', $this->creatorId())->count();
    }

    public function countBankAccount()
    {
        return BankAccount::where('created_by', '=', $this->creatorId())->count();
    }

    public function countCompany()
    {
        return User::where('type', '=', 'company')->where('created_by', '=', $this->creatorId())->count();
    }

    public function countOrder()
    {
        return Order::count();
    }

    public function countplan()
    {
        return Plan::count();
    }

    public function countPaidCompany()
    {
        return User::where('type', '=', 'company')->whereNotIn(
            'plan', [
                      0,
                      1,
                  ]
        )->where('created_by', '=', $this->id)->count();
    }

    public function countCustomers()
    {
        return Customer::where('created_by', '=', $this->creatorId())->count();
    }

    public function countVenders()
    {
        return Vender::where('created_by', '=', $this->creatorId())->count();
    }

    public function countInvoices()
    {
        return Invoice::where('created_by', '=', $this->creatorId())->count();
    }

    public function countBills()
    {
        return Bill::where('created_by', '=', $this->creatorId())->count();
    }

    public function todayIncome()
    {
        $revenue        = Revenue::where('created_by', '=', $this->creatorId())->whereRaw('Date(date) = CURDATE()')->where('created_by', $this->creatorId())->sum('amount');
        $invoiceIDs     = Invoice:: select('id')->where('created_by', $this->creatorId())->get()->pluck('id');
        $invoices       = InvoicePayment::whereIn('invoice_id', $invoiceIDs)->whereRaw('Date(date) = CURDATE()')->sum('amount');
        $totalIncome    = (!empty($revenue) ? $revenue : 0) + (!empty($invoices) ? $invoices : 0);

        return $totalIncome;
    }

    public function todayExpense()
    {
        $payment        = Payment::where('created_by', '=', $this->creatorId())->where('created_by', $this->creatorId())->whereRaw('Date(date) = CURDATE()')->sum('amount');

        $billIDs        = Bill:: select('id')->where('created_by', $this->creatorId())->get()->pluck('id');
        $bills          = BillPayment::whereIn('bill_id', $billIDs)->whereRaw('Date(date) = CURDATE()')->sum('amount');

        $totalExpense   = (!empty($payment) ? $payment : 0) + (!empty($bills) ? $bills : 0);

        return $totalExpense;
    }

    public function incomeCurrentMonth()
    {
        $currentMonth   = date('m');
        $currentYear    = date('Y');
        $revenue        = Revenue::where('created_by', '=', $this->creatorId())->whereRaw('MONTH(date) = ? AND YEAR(date) = ?', [$currentMonth, $currentYear])->sum('amount');
        $invoiceIDs     = Invoice:: select('id')->where('created_by', $this->creatorId())->get()->pluck('id');
        $invoices       = InvoicePayment::whereIn('invoice_id', $invoiceIDs)->whereRaw('MONTH(date) = ? AND YEAR(date) = ?', [$currentMonth, $currentYear])->sum('amount');
        $totalIncome    = (!empty($revenue) ? $revenue : 0) + (!empty($invoices) ? $invoices : 0);

        return $totalIncome;

    }

    public function expenseCurrentMonth()
    {
        $currentMonth   = date('m');
        $currentYear    = date('Y');

        $payment        = Payment::where('created_by', '=', $this->creatorId())->whereRaw('MONTH(date) = ? AND YEAR(date) = ?', [$currentMonth, $currentYear])->sum('amount');

        $billIDs        = Bill:: select('id')->where('created_by', $this->creatorId())->get()->pluck('id');
        $bills          = BillPayment::whereIn('bill_id', $billIDs)->whereRaw('MONTH(date) = ? AND YEAR(date) = ?', [$currentMonth, $currentYear])->sum('amount');

        $totalExpense   = (!empty($payment) ? $payment : 0) + (!empty($bills) ? $bills : 0);

        return $totalExpense;
    }

    public function totalSemua(){
        $currentMonth = date('m');
        $revenue      = Revenue::where('created_by', '=', $this->creatorId())->whereRaw('MONTH(date) = ?', [$currentMonth])->sum('amount');
        $payment      = Payment::where('created_by', '=', $this->creatorId())->whereRaw('MONTH(date) = ?', [$currentMonth])->sum('amount');

        $invoices     = Invoice:: select('*')->where('created_by', $this->creatorId())->whereRAW('MONTH(send_date) = ?', [$currentMonth])->get();
        $bills        = Bill:: select('*')->where('created_by', $this->creatorId())->whereRAW('MONTH(send_date) = ?', [$currentMonth])->get();

        $invoiceArray = array();
        foreach($invoices as $invoice)
        {
            $invoiceArray[] = $invoice->getTotal();
        }
        $billArray = array();
        foreach($bills as $bill)
        {
            $billArray[] = $bill->getTotal();
        }
        $totalIncome = (!empty($revenue) ? $revenue : 0) + (!empty($invoiceArray) ? array_sum($invoiceArray) : 0);
       
        $totalExpense = (!empty($payment) ? $payment : 0) + (!empty($billArray) ? array_sum($billArray) : 0);
       

        $total = $totalIncome - $totalExpense;
        return $total;
     
    }

    public function formatNumber($num){
        $number = (string)$num;
        $number = explode('.',  $number);
        $n = '';
        foreach($number as $item){
            $n .= $item;
        }
        $number = explode(',', $n);
        return (float)($number[0] . '.' . $number[1]);
    }

    public function totalCompanyUser($id)
    {
        return User::where('created_by', '=', $id)->count();
    }

    public function planPrice()
    {
        $user = $this;
        if($user->type == 'super admin')
        {
            $userId = $user->id;
        }
        else
        {
            $userId = $user->created_by;
        }

        return DB::table('settings')->where('created_by', '=', $userId)->get()->pluck('value', 'name');

    }

    public function planPriceFormat($price){
        $planPrice          = $this->planPrice();
        $symbol             = isset($planPrice['stripe_currency_symbol']) ? $planPrice['stripe_currency_symbol'] : '';
        $formatted_price    = number_format($price, 2, ',', '.');
        return "{$symbol} {$formatted_price}";
    }

    public function planFeatureNumberFormat($number) {
        if($number < 0) {
            $number = '&infin;';
        }
        return $number;
    }

    public function planDurationFormat($duration) {
        if(strtoupper($duration) == 'YEAR') {
            $duration = __('Annually');
        } else if(strtoupper($duration) == 'MONTH') {
            $duration = __('Monthly');
        }

        return $duration;
    }

    public function currentPlan()
    {
        return $this->hasOne(Plan::class, 'id', 'plan');
    }

    public function getAllRecordYear(){
        $revenuesQuery  = Revenue::where('created_by', '=', $this->creatorId());
        $invoicesQuery  = InvoicePayment::where('created_by', $this->creatorId());
        $paymentsQuery  = Payment::where('created_by', '=', $this->creatorId());
        $billsQuery     = BillPayment::where('created_by', $this->creatorId());

        $revenues   = $revenuesQuery->get();
        $invoices   = $invoicesQuery->get();
        $payments   = $paymentsQuery->get();
        $bills      = $billsQuery->get();

        $unsorted_data = $revenues->merge($invoices)->merge($payments)->merge($bills);
        $data   = $unsorted_data->sortBy('date')->values()->all();

        if(!empty($data)){
            foreach ($data as $dat){
                $year = Carbon::createFromFormat('Y-m-d', $dat->date)->year;
                $years[$year] = $year;
            }
        } else {
            $years[date('Y')] = date('Y');
        }

        return collect($years);
    }
}