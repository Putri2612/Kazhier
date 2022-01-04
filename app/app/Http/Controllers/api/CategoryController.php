<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProductServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function get($type) {
        $user = Auth::user();

        $categories = ProductServiceCategory::where('created_by', '=', $user->creatorId())->where('type', '=', $type)->get()->pluck('name', 'id');

        return response()->json($categories);
    }
}
