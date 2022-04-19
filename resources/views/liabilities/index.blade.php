@extends('layouts.admin')
@section('page-title')
    {{__('Liabilities')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Liabilities')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Liabilities')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Liabilities')}}</h4>
                        @can('create liabilities')
                            <div class="col-6 text-end">
                                <a href="#" data-url="{{ route('account-liabilities.create') }}" data-ajax-popup="true" data-title="{{__('Create New Liabilities')}}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Due Date')}}</th>
                                                        <th> {{__('Type')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($liabilities as $liability)
                                                        <tr>
                                                            <td class="font-style">{{ $liability->name }}</td>
                                                            <td class="font-style">{{ \Helper::DateFormat($liability->date) }}</td>
                                                            <td class="font-style">{{ \Helper::DateFormat($liability->due_date) }}</td>
                                                            <td class="font-style">{{__("$liability->type") }}</td>
                                                            <td class="font-style">{{ \Auth::user()->priceFormat($liability->amount) }}</td>
                                                            <td class="font-style">{{ $liability->description }}</td>
                                                            <td class="action text-end">
                                                                @can('edit liabilities')
                                                                    <a href="#" class="btn btn-primary btn-action me-1" data-url="{{ route('account-liabilities.edit',$liability->id) }}" data-ajax-popup="true" data-title="{{__('Edit Liabilities')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete liabilities')
                                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('account-liabilities.destroy', $liability->id) }}">
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
