<?php

namespace App\Classes\Helpers;

use PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportDateFormatter {

    public static function format($date) {
        if(gettype($date) == 'string') {
            $time = strtotime($date);
        } else {
            $time = Date::excelToTimestamp($date);
        }
        return date('Y-m-d', $time);
    }

}