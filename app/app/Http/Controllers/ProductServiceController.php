<?php

namespace App\Http\Controllers;

use App\Exports\ProductServiceExport;
use App\Models\CustomField;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Tax;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductServiceController extends Controller
{
    use CanProcessNumber, CanRedirect;
    public function index(Request $request)
    {

        if(\Auth::user()->can('manage product & service'))
        {
            $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 0)->get()->pluck('name', 'id');
            if(!empty($request->input('category')))
            {

                $productServices = ProductService::where('created_by', '=', \Auth::user()->creatorId())->where('category_id', $request->input('category'))->get();
            }
            else
            {
                $productServices = ProductService::where('created_by', '=', \Auth::user()->creatorId())->get();
            }

            return view('productservice.index', compact('productServices', 'category'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(\Auth::user()->can('create product & service'))
        {
            $customFields = CustomField::where('module', '=', 'product')->get();
            $category     = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 0)->get()->pluck('name', 'id');
            $unit         = ProductServiceUnit::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $tax          = Tax::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            $category   = $category->union(['new.product-category' => __('Create new category')]);
            $unit       = $unit->union(['new.product-unit' => __('Create new unit')]);
            $tax        = $tax->union(['new.taxes' => __('Create new tax')]);

            return view('productservice.create', compact('category', 'unit', 'tax', 'customFields'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {

        if(\Auth::user()->can('create product & service'))
        {

            $rules = [
                'name'              => 'required',
                'sku'               => 'required',
                'quantity'          => 'required',
                'sale_price'        => 'required',
                'purchase_price'    => 'required',
                'tax_id'            => 'required',
                'category_id'       => 'required',
                'unit_id'           => 'required',
                'type'              => 'required',
            ];

            $validator = \Validator::make($request->all(), $rules);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('productservice.index')->with('error', $messages->first());
            }

            $sale_price     = $this->ReadableNumberToFloat($request->input('sale_price'));
            $purchase_price = $this->ReadableNumberToFloat($request->input('purchase_price'));

            $productService                 = new ProductService();
            $productService->name           = $request->input('name');
            $productService->description    = $request->input('description');
            $productService->sku            = $request->input('sku');
            $productService->sale_price     = $sale_price;
            $productService->purchase_price = $purchase_price;
            $productService->tax_id         = $request->input('tax_id');
            $productService->unit_id        = $request->input('unit_id');
            $productService->type           = $request->input('type');
            $productService->category_id    = $request->input('category_id');
            $productService->quantity       = $request->input('quantity');
            $productService->created_by     = \Auth::user()->creatorId();
            $productService->save();
            CustomField::saveData($productService, $request->input('customField'));

            return redirect()->route('productservice.index')->with('success', __('Product successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit($id)
    {
        $productService = ProductService::find($id);
        if(\Auth::user()->can('edit product & service'))
        {
            if($productService->created_by == \Auth::user()->creatorId())
            {
                $category = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 0)->get()->pluck('name', 'id');
                $unit     = ProductServiceUnit::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                $tax      = Tax::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');

                $productService->customField = CustomField::getData($productService, 'product');
                $customFields                = CustomField::where('module', '=', 'product')->get();

                $category   = $category->union(['new.product-category' => __('Create new category')]);
                $unit       = $unit->union(['new.product-unit' => __('Create new unit')]);
                $tax        = $tax->union(['new.taxes' => __('Create new tax')]);

                return view('productservice.edit', compact('category', 'unit', 'tax', 'productService', 'customFields'));
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


    public function update(Request $request, $id)
    {

        if(\Auth::user()->can('edit product & service'))
        {
            $productService = ProductService::find($id);
            if($productService->created_by == \Auth::user()->creatorId())
            {

                $rules = [
                    'name'              => 'required',
                    'sku'               => 'required',
                    'quantity'          => 'required',
                    'sale_price'        => 'required',
                    'purchase_price'    => 'required',
                    'tax_id'            => 'required',
                    'category_id'       => 'required',
                    'unit_id'           => 'required',
                    'type'              => 'required',
                ];

                $validator = Validator::make($request->all(), $rules);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->route('expenses.index')->with('error', $messages->first());
                }

                $sale_price     = $this->ReadableNumberToFloat($request->input('sale_price'));
                $purchase_price = $this->ReadableNumberToFloat($request->input('purchase_price'));

                $productService->name           = $request->input('name');
                $productService->description    = $request->input('description');
                $productService->sku            = $request->input('sku');
                $productService->sale_price     = $sale_price;
                $productService->purchase_price = $purchase_price;
                $productService->tax_id         = $request->input('tax_id');
                $productService->unit_id        = $request->input('unit_id');
                $productService->type           = $request->input('type');
                $productService->category_id    = $request->input('category_id');
                $productService->quantity       = $request->input('quantity');
                $productService->created_by     = \Auth::user()->creatorId();
                $productService->save();
                CustomField::saveData($productService, $request->input('customField'));

                return redirect()->route('productservice.index')->with('success', __('Product successfully updated.'));
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
        if(\Auth::user()->can('delete product & service'))
        {
            $productService = ProductService::find($id);
            if($productService->created_by == \Auth::user()->creatorId())
            {
                $productService->delete();

                return redirect()->route('productservice.index')->with('success', __('Product successfully deleted.'));
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

    public function export() {
        if(Auth::user()->type == 'company') {
            return Excel::download(new ProductServiceExport, 'Product & Services.xlsx');
        } else {
            return $this->RedirectDenied();
        }
    }

}
