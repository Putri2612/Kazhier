@extends('layouts.admin')
@section('page-title')
    {{ __('Default Values') }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Default Values') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Default Values')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{ __('Manage Default Values') }}</h4>
                        <div class="col-6 text-end row">
                            <div class="col-lg-10"></div>
                            @can('create defaults')
                                <div class="col-lg-2">
                                    <a href="#" data-url="{{ route('defaults.create') }}" data-ajax-popup="true" data-title="{{ __('Create New Default Value') }}" class="btn btn-icon icon-left btn-primary btn-round">
                                        <i class="fas fa-plus"></i>
                                        {{__('Create')}}
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
                                            <div class="col-sm 12">
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th> {{ __('Type') }} </th>
                                                            <th> {{ __('Name') }} </th>
                                                            <th> {{ __('Color') }} </th>
                                                            <th> {{ __('Value') }} </th>
                                                            <th class="text-end"> {{ __('Action') }} </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($defaults as $default)
                                                            <tr class="font-style">
                                                                <td>{{ $default->type }}</td>
                                                                <td>{{ $default->name }}</td>
                                                                <td {!! $default->color != null ? 'style="background-color:#'.$default->color.'"' : '' !!}>{{ ( $default->color == null ? '-' : '') }}</td>
                                                                <td>{{ ($default->value != null ? $default->value : '-') }}</td>
                                                                <td class="action text-end">
                                                                    @can('edit defaults')
                                                                        <a href="#" data-url="{{ route('defaults.edit', $default->id) }}" class="btn btn-primary btn-action me-1" data-ajax-popup="true" data-title="{{ __('Edit Default Value') }}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('destroy defaults')
                                                                        <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('defaults.destroy', $default->id) }}">
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