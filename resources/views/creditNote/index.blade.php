@extends('layouts.admin')
@section('page-title')
    {{__('Credit Note')}}
@endsection
@push('script-page')
    <script>
        $(document).on('change', '#invoice', function () {

            var id = $(this).val();
            var url = "{{route('invoice.get')}}";

            $.ajax({
                url: url,
                type: 'get',
                cache: false,
                data: {
                    'id': id,

                },
                success: function (data) {
                    $('#amount').val(data)
                },

            });

        })
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
                            <a href="#" data-url="{{ route('invoice.custom.credit.note') }}" data-ajax-popup="true" data-title="{{__('Create New Credit Note')}}" class="btn btn-icon icon-left btn-primary btn-round">
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
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-flush dataTable">
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
                                                    @foreach ($invoices as $invoice)

                                                        @if(!empty($invoice->creditNote))
                                                            @foreach ($invoice->creditNote as $creditNote)
                                                                <tr class="font-style">
                                                                    <td>
                                                                        <a class="btn btn-outline-primary" href="{{ route('invoice.show',$creditNote->invoice) }}">{{ AUth::user()->invoiceNumberFormat($invoice->invoice_id) }}
                                                                        </a>
                                                                    </td>
                                                                    <td>{{ (!empty($invoice->customer)?$invoice->customer->name:'') }}</td>
                                                                    <td>{{ Auth::user()->dateFormat($creditNote->date) }}</td>
                                                                    <td>{{ Auth::user()->priceFormat($creditNote->amount) }}</td>
                                                                    <td>{{$creditNote->description}}</td>
                                                                    <td class="text-end">
                                                                        @can('edit credit note')
                                                                            <a data-url="{{ route('invoice.edit.credit.note',[$creditNote->invoice,$creditNote->id]) }}" data-ajax-popup="true" data-title="{{__('Add Credit Note')}}" data-bs-toggle="tooltip" data-original-title="{{__('Credit Note')}}" href="#" class="btn btn-primary btn-action me-1" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                                                <i class="fas fa-pencil-alt"></i>
                                                                            </a>
                                                                        @endcan
                                                                        @can('edit credit note')
                                                                            <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('invoice.delete.credit.note', [$creditNote->invoice, $creditNote->id]) }}">
                                                                                <i class="fas fa-trash"></i>
                                                                            </a>
                                                                        @endcan
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
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