<?php

namespace App\Classes\Reports;

trait Summarize {
    private static function Summarize($input) {
        $categorized    = [];
        foreach($input as $data) {
            $categorized[$data->category->name][$data->month] = $data->amount;
        }

        $Summary    = [];
        $total      = [];
        foreach ($categorized as $category => $amount) {
            $summarized = [
                'category'  => $category,
                'data'      => []
            ];

            for($month = 1; $month <= 12; $month++) {
                $summarized['data'][$month] = array_key_exists($month, $amount) ? $amount[$month] : 0;
                if(!empty($total[$month])){
                    $total[$month]    += array_key_exists($month, $amount) ? $amount[$month] : 0;
                } else {
                    $total[$month]    = array_key_exists($month, $amount) ? $amount[$month] : 0;
                }
            }
            $Summary[] = $summarized;
        }
        return ['summary' => $Summary, 'total' => $total];
    }
}