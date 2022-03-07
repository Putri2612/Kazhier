<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'color'
    ];

    public static function Get($type) {
        return DefaultValue::where('type', '=', $type)->get()->sortBy('name');
    }

    public static function GetByName($name) {
        return DefaultValue::where('name', '=', $name)->first();
    }

    public static function GetTypes() {
        return DefaultValue::select('type')->pluck('type')->unique()->all();
    }
}
