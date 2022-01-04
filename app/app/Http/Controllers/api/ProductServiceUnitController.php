<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductServiceUnitController extends Controller
{
    public function get($id) {
        $user = Auth::user();

        $unit = ProductServiceUnit::where('created_by', '=', $user->creatorId())->where('id', '=', $id)->first();

        return response()->json($unit);
    }
}
