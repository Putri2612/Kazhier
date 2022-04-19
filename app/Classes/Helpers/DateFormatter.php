<?php

namespace App\Classes\Helpers;

use App\Models\Utility;
use IntlDateFormatter;

trait DateFormatter {
    public static function DateFormat($date, $type = null) {

        $types = array_keys(Utility::$dateformats);
        if(empty($type)) {
            $settings   = Utility::settings();
            $type       = $settings['site_date_format'];
        } 
        if(!in_array($type, $types)) {
            $type = $types[0];
        }
        $option = Utility::$dateformats[$type];
        $formatter = new IntlDateFormatter(
            config('app.locale'), 
            $option[0],
            $option[1],
            $option[2],
            $option[3],
        );
        
        return $formatter->format($date);
    }

    public static function TimeFormat($time, $type = null) {
        $types = array_keys(Utility::$timeformats);
        if(empty($type)) {
            $settings   = Utility::settings();
            $type       = $settings['site_date_format'];
        } 
        if(!in_array($type, $types)) {
            $type = $types[0];
        }
        $option = Utility::$timeformats[$type];
        $formatter = new IntlDateFormatter(
            config('app.locale'), 
            $option[0],
            $option[1],
            $option[2],
            $option[3],
        );
        
        return $formatter->format($time);
    }
}