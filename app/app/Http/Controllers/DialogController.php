<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DialogController extends Controller
{
    public function EmptyInput(Request $request) {
        $NoID   = str_replace('_id', '', array_unique($request->input('item')));
        $names  = str_replace('_', ' ', $NoID);
        $title  = $request->input('title');
        return view('dialog.empty-inputs', compact('names', 'title'));
    }
}
