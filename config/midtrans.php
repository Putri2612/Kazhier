<?php

    return [
        'serverKey'     => env('MIDTRANS_SERVER', null),
        'clientKey'     => env('MIDTRANS_CLIENT', null),
        'isProduction'  => false,
        'isSanitized'   => true,
        'is3ds'         => true,
    ];

?>