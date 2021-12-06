<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait CanUploadFile{
    public function UploadFile($file, $location){
        $originalName   = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $newName        = md5(Auth::user()->creatorId().uniqid().$originalName);
        $extension      = $file->getClientOriginalExtension();
        $file->storeAs('public/'.$location, $newName.'.'.$extension);

        return $newName.'.'.$extension;
    }

    public function CreateFile($location, $filename, $extension, $data, $method = null, $public = true){
        if($public){
            $path = "public/{$location}/{$filename}.{$extension}";
        } else {
            $path = "{$location}/{$filename}.{$extension}";
        }

        if(Storage::exists($path) && $method == 'append'){
            Storage::append($path, $data);
        } else {
            Storage::put($path, $data);
        }
    }

    public function DeleteFile($fileName, $location){
        if(Storage::exists("public/{$location}/{$fileName}")){
            Storage::delete("public/{$location}/{$fileName}");
        }
    }

    public function ReplaceFile($oldFileName, $newFile, $location){
        $this->DeleteFile($oldFileName, $location);
        return $this->UploadFile($newFile, $location);
    }
}