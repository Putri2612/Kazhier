<?php

namespace App\Http\Controllers\api\v2\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    use ApiResponse;

    public function index() {
        $user = Auth::user()->token();
        $user->revoke();

        return $this->SuccessWithoutDataResponse('Logged out');
    }
}
