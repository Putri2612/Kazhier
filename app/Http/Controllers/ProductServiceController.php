<?php

namespace App\Http\Controllers;

use App\Exports\ProductServiceExport;
use App\Imports\ProductServiceImport;
use App\Models\CustomField;
use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Tax;
use App\Models\Utility;
use App\Traits\ApiResponse;
use App\Traits\CanImport;
use App\Traits\CanProcessNumber;
use App\Traits\CanRedirect;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class ProductServiceController extends Controller
{
    use CanProcessNumber, 
        CanRedirect, 
        CanImport, 
        ApiResponse;

    public function index(Request $request)
    {

        if(Auth::user()->can('manage product & service'))
        {
            $creatorId = Auth::user()->creatorId();
            $category = ProductServiceCategory::where('created_by', '=', $creatorId)
                        ->where('type', '=', 0)
                        ->pluck('name', 'id');
            $category->prepend(__('All'), '');

            return view('productservice.index', compact('category'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function get(Request $request) {
        if(!Auth::user()->can('manage product & service')) {
            return $this->NotFoundResponse();
        }

        $validator = Validator::make($request->all(), [
            'page'              => 'nullable|numeric',
            'limit'             => 'nullable|numeric',
            'category'          => 'nullable|numeric',
        ]);

        if($validator->fails()) {
            return $this->FailedResponse();
        }

        $query = ProductService::where('created_by', Auth::user()->creatorId());

        if(!empty($request->input('category'))) {
            $query->where('category', $request->input('category'));
        }

        $totalData = (clone $query)->count();
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

        $products = $query->with(['taxes:id,name', 'category:id,name'])
                    ->select('id', 'description', 'type', 'sale_price', 'purchase_price', 'tax_id', 'category_id', 'sku', 'name')
                    ->skip($skip)->take($limit)
                    ->get();

        if(empty($products)) {
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
            'data'      => $products,
            'pages'     => $totalPage,
            'currency'  => $settings['site_currency'],
            'date'      => $format,
        ]);
    }

    public function create()
    {
        if(Auth::user()->can('create product & service'))
        {
            $creatorId = Auth::user()->creatorId();
            $customFields = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'product')->get();
            $category     = ProductServiceCategory::where('created_by', '=', $creatorId)->where('type', '=', 0)->get()->pluck('name', 'id');
            $unit         = ProductServiceUnit::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
            $tax          = Tax::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');

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

        if(Auth::user()->can('create product & service'))
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
            $productService->created_by     = Auth::user()->creatorId();
            $productService->save();
            CustomField::saveData($productService, $request->input('customField'));

            return redirect()->route('productservice.index')->with('success', __('Product successfully created.'));
        }
        else
        {
            return $this->RedirectDenied();
        }
    }


    public function edit($id)
    {
        $productService = ProductService::find($id);
        $creatorId = Auth::user()->creatorId();
        if(Auth::user()->can('edit product & service'))
        {
            if($productService->created_by == $creatorId)
            {
                $category = ProductServiceCategory::where('created_by', '=', $creatorId)->where('type', '=', 0)->get()->pluck('name', 'id');
                $unit     = ProductServiceUnit::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');
                $tax      = Tax::where('created_by', '=', $creatorId)->get()->pluck('name', 'id');

                $productService->customField = CustomField::getData($productService, 'product');
                $customFields                = CustomField::where('created_by', Auth::user()->creatorId())->where('module', '=', 'product')->get();

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
        
        if(Auth::user()->can('edit product & service'))
        {
            $creatorId = Auth::user()->creatorId();
            $productService = ProductService::find($id);
            if($productService->created_by == $creatorId)
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
                $productService->created_by     = $creatorId;
                $productService->save();
                CustomField::saveData($productService, $request->input('customField'));

                return redirect()->route('productservice.index')->with('success', __('Product successfully updated.'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }


    public function destroy($id)
    {
        if(Auth::user()->can('delete product & service'))
        {
            $productService = ProductService::find($id);
            if($productService->created_by == Auth::user()->creatorId())
            {
                $productService->delete();

                return redirect()->route('productservice.index')->with('success', __('Product successfully deleted.'));
            }
            else
            {
                return $this->RedirectDenied();
            }
        }
        else
        {
            return $this->RedirectDenied();
        }
    }

    public function export() {
        if(Auth::user()->type == 'company') {
            return Excel::download(new ProductServiceExport, 'Product & Services.xlsx');
        } else {
            return $this->RedirectDenied();
        }
    }

    public function import() {
        if(Auth::user()->type == 'company'){
            return view('productservice.import');
        } else {
            return $this->RedirectDenied();
        }
    }

    public function storeImport(Request $request) {
        if(Auth::user()->type == 'company'){
            $validator = Validator::make($request->all(), [
                'name'          => 'required|string|regex:/^[\w\-\s]*/i',
                'sku'           => 'required|string|regex:/^[\w\-\s]*/i',
                'quantity'      => 'string|regex:/^[\w\-\s]*/i',
                'sale_price'    => 'required|string|regex:/^[\w\-\s]*/i',
                'purchase_price'=> 'required|string|regex:/^[\w\-\s]*/i',
                'tax'           => 'string|regex:/^[\w\-\s]*/i',
                'category'      => 'string|regex:/^[\w\-\s]*/i',
                'unit'          => 'required|string|regex:/^[\w\-\s]*/i',
                'type'          => 'string|regex:/^[\w\-\s]*/i',
                'path'          => 'required|string|regex:/^[\w\-\s]*/i'
            ]);

            if($validator->fails()) {
                $message = '';
                foreach($validator->errors()->all() as $error) {
                    $message .= "{$error} \n";
                }
                return response($message, 400);
            }

            $headings = [
                'name'          => $request->input('name'),
                'sku'           => $request->input('sku'),
                'quantity'      => $request->input('quantity'),
                'sale_price'    => $request->input('sale_price'),
                'purchase_price'=> $request->input('purchase_price'),
                'tax'           => $request->input('tax'),
                'category'      => $request->input('category'),
                'unit'          => $request->input('unit'),
                'type'          => $request->input('type'),
            ];

            if(Storage::exists($request->input('path'))) {
                try {
                    Excel::import(new ProductServiceImport($headings, Auth::user()), storage_path('app/').$request->input('path'));
                } catch(NoFileException $noData) {
                    $failed = $noData->getMessage();
                } catch (Exception $e) {
                    $fails = $e->getMessage();
                }
                $output['message'] = __('Import success');
                
                if(!empty($fails)) {
                    $output['fails'] = $fails;
                }
                if(!empty($failed)) {
                    $output['failed'] = $failed;
                }

                Storage::delete($request->input('path'));
                return response()->json($output);
            } else {
                return response(__('File not found', 404));
            }
        } else {
            return $this->RedirectDenied();
        }
    }
}
