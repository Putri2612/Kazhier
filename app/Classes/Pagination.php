<?php

namespace App\Classes;

use Illuminate\Http\Request;

class Pagination {

    public static function getTotalPage($query, Request $request) {
        $totalData  = (clone $query)->count();
        $page       = 1;
        $limit      = 10;

        if(!empty($request->input('page'))) {
            $page = intval($request->input('page'));
        }

        if(!empty($request->input('limit'))) {
            $limit = intval($request->input('limit'));
        }
        $totalPage  = ceil($totalData / $limit);
        $skip       = ($page - 1) * $limit;

        if($page > $totalPage) {
            return false;
        }

        return [
            'totalPage' => $totalPage,
            'skip'      => $skip,
            'limit'     => $limit
        ];
    }
}