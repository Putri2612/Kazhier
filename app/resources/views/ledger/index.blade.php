@extends('layouts.admin')
@section('page-title')
    {{__('Ledger')}}
@endsection

@push('script-page')
    <script>
        $(() =>{
            let account = $('#change-account');
            let month   = $('#change-month');
            let year    = $('#change-year');
            let url     = new URL(window.location);
            let query   = url.searchParams;
            account.change((e) => {
                query.set('account', e.target.value);
                window.location = url.toString();
            });
            month.change((e) => {
                query.set('month', e.target.value);
                window.location = url.toString();
            });
            year.change((e) => {
                query.set('year', e.target.value);
                window.location = url.toString();
            });
        });
    </script>
@endpush

@section('content')
<section class="section">
        <div class="section-header">
            <h1>{{__('Ledger')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Ledger')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-3">
                        <h4 class="col-md-6 fw-normal">{{__('Ledger Report')}}</h4>
                        <div class="col-md-6 row">
                            <div class="form-group col-sm-12">
                                {{ Form::select('account', $accountList, (isset($_GET['account']) ? $_GET['account'] : ''), array('id' => 'change-account', 'class' => 'form-control font-style selectric'))}}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::select('month', $months, (isset($_GET['month']) ? $_GET['month'] : date('m')), array('id' => 'change-month', 'class' => 'form-control font-style selectric'))}}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::select('year', $years, (isset($_GET['year']) ? $_GET['year'] : date('m')), array('id' => 'change-year', 'class' => 'form-control font-style selectric'))}}
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
                                                <table class="table table-flush dataTable no-footer">  
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>{{__('Date')}}</th>
                                                            <th>{{__('Description')}}</th>
                                                            <th>{{__('Debit')}}</th>
                                                            <th>{{__('Credit')}}</th>
                                                            <th>{{__('Balance')}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($count == 0)
                                                            <tr class="odd">
                                                                <td colspan="6" class="dataTables_empty">No data available in table</td>
                                                            </tr>
                                                        @else
                                                            @php
                                                                $num = 1;
                                                                $creditTotal = 0;
                                                                $debitTotal = 0;
                                                                $balance = $prevBalance;
                                                            @endphp
                                                            <tr class="font-style">
                                                                <td colspan="5"></td>
                                                                <td>{{Auth::user()->priceFormat($balance)}}</td>
                                                            </tr>
                                                            @foreach ($ledger as $data)
                                                                <tr class="font-style">
                                                                    <td>{{$num}}</td>
                                                                    <td>{{Auth::user()->dateFormat($data['date'])}}</td>
                                                                    <td>{{$data['description']}}</td>
                                                                    <td>
                                                                        @if ($data['debit'] !=0)
                                                                            @php
                                                                                $debitTotal += $data['debit'];
                                                                            @endphp
                                                                            {{Auth::user()->priceFormat($data['debit'])}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if ($data['credit'] !=0)
                                                                            @php
                                                                                $creditTotal +=$data['credit'];
                                                                            @endphp
                                                                            {{Auth::user()->priceFormat($data['credit'])}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $balance += ($data['credit'] - $data['debit']);
                                                                        @endphp
                                                                        {{Auth::user()->priceFormat($balance)}}
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $num++; 
                                                                @endphp
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                    <tfoot>
                                                        @if($count != 0)
                                                            <tr>
                                                                <th class="text-end" colspan="3">{{__('Total')}}</th>
                                                                <th>{{Auth::user()->priceFormat($debitTotal)}} </th>
                                                                <th>{{Auth::user()->priceFormat($creditTotal)}}</th>
                                                                <th>{{Auth::user()->priceFormat($balance)}}</th>
                                                            </tr>
                                                        @endif
                                                    </tfoot>
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
	