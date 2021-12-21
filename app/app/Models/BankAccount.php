<?php

namespace App\Models;

use App\Traits\CanManageBalance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use CanManageBalance, SoftDeletes;

    protected $fillable = [
        'holder_name',
        'bank_name',
        'account_number',
        'opening_balance',
        'current_balance',
        'contact_number',
        'bank_address',
        'created_by',
        'deleted_at'
    ];

    public function CurrentBalance() {
        return $this->GetCurrentBalance($this);
    }
}

