<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServiceStockChange extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'quantity',
        'description',
        'product_id',
        'invoice_id',
        'bill_id'
    ];

    protected $cast = [
        'date' => 'datetime'
    ];
}
