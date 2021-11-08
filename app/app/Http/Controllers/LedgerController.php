<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BankAccount;
use App\Models\Bill;
use App\Models\BillPayment;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    
    public function index(Request $request){
        if(\Auth::user()->can('view ledger')){
            $month['01']   = __('January');
            $month['02']   = __('February');
            $month['03']   = __('March');
            $month['04']   = __('April');
            $month['05']   = __('May');
            $month['06']   = __('June');
            $month['07']   = __('July');
            $month['08']   = __('August');
            $month['09']   = __('September');
            $month['10']   = __('October');
            $month['11']   = __('November');
            $month['12']   = __('December');
            $months        = collect($month);

            $years         = \Auth::user()->getAllRecordYear();

            $accounts      = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get();
            $defaultAccount= $accounts->first();
            $categories    = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '!=', 0)->get();
            foreach($accounts as $account){
                $accountList['account-'.$account->id] = $account->bank_name . ' ' . $account->holder_name;
            }
            foreach($categories as $category){
                $accountList['category-'.$category->id] = $category->name;
            }
            $accountList   = collect($accountList);

            
            $balanceQuery  = \DB::table('balance')->where('created_by', '=', \Auth::user()->creatorId());

            $revenuesQuery = Revenue::where('created_by', '=', \Auth::user()->creatorId());
            $invoicesQuery = InvoicePayment::where('created_by', '=', \Auth::user()->creatorId());
            $paymentsQuery = Payment::where('created_by', '=', \Auth::user()->creatorId());
            $billsQuery    = BillPayment::where('created_by', '=', \Auth::user()->creatorId());
            $transferQuery = Transfer::where('created_by', '=', \Auth::user()->creatorId());
            
            // akun bank yang mana
            $isCategory = false;
            if(!empty($request->account)){
                $contents = explode('-', $request->account);
                if($contents[0] == 'category'){
                    $isCategory = true;
                    $billsId = Bill::where('created_by', '=', \Auth::user()->creatorId())->where('category_id', '=', $contents[1])->pluck('id');
                    $invoicesId = Invoice::where('created_by', '=', \Auth::user()->creatorId())->where('category_id', '=', $contents[1])->pluck('id');
                }
                $account_id = $contents[1];
            } else {
                $account_id = $defaultAccount->id;
            }

            // Pilih tahun berapa
            if(!empty($request->year)){ $selected_year = $request->year; } 
            else { $selected_year = date('Y'); }
            
            // Pilih bulan apa
            if(!empty($request->month)){ $selected_month = $request->month; } 
            else { $selected_month = date('m'); }

            // masukkan querynya
            if($isCategory){
                $revenuesQuery->where('category_id', '=', $account_id);
                $paymentsQuery->where('category_id', '=', $account_id);
                $count = 0;
                if(!count($billsId)){
                    $billsQuery->where('bill_id', '=', 0);
                }
                foreach($billsId as $id){
                    if(!$count){
                        $billsQuery->where('bill_id', '=', $id);
                    } else {
                        $billsQuery->orWhere('bill_id', '=', $id);
                    }
                    $billsQuery->where('year(`date`) = ?', array($selected_year));
                    $billsQuery->whereRaw('month(`date`) = ?', array($selected_month));
                }
                $count = 0;
                if(!count($invoicesId)){
                    $invoicesQuery->where('invoice_id', '=', 0);
                }
                foreach($invoicesId as $id){
                    if(!$count){
                        $invoicesQuery->where('invoice_id', '=', $id);
                    } else {
                        $invoicesQuery->orWhere('invoice_id', '=', $id);
                    }
                    $invoicesQuery->whereRaw('year(`date`) = ?', array($selected_year));
                    $invoicesQuery->whereRaw('month(`date`) = ?', array($selected_month));
                }

                $revenuesQuery->whereRaw('year(`date`) = ?', array($selected_year));
                $paymentsQuery->whereRaw('year(`date`) = ?', array($selected_year));

                $revenuesQuery->whereRaw('month(`date`) = ?', array($selected_month));
                $paymentsQuery->whereRaw('month(`date`) = ?', array($selected_month));
                
                $revenues  = $revenuesQuery->get();
                $invoices  = $invoicesQuery->get();
                $payments  = $paymentsQuery->get();
                $bills     = $billsQuery->get();
                
                $unsorted_data = $revenues->merge($invoices)->merge($payments)->merge($bills);
                $prevBalance = $this->getCategoryBalance($account_id, $selected_month, $selected_year);
            } else {
                $balanceQuery->where('account_id', '=', $account_id);
                $revenuesQuery->where('account_id', '=', $account_id);
                $invoicesQuery->where('account_id', '=', $account_id);
                $paymentsQuery->where('account_id', '=', $account_id);
                $billsQuery->where('account_id', '=', $account_id);
                $transferQuery->where('from_account', '=', $account_id);

                $balanceQuery->whereRaw('year(`date`) = ?', array($selected_year));

                $revenuesQuery->whereRaw('year(`date`) = ?', array($selected_year));
                $invoicesQuery->whereRaw('year(`date`) = ?', array($selected_year));
                $paymentsQuery->whereRaw('year(`date`) = ?', array($selected_year));
                $billsQuery->whereRaw('year(`date`) = ?', array($selected_year));
                $transferQuery->whereRaw('year(`date`) = ?', array($selected_year));

                $balanceQuery->whereRaw('month(`date`) = ?', array($selected_month));

                $revenuesQuery->whereRaw('month(`date`) = ?', array($selected_month));
                $invoicesQuery->whereRaw('month(`date`) = ?', array($selected_month));
                $paymentsQuery->whereRaw('month(`date`) = ?', array($selected_month));
                $billsQuery->whereRaw('month(`date`) = ?', array($selected_month));
                $transferQuery->whereRaw('month(`date`) = ?', array($selected_month));

                $transferQuery->orWhere('to_account', '=', $account_id)->whereRaw('year(`date`) = ?', array($selected_year))->whereRaw('month(`date`) = ?', array($selected_month));
                
                // dapetin data dari db
                $prevBalance  = $balanceQuery->get();
                if(count($prevBalance) == 0){
                    $prevBalance = $defaultAccount->opening_balance;
                } else {
                    $prevBalance = ((array)$prevBalance->first())['previous_month'];
                }

                $revenues  = $revenuesQuery->get();
                $invoices  = $invoicesQuery->get();
                $payments  = $paymentsQuery->get();
                $bills     = $billsQuery->get();
                $transfers = $transferQuery->get();
                
                // sort data
                $unsorted_data = $revenues->merge($invoices)->merge($payments)->merge($bills)->merge($transfers);
            }
            
            $ledger_data   = $unsorted_data->sortBy('date')->values()->all();
            $ledger        = array();

            foreach($ledger_data as $data){
                if($isCategory){
                    if(is_a($data, 'App\Models\Revenue') || is_a($data, 'App\Models\Payment')){
                        $description = $data->description;
                    } else if(is_a($data, 'App\Models\InvoicePayment')){
                        $description = \Auth::user()->invoiceNumberFormat($data->invoice_id).' Payment';
                    } else if(is_a($data, 'App\Models\BillPayment')){
                        $description = \Auth::user()->billNumberFormat($data->invoice_id).' Payment';
                    } else {
                        $description = '';
                    }
                    $ledger[] = array(
                        'date' => $data->date,
                        'description' => $description,
                        'debit' => 0,
                        'credit' => $data->amount
                    );
                } else {
                    if(is_a($data, 'App\Models\Revenue')){
                        $credit = $data->amount;
                        $debit = 0;
                        $description = $data->description;
                    } else if(is_a($data, 'App\Models\Payment')){
                        $debit = $data->amount;
                        $credit = 0;
                        $description = $data->description;
                    } else if(is_a($data, 'App\InvoicePayment')){
                        $credit = $data->amount;
                        $debit = 0;
                        $description = \Auth::user()->invoiceNumberFormat($data->invoice_id).' Payment';
                    } else if(is_a($data, 'App\BillPayment')){
                        $debit = $data->amount;
                        $credit = 0;
                        $description = \Auth::user()->billNumberFormat($data->invoice_id).' Payment';
                    }
                    $ledger[] = array(
                        'date' => $data->date,
                        'description' => $description,
                        'debit' => $debit,
                        'credit' => $credit
                    );
                }
            }

            $count  = count($ledger);
            $ledger = collect($ledger);
            

            return view('ledger.index', compact('ledger', 'count', 'months', 'years', 'accountList', 'prevBalance'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    private function getCategoryBalance($id, $month, $year){
        $billsId = Bill::where('created_by', '=', \Auth::user()->creatorId())->where('category_id', '=', $id)->pluck('id');
        $invoicesId = Invoice::where('created_by', '=', \Auth::user()->creatorId())->where('category_id', '=', $id)->pluck('id');
        $revenuesQuery = Revenue::where('created_by', '=', \Auth::user()->creatorId());
        $invoicesQuery = InvoicePayment::where('created_by', '=', \Auth::user()->creatorId());
        $paymentsQuery = Payment::where('created_by', '=', \Auth::user()->creatorId());
        $billsQuery    = BillPayment::where('created_by', '=', \Auth::user()->creatorId());
        
        $revenuesQuery->where('category_id', '=', $id);
        $paymentsQuery->where('category_id', '=', $id);

        $date = date("Y-m-d", mktime(null,null,null,$month,01,$year));

        $count = 0;
        if(!count($billsId)){
            $billsQuery->where('bill_id', '=', 0);
        }
        foreach($billsId as $billId){
            if(!$count){
                $billsQuery->where('bill_id', '=', $billId);
            } else {
                $billsQuery->orWhere('bill_id', '=', $billId);
            }
            $billsQuery->where('date', '<', $date);
        }
        $count = 0;
        if(!count($invoicesId)){
            $invoicesQuery->where('invoice_id', '=', 0);
        }
        foreach($invoicesId as $id){
            if(!$count){
                $invoicesQuery->where('invoice_id', '=', $id);
            } else {
                $invoicesQuery->orWhere('invoice_id', '=', $id);
            }
            $invoicesQuery->where('date', '<', $date);
        }

        $revenuesQuery->where('date', '<', $date);
        $paymentsQuery->where('date', '<', $date);
        $revenues = $revenuesQuery->sum('amount');
        $payments = $paymentsQuery->sum('amount');
        $invoices = $invoicesQuery->sum('amount');
        $bills = $billsQuery->sum('amount');

        $total = (!empty($revenues) ? $revenues : 0) + (!empty($invoices) ? $invoices : 0);
        $total -= (!empty($payments) ? $payments : 0) - (!empty($bills) ? $bills : 0);
        
        return abs($total);
    }
}
