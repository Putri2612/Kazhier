<?php

namespace App\Http\Controllers;

use App\Models\BalanceSheet;
use App\Models\BankAccount;
use App\Models\Bill;
use App\Models\Goal;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Projects;
use App\Models\Revenue;
use App\Models\Tax;
use App\Models\User;
use App\Traits\TimeGetter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use TimeGetter;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type == 'super admin')
        {
            $user                       = Auth::user();
            $user['total_user']         = $user->countCompany();
            $user['total_paid_user']    = $user->countPaidCompany();
            $user['total_orders']       = Order::total_orders();
            $user['total_orders_price'] = Order::total_orders_price();
            $user['total_plan']         = Plan::total_plan();
            $user['most_purchese_plan'] = (!empty(Plan::most_purchese_plan()) ? Plan::most_purchese_plan()->total : 0);
            $chartData                  = $this->getOrderChart(['duration' => 'week']);

            return view('dashboard.super_admin', compact('user', 'chartData'));
        }
        else if(Auth::user()->type == 'company' && !Auth::user()->initialized){
            return redirect()->route('initial-setup.index');
        }
        else
        {
            $creatorId = Auth::user()->creatorId();
            
            $data['latestIncome']  = Revenue::where('created_by', '=', $creatorId)->orderBy('date', 'desc')->limit(5)->get();
            $data['latestExpense'] = Payment::where('created_by', '=', $creatorId)->orderBy('date', 'desc')->limit(5)->get();

            $incomeCategoryData = $this->GetCategoryData();
            $data['incomeCategoryColor'] = $incomeCategoryData['colors'];
            $data['incomeCategory']      = $incomeCategoryData['categories'];
            $data['incomeCategoryAmount']= $incomeCategoryData['amounts'];

            $expenseCategoryData = $this->GetCategoryData('expense');
            $data['expenseCategoryColor'] = $expenseCategoryData['colors'];
            $data['expenseCategory']      = $expenseCategoryData['categories'];
            $data['expenseCategoryAmount']= $expenseCategoryData['amounts'];

            $data['IncomeExpenseChart'] = $this->GetIncomeAndExpenseChart(Auth::user());
            $data['CashFlowChart']      = $this->GetCashFlowChart(Auth::user());

            $data['currentYear']    = date('Y');
            $data['currentMonth']   = date('M');
            $data['months']         = $this->Months();
            $data['years']          = Auth::user()->getAllRecordYear();
            if(!$data['years']->contains([$data['currentYear']])) {
                $data['years']->put($data['currentYear'], $data['currentYear']);
            }

            $constant['taxes']         = Tax::where('created_by', $creatorId)->count();
            $constant['category']      = ProductServiceCategory::where('created_by', $creatorId)->count();
            $constant['units']         = ProductServiceUnit::where('created_by', $creatorId)->count();
            $constant['paymentMethod'] = PaymentMethod::where('created_by', $creatorId)->count();
            $constant['bankAccount']   = BankAccount::where('created_by', $creatorId)->count();
            $data['constant']          = $constant;
            $data['bankAccountDetail'] = BankAccount::where('created_by', '=', $creatorId)->get();
            $data['recentInvoice']     = Invoice::where('created_by', '=', $creatorId)->orderBy('issue_date', 'desc')->limit(5)->get();
            $data['weeklyInvoice']     = Auth::user()->weeklyInvoice();
            $data['monthlyInvoice']    = Auth::user()->monthlyInvoice();
            $data['recentBill']        = Bill::where('created_by', '=', $creatorId)->orderBy('bill_date', 'desc')->limit(5)->get();
            $data['weeklyBill']        = Auth::user()->weeklyBill();
            $data['monthlyBill']       = Auth::user()->monthlyBill();
            $data['goals']             = Goal::where('created_by', '=', $creatorId)->where('is_display', 1)->get();

            return view('dashboard.index', $data);
        }


    }

    public function getOrderChart($arrParam)
    {
        $arrDuration = [];
        if($arrParam['duration'])
        {
            if($arrParam['duration'] == 'week')
            {
                $previous_week = strtotime("-2 week +1 day");
                for($i = 0; $i < 14; $i++)
                {
                    $arrDuration[date('Y-m-d', $previous_week)] = date('d-M', $previous_week);
                    $previous_week                              = strtotime(date('Y-m-d', $previous_week) . " +1 day");
                }
            }
        }

        $arrTask          = [];
        $arrTask['label'] = [];
        $arrTask['data']  = [];
        foreach($arrDuration as $date => $label)
        {

            $data               = Order::select(DB::raw('count(*) as total'))->whereDate('created_at', '=', $date)->first();
            $arrTask['label'][] = $label;
            $arrTask['data'][]  = $data->total;
        }

        return $arrTask;
    }

    public function GetCashFlow($month = null, $year = null) {
        if(Auth::user()->type != 'super admin') {
            return response()->json($this->GetCashFlowChart(Auth::user(), $month, $year));
        }
    }

    public function GetIncomeExpense($year = null) {
        if(Auth::user()->type != 'super admin') {
            return response()->json($this->GetIncomeAndExpenseChart(Auth::user(), $year));
        }
    }

    public function GetCategoryData($type = 'income', $year = null) {
        if(Auth::user()->type != 'super admin'){
            return $this->GetCategoryChart(Auth::user(), $year, $type);
        }
    }

    private function GetCashFlowChart(User $user, $month = null, $year = null) {
        return $user->getCashFlowChart($month, $year);
    }

    private function GetIncomeAndExpenseChart(User $user, $year = null) {
        return $user->getIncomeAndExpenseChart($year);
    }

    private function GetCategoryChart(User $user, $year = null, $type = 'income') {
        $types = ['income' => 1, 'expense' => 2];
        $category = ProductServiceCategory::where('created_by', '=', $user->creatorId())->where('type', '=', $types[$type])->get();

        $colors     = [];
        $amounts    = [];
        $categories = [];
        foreach($category as $cat) {
            $colors[]       = '#' . $cat->color;
            $categories[]   = $cat->name;
            if($type == 'income') {
                $amounts[]      = $cat->incomeCategoryAmount($year);
            } else if($type == 'expense') {
                $amounts[]      = $cat->expenseCategoryAmount($year);
            }
        }
        return ['colors' => $colors, 'categories' => $categories, 'amounts' => $amounts];
    }
}
