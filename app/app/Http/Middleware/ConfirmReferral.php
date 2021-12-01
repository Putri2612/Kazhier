<?php

namespace App\Http\Middleware;

use App\Models\ReferralPoint;
use App\Models\ReferralPointHistory;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConfirmReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guest()){
            if(Auth::user()->active_time > 15 
                && Auth::user()->referred_by != null 
                && !Auth::user()->referral_redeemed){

                $point = ReferralPoint::where('created_by', '=', Auth::user()->referred_by)->first();

                if($point) { $point->Add(25); }
                else {
                    $point              = new ReferralPoint();
                    $point->point       = 25;
                    $point->created_by  = Auth::user()->referred_by;
                    $point->save();
                }

                $history = new ReferralPointHistory();
                $history->description   = "A user used your referral code";
                $history->amount        = 25;
                $history->ref_id        = $point->id;
                $history->created_by    = Auth::user()->referred_by;
                $history->save();

                DB::table('users')->where('id', '=', Auth::user()->id)->update(['referral_redeemed' => 1]);
            }
        }
        return $next($request);
    }
}
