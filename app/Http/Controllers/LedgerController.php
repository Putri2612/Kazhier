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
use App\Traits\TimeGetter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LedgerController extends Controller
{
    use CanManageBalance, DataGetter, TimeGetter;
    
    public function index(Request $request){
        if(Auth::user()->can('view ledger')){
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

            $years         = $this->Years();

            // opsi akun & kategori
            $accounts      = BankAccount::where('created_by', '=', Auth::user()->creatorId())->get();
            $defaultAccount= $accounts->first();
            $categories    = ProductServiceCategory::where('created_by', '=', Auth::user()->creatorId())->where('type', '!=', 0)->get();
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
            else if( in_array(date('Y'), $years) ) { $selected_year = date('Y'); }
            else { $selected_year = array_key_first($years); }
            
            // Pilih bulan apa
            if( !empty($request->month) ){ $selected_month = $request->month; } 
            else { $selected_month = date('m'); }

            // Credit
            $revenueQuery = Revenue::toBase()
                        ->select('amount AS credit', 'date', 'description')
                        ->whereMonth('date', $selected_month)
                        ->whereYear('date', $selected_year);
            $invoiceQuery = InvoicePayment::with(['invoice:id,invoice_id'])
                        ->select('invoice_id', 'amount AS credit', 'date')
                        ->whereMonth('date', $selected_month)
                        ->whereYear('date', $selected_year);
            // Debit
            $paymentQuery = Payment::toBase()
                        ->select('amount AS debit', 'date', 'description')
                        ->whereMonth('date', $selected_month)
                        ->whereYear('date', $selected_year);
            $billQuery  = BillPayment::with(['bill:id,bill_id'])
                        ->select('bill_id', 'amount AS debit', 'date')
                        ->whereMonth('date', $selected_month)
                        ->whereYear('date', $selected_year);

            // masukkan querynya
            if($isCategory){
                $revenues   = $revenueQuery->where('category_id', $account_id)->get();
                
                $invoiceIds = Invoice::select('id')->where('category_id', $account_id)->pluck('id');
                $invoices   = $invoiceQuery->whereIn('invoice_id', $invoiceIds)->get();
                $invoices   = collect(json_decode(json_encode($invoices)));

                $payments   = $paymentQuery->where('category_id', $account_id)->get();

                $billIds    = Bill::select('id')->where('category_id', $account_id)->pluck('id');
                $bills      = $billQuery->whereIn('bill_id', $billIds)->get();
                $bills      = collect(json_decode(json_encode($bills)));
                
                $unsorted_data  = $revenues->merge($payments);
                $unprocessed    = $invoices->merge($bills);
                $prevBalance = $this->getCategoryBalance($account_id, $selected_month, $selected_year);
            } else {
                $date           = Carbon::createFromFormat('Y m', "{$selected_year} {$selected_month}")->firstOfMonth();
                $prevBalance    = $this->GetBalanceBefore($date, BankAccount::find($account_id));

                $revenues   = $revenueQuery->where('account_id', $account_id)->get();
                $invoices   = $invoiceQuery->where('account_id', $account_id)->get();
                $invoices   = collect(json_decode(json_encode($invoices)));
                $payments   = $paymentQuery->where('account_id', $account_id)->get();
                $bills      = $billQuery->where('account_id', $account_id)->get();
                $bills      = collect(json_decode(json_encode($bills)));

                $debitTransfer  = Transfer::select('amount AS debit', 'date', 'to_account')
                                ->with(['toBankAccount:id,holder_name,bank_name'])
                                ->whereMonth('date', $selected_month)
                                ->whereYear('date', $selected_year)
                                ->where('from_account', $account_id)
                                ->get();
                $debitTransfer  = collect(json_decode(json_encode($debitTransfer)));

                $creditTransfer = Transfer::select('amount AS credit', 'date', 'from_account')
                                ->with(['fromBankAccount:id,holder_name,bank_name'])
                                ->whereMonth('date', $selected_month)
                                ->whereYear('date', $selected_year)
                                ->where('to_account', $account_id)
                                ->get();
                $creditTransfer  = collect(json_decode(json_encode($creditTransfer)));

                // sort data
                $unsorted_data  = $revenues->merge($payments);
                $unprocessed    = $bills->merge($invoices)
                                ->merge($debitTransfer)
                                ->merge($creditTransfer);
            }

            foreach($unprocessed as $data) {
                if(!empty($data->invoice)) {
                    $invoiceNum = Invoice::number($data->invoice->invoice_id);
                    $data->description = __(':number Payment', ['number' => $invoiceNum]);
                }
                if(!empty($data->bill)) {
                    $billNum = Bill::number($data->bill->bill_id);
                    $data->description = __(':number Payment', ['number' => $billNum]);
                }
                if(!empty($data->from_bank_account)) {
                    $from       = $data->from_bank_account;
                    $account    = "{$from->bank_name} {$from->holder_name}";
                    $data->description = __('Transfer from :account', ['account' => $account]);
                }
                if(!empty($data->to_bank_account)) {
                    $to         = $data->to_bank_account;
                    $account    = "{$to->bank_name} {$to->holder_name}";
                    $data->description = __('Transfer to :account', ['account' => $account]);
                }
            }

            $unsorted_data = $unsorted_data->merge($unprocessed);
            
            $ledger = $unsorted_data->sortBy('date')->values()->all();

            $count  = count($ledger);

            return view('ledger.index', compact('ledger', 'count', 'months', 'years', 'accountList', 'prevBalance', 'selected_year'));
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
