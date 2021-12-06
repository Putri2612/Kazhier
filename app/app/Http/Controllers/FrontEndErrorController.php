<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CanUploadFile;
use Carbon\Carbon;

class FrontEndErrorController extends Controller
{
    use CanUploadFile;
    public function storeError(Request $request) {
        $today = Carbon::now()->format('Y-m-d');
        $error = $request->input('error') . "\n\n";
        for($i = 0; $i < 90; $i++) {
            $error .= '-';
        }
        $error .= "\n";
        $this->CreateFile('logs', "front-end-{$today}", 'log', $error, 'append', false);
    }
}
