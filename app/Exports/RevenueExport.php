<?php

namespace App\Exports;

use App\Models\Revenue;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RevenueExport implements FromCollection, WithHeadings
{

    protected $revenueFilter;

    public function setRevenue(Revenue $revenue)
    {
        $this->revenueFilter = $revenue;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        $revenues   = Revenue::with(['bankAccount', 'customer', 'paymentMethod', 'category'])->where('created_by', '=', Auth::user()->creatorId())->orderBy('date', 'asc')->get();
        if($this->revenueFilter !== null){
            $revenues = $this->revenueFilter;
        }
        $data       = [];
        $number     = 1;
        foreach($revenues as $revenue) {
            array_push($data, [
                'number'            => $number++,
                'date'              => $revenue->date,
                'amount'            => $revenue->amount,
                'bank_account'      => $revenue->bankAccount ? $revenue->bankAccount->bank_name . '-' . $revenue->bankAccount->holder_name : '-',
                'customer_name'     => $revenue->customer ? $revenue->customer->name : '-',
                'payment_method'    => $revenue->paymentMethod->name,
                'category'          => $revenue->category->name,
                'description'       => $revenue->description,
                'served_by'         => $revenue->served_by
            ]);
        }

        return collect($data);
    }

    public function headings():array{
        return [
            '#', 'Date', 'Amount', 'Bank Account', 'Customer Name', 'Payment Method', 'Category', 'Description', 'Server'
        ];
    }
}
