<?php

namespace App\Exports;

use App\Models\ProductService;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductServiceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() {
        $products   = ProductService::with(['unit', 'taxes', 'category'])->where('created_by', '=', Auth::user()->creatorId())->get();
        $data       = [];
        $number     = 1;

        foreach ($products as $product){
            array_push($data, [
                'number'            => $number++,
                'SKU'               => $product->sku,
                'name'              => $product->name,
                'sale_price'        => $product->sale_price,
                'purchase_price'    => $product->purchase_price,
                'tax'               => $product->taxes->rate . '%',
                'unit'              => $product->unit->name,
                'type'              => __($product->type),
                'category'          => $product->category->name,
                'quantity'          => $product->quantity
            ]);
        }

        return collect($data);
    }

    public function headings():array{
        return [
            '#', 'SKU', 'Name', 'Sale Price', 
            'Purchase Price', 'Tax', 'Unit', 'Type', 
            'Category', 'Quantity'
        ];
    }
}
