<?php

return [
    'term_of_service' => [
        'content' => env('TERM_OF_SERVICE_URL'),
        'update' => env('TERM_OF_SERVICE_UPDATE_DATE')
    ],
    'eula' => [
        'content' => env('EULA_URL'),
        'update' => env('EULA_UPDATE_DATE')
    ],
    'policy' => [
        'content' => env('POLICY_URL'),
        'update' => env('POLICY_UPDATE_DATE')
    ],
];