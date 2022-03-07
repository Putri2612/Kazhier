<?php

namespace App\Traits;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Vender;
use Illuminate\Support\Facades\Auth;

trait CanManageIDs{
    public function CustomerNumber() {
        $latest = Customer::where('created_by', '=', Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->customer_id + 1;
    }

    public function InvoiceNumber() {
        $latest = Invoice::where('created_by', '=', Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->invoice_id + 1;
    }

    public function BillNumber() {
        $latest = Bill::where('created_by', '=', Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->bill_id + 1;
    }

    public function VenderNumber() {
        $latest = Vender::where('created_by', '=', Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->vender_id + 1;
    }
}