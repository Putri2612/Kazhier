<?php

namespace App\Http\Controllers;

use App\Models\DefaultValue;
use App\Models\ProductServiceCategory;
use Illuminate\Http\Request;

class ProductServiceCategoryController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('manage constant category'))
        {
            $categories = [
                'product'   => ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 0)->get(),
                'income'    => ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 1)->get(),
                'expense'   => ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get(),
            ];

            return view('productServiceCategory.index', compact('categories'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create constant category'))
        {
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 0)->get()->pluck('name');
            $defaultCat = DefaultValue::where('type', '=', 'product service')->whereNotIn('name', $categories)->get();

            foreach($defaultCat as $def) {
                $products[] = ['value' => $def->name, 'attributes' => ['color' => $def->color]];
            }

            foreach(ProductServiceCategory::$categoryType as $type){
                $types[] = __($type);
            }

            return view('productServiceCategory.create', compact('types', 'products'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function createSuggestions(Request $request) {
        $request->validate(['type' => 'required']);

        $types      = ['product service', 'revenue', 'payment'];
        $typeID     = $request->input('type');
        $type       = $types[$typeID];
        $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', $typeID)->get()->pluck('name');
        $defaultCat = DefaultValue::where('type', '=', $type)->whereNotIn('name', $categories)->get();
        
        $defaults = [];
        foreach($defaultCat as $def) {
            $defaults[] = ['value' => $def->name, 'attributes' => ['color' => $def->color]];
        }

        return response()->json(['error' => false, 'message' => '', 'data' => $defaults]);
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('create constant category'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:20',
                                   'type' => 'required',
                                   'color' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $category             = new ProductServiceCategory();
            $category->name       = $request->name;
            $category->color      = $request->color;
            $category->type       = $request->type;
            $category->created_by = \Auth::user()->creatorId();
            $category->save();

            return redirect()->route('product-category.index')->with('success', __('Category successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit($id)
    {

        if(\Auth::user()->can('edit constant category'))
        {
            $types    = ProductServiceCategory::$categoryType;
            $category = ProductServiceCategory::find($id);

            return view('productServiceCategory.edit', compact('category', 'types'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, $id)
    {
        if(\Auth::user()->can('edit constant category'))
        {
            $category = ProductServiceCategory::find($id);
            if($category->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                       'type' => 'required',
                                       'color' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $category->name  = $request->name;
                $category->color = $request->color;
                $category->type  = $request->type;
                $category->save();

                return redirect()->route('product-category.index')->with('success', __('Category successfully updated.'));
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
        if(\Auth::user()->can('delete constant category'))
        {
            $category = ProductServiceCategory::find($id);
            if($category->created_by == \Auth::user()->creatorId())
            {
                $category->delete();

                return redirect()->route('product-category.index')->with('success', __('Category successfully deleted.'));
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
