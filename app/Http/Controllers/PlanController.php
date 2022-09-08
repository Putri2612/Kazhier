<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Utility;
use App\Traits\CanProcessNumber;
use App\Traits\CanUploadFile;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    use CanProcessNumber, CanUploadFile;
    public function index()
    {
        if(\Auth::user()->can('manage plan'))
        {
            $plans = Plan::get();

            return view('plan.index', compact('plans'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create plan'))
        {
            $arrDuration = Plan::$arrDuration;

            return view('plan.create', compact('arrDuration'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create plan'))
        {
            if(empty(env('MIDTRANS_SERVER')) || empty(env('MIDTRANS_CLIENT')))
            {
                return redirect()->back()->with('error', __('Please set midtrans server key & client key for adding new plan.'));
            }
            else
            {

                $validation                  = [];
                $validation['name']          = 'required|unique:plans';
                $validation['price']         = 'required';
                $validation['duration']      = 'required';
                $validation['max_users']     = 'required';
                $validation['max_bank_accounts']   = 'required';
                if($request->image)
                {
                    $validation['image'] = 'required|max:2048';
                }
                $request->validate($validation);
                $post = $request->all();
                $post['price'] = $this->ReadableNumberToFloat($post['price']);

                if($request->hasFile('image'))
                {
                    $post['image'] = $this->UploadFile($request->file('image'), 'plan');
                }

                if(Plan::create($post))
                {
                    return redirect()->back()->with('success', __('Plan Successfully created.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Something is wrong.'));
                }
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }


    public function edit($plan_id)
    {
        if(\Auth::user()->can('edit plan'))
        {
            $arrDuration = Plan::$arrDuration;
            $plan        = Plan::find($plan_id);

            return view('plan.edit', compact('plan', 'arrDuration'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $plan_id)
    {

        if(\Auth::user()->can('edit plan'))
        {
            if(empty(env('MIDTRANS_SERVER')) || empty(env('MIDTRANS_CLIENT')))
            {
                return redirect()->back()->with('error', __('Please set midtrans server key & client key for editing new plan.'));
            }
            else
            {
                $plan = Plan::find($plan_id);
                if(!empty($plan))
                {
                    $validation                  = [];
                    $validation['name']          = 'required|unique:plans,name,' . $plan_id;
                    $validation['price']         = 'required';
                    $validation['duration']      = 'required';
                    $validation['max_users']     = 'required';
                    $validation['max_bank_accounts']   = 'required';

                    $request->validate($validation);

                    $post           = $request->all();
                    $post['price']  = $this->ReadableNumberToFloat($post['price']);

                    if($request->hasFile('image')) {
                        $post['image'] = $this->ReplaceFile($plan->image, $request->file('image'), 'plan');
                    }

                    if($plan->update($post)) {
                        return redirect()->back()->with('success', __('Plan successfully updated.'));
                    } else {
                        return redirect()->back()->with('error', __('Something is wrong.'));
                    }
                }
                else
                {
                    return redirect()->back()->with('error', __('Plan not found.'));
                }
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }
    
    public function destroy($plan_id) 
    {
        if(\Auth::user()->can('delete plan'))
        {          
            Plan::where('id', '=',$plan_id)->delete();
            return redirect()->back()->with('success', __('Plan successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('error'));
        }
    }

    public function userPlan(Request $request)
    {
        $objUser = \Auth::user();
        $planID  = \Illuminate\Support\Facades\Crypt::decrypt($request->code);
        $plan    = Plan::find($planID);
        if($plan)
        {
            if($plan->price <= 0)
            {
                $objUser->assignPlan($plan->id);
                return redirect()->route('plans.index')->with('success', __('Plan successfully activated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Something is wrong.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Plan not found.'));
        }
    }

    public function getPlanAsync()
    {
        $plans = Plan::select('name', 'price', 'max_users', 'max_bank_accounts as max_account', 'duration')->get()->toArray();
        return json_encode($plans);
    }

    public function expired() {
        if(date('Y-m-d') > Auth::user()->plan_expire_date){
            $plans = Plan::get();

            return view('plan.expired', compact('plans'));
        } else {
            return redirect()->route('dashboard');
        }
    }
}
