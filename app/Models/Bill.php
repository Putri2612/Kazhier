<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bill extends Model
{
    protected $fillable = [
        'vender_id',
        'currency',
        'bill_date',
        'due_date',
        'bill_id',
        'order_number',
        'category_id',
        'created_by',
    ];

    protected $casts = [
        'bill_date' => 'datetime',
        'due_date' => 'datetime',
    ];

    public static $statuses = [
        'Draft',
        'Sent',
        'Unpaid',
        'Partialy Paid',
        'Paid',
    ];

    public function getStatus() {
        return static::$statuses[$this->status];
    }

    public static function number($id) {
        $settings = Utility::settings();
        return $settings["bill_prefix"] . sprintf("%05d", $id);
    }

    public function billNumber() {
        return static::number($this->id);
    }

    public function vender()
    {
        return $this->hasOne(Vender::class, 'id', 'vender_id');
    }

    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }

    public function items()
    {
        return $this->hasMany(BillProduct::class, 'bill_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(BillPayment::class, 'bill_id', 'id');
    }

    public function getSubTotal()
    {
        $subTotal = 0;
        foreach($this->items as $product)
        {
            $subTotal += ($product->price * $product->quantity);
        }

        return $subTotal;
    }

    public function getTotalTax()
    {
        $totalTax = 0;
        foreach($this->items as $product)
        {
            $totalTax += ($product->tax / 100) * ($product->price * $product->quantity);
        }

        return $totalTax;
    }

    public function getTotalDiscount()
    {
        $totalDiscount = 0;
        foreach($this->items as $product)
        {
            $totalDiscount += $product->discount;
        }

        return $totalDiscount;
    }

    public function getTotal()
    {
        return ($this->getSubTotal() + $this->getTotalTax()) - $this->getTotalDiscount();
    }

    public function getDue()
    {
        $due = 0;
        foreach($this->payments as $payment)
        {
            $due += $payment->amount;
        }

        return ($this->getTotal() - $due) - ($this->billTotalDebitNote());
    }

    public function category()
    {
        return $this->hasOne(ProductServiceCategory::class, 'id', 'category_id');
    }

    public function debitNote()
    {
        return $this->hasMany(DebitNote::class, 'bill', 'id');
    }

    public function billTotalDebitNote()
    {
        return $this->hasMany(DebitNote::class, 'bill', 'id')->sum('amount');
    }

    public function lastPayments()
    {
        return $this->hasOne(BillPayment::class, 'id', 'bill_id');
    }

    public function server(){
        return $this->hasOne(User::class, 'id', 'served_by');
    }

    public static function weekly() {
        $start  = now()->startOfWeek();
        $end    = (clone $start)->endOfWeek();
        $bills  = Bill::select('id')
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('bill_date', '>=', $start)
                    ->where('bill_date', '<=', $end)
                    ->get();
        return self::processStatistic($bills);
    }

    public static function monthly() {
        $start  = now()->startOfMonth();
        $end    = (clone $start)->endOfMonth();
        $bills  = Bill::select('id')
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('bill_date', '>=', $start)
                    ->where('bill_date', '<=', $end)
                    ->get();
        return self::processStatistic($bills);
    }

    private static function processStatistic($bills) {
        $detail = [
            'billTotal'  => 0,
            'billPaid'   => 0,
            'billDue'    => 0
        ];

        foreach($bills as $bill) {
            $detail['billTotal'] += $bill->getTotal();
            $detail['billPaid']  += ($bill->getTotal() - $bill->getDue());
            $detail['billDue']   += $bill->getDue();
        }

        return $detail;
    }
}
