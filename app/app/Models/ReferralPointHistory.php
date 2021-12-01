<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralPointHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'ref_id',
    ];
}
