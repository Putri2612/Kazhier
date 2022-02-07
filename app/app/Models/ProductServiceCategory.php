<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductServiceCategory extends Model
{
    protected $fillable = [
        'name',
        'color',
        'type',
        'created_by',
    ];

    public static $categoryType = [
        'Product & Service',
        'Income',
        'Expense',
    ];

    public function categories()
    {
        return $this->hasMany(Revenue::class, 'category_id', 'id');
    }

    public function incomeCategoryAmount($year = null)
    {
        if(empty($year)) { $year    = date('Y'); }
        $creatorID = Auth::user()->creatorId();

        $revenue    = $this->hasMany(Revenue::class, 'category_id', 'id')->where('created_by', $creatorID)->whereRAW('YEAR(date) =?', $year)->sum('amount');

        $invoiceIDs = $this->hasMany(Invoice::class, 'category_id', 'id')->where('created_by', $creatorID)->get()->pluck('id');
        $invoices   = InvoicePayment::whereIn('invoice_id', $invoiceIDs)->whereRaw('YEAR(date) = ?', $year)->sum('amount');
        
        $totalIncome = (!empty($revenue) ? $revenue : 0) + (!empty($invoices) ? $invoices : 0);

        return $totalIncome;
    }

    public function expenseCategoryAmount($year = null)
    {
        if(empty($year)) { $year    = date('Y'); }
        $creatorID = Auth::user()->creatorId();

        $payment = $this->hasMany(Payment::class, 'category_id', 'id')->where('created_by', $creatorID)->whereRAW('YEAR(date) =?', $year)->sum('amount');

        $billIDs    = $this->hasMany(Bill::class, 'category_id', 'id')->where('created_by', $creatorID)->get()->pluck('id');
        $bills      = BillPayment::whereIn('bill_id', $billIDs)->whereRaw('YEAR(date) = ?', $year)->sum('amount');

        $totalExpense = (!empty($payment) ? $payment : 0) + (!empty($bills) ? $bills : 0);

        return $totalExpense;
    }
}
