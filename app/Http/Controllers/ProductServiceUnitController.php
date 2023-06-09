<?php

namespace App\Http\Controllers;

use App\Classes\Pagination;
use App\Models\DefaultValue;
use App\Models\ProductServiceUnit;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductServiceUnitController extends Controller
{
    use ApiResponse;
    public function index()
    {
        if(\Auth::user()->can('manage constant unit'))
        {
            return view('productServiceUnit.index');
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage constant unit')) {
            return $this->UnauthorizedResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query = ProductServiceUnit::where('created_by', Auth::user()->creatorId());
        $page = Pagination::getTotalPage($query, $request);

        if($page === false) {
            return $this->NotFoundResponse();
        }

        $units = $query->select('name', 'id')
                ->skip($page['skip'])->take($page['limit'])
                ->get();

        if(empty($units)) {
            return $this->NotFoundResponse();
        }

        return $this->PaginationSuccess($units, $page['totalPage']);
    }

    public function create()
    {
        if(\Auth::user()->can('create constant unit'))
        {
            $units = ProductServiceUnit::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name');
            $unit = DefaultValue::where('type', '=', 'unit')->whereNotIn('name', $units)->get()->pluck('name');
            return view('productServiceUnit.create', compact('unit'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {
        if(\Auth::user()->can('create constant unit'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:20',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $category             = new ProductServiceUnit();
            $category->name       = $request->name;
            $category->created_by = \Auth::user()->creatorId();
            $category->save();

            return redirect()->route('product-unit.index')->with('success', __('Unit successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit($id)
    {
        if(\Auth::user()->can('edit constant unit'))
        {
            $unit = ProductServiceUnit::find($id);

            return view('productServiceUnit.edit', compact('unit'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('edit constant unit'))
        {
            $unit = ProductServiceUnit::find($id);
            if($unit->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $unit->name = $request->name;
                $unit->save();

                return redirect()->route('product-unit.index')->with('success', __('Unit successfully updated.'));
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
        if(\Auth::user()->can('delete constant unit'))
        {
            $unit = ProductServiceUnit::find($id);
            if($unit->created_by == \Auth::user()->creatorId())
            {
                $unit->delete();

                return redirect()->route('product-unit.index')->with('success', __('Unit successfully deleted.'));
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
