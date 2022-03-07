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

    public function ConfirmDelete(Request $request) {
        $url    = $request->input('url');

        return view('dialog.confirm-delete', compact('url'));
    }

    public function StatusUpdate(Request $request) {
        $url    = $request->input('url');
        $status = $request->input('status');

        return view('dialog.status-update', compact('url', 'status'));
    }
}
