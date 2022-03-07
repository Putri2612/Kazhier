@extends('layouts.admin')
@section('page-title')
    {{__('Bank Account')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Bank Account')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Account Detail')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Account')}}</h4>
                        <div class="col-6 text-end">
                            @can('create bank account')
                                <a href="#" data-url="{{ route('bank-account.create') }}" data-ajax-popup="true" data-title="{{__('Create New Account')}}" class="btn btn-icon icon-left btn-primary btn-round">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            @endcan
                        </div>
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

                                                        <th> {{__('Name')}}</th>
                                                        <th> {{__('Bank')}}</th>
                                                        <th> {{__('Account Number')}}</th>
                                                        <th> {{__('Current Balance')}}</th>
                                                        <th> {{__('Contact Number')}}</th>
                                                        <th> {{__('Bank Branch')}}</th>
                                                        @if(Gate::check('edit bank account') || Gate::check('delete bank account'))
                                                            <th class="text-end"> {{__('Action')}}</th>
                                                        @endif
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    @foreach ($accounts as $account)
                                                        <tr class="font-style">
                                                            <td>{{  $account->holder_name}}</td>
                                                            <td>{{  $account->bank_name}}</td>
                                                            <td>{{  $account->account_number}}</td>
                                                            <td>{{  Auth::user()->priceFormat($account->CurrentBalance())}}</td>
                                                            <td>{{  $account->contact_number}}</td>
                                                            <td>{{  $account->bank_address}}</td>

                                                            @if(Gate::check('edit bank account') || Gate::check('delete bank account'))
                                                                <td class="action text-end">
                                                                    @can('edit bank account')
                                                                        <a href="#!" class="btn btn-primary btn-action me-1" data-url="{{ route('bank-account.edit',$account->id) }}" data-ajax-popup="true" data-title="{{__('Edit Bank Detail')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>
                                                                    @endcan
                                                                    @can('delete bank account')
                                                                        <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('bank-account.destroy', $account->id) }}">
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
