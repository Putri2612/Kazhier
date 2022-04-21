@extends('layouts.admin')

@section('page-title')
    {{__('Payment Method')}}
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
                @can('edit constant payment method')
                    let editURL = "{{ route('payment-method.edit', [':id']) }}";
                    editURL     = editURL.replace(':id', data.id);
                @endcan
                @can('delete constant payment method')
                    let deleteURL = "{{ route('payment-method.destroy', [':id']) }}";
                    deleteURL     = deleteURL.replace(':id', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>${data.name}</td>
                        @if(Gate::check('edit constant payment method') || Gate::check('delete constant payment method'))
                            <td class="action text-end">
                                @can('edit constant payment method')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__("Edit Payment Method")}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete constant payment method')
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
            <h1>{{__('Payment Method')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Payment Method')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between w-100 crd mb-3">
                        <h4 class="fw-normal">{{__('Manage Payment Method')}}</h4>
                        @can('create constant payment method')
                            <a href="#" data-url="{{ route('payment-method.create') }}" data-ajax-popup="true" data-title="{{__('Create New Payment Method')}}" class="btn btn-sm btn-primary btn-round">
                                <i class="fa fa-plus"></i> {{__('Create')}}
                            </a>
                        @endcan
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
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('payment-method.get') }}">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>{{__('Name')}}</th>
                                                        @if(Gate::check('edit constant payment method') || Gate::check('delete constant payment method'))
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
