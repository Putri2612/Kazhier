<?php

namespace App\Http\Controllers;

use App\Models\Equity;
use Illuminate\Http\Request;

class EquityController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('manage equities'))
        {
            $equities = Equity::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('equities.index', compact('equities'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create equities'))
        {
            return view('equities.create');
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create equities'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'amount' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $equities                 = new Equity();
            $equities->name           = $request->name;
            $equities->amount         = $request->amount;
            $equities->description    = $request->description;
            $equities->created_by     = \Auth::user()->creatorId();
            $equities->save();

            return redirect()->route('account-equities.index')->with('success', __('Equities successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Equity $equity)
    {
        //
    }


    public function edit($id)
    {

        if(\Auth::user()->can('edit equities'))
        {
            $equity = Equity::find($id);
            
            return view('equities.edit', compact('equity'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('edit equities'))
        {
            $equity = Equity::find($id);
            if($equity->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                       'amount' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $equity->name           = $request->name;
                $equity->amount         = $request->amount;
                $equity->description    = $request->description;
                $equity->save();

                return redirect()->route('account-equities.index')->with('success', __('Equitys successfully updated.'));
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
        if(\Auth::user()->can('delete equities'))
        {
            $equity = Equity::find($id);
            if($equity->created_by == \Auth::user()->creatorId())
            {
                $equity->delete();

                return redirect()->route('account-equities.index')->with('success', __('Equitys successfully deleted.'));
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
