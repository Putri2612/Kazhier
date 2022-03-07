@extends('layouts.admin')
@section('page-title')
    {{__('Account Statement')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Account Statement')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Account Statement')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mb-10">
                <div class="col-12">
                    {{ Form::open(array('route' => array('report.account.statement'),'method' => 'GET', 'class' => 'row justify-content-end align-items-center')) }}
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('account', __('Account')) }}
                            {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('date', __('Date')) }}
                            {{ Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range')) }}
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-3 col-xxl-2">
                            {{ Form::label('type', __('Type')) }}
                            {{ Form::select('type',$types,isset($_GET['type'])?$_GET['type']:'', array('class' => 'form-control font-style selectric')) }}
                        </div>
                        <div class="col-auto text-end">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            <a href="{{route('report.account.statement')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="statement-container">
                    <div class="row align-items-stretch">
                        <div class="col-12 col-md-4">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Report') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ __('Account Statement Summary') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Type') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{ isset($_GET['type']) ? $_GET['type'] : __('All')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Date') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $dateFrom   = explode(' ',Auth::user()->dateFormat($from));
                                            $dateTo     = explode(' ',Auth::user()->dateFormat($to));
                                        @endphp
                                        @foreach ($dateFrom as $dtFrom)
                                            {{ __($dtFrom).' ' }}
                                        @endforeach
                                        -
                                        @foreach ($dateTo as $dtTo)
                                            {{ __($dtTo).' ' }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush tbl-border" >
                                                    <tbody>
                                                    @foreach ($displayAccount as $acc)
                                                        <tr>
                                                            <th>{{ $acc->name }}</th>
                                                            <td>{{ Auth::user()->priceFormat($acc->balance) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                
                                                <div class="container">
                                                    <div class="row" style="padding-top: 30px">
                                                        <div class="col-md-6"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <table class="table table-flush" id="custom-dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        <th> {{__('Type')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($reportData['credit'] as $credit)
                                                        <tr class="font-style">
                                                            <td>{{ Auth::user()->dateFormat($credit->date) }}</td>
                                                            <td> {{$credit->description}} </td>
                                                            <td>{{__('Credit')}}</td>
                                                            <td>{{ Auth::user()->priceFormat($credit->amount) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach ($reportData['debit'] as $debit)
                                                        <tr class="font-style">
                                                            <td>{{ Auth::user()->dateFormat($debit->date) }}</td>
                                                            <td> {{$debit->description}} </td>
                                                            <td>{{__('Debit')}}</td>
                                                            <td>{{ Auth::user()->priceFormat($debit->amount) }}</td>
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
