<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Coupon;
use App\Models\ReferralPoint;
use App\Models\ReferralPointHistory;
use App\Models\UserCoupon;
use App\Traits\CanUseMidtrans;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Transaction;
use Midtrans\ApiRequestor;
use Midtrans\SnapApiRequestor;
use Midtrans\Notification;
use Midtrans\CoreApi;
use Midtrans\Snap;
use Midtrans\Sanitizer;

class MidtransPaymentController extends Controller
{
    use CanUseMidtrans;

    public function index()
    {
        $objUser = Auth::user();
        if($objUser->type == 'super admin')
        {
            $orders = Order::select(
                [
                    'orders.*',
                    'users.name as user_name',
                ]
            )->join('users', 'orders.user_id', '=', 'users.id')->orderBy('orders.created_at', 'DESC')->get();
        }
        else
        {
            $orders = Order::select(
                [
                    'orders.*',
                    'users.name as user_name',
                ]
            )->join('users', 'orders.user_id', '=', 'users.id')->orderBy('orders.created_at', 'DESC')->where('users.id', '=', $objUser->id)->get();
        }

        return view('order.index', compact('orders'));
    }
    
    public function showOrder($code){
        $plan_id = \Illuminate\Support\Facades\Crypt::decrypt($code);
        $plan    = Plan::find($plan_id);
        if($plan){
            return view('order.summary', compact('plan'));
        } else {
            return redirect()->back()->with('error', __('Cannot find the specified plan'));
        }
    }

    public function payPlan(Request $request){
        $duration = $request->input('durations');
        $user    = User::find(Auth::user()->id);
        $planID  = \Illuminate\Support\Facades\Crypt::decrypt($request->input('plan'));
        $plan    = Plan::find($planID);
        
        $price   = $plan->price * $duration;

        if($user->referred_by && !$user->referral_redeemed){
            $discount = $price / 10;
            $discount = $discount > 50000 ? 50000 : $discount;

            $price -= $discount;
        }   

        if(!empty($request->coupon)){
            $coupons = Coupon::where('code', strtoupper($request->coupon))->where('is_active', '1')->first();
            if(!empty($coupons)){
                $used_coupon    = $coupons->used_coupon();
                $discount_value = ($plan->price / 100) * $coupons->discount;
                $price          = $plan->price - $discount_value;

                if($coupons->limit == $used_coupon){
                    return redirect()->back()->with('error', __('This coupon code has expired.'));
                }
            } else {
                return redirect()->back()->with('error', __('This coupon code is invalid or has expired.'));
            }
        }

        $now        = now();
        $date       = $now->format('Ymd');
        $time       = $now->format('His');
        $orderID    = "/INV/{$date}/PYM/{$time}{$user->id}";

        $order = new Order();
        $order->order_id       = $orderID;
        $order->name           = $user->name;
        $order->plan_name      = $plan->name;
        $order->plan_id        = $plan->id;
        $order->price          = $price;
        $order->payment_status = 'pending';
        $order->user_id        = $user->id;
        $order->duration       = $duration;
        $order->save();

        if(!empty($request->coupon)){
            $coupons = Coupon::where('code', strtoupper($request->coupon))->where('is_active', '1')->first();

            $userCoupon         = new UserCoupon();
            $userCoupon->user   = $user->id;
            $userCoupon->coupon = $coupons->id;
            $userCoupon->order  = $orderID;
            $userCoupon->save();

            $usedCoupon = $coupons->used_coupon();
            if($coupons->limit <= $usedCoupon){
                $coupons->is_active = 0;
                $coupons->save();
            } 
        }

        if($price > 0.0){
            $item_details = [
                [
                    'id'       => 'kz'.$planID,
                    'price'    => $price,
                    'quantity' => 1,
                    'name'     => 'Kazhier '. $plan->name . ' plan',
                ]
            ];

            $transaction_details = [
                'order_id'      => $orderID,
                'gross_amount'  => $price,
            ];

            $customer_details = [
                'first_name'  => $user->name,
                'last_name'   => '',
                'email'       => $user->email,
            ];

            $transactions = [
                'transaction_details' => $transaction_details,
                'customer_details'    => $customer_details,
                'item_details'        => $item_details
            ];

            $snapToken = $this->getSnapToken($transactions);
            return view('order.purchase', compact('snapToken'));
        } else {
            $assignPlan             = $user->assignPlan($plan->id);
            $order->payment_status  = 'success';
            $order->receipt         = 'free coupon';
            $order->save();
            if($assignPlan['is_success']){
                return redirect()->route('plans.index')->with('success', __('Plan successfully activated.'));
            } else {
                return redirect()->route('plans.index')->with('error', __($assignPlan['error']));
            }
        }
    }

    public function handlePaymentNotification(Request $request){
        $this->configureMidtrans();

        $notification = new Notification();

        $transactionID = $notification->transaction_id;
        $transaction = $notification->transaction_status;
        $type        = $notification->payment_type;
        $fraud       = $notification->fraud_status;
        $order_id    = $notification->order_id;
        $price       = $notification->gross_amount;
        
        $order  = Order::where('order_id', '=', $order_id)->get()->first();
        $user   = User::find($order->user_id);

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $order->payment_status = 'PENDING';
                } else {
                    $order->payment_status = 'SUCCESS';
                    $assignPlan            = $user->assignPlan($order->plan_id);
                    $user->referral_redeemed = 1;
                    
                }
            }
        } else if ($transaction == 'settlement') {
            $order->payment_status  = 'SUCCESS';
            $order->receipt         = "https://app.midtrans.com/snap/v1/transactions/{$transactionID}/pdf";
            $assignPlan             = $user->assignPlan($order->plan_id, $order->duration);
            if($user->referred_by){
                $referralPoint  = ReferralPoint::where('created_by', '=', $user->referred_by)->first();
                if(!$referralPoint) {
                    $referralPoint = new ReferralPoint();
                    $referralPoint->created_by = $user->referred_by;
                }
                $referralPoint->Add(10000);
                $user->referral_redeemed = 1;

                $history = new ReferralPointHistory();
                $history->description   = __(':name bought a plan', ['name' => $user->name]);
                $history->amount        = 10000;
                $history->ref_id        = $referralPoint->id;
                $history->created_by    = $user->id;
                $history->save();
            }
        } else if ($transaction == 'deny') {
            $order->payment_status = 'DENIED';
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $order->payment_status = 'EXPIRED';
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $order->payment_status = 'CANCELED';
        }

        $order->save();
        $user->save();
    }
}
