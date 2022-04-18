<?php

namespace App\Classes\Reports;

use App\Models\Invoice;
use App\Models\Revenue;
use Illuminate\Support\Facades\Auth;

trait IncomeSummary{
    use Summarize;
    public static function IncomeSummary($year = null, $account = null, $category = null, $customer = null) {
        $creatorId = Auth::user()->creatorId();
        if(empty($year)) { $year = date('Y'); }

        $revenues = Revenue::selectRaw('SUM(amount) as amount, MONTH(date) as month, YEAR(date) as year, category_id')
                    ->with(['category'])
                    ->where('created_by', $creatorId)
                    ->whereRaw('YEAR(date) = ?', [$year]);

        if(!empty($account))    { $revenues->where('account_id', '=', $account); }
        if(!empty($category))   { $revenues->where('category_id', '=', $category); }
        if(!empty($customer))   { $revenues->where('customer_id', '=', $customer); }

        $revenues = $revenues->groupBy('month', 'year', 'category_id')->get();

        $revenueData = self::Summarize($revenues);

        $invoices   = Invoice::where('invoices.created_by', $creatorId)
                    ->where('invoices.status', '!=', 0);

        if(!empty($customer)) { $invoices->where('customer_id', '=', $customer); }
        if(!empty($category)) { $invoices->where('category_id', '=', $category); }
        
        $invoices->rightJoin('invoice_payments', function($join) use($account, $year) {
            $join->on('invoices.id', '=', 'invoice_payments.invoice_id')
                ->whereRaw('YEAR(date) = ?', $year);
            if(!empty($account))    { $join->where('account_id', '=', $account); }
        });

        $invoices = $invoices->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                ->with(['category'])
                ->groupBy('month', 'category_id')
                ->get();
        
        $invoiceData = self::Summarize($invoices);

        $chartData = array_map(
            function (){
                return array_sum(func_get_args());
            }, $revenueData['total'], $invoiceData['total']
        );

        $data['chartData']  = $chartData;
        $data['revenues']   = $revenueData['summary'];
        $data['totalRevenues'] = $revenueData['total'];
        $data['invoices']   = $invoiceData['summary'];
        $data['totalInvoices'] = $invoiceData['total'];
        
        return $data;
    }
}