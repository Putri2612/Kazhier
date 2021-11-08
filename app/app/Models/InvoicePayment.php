<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    protected $fillable = [
        'invoice_id',
        'date',
        'account_id',
        'payment_method',
        'reference',
        'description',
        'created_by',
    ];

    public function invoice(){
        return $this->hasOne('App\Invoice', 'id', 'invoice_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne('App\PaymentMethod', 'id', 'payment_method');
    }

    public function bankAccount()
    {
        return $this->hasOne('App\BankAccount', 'id', 'account_id');
    }
}
