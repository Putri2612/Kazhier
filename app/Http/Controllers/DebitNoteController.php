<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\Bill;
use App\Models\DebitNote;
use App\Models\Utility;
use App\Traits\ApiResponse;
use App\Traits\CanManageBalance;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DebitNoteController extends Controller
{
    use CanManageBalance, 
        CanProcessNumber, 
        CanRedirect, 
        ApiResponse;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(\Auth::user()->can('manage debit note'))
        {
            $bills = Bill::where('created_by', \Auth::user()->creatorId())->get();

            return view('debitNote.index', compact('bills'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage debit note')) {
            return $this->UnauthorizedResponse();
        }
        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }
        
        $bills = Bill::select('id')
                ->where('created_by', Auth::user()->creatorId())
                ->pluck('id');

        $query = DebitNote::whereIn('bill', $bills);

        $page = Pagination::getTotalPage($query, $request);
        if($page === false) {
            return $this->NotFoundResponse();
        }

        $debitNote = $query->select('id', 'date', 'amount', 'description', 'bill', 'vender')
                    ->with(['vender:id,name', 'getBill:id,bill_id'])
                    ->orderBy('date', 'desc')
                    ->orderBy('bill', 'desc')
                    ->skip($page['skip'])->take($page['limit'])
                    ->get();

        if($debitNote->isEmpty()) {
            return $this->NotFoundResponse();
        }
        foreach ($debitNote as $note) {
            $note->bill_number = $note->getBill->billNumber();
        }

        return $this->PaginationSuccess($debitNote, $page['totalPage']);
        
    }

    public function create($bill_id)
    {
        if(\Auth::user()->can('create debit note'))
        {

            $billDue = Bill::where('id', $bill_id)->first();
            if(empty($billDue)) {
                return $this->NotFoundResponse();
            }

            return view('debitNote.create', compact('billDue', 'bill_id'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request, $bill_id)
    {

        if(\Auth::user()->can('create debit note'))
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
            $billDue = Bill::where('id', $bill_id)->first();
            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            if($amount > $billDue->getDue()) {
                return redirect()->back()->with('error', 'Maximum ' . Auth::user()->priceFormat($billDue->getDue()) . ' credit limit of this bill.');
            }
            $bill                = Bill::where('id', $bill_id)->first();
            $credit              = new DebitNote();
            $credit->bill        = $bill_id;
            $credit->vendor      = $bill->vender_id;
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


    public function edit($bill_id, $debitNote_id)
    {
        if(\Auth::user()->can('edit debit note'))
        {
            $bill       = Bill::where('id', $bill_id)->first();

            if(empty($bill)) {
                return $this->NotFoundResponse();
            }

            $debitNote  = $bill->debitNote()->where('id', $debitNote_id)->first();

            if(empty($debitNote)) {
                return $this->NotFoundResponse();
            }

            return view('debitNote.edit', compact('debitNote'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $bill_id, $debitNote_id)
    {

        if(\Auth::user()->can('edit debit note'))
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
            $bill   = Bill::where('id', $bill_id)->first();

            if(empty($bill)) {
                return $this->RedirectNotFound();
            }

            $debit  = $bill->debitNote()->where('id', $debitNote_id)->first();

            if(empty($debit)) {
                return $this->RedirectNotFound();
            }

            $due = $bill->getDue() + $debit->amount;

            $amount = $this->ReadableNumberToFloat($request->input('amount'));
            if($amount > $due) {
                return redirect()->back()->with('error', 'Maximum ' . Auth::user()->priceFormat($due) . ' credit limit of this bill.');
            }

            $debit->date        = $request->input('date');
            $debit->amount      = $amount;
            $debit->description = $request->input('description');
            $debit->save();

            return redirect()->back()->with('success', __('Debit Note successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($bill_id, $debitNote_id)
    {
        if(\Auth::user()->can('delete debit note'))
        {

            $debitNote = DebitNote::find($debitNote_id);
            $debitNote->delete();

            return redirect()->back()->with('success', __('Debit Note successfully deleted.'));

        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function customCreate()
    {
        if(\Auth::user()->can('create debit note'))
        {
            $bills = Bill::where('created_by', \Auth::user()->creatorId())->get()->pluck('bill_id', 'id');

            return view('debitNote.custom_create', compact('bills'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function customStore(Request $request)
    {
        if(\Auth::user()->can('create debit note'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'bill' => 'required|numeric',
                                   'amount' => 'required|numeric',
                                   'date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $bill_id = $request->bill;
            $billDue = Bill::where('id', $bill_id)->first();

            $amount = $this->ReadableNumberToFloat($request->input('amount'));

            if($amount > $billDue->getDue())
            {
                return redirect()->back()->with('error', 'Maximum ' . \Auth::user()->priceFormat($billDue->getDue()) . ' credit limit of this bill.');
            }
            $bill               = Bill::where('id', $bill_id)->first();
            $debit              = new DebitNote();
            $debit->bill        = $bill_id;
            $debit->vendor      = $bill->vender_id;
            $debit->date        = $request->input('date');
            $debit->amount      = $amount;
            $debit->description = $request->input('description');
            $debit->save();

            return redirect()->back()->with('success', __('Debit Note successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function getbill(Request $request)
    {
        $bill = Bill::where('id', $request->bill_id)->first();
        echo json_encode($bill->getDue());
    }
}
