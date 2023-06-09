@extends('layouts.admin')
@section('page-title')
    {{__('Invoice Create')}}
@endsection
@push('script-page')
    <script src="{{asset('assets/js/jquery.repeater.min.js')}}"></script>
    <script>
        var selector = "body";

        if ($(selector + " .repeater").length) {
            var $dragAndDrop = $("body .repeater tbody").sortable({
                handle: '.sort-handler'
            });
            var $repeater = $(selector + ' .repeater').repeater({
                initEmpty: true,
                defaultValues: {
                    'status': 1
                },
                show: function () {
                    $(this).slideDown();
                    var file_uploads = $(this).find('input.multi');
                    if (file_uploads.length) {
                        $(this).find('input.multi').MultiFile({
                            max: 3,
                            accept: 'png|jpg|jpeg',
                            max_size: 2048
                        });
                    }
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                        $(this).remove();

                        UpdateSubTotal();
                    }
                },
                ready: function (setIndexes) {
                    $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });
            var value = $(selector + " .repeater").attr('data-value');
            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
            }

        }

        const discount  = {},
            products    = {};

        $(document).on('change', '#customer', function () {
            var id = $(this).val();
            if(!id.includes('new')){
                $('#customer_detail').removeClass('d-none');
                $('#customer_detail').addClass('d-block');
                $('#customer-box').removeClass('d-block');
                $('#customer-box').addClass('d-none');
                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': jQuery('#token').val()
                    },
                    data: {
                        'id': id
                    },
                    cache: false,
                    success: function (data) {
                        $('#customer_detail').html(data.view);
                        if(data.category) {
                            discount.amount = (data.category.discount_type ? data.category.discount : data.category.discount / 100);
                            discount.max    = data.category.max_discount;
                        } else {
                            discount.amount = 0;
                            discount.max    = 0;
                        }
                    },

                });
            }
        });

        $(document).on('click', '#remove', function () {
            $('#customer-box').removeClass('d-none');
            $('#customer-box').addClass('d-block');
            $('#customer_detail').removeClass('d-block');
            $('#customer_detail').addClass('d-none');
        })

        $(document).on('change', '.item', function () {
            var items_id = $(this).val();
            if(!items_id.includes('new') && !products[items_id]){
                var url = $(this).data('url');
                var el = $(this);
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': jQuery('#token').val()
                    },
                    data: {
                        'product_id': items_id
                    },
                    cache: false,
                    success: function (data) {
                        var item = JSON.parse(data);

                        let discount = 0;
                        if(discount.hasOwnProperty('amount')) {
                            discount = discount.amount;
                            discount = discount > 1 ? discount : discount * item.product.sale_price;
                        }
                        
                        if(discount.hasOwnProperty('max')) {
                            discount = (discount > discount.max && discount.max > 0) ? discount.max : discount;
                        }

                        products[item.product.id] = {
                            'name' : item.product.name,
                            'stock': item.stock
                        };
                        $(el.parent().parent().find('.quantity')).val(1);
                        $(el.parent().parent().find('.price')).val(item.product.sale_price);
                        $(el.parent().parent().find('.tax')).val(item.taxRate);
                        $(el.parent().parent().find('.unit')).html(item.unit);
                        $(el.parent().parent().find('.discount')).val(discount);
                        $(el.parent().parent().find('.amount')).html(item.totalAmount);

                        UpdateSubTotal();
                    },
                });
            } else if (products[items_id]) {
                toastrs('Error', "{{__('The same item has already listed')}}", 'error');
                $(el).val(null);
            }
        });

        document.addEventListener('keyup', (event) => {
            let target      = event.target,
                doChange    = false;
            
            const acceptableInput = [
                'quantity',
                'price',
                'tax',
                'discount',
            ], BreakForeach = {};

            try {
                acceptableInput.forEach(className => {
                    if(target.classList.contains(className)) {
                        doChange = true;
                        throw BreakForeach;
                    }
                });
            } catch (error) {
                if(error !== BreakForeach) throw error;
            }

            if(doChange) {
                UpdateInvoiceAndBillItemData(target, {discount: discount, products: products});
            }
        });
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Invoice Create')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item"><a href="{{route('invoice.index')}}">{{__('Invoice')}}</a></div>
                <div class="breadcrumb-item active">{{__('create')}}</div>
            </div>
        </div>
        <div class="section-body">
            {{ Form::open(array('route' => 'invoice.store', 'onsubmit' => 'return ValidateForm(event)')) }}
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="customer-box">
                                        <div class="input-group">
                                            {{ Form::label('customer_id', __('Customer')) }}
                                            {{ Form::select('customer_id', $customers,null, array('class' => 'form-control customer-sel font-style selectric','id'=>'customer','data-url'=>route('invoice.customer'),'required'=>'required')) }}
                                        </div>
                                    </div>
                                    <div id="customer_detail" class="d-none">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('issue_date', __('Issue Date')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('issue_date', '', array('class' => 'form-control datepicker','required'=>'required')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('due_date', __('Due Date')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('due_date', '', array('class' => 'form-control datepicker','required'=>'required')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('invoice_number', __('Invoice Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-file"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{$invoice_number}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('ref_number', __('Ref Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-joint"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('ref_number', '', array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('signed_by', __('Signed By')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-signature"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('signed_by', '', array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('signee_position', __('Signee Position')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                    {{ Form::text('signee_position', '', array('class' => 'form-control')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                {{ Form::label('category_id', __('Category')) }}
                                                {{ Form::select('category_id', $category,null, array('class' => 'form-control customer-sel font-style selectric','required'=>'required')) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                {{ Form::label('type', __('Type')) }}
                                                <select name="type" id="type" class="form-control customer-sel font-style selectric">
                                                    @foreach (\App\Models\Invoice::$types as $index => $item)
                                                        @php
                                                            $item = strtolower($item);
                                                            $option = $index ? "Invoice with {$item}" : $item;
                                                            $option = ucfirst($option);
                                                        @endphp
                                                        <option value="{{ $index }}" {{ $index == $type ? 'selected' : '' }}>{{ __($option) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @if(!$customFields->isEmpty())
                                            <div class="col-md-6">
                                                <div class="tab-pane fade show" id="tab-2" role="tabpanel">
                                                    @include('customFields.formBuilder')
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card repeater">
                        <div class="card-header">
                            <h4>{{__('Product & Services')}}</h4>
                            <div class="card-header-action">
                                <a href="#" data-repeater-create="" class="btn btn-icon icon-left btn-primary" data-bs-toggle="modal" data-target="#add-bank">
                                    <i class="fas fa-plus"></i>{{__('Add Item')}}
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" data-repeater-list="items" id="sortable-table">
                                    <thead>
                                    <tr>
                                        <th>{{__('Items')}}</th>
                                        <th class="column-small">{{__('Quantity')}}</th>
                                        <th>{{__('Price')}} </th>
                                        <th class="column-small">{{__('Tax')}}</th>
                                        <th>{{__('Discount')}}</th>
                                        <th class="text-end">{{__('Amount')}} </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="ui-sortable">
                                    <tr data-repeater-item data-is-item="true">
                                        <td width="17.5%">
                                            {{ Form::select('item', $product_services,'', array('class' => 'form-control font-style item','data-url'=>route('invoice.product'),'required'=>'required')) }}
                                        </td>
                                        <td class="column-small">
                                            <div class="form-group">
                                                <div class="input-group colorpickerinput">
                                                    {{ Form::text('quantity','', array('class' => 'form-control quantity','required'=>'required','placeholder'=>__('Qty'),'data-is-number')) }}
                                                    <div class="input-group-append">
                                                        <div class="input-group-text unit">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group colorpickerinput">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            {{\Auth::user()->currencySymbol()}}
                                                        </div>
                                                    </div>
                                                    {{ Form::text('price','', array('class' => 'form-control price','required'=>'required','placeholder'=>__('Price'), 'data-is-number')) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-small">
                                            <div class="form-group">
                                                <div class="input-group colorpickerinput">
                                                    {{ Form::text('tax','', array('class' => 'form-control tax','required'=>'required','placeholder'=>__('Tax'), 'data-is-number')) }}
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-percentage"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group colorpickerinput">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            {{\Auth::user()->currencySymbol()}}
                                                        </div>
                                                    </div>
                                                    {{ Form::text('discount','', array('class' => 'form-control discount','placeholder'=>__('Discount'), 'data-is-number')) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end amount">
                                            0.00
                                        </td>
                                        <td>
                                            <a href="#" class="fas fa-trash" data-repeater-delete></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td><strong>{{__('Sub Total')}} ({{\Auth::user()->currencySymbol()}})</strong></td>
                                        <td class="text-end subTotal">0.00</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><strong>{{__('Total Amount')}} ({{\Auth::user()->currencySymbol()}})</strong></td>
                                        <td class="text-end totalAmount">0.00</td>
                                        <td></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    <a href="{{route('invoice.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
                    {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>

@endsection


