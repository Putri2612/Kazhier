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

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    public function bill() {
        return $this->belongsTo(Bill::class);
    }

    public function product() {
        return $this->belongsTo(ProductService::class, 'product_id');
    }
}
