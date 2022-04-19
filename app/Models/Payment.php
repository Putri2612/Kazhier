<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'date',
        'amount',
        'account_id',
        'vender_id',
        'description',
        'category_id',
        'payment_method',
        'reference',
        'created_by',
        'served_by',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function category()
    {
        return $this->hasOne(ProductServiceCategory::class, 'id', 'category_id');
    }

    public function vender()
    {
        return $this->hasOne(Vender::class, 'id', 'vender_id');
    }

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method');
    }

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'id', 'account_id');
    }

    public function server(){
        return $this->hasOne(User::class, 'id', 'served_by');
    }

}
