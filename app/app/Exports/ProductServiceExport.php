<?php

namespace App\Exports;

use App\Models\ProductService;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductServiceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductService::all();
    }
}
