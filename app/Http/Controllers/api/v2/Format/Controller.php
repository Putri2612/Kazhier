<?php

namespace App\Http\Controllers\api\v2\Format;

use App\Http\Controllers\Controller as BaseController;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use ApiResponse;

    private $types = ['date', 'currency'];

    public function get($type) {
        if(!in_array($type, $this->types)) {
            return $this->NotFoundResponse();
        }
        return $this->$type();
    }

    private function date() {
        $settings = Utility::settings();
        $dateFormat = [
            'short' => [
                'year'  => 'numeric',
                'month' => 'short',
                'day'   => 'numeric'
            ],
            'long' => [
                'year'  => 'numeric',
                'month' => 'long',
                'day'   => 'numeric',
            ], 
            'numeric' => [
                'year'  => 'numeric',
                'month' => 'numeric',
                'day'   => 'numeric'
            ]
        ];
        if(in_array($settings['site_date_format'], array_keys($dateFormat))) {
            $format = $dateFormat[$settings['site_date_format']];
        } else {
            $format = $dateFormat['short'];
        }
        return $this->SuccessResponse($format);
    }

    private function currency() {
        $settings = Utility::settings();
        return $this->SuccessResponse($settings['site_currency']);
    }
}
