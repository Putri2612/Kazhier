<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $exceptions = [
            'purchase', 
            'order.pay', 
            'plans.index', 
            'plan.expired', 
            'logout', 
            'profile', 
            'order.index', 
            'change.language', 
            'update.account', 
            'update.password',
            'referral.redeem',
            'referral.checkout.plan',
            'referral.redeem.plan',
            'referral.withdraw.process',
            'referral.withdraw.request',
            'revenue.export',
            'invoice.export',
            'bill.export',
            'productservice.export',
            'payment.export',
        ];
        if(Auth::check()) {
            if(Auth::user()->type == 'company'){
                if(date('Y-m-d') > Auth::user()->plan_expire_date) {
                    $route = $request->route()->getAction('as');
                    if(Auth::user()->type != 'company' && !Auth::user()->is_active) {
                        auth()->logout();
                    } else if($request->expectsJson()) {
                        if(!in_array($route, $exceptions)){
                            return response()->json(['message' => 'Your plan has expired'], 402);
                        }
                    } else {
                        if(!in_array($route, $exceptions)) {
                            return redirect()->route('plan.expired');
                        }
                    }
                }
            }
        }
        return $next($request);
    }
}
