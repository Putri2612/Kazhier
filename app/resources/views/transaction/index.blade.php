@extends('layouts.admin')
@section('page-title')
    {{__('Bank Transaction')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Bank Transaction')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Transaction Detail')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Transaction')}}</h4>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(array('route' => array('transaction.index'),'method' => 'GET', 'class' => 'row justify-content-end pt-3 pb-5 mb-5')) }}
                                <div class="form-group col-12 col-md-6 col-lg-auto col-xxl-2">
                                    {{ Form::label('date', __('Date')) }}
                                    {{ Form::text('date', isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control datepicker-range')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                                    {{ Form::label('account', __('Account')) }}
                                    {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    <a href="{{route('transaction.index')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            {{ Form::close() }}
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable">
                                                    <thead class="thead-light">
                                                    <tr>

                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Account')}}</th>
                                                        <th> {{__('Type')}}</th>
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        <th class="text-end"> {{__('Amount')}}</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($transactions as $transaction)
                                                        <tr class="font-style">
                                                            <td>{{ \Auth::user()->dateFormat($transaction->date)}}</td>
                                                            <td>{{!empty($transaction->bankAccount)?$transaction->bankAccount->bank_name.' '.$transaction->bankAccount->holder_name:''}}</td>
                                                            <td class="font-style">{{  $transaction->type}}</td>
                                                            <td class="font-style">{{  $transaction->category}}</td>
                                                            <td>{{  $transaction->description}}</td>
                                                            <td class="text-end">{{\Auth::user()->priceFormat($transaction->amount)}}</td>
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
