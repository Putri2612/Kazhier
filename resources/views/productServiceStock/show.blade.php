<div class="row">
    <div class="col-6 col-md-4">
        <label for="product_name" class="form-label">
            {{ __('Product Name') }}
        </label>
        <input type="text" name="product_name" 
            id="product_name" value="{{ $product->name }}"
            class="form-control-plaintext" readonly/>
    </div>
    <div class="col-6 col-md-4">
        <label for="product_name" class="form-label">
            {{ __('SKU') }}
        </label>
        <input type="text" name="product_sku" 
            id="product_sku" value="{{ $product->sku }}"
            class="form-control-plaintext" readonly/>
    </div>
    <div class="col-6 col-md-4">
        <label for="product_name" class="form-label">
            {{ __('Quantity') }}
        </label>
        <input type="text" name="product_quantity" 
            id="product_quantity" value="{{ $product->quantity }}"
            class="form-control-plaintext" readonly data-is-number/>
    </div>
    <stock-change
        class="mt-5"
        getter="{{ route('product-stock.history', $product->id) }}"
    ></stock-change>
</div>