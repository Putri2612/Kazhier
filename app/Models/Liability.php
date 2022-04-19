<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    protected $fillable = [
        'name',
        'date',
        'due_date',
        'type',
        'amount',
        'description',
        'created_by',
    ];

    protected $casts = [
        'date' => 'datetime',
        'due_date' => 'datetime',
    ];

}
