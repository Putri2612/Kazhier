<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use ApiResponse;
    
    public function index(Request $request) {
        $validation = Validator::make(
            $request->all(),
            [
                'email'     => 'required',
                'password'  => 'required',
            ]
        );

        if($validation->fails()) {
            return $this->FailedResponse('Email or password missing');
        }

        $loginAttempt = Auth::attempt([
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ]);

        if(!$loginAttempt) {
            return $this->FailedResponse('Incorrect email or password');
        }

        $user   = Auth::user();
        $token  = $user->createToken('KazhierPAC')->accessToken;

        $data = [
            'token'         => $token,
            'name'          => $user->name,
            'id'            => $user->id,
            'type'          => $user->type,
            'permissions'   => $user->getAllPermissions()->pluck('name')
        ];

        return $this->FetchSuccessResponse($data);
    }
}
