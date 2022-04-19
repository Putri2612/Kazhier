@extends('layouts.admin')
@section('page-title')
    {{__('Revenue')}}
@endsection
@push('script-page')
    <script>
        try {
            const pagination = new Pagination({
                locale: '{{ config('app.locale') }}',
                pageContainer: '#pagination-container',
                limitContainer: '#pagination-limit',
                additionalForm: '#query-form',
                navigation: {
                    previous: `<i class="fa-solid fa-chevron-left"></i>`,
                    next: `<i class="fa-solid fa-chevron-right"></i>`,
                    limit: '{{ __('Entries each page') }}'
                }
            });
            pagination.format = data => {
                const date = pagination.dateFormat(data.date),
                    amount = pagination.priceFormat(data.amount),
                    account = data.bankAccount ? `${data.bankAccount.bank_name} ${data.bankAccount.holder_name}` : '',
                    customer = data.customer ? data.customer.name : '',
                    category = data.category ? data.category.name : '',
                    paymentMethod = data.paymentMethod ? data.paymentMethod.name : '';
                
                @can('edit revenue')
                    let editURL = "{{ route('revenue.edit', ['revenue' => ':id']) }}";
                    editURL     = editURL.replace(':id', data.id);
                @endcan
                @can('delete revenue')
                    let deleteURL = "{{ route('revenue.destroy', ['revenue' => ':id']) }}";
                    deleteURL     = deleteURL.replace(':id', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>${date}</td>
                        <td>${amount}</td>
                        <td>${account}</td>
                        <td>${customer}</td>
                        <td>${category}</td>
                        <td>${paymentMethod}</td>
                        <td>
                            <a href="#!"
                                class="btn btn-light"
                                data-url="{{ route('revenue.index') }}/${data.id}"
                                data-ajax-popup="true"
                                title="{{ __('View Reference') }}">
                                <i class="fa-solid fa-paperclip"></i>
                            </a>
                        </td>
                        <td>${data.description}</td>
                        @if(Gate::check('edit revenue') || Gate::check('delete revenue'))
                            <td class="action text-end">
                                @can('edit revenue')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__('Edit Revenue')}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete revenue')
                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="${deleteURL}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endcan
                            </td>
                        @endif
                    </tr>
                `;
            }
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
                        <h4 class="col-12 col-md-6 fw-normal">{{__('Manage Revenue')}}</h4>
                        <div class="col-12 col-md-6 text-end row justify-content-end">                            
                            @can('create revenue')
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('revenue.create') }}" data-ajax-popup="true" data-title="{{__('Create New Revenue')}}" class="btn btn-icon icon-left btn-primary">
                                    <span><i class="fas fa-plus"></i></span>
                                    <span class="d-none d-md-inline">{{__('Create')}}</span>
                                </a>
                            </div>
                            @endcan
                            @if (Auth::user()->type == 'company')
                                <div class="col-auto">
                                    <div class="btn-group">
                                        <div class="btn btn-light" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis fa-lg"></i>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#" data-url="{{ route('revenue.import') }}" data-ajax-popup="true" data-title="{{__('Import Revenue')}}" class="dropdown-item">
                                                    {{__('Import')}}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('revenue.export') }}" class="dropdown-item">
                                                    {{__('Export')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body p-0">
                                {{ Form::open(array('route' => array('revenue.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5', 'id' => 'query-form')) }}
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
                                    <div class="row">
                                        <div id="pagination-limit" class="col-auto"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('revenue.get') }}">
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
