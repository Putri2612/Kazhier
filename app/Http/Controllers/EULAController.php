<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use App\Traits\CanUploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EULAController extends Controller
{
    use CanUploadFile;

    public function index() {
        
    }

    public function show() {
        $content = $this->get();
        return view('termOfService.show', compact('content'));
    }

    public function edit() {
        if(Auth::check() && Auth::user()->type == 'super admin') {
            $content = $this->get();
            return view('termOfService.edit', compact('content'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request) {
        if(Auth::check() && Auth::user()->type == 'super admin') {
            $content = json_encode($request->input('tos'));
            $now    = now();
            $name   = $now->format('YmdHis');
            $this->CreateFile('tos', $name, 'json', $content, 'write', false);

            $setEnv = [
                'TOS_URL'          => $name,
                'TOS_UPDATE_DATE'  => $now->format('d M Y H:i:s')
            ];

            Utility::setEnvironmentValue($setEnv);

            return redirect()->back()->with('success', __('Term of Service updated.'));
        } else {
            abort(404);
        }
    }

    public function ajax() {
        return $this->get();
    }

    private function get() {
        $url = config('tos.content');
        $update = config('tos.lastUpdate');

        if($url){
            $content = Storage::exists("tos/{$url}.json") ? Storage::get("tos/{$url}.json") : json_encode(__('NO TERM OF SERVICE FOUND'));
        } else {
            $content = json_encode(__('NO TERM OF SERVICE FOUND'));
        }
        return ['content' => $content, 'date' => $update];
    }
}
