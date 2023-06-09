<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\ProductServiceCategory;
use App\Models\Tax;
use App\Models\ProductServiceUnit;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'app/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data, [
                     'name' => [
                         'required',
                         'string',
                         'max:255',
                     ],
                     'email' => [
                         'required',
                         'string',
                         'email',
                         'max:255',
                         'unique:users',
                     ],
                     'password' => [
                         'required',
                         'string',
                         'min:8',
                         'confirmed',
                     ],
                 ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['referral']){
            $code = $data['referral'];
            $user = User::where('referral_token', '=', $code)->first();
            if($user){
                $ref_id = $user->id;
            } else {
                $ref_id = null;
            }
        } else {
            $ref_id = null;
        }

        $user   = User::create(
            [
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
                'type'          => 'company',
                'lang'          => 'id',
                'created_by'    => 1,
                'plan'          => 1,
                'referred_by'   => $ref_id
            ]
        );
        $role_r = Role::findByName('company');

        return $user->assignRole($role_r);
    }

    public function showRegistrationForm($lang = 'id', Request $request)
    {
        App::setLocale($lang);

        if($request->has('ref')){
            $referral = $request->input('ref');
        } else {
            $referral = null;
        }

        

        return view('auth.register', compact('lang', 'referral'));
    }
}