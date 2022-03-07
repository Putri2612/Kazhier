<?php

    return [
        'serverKey'     => env('MIDTRANS_SERVER', null),
        'clientKey'     => env('MIDTRANS_CLIENT', null),
        'isProduction'  => true,
        'isSanitized'   => true,
        'is3ds'         => true,
    ];

?>