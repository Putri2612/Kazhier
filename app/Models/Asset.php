<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'name',
        'purchase_date',
        'supported_date',
        'type',
        'amount',
        'description',
        'created_by',
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
        'supported_date' => 'datetime',
    ];

}
