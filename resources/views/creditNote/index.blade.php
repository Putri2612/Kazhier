@extends('layouts.admin')
@section('page-title')
    {{__('Credit Note')}}
@endsection
@push('script-page')
    <script>
        $(document).on('change', '#invoice', function () {
            var id = $(this).val();

            $.ajax({
                url: "{{route('get.invoice.credit.note')}}",
                type: 'get',
                cache: false,
                data: {
                    'id': id,
                },
                success: function (data) {
                    $('#amount').val(data)
                },
            });
        });

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
                const date      = pagination.dateFormat(data.date),
                    customer    = data.customer ? data.customer.name : '',
                    amount      = pagination.priceFormat(data.amount),
                    statusColor = data.status == '{{ __('Paid') }}' ? 'primary' : 'light';

                let showURL = '#';

                @can('show invoice')
                    showURL = "{{ route('invoice.index') }}";
                    showURL += `/${data.invoice}`;
                @endcan
                
                @can('edit credit note')
                    let editURL = "{{ route('invoice.edit.credit.note', [':iid', ':cid']) }}";
                        editURL = editURL.replace(':iid', data.invoice);
                        editURL = editURL.replace(':cid', data.id);
                @endcan
                @can('delete invoice')
                    let deleteURL = "{{ route('invoice.destroy.credit.note', [':iid', ':cid']) }}";
                        deleteURL = deleteURL.replace(':iid', data.invoice);
                        deleteURL = deleteURL.replace(':cid', data.id);
                @endcan
                return `
                    <tr class="font-style">
                        <td>
                            <a href="${showURL}" class="btn btn-outline-primary">
                                ${data.invoice_number}
                            </a>
                        </td>
                        <td>${customer}</td>
                        <td>${date}</td>
                        <td>${amount}</td>
                        <td>${data.description}</td>
                        
                        @if (Gate::check('edit credit note') || Gate::check('delete credit note'))
                            <td class="action text-end">
                                @can('edit credit note')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__('Edit Credit Note')}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete credit note')
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
            <h1>{{__('Credit Note')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Credit Note')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Credit Note')}}</h4>
                        @can('create credit note')
                        <div class="col-6 text-end">
                            <a href="#" data-url="{{ route('invoice.custom.credit.note') }}" data-ajax-popup="true" data-title="{{__('Create New Credit Note')}}" class="btn btn-icon icon-left btn-primary">
                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                <span class="btn-inner--text"> {{__('Create')}}</span>
                            </a>
                        </div>
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
                                                <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('credit.note.get') }}">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th> {{__('Invoice')}}</th>
                                                        <th> {{__('Customer')}}</th>
                                                        <th> {{__('Date')}}</th>
                                                        <th> {{__('Amount')}}</th>
                                                        <th> {{__('Description')}}</th>
                                                        <th class="text-end"> {{__('Action')}}</th>
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
