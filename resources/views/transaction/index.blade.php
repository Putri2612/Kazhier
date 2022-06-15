@extends('layouts.admin')
@section('page-title')
    {{__('Bank Transaction')}}
@endsection
@push('script-page')
    <script>
        try {
            const pagination = new Pagination({
                locale: '{{ config('app.locale') }}',
                pageContainer: '#pagination-container',
                limitContainer: '#pagination-limit',
                navigation: {
                    previous: `<i class="fa-solid fa-chevron-left"></i>`,
                    next: `<i class="fa-solid fa-chevron-right"></i>`,
                    limit: '{{ __('Entries each page') }}'
                }
            });
            pagination.format = data => {
                const date = pagination.dateFormat(data.date),
                    amount = pagination.priceFormat(data.amount),
                    account = data.bank_account ? `${data.bank_account.bank_name} ${data.bank_account.holder_name}` : '';
                
                return `
                    <tr class="font-style">
                        <td>${date}</td>
                        <td>${account}</td>
                        <td>${data.type}</td>
                        <td>${data.category}</td>
                        <td>${data.description}</td>
                        <td>${amount}</td>
                    </tr>
                `;
            }
            @if(isset($_GET['date']) || isset($_GET['account']))
                const form = document.querySelector('#additional');
                pagination.additionalData = new FormData(form);
            @endif
            pagination.init();
        } catch (error) {
            console.log(error);
            toastrs('Error', error, 'error');
        }
    </script>
@endpush
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
                    {{ Form::open(array('route' => array('transaction.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-center', 'id' =>'additional')) }}
                        <div class="form-group col-12 col-md-6 col-lg-auto col-xxl-2">
                            {{ Form::label('date', __('Date')) }}
                            {{ Form::text('date', isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control datepicker-range')) }}
                        </div>
                        <div class="form-group col-12 col-md-6 col-lg-3 col-xxl-2">
                            {{ Form::label('account', __('Account')) }}
                            {{ Form::select('account',$account,isset($_GET['account'])?$_GET['account']:'', array('class' => 'form-control font-style selectric')) }}
                        </div>
                        <div class="col-auto text-end">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            <a href="{{route('transaction.index')}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>
                    {{ Form::close() }}
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Report') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        {{__('Transaction History')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card card-statistic-1 py-3">
                                <div class="card-wrap">
                                    <div class="card-header py-0">
                                        <h4> {{ __('Date') }} : </h4>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $selected_date = __('All Time');
                                            if(isset($_GET['date'])) {
                                                $selected_date = $_GET['date'];
                                                $exploded = explode(' - ', $selected_date);
                                                $formatted = [];
                                                foreach ($exploded as $date) {
                                                    $formatted[] = Helper::DateFormat($date);
                                                }
                                                $selected_date = "{$formatted[0]} - {$formatted[1]}";
                                            }
                                        @endphp
                                        {{ $selected_date }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="card-body p-0">
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div id="pagination-limit" class="col-auto"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('transaction.get') }}">
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
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="pagination-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
