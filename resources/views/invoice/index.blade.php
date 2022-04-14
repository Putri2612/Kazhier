@extends('layouts.admin')
@section('page-title')
    {{__('Invoice')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Invoice')}}</h1>
            <div class="section-header-breadcrumb">
                @if(\Auth::guard('customer')->check())
                    <div class="breadcrumb-item active"><a href="{{route('customer.dashboard')}}">{{__('Dashboard')}}</a></div>
                @else
                    <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                @endif
                <div class="breadcrumb-item">{{__('Invoice')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Invoice')}}</h4>
                        <div class="col-6 row justify-content-end text-end">
                            @if(Auth::user()->type == 'company')
                            <div class="col-auto">
                                <a href="{{ route('invoice.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary">
                                    <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                    <span class="btn-inner--text"> {{__('Export')}}</span>
                                </a>
                            </div>
                            @endif
                            @can('create invoice')
                            <div class="col-auto">
                                <a href="{{ route('invoice.create') }}" class="btn btn-icon icon-left btn-primary">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            </div>
                            @endcan
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                @if(!Auth::guard('customer')->check())
                                {{ Form::open(array('route' => array('invoice.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5')) }}
                                @else
                                {{ Form::open(array('route' => array('customer.invoice'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5')) }}
                                @endif
                                <div class="form-group col-12 col-md-6 col-lg-auto">
                                    {{ Form::label('issue_date', __('Date')) }}
                                    {{ Form::text('issue_date', isset($_GET['issue_date'])?$_GET['issue_date']:null, array('class' => 'form-control datepicker-range')) }}
                                </div>
                                @if(!\Auth::guard('customer')->check())
                                    <div class="form-group col-12 col-md-6 col-lg-2">
                                        {{ Form::label('customer', __('Customer')) }}
                                        {{ Form::select('customer',$customer,isset($_GET['customer'])?$_GET['customer']:'', array('class' => 'form-control font-style selectric')) }}
                                    </div>
                                @endif
                                <div class="form-group col-12 col-md-6 col-lg-2">
                                    {{ Form::label('status', __('Status')) }}
                                    {{ Form::select('status', [''=>__('All')]+$status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-auto">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary btn-action"><i class="fas fa-search"></i></button>
                                        @if(!\Auth::guard('customer')->check())
                                            <a href="{{route('invoice.index')}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                        @else
                                            <a href="{{route('customer.invoice')}}" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                        @endif
                                    </div>
                                </div>
                                {{ Form::close() }}
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                    <tr>

                                                        <th> {{__('Invoice')}}</th>
                                                        @if(!\Auth::guard('customer')->check())
                                                            <th> {{__('Customer')}}</th>
                                                        @endif
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Issue Date')}}</th>
                                                        <th> {{__('Due Date')}}</th>
                                                        <th> {{__('Status')}}</th>
                                                        @if(Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice'))
                                                            <th class="text-end"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($invoices as $invoice)
                                                        <tr class="font-style">
                                                            <td>
                                                                @if(\Auth::guard('customer')->check())
                                                                    <a class="btn btn-outline-primary" href="{{ route('customer.invoice.show',$invoice->id) }}">{{ Auth::user()->invoiceNumberFormat($invoice->invoice_id) }}
                                                                    </a>
                                                                @else
                                                                    <a class="btn btn-outline-primary" href="{{ route('invoice.show',$invoice->id) }}">{{ Auth::user()->invoiceNumberFormat($invoice->invoice_id) }}
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            @if(!\Auth::guard('customer')->check())
                                                                <td> {{!empty($invoice->customer)? $invoice->customer->name:'' }} </td>
                                                            @endif
                                                            <td>{{ !empty($invoice->category)?$invoice->category->name:''}}</td>
                                                            <td>{{ Auth::user()->dateFormat($invoice->issue_date) }}</td>
                                                            <td>{{ Auth::user()->dateFormat($invoice->due_date) }}</td>
                                                            <td>
                                                                @php
                                                                    $type = strtolower($invoice->getType());
                                                                @endphp
                                                                @if($invoice->status < count(\App\Models\Invoice::$statuses[$type]) - 1)
                                                                    <span class="badge badge-light">{{ $invoice->getStatus() }}</span>
                                                                @else
                                                                    <span class="badge badge-primary">{{ $invoice->getStatus() }}</span>
                                                                @endif
                                                            </td>
                                                            @if(Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice') || Gate::check('duplicate invoice'))
                                                                <td class="action text-end">
                                                                    @can('show invoice')
                                                                        @if(\Auth::guard('customer')->check())
                                                                            <a href="{{ route('customer.invoice.show',$invoice->id) }}" class="btn btn-primary btn-action me-1" data-bs-toggle="tooltip" data-original-title="{{__('Detail')}}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @else
                                                                            <a href="{{ route('invoice.show',$invoice->id) }}" class="btn btn-primary btn-action me-1" data-bs-toggle="tooltip" data-original-title="{{__('Detail')}}">
                                                                                <i class="fas fa-eye"></i>
                                                                            </a>
                                                                        @endif
                                                                    @endcan
                                                                    @if (Gate::check('edit invoice') || Gate::check('duplicate invoice') || Gate::check('delete invoice'))
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-light" data-bs-toggle="dropdown" data-bs-auto-close="true">
                                                                                <i class="fa-solid fa-ellipsis fa-lg"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                @can('duplicate invoice')
                                                                                    <li>
                                                                                        <a href="#" class="dropdown-item" data-bs-toggle="tooltip" data-original-title="{{__('Duplicate')}}" data-bs-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back" data-confirm-yes="document.getElementById('duplicate-form-{{$invoice->id}}').submit();">
                                                                                            {{ __('Duplicate') }}
                                                                                            {!! Form::open(['method' => 'get', 'route' => ['invoice.duplicate', $invoice->id],'id'=>'duplicate-form-'.$invoice->id]) !!}
                                                                                            {!! Form::close() !!}
                                                                                        </a>
                                                                                    </li>
                                                                                @endcan
                                                                                @can('edit invoice')
                                                                                    <li>
                                                                                        <a class="dropdown-item" href="{{ route('invoice.edit',$invoice->id) }}">
                                                                                            {{ __('Edit') }}
                                                                                        </a>
                                                                                    </li>
                                                                                @endcan
                                                                                @can('delete invoice')
                                                                                    <li>
                                                                                        <a href="#!" class="dropdown-item" data-is-delete data-delete-url="{{ route('invoice.destroy', $invoice->id) }}">
                                                                                            {{ __('Delete') }}
                                                                                        </a>
                                                                                    </li>
                                                                                @endcan
                                                                            </ul>
                                                                        </div>
                                                                    @endif
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
