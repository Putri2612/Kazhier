<?php

namespace App\Traits;

use App\Models\BillPayment;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\Revenue;
use Illuminate\Support\Facades\Auth;

trait TimeGetter {
    public function Months() {
        $month[] = __('January');
        $month[] = __('February');
        $month[] = __('March');
        $month[] = __('April');
        $month[] = __('May');
        $month[] = __('June');
        $month[] = __('July');
        $month[] = __('August');
        $month[] = __('September');
        $month[] = __('October');
        $month[] = __('November');
        $month[] = __('December');

        return $month;
    }

    public function Years() {
        $creatorID = Auth::user()->creatorId();
        $revenue = Revenue::selectRaw('YEAR(date) as year')
                    ->where('created_by', $creatorID)
                    ->pluck('year');
        $payment = Payment::selectRaw('YEAR(date) as year')
                    ->where('created_by', $creatorID)
                    ->pluck('year');
        $invoice = InvoicePayment::selectRaw('YEAR(date) as year')
                    ->where('created_by', $creatorID)
                    ->pluck('year');
        $bill    = BillPayment::selectRaw('YEAR(date) as year')
                    ->where('created_by', $creatorID)
                    ->pluck('year');
        
        $combined = $revenue->merge($invoice)->merge($payment)->merge($bill)
                    ->unique()->sort()->toArray();
        
        return array_combine($combined, $combined);
    }
}