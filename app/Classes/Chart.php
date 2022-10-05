<?php

namespace App\Classes;

use App\Models\Bill;
use App\Models\BillPayment;
use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\Payment;
use App\Models\ProductServiceCategory;
use App\Models\Revenue;
use App\Models\User;
use App\Traits\TimeGetter;
use Carbon\Carbon;

class Chart
{
    use TimeGetter;

    private static function InitExpenseChart()
    {
        $Expenses['label']              = __('Expense');
        $Expenses['borderColor']        = '#ff5909';
        $Expenses['backgroundColor']    = '#ff590933';
        $Expenses['fill']               = true;

        return $Expenses;
    }

    private static function InitIncomeChart()
    {
        $Incomes['label']           = __('Income');
        $Incomes['borderColor']     = '#0087f8';
        $Incomes['backgroundColor'] = '#0087f833';
        $Incomes['fill']            = true;

        return $Incomes;
    }

    public static function IncomeAndExpense(User $user, $year = null)
    {
        if (empty($year)) {
            $year = date('Y');
        }

        $data['months'] = $months = (new self)->Months();

        $Incomes    = self::InitIncomeChart();
        $Expenses   = self::InitExpenseChart();

        foreach ($months as $month => $name) {
            $month++;

            $Revenue    = Revenue::selectRaw('sum(amount) as amount')
                ->where('created_by', $user->creatorId())
                ->whereRaw('year(`date`) = ?', $year)
                ->whereRaw('month(`date`) = ?', $month)
                ->first()->amount;

            $InvoiceIDs = Invoice::select('id')->where('created_by', $user->creatorId())->pluck('id');
            $Invoice    = InvoicePayment::whereIn('invoice_id', $InvoiceIDs)
                ->whereRaw('year(`date`) = ?', $year)
                ->whereRaw('month(`date`) = ?', $month)
                ->sum('amount');

            $Incomes['data'][] = (!empty($Revenue) ? $Revenue : 0) + (!empty($Invoice) ? $Invoice : 0);

            $Payment    = Payment::selectRaw('sum(amount) as amount')
                ->where('created_by', $user->creatorId())
                ->whereRaw('year(`date`) = ?', $year)
                ->whereRaw('month(`date`) = ?', $month)
                ->first()->amount;

            $BillIDs    = Bill::select('id')->where('created_by', $user->creatorId())->pluck('id');
            $Bill       = BillPayment::whereIn('bill_id', $BillIDs)
                ->whereRaw('year(`date`) = ?', $year)
                ->whereRaw('month(`date`) = ?', $month)
                ->sum('amount');

            $Expenses['data'][] = (!empty($Payment) ? $Payment : 0) + (!empty($Bill) ? $Bill : 0);
        }

        $data['data'] = [$Expenses, $Incomes];

        return $data;
    }

    public static function Cashflow(User $user, $month = null, $year = null)
    {
        if (empty($month)) {
            $month    = date('m');
        }
        if (empty($year)) {
            $year     = date('Y');
        }

        $days = Carbon::createFromFormat('d-n-Y', "01-{$month}-{$year}")
            ->endOfMonth()->format('d');
        $dates      = [];
        $formats    = [];
        $data       = [];

        $Incomes    = self::InitIncomeChart();
        $Expenses   = self::InitExpenseChart();

        for ($day = 1; $day <= $days; $day++) {
            $time       = mktime(0, 0, 0, $month, $day, $year);
            $dates[]    = date('Y-m-d', $time);
            $formats[]  = date('d-M', $time);
        }

        $data['dates'] = $formats;

        foreach ($dates as $date) {
            $Revenue    = Revenue::selectRaw('sum(amount) as amount')
                ->where('created_by', $user->creatorId())
                ->where('date', $date)
                ->value('amount');

            $invoiceIDs = Invoice::select('id')
                ->where('created_by', $user->creatorId())
                ->pluck('id');

            $Invoice = InvoicePayment::selectRaw('sum(amount) as amount')
                ->whereIn('invoice_id', $invoiceIDs)
                ->where('date', $date)
                ->value('amount');

            $Incomes['data'][] = (!empty($Revenue) ? $Revenue : 0) + (!empty($Invoice) ? $Invoice : 0);

            $Payment    = Payment::selectRaw('sum(amount) as amount')
                ->where('created_by', $user->creatorId())
                ->where('date', $date)
                ->value('amount');

            $BillIDs    = Bill::select('id')
                ->where('created_by', $user->creatorId())
                ->pluck('id');

            $Bill       = BillPayment::selectRaw('sum(amount) as amount')
                ->whereIn('bill_id', $BillIDs)
                ->where('date', $date)
                ->value('amount');

            $Expenses['data'][] = (!empty($Payment) ? $Payment : 0) + (!empty($Bill) ? $Bill : 0);
        }

        $data['data'] = [$Expenses, $Incomes];

        return $data;
    }

    public static function Category(User $user, $month = null, $year = null, $type = 'income')
    {
        $types = ['income' => 1, 'expense' => 2];
        $category   = ProductServiceCategory::where('created_by', '=', $user->creatorId())
            ->where('type', '=', $types[$type])->get();

        $colors     = [];
        $amounts    = [];
        $categories = [];
        foreach ($category as $cat) {
            $colors[]       = '#' . $cat->color;
            $categories[]   = $cat->name;
            if ($type == 'income') {
                $amounts[]      = $cat->incomeCategoryAmount($month, $year);
            } else if ($type == 'expense') {
                $amounts[]      = $cat->expenseCategoryAmount($month, $year);
            }
        }
        return ['colors' => $colors, 'categories' => $categories, 'amounts' => $amounts];
    }
}