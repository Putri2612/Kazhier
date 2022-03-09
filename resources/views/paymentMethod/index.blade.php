@extends('layouts.admin')

@section('page-title')
    {{__('Payment Method')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Payment Method')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Payment Method')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between w-100 crd mb-3">
                        <h4 class="fw-normal">{{__('Manage Payment Method')}}</h4>
                        @can('create constant payment method')
                            <a href="#" data-url="{{ route('payment-method.create') }}" data-ajax-popup="true" data-title="{{__('Create New Payment Method')}}" class="btn btn-sm btn-primary btn-round">
                                <i class="fa fa-plus"></i> {{__('Create')}}
                            </a>
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
                                                        <th>{{__('Title')}}</th>
                                                        @if(Gate::check('edit constant payment method') || Gate::check('delete constant payment method'))
                                                            <th class="text-end"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($paymentMethods as $paymentMethod)
                                                        <tr class="font-style">
                                                            <td>{{ $paymentMethod->name }}</td>
                                                            @if(Gate::check('edit constant payment method') || Gate::check('delete constant payment method'))
                                                                <td class="action text-end">
                                                                    @can('edit constant payment method')
                                                                        <a href="#!" data-url="{{ route('payment-method.edit',$paymentMethod->id) }}" data-ajax-popup="true" data-title="{{__('Edit Payment Method')}}" class="btn btn-primary btn-action me-1" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete constant payment method')
                                                                        <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('payment-method.destroy', $paymentMethod->id) }}">
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