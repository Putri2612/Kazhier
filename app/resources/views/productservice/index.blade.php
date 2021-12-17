@extends('layouts.admin')
@section('page-title')
    {{__('Product & Service')}}
@endsection
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
                        <h4 class="col-6 fw-normal">{{__('Manage Product & Service')}}</h4>
                        <div class="col-6 row text-end">
                            <div class="col-lg-8"></div>
                            <div class="dropdown col-lg-2">
                                <a href="#" data-toggle="dropdown" class="btn btn-icon icon-left btn-primary btn-round">
                                    <i class="fas fa-filter"></i>{{__('Filter')}}
                                </a>
                                <div class="dropdown-menu dropdown-list dropdown-menu-end Filter-dropdown">
                                    {{ Form::open(array('route' => array('productservice.index'),'method' => 'GET')) }}
                                    <div class="form-group">
                                        {{ Form::label('category', __('Category')) }}
                                        {{ Form::select('category', $category,null, array('class' => 'form-control font-style selectric','required'=>'required')) }}
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                        <a href="{{route('productservice.index')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>
                            @can('create product & service')
                            <div class="col-lg-2">
                                <a href="#" data-url="{{ route('productservice.create') }}" data-ajax-popup="true" data-title="{{__('Create New Product')}}" class="btn btn-icon icon-left btn-primary btn-round">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                    <tr role="row">
                                                        <th>{{__('Name')}}</th>
                                                        <th> {{__('Sku')}}</th>
                                                        <th>{{__('Sale Price')}}</th>
                                                        <th>{{__('Purchase Price')}}</th>
                                                        <th>{{__('Tax')}}</th>
                                                        <th>{{__('Category')}}</th>
                                                        <th> {{__('Unit')}}</th>
                                                        <th>{{__('Type')}}</th>
                                                        <th>{{__('Description')}}</th>
                                                        <th class="text-end">{{__('Action')}}</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($productServices as $productService)
                                                        <tr class="font-style">
                                                            <td>{{ $productService->name}}</td>
                                                            <td>{{ $productService->sku }}</td>
                                                            <td>{{ \Auth::user()->priceFormat($productService->sale_price) }}</td>
                                                            <td>{{  \Auth::user()->priceFormat($productService->purchase_price )}}</td>
                                                            <td>{{ !empty($productService->taxes())?$productService->taxes()->name :'' }}</td>
                                                            <td>{{ !empty($productService->category)?$productService->category->name:'' }}</td>
                                                            <td>{{ !empty($productService->unit())?$productService->unit()->name:'' }}</td>
                                                            <td>{{ $productService->type }}</td>
                                                            <td>{{ $productService->description }}</td>

                                                            @if(Gate::check('edit product & service') || Gate::check('delete product & service'))
                                                                <td class="action text-end">
                                                                    @can('edit product & service')
                                                                        <a href="#" class="btn btn-primary btn-action me-1" data-url="{{ route('productservice.edit',$productService->id) }}" data-ajax-popup="true" data-title="{{__('Edit Product Service')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete product & service')
                                                                        <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('productservice.destroy', $productService->id) }}">
                                                                            <i class="fas fa-trash"></i>
                                                                        </a>
                                                                    @endcan
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
