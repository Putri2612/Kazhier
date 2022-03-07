<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_id',
        'customer_id',
        'issue_date',
        'due_date',
        'ref_number',
        'status',
        'category_id',
        'created_by',
    ];

    public static $statuses = [
        'Draft',
        //0
        'Sent',
        //1
        'Unpaid',
        //2
        'Partialy Paid',
        //3
        'Paid',
        //4
    ];

    protected $casts = [
        'issue_date'    => 'datetime',
        'due_date'      => 'datetime',
    ];


    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }

    public function items()
    {
        return $this->hasMany(InvoiceProduct::class, 'invoice_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(InvoicePayment::class, 'invoice_id', 'id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
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

        return ($this->getTotal() - $due) - $this->invoiceTotalCreditNote();
    }

    public static function change_status($invoice_id, $status)
    {

        $invoice         = Invoice::find($invoice_id);
        $invoice->status = $status;
        $invoice->update();
    }

    public function category()
    {
        return $this->hasOne(ProductServiceCategory::class, 'id', 'category_id');
    }

    public function creditNote()
    {

        return $this->hasMany(CreditNote::class, 'invoice', 'id');
    }

    public function invoiceTotalCreditNote()
    {
        return $this->hasMany(CreditNote::class, 'invoice', 'id')->sum('amount');
    }

    public function lastPayments()
    {
        return $this->hasOne(InvoicePayment::class, 'id', 'invoice_id');
    }
    public function server(){
        return $this->hasOne(User::class, 'id', 'served_by');
    }

}
