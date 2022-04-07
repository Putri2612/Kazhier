<?php

namespace App\Traits;

trait CanRedirect{
    public function RedirectSuccess($message){
        return redirect()->back()->with('success', __($message));
    }

    public function RedirectError($message = 'Something is wrong.'){
        return redirect()->back()->with('error', __($message));
    }

    public function RedirectDenied(){
        return $this->RedirectError('Permission denied.');
    }

    public function RedirectNotFound() {
        return $this->RedirectError('Not found.');
    }
}
