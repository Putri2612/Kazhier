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
        return $this->hasOne(Customer::class, 'id', 'customer');
    }

    public function getinvoice() {
        return $this->belongsTo(Invoice::class, 'invoice');
    }
}
