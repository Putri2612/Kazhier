<?php

namespace App\Http\Controllers;

use App\Models\DefaultValue;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultValueController extends Controller
{
    use CanRedirect;
    public function index() {
        if(Auth::user()->can('manage defaults')){
            $defaults = DefaultValue::select('*')->get()->sortBy('name')->sortBy('type');
            return view('default.index', compact('defaults'));
        } else {
            return $this->RedirectDenied();
        }
    }

    public function create() {
        if(Auth::user()->can('create defaults')) {
            $types = DefaultValue::GetTypes();

            return view('default.create', compact('types'));
        } else {
            return $this->RedirectDenied();
        }
    }

    public function store(Request $request){
        if(Auth::user()->can('create defaults')) {
            $validation = [
                'name'  => 'required|unique:default_values,name',
                'type'  => 'required'
            ];

            $request->validate($validation);
            $Default = $request->all();
            if(DefaultValue::create($Default)){
                return $this->RedirectSuccess('Default Value successfully added.');
            } else {
                return $this->RedirectError();
            }
        } else {
            return $this->RedirectDenied();
        }
    }

    public function edit($default_id) {
        if(Auth::user()->can('edit defaults')) {
            $Default = DefaultValue::find($default_id);
            $types = DefaultValue::GetTypes();

            return view('default.edit', compact('Default', 'types'));
        } else {
            return $this->RedirectDenied();
        }
    }

    public function update(Request $request, $default_id){
        if(Auth::user()->can('edit defaults')) {
            $Default = DefaultValue::find($default_id);
            if(!empty($Default)){
                $validation = [
                    'name'  => 'required|unique:default_values,name',
                    'type'  => 'required'
                ];
    
                $request->validate($validation);

                $data = $request->all();

                if($Default->update($data)) {
                    return $this->RedirectSuccess('Default Value successfully updated.');
                } else {
                    return $this->RedirectError();
                }
            }
        } else {
            return $this->RedirectDenied();
        }
    }

    public function destroy($default_id) {
        if(Auth::user()->can('destroy defaults')) {
            DefaultValue::where('id', '=', $default_id)->delete();
            return $this->RedirectSuccess('Default Value successfully deleted.');
        } else {
            return $this->RedirectDenied();
        }
    }
}
