<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount',
        'discount_type',
        'max_discount',
        'created_by',
    ];

    public function customers() {
        return $this->hasMany(Customer::class, 'category_id', 'id');
    }

    public static $DiscountType = [
        'Percent', 'Fixed amount'
    ];
}
