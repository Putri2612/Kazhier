<?php

namespace App\Exports;

use App\Traits\DataGetter;
use App\Traits\TimeGetter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeVSExpenseSummaryExport implements FromView
{
    use DataGetter, TimeGetter;
    protected $year, $account, $category, $customer, $vender;

    public function __construct($year = null, $account = null, $category = null, $customer = null, $vender = null)
    {
        $this->year = empty($year) ? date('Y') : $year;
        $this->account = $account;
        $this->category = $category;
        $this->customer = $customer;
        $this->vender = $vender;
    }
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view():View
    {
        $data = $this->GetIncomeVSExpenseSummary($this->year, $this->account, $this->category, $this->customer, $this->vender);
        $data['monthList'] = $this->Months();
        return view('report.export.income_vs_expense_summary', $data);
    }
}
