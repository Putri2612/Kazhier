<?php

namespace App\Exports;

use App\Models\Revenue;
use Illuminate\Support\Facades\Auth;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RevenueExport implements FromView
{

    protected $revenueFilter;

    public function setRevenue($revenue)
    {
        $this->revenueFilter = $revenue;
    }

    /**
     * @return \Illuminate\Support\View
     */

    public function view(): View
    {
        // dd($this->revenueFilter);
        return view('export.revenue', [
            'revenues' => $this->revenueFilter->all()
        ]);
    }



    // public function collection()
    // {
    //     $revenues   = Revenue::with(['bankAccount', 'customer', 'paymentMethod', 'category'])->where('created_by', '=', Auth::user()->creatorId())->orderBy('date', 'asc')->get();
    //     if ($this->revenueFilter !== null) {
    //         $revenues = $this->revenueFilter;
    //     }
    //     $data       = [];
    //     $number     = 1;
    //     foreach ($revenues as $revenue) {
    //         array_push($data, [
    //             'number'            => $number++,
    //             'date'              => $revenue->date,
    //             'amount'            => $revenue->amount,
    //             'bank_account'      => $revenue->bankAccount ? $revenue->bankAccount->bank_name . '-' . $revenue->bankAccount->holder_name : '-',
    //             'customer_name'     => $revenue->customer ? $revenue->customer->name : '-',
    //             'payment_method'    => $revenue->paymentMethod->name,
    //             'category'          => $revenue->category->name,
    //             'description'       => $revenue->description,
    //             'served_by'         => $revenue->served_by
    //         ]);
    //     }

    //     return collect($data);
    // }

    // public function headings(): array
    // {
    //     return [
    //         '#', 'Date', 'Amount', 'Bank Account', 'Customer Name', 'Payment Method', 'Category', 'Description', 'Server'
    //     ];
    // }
}
