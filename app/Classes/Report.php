<?php

namespace App\Classes;

use App\Classes\Reports\ExpenseSummary;
use App\Classes\Reports\IncomeSummary;

class Report {
    use IncomeSummary, ExpenseSummary;

    public static function IncomeXExpense($year = null, $account = null, $category = null, $customer = null, $vender = null) {
        $income     = self::IncomeSummary($year, $account, $category, $customer);
        $expense    = self::ExpenseSummary($year, $account, $category, $vender);

        $totalIncome    = array_map(function() {
            return array_sum(func_get_args());
        }, $income['totalRevenues'], $income['totalInvoices']);

        $totalExpense   = array_map(function() {
            return array_sum(func_get_args());
        }, $expense['totalPayments'], $expense['totalBills']);

        $profit = [];
        $keys   = array_keys($totalIncome + $totalExpense);
        foreach ($keys as $key) {
            $profit[$key] = (empty($totalIncome[$key]) ? 0 : $totalIncome[$key]) - (empty($totalExpense[$key]) ? 0 : $totalExpense[$key]);
        }
        
        return [
            'paymentExpenseTotal'   => $expense['totalPayments'],
            'billExpenseTotal'      => $expense['totalBills'],
            'revenueIncomeTotal'    => $income['totalRevenues'],
            'invoiceIncomeTotal'    => $income['totalInvoices'],
            'profit'                => $profit
        ];

        
    }
}