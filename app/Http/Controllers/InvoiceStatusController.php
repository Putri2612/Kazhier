<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceStatusController extends Controller
{
    use CanRedirect;

    public function PickedUp($invoice_id) {
        $invoice = Invoice::where('id', $invoice_id)
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('type', 1)
                    ->first();
        if(empty($invoice)) {
            return $this->RedirectNotFound();
        }

        $invoice->status        = 2;
        $invoice->pickup_time   = now();
        $invoice->save();
        
        return redirect()->back()->with('success', __('Status updated'));
    }

    public function Prepared($invoice_id) {
        $invoice = Invoice::where('id', $invoice_id)
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('type', 2)
                    ->first();
        if(empty($invoice)) {
            return $this->RedirectNotFound();
        }

        $invoice->status        = 2;
        $invoice->save();

        return redirect()->back()->with('success', __('Status updated'));
    }

    public function Delivering($invoice_id) {
        $invoice = Invoice::where('id', $invoice_id)
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('type', 2)
                    ->first();
        if(empty($invoice)) {
            return $this->RedirectNotFound();
        }

        $invoice->status        = 3;
        $invoice->pickup_time   = now();
        $invoice->save();

        return redirect()->back()->with('success', __('Status updated'));
    }

    public function Delivered($invoice_id) {
        $invoice = Invoice::where('id', $invoice_id)
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('type', 2)
                    ->first();

        if(empty($invoice)) {
            return $this->RedirectNotFound();
        }

        $invoice->status        = 4;
        $invoice->delivery_time = now();
        $invoice->save();

        return redirect()->back()->with('success', __('Status updated'));
    }
}
