<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    protected $fillable = [
        'invoice',
        'customer',
        'amount',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'customer');
    }
}
