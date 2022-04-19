@extends('layouts.admin')
@section('page-title')
    {{__('Assets')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Assets')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Assets')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Assets')}}</h4>
                        @can('create assets')
                            <div class="col-6 text-end crd">
                                <a href="#" data-url="{{ route('account-assets.create') }}" data-ajax-popup="true" data-title="{{__('Create New Assets')}}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                                        <th> {{__('Name')}}</th>
                                                        <th> {{__('Purchase Date')}}</th>
                                                        <th> {{__('Supported Date')}}</th>
                                                        <th> {{__('Type')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($assets as $asset)
                                                        <tr>
                                                            <td class="font-style">{{ $asset->name }}</td>
                                                            <td class="font-style">{{ \Helper::DateFormat($asset->purchase_date) }}</td>
                                                            <td class="font-style">{{ \Helper::DateFormat($asset->supported_date) }}</td>
                                                            <td class="font-style">{{ __($asset->type) }}</td>
                                                            <td class="font-style">{{ \Auth::user()->priceFormat($asset->amount) }}</td>
                                                            <td class="font-style">{{ $asset->description }}</td>
                                                            <td class="action text-end">
                                                                @can('edit assets')
                                                                    <a href="#" 
                                                                        class="btn btn-primary btn-action me-1" 
                                                                        data-url="{{ route('account-assets.edit',$asset->id) }}" 
                                                                        data-ajax-popup="true" 
                                                                        data-title="{{__('Edit Assets')}}" 
                                                                        data-bs-toggle="tooltip" 
                                                                        title="{{__('Edit')}}">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete assets')
                                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('account-assets.destroy', $asset->id) }}">
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
