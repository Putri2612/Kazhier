<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BillPayment;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\Revenue;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    
    public function index(Request $request){
        if(\Auth::user()->can('view journal')){

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
            
            $years         = Auth::user()->getAllRecordYear();
            

            $revenuesQuery = Revenue::where('created_by', '=', \Auth::user()->creatorId());
            $invoicesQuery = InvoicePayment::where('created_by', \Auth::user()->creatorId());
            $paymentsQuery = Payment::where('created_by', '=', \Auth::user()->creatorId());
            $billsQuery    = BillPayment::where('created_by', \Auth::user()->creatorId());
            $transferQuery = Transfer::where('created_by', \Auth::user()->creatorId());

            if( !empty($request->year) ) { $selected_year = $request->year; } 
            else if( $years->contains(date('Y')) ) { $selected_year = date('Y'); }
            else { $selected_year = $years->first(); }

            $revenuesQuery->whereRaw('year(`date`) = ?', array($selected_year));
            $invoicesQuery->whereRaw('year(`date`) = ?', array($selected_year));
            $paymentsQuery->whereRaw('year(`date`) = ?', array($selected_year));
            $billsQuery->whereRaw('year(`date`) = ?', array($selected_year));
            $transferQuery->whereRaw('year(`date`) = ?', array($selected_year));

            if(!empty($request->month)){
                $selected_month = $request->month;
            } else {
                $selected_month = date('m');
            }
            $revenuesQuery->whereRaw('month(`date`) = ?', array($selected_month));
            $invoicesQuery->whereRaw('month(`date`) = ?', array($selected_month));
            $paymentsQuery->whereRaw('month(`date`) = ?', array($selected_month));
            $billsQuery->whereRaw('month(`date`) = ?', array($selected_month));
            $transferQuery->whereRaw('month(`date`) = ?', array($selected_month));

            $revenues  = $revenuesQuery->get();
            $invoices  = $invoicesQuery->get();
            $payments  = $paymentsQuery->get();
            $bills     = $billsQuery->get();
            $transfers = $transferQuery->get();

            $unsorted_data = $revenues->merge($invoices)->merge($payments)->merge($bills)->merge($transfers);
            $journal_data  = $unsorted_data->sortBy('date')->values()->all();

            return view('journal.index', compact('journal_data', 'months', 'years', 'selected_year'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
