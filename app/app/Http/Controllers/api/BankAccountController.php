<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankAccountController extends Controller
{
    //
    public function get(){
        $user       = Auth::user();

        $accounts   = BankAccount::select('id', 'holder_name', 'bank_name')->where('created_by', '=', $user->creatorId())->get();

        return response()->json($accounts);
    }
}
