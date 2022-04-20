<?php

namespace App\Http\Controllers;

use App\Models\DefaultValue;
use App\Models\ProductServiceCategory;
use App\Models\Utility;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductServiceCategoryController extends Controller
{
    use ApiResponse;
    private $types = ['product-service' => 0, 'income' => 1, 'expense' => 2];
    public function index($type)
    {
        if(Auth::user()->can('manage constant category'))
        {

            if(empty($type) || !array_key_exists($type, $this->types)) {
                abort(404);
            }
            if(!empty($type)) {
                $displayType= ucwords(str_replace('-',' & ',$type));

                return view("category.index", compact('type', 'displayType'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function get(Request $request, $type) {
        if(!Auth::user()->can('manage constant category')) {
            return $this->UnauthorizedResponse();
        }

        if(empty($type) || !array_key_exists($type, $this->types)) {
            return $this->NotFoundResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }
        $type = $this->types[$type];

        $totalData = ProductServiceCategory::where('created_by', Auth::user()->creatorId())
                    ->where('type', $type)
                    ->count();
        $page = 1;
        $limit = 10;

        if(!empty($request->input('page'))) {
            $page = intval($request->input('page'));
        }

        if(!empty($request->input('limit'))) {
            $limit = intval($request->input('limit'));
        }
        $totalPage  = ceil($totalData / $limit);
        $skip       = ($page - 1) * $limit;

        if($page > $totalPage) {
            return $this->NotFoundResponse();
        }

        $categories = ProductServiceCategory::select('name', 'id')
                    ->where('created_by', Auth::user()->creatorId())
                    ->where('type', $type)
                    ->get();

        if($categories->isEmpty()) {
            return $this->NotFoundResponse();
        }

        $settings = Utility::settings();
        $dateFormat = [
            'short' => [
                'year'  => 'numeric',
                'month' => 'short',
                'day'   => 'numeric'
            ],
            'long' => [
                'year'  => 'numeric',
                'month' => 'long',
                'day'   => 'numeric',
            ], 
            'numeric' => [
                'year'  => 'numeric',
                'month' => 'numeric',
                'day'   => 'numeric'
            ]
        ];
        if(in_array($settings['site_date_format'], array_keys($dateFormat))) {
            $format = $dateFormat[$settings['site_date_format']];
        } else {
            $format = $dateFormat['short'];
        }

        return $this->FetchSuccessResponse([
            'data'      => $categories,
            'pages'     => $totalPage,
            'currency'  => $settings['site_currency'],
            'date'      => $format,
        ]);
    }


    public function create($type)
    {
        if(Auth::user()->can('create constant category'))
        {
            if(empty($type) || !array_key_exists($type, $this->types)) {
                return response()->json(['error' => __('Not found.')], 404);
            }
            $categories = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', $this->types[$type])->get()->pluck('name');
            $defaultCat = DefaultValue::where('type', '=', str_replace('-', ' ', $type))->whereNotIn('name', $categories)->get();

            foreach($defaultCat as $def) {
                $suggestions[] = ['value' => $def->name, 'attributes' => ['color' => "{$def->color}"]];
            }

            return view('category.create', compact('type', 'suggestions'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request, $type)
    {
        if(Auth::user()->can('create constant category'))
        {
            if(empty($type) || !array_key_exists($type, $this->types)) {
                abort(404);
            }
            $validator = Validator::make(
                $request->all(), 
                [
                    'name' => 'required|max:20',
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
            $category->type       = $this->types[$type];
            $category->created_by = Auth::user()->creatorId();
            $category->save();

            return redirect()->route('category.index', $type)->with('success', __('Category successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit($type, $id)
    {

        if(Auth::user()->can('edit constant category'))
        {
            if(empty($type) || !array_key_exists($type, $this->types)) {
                return response()->json(['error' => __('Not found.')], 404);
            }
            $category = ProductServiceCategory::find($id);

            return view('category.edit', compact('category', 'type'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, $type, $id)
    {
        if(Auth::user()->can('edit constant category'))
        {
            if(empty($type) || !array_key_exists($type, $this->types)) {
                abort(404);
            }
            $category = ProductServiceCategory::find($id);
            if($category->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), 
                    [
                        'name' => 'required|max:20',
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
                $category->type  = $this->types[$type];
                $category->save();

                return redirect()->route('category.index', $type)->with('success', __('Category successfully updated.'));
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

    public function destroy($type, $id)
    {
        if(Auth::user()->can('delete constant category'))
        {
            if(empty($type) || !array_key_exists($type, $this->types)) {
                abort(404);
            }
            $category = ProductServiceCategory::find($id);
            if($category->created_by == Auth::user()->creatorId())
            {
                $category->delete();

                return redirect()->route('category.index', $type)->with('success', __('Category successfully deleted.'));
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
