<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportSampleController extends Controller
{
    private $items = [
        'product' => 'product-import.xlsx',
        'revenue' => 'revenues-import.xlsx',
        'payment' => 'payments-import.xlsx',
    ];

    public function get($name) {
        if(array_key_exists($name, $this->items)) {
            return response()->download(storage_path('app/samples/import/').$this->items[$name]);
        } else {
            abort(404);
        }
    }
}
