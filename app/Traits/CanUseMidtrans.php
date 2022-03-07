<?php

namespace App\Traits;

use Midtrans\Config;
use Midtrans\Snap;

trait CanUseMidtrans {
    public function configureMidtrans() {
        Config::$serverKey      = config('midtrans.serverKey');
        Config::$isProduction   = config('midtrans.isProduction');
        Config::$isSanitized    = config('midtrans.isSanitized');
        Config::$is3ds          = config('midtrans.is3ds');
    }

    public function getSnapToken($params) {
        $this->configureMidtrans();
        $snapToken = Snap::getSnapToken($params);
        
        return $snapToken;
    }
}