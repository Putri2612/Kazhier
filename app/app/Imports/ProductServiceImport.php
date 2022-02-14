<?php

namespace App\Imports;

use App\Models\ProductService;
use App\Models\ProductServiceCategory;
use App\Models\ProductServiceUnit;
use App\Models\Tax;
use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;

class ProductServiceImport implements ToCollection, WithHeadingRow, WithEvents
{
    use RegistersEventListeners;
    /**
    * @param Collection $collection
    */
    private $headingNames, $user, $row, $processed;
    private static $failMessage = '', $noDataProcessed = false;
    public function __construct($headings, User $user) {
        $this->headingNames = $headings;
        $this->user         = $user;
        $this->row          = 0;
        $this->processed    = 0;
    }

    public function collection(Collection $collections) {
        $headings = $this->headingNames;
        $fails = '';
        foreach($collections as $collection) {
            $this->row++;
            $collection = $collection->toArray();
            $valid = Validator::make($collection, [
                $headings['name']              => 'string|regex:/^[\w\-\s]*/i',
                $headings['sku']               => 'numeric',
                $headings['sale_price']        => 'numeric',
                $headings['purchase_price']    => 'numeric',
            ]);
            if($valid->fails()){
                $failed = $valid->errors()->all();
                foreach($failed as $message) {
                    $fails .= "Error: {$message} on row {$this->row}\n";
                }
                continue;
            } else {
                $this->processed++;
                $taxID = Tax::where('created_by', $this->user->creatorId())->first();
                if(!empty($headings['tax']) && $headings['tax'] != '---') {
                    $validator = Validator::make($collection, [
                        $headings['tax'] => 'numeric'
                    ]);
                    if($validator->fails()){
                        $message = __('Tax rate invalid');
                        $fails  .= "Error: {$message} on row {$this->row}\n";
                    } else {
                        $tax = Tax::firstOrNew(['rate' => $collection[$headings['tax']], 'created_by' => $this->user->creatorId()]);
                        if(!$tax->exists) {
                            $tax->name = $collection[$headings['tax']].'%';
                            $tax->save();
                        }
                        $taxID = $tax;
                    }
                }
                if(!empty($taxID)) {
                    $taxID = $taxID->id;
                } else {
                    $taxID = Tax::create(['name' => 'Bebas pajak', 'rate' => 0, 'created_by' => $this->user->creatorId()])->id;
                }

                $categoryID = ProductServiceCategory::where('created_by', $this->user->creatorId())
                                ->where('type', 0)->first();
                
                if(!empty($headings['category']) && $headings['category'] != '---') {
                    $categoryValidator = Validator::make($collection, [
                        $headings['category'] => 'string|regex:/^[\w\-\s]*/i',
                    ]);
                    if($categoryValidator->fails()){
                        $message = __('Category name invalid');
                        $fails  .= "Error: {$message} on row {$this->row}\n";
                    } else {
                        $category = ProductServiceCategory::firstOrNew(['name' => $collection[$headings['category']], 'type' => 0, 'created_by' => $this->user->creatorId()]);
                        if(!$category->exists) {
                            $category->color = 'acef87';
                            $category->save();
                        }
                        $categoryID = $category;
                    }
                }
                if(!empty($categoryID)) {
                    $categoryID = $categoryID->id;
                } else {
                    $categoryID = ProductServiceCategory::create(['name' => 'Produk', 'color' => 'acef87', 'type' => 0, 'created_by' => $this->user->creatorId()])->id;
                }

                $unitID = ProductServiceUnit::where('created_by', $this->user->creatorId())->first();
                if(!empty($headings['unit']) && $headings['unit'] != '---') {
                    $unitValidator = Validator::make($collection, [
                        $headings['unit'] => 'string|regex:/^[\w\-\s]*/i',
                    ]);
                    if($unitValidator->fails()){
                        $message = __('Unit invalid');
                        $fails  .= "Error: {$message} on row {$this->row}\n";
                    } else {
                        $unit = ProductServiceUnit::firstOrNew(['name' => $collection[$headings['unit']], 'created_by' => $this->user->creatorId()]);
                        if(!$unit->exists) {
                            $unit->save();
                        }
                        $unitID = $unit;
                    }
                }
                if(!empty($unitID)) {
                    $unitID = $unitID->id;
                } else {
                    $unitID = ProductServiceUnit::create(['name' => 'Unit', 'created_by' => $this->user->creatorId()])->id;
                }

                $type   = 'product';
                if(!empty($headings['type']) && $headings['type'] != '---') {
                    $typeValidator = Validator::make($collection, [
                        $headings['type'] => 'string|regex:/^[a-zA-Z\s]*/i',
                    ]);
                    if($typeValidator->fails()) {
                        $message = __('Type invalid');
                        $fails  .= "Error: {$message} on row {$this->row}\n";
                    } else {
                        $type = $collection[$headings['type']];
                    }
                }

                $quantity   = 0;

                if(!empty($headings['quantity']) && $headings['quantity'] != '---') {
                    $quantityValidator = Validator::make($collection, [
                        $headings['quantity'] => 'numeric',
                    ]);
                    if($quantityValidator->fails()) {
                        $message = __('Quantity invalid');
                        $fails  .= "Error: {$message} on row {$this->row}\n";
                    } else {
                        $quantity = $collection[$headings['quantity']];
                        $quantity = empty($quantity) ? 0 : $quantity;
                    }
                }

                $product = new ProductService();
                $product->name              = $collection[$headings['name']];
                $product->sku               = $collection[$headings['sku']];
                $product->sale_price        = $collection[$headings['sale_price']];
                $product->purchase_price    = $collection[$headings['purchase_price']];
                $product->unit_id           = $unitID;
                $product->tax_id            = $taxID;
                $product->category_id       = $categoryID;
                $product->type              = $type;
                $product->quantity          = $quantity;
                $product->created_by        = $this->user->creatorId();
                $product->save();
            }
        }
        if($fails != ''){
            self::$failMessage .= $fails;
        }
        if(!$this->processed) {
            self::$noDataProcessed = true;
        }
    }

    public static function afterImport(AfterImport $event) {
        if(self::$noDataProcessed) {
            throw new NoFileException(__('No data imported!'));
        }
        if(self::$failMessage != '') {
            throw new Exception(self::$failMessage);
        }
    }
}
