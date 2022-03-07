<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Models\Plan;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        if(!file_exists(storage_path() . '/installed'))
        {
            header('location:install');
            die;
        }
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {

        if($user->delete_status == 0)
        {
            auth()->logout();
        }

        if($user->is_active == 0)
        {
            auth()->logout();
        }

        if($user->type != 'super admin')
        {
            $paidUser = User::find($user->creatorId());
            // $user = 

            // if(date('Y-m-d') > $user->plan_expire_date){
            //     $user->plan             = 0;
            //     $user->plan_expire_date = null;
            //     $user->save();

            //     $users      = User::where('created_by', '=', Auth::user()->creatorId())->update(['is_active' => 0]);
            //     $accounts   = BankAccount::where('created_by', '=', Auth::user()->creatorId())->update(['deleted_at' => now()]);

            //     if(Auth::user()->type != 'company' && !Auth::user()->is_active) {
            //         auth()->logout();
            //     } else if(Auth::user()->type == 'company') {
                    
            //     }
            // }
            if(date('Y-m-d') > $paidUser->plan_expire_date)
            {
                $paidUser->plan             = 0;
                $paidUser->plan_expire_date = null;
                $paidUser->save();

                $users      = User::where('created_by', '=', $paidUser->creatorId())->update(['is_active' => 0]);
                $accounts   = BankAccount::where('created_by', '=', $paidUser->creatorId())->update(['deleted_at' => now()]);

                if(Auth::user()->type != 'company' && !Auth::user()->is_active) {
                    auth()->logout();
                } else {
                    return redirect()->route('plan.expired')->with('error', 'Your plan expired limit is over, please upgrade your plan');
                }
            }
        }
    }

    public function showCustomerLoginForm($lang = 'id')
    {
        return view('auth.customer_login',compact('lang'));
    }

    public function customerLogin(Request $request)
    {

        $this->validate(
            $request, [
                        'email' => 'required|email',
                        'password' => 'required|min:6',
                    ]
        );

        if(Auth::guard('customer')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ], $request->get('remember')
        ))
        {
            if(Auth::guard('customer')->user()->is_active == 0)
            {
                Auth::guard('customer')->logout();
            }

            return redirect()->route('customer.dashboard');
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function showVenderLoginForm($lang = 'id')
    {
        return view('auth.vender_login',compact('lang'));
    }

    public function venderLogin(Request $request)
    {
        $this->validate(
            $request, [
                        'email' => 'required|email',
                        'password' => 'required|min:6',
                    ]
        );
        if(Auth::guard('vender')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ], $request->get('remember')
        ))
        {
            if(Auth::guard('vender')->user()->is_active == 0)
            {
                Auth::guard('vender')->logout();
            }

            return redirect()->route('vender.dashboard');
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function showLoginForm($lang = 'id')
    {
        App::setLocale($lang);

        return view('auth.login', compact('lang'));
    }

    public function showLinkRequestForm($lang = 'id')
    {
        App::setLocale($lang);
        return view('auth.passwords.email', compact('lang'));
    }

    public function showCustomerLoginLang($lang = 'id')
    {
        App::setLocale($lang);
        return view('auth.customer_login', compact('lang'));
    }
    public function showVenderLoginLang($lang = 'id')
    {
        App::setLocale($lang);
        return view('auth.vender_login', compact('lang'));
    }

}
