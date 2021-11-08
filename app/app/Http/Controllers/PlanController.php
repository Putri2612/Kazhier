<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Utility;
use File;
use Illuminate\Http\Request;

class PlanController extends Controller
{
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
                $validation['price']         = 'required|numeric|min:0';
                $validation['duration']      = 'required';
                $validation['max_users']     = 'required|numeric';
                // $validation['max_customers'] = 'required|numeric';
                // $validation['max_venders']   = 'required|numeric';
                $validation['max_bank_accounts']   = 'required|numeric';
                if($request->image)
                {
                    $validation['image'] = 'required|max:2048';
                }
                $request->validate($validation);
                $post = $request->all();

                if($request->hasFile('image'))
                {
                    $filenameWithExt = $request->file('image')->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('image')->getClientOriginalExtension();
                    $fileNameToStore = 'plan_' . time() . '.' . $extension;

                    $dir = storage_path('app/public/plan/');
                    if(!file_exists($dir))
                    {

                        mkdir($dir, 0777, true);
                    }
                    $path          = $request->file('image')->storeAs('public/plan/', $fileNameToStore);
                    $post['image'] = $fileNameToStore;
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
                    $validation['price']         = 'required|numeric|min:0';
                    $validation['duration']      = 'required';
                    $validation['max_users']     = 'required|numeric';
                    // $validation['max_customers'] = 'required|numeric';
                    // $validation['max_venders']   = 'required|numeric';
                    $validation['max_bank_accounts']   = 'required|numeric';

                    $request->validate($validation);

                    $post = $request->all();

                    if($request->hasFile('image'))
                    {
                        $filenameWithExt = $request->file('image')->getClientOriginalName();
                        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension       = $request->file('image')->getClientOriginalExtension();
                        $fileNameToStore = 'plan_' . time() . '.' . $extension;

                        $dir = storage_path('app/public/plan/');
                        if(!file_exists($dir))
                        {
                            mkdir($dir, 0777, true);
                        }
                        $image_path = $dir . '/' . $plan->image;  // Value is not URL but directory file path
                        if(File::exists($image_path))
                        {

                            chmod($image_path, 0755);
                            File::delete($image_path);
                        }
                        $path = $request->file('image')->storeAs('public/plan/', $fileNameToStore);

                        $post['image'] = $fileNameToStore;
                    }

                    if($plan->update($post))
                    {
                        return redirect()->back()->with('success', __('Plan successfully updated.'));
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
        $plans = Plan::get();
        $planArray = array();
        foreach($plans as $plan){
            $planArray[] = array(
                'name' => $plan->name,
                'price' => $plan->price,
                'max_users' => $plan->max_users,
                'max_account' => $plan->max_bank_accounts,
                'duration' => $plan->duration
            );
        }
        echo json_encode($planArray);
    }
}
