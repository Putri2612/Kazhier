<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Coupon;
use App\Models\UserCoupon;
use Exception;
use Illuminate\Http\Request;
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
    public function index()
    {
        $objUser = \Auth::user();
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
        $user    = \Auth::user();
        $planID  = \Illuminate\Support\Facades\Crypt::decrypt($request->plan);
        $plan    = Plan::find($planID);

        $price   = $plan->price;

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

        if($price > 0.0){
            Config::$serverKey   = env('MIDTRANS_SERVER');
            Config::$isSanitized = true;
            Config::$is3ds       = true;

            $item_list = array(
                'id'       => 'biz'.$planID,
                'price'    => $price,
                'quantity' => 1,
                'name'     => 'kakabiz '. $plan->name . ' plan',
            );
            
            $item_details = array($item_list);

            $transaction_details = array(
                'order_id'     => strtoupper(str_replace('.', '', uniqid('BIZ', true))) . '_' . $planID . '_' . $user->id . (!empty($request->coupon) ? '_' . strtoupper($request->coupon) : ''),
                'gross_amount' => $price,
            );

            $customer_details = array(
                'first_name'  => $user->name,
                'last_name'   => '',
                'email'       => $user->email,
            );

            $transactions = array(
                'transaction_details' => $transaction_details,
                'customer_details'    => $customer_details,
                'item_details'        => $item_details
            );

            $snapToken = Snap::getSnapToken($transactions);
            return view('order.purchase', compact('snapToken'));
        } else {
            $orderID = strtoupper(str_replace('.', '', uniqid('BIZ', true)));

            $order = new Order();
            $order->order_id       = $orderID;
            $order->name           = $user->name;
            $order->plan_name      = $plan->name;
            $order->plan_id        = $plan->id;
            $order->price          = $price;
            $order->payment_status = 'succeeded';
            $order->user_id        = $user->id;
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

            $assignPlan            = $user->assignPlan($plan->id);
            if($assignPlan['is_success']){
                return redirect()->route('plans.index')->with('success', __('Plan successfully activated.'));
            } else {
                return redirect()->route('plans.index')->with('error', __($assignPlan['error']));
            }
        }
    }

    public function handlePaymentNotification(Request $request){
        Config::$serverKey   = env('MIDTRANS_SERVER');
        Config::$isSanitized = true;
        Config::$is3ds       = true;

        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $type        = $notification->payment_type;
        $fraud       = $notification->fraud_status;
        $order_id    = $notification->order_id;
        $price       = $notification->gross_amount;

        // decode data
        $order_id    = explode('_', $order_id);
        $orderID     = $order_id[0];
        $planID      = $order_id[1];
        $plan        = Plan::find($planID);
        $userID      = $order_id[2];
        $user        = User::find($userID);

        if(count($order_id) > 3){
            $coupon  = $order_id[3];
        }

        if ($transaction == 'pending') {
            $order = new Order();
            $order->order_id       = $orderID;
            $order->name           = $user->name;
            $order->plan_name      = $plan->name;
            $order->plan_id        = $plan->id;
            $order->price          = $price;
            $order->payment_status = 'pending';
            $order->user_id        = $user->id;
            $order->save();
        } else {
            $order = Order::where('order_id', '=', $orderID)->get()->first();

            if ($transaction == 'capture') {
                // For credit card transaction, we need to check whether transaction is challenge by FDS or not
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $order->payment_status = 'pending';
                    } else {
                        $order->payment_status = 'success';
                        $assignPlan            = $user->assignPlanFromOutside($user->id, $plan->id);
                    }
                }
            } else if ($transaction == 'settlement') {
                $order->payment_status = 'success';
                $assignPlan            = $user->assignPlanFromOutside($user->id, $plan->id);
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
        }        
    }
}
