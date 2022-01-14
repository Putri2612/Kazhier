<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'point',
    ];

    public function History() {
        return $this->hasMany(ReferralPointHistory::class)->get();
    }

    public function Owner() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function Add($amount) {
        $this->point += $amount;
        $this->save();
    }

    public function Deduct($amount) {
        $this->point -= $amount;
        $this->save();
    }
}
