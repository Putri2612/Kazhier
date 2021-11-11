<?php

namespace App\Traits;

use App\Models\BankAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait CanManageBalance{
    public function AddBalance($account_id, $amount, $date){
        $account    = BankAccount::where('id', '=', $account_id)->where('created_by', '=', Auth::user()->creatorId())->first();

        if($account){
            $date       = Carbon::createFromFormat('Y-m-d', $date)->firstOfMonth();
            $balance    = DB::table('balance')
                            ->where('created_by', '=', Auth::user()->creatorId())
                            ->where('date', '=', $date)
                            ->where('account_id', '=', $account_id)
                            ->first();
            if($balance){
                DB::table('balance')
                    ->where('id', '=', $balance->id)
                    ->update(['amount' => $balance->amount + $amount]);
            } else {
                DB::table('balance')->insert([
                    'date'          => $date,
                    'account_id'    => $account_id,
                    'amount'        => $amount,
                    'created_by'    => Auth::user()->creatorId()
                ]);
            }
        }
    }

    public function TransferBalance($from, $to, $amount, $date){
        $this->AddBalance($from, -($amount), $date);
        $this->AddBalance($to, $amount, $date);
    }

    public function GetCurrentBalance(BankAccount $account){
        $now        = Carbon::now()->toDateString();
        $balances   = DB::table('balance')->where('created_by', '=', Auth::user()->creatorId())
                        ->where('account_id', '=', $account->id)
                        ->where('date', '<=', $now)
                        ->get();
        $total      = $account->opening_balance;
        foreach($balances as $balance){
            $total += $balance->amount;
        }

        return $total;
    }

    public function GetBalanceBefore($date, BankAccount $account){
        $balances   = DB::table('balance')->where('created_by', '=', Auth::user()->creatorId())
                        ->where('account_id', '=', $account->id)
                        ->where('date', '<', $date)
                        ->get();
        $total      = $account->opening_balance;
        foreach($balances as $balance){
            $total += $balance->amount;
        }

        return $total;
    }
}