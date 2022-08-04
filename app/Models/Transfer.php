<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'from_account',
        'to_account',
        'amount',
        'date',
        'payment_method',
        'reference',
        'description',
        'created_by',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function fromBankAccount()
    {
        return $this->hasOne(BankAccount::class, 'id', 'from_account');
    }

    public function toBankAccount()
    {
        return $this->hasOne(BankAccount::class, 'id', 'to_account');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method');
    }
}
