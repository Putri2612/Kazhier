<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\ProductServiceCategory;
use App\Models\Vender;
use App\Traits\ApiResponse;
use App\Traits\DataGetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    use DataGetter, ApiResponse;

    public function income(Request $request) {
        if(!Auth::user()->can('income report')){
            return $this->UnauthorizedResponse();
        }
        $account = BankAccount::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
        $account->prepend(__('All'), '');
        $customer = Customer::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('name', 'id');
        $customer->prepend(__('All'), '');
        $category = ProductServiceCategory::where('created_by', '=', Auth::user()->creatorId())->where('type', '=', 1)->get()->pluck('name', 'id');
        $category->prepend(__('All'), '');

        $yearList   = Auth::user()->getAllRecordYear();
        
        if(!empty($request->input('year')))
        {
            $year = $request->input('year');
        } else if($yearList->contains(date('Y'))) {
            $year = date('Y');
        } else {
            $year = $yearList->first();
        }

        $data = $this->GetIncomeSummary($year, $request->input('account'), $request->input('category'), $request->input('customer'));

        $data['monthList']      = $month = $this->yearMonth();
        $data['yearList']       = $yearList;
        $data['currentYear']    = $year;
        $data['account']        = $account;
        $data['customer']       = $customer;
        $data['category']       = $category;

        return view('api.income-report', $data);
    }

    public function expense(Request $request) {
        if(!Auth::user()->can('expense report')){
            return $this->UnauthorizedResponse();
        }

        $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
        $account->prepend(__('All'), '');
        $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $vender->prepend(__('All'), '');
        $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get()->pluck('name', 'id');
        $category->prepend(__('All'), '');

        $yearList   = Auth::user()->getAllRecordYear();
        
        if(!empty($request->input('year')))
        {
            $year = $request->input('year');
        } else if($yearList->contains(date('Y'))) {
            $year = date('Y');
        } else {
            $year = $yearList->first();
        }

        $data                   = $this->GetExpenseSummary($year, $request->input('account'), $request->input('category'), $request->input('vender'));
        $data['currentYear']    = $year;
        $data['monthList']      = $month = $this->yearMonth();
        $data['yearList']       = $yearList;
        $data['account']        = $account;
        $data['vender']         = $vender;
        $data['category']       = $category;

        return view('api.expense-report', $data);
    }

    public function yearMonth()
    {
        $month[] = __('January');
        $month[] = __('February');
        $month[] = __('March');
        $month[] = __('April');
        $month[] = __('May');
        $month[] = __('June');
        $month[] = __('July');
        $month[] = __('August');
        $month[] = __('September');
        $month[] = __('October');
        $month[] = __('November');
        $month[] = __('December');

        return $month;
    }

    public function yearList()
    {
        $starting_year = date('Y', strtotime('-5 year'));
        $ending_year   = date('Y');

        foreach(range($ending_year, $starting_year) as $year)
        {
            $years[$year] = $year;
        }

        return $years;
    }
}
