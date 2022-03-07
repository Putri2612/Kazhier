<?php

namespace App\Http\Controllers;

use App\Models\DefaultValue;
use App\Models\Tax;
use App\Traits\CanProcessNumber;
use Auth;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    use CanProcessNumber;

    public function index()
    {
        if(\Auth::user()->can('manage constant tax'))
        {
            $taxes = Tax::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('taxes.index')->with('taxes', $taxes);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create constant tax'))
        {
            $taxes = Tax::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name');
            $defaultTax = DefaultValue::where('type', '=', 'Tax')->whereNotIn('name', $taxes)->get();
            $tax = [];
            foreach($defaultTax as $default) {
                array_push($tax, ['value' => $default->name, 'attributes' => ['rate' => $default->value]]);
            }
            return view('taxes.create', compact('tax'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('create constant tax'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:20',
                                   'rate' => 'required|numeric',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $tax             = new Tax();
            $tax->name       = $request->input('name');
            $tax->rate       = $this->ReadableNumberToFloat($request->input('rate'));
            $tax->created_by = \Auth::user()->creatorId();
            $tax->save();

            return redirect()->route('taxes.index')->with('success', __('Tax rate successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Tax $tax)
    {
        return redirect()->route('taxes.index');
    }


    public function edit(Tax $tax)
    {
        if(\Auth::user()->can('edit constant tax'))
        {
            if($tax->created_by == \Auth::user()->creatorId())
            {
                return view('taxes.edit', compact('tax'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Tax $tax)
    {
        if(\Auth::user()->can('edit constant tax'))
        {
            if($tax->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                       'rate' => 'required|numeric',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $tax->name  = $request->input('name');
                $tax->rate  = $this->ReadableNumberToFloat($request->input('rate'));
                $tax->save();

                return redirect()->route('taxes.index')->with('success', __('Tax rate successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Tax $tax)
    {
        if(\Auth::user()->can('delete constant tax'))
        {
            if($tax->created_by == \Auth::user()->creatorId())
            {
                $tax->delete();

                return redirect()->route('taxes.index')->with('success', __('Tax rate successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
