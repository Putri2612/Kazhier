<?php

namespace App\Http\Controllers;

use App\Models\Liability;
use Illuminate\Http\Request;

class LiabilityController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('manage liabilities'))
        {
            $liabilities = Liability::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('liabilities.index', compact('liabilities'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create liabilities'))
        {
            $types['current liability']     = __('Current Liability');
            $types['liability']             = __('Liability');
            $types['non-current liability'] = __('Non-current Liability');

            $types = collect($types);
            return view('liabilities.create', compact('types'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create liabilities'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'type' => 'required',
                                   'date' => 'required',
                                   'due_date' => 'required',
                                   'amount' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $liabilities                 = new Liability();
            $liabilities->name           = $request->name;
            $liabilities->type           = $request->type;
            $liabilities->date           = $request->date;
            $liabilities->due_date       = $request->due_date;
            $liabilities->amount         = $request->amount;
            $liabilities->description    = $request->description;
            $liabilities->created_by     = \Auth::user()->creatorId();
            $liabilities->save();

            return redirect()->route('account-liabilities.index')->with('success', __('Liabilities successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Liability $liability)
    {
        //
    }


    public function edit($id)
    {

        if(\Auth::user()->can('edit liabilities'))
        {
            $liability = Liability::find($id);
            $types['current liability']     = __('Current Liability');
            $types['liability']             = __('Liability');
            $types['non-current liability'] = __('Non-current Liability');

            $types = collect($types);

            return view('liabilities.edit', compact('liability', 'types'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('edit liabilities'))
        {
            $liability = Liability::find($id);
            if($liability->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                       'date' => 'required',
                                       'due_date' => 'required',
                                       'amount' => 'required',
                                       'type' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $liability->name           = $request->name;
                $liability->type           = $request->type;
                $liability->date           = $request->date;
                $liability->due_date       = $request->due_date;
                $liability->amount         = $request->amount;
                $liability->description    = $request->description;
                $liability->save();

                return redirect()->route('account-liabilities.index')->with('success', __('Liabilities successfully updated.'));
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


    public function destroy($id)
    {
        if(\Auth::user()->can('delete liabilities'))
        {
            $liability = Liability::find($id);
            if($liability->created_by == \Auth::user()->creatorId())
            {
                $liability->delete();

                return redirect()->route('account-liabilities.index')->with('success', __('Liabilities successfully deleted.'));
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
