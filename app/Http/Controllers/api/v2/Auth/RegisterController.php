<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use ApiResponse;

    public function index(Request $request) {
        $validator = $this->validator($request);

        if($validator->fails()) {
            $errors = $validator->errors()->all();

            return $this->FailedResponse($errors);
        }

        if($this->create($request)) {
            return $this->SuccessWithoutDataResponse('User Registered, please verify your email');
        } else {
            return $this->FailedResponse();
        }
    }

    private function validator(Request $request) {
        return Validator::make(
            $request->all(),
            [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users',
                'password'  => 'required|string|min:8|confirmed',
            ]
        );
    }

    private function applyReferral(Request $request) {
        $ref_id = null;

        if(!empty($request->input('referral'))) {
            $code = $request->input('referral');
            $user = User::where('referral_token', $code)->first();
            if(!empty($user)) {
                $ref_id = $user->id;
            }
        }

        return $ref_id;
    }

    private function create(Request $request) {
        $ref_id = $this->applyReferral($request);

        $user = User::create(
            [
                'name'          => $request->input('name'),
                'email'         => $request->input('email'),
                'password'      => Hash::make($request->input('password')),
                'type'          => 'company',
                'lang'          => 'id',
                'created_by'    => 1,
                'plan'          => 1,
                'referred_by'   => $ref_id
            ]
        );

        $user->notify(new VerifyEmail);

        $role = Role::findByName('company');

        return $user->assignRole($role);
    }
}
