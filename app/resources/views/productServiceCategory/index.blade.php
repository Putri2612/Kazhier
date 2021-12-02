@extends('layouts.admin')
@section('page-title')
    {{__('Product & Service Category')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Categories')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Product & Service Category')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between w-100 mb-3 crd">
                        <h4 class="font-weight-normal">{{__('Manage Categories')}}</h4>
                        @can('create constant category')
                            <div class="col-auto text-right">
                                <a href="#" data-url="{{ route('product-category.create') }}" data-ajax-popup="true" data-title="{{__('Create New Category')}}" class="btn btn-icon icon-left btn-primary btn-round">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="" aria-selected="true">
                                        {{__('Product & Service')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="income-tab" data-toggle="tab" href="#income" role="tab" aria-controls="" aria-selected="false">
                                        {{__('Revenue')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="expense-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="" aria-selected="false">
                                        {{__('Expense')}}
                                    </a>
                                </li>
                            </ul>
                            <div class="card-body p-0">
                                <div class="tab-content">
                                @foreach ($categories as $index => $item)
                                    <div class="tab-pane fade {{ $index == 'product' ? 'show active' : '' }}" id="{{ $index }}" role="tabpanel" aria-labelledby="{{ $index }}-tab">
                                        <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                            <div class="table-responsive">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-flush dataTable">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th> {{__('Type')}}</th>
                                                                <th class="text-right"> {{__('Action')}}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($item as $category)
                                                                <tr>
                                                                    <td class="font-style">{{ $category->name }}</td>
                                                                    <td class="action text-right">
                                                                        @can('edit constant category')
                                                                            <a href="#" class="btn btn-primary btn-action mr-1" data-url="{{ route('product-category.edit',$category->id) }}" data-ajax-popup="true" data-title="{{__('Edit Product Category')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                        @endcan
                                                                        @can('delete constant category')
                                                                            <a href="#" class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?')}}|{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$category->id}}').submit();">
                                                                                <i class="fas fa-trash"></i>
                                                                            </a>
                                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['product-category.destroy', $category->id],'id'=>'delete-form-'.$category->id]) !!}
                                                                            {!! Form::close() !!}
                                                                        @endcan
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
