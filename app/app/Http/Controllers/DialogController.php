<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DialogController extends Controller
{
    public function EmptyInput(Request $request) {
        $names = str_replace('_', ' ', array_unique($request->input('item')));
        $title = $request->input('title');
        return view('dialog.empty-inputs', compact('names', 'title'));
    }
}
