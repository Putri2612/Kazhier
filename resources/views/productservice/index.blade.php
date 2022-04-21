@extends('layouts.admin')
@section('page-title')
    {{__('Product & Service')}}
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
                const sale   = pagination.priceFormat(data.sale_price),
                    purchase = pagination.priceFormat(data.purchase_price),
                    tax      = data.taxes ? data.taxes.name : '',
                    category = data.category ? data.category.name : '',
                    description = data.description ? data.description : '';
                
                @can('edit product & service')
                    let editURL = "{{ route('productservice.edit', ':id') }}";
                    editURL     = editURL.replace(':id', data.id);
                @endcan
                @can('delete product & service')
                    let deleteURL = "{{ route('productservice.destroy', ':id') }}";
                    deleteURL     = deleteURL.replace(':id', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>${data.name}</td>
                        <td>${data.sku}</td>
                        <td>${sale}</td>
                        <td>${purchase}</td>
                        <td>${tax}</td>
                        <td>${category}</td>
                        <td>${data.type}</td>
                        <td>${description}</td>
                        @if(Gate::check('edit product & service') || Gate::check('delete product & service'))
                            <td class="action text-end">
                                @can('edit product & service')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__('Edit Product Service')}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete product & service')
                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="${deleteURL}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endcan
                            </td>
                        @endif
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
            <h1>{{__('Product & Service')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Product & Service')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-3 crd">
                        <h4 class="col-12 col-md-6 fw-normal">{{__('Manage Product & Service')}}</h4>
                        <div class="col-12 col-md-6 row text-end justify-content-end">
                            @can('create product & service')
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('productservice.create') }}" data-ajax-popup="true" data-title="{{__('Create New Product')}}" class="btn btn-icon icon-left btn-primary">
                                    <i class="fas fa-plus"></i><span class="btn-inner--text d-none d-md-inline"> {{__('Create')}}</span>
                                </a>
                            </div>
                            @endcan
                            @if (Auth::user()->type == 'company')
                                <div class="col-auto">
                                    <div class="btn-group">
                                        <div class="btn btn-light" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis fa-lg"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" data-url="{{ route('productservice.import') }}" data-ajax-popup="true" data-title="{{__('Import Product')}}" class="dropdown-item">
                                                    {{__('Import')}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('productservice.export') }}" target="_blank" class="dropdown-item">
                                                    {{__('Export')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                {{ Form::open(array('route' => array('productservice.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5', 'id' => 'query-form')) }}
                                <div class="form-group col-12 col-md-6 col-lg-2">
                                    {{ Form::label('category', __('Category')) }}
                                    {{ Form::select('category', $category,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
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
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('productservice.get') }}">
                                                    <thead class="thead-light">
                                                    <tr role="row">
                                                        <th>{{__('Name')}}</th>
                                                        <th>{{__('Sku')}}</th>
                                                        <th>{{__('Sale Price')}}</th>
                                                        <th>{{__('Purchase Price')}}</th>
                                                        <th>{{__('Tax')}}</th>
                                                        <th>{{__('Category')}}</th>
                                                        <th>{{__('Type')}}</th>
                                                        <th>{{__('Description')}}</th>
                                                        <th class="text-end">{{__('Action')}}</th>
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
