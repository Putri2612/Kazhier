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


    // Reports

    private function Summarize($input) {
        $categorized    = [];
        foreach($input as $dat){
            $categorized[$dat->category_id][$dat->month] = $dat->amount;
        }

        $summarizedData = [];
        $totalAmount    = [];
        foreach($categorized as $category_id => $amount) {
            $category        = ProductServiceCategory::where('id', '=', $category_id)->first();
            $tmp             = [
                'category'  => !empty($category) ? $category->name : '',
                'data'      => []
            ];
            for($i = 1; $i <= 12; $i++) {
                $tmp['data'][$i]    = array_key_exists($i, $amount) ? $amount[$i] : 0;
                if(!empty($totalAmount[$i])){
                    $totalAmount[$i]    += array_key_exists($i, $amount) ? $amount[$i] : 0;
                } else {
                    $totalAmount[$i]    = array_key_exists($i, $amount) ? $amount[$i] : 0;
                }
            }
            $summarizedData[] = $tmp;
        }

        return ['summary' => $summarizedData, 'total' => $totalAmount];
    }

    public function GetIncomeSummary($year = null, $account = null, $category = null, $customer = null) {
        $creatorId = Auth::user()->creatorId();
        if(!$year) { $year = date('Y'); }

        $revenues = Revenue::selectRaw('sum(amount) as amount, MONTH(date) as month,YEAR(date) as year, category_id')
                    ->where('created_by', $creatorId)
                    ->whereRAW('YEAR(date) =?', [$year]);

        if(!empty($account))    { $revenues->where('account_id', '=', $account); }
        if(!empty($category))   { $revenues->where('category_id', '=', $category); }
        if(!empty($customer))   { $revenues->where('customer_id', '=', $customer); }

        $revenues = $revenues->groupBy('month', 'year', 'category_id')->get();
        
        $revenueData = $this->Summarize($revenues);

        //---------------------------INVOICE INCOME-----------------------------------------------

        $invoices = Invoice::where('invoices.created_by', $creatorId)->where('invoices.status', '!=', 0);
        
        if(!empty($customer)) { $invoices->where('customer_id', '=', $customer); }
        if(!empty($category)) { $invoices->where('category_id', '=', $category); }
        
        $invoices->rightJoin('invoice_payments', function($join) use($account, $year) {
            $join->on('invoices.id', '=', 'invoice_payments.invoice_id')
                ->whereRaw('YEAR(date) = ?', $year);
            if(!empty($account))    { $join->where('account_id', '=', $account); }
        });

        $invoices = $invoices->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                    ->groupBy('month', 'category_id')
                    ->get();
        
        $invoiceData = $this->Summarize($invoices);

        $chartData = array_map(
            function (){
                return array_sum(func_get_args());
            }, $revenueData['total'], $invoiceData['total']
        );

        $data['chartData']  = $chartData;
        $data['revenues']   = $revenueData['summary'];
        $data['invoices']   = $invoiceData['summary'];
        
        return $data;
    }

    public function GetExpenseSummary($year = null, $account = null, $category = null, $vender = null) {
        $creatorId = Auth::user()->creatorId();
        if(!$year) { $year = date('Y'); }

        $payments = Payment::selectRaw('sum(amount) as amount,MONTH(date) as month, category_id')
                ->where('created_by', '=', $creatorId)
                ->whereRAW('YEAR(date) =?', [$year]);

        if(!empty($account)) { $payments->where('account_id', '=', $account); }
        if(!empty($category)) { $payments->where('category_id', '=', $category); }
        if(!empty($vender)) { $payments->where('vender_id', '=', $vender); }

        $payments = $payments->groupBy('month', 'category_id')->get();
        $paymentData = $this->Summarize($payments);

        //     ------------------------------------BILL EXPENSE----------------------------------------------------

        $bills = Bill::where('bills.created_by', $creatorId)->where('bills.status', '!=', 0);
        
        if(!empty($customer)) { $bills->where('vender_id', '=', $vender); }
        if(!empty($category)) { $bills->where('category_id', '=', $category); }
        
        $bills->rightJoin('bill_payments', function($join) use($account, $year) {
            $join->on('bills.id', '=', 'bill_payments.bill_id')
                ->whereRaw('YEAR(date) = ?', $year);
            if(!empty($account))    { $join->where('account_id', '=', $account); }
        });

        $bills = $bills->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                    ->groupBy('month', 'category_id')
                    ->get();
        
        $billData = $this->Summarize($bills);

        $chartData = array_map(
            function (){
                return array_sum(func_get_args());
            }, $paymentData['total'], $billData['total']
        );


        $data['chartData']  = $chartData;
        $data['payments']   = $paymentData['summary'];
        $data['bills']      = $billData['summary'];

        return $data;
    }

    private function Quarterize($input) {
        $categorized = [];
        foreach($input as $data) {
            $categorized[$data->category_id][$data->month] = $data->amount;
        }

        $JanMar  = $AprJun = $JulSep = $OctDec = 0;
        $outputData = [];
        foreach($categorized as $category_id => $data) {

            $tmp             = [];
            $tmp['category'] = !empty(ProductServiceCategory::where('id', '=', $category_id)->first()) ? ProductServiceCategory::where('id', '=', $category_id)->first()->name : '';
            $sumData         = [];
            for($i = 1; $i <= 12; $i++) {
                $sumData[] = array_key_exists($i, $data) ? $data[$i] : 0;
            }

            $firstQuarter = array_slice($sumData, 0, 3);
            $secondQuarter = array_slice($sumData, 3, 3);
            $thirdQuarter = array_slice($sumData, 6, 3);
            $forthQuarter = array_slice($sumData, 9, 3);


            $total[__('Jan-Mar')] = $sum_1 = array_sum($firstQuarter);
            $total[__('Apr-Jun')] = $sum_2 = array_sum($secondQuarter);
            $total[__('Jul-Sep')] = $sum_3 = array_sum($thirdQuarter);
            $total[__('Oct-Dec')] = $sum_4 = array_sum($forthQuarter);
            $total[__('Total')]   = array_sum( [$sum_1, $sum_2, $sum_3, $sum_4] );

            $JanMar += $sum_1;
            $AprJun += $sum_2;
            $JulSep += $sum_3;
            $OctDec += $sum_4;

            $tmp['amount']  = array_values($total);

            $outputData[] = $tmp;

        }

        $Total = [
            $JanMar,
            $AprJun,
            $JulSep,
            $OctDec,
            array_sum( [$JanMar, $AprJun, $JulSep, $OctDec] ),
        ];

        return ['data' => $outputData, 'total' => $Total];
    }

    public function GetProfitLoss($year = null) {
        if(!$year) { $year = date('Y'); }
        $creatorId = Auth::user()->creatorId();
        $data['month']     = [
            'Jan-Mar',
            'Apr-Jun',
            'Jul-Sep',
            'Oct-Dec',
            'Total',
        ];
        $data['currentYear'] = $year;

        // -------------------------------REVENUE INCOME-------------------------------------------------

        $revenues = Revenue::selectRaw('sum(revenues.amount) as amount,MONTH(date) as month, category_id')
                    ->where('created_by', $creatorId)
                    ->whereRAW('YEAR(date) = ?', $year)
                    ->groupBy('month', 'category_id')
                    ->get();
        
        $quarterizedRevenues = $this->Quarterize($revenues);

        $data['revenueIncome'] = $quarterizedRevenues['data'];
        $data['revenueTotal'] = $totalRevenue = $quarterizedRevenues['total'];

        //-----------------------INVOICE INCOME---------------------------------------------

        $invoices = Invoice::where('invoices.created_by', $creatorId)->where('invoices.status', '!=', 0)
                    ->rightJoin('invoice_payments', function($join) use($year) {
                        $join->on('invoices.id', '=', 'invoice_payments.invoice_id')
                            ->whereRaw('YEAR(date) = ?', $year);
                    })
                    ->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                    ->groupBy('month', 'category_id')
                    ->get();
        $quarterizedInvoices    = $this->Quarterize($invoices);
        $data['invoiceIncome']  = $quarterizedInvoices['data'];
        $data['invoiceTotal']   = $totalInvoice = $quarterizedInvoices['total'];

        $data['totalIncome'] = $totalIncome = array_map(
            function (){
                return array_sum(func_get_args());
            }, $totalRevenue, $totalInvoice
        );

        //---------------------------------PAYMENT EXPENSE-----------------------------------

        $payments = Payment::selectRaw('sum(payments.amount) as amount,MONTH(date) as month,category_id')
                    ->where('created_by', '=', $creatorId)
                    ->whereRAW('YEAR(date) =?', $year)
                    ->groupBy('month', 'category_id')
                    ->get();

        $quarterizedPayment     = $this->Quarterize($payments);
        $data['paymentExpense'] = $quarterizedPayment['data'];
        $data['paymentTotal']   = $totalPayment = $quarterizedPayment['total'];

        //    ----------------------------EXPENSE BILL-----------------------------------------------------------------------

        $bills = Bill::where('bills.created_by', $creatorId)->where('bills.status', '!=', 0)
                ->rightJoin('bill_payments', function($join) use($year) {
                    $join->on('bills.id', '=', 'bill_payments.bill_id')
                        ->whereRaw('YEAR(date) = ?', $year);
                })
                ->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                ->groupBy('month', 'category_id')
                ->get();
        
        $quarterizedBill        = $this->Quarterize($bills);
        $data['billExpense']    = $quarterizedBill['data'];
        $data['billTotal']      = $totalBill = $quarterizedBill['total'];

        $data['totalExpense'] = $totalExpense = array_map(
            function (){
                return array_sum(func_get_args());
            }, $totalBill, $totalPayment
        );


        foreach($totalIncome as $k => $income)
        {
            $netProfit[] = $income - $totalExpense[$k];
        }
        $data['netProfitArray'] = $netProfit;

        return $data;
    }

    public function GetIncomeVSExpenseSummary($year = null, $account = null, $category = null, $customer = null, $vender = null) {
        $creatorId = Auth::user()->creatorId();
        if(empty($year)) { $year = date('Y'); }

        // ------------------------------TOTAL PAYMENT EXPENSE-----------------------------------------------------------
        $payments = Payment::selectRaw('sum(amount) as amount,MONTH(date) as month, category_id')
                ->where('created_by', '=', $creatorId)
                ->whereRAW('YEAR(date) =?', [$year]);

        if(!empty($account)) { $payments->where('account_id', '=', $account); }
        if(!empty($category)) { $payments->where('category_id', '=', $category); }
        if(!empty($vender)) { $payments->where('vender_id', '=', $vender); }

        $payments = $payments->groupBy('month', 'category_id')->get();
        $paymentData = $this->Summarize($payments)['total'];

        // ------------------------------TOTAL BILL EXPENSE-----------------------------------------------------------

        $bills = Bill::where('bills.created_by', $creatorId)->where('bills.status', '!=', 0);
        
        if(!empty($customer)) { $bills->where('vender_id', '=', $vender); }
        if(!empty($category)) { $bills->where('category_id', '=', $category); }
        
        $bills->rightJoin('bill_payments', function($join) use($account, $year) {
            $join->on('bills.id', '=', 'bill_payments.bill_id')
                ->whereRaw('YEAR(date) = ?', $year);
            if(!empty($account))    { $join->where('account_id', '=', $account); }
        });

        $bills = $bills->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                    ->groupBy('month', 'category_id')
                    ->get();
        $billData = $this->Summarize($bills)['total'];


        // ------------------------------TOTAL REVENUE INCOME-----------------------------------------------------------

        $revenues = Revenue::selectRaw('sum(amount) as amount, MONTH(date) as month,YEAR(date) as year, category_id')
                    ->where('created_by', $creatorId)
                    ->whereRAW('YEAR(date) =?', [$year]);

        if(!empty($account))    { $revenues->where('account_id', '=', $account); }
        if(!empty($category))   { $revenues->where('category_id', '=', $category); }
        if(!empty($customer))   { $revenues->where('customer_id', '=', $customer); }

        $revenues = $revenues->groupBy('month', 'year', 'category_id')->get();
        
        $revenueData = $this->Summarize($revenues)['total'];

        //--------------------------- TOTAL INVOICE INCOME-----------------------------------------------

        $invoices = Invoice::where('invoices.created_by', $creatorId)->where('invoices.status', '!=', 0);
        
        if(!empty($customer)) { $invoices->where('customer_id', '=', $customer); }
        if(!empty($category)) { $invoices->where('category_id', '=', $category); }
        
        $invoices->rightJoin('invoice_payments', function($join) use($account, $year) {
            $join->on('invoices.id', '=', 'invoice_payments.invoice_id')
                ->whereRaw('YEAR(date) = ?', $year);
            if(!empty($account))    { $join->where('account_id', '=', $account); }
        });

        $invoices = $invoices->selectRaw( 'MONTH(date) AS month, sum(amount) as amount, category_id' )
                    ->groupBy('month', 'category_id')
                    ->get();
        
        $invoiceData = $this->Summarize($invoices)['total'];
        //        ----------------------------------------------------------------------------------------------------

        $totalIncome = array_map(
            function (){
                return array_sum(func_get_args());
            }, $invoiceData, $revenueData
        );

        $totalExpense = array_map(
            function (){
                return array_sum(func_get_args());
            }, $paymentData, $billData
        );

        $profit = [];
        $keys   = array_keys($totalIncome + $totalExpense);

        foreach($keys as $v)
        {
            $profit[$v] = (empty($totalIncome[$v]) ? 0 : $totalIncome[$v]) - (empty($totalExpense[$v]) ? 0 : $totalExpense[$v]);
        }


        $data['paymentExpenseTotal'] = $paymentData;
        $data['billExpenseTotal']    = $billData;
        $data['revenueIncomeTotal']  = $revenueData;
        $data['invoiceIncomeTotal']  = $invoiceData;
        $data['profit']              = $profit;

        return $data;
    }
}