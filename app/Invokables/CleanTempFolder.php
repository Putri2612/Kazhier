<?php

namespace App\Invokables;

use Illuminate\Support\Facades\Storage;

class CleanTempFolder {
    public function __invoke() {
        if(Storage::exists('temp/import')) {
            $files = Storage::allFiles('temp/import');
            if(count($files)) {
                foreach($files as $file) {
                    Storage::delete($file);
                }
            }
        }
    }
}