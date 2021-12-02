<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\ReferralPoint;
use App\Models\ReferralPointHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReferralController extends Controller
{
    public function index() {

    }

    public function redeem(){
        if(Auth::user()->type == 'company'){
            $point  = ReferralPoint::where('created_by', '=', Auth::user()->id)->first()->point;
            $price  = Plan::find(Auth::user()->plan)->price;
            $plans  = Plan::where('price', '>', $price)->get();
            $expensive  = Plan::get()->sortByDesc('price')->first()->name;

            return view('referral.redeem', compact('point', 'plans', 'expensive'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function RedeemPlan($code){
        if(Auth::user()->type == 'company'){
            $planID = Crypt::decrypt($code);
            $plan   = Plan::find($planID);
            $orderID= Crypt::encrypt('KZ'.bin2hex(random_bytes(8)));
            $point  = ReferralPoint::where('created_by', '=', Auth::user()->id)->first()->point;    
            
            return view('referral.checkout.plan', compact('plan', 'orderID', 'point'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function CheckoutPlan($code, Request $request){
        if(Auth::user()->type == 'company'){
            $user       = Auth::user();
            $orderID    = Crypt::decrypt($code);
            $plan       = Plan::find(Crypt::decrypt($request->input('plan')));

            if(!$plan) {
                return redirect()->back()->with('error', __('Plan deleted'));
            }
            
            if(!(substr($orderID, 0, 2) == 'KZ')){
                return redirect()->back()->with('error', __('Something went wrong.'));
            }

            $orderID = strtoupper($orderID);

            $point = ReferralPoint::where('created_by', '=', $user->id)->first();
            if($point->point < $plan->price/1000){
                return redirect()->back()->with('error', __('Insufficient points'));
            }

            $point->Deduct($plan->price / 1000);

            $history = new ReferralPointHistory();
            $history->description   = 'Plan purchase';
            $history->amount        = -100;
            $history->ref_id        = $point->id;
            $history->created_by    = $user->id;
            $history->save();

            $order = new Order();
            $order->order_id        = $orderID;
            $order->name            = $user->name;
            $order->plan_name       = $plan->name;
            $order->plan_id         = $plan->id;
            $order->price           = $plan->price / 1000;
            $order->price_currency  = "Point";
            $order->payment_status  = 'succeeded';
            $order->receipt         = 'point exchange';
            $order->user_id         = $user->id;
            $order->save();

            $assignPlan            = $user->assignPlan($plan->id);
            if($assignPlan['is_success']){
                return redirect()->route('dashboard')->with('success', __('Plan successfully activated.'));
            } else {
                return redirect()->route('dashboard')->with('error', __($assignPlan['error']));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
