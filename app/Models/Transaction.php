<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'account',
        'type',
        'amount',
        'description',
        'date',
        'created_by',
        'customer_id',
        'payment_id',
    ];
    public function model(array $row)
    {
        return new Transaction([
            'date' => $row[0],
            'description' => $row[1],
            'type'=> $row[2],
            'amount' => $row[3],
        ]);
    }    

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'id', 'account');
    }


    public static function addTransaction($request)
    {

        $transaction              = new Transaction();
        $transaction->account     = $request->account_id;
        $transaction->user_id     = $request->user_id;
        $transaction->user_type   = $request->user_type;
        $transaction->type        = $request->type;
        $transaction->amount      = $request->amount;
        $transaction->description = $request->description;
        $transaction->date        = $request->date;
        $transaction->created_by  = $request->created_by;
        $transaction->payment_id  = $request->payment_id;
        $transaction->category    = $request->category;
        $transaction->save();
    }

    public static function editTransaction($request)
    {


        $transaction              = Transaction::where('payment_id', $request->payment_id)->where('type', $request->type)->first();
        $transaction->account     = $request->account_id;
        $transaction->amount      = $request->amount;
        $transaction->description = $request->description;
        $transaction->date        = $request->date;
        $transaction->category    = $request->category;
        $transaction->save();
    }

    public static function destroyTransaction($id, $type, $user)
    {

        Transaction::where('payment_id', $id)->where('type', $type)->where('user_type', $user)->delete();
    }

    public function payment()
    {
        return $this->hasOne(InvoicePayment::class, 'id', 'payment_id');
    }
    public function billPayment()
    {
        return $this->hasOne(BillPayment::class, 'id', 'payment_id');
    }
}