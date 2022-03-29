<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'price',
        'duration',
        'max_users',
        // 'max_customers',
        // 'max_venders',
        'max_bank_accounts',
        'description',
        'image',
    ];

    public static $arrDuration = [
        'unlimited' => 'Unlimited',
        'month' => 'Per Month',
        'year' => 'Per Year',
    ];

    public static function total_plan()
    {
        return Plan::count();
    }

    public static function most_purchase_plan()
    {
        $free_plan = Plan::where('price', '<=', 0)->first();
        $free_plan = empty($free_plan) ? 0 : $free_plan->id;

        return User:: select(DB::raw('count(*) as total'))->where('type', '=', 'company')->where('plan', '!=', $free_plan)->groupBy('plan')->first();
    }

    public function new_order(){
        return $this->hasMany(Order::class,'id','order_id');
    }
}
