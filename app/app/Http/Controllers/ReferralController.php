<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\ReferralPoint;
use App\Models\ReferralPointHistory;
use App\Models\ReferralWithdrawRequest;
use App\Models\User;
use App\Traits\CanProcessNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReferralController extends Controller
{
    use CanProcessNumber;

    public function index() {

    }

    public function redeem(){
        if(Auth::user()->type == 'company'){
            $point  = ReferralPoint::where('created_by', '=', Auth::user()->id)->first()->point;
            $plans  = Plan::get();

            return view('referral.redeem', compact('point', 'plans'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function RedeemPlan($code){
        if(Auth::user()->type == 'company'){
            $planID = Crypt::decrypt($code);
            $plan   = Plan::find($planID);
            $point  = ReferralPoint::where('created_by', '=', Auth::user()->id)->first()->point;    
            
            return view('referral.checkout.plan', compact('plan', 'point'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function CheckoutPlan($code, Request $request){
        if(Auth::user()->type == 'company'){
            $user       = User::find(Auth::user()->id);
            $duration   = $request->input('durations');
            $now        = now();
            $date       = $now->format('Ymd');
            $time       = $now->format('His');
            $orderID    = "/INV/{$date}/RFR/{$time}{$user->id}";
            $plan       = Plan::find(Crypt::decrypt($request->input('plan')));

            if(!$plan) {
                return redirect()->back()->with('error', __('Plan deleted'));
            }

            $orderID = strtoupper($orderID);

            $price = $plan->price * $duration;

            $point = ReferralPoint::where('created_by', '=', $user->id)->first();
            if($point->point < $price){
                return redirect()->back()->with('error', __('Insufficient points'));
            }

            $point->Deduct($price);

            $history = new ReferralPointHistory();
            $history->description   = __('Plan purchase');
            $history->amount        = -$price;
            $history->ref_id        = $point->id;
            $history->created_by    = $user->id;
            $history->save();

            $order = new Order();
            $order->order_id        = $orderID;
            $order->name            = $user->name;
            $order->plan_name       = $plan->name;
            $order->plan_id         = $plan->id;
            $order->price           = $price;
            $order->price_currency  = 'Rp';
            $order->payment_status  = 'succeeded';
            $order->receipt         = 'point exchange';
            $order->duration        = $duration;
            $order->user_id         = $user->id;
            $order->save();

            $assignPlan            = $user->assignPlan($plan->id, $duration);
            if($assignPlan['is_success']){
                return redirect()->route('dashboard')->with('success', __('Plan successfully activated.'));
            } else {
                return redirect()->route('dashboard')->with('error', __($assignPlan['error']));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function RequestWithdraw(Request $request) {
        if(Auth::user()->type == 'company'){
            $request->validate([
                'amount'    => 'required',
                'account'   => 'required',
                'bank_name' => 'required'
            ]);
            
            $amount = $this->ReadableNumberToFloat($request->input('amount'));
            $dest   = $request->input('account');
            $bnkName= $request->input('bank_name');
            $user   = Auth::user();

            $point = ReferralPoint::where('created_by', '=', $user->id)->first();

            if($amount < config('referral.minWithdrawal') || $amount > $point->point) {
                return redirect()->back()->with('error', __('Insufficient balance'));
            }

            $withRequest = new ReferralWithdrawRequest();
            $withRequest->amount        = $amount;
            $withRequest->destination   = $dest;
            $withRequest->bank_name     = $bnkName;
            $withRequest->created_by    = $user->id;
            $withRequest->status        = "pending";
            $withRequest->save();

            $point->Deduct($amount);

            $history                = new ReferralPointHistory();
            $history->description   = __('Withdrawal');
            $history->ref_id        = $point->id;
            $history->amount        = -$amount;
            $history->created_by    = $user->id;
            $history->save();

            return redirect()->back()->with('success', __('Request submitted'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function CancelWithdrawRequest($id) {
        if(Auth::user()->type === 'company'){
            $user       = Auth::user();
            $request    = ReferralWithdrawRequest::find($id);

            if(!$request) {
                return redirect()->back()->with('error', __('Request not found'));
            }

            if($request->created_by != $user->id) {
                return redirect()->back()->with('error', __('Something went wrong'));
            }

            if($request->status != 'pending') {
                return redirect()->back()->with('error', __('Your request is being processed'));
            }

            $point      = ReferralPoint::where('created_by', '=', $user->id)->first();

            $request->delete();

            $history                = new ReferralPointHistory();
            $history->description   = 'Cancel withdrawal';
            $history->ref_id        = $point->id;
            $history->amount        = $request->amount;
            $history->created_by    = $user->id;
            $history->save();

            $point->Add($request->amount);

            return redirect()->back()->with('success', __('Request cancelled'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function WithdrawRequest(Request $request) {
        if(Auth::user()->type == 'super admin'){
            if($request->has('status')) {
                $status = $request->input('status');
            } else {
                $status = 'pending';
            }
            $statusOptions = array_map('ucfirst', ReferralWithdrawRequest::$status);
            $statusOptions = array_combine($statusOptions, $statusOptions);

            $req = ReferralWithdrawRequest::where('status', '=', $status)->get();

            return view('referral.withdraw', compact('req', 'statusOptions'));
        } else {
            return redirect()->back();
        }
    }

    public function ProcessWithdrawRequest($id, Request $request) {
        if(Auth::user()->type == 'super admin') {
            if($request->has('status')) {
                $status = $request->input('status');
                $withRequest = ReferralWithdrawRequest::find($id);
                $withRequest->status = $status;
                $withRequest->save();   
            }
            return redirect()->back()->with('success', __('Successfully updated.'));
        } else {
            return redirect()->back();
        }
    }

    public function history(Request $request) {
        if(Auth::user()->type == 'super admin'){
            $query = ReferralPointHistory::select('*');

            if(!empty($request->input('date'))){
                $date_range = explode(' - ', $request->date);
                $query->whereBetween('created_at', $date_range);
            }

            if(!empty($request->input('email'))) {
                $user   = User::where('email', '=', $request->input('email'))->first();
                if($user) {
                    $creatorId = $user->creatorId();
                } else {
                    $creatorId = 0;
                }
                $point  = ReferralPoint::where('created_by', $creatorId)->first();
                if($point) {
                    $pointId = $point->id;
                } else {
                    $pointId = 0;
                }
                $query->where('ref_id', $pointId);
            } else {
                $query->limit(30);
            }

            $history = $query->get();

            return view('referral.history', compact('history'));

        } else {
            abort(404);
        }
    }
}
