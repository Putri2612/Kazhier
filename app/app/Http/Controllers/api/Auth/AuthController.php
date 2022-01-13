<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

            return  $this->FetchSuccessResponse(['token' => $token]);
        } else {
            return $this->FailedResponse('Incorrect email or password');
        }
    }

    public function logout() {
        $user = Auth::user()->token();
        $user->revoke();

        return $this->SuccessWithoutDataResponse('logged out');
    }
}
