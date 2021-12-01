<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserActivity
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
            $now = now();
            if(Auth::user()->last_active == null){

                DB::table('users')
                    ->where('id', '=', Auth::user()->id)
                    ->update(['last_active' => $now]);

            } else if (Auth::user()->last_active->diffInMinutes($now) !== 0) {
                $difference = Auth::user()->last_active->diffInMinutes($now);
                $updateData = ['last_active' => $now];

                if($difference < 5){
                    $updateData['active_time'] = Auth::user()->active_time + $difference;
                }
                DB::table('users')
                    ->where('id', '=', Auth::user()->id)
                    ->update($updateData);
            }
        }
        return $next($request);
    }
}
