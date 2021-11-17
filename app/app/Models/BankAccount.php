<?php

namespace App\Models;

use App\Traits\CanManageBalance;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use CanManageBalance;

    protected $fillable = [
        'holder_name',
        'bank_name',
        'account_number',
        'opening_balance',
        'current_balance',
        'contact_number',
        'bank_address',
        'created_by',
    ];

    public function CurrentBalance() {
        return $this->GetCurrentBalance($this);
    }
}

