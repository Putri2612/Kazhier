<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponse;
    // public function register (Request $request) {
    //     $validator = $request->validate([
    //         'name'      => 'required|string',
    //         'email'     => 'required|string|email|unique:users',
    //         'password'  => 'required|string',
    //     ]);

    //     $data = $request->all();
    //     $data['password'] = Hash::make($data['password']);
    //     $user   = User::create($data);
    //     $token  = $user->createToken('Kzr08787')->accessToken;

    //     return response()->json(['name' => $user->name, 'token' => $token]);
    // }
    // Client ID: 3
    // Client secret: oltjDd1JVk7ZuTKP7yPkuTv8VwSv7oxhV9MToH9X

    public function login (Request $request) {
        $validation = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if($validation->fails()) {
            return $this->FailedResponse('Email or password missing');
        }

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user   = Auth::user();
            $token  = $user->createToken('KazhierPAC')->accessToken;

            $settings = Utility::settings();

            $data = [
                'value'             => 'success',
                'token'             => $token,
                'name'              => $user->name, 
                'id'                => $user->id,
                'user_type'         => $user->type,
                'shop_name'         => empty($settings['company_name']) ? $user->name : $settings['company_name'], 
                'shop_contact'      => empty($settings['company_telephone']) ? null : $settings['company_telephone'],
                'shop_email'        => empty($settings['company_email']) ? $user->email : $settings['company_email'],
                'shop_address'      => empty($settings['company_address']) ? null : $settings['company_address'],
                'currency_symbol'   => empty($settings['site_currency_symbol']) ? 'Rp' : $settings['site_currency_symbol'],
                'shop_status'       => $user->is_active && $user->plan ? 'active' : 'inactive',
                'roles'             => $user->getRoleNames(),
                'permissions'       => $user->getAllPermissions()->pluck('name'),
            ];

            return  $this->FetchSuccessResponse($data);
        } else {
            return $this->FailedResponse('Incorrect email or password');
        }
    }

    public function logout() {
        $user = Auth::user()->token();
        $user->revoke();

        return $this->SuccessWithoutDataResponse('logged out');
    }

    public function RolePermission() {
        $roles          = Auth::user()->getRoleNames();
        $permissions    = Auth::user()->getAllPermissions()->pluck('name');

        $output = [
            'roles'         => $roles,
            'permissions'   => $permissions
        ];

        return $this->SuccessResponse($output);
    }
}
