<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralWithdrawRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'destination',
        'status',
        'created_by'
    ];

    public static $status = [
        'pending',
        'processed',
        'success'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'created_by')->first();
    }
}
