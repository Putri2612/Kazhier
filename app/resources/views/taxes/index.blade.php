@extends('layouts.admin')
@section('page-title')
    {{__('Tax Rate')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Tax Rate')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Tax Rate')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Tax Rate')}}</h4>
                        @can('create constant tax')
                            <div class="col-6 text-end">
                                <a href="#" data-url="{{ route('taxes.create') }}" data-ajax-popup="true" data-title="{{__('Create Tax Rate')}}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Tax Name')}}</th>
                                                        <th> {{__('Rate %')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($taxes as $tax)
                                                        <tr class="font-style">
                                                            <td>{{ $tax->name }}</td>
                                                            <td>{{ $tax->rate }}</td>
                                                            <td class="action text-end">
                                                                @can('edit constant tax')
                                                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="{{ route('taxes.edit',$tax->id) }}" data-ajax-popup="true" data-title="{{__('Edit Tax Rate')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete constant tax')
                                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('taxes.destroy', $tax->id) }}">
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
