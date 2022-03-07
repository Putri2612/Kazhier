<?php

namespace App\Exports;

use App\Traits\DataGetter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExpenseSummaryExport implements FromView
{
    use DataGetter;
    protected $year, $account, $category, $vender;
    public function __construct($year = null, $account = null, $category = null, $vender = null)
    {
        $this->year     = $year ? $year : date('Y');
        $this->account  = $account;
        $this->category = $category;
        $this->vender   = $vender;
    }
    
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view():View{
        $data               = $this->GetExpenseSummary($this->year, $this->account, $this->category, $this->vender);
        $data['monthList']  = $this->yearMonth();
        return view('report.export.expense_summary', $data);
    }

    public function yearMonth()
    {
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
}
