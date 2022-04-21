@extends('layouts.admin')
@section('page-title')
    {{__('Bill')}}
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
                const bill_date = pagination.dateFormat(data.bill_date),
                    due_date    = pagination.dateFormat(data.due_date),
                    customer    = data.customer ? data.customer.name : '',
                    category    = data.category ? data.category.name : '',
                    statusColor = data.status == '{{ __('Paid') }}' ? 'primary' : 'light';

                let showURL = '#';

                @can('show bill')
                    showURL = "{{ route('bill.index') }}";
                    showURL += `/${data.id}`;
                @endcan
                
                @can('edit bill')
                    let editURL = "{{ route('bill.edit', ':id') }}";
                        editURL = editURL.replace(':id', data.id);
                @endcan
                @can('delete bill')
                    let deleteURL = "{{ route('bill.destroy', ':id') }}";
                        deleteURL = deleteURL.replace(':id', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>
                            <a href="${showURL}" class="btn btn-outline-primary">
                                ${data.bill_number}
                            </a>
                        </td>
                        <td>${customer}</td>
                        <td>${category}</td>
                        <td>${bill_date}</td>
                        <td>${due_date}</td>
                        <td><span class="badge badge-${statusColor}">${data.status}</span></td>
                        @if(Gate::check('show bill') || Gate::check('edit bill') || Gate::check('delete bill'))
                            <td class="action text-end">
                                @can('show bill')
                                    <a href="${showURL}" class="btn btn-primary btn-action me-1">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                @endcan
                                @if (Gate::check('edit bill') || Gate::check('duplicate bill') || Gate::check('delete bill'))
                                    <div class="btn-group">
                                        <button class="btn btn-light" data-bs-toggle="dropdown" data-bs-auto-close="true">
                                            <i class="fa-solid fa-ellipsis fa-lg"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @can('edit bill')
                                                <li>
                                                    <a class="dropdown-item" href="${editURL}">
                                                        {{ __('Edit') }}
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('delete bill')
                                                <li>
                                                    <a href="#!" class="dropdown-item" data-is-delete data-delete-url="${deleteURL}">
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
            <h1>{{__('Bill')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Bill')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row mb-3 crd">
                        <h4 class="col-6 fw-normal">{{__('Manage Bill')}}</h4>
                        <div class="col-6 row justify-content-end text-end">
                            @if (Auth::user()->type == 'company')
                            <div class="col-auto">
                                <a href="{{ route('bill.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary btn-round">
                                    <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                    <span class="btn-inner--text"> {{__('Export')}}</span>
                                </a>
                            </div>
                            @endif
                            @can('create bill')
                            <div class="col-auto">
                                <a href="{{ route('bill.create') }}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                @if(!Auth::guard('vender')->check())
                                    {{ Form::open(array('route' => array('bill.index'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5', 'id' => 'query-form')) }}
                                @else
                                    {{ Form::open(array('route' => array('vender.bill'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5', 'id' => 'query-form')) }}
                                @endif
                                <div class="form-group col-12 col-md-6 col-lg-auto">
                                    {{ Form::label('bill_date', __('Date')) }}
                                    {{ Form::text('bill_date', isset($_GET['bill_date'])?$_GET['bill_date']:null, array('class' => 'form-control datepicker-range')) }}
                                </div>
                                @if(!Auth::guard('vender')->check())
                                    <div class="form-group col-12 col-md-6 col-lg-2">
                                        {{ Form::label('vender', __('Vender')) }}
                                        {{ Form::select('vender',$vender,isset($_GET['vender'])?$_GET['vender']:'', array('class' => 'form-control font-style selectric')) }}
                                    </div>
                                @endif
                                <div class="form-group col-12 col-md-6 col-lg-2">
                                    {{ Form::label('status', __('Status')) }}
                                    {{ Form::select('status', [''=>__('All')] + $status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control font-style selectric')) }}
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-auto">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-round btn-primary"><i class="fas fa-search"></i></button>
                                        @if(!\Auth::guard('vender')->check())
                                            <a href="{{route('bill.index')}}" class="btn btn-round btn-danger"><i class="fas fa-trash"></i></a>
                                        @else
                                            <a href="{{route('vender.bill')}}" class="btn btn-round btn-danger"><i class="fas fa-trash"></i></a>
                                        @endif
                                    </div>
                                </div>
                                {{ Form::close() }}
                                <div id="table-1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div id="pagination-limit" class="col-auto"></div>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('bill.get') }}">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Bill')}}</th>
                                                        @if(!\Auth::guard('vender')->check())
                                                            <th> {{__('Vendor')}}</th>
                                                        @endif
                                                        <th> {{__('Category')}}</th>
                                                        <th> {{__('Bill Date')}}</th>
                                                        <th> {{__('Due Date')}}</th>
                                                        <th>{{__('Status')}}</th>
                                                        @if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill'))
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
