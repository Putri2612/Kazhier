@extends('layouts.admin')
@section('page-title')
    {{__('Equities')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Equities')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Equities')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 font-weight-normal">{{__('Manage Equities')}}</h4>
                        @can('create equities')
                            <div class="col-6 text-right">
                                <a href="#" data-url="{{ route('account-equities.create') }}" data-ajax-popup="true" data-title="{{__('Create New Equities')}}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                                <table class="table table-flush" id="dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Name')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        <th class="text-right"> {{__('Action')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($equities as $equity)
                                                        <tr>
                                                            <td class="font-style">{{ $equity->name }}</td>
                                                            <td class="font-style">{{ \Auth::user()->priceFormat($equity->amount) }}</td>
                                                            <td class="font-style">{{ $equity->description }}</td>
                                                            <td class="action text-right">
                                                                @can('edit equities')
                                                                    <a href="#" class="btn btn-primary btn-action mr-1" data-url="{{ route('account-equities.edit',$equity->id) }}" data-ajax-popup="true" data-title="{{__('Edit Equities')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                @endcan
                                                                @can('delete equities')
                                                                    <a href="#" class="btn btn-danger btn-action" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?')}}|{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$equity->id}}').submit();">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['account-equities.destroy', $equity->id],'id'=>'delete-form-'.$equity->id]) !!}
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
