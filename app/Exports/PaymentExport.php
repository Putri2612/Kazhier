<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        $payments   = Payment::with(['bankAccount', 'vender', 'paymentMethod', 'category'])->where('created_by', '=', Auth::user()->creatorId())->orderBy('date', 'asc')->get();
        $data       = [];
        $number     = 1;
        foreach($payments as $payment) {
            array_push($data, [
                'number'            => $number++,
                'date'              => $payment->date,
                'amount'            => $payment->amount,
                'bank_account'      => $payment->bankAccount ? $payment->bankAccount->bank_name . '-' . $payment->bankAccount->holder_name : '-',
                'vender_name'       => $payment->vender ? $payment->vender->name : '-',
                'payment_method'    => $payment->paymentMethod->name,
                'category'          => $payment->category->name,
                'description'       => $payment->description,
                'served_by'         => $payment->served_by,
            ]);
        }

        return collect($data);
    }

    public function headings():array{
        return [
            '#', 'Date', 'Amount', 'Bank Account', 'Vendor Name', 'Payment Method', 'Category', 'Description', 'Server'
        ];
    }
}
