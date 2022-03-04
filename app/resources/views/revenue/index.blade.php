@extends('layouts.admin')
@section('page-title')
    {{__('Revenue')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Revenue')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Revenue')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Revenue')}}</h4>
                        <div class="col-6 text-end row justify-content-end">
                            @if (Auth::user()->type == 'company')
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('revenue.import') }}" data-ajax-popup="true" data-title="{{__('Import Revenue')}}" class="btn btn-icon icon-left btn-warning">
                                    <span class="btn-inner--icon"><i class="fas fa-upload"></i></span>
                                    <span class="btn-inner--text"> {{__('Import')}}</span>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('revenue.export') }}" class="btn btn-icon icon-left btn-success">
                                    <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                    <span class="btn-inner--text"> {{__('Export')}}</span>
                                </a>
                            </div>
                            @endif
                            
                            @can('create revenue')
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('revenue.create') }}" data-ajax-popup="true" data-title="{{__('Create New Revenue')}}" class="btn btn-icon icon-left btn-primary">
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
                                {{ Form::open(array('route' => array('revenue.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5')) }}
                                <div class="col-12 col-md-6 col-lg-auto form-group">
                                    {{ Form::label('date', __('Date')) }}
                                    {{ Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range')) }}
                                </div>
                                <div class="col-12 col-md-6 col-lg-2 form-group">
                                    {{ Form::label('account', __('Account')) }}
                                    {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="col-12 col-md-6 col-lg-2 form-group">
                                    {{ Form::label('customer', __('Customer')) }}
                                    {{ Form::select('customer',$customer,isset($_GET['customer'])?$_GET['customer']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="col-12 col-md-6 col-lg-2 form-group">
                                    {{ Form::label('category', __('Category')) }}
                                    {{ Form::select('category',$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="col-12 col-md-6 col-lg-2 form-group">
                                    {{ Form::label('payment', __('Payment Method')) }}
                                    {{ Form::select('payment',$payment,isset($_GET['payment'])?$_GET['payment']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    <a href="{{route('revenue.index')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                                {{ Form::close() }}
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                    <tr>

                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Account')}}</th>
                                                        <th> {{__('Customer')}}</th>
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Payment Method')}}</th>
                                                        <th> {{__('Reference')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        @if(Gate::check('edit revenue') || Gate::check('delete revenue'))
                                                            <th class="text-end"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($revenues as $revenue)
                                                        
                                                        <tr class="font-style">
                                                            <td>{{  Auth::user()->dateFormat($revenue->date)}}</td>
                                                            <td>{{  Auth::user()->priceFormat($revenue->amount)}}</td>
                                                            <td>{{ !empty($revenue->bankAccount)?$revenue->bankAccount->bank_name.' '.$revenue->bankAccount->holder_name:''}}</td>
                                                            <td>{{  (!empty($revenue->customer)?$revenue->customer->name:'')}}</td>
                                                            <td>{{  !empty($revenue->category)?$revenue->category->name:''}}</td>
                                                            <td>{{  !empty($revenue->paymentMethod)?$revenue->paymentMethod->name:''}}</td>
                                                            <td>
                                                                <a href="#!" 
                                                                    class="btn btn-secondary" 
                                                                    data-url="{{route('revenue.show',$revenue->id) }}" 
                                                                    data-ajax-popup="true" 
                                                                    title="{{__('View Reference')}}" 
                                                                    data-bs-toggle="tooltip" 
                                                                    data-original-title="{{__('Reference')}}">
                                                                    <i class="fas fa-paperclip"></i>
                                                                </a>
                                                            </td>
                                                            <td>{{  $revenue->description}}</td>

                                                            @if(Gate::check('edit revenue') || Gate::check('delete revenue'))
                                                                <td class="action text-end">
                                                                    @can('edit revenue')
                                                                        <a href="#!" class="btn btn-primary btn-action me-1" data-url="{{ route('revenue.edit',$revenue->id) }}" data-ajax-popup="true" data-title="{{__('Edit Revenue')}}" data-bs-toggle="tooltip" title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete revenue')
                                                                        <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('revenue.destroy', $revenue->id) }}">
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
