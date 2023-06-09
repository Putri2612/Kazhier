@extends('layouts.admin')
@section('page-title')
    {{__('Product & Service Stock')}}
@endsection
@push('script-page')
    <script>
        try {
            const pagination = new Pagination({
                locale: '{{ config('app.locale') }}',
                pageContainer: '#pagination-container',
                limitContainer: '#pagination-limit',
                additionalForm: '#query-form',
                navigation: {
                    previous: `<i class="fa-solid fa-chevron-left"></i>`,
                    next: `<i class="fa-solid fa-chevron-right"></i>`,
                    limit: '{{ __('Entries each page') }}'
                }
            });
            pagination.format = data => {                
                let showURL = "{{ route('product-stock.show', ':id') }}";
                showURL = showURL.replace(':id', data.id);

                let addURL = "{{ route('product-stock.modify', [':id', 'add']) }}";
                addURL  = addURL.replace(':id', data.id);

                let reduceURL = "{{ route('product-stock.modify', [':id', 'reduce']) }}";
                reduceURL  = reduceURL.replace(':id', data.id);

                let quantity = pagination.numberFormat(data.quantity);

                if('unit' in data) {
                    quantity += ` ${data.unit.name}`;
                }

                return `
                    <tr class="font-style">
                        <td>${data.name}</td>
                        <td>${data.sku}</td>
                        <td><tl-str>${data.type}</tl-str></td>
                        <td>${quantity}</td>
                        <td class="action">
                            <a href="#!" class="btn btn-primary me-1" 
                                data-url="${showURL}" data-ajax-popup="true" 
                                data-title="{{__('Stock History')}}">
                                <i class="fa-solid fa-search"></i>
                            </a>
                            <a href="#!" class="btn btn-primary me-1" 
                                data-url="${addURL}" data-ajax-popup="true" 
                                data-title="{{__('Add Stock')}}">
                                <i class="fa-solid fa-plus"></i>
                            </a>
                            <a href="#!" class="btn btn-primary me-1" 
                                data-url="${reduceURL}" data-ajax-popup="true" 
                                data-title="{{__('Reduce Stock')}}">
                                <i class="fa-solid fa-minus"></i>
                            </a>
                        </td>
                    </tr>
                `;
            }
            pagination.init();
        } catch (error) {
            console.log(error);
            toastrs('Error', error, 'error');
        }
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Product & Service Stock')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Product & Service Stock')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-3 crd">
                        <h4 class="col-12 col-md-6 fw-normal">{{__('Manage Product & Service Stock')}}</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                {{ Form::open(array('route' => array('product-stock.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5', 'id' => 'query-form')) }}
                                <div class="form-group col-12 col-md-6 col-lg-2">
                                    {{ Form::label('sku', __('SKU')) }}
                                    {{ Form::text('sku', null, array('class' => 'form-control font-style','required'=>'required')) }}
                                </div>
                                <div class="form-group text-end col-12 col-md-6 col-lg-auto">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    <a href="{{route('productservice.index')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                                {{ Form::close() }}
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div id="pagination-limit" class="col-auto"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('product-stock.get') }}">
                                                    <thead class="thead-light">
                                                    <tr role="row">
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Sku')}}</th>
                                                        <th>{{__('Type')}}</th>
                                                        <th>{{__('Quantity')}}</th>
                                                        <th>{{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pagination-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
