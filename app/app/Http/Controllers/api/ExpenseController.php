<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function get() {
        $expense = Bill::select(
            'id AS expense_id',
            'name AS'
        )->where();
    }
}
