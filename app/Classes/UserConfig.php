<?php

namespace App\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserConfig {
    public static function get($name) {
        $config = self::fetch();

        if(!array_key_exists($name, $config)) {
            return null;
        }

        return $config[$name];
    }

    private static function fetch() {
        if(Session::exists('user-config')) {
            return json_decode(Session::get('user-config'));
        }

        if(!Auth::check()) {
            return [];
        }

        $userID = Auth::user()->creatorId();

        if(!Storage::exists("user-config/{$userID}.json")) {
            return [];
        }

        $config = Storage::get("user-config/{$userID}.json");
        Session::put('user-config', $config);

        return json_decode($config);
    }

    public static function set($data = []) {
        if(!Auth::check()) {
            return;
        }

        $config = self::fetch();
        
        $config = array_merge($config, $data);

        $userID = Auth::user()->creatorId();
        Storage::put("user-config/{$userID}.json", json_encode($config));

        Session::forget('user-config');
    }
}