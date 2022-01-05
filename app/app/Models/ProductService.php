<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductService extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'sale_price',
        'purchase_price',
        'tax_id',
        'category_id',
        'unit_id',
        'type',
        'created_by',
        'quantity'
    ];

    public function taxes()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }

    public function unit()
    {
        return $this->hasOne(ProductServiceUnit::class, 'id', 'unit_id');
    }

    public function category()
    {
        return $this->hasOne(ProductServiceCategory::class, 'id', 'category_id');
    }

    public function stock() {
        return "{$this->quantity} {$this->unit->name}";
    }
}
