@extends('layouts.admin')
@section('page-title')
    {{__('Custom Field')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Custom Field')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Custom Field')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <div class="col-12 col-md-6">
                            <h4 class="fw-normal">{{__('Manage Custom Field')}}</h4>
                        </div>
                        @can('create constant custom field')
                        <div class="col-12 col-md-6 text-end row justify-content-end">
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('custom-field.create') }}" data-ajax-popup="true" data-title="{{__('Create New Custom Field')}}" class="btn btn-icon icon-left btn-primary">
                                    <span><i class="fas fa-plus"></i></span>
                                    <span> {{__('Create')}}</span>
                                </a>
                            </div>
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
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Custom Field')}}</th>
                                                        <th> {{__('Type')}}</th>
                                                        <th> {{__('Module')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($custom_fields as $field)
                                                            <tr class="font-style">
                                                                <td>{{ $field->name}}</td>
                                                                <td>{{ __(ucwords($field->type)) }}</td>
                                                                <td>{{ __(ucwords($field->module)) }}</td>
                                                                @if(Gate::check('edit constant custom field') || Gate::check('delete constant custom field'))
                                                                    <td class="action text-end">
                                                                        @can('edit constant custom field')
                                                                            <a href="#!" class="btn btn-primary btn-action me-1" data-url="{{ route('custom-field.edit',$field->id) }}" data-ajax-popup="true" data-title="{{__('Edit Custom Field')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                        @endcan
                                                                        @can('delete constant custom field')
                                                                            <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('custom-field.destroy', $field->id) }}">
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
