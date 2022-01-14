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

    public function Point() {
        return $this->belongsTo(ReferralPoint::class, 'ref_id', 'id');
    }

    public function Creator() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
