<?php

namespace App\Classes\Reports;

use App\Models\Bill;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

trait ExpenseSummary {
    use Summarize;

    public static function ExpenseSummary($year = null, $account = null, $category = null, $vender = null) {
        $creatorId = Auth::user()->creatorId();
        if(!$year) { $year = date('Y'); }

        $payments = Payment::selectRaw('sum(amount) as amount,MONTH(date) as month, category_id')
                ->where('created_by', '=', $creatorId)
                ->whereRAW('YEAR(date) =?', [$year]);

        if(!empty($account)) { $payments->where('account_id', '=', $account); }
        if(!empty($category)) { $payments->where('category_id', '=', $category); }
        if(!empty($vender)) { $payments->where('vender_id', '=', $vender); }

        $payments = $payments->with(['category'])->groupBy('month', 'category_id')->get();
        $paymentData = self::Summarize($payments);

        $bills = Bill::where('bills.created_by', $creatorId)->where('bills.status', '!=', 0);
        
        if(!empty($customer)) { $bills->where('vender_id', '=', $vender); }
        if(!empty($category)) { $bills->where('category_id', '=', $category); }
        
        $bills->rightJoin('bill_payments', function($join) use($account, $year) {
            $join->on('bills.id', '=', 'bill_payments.bill_id')
                ->whereRaw('YEAR(date) = ?', $year);
            if(!empty($account))    { $join->where('account_id', '=', $account); }
        });

        $bills  = $bills->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                ->groupBy('month', 'category_id')
                ->with(['category'])->get();

        $billData = Self::Summarize($bills);

        $chartData = array_map(
            function (){
                return array_sum(func_get_args());
            }, $paymentData['total'], $billData['total']
        );


        $data['chartData']      = $chartData;
        $data['payments']       = $paymentData['summary'];
        $data['totalPayments']  = $paymentData['total'];
        $data['bills']          = $billData['summary'];
        $data['totalBills']     = $billData['total'];

        return $data;
    }
}