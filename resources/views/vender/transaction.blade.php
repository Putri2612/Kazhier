@extends('layouts.admin')
@section('page-title')
    {{__('Transaction')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Transaction')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('customer.dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Transaction')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4>{{__('Manage Transaction')}}</h4>
                                <div class="card-header-action">
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-icon icon-left btn-primary"><i class="fas fa-filter"></i>{{__('Filter')}}</a>
                                        <div class="dropdown-menu dropdown-list dropdown-menu-end Filter-dropdown w-64">
                                            {{ Form::open(array('route' => array('vender.transaction'),'method' => 'GET')) }}

                                            <div class="form-group">
                                                {{ Form::label('date', __('Date')) }}
                                                {{ Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range')) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('category', __('Category')) }}
                                                {{ Form::select('category',  [''=>'All']+$category,isset($_GET['category'])?$_GET['category']:'', array('class' => 'form-control font-style selectric')) }}
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">{{__('Search')}}</button>
                                                <a href="{{route('vender.transaction')}}" class="btn btn-danger">{{__('Reset')}}</a>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush font-style dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Account')}}</th>
                                                        <th> {{__('Type')}}</th>
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($transactions as $transaction)
                                                        <tr>
                                                            <td>{{  Helper::DateFormat($transaction->date)}}</td>
                                                            <td>{{  Auth::user()->priceFormat($transaction->amount)}}</td>
                                                            <td>{{ !empty($transaction->bankAccount)? $transaction->bankAccount->bank_name .' '.$transaction->bankAccount->holder_name:''}}</td>
                                                            <td>{{  $transaction->type}}</td>
                                                            <td>{{  $transaction->category}}</td>
                                                            <td>{{  $transaction->description}}</td>
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
