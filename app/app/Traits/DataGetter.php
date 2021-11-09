<?php

namespace App\Traits;

use App\Models\Bill;
use App\Models\BillPayment;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Payment;
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

    public function GetRevenuesWithCategory($category, $month = null, $year = null){
        $revenuesQuery = Revenue::where('created_by', '=', Auth::user()->creatorId())
                            ->where('category_id', '=', $category);

        if( $month ) { $revenuesQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year ) { $revenuesQuery->whereRaw('year(`date`) = ?', $year); }

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

    public function GetInvoices($month, $year){
        $dateQuery  = "(
            ( year(`issue_date`) = {$year} AND month(`issue_date`) = {$month} ) OR
            ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} ) OR
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
                ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} ) OR
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

    public function GetInvoicePaymentsWithCategory($category, $month = null, $year = null){
        $Invoices = $this->GetInvoicesWithCategory($category, $month, $year);
        
        if(empty($Invoices)){
            return [];
        }

        $count      = 0;
        $idQuery    = "(";
        foreach( $Invoices as $Invoice ){
            if($count){ $idQuery .= " OR "; }
            $idQuery .= "`invoice_id` = {$Invoice->id}";
            $count++;
        }
        $idQuery    .= ")";

        $paymentQuery = InvoicePayment::where('created_by', '=', Auth::user()->creatorId());

        if( $month ) { $paymentQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year ) { $paymentQuery->whereRaw('year(`date`) = ?', $year); }

        return $paymentQuery->whereRaw($idQuery)->get();
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

        $count      = 0;
        $idQuery    = "(";
        foreach( $Invoices as $Invoice ){
            if($count){ $idQuery .= " OR "; }
            $idQuery .= "`invoice_id` = {$Invoice->id}";
            $count++;
        }
        $idQuery    .= ")";

        return InvoicePayment::where('created_by', '=', Auth::user()->creatorId())
                ->where('date', '<', $date)
                ->whereRaw($idQuery)
                ->get();
    }

    public function GetAllInvoicePayments() {
        return InvoicePayment::where('created_by', '=', Auth::user()->creatorId())->get();
    }

    public function GetBills($month, $year){
        $dateQuery  = "(
            ( year(`bill_date`) = {$year} AND month(`bill_date`) = {$month} ) OR
            ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} ) OR
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
                ( year(`due_date`) = {$year} AND month(`due_date`) = {$month} ) OR
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

        $count      = 0;
        $idQuery    = "(";
        foreach( $Bills as $Bill ){
            if($count){ $idQuery .= " OR "; }
            $idQuery .= "`bill_id` = {$Bill->id}";
            $count++;
        }
        $idQuery    .= ")";

        $paymentQuery = BillPayment::where('created_by', '=', Auth::user()->creatorId());

        if( $month ) { $paymentQuery->whereRaw('month(`date`) = ?', $month); }
        if( $year ) { $paymentQuery->whereRaw('year(`date`) = ?', $year); }

        return $paymentQuery->whereRaw($idQuery)->get();
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
        $idQuery    = "(";
        foreach( $Bills as $Bill ){
            if($count){ $idQuery .= " OR "; }
            $idQuery .= "`bill_id` = {$Bill->id}";
            $count++;
        }
        $idQuery    .= ")";

        return BillPayment::where('created_by', '=', Auth::user()->creatorId())
                ->where('date', '<', $date)
                ->whereRaw($idQuery)
                ->get();
    }

    public function GetAllBillPayments() {
        return BillPayment::where('created_by', '=', Auth::user()->creatorId())->get();
    }


}