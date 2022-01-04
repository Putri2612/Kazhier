<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxController extends Controller
{
    //
    public function all(){
        $user   = Auth::user();

        $tax    = Tax::where('created_by', '=', $user->creatorId())->get();

        return response()->json($tax);
    }
    
    public function get($id) {
        $user   = Auth::user();

        $tax    = Tax::select('name', 'rate')->where('created_by', '=', $user->creatorId())->where('id', '=', $id)->first();

        return response()->json($tax);
    }
}
