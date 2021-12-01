<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\ReferralPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function index() {

    }

    public function redeem(){
        if(Auth::user()->type == 'company'){
            $point = ReferralPoint::where('created_by', '=', Auth::user()->id);
            $plans = Plan::get();

            return view('referral.redeem', compact('point', 'plans'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }
}
