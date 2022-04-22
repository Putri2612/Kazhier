<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\CreditNote;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Utility;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CreditNoteController extends Controller
{
    use CanManageBalance, CanProcessNumber, CanRedirect, ApiResponse;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(\Auth::user()->can('manage credit note'))
        {
            $invoices = Invoice::where('created_by', \Auth::user()->creatorId())->get();

            return view('creditNote.index', compact('invoices'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage credit note')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }
        $invoices = Invoice::select('id')->where('created_by', Auth::user()->creatorId())->pluck('id');

        $query = CreditNote::whereIn('invoice', $invoices);
        $page   = Pagination::getTotalPage($query, $request);
        if($page === false) {
            return $this->NotFoundResponse();
        }

        $creditNote = $query->select('id', 'date', 'amount', 'description', 'invoice', 'customer')
                    ->with(['customer:id,name', 'getinvoice:id,invoice_id'])
                    ->orderBy('date', 'desc')
                    ->orderBy('invoice', 'desc')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();

        if($creditNote->isEmpty()) {
            return $this->NotFoundResponse();
        }
        foreach ($creditNote as $note) {
            $note->invoice_number = $note->getinvoice->invoiceNumber();
        }

        return $this->PaginationSuccess($creditNote, $page['totalPage']);
    }

    public function create($invoice_id)
    {
        if(\Auth::user()->can('create credit note'))
        {

            $invoiceDue = Invoice::where('id', $invoice_id)->first();

            return view('creditNote.create', compact('invoiceDue', 'invoice_id'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request, $invoice_id)
    {
        if(\Auth::user()->can('create credit note'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'amount' => 'required',
                                   'date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $invoice = Invoice::where('id', $invoice_id)->first();
            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            if($amount > $invoice->getDue())
            {
                return redirect()->back()->with('error', 'Maximum ' . \Auth::user()->priceFormat($invoiceDue->getDue()) . ' credit limit of this invoice.');
            }

            $credit              = new CreditNote();
            $credit->invoice     = $invoice_id;
            $credit->customer    = $invoice->customer_id;
            $credit->date        = $request->input('date');
            $credit->amount      = $amount;
            $credit->description = $request->input('description');
            $credit->save();
            
            $invoice->updateStatus();

            return redirect()->back()->with('success', __('Credit Note successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit($invoice_id, $creditNote_id)
    {
        if(\Auth::user()->can('edit credit note'))
        {

            $creditNote = CreditNote::find($creditNote_id);
            $creditNote->amount = $this->FloatToReadableNumber($creditNote->amount);

            return view('creditNote.edit', compact('creditNote'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $invoice_id, $creditNote_id)
    {

        if(\Auth::user()->can('edit credit note'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'amount' => 'required',
                                   'date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $invoice    = Invoice::where('id', $invoice_id)->where('created_by', Auth::user()->creatorId())->first();
            if(empty($invoice)) {
                return $this->RedirectNotFound();
            }
            $credit     = $invoice->creditNote()->where('id', $creditNote_id)->first();
            
            if(empty($credit)) {
                return $this->RedirectNotFound();
            }
            $due        = $invoice->getDue() + $credit->amount;

            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            if($amount > $due) {
                return redirect()->back()->with('error', 'Maximum ' . \Auth::user()->priceFormat($due) . ' credit limit of this invoice.');
            }

            
            $credit->date        = $request->input('date');
            $credit->amount      = $amount;
            $credit->description = $request->input('description');
            $credit->save();

            return redirect()->back()->with('success', __('Credit Note successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($invoice_id, $creditNote_id)
    {
        if(\Auth::user()->can('delete credit note'))
        {
            $invoice    = Invoice::where('created_by', Auth::user()->creatorId())
                        ->where('id', $invoice_id)
                        ->first();

            $creditNote = $invoice->creditNote()->where('id', $creditNote_id)->first();

            if(empty($creditNote)) {
                return $this->RedirectNotFound();
            }

            $creditNote->delete();

            return redirect()->back()->with('success', __('Credit Note successfully deleted.'));

        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function customCreate()
    {
        if(\Auth::user()->can('create credit note'))
        {

            $invoices = Invoice::where('created_by', \Auth::user()->creatorId())->get()->pluck('invoice_id', 'id');

            return view('creditNote.custom_create', compact('invoices'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function customStore(Request $request)
    {
        if(\Auth::user()->can('create credit note'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'invoice' => 'required|numeric',
                                   'amount' => 'required|numeric',
                                   'date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $invoice_id = $request->invoice;
            $invoiceDue = Invoice::where('id', $invoice_id)->first();

            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            if($amount > $invoiceDue->getDue())
            {
                return redirect()->back()->with('error', 'Maximum ' . \Auth::user()->priceFormat($invoiceDue->getDue()) . ' credit limit of this invoice.');
            }
            $invoice             = Invoice::where('id', $invoice_id)->first();
            $credit              = new CreditNote();
            $credit->invoice     = $invoice_id;
            $credit->customer    = $invoice->customer_id;
            $credit->date        = $request->input('date');
            $credit->amount      = $amount;
            $credit->description = $request->input('description');
            $credit->save();

            return redirect()->back()->with('success', __('Credit Note successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function getinvoice(Request $request)
    {
        Log::debug($request->all());
        $invoice = Invoice::where('id', $request->input('invoice_id'))->first();
        echo json_encode($this->FloatToReadableNumber($invoice->getDue()));
    }

}
