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
use App\Traits\CanManageBalance;
use App\Traits\DataGetter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    use CanManageBalance, DataGetter;
    
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

            // akun bank yang mana
            $isCategory = false;
            if(!empty($request->account)){
                $contents = explode('-', $request->account);
                if( $contents[0] == 'category' ) { $isCategory = true; }
                $account_id = $contents[1];
            } else {
                $account_id = $defaultAccount->id;
            }

            // Pilih tahun berapa
            if( !empty($request->year) ){ $selected_year = $request->year; } 
            else { $selected_year = date('Y'); }
            
            // Pilih bulan apa
            if( !empty($request->month) ){ $selected_month = $request->month; } 
            else { $selected_month = date('m'); }

            // masukkan querynya
            if($isCategory){
                $revenues  = $this->GetRevenuesWithCategory($account_id, $selected_month, $selected_year);
                $invoices  = $this->GetInvoicePaymentsWithCategory($account_id, $selected_month, $selected_year);
                $payments  = $this->GetPaymentsWithCategory($account_id, $selected_month, $selected_year);
                $bills     = $this->GetBillPaymentsWithCategory($account_id, $selected_month, $selected_year);
                
                $unsorted_data = $revenues->merge($invoices)->merge($payments)->merge($bills);
                $prevBalance = $this->getCategoryBalance($account_id, $selected_month, $selected_year);
            } else {
                $date = Carbon::createFromFormat('Y m', "{$selected_year} {$selected_month}")->firstOfMonth();
                $prevBalance    =  $this->GetBalanceBefore($date, $defaultAccount);

                $revenues  = $this->GetRevenues($selected_month, $selected_year, $account_id);
                $invoices  = $this->GetInvoicePayments($selected_month, $selected_year, $account_id);
                $payments  = $this->GetPayments($selected_month, $selected_year, $account_id);
                $bills     = $this->GetBillPayments($selected_month, $selected_year, $account_id);
                $transfers = $this->GetTransfers($selected_month, $selected_year, $account_id);
                
                // sort data
                $unsorted_data = $revenues->merge($invoices)->merge($payments)->merge($bills)->merge($transfers);
            }
            
            $ledger_data   = $unsorted_data->sortBy('date')->values()->all();
            $ledger        = array();

            foreach($ledger_data as $data){
                $description = '';
                $debit = 0;
                $credit = 0;
                if($isCategory){
                    if(is_a($data, 'App\Models\Revenue') || is_a($data, 'App\Models\Payment')){
                        $description = $data->description;
                    } else if(is_a($data, 'App\Models\InvoicePayment')){
                        $description = \Auth::user()->invoiceNumberFormat($data->invoice_id).' Payment';
                    } else if(is_a($data, 'App\Models\BillPayment')){
                        $description = \Auth::user()->billNumberFormat($data->invoice_id).' Payment';
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
        $revenues   = $this->GetRevenuesWithCategoryBefore($id, $month, $year)->pluck('amount')->sum();
        $payments   = $this->GetPaymentsWithCategoryBefore($id, $month, $year)->pluck('amount')->sum();
        $invoices   = $this->GetInvoicePaymentsWithCategoryBefore($id, $month, $year)->pluck('amount')->sum();
        $bills      = $this->GetBillPaymentsWithCategoryBefore($id, $month, $year)->pluck('amount')->sum();

        return $revenues + $invoices - $payments - $bills;
    }
}
