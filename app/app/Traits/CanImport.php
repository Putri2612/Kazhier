<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\HeadingRowImport;

trait CanImport {
    public function getImportHeadings(Request $request) {
        if(Auth::user()->type == 'company'){
            $validator = Validator::make($request->all(), [
                'file' => 'mimes:xlsx,csv,xls'
            ]);

            if($validator->fails()) {
                return response(__('Incorrect file type'), 400);
            }

            $file = $request->file('file');
            $fileInfo   = $file->getClientOriginalName();
            $fileName   = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension  = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $newName    = $fileName.time().'.'.$extension;

            $path       = $file->storeAs('temp/import', $newName);
            $headings   = (new HeadingRowImport())->toArray($path)[0][0];

            return response()->json(['path' => $path, 'headings' => $headings]);
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}