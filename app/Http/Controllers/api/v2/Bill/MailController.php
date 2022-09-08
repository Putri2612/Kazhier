<?php

namespace App\Http\Controllers\api\v2\Bill;

use App\Http\Controllers\Controller;
use App\Mail\BillSend;
use App\Models\Bill;
use App\Models\Vender;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    use ApiResponse;

    public function send($id) {
        if(!Auth::user()->can('send bill')) {
            return $this->UnauthorizedResponse();
        }

        $bill   = Bill::find($id);
        $bill->send_date    = now();
        $bill->status       = 1;
        $bill->save();

        $vender = Vender::select('name', 'email')
                ->find($bill->vender_id);

        if(empty($vender) || empty($vender->email)) {
            return $this->SuccessWithoutDataResponse('Vendor does not have proper email');
        }

        $bill->name = $vender->name;
        $bill->bill = $bill->billNumber();
        $billId     = Crypt::encrypt($bill->id);
        $bill->url  = route('bill.pdf', $billId);

        try {
            Mail::to($vender->email)
                ->send(new BillSend($bill));
        } catch (\Throwable $th) {
            return $this->SuccessWithoutDataResponse('Mail configuration is not properly set');
        }

        return $this->SuccessWithoutDataResponse('Bill successfully sent');
    }
}
