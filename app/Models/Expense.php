<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'category_id','description','amount','date','project_id','user_id','attachment','created_by'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function category(){
        return $this->hasOne(ExpensesCategory::class,'id','category_id');
    }
    public function projects(){
        return $this->hasOne(Projects::class,'id','project');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
