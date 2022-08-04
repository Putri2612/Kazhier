@extends('layouts.admin')
@section('page-title')
    {{__('Bank Balance Transfer')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Bank Balance Transfer')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Balance Detail')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Account Balance')}}</h4>
                        <div class="col-6 text-end row justify-content-end">
                            @can('create transfer')
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('transfer.create') }}" data-ajax-popup="true" data-title="{{__('Transfer Account Balance')}}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                {{ Form::open(array('route' => array('transfer.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5')) }}
                                <div class="form-group col-12 col-md-6 col-lg-auto">
                                    {{ Form::label('date', __('Date')) }}
                                    {{ Form::text('date', isset($_GET['date'])?$_GET['date']:'', array('class' => 'form-control datepicker-range')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-2">
                                    {{ Form::label('from_account', __('From Account')) }}
                                    {{ Form::select('from_account',$account,isset($_GET['from_account'])?$_GET['from_account']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-2">
                                    {{ Form::label('to_account', __('To Account')) }}
                                    {{ Form::select('to_account', $account,isset($_GET['to_account'])?$_GET['to_account']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-auto text-end">
                                    <button type="submit" class="btn btn-round btn-primary"><i class="fas fa-search"></i></button>
                                    <a href="{{route('transfer.index')}}" class="btn btn-round btn-danger"><i class="fas fa-trash"></i></a>
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
                                                        <th> {{__('From Account')}}</th>
                                                        <th> {{__('To Account')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Payment Method')}}</th>
                                                        <th> {{__('Reference')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        @if(Gate::check('edit transfer') || Gate::check('delete transfer'))
                                                            <th class="text-end"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($transfers as $transfer)
                                                        <tr class="font-style">
                                                            <td>{{ \Helper::DateFormat( $transfer->date) }}</td>
                                                            <td>{{ !empty($transfer->fromBankAccount)? $transfer->fromBankAccount->bank_name.' '.$transfer->fromBankAccount->holder_name:''}}</td>
                                                            <td>{{ !empty( $transfer->toBankAccount)? $transfer->toBankAccount->bank_name.' '. $transfer->toBankAccount->holder_name:''}}</td>
                                                            <td>{{ \Auth::user()->priceFormat( $transfer->amount)}}</td>
                                                            <td>{{ !empty($transfer->paymentMethod)?$transfer->paymentMethod->name:''}}</td>
                                                            <td>
                                                                <a href="#!" class="btn btn-secondary" data-url="{{route('transfer.show',$transfer->id) }}" data-ajax-popup="true" data-title="{{__('View Reference')}}" data-bs-toggle="tooltip" data-original-title="{{__('Reference')}}"">
                                                                    <i class="fas fa-paperclip"></i>
                                                                </a>
                                                            </td>
                                                            <td>{{  $transfer->description}}</td>

                                                            @if(Gate::check('edit transfer') || Gate::check('delete transfer'))
                                                                <td class="action text-end">
                                                                    @can('edit transfer')
                                                                        <a href="#!" class="btn btn-primary btn-action me-1" data-url="{{ route('transfer.edit',$transfer->id) }}" data-ajax-popup="true" data-title="{{__('Edit Amount Transfer')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete transfer')
                                                                        <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('transfer.destroy', $transfer->id) }}">
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

