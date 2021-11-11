<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CanProcessNumber{
    public function ReadableNumberToFloat($number){
        $output    = $number;
        if(strpos($output, ',') !== false){
            $output = str_replace('.', '', $output);
            $output = str_replace(',', '.', $output);
        } else {
            $output = str_replace('.', '', $output);
        }
        return $output;
    }

    public function FloatToReadableNumber($number){
        return number_format($number, 2, ',', '.');
    }
}