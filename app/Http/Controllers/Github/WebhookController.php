<?php

namespace App\Http\Controllers\Github;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class WebhookController extends Controller
{
    public function handle(Request $request) {
        if(!$this->authenticate($request)) {
            return response('Unauthorized', 401);
        }

        $rootPath = base_path();
        $process = new Process(['./update.sh']);
        $process->setWorkingDirectory($rootPath);

        $process->mustRun();

        return response('Pulled');
    }

    protected function authenticate(Request $request) {
        $secret = config('github.secret');

        if(empty($secret)) {
            return false;
        }

        $content        = $request->getContent();
        $signature      = hash_hmac('sha256', $content, $secret);
        $gitSignature   = $request->header('X-HUB-SIGNATURE-256');
        $gitSignature   = str_replace('sha256=', '', $gitSignature);

        return hash_equals($signature, $gitSignature);
    }
}
