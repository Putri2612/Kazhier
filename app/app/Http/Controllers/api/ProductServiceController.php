<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductServiceController extends Controller
{
    //
    public function get() {
        $user = Auth::user();

        $products = ProductService::where('created_by', '=', $user->creatorId())->get();
        
        return response()->json($products);
    }
}
