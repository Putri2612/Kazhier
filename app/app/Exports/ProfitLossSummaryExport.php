<?php

namespace App\Exports;

use App\Traits\DataGetter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProfitLossSummaryExport implements FromView
{
    use DataGetter;
    protected $year;
    public function __construct($year)
    {
        $this->year = $year;
    }

    /**
    * @return \Illuminate\Contracts\View\View;
    */
    public function view():View
    {
        $data = $this->GetProfitLoss($this->year);
        return view('report.export.profit_loss_summary', $data);
    }
}
