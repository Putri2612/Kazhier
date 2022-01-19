<?php

namespace App\Traits;

use App\Models\Bill;
use App\Models\BillPayment;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\Transfer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait DataGetter{
    public function GetRevenues($month, $year, $account = null){
        $revenuesQuery = Revenue::where('created_by', '=', Auth::user()->creatorId())
                            ->whereRaw('year(`date`) = ?', $year)
                            ->whereRaw('month(`date`) = ?', $month);

        if( $account ) { $revenuesQuery->where('account_id', '=', $account); }

        return $revenuesQuery->get();
    }

    public function GetRevenuesWithCategory($category, $month = null, $year = null, $account = null){
        $revenuesQuery = Revenue::where('created_by', '=', Auth::user()->creatorId())
                            ->where('category_id', '=', $category);

        if( $month ) { $revenuesQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year ) { $revenuesQuery->whereRaw('year(`date`) = ?', $year); }
        if( $account ) { $revenuesQuery->where('account_id', '=', $account); }

        return $revenuesQuery->get();
    }

    public function GetRevenuesBefore($month, $year, $account = null){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $revenuesQuery = Revenue::where('created_by', '=', Auth::user()->creatorId())
                            ->where('date', '<', $date);

        if( $account ) { $revenuesQuery->where('account_id', '=', $account); }

        return $revenuesQuery->get();
    }

    public function GetRevenuesWithCategoryBefore($category, $month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        return Revenue::where('created_by', '=', Auth::user()->creatorId())
                ->where('category_id', '=', $category)
                ->where('date', '<', $date)
                ->get();
    }

    public function GetAllRevenues(){
        return Revenue::where('created_by', '=', Auth::user()->creatorId())->get();
    }


    // Payments
    public function GetPayments($month, $year, $account = null){
        $paymentQuery = Payment::where('created_by', '=', Auth::user()->creatorId())
                            ->whereRaw('year(`date`) = ?', $year)
                            ->whereRaw('month(`date`) = ?', $month);

        if( $account ) { $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->get();
    }

    public function GetPaymentsWithCategory($category, $month = null, $year = null){
        $paymentQuery = Payment::where('created_by', '=', Auth::user()->creatorId())
                            ->where('category_id', '=', $category);

        if( $month ) { $paymentQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year ) { $paymentQuery->whereRaw('year(`date`) = ?', $year); }

        return $paymentQuery->get();
    }

    public function GetPaymentsBefore($month, $year, $account = null){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $paymentQuery = Payment::where('created_by', '=', Auth::user()->creatorId())
                            ->where('date', '<', $date);

        if( $account ) { $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->get();
    }

    public function GetPaymentsWithCategoryBefore($category, $month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        return Payment::where('created_by', '=', Auth::user()->creatorId())
                ->where('date', '<', $date)
                ->where('category_id', '=', $category);
    }

    public function GetAllPayments(){
        return Payment::where('created_by', '=', Auth::user()->creatorId())->get();
    }


    // Transfers
    public function GetTransfers($month, $year, $account = null){
        $transferQuery = Transfer::where('created_by', '=', Auth::user()->creatorId())
                            ->whereRaw('year(`date`) = ?', $year)
                            ->whereRaw('month(`date`) = ?', $month);
        
        if( $account ) { $transferQuery->whereRaw("( from_account = {$account} OR to_account = {$account} )"); }

        return $transferQuery->get();
    }

    public function GetTransfersBefore($month, $year, $account = null){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $transferQuery = Transfer::where('created_by', '=', Auth::user()->creatorId())
                            ->where('date', '<', $date);
        
        if( $account ) { $transferQuery->whereRaw("( from_account = {$account} OR to_account = {$account} )"); }

        return $transferQuery->get();
    }

    public function GetAllTransfers(){
        return Transfer::where('created_by', '=', Auth::user()->creatorId())->get();
    }


    // Invoices
    public function GetInvoices($month, $year){
        $dateQuery  = "(
            ( year(`issue_date`) = {$year} AND month(`issue_date`) = {$month} ) OR
            ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} )
        )";

        return Invoice::where('created_by', '=', Auth::user()->creatorId())
                ->whereRaw($dateQuery)
                ->get();
    }

    public function GetInvoicesWithCategory($category, $month = null, $year = null){
        $invoiceQuery  = Invoice::where('created_by', '=', Auth::user()->creatorId())
                        ->where('category_id', '=', $category);

        if ( $month && $year ) {
            $invoiceQuery->whereRaw("(
                ( year(`issue_date`) = {$year} AND month(`issue_date`) = {$month} ) OR
                ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} )
            )");
        } else if ( $month && is_null($year) ){
            $invoiceQuery->whereRaw("(
                month(`issue_date`) = {$month} OR month(`due_date`) = {$month}
            )");
        } else if ( is_null($month) && $year ) {
            $invoiceQuery->whereRaw("(
                year(`issue_date`) = {$year} OR year(`due_date`) = {$year}
            )");
        }

        return $invoiceQuery->get();
    }

    public function GetInvoicesBefore($month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $dateQuery  = "( `issue_date` < {$date} OR `due_date` < {$date} )";

        return Invoice::where('created_by', '=', Auth::user()->creatorId())
                ->whereRaw($dateQuery)
                ->get();
    }

    public function GetInvoicesWithCategoryBefore($category, $month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $dateQuery  = "( `issue_date` < {$date} OR `due_date` < {$date} )";

        return Invoice::where('created_by', '=', Auth::user()->creatorId())
                ->whereRaw($dateQuery)
                ->where('category_id', '=', $category)
                ->get();
    }

    public function GetAllInvoices() {
        return Invoice::where('created_by', '=', Auth::user()->creatorId())->get();
    }

    public function GetInvoicePayments( $month, $year, $account = null ) {
        $paymentQuery = InvoicePayment::where('created_by', '=', Auth::user()->creatorId())
                        ->whereRaw('year(`date`) = ?', $year)
                        ->whereRaw('month(`date`) = ?', $month);

        if( $account ){ $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->get();
    }

    public function GetInvoicePaymentsWithCategory($category, $month = null, $year = null, $account = null){
        $Invoices = $this->GetInvoicesWithCategory($category, $month, $year);
        
        if(empty($Invoices)){
            return [];
        }

        $count  = 0;
        $ids    = $Invoices->pluck('id')->toArray();

        $paymentQuery = InvoicePayment::where('created_by', '=', Auth::user()->creatorId());

        if( $month )    { $paymentQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year )     { $paymentQuery->whereRaw('year(`date`) = ?', $year); }
        if( $account )  { $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->whereIn('invoice_id', $ids)->get();
    }

    public function GetInvoicePaymentsBefore( $month, $year, $account = null ) {
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $paymentQuery = InvoicePayment::where('created_by', '=', Auth::user()->creatorId())
                        ->whereRaw('year(`date`) = ?', $year)
                        ->whereRaw('month(`date`) = ?', $month);

        if( $account ){ $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->get();
    }

    public function GetInvoicePaymentsWithCategoryBefore($category, $month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $Invoices = $this->GetInvoicesWithCategoryBefore($category, $month, $year);
        
        if(empty($Invoices)){
            return [];
        }

        $count  = 0;
        $ids    = $Invoices->pluck('id');

        return InvoicePayment::where('created_by', '=', Auth::user()->creatorId())
                ->where('date', '<', $date)
                ->whereIn('invoice_id', $ids)
                ->get();
    }

    public function GetAllInvoicePayments() {
        return InvoicePayment::where('created_by', '=', Auth::user()->creatorId())->get();
    }


    // Bills
    public function GetBills($month, $year){
        $dateQuery  = "(
            ( year(`bill_date`) = {$year} AND month(`bill_date`) = {$month} ) OR
            ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} ) 
        )";

        return Bill::where('created_by', '=', Auth::user()->creatorId())
                ->whereRaw($dateQuery)
                ->get();
    }

    public function GetBillsWithCategory($category, $month = null, $year = null){
        $billQuery  = Bill::where('created_by', '=', Auth::user()->creatorId())
                        ->where('category_id', '=', $category);

        if ( $month && $year ) {
            $billQuery->whereRaw("(
                ( year(`bill_date`) = {$year} AND month(`bill_date`) = {$month} ) OR
                ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} )
            )");
        } else if ( $month && is_null($year) ){
            $billQuery->whereRaw("(
                month(`bill_date`) = {$month} OR month(`due_date`) = {$month}
            )");
        } else if ( is_null($month) && $year ) {
            $billQuery->whereRaw("(
                year(`bill_date`) = {$year} OR year(`due_date`) = {$year}
            )");
        }

        return $billQuery->get();
    }

    public function GetBillsBefore($month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $dateQuery  = "( `bill_date` < {$date} OR `due_date` < {$date} )";

        return Bill::where('created_by', '=', Auth::user()->creatorId())
                ->whereRaw($dateQuery)
                ->get();
    }

    public function GetBillsWithCategoryBefore($category, $month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $dateQuery  = "( `issue_date` < {$date} OR `issue_date` < {$date} )";

        return Bill::where('created_by', '=', Auth::user()->creatorId())
                ->whereRaw($dateQuery)
                ->where('category_id', '=', $category)
                ->get();
    }

    public function GetAllBills() {
        return Bill::where('created_by', '=', Auth::user()->creatorId())->get();
    }

    public function GetBillPayments( $month, $year, $account = null ) {
        $paymentQuery = BillPayment::where('created_by', '=', Auth::user()->creatorId())
                        ->whereRaw('year(`date`) = ?', $year)
                        ->whereRaw('month(`date`) = ?', $month);

        if( $account ){ $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->get();
    }

    public function GetBillPaymentsWithCategory($category, $month = null, $year = null){
        $Bills = $this->GetBillsWithCategory($category, $month, $year);
        
        if(empty($Bills)){
            return [];
        }

        $count  = 0;
        $ids    = $Bills->pluck('id');

        $paymentQuery = BillPayment::where('created_by', '=', Auth::user()->creatorId());

        if( $month ) { $paymentQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year ) { $paymentQuery->whereRaw('year(`date`) = ?', $year); }

        return $paymentQuery->whereIn('bill_id', $ids)->get();
    }

    public function GetBillPaymentsBefore( $month, $year, $account = null ) {
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $paymentQuery = BillPayment::where('created_by', '=', Auth::user()->creatorId())
                        ->where('date', '<', $date);

        if( $account ){ $paymentQuery->where('account_id', '=', $account); }

        return $paymentQuery->get();
    }

    public function GetBillPaymentsWithCategoryBefore($category, $month, $year){
        $date = Carbon::createFromFormat('Y m', "{$year} {$month}")->firstOfMonth()->toDateString();
        $Bills = $this->GetBillsWithCategoryBefore($category, $month, $year);
        
        if(empty($Bills)){ return []; }

        $count      = 0;
        $ids    = $Bills->pluck('id');

        return BillPayment::where('created_by', '=', Auth::user()->creatorId())
                ->where('date', '<', $date)
                ->whereIn('bill_id', $ids)
                ->get();
    }

    public function GetAllBillPayments() {
        return BillPayment::where('created_by', '=', Auth::user()->creatorId())->get();
    }


    // Income

    public function GetIncomeSummary($year = null, $account = null, $category = null, $customer = null) {
        if(!$year) { $year = date('Y'); }
        $incomes = Revenue::selectRaw('sum(amount) as amount, MONTH(date) as month,YEAR(date) as year, category_id');
        $incomes->where('created_by', '=', Auth::user()->creatorId());
        $incomes->whereRAW('YEAR(date) =?', [$year]);
        if(!empty($account))
        {
            $incomes->where('account_id', '=', $account);
        }
        if(!empty($category))
        {
            $incomes->where('category_id', '=', $category);
        }

        if(!empty($customer))
        {
            $incomes->where('customer_id', '=', $customer);
        }
        $incomes->groupBy('month', 'year', 'category_id');
        $incomes = $incomes->get();
        
        $tmpArray = [];
        foreach($incomes as $income){
            $tmpArray[$income->category_id][$income->month] = $income->amount;
        }
        $incomeData = [];
        foreach($tmpArray as $category_id => $income)
        {
            $category        = ProductServiceCategory::where('id', '=', $category_id)->first();
            $tmp             = [];
            $tmp['category'] = !empty($category) ? $category->name : '';
            $tmp['data']     = [];
            for($i = 1; $i <= 12; $i++)
            {
                $tmp['data'][$i] = array_key_exists($i, $income) ? $income[$i] : 0;
            }
            $incomeData[] = $tmp;
        }

        $incomes = $incomes->pluck('amount', 'month')->toArray();
        for($i = 1; $i <= 12; $i++)
        {
            $incomeTotal[] = array_key_exists($i, $incomes) ? $incomes[$i] : 0;
        }

        //---------------------------INVOICE INCOME-----------------------------------------------

        $invoices = Invoice:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,invoice_id,id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
        $invoices->whereRAW('YEAR(send_date) =?', [$year]);
        if(!empty($customer))
        {
            $invoices->where('customer_id', '=', $customer);
        }
        $invoices        = $invoices->get();
        $invoiceTmpArray = [];
        foreach($invoices as $invoice)
        {
            $invoiceTmpArray[$invoice->category_id][$invoice->month][] = $invoice->getTotal();
        }

        $invoiceArray = [];
        foreach($invoiceTmpArray as $cat_id => $record)
        {
            $category            = ProductServiceCategory::where('id', '=', $cat_id)->first();

            $invoice             = [];
            $invoice['category'] = !empty($category) ? $category->name : '';
            $invoice['data']     = [];
            for($i = 1; $i <= 12; $i++)
            {

                $invoice['data'][$i] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
            }
            $invoiceArray[] = $invoice;
        }

        $invoiceTotalArray = [];
        foreach($invoices as $invoice)
        {
            $invoiceTotalArray[$invoice->month][] = $invoice->getTotal();
        }
        for($i = 1; $i <= 12; $i++)
        {
            $invoiceTotal[] = array_key_exists($i, $invoiceTotalArray) ? array_sum($invoiceTotalArray[$i]) : 0;
        }

        $chartIncomeArr = array_map(
            function (){
                return array_sum(func_get_args());
            }, $incomeTotal, $invoiceTotal
        );

        $data['chartIncomeArr'] = $chartIncomeArr;
        $data['incomeArr']      = $incomeData;
        $data['invoiceArray']   = $invoiceArray;
        
        return $data;
    }

    public function GetExpenseSummary($year = null, $account = null, $category = null, $vender = null) {
        $expenses = Payment::selectRaw('sum(amount) as amount,MONTH(date) as month,YEAR(date) as year, category_id');
            $expenses->where('created_by', '=', Auth::user()->creatorId());
            $expenses->whereRAW('YEAR(date) =?', [$year]);
            if(!empty($account))
            {
                $expenses->where('account_id', '=', $account);
            }
            if(!empty($category))
            {
                $expenses->where('category_id', '=', $category);
            }
            if(!empty($vender))
            {
                $expenses->where('vender_id', '=', $vender);
            }
            $expenses->groupBy('month', 'year', 'category_id');
            $expenses = $expenses->get();
            $tmpArray = [];
            foreach($expenses as $expense)
            {
                $tmpArray[$expense->category_id][$expense->month] = $expense->amount;
            }
            $array = [];
            foreach($tmpArray as $cat_id => $record)
            {
                $category        = ProductServiceCategory::where('id', '=', $cat_id)->first();
                $tmp             = [];
                $tmp['category'] = !empty($category) ? $category->name : '';
                $tmp['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $array[] = $tmp;
            }
            
            $expenses = $expenses->pluck('amount', 'month')->toArray();

            for($i = 1; $i <= 12; $i++)
            {
                $expenseTotal[] = array_key_exists($i, $expenses) ? $expenses[$i] : 0;
            }

            //     ------------------------------------BILL EXPENSE----------------------------------------------------

            $bills = Bill:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,bill_id,id')->where('created_by', Auth::user()->creatorId())->where('status', '!=', 0);
            $bills->whereRAW('YEAR(send_date) =?', [$year]);
            if(!empty($customer))
            {
                $bills->where('vender_id', '=', $vender);
            }
            $bills        = $bills->get();
            $billTmpArray = [];
            foreach($bills as $bill)
            {
                $billTmpArray[$bill->category_id][$bill->month][] = $bill->getTotal();
            }

            $billArray = [];
            foreach($billTmpArray as $cat_id => $record)
            {
                $category = ProductServiceCategory::where('id', '=', $cat_id)->first();

                $bill             = [];
                $bill['category'] = !empty($category) ? $category->name : '';
                $bill['data']     = [];
                for($i = 1; $i <= 12; $i++)
                {

                    $bill['data'][$i] = array_key_exists($i, $record) ? array_sum($record[$i]) : 0;
                }
                $billArray[] = $bill;
            }

            $billTotalArray = [];
            foreach($bills as $bill)
            {
                $billTotalArray[$bill->month][] = $bill->getTotal();
            }
            for($i = 1; $i <= 12; $i++)
            {
                $billTotal[] = array_key_exists($i, $billTotalArray) ? array_sum($billTotalArray[$i]) : 0;
            }

            $chartExpenseArr = array_map(
                function (){
                    return array_sum(func_get_args());
                }, $expenseTotal, $billTotal
            );


            $data['chartExpenseArr'] = $chartExpenseArr;
            $data['expenseArr']      = $array;
            $data['billArray']       = $billArray;

            return $data;
    }
}