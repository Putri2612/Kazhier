<?php

namespace App\Http\Controllers;

use App\Models\Utility;
use App\Traits\CanRedirect;
use App\Traits\CanUploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserAgreementController extends Controller
{
    use CanUploadFile, CanRedirect;

    private $types = [ 'EULA', 'TERM-OF-SERVICE', 'POLICY'];

    public function show($type = 'EULA') {
        $content = $this->get($type);
        $content['type'] = $type;

        return view('agreement.show', $content);
    }
    public function edit() {
        if(!Auth::user()->type == 'super admin') {
            return $this->RedirectDenied();
        }

        $content = [
            'eula' => $this->get('EULA'),
            'term_of_service' => $this->get('term-of-service'),
            'policy' => $this->get('policy'),
        ];

        return view('user-agreement.edit', $content);
    }

    public function update(Request $request, $type) {
        if(!Auth::user()->type == 'super admin') {
            abort(404);
        }
        $type = strtoupper($type);
        if(!in_array($type, $this->types)) {
            abort(404);
        }
        $type = str_replace('-', '_', strtolower($type));
        
        $content    = json_encode($request->input('editor'));
        $now        = now();
        $name       = $now->format('YmdHis');
        $this->CreateFile("agreement/{$type}", $name, 'json', $content, 'write', false);

        $type = strtoupper($type);
        $setEnv = [
            "{$type}_URL"          => $name,
            "{$type}_UPDATE_DATE"  => $now->format('d M Y H:i:s')
        ];

        Utility::setEnvironmentValue($setEnv);

        return redirect()->back()->with('success', __('Agreement updated.'));
    }

    private function get($type = 'EULA') {
        $type = strtoupper($type);
        if(!in_array($type, $this->types)) {
            abort(404);
        }

        $type = str_replace('-', '_', strtolower($type));

        $url    = config("user-agreement.{$type}.content");
        $update = config("user-agreement.{$type}.update");

        if($url) {
            $content = Storage::exists("agreement/{$type}/{$url}.json") ? Storage::get("agreement/{$type}/{$url}.json") : json_encode(__('NO AGREEMENT FOUND'));
        } else {
            $content = json_encode(__('NO AGREEMENT FOUND'));
        }
        return ['content' => $content, 'date' => $update];
    }
}
