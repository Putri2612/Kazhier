<?php

namespace App\Exports;

use App\Traits\DataGetter;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeSummaryExport implements FromView
{
    use DataGetter;
    protected $year, $account, $category, $customer;
    public function __construct($year = null, $account = null, $category = null, $customer = null)
    {
        $this->year     = $year ? $year : date('Y');
        $this->account  = $account;
        $this->category = $category;
        $this->customer = $customer;
    }
    
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view(): View{
        $data               = $this->GetIncomeSummary($this->year, $this->account, $this->category, $this->customer);
        $data['monthList']  = $this->yearMonth();
        return view('report.export.income_summary', $data);
    }

    public function yearMonth()
    {
        //        for($m = 1; $m <= 12; $m++)
        //        {
        //            $month[] = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
        //        }
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
