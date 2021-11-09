<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait CanProcessNumber{
    public function ReadableNumberToFloat($number){
        if(Auth::user()->currentLanguage() == 'id'){
            $output    = $number;
            if(strpos($output, ',') !== false){
                $output = str_replace('.', '', $output);
                $output = str_replace(',', '.', $output);
            } else {
                $output = str_replace('.', '', $output);
            }
        } else {
            $output = $number;
            $output = str_replace(',', '', $output);
        }
        return $output;
    }
}