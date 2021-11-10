<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $fillable = [
        'bill_id',
        'date',
        'account_id',
        'payment_method',
        'reference',
        'description',
        'created_by',
    ];

    public function bill(){
        return $this->hasOne(Bill::class, 'id', 'bill_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method');
    }

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'id', 'account_id');
    }
}
