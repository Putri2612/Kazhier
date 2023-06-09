@extends('layouts.admin')
@section('page-title')
    {{__('Proposal Create')}}
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

        $(document).on('change', '#customer', function () {
            $('#customer_detail').removeClass('d-none');
            $('#customer_detail').addClass('d-block');
            $('#customer-box').removeClass('d-block');
            $('#customer-box').addClass('d-none');
            var id = $(this).val();
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
                    // console.log(data);
                    $('#customer_detail').html(data);
                },

            });
        });

        $(document).on('click', '#remove', function () {
            $('#customer-box').removeClass('d-none');
            $('#customer-box').addClass('d-block');
            $('#customer_detail').removeClass('d-block');
            $('#customer_detail').addClass('d-none');
        })

        $(document).on('change', '.item', function () {
            var iteams_id = $(this).val();
            var url = $(this).data('url');
            var el = $(this);
            $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': jQuery('#token').val()
                },
                data: {
                    'product_id': iteams_id
                },
                cache: false,
                success: function (data) {
                    var item = JSON.parse(data);

                    $(el.parent().parent().find('.quantity')).val(1);
                    $(el.parent().parent().find('.price')).val(item.product.sale_price);
                    $(el.parent().parent().find('.tax')).val(item.taxRate);
                    $(el.parent().parent().find('.unit')).html(item.unit);
                    $(el.parent().parent().find('.discount')).val(0);
                    $(el.parent().parent().find('.amount')).html(item.totalAmount);

                    UpdateSubTotal();

                },
            });
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
                UpdateInvoiceAndBillItemData(target);
            }
        });

    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Proposal Create')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item"><a href="{{route('proposal.index')}}">{{__('Proposal')}}</a></div>
                <div class="breadcrumb-item active">{{__('create')}}</div>
            </div>
        </div>
        <div class="section-body">
            {{ Form::open(array('route' => 'proposal.store')) }}
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
                                            {{ Form::select('customer_id', $customers,null, array('class' => 'form-control customer-sel font-style selectric','id'=>'customer','data-url'=>route('proposal.customer'),'required'=>'required')) }}
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
                                                {{ Form::label('proposal_number', __('Proposal Number')) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-file"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" value="{{$proposal_number}}" readonly>
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
                                            <div class="custom-control custom-checkbox mt-4">
                                                <input class="custom-control-input" type="checkbox" name="discount_apply" id="discount_apply">
                                                <label class="custom-control-label" for="discount_apply">{{__('Discount Apply')}}</label>
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
                                        <td>
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
                                                    {{ Form::text('price','', array('class' => 'form-control price','required'=>'required','placeholder'=>__('Price'),'data-is-number')) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group colorpickerinput">
                                                    {{ Form::text('tax','', array('class' => 'form-control tax','required'=>'required','placeholder'=>__('Tax'),'data-is-number')) }}
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
                                                    {{ Form::text('discount','', array('class' => 'form-control discount','required'=>'required','placeholder'=>__('Discount'), 'data-is-number')) }}
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


