<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DebitNote extends Model
{
    protected $fillable = [
        'bill',
        'vendor',
        'amount',
        'date',
    ];
    
    protected $casts = [
        'date' => 'datetime'
    ];

    public function vendor()
    {
        return $this->hasOne(Vender::class, 'id', 'vendor');
    }

    public function getBill() {
        return $this->belongsTo(Bill::class, 'bill');
    }
}
