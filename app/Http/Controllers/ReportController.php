<?php

namespace App\Http\Controllers;

use App\Classes\Report;
use App\Exports\ExpenseSummaryExport;
use App\Exports\IncomeSummaryExport;
use App\Exports\IncomeVSExpenseSummaryExport;
use App\Exports\ProfitLossSummaryExport;
use App\Models\BankAccount;
use App\Models\Bill;
use App\Models\BillProduct;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Payment;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\Tax;
use App\Models\Vender;
use Illuminate\Http\Request;
use App\Models\Imports\TransactionImport;
use App\Traits\DataGetter;
use App\Traits\TimeGetter;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    use DataGetter, TimeGetter;
    public function incomeSummary(Request $request)
    {
        if(\Auth::user()->can('income report'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend(__('All'), '');
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 1)->get()->pluck('name', 'id');
            $category->prepend(__('All'), '');

            $yearList   = $this->Years();
            
            if(!empty($request->input('year')))
            {
                $year = $request->input('year');
            } else if(in_array(date('Y'), $yearList)) {
                $year = date('Y');
            } else {
                $year = $yearList->first();
            }

            $data = Report::IncomeSummary($year, $request->input('account'), $request->input('category'), $request->input('customer'));

            $data['monthList']      = $this->Months();
            $data['yearList']       = $yearList;
            $data['currentYear']    = $year;
            $data['account']        = $account;
            $data['customer']       = $customer;
            $data['category']       = $category;

            return view('report.income_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    public function expenseSummary(Request $request)
    {
        if(\Auth::user()->can('expense report'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');
            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $vender->prepend(__('All'), '');
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get()->pluck('name', 'id');
            $category->prepend(__('All'), '');

            $yearList = $this->Years();
            
            if(!empty($request->input('year')))
            {
                $year = $request->input('year');
            } else if(in_array(date('Y'), $yearList)) {
                $year = date('Y');
            } else {
                $year = $yearList->first();
            }

            $data                   = Report::ExpenseSummary($year, $request->input('account'), $request->input('category'), $request->input('vender'));
            $data['currentYear']    = $year;
            $data['monthList']      = $this->Months();
            $data['yearList']       = $yearList;
            $data['account']        = $account;
            $data['vender']         = $vender;
            $data['category']       = $category;

            return view('report.expense_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    public function incomeVsExpenseSummary(Request $request)
    {
        if(\Auth::user()->can('income vs expense report'))
        {
            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');
            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $vender->prepend(__('All'), '');
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $customer->prepend(__('All'), '');
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $category->prepend(__('All'), '');

            $yearList   = $this->Years();
            
            if(!empty($request->input('year')))
            {
                $year = $request->input('year');
            } else if(in_array(date('Y'), $yearList)) {
                $year = date('Y');
            } else {
                $year = $yearList->first();
            }
            $data = Report::IncomeXExpense($year, $request->input('account'), $request->input('category'), $request->input('customer'), $request->input('vender'));

            
            $data['currentYear'] = $year;
            $data['monthList'] = $month = $this->Months();
            $data['yearList']  = $yearList;

            
            $data['account']             = $account;
            $data['vender']              = $vender;
            $data['customer']            = $customer;
            $data['category']            = $category;

            return view('report.income_vs_expense_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function taxSummary(Request $request)
    {

        if(\Auth::user()->can('tax report'))
        {
            $data['monthList'] = $month = $this->Months();
            $data['yearList']  = $this->Years();

            if(isset($request->year))
            {
                $year = $request->year;
            }
            else
            {
                $year = date('Y');
            }

            $data['currentYear'] = $year;

            $taxList        = Tax::select('id', 'name')->where('created_by', '=', \Auth::user()->creatorId())->get();
            $invoiceProduct = InvoiceProduct::selectRaw('product_services.tax_id as tax_id,sum(invoice_products.price) as amount,sum(invoice_products.tax) as tax,MONTH(invoice_products.created_at) as month,YEAR(invoice_products.created_at) as year')->leftjoin('product_services', 'invoice_products.product_id', '=', 'product_services.id')->whereRaw('YEAR(invoice_products.created_at) =?', [$year])->where('product_services.created_by', '=', \Auth::user()->creatorId())->groupBy('month', 'year', 'tax_id')->get();

            $incomeArray = [];
            foreach($invoiceProduct as $incomeTax)
            {
                $tax                                                = $incomeTax->tax;
                $amount                                             = $incomeTax->amount;
                $taxAmount                                          = $amount * $tax / 100;
                $incomeArray[$incomeTax->tax_id][$incomeTax->month] = $taxAmount;
            }

            $income = [];
            foreach($incomeArray as $tax_id => $record)
            {
                $tmp         = [];
                $tmp['tax']  = !empty(Tax::where('id', '=', $tax_id)->first()) ? Tax::where('id', '=', $tax_id)->first()->name : '';
                $tmp['data'] = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $income[] = $tmp;
            }


            $billProduct  = BillProduct::selectRaw('product_services.tax_id as tax_id,sum(bill_products.price) as amount,sum(bill_products.tax) as tax,MONTH(bill_products.created_at) as month,YEAR(bill_products.created_at) as year')->leftjoin('product_services', 'bill_products.product_id', '=', 'product_services.id')->whereRaw('YEAR(bill_products.created_at) =?', [$year])->where('product_services.created_by', '=', \Auth::user()->creatorId())->groupBy('month', 'year', 'tax_id')->get();
            $expenseArray = [];
            foreach($billProduct as $expenseTax)
            {
                $tax       = $expenseTax->tax;
                $amount    = $expenseTax->amount;
                $taxAmount = $amount * $tax / 100;

                $expenseArray[$expenseTax->tax_id][$expenseTax->month] = $taxAmount;
            }
            $expense = [];
            foreach($expenseArray as $tax_id => $record)
            {
                $tmp         = [];
                $tmp['tax']  = !empty(Tax::where('id', '=', $tax_id)->first()) ? Tax::where('id', '=', $tax_id)->first()->name : '';
                $tmp['data'] = [];
                for($i = 1; $i <= 12; $i++)
                {
                    $tmp['data'][$i] = array_key_exists($i, $record) ? $record[$i] : 0;
                }
                $expense[] = $tmp;
            }

            $data['expenses'] = $expense;
            $data['incomes']  = $income;

            return view('report.tax_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function profitLossSummary(Request $request)
    {

        if(Auth::user()->can('loss & profit report'))
        {
            $yearList   = $this->Years();
            
            if(!empty($request->input('year')))
            {
                $year = $request->input('year');
            } else if(in_array(date('Y'), $yearList)) {
                $year = date('Y');
            } else {
                $year = $yearList->first();
            }

            $data = $this->GetProfitLoss($year);
            $data['yearList']       = $yearList;

            return view('report.profit_loss_summary', $data);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    public function invoiceSummary(Request $request)
    {

        if(\Auth::user()->can('invoice report'))
        {
            $year     = date('Y');
            $customer = Customer::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'customer_id');

            $customer->prepend(__('All'), '');

            $status = Invoice::$statuses;

            $query = Invoice::where('created_by', '=', \Auth::user()->creatorId());

            if(!empty($request->customer))
            {
                $query->where('customer_id', '=', $request->customer);
            }
            if(!empty($request->issue_date))
            {
                $date_range = explode(' - ', $request->issue_date);
                $query->whereBetween('issue_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $query->whereRAW('YEAR(send_date) =?', [$year]);
            $invoices = $query->get();

            $totalInvoice    = 0;
            $totalDueInvoice = 0;
            foreach($invoices as $invoice)
            {
                $totalInvoice    += $invoice->getTotal();
                $totalDueInvoice += $invoice->getDue();
            }

            $totalPaidInvoice = $totalInvoice - $totalDueInvoice;


            //---------------------------INVOICE INCOME-----------------------------------------------

            $invoiceData = Invoice:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $invoiceData->whereRAW('YEAR(send_date) =?', [$year]);

            $invoiceData = $invoiceData->get();

            $invoiceTotalArray = [];
            foreach($invoiceData as $invoice)
            {
                $invoiceTotalArray[$invoice->month][] = $invoice->getTotal();
            }
            for($i = 1; $i <= 12; $i++)
            {
                $invoiceTotal[] = array_key_exists($i, $invoiceTotalArray) ? array_sum($invoiceTotalArray[$i]) : 0;
            }

            $monthList = $month = $this->Months();

            return view('report.invoice_report', compact('invoices', 'customer', 'status', 'totalInvoice', 'totalDueInvoice', 'totalPaidInvoice', 'invoiceTotal', 'monthList'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function billSummary(Request $request)
    {
        if(\Auth::user()->can('bill report'))
        {
            $year   = date('Y');
            $vender = Vender::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'vender_id');
            $vender->prepend(__('All'), '');

            $status = Invoice::$statuses;

            $query = Bill::where('created_by', '=', \Auth::user()->creatorId());
            if(!empty($request->vender))
            {
                $query->where('vender_id', '=', $request->vender);
            }
            if(!empty($request->bill_date))
            {
                $date_range = explode(' - ', $request->bill_date);
                $query->whereBetween('bill_date', $date_range);
            }

            if(!empty($request->status))
            {
                $query->where('status', '=', $request->status);
            }
            $query->whereRAW('YEAR(send_date) =?', [$year]);
            $bills = $query->get();

            $totalBill    = 0;
            $totalDueBill = 0;
            foreach($bills as $bill)
            {
                $totalBill    += $bill->getTotal();
                $totalDueBill += $bill->getDue();
            }

            $totalPaidBill = $totalBill - $totalDueBill;

            //---------------------------BILL EXPPENSE-----------------------------------------------
            $billData = Bill:: selectRaw('MONTH(send_date) as month,YEAR(send_date) as year,category_id,bill_id,id')->where('created_by', \Auth::user()->creatorId())->where('status', '!=', 0);
            $billData->whereRAW('YEAR(send_date) =?', [$year]);

            $billData       = $billData->get();
            $billTotalArray = [];
            foreach($billData as $bill)
            {
                $billTotalArray[$bill->month][] = $bill->getTotal();
            }

            for($i = 1; $i <= 12; $i++)
            {
                $billTotal[] = array_key_exists($i, $billTotalArray) ? array_sum($billTotalArray[$i]) : 0;
            }

            $monthList = $month = $this->Months();

            return view('report.bill_report', compact('bills', 'vender', 'status', 'totalBill', 'totalDueBill', 'totalPaidBill', 'billTotal', 'monthList'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function accountStatement(Request $request)
    {

        if(\Auth::user()->can('statement report'))
        {
            if(!empty($request->input('date'))){
                $date       = $request->input('date');
                $date_range = explode(' - ', $date);
                $from       = $date_range[0];
                $to         = $date_range[1];
            } else {
                $from       = date('Y-m-d', strtotime('today - 3 month'));
                $to         = date('Y-m-d');
                $date_range = [$from, $to];
            }
            
            
            $reportData['credit'] = [];
            $reportData['debit']  = [];

            if(isset($_GET['account']))
            {
                $accountName = BankAccount::find($_GET['account']);
            }
            else
            {
                $accountName = 'All';
            }

            $account = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend(__('All'), '');

            $displayAccount = BankAccount::selectRaw('CONCAT(holder_name, " - ", bank_name) AS name, current_balance AS balance')->where('created_by', Auth::user()->creatorId());
            if(!empty($request->input('account'))) {
                $displayAccount->where('id', $request->input('account'));
            }
            $displayAccount = $displayAccount->get();

            $types = [
                'all' => __('All'),
                'credit' => __('Credit'),
                'debit' => __('Debit'),
            ];

            if($request->type == 'credit')
            {
                $revenue = Revenue::where('created_by', '=', \Auth::user()->creatorId());
                if(!empty($request->account))
                {
                    $revenue->where('account_id', '=', $request->account);
                }
                $reportData['credit'] = $revenue->whereBetween('date', $date_range)->orderBy('id', 'desc')->get();

            }
            elseif($request->type == 'debit')
            {
                $payment = Payment::where('created_by', '=', \Auth::user()->creatorId());
                if(!empty($request->account))
                {
                    $payment->where('account_id', '=', $request->account);
                }

                $reportData['debit'] = $payment->whereBetween('date', $date_range)->orderBy('id', 'desc')->get();
            }
            else
            {
                $revenue = Revenue::where('created_by', '=', \Auth::user()->creatorId());
                $payment = Payment::where('created_by', '=', \Auth::user()->creatorId());
                if(!empty($request->account))
                {
                    $revenue->where('account_id', '=', $request->account);
                    $payment->where('account_id', '=', $request->account);
                }
                $reportData['credit'] = $revenue->whereBetween('date', $date_range)->orderBy('id', 'desc')->get();
                $reportData['debit']  = $payment->whereBetween('date', $date_range)->orderBy('id', 'desc')->get();

            }

            return view('report.statement_report', compact('reportData', 'account', 'types', 'accountName', 'from', 'to', 'displayAccount'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission Denied.'));
        }
    }

    public function export($name, Request $request) {
        if($name == 'income-summary') {
            $account    = $request->input('account');
            $category   = $request->input('category');
            $customer   = $request->input('customer');
            $year       = empty($request->input('year')) ? date('Y') : $request->input('year');
            return Excel::download(new IncomeSummaryExport($year, $account, $category, $customer), "{$year} income summary.xlsx");
        } else if ($name == 'expense-summary') {
            $year       = empty($request->input('year')) ? date('Y') : $request->input('year');
            return Excel::download(
                new ExpenseSummaryExport(
                    $year,
                    $request->input('account'),
                    $request->input('category'),
                    $request->input('vender')
                ),
                "{$year} expense summary.xlsx"
            );
        } else if ($name == 'profit-loss-summary') {
            $year = empty($request->input('year')) ? date('Y') : $request->input('year');
            return Excel::download(
                new ProfitLossSummaryExport($year),
                "{$year} profit loss summary.xlsx"
            );
        } else if ($name == 'income-vs-expense-summary') {
            $year = empty($request->input('year')) ? date('Y') : $request->input('year');
            return Excel::download(
                new IncomeVSExpenseSummaryExport($year, $request->input('account'), $request->input('category'), $request->input('customer'), $request->input('vender')),
                "{$year} income vs expense summary.xlsx"
            );
        }
    }
}
