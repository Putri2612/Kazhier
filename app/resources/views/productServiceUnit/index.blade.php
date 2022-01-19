@extends('layouts.admin')
@section('page-title')
    {{__('Product & Service Unit')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Product & Service Unit')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Product & Service Unit')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6">{{__('Manage Product & Service Unit')}}</h4>
                        @can('create constant unit')
                            <div class="col-6 text-end">
                                <a href="#" data-url="{{ route('product-unit.create') }}" data-ajax-popup="true" data-title="{{__('Create New Unit')}}" class="btn btn-icon icon-left btn-primary btn-round">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable" >
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Unit')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($units as $unit)
                                                        <tr class="font-style">
                                                            <td>{{ $unit->name }}</td>
                                                            <td class="action text-end">
                                                                @can('edit constant category')
                                                                    <a href="#" class="btn btn-primary btn-action me-1" data-url="{{ route('product-unit.edit',$unit->id) }}" data-ajax-popup="true" data-title="{{__('Edit Product Unit')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete constant category')
                                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('product-unit.destroy', [$unit->id]) }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
