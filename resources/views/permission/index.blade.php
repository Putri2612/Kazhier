@extends('layouts.admin')

@section('page-title')
    {{__('Permissions')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Invoice')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Permissions')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between w-100 crd mb-3">
                        <h4 class="fw-normal">{{__('Manage Permissions')}}</h4>
                        <a href="#" data-url="{{ route('permissions.create') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Create New Permission')}}" class="btn btn-icon icon-left btn-primary btn-round">
                            <i class="fa fa-plus"></i> {{__('Create')}}
                        </a>
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
                                                        <th> {{__('Permissions')}}</th>
                                                        <th class="text-end" width="200px"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($permissions as $permission)
                                                        <tr>
                                                            <td>{{ $permission->name }}</td>

                                                            <td class="action">

                                                                <a href="#" class="btn btn-primary btn-action me-1" data-url="{{ route('permissions.edit',$permission->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Update permission')}}" class="btn btn-outline btn-sm blue-madison" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>

                                                                <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('permissions.destroy', $permission->id) }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
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
