@extends('layouts.admin')
@section('page-title')
    {{__('Invoice Detail')}}
@endsection
@push('script-page')
    <script>
        $(document).on('click', '#shipping', function () {
            var url = $(this).data('url');
            var is_display = $("#shipping").is(":checked");
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    'is_display': is_display,
                },
                success: function (data) {
                    // console.log(data);
                }
            });
        })
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Invoice')}}</h1>
            <div class="section-header-breadcrumb">
                @if(\Auth::guard('customer')->check())
                    <div class="breadcrumb-item active"><a href="{{route('customer.dashboard')}}">{{__('Dashboard')}}</a></div>
                    <div class="breadcrumb-item"><a href="{{route('customer.invoice')}}">{{__('Invoice')}}</a></div>
                @else
                    <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                    <div class="breadcrumb-item"><a href="{{route('invoice.index')}}">{{__('Invoice')}}</a></div>
                @endif
                <div class="breadcrumb-item">{{\Auth::user()->invoiceNumberFormat($invoice->invoice_id)}}</div>
            </div>
        </div>
        @can('send invoice')
            <div class="row">
                <div class="col-12">
                    <act-box>
                        <act-item
                            icon="plus"
                            icon-type="solid"
                            title="{{ __('Invoice Created') }}"
                            details="{{ __('Created on ') }}:"
                            details-highlight="{{Helper::DateFormat($invoice->issue_date)}}"
                            @if ($invoice->status < 2)
                                @can('edit invoice')
                                    action-text="{{ __('Edit') }}"
                                    action-url="{{ route('invoice.edit',$invoice->id) }}"
                                @endcan
                            @endif></act-item>
                        <act-item
                            icon="envelope"
                            icon-type="solid"
                            title="{{ __('Invoice Delivery') }}"
                            details="{{ __('Status') }}:"
                            @if($invoice->status)
                                details-highlight="{{ __('Sent on') }} {{ Helper::DateFormat($invoice->send_date) }}"
                            @else
                                details-highlight="{{ __('Not Sent') }}"
                                action-text="{{ __('Mark Sent') }}"
                                action-url="{{ route('invoice.sent',$invoice->id) }}"
                            @endif
                        ></act-item>
                        @if (empty($invoice->type))
                            @if($invoice->status)
                                <act-item
                                    icon="money-bill-alt"
                                    icon-type="regular"
                                    title="{{ __('Payment') }}"
                                    @if($invoice->status < 4)
                                        @can('create payment invoice')
                                            action-modal="true"
                                            action-modal-title="{{ __('Add Payment') }}"
                                            action-url="{{ route('invoice.payment',$invoice->id) }}"
                                            action-text="{{ __('Add Payment') }}"
                                        @endcan
                                        details="{{ __('Status') }}:"
                                        details-highlight="{{ __('Awaiting payment') }}"
                                    @else
                                        details="{{ __('Paid on') }}:"
                                        details-highlight="{{ Helper::DateFormat($invoice->payments->last()->created_at) }}"
                                    @endif
                                ></act-item>
                            @endif
                        @elseif($invoice->type == 1) 
                            @if ($invoice->status >= 1)
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary"><h6>{{__('Pickup')}}</h6></span>
                                        </div>
                                        @if($invoice->status < 2)
                                            {{ Form::open(['method' => 'PUT', 'route' => ['invoice.picked-up', $invoice->id]]) }}
                                                <button class="btn btn-primary btn-action me-1 float-right">
                                                    {{ __('Picked Up') }}
                                                </button>
                                            {{ Form::close() }}
                                        @endif
                                        @if ($invoice->status < 2)
                                            <p>{{__('Status')}} : <a href="#">{{ __($invoice->getStatus()) }} </a></p>
                                        @else 
                                            <p>{{__('Picked up on')}} : <a href="#">{{ Helper::DateFormat($invoice->pickup_time) }} </a></p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($invoice->status >= 2)
                                <act-item
                                    icon="money-bill-alt"
                                    icon-type="regular"
                                    title="{{ __('Payment') }}"
                                    @if($invoice->status < 5)
                                        @can('create payment invoice')
                                            action-modal="true"
                                            action-modal-title="{{ __('Add Payment') }}"
                                            action-url="{{ route('invoice.payment',$invoice->id) }}"
                                            action-text="{{ __('Add Payment') }}"
                                        @endcan
                                        details="{{ __('Status') }}:"
                                        details-highlight="{{ __('Awaiting payment') }}"
                                    @else
                                        details="{{ __('Paid on') }}:"
                                        details-highlight="{{ Helper::DateFormat($invoice->payments->last()->created_at) }}"
                                    @endif
                                ></act-item>
                            @endif
                        @elseif($invoice->type == 2)
                            @if ($invoice->status >= 1)
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary"><h6>{{__('Preparing')}}</h6></span>
                                        </div>
                                        @if($invoice->status < 2)
                                            {{ Form::open(['method' => 'PUT', 'route' => ['invoice.prepared', $invoice->id]]) }}
                                                <button class="btn btn-primary btn-action me-1 float-right">
                                                    {{ __('Prepared') }}
                                                </button>
                                            {{ Form::close() }}
                                        @endif
                                        @if ($invoice->status < 3)
                                            <p>{{__('Status')}} : <a href="#">{{ $invoice->getStatus() }} </a></p>
                                        @else 
                                            <p>{{__('Status')}} : <a href="#">{{ __('Prepared') }} </a></p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($invoice->status >= 2)
                                <div class="activity">
                                    <div class="activity-icon bg-primary text-white shadow-primary">
                                        <i class="fa-solid fa-truck"></i>
                                    </div>
                                    <div class="activity-detail">
                                        <div class="mb-2">
                                            <span class="text-job text-primary"><h6>{{__('Delivery')}}</h6></span>
                                        </div>
                                        @if($invoice->status < 3)
                                            {{ Form::open(['method' => 'PUT', 'route' => ['invoice.delivering', $invoice->id]]) }}
                                                <button class="btn btn-primary btn-action me-1 float-right">
                                                    {{ __('Picked Up') }}
                                                </button>
                                            {{ Form::close() }}
                                        @elseif($invoice->status < 4)
                                            {{ Form::open(['method' => 'PUT', 'route' => ['invoice.delivered', $invoice->id]]) }}
                                                <button class="btn btn-primary btn-action me-1 float-right">
                                                    {{ __('Delivered') }}
                                                </button>
                                            {{ Form::close() }}
                                        @endif
                                        @if($invoice->status < 3)
                                            <p>{{__('Status')}} : <a href="#">{{ __('Waiting for courier') }} </a></p>
                                        @elseif($invoice->status < 4)
                                            <p>{{__('Status')}} : <a href="#">{{__('Delivering')}} </a></p>
                                            <p>{{__('Picked up at')}} : <a href="#">{{ Helper::DateFormat($invoice->pickup_time) }} </a></p>
                                        @else
                                            <p>{{__('Delivered at')}} : <a href="#">{{ Helper::DateFormat($invoice->delivery_time) }} </a></p>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($invoice->status >= 4)
                                <act-item
                                    icon="money-bill-alt"
                                    icon-type="regular"
                                    title="{{ __('Payment') }}"
                                    @if($invoice->status < 6)
                                        @can('create payment invoice')
                                            action-modal="true"
                                            action-modal-title="{{ __('Add Payment') }}"
                                            action-url="{{ route('invoice.payment',$invoice->id) }}"
                                            action-text="{{ __('Add Payment') }}"
                                        @endcan
                                        details="{{ __('Status') }}:"
                                        details-highlight="{{ __('Awaiting payment') }}"
                                    @else
                                        details="{{ __('Paid on') }}:"
                                        details-highlight="{{ Helper::DateFormat($invoice->payments->last()->created_at) }}"
                                    @endif
                                ></act-item>
                            @endif
                        @endif
                    </act-box>
                </div>
            </div>
        @endcan
        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    @if(\Auth::user()->type=='company')
                        @if($invoice->status!=0)
                            <div class="row mb-10">
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <div class="btn-group">
                                            <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-print"></i>
                                                <span>{{ __('Print') }}</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('invoice.pdf', Crypt::encrypt($invoice->id))}}" target="_blank">
                                                        {{__('Print')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('invoice.thermal', Crypt::encrypt($invoice->id))}}" target="_blank">
                                                        {{__('Thermal')}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-bars"></i>
                                                {{ __('Options') }}
                                            </button>
                                            <ul class="dropdown-menu">
                                                @if(!empty($invoicePayment))
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-url="{{ route('invoice.credit.note',$invoice->id) }}" data-ajax-popup="true" data-title="{{__('Add Credit Note')}}">
                                                            {{__('Add Credit Note')}}
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($invoice->status < count(\App\Models\Invoice::$statuses[strtolower($invoice->getType())]) - 1)
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('invoice.payment.reminder',$invoice->id) }}">
                                                            {{__('Payment Reminder')}}
                                                        </a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('invoice.sent',$invoice->id) }}">
                                                        {{__('Resend Invoice')}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="custom-control custom-checkbox shipping">
                                            <input class="custom-control-input" type="checkbox" name="shipping" id="shipping" value="{{$invoice->shipping_display}}" {{($invoice->shipping_display==1)?'checked':''}}   data-url="{{route('invoice.shipping.print',$invoice->id)}}">
                                            <label class="custom-control-label" for="shipping">{{__('Print shipping address in invoice ?')}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="row mb-10">
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <a href="#" data-url="{{route('customer.invoice.send',$invoice->id)}}" data-ajax-popup="true" data-title="{{__('Send Invoice')}}" class="btn btn-primary btn-action me-1 float-right">
                                        {{__('Send Mail')}}
                                    </a>
                                    <a href="{{ route('invoice.pdf', Crypt::encrypt($invoice->id))}}" target="_blank" class="btn btn-primary btn-action me-1 float-right">
                                        {{__('Print')}}
                                    </a>
                                    <a href="{{ route('invoice.thermal', Crypt::encrypt($invoice->id))}}" target="_blank" class="btn btn-primary btn-action me-1 float-right">
                                        {{__('Print Thermal')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>{{__('Invoice')}}</h2>
                                <div class="invoice-number">{{ AUth::user()->invoiceNumberFormat($invoice->invoice_id) }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address class="font-style">
                                        <strong>{{__('Billed To')}}:</strong><br>
                                        {{!empty($customer->billing_name)?$customer->billing_name:''}}<br>
                                        {{!empty($customer->billing_phone)?$customer->billing_phone:''}}<br>
                                        {{!empty($customer->billing_address)?$customer->billing_address:''}}<br>
                                        {{!empty($customer->billing_zip)?$customer->billing_zip:''}}<br>
                                        {{!empty($customer->billing_city)?$customer->billing_city:'' .', '}} {{!empty($customer->billing_state)?$customer->billing_state:'',', '}} {{!empty($customer->billing_country)?$customer->billing_country:''}}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <address>
                                        <strong>{{__('Shipped To')}}:</strong><br>
                                        {{!empty($customer->shipping_name)?$customer->shipping_name:''}}<br>
                                        {{!empty($customer->shipping_phone)?$customer->shipping_phone:''}}<br>
                                        {{!empty($customer->shipping_address)?$customer->shipping_address:''}}<br>
                                        {{!empty($customer->shipping_zip)?$customer->shipping_zip:''}}<br>
                                        {{!empty($customer->shipping_city)?$customer->shipping_city:'' . ', '}} {{!empty($customer->shipping_state)?$customer->shipping_state:'' .', '}},{{!empty($customer->shipping_country)?$customer->shipping_country:''}}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <address>
                                        <strong>{{__('Status')}}:</strong><br>
                                        @php
                                            $type = strtolower($invoice->getType());
                                        @endphp
                                        @if($invoice->status < count(\App\Models\Invoice::$statuses[$type]) - 1)
                                            <span class="badge badge-light">{{ $invoice->getStatus() }}</span>
                                        @else
                                            <span class="badge badge-primary">{{ $invoice->getStatus() }}</span>
                                        @endif
                                    </address>
                                </div>
                                <div class="col-md-4 text-md-center">
                                    <address>
                                        <strong>{{__('Issue Date')}} :</strong><br>
                                        {{\Helper::DateFormat($invoice->issue_date)}}<br><br>
                                    </address>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <address>
                                        <strong>{{__('Due Date')}} :</strong><br>
                                        {{\Helper::DateFormat($invoice->due_date)}}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">{{__('Product Summary')}}</div>
                            <p class="section-lead">{{__('All items here cannot be deleted.')}}</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>{{__('Product')}}</th>
                                        <th class="text-center">{{__('Quantity')}}</th>
                                        <th class="text-center">{{__('Tax')}} (%)</th>
                                        @if($invoice->discount_apply==1)
                                            <th class="text-center">{{__('Discount')}}</th>
                                        @endif
                                        <th class="text-end">{{__('Price')}}</th>
                                    </tr>
                                    @foreach($iteams as $key =>$item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{!empty($item->product)?$item->product->name:''}}</td>
                                            <td class="text-center">{{$item->quantity}}</td>
                                            <td class="text-center">{{$item->tax}}</td>
                                            @if($invoice->discount_apply==1)
                                                <td class="text-center">{{\Auth::user()->priceFormat($item->discount)}}</td>
                                            @endif
                                            <td class="text-end">{{\Auth::user()->priceFormat($item->price)}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-3">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{__('Tax')}}</div>
                                        <div class="invoice-detail-value">{{\Auth::user()->priceFormat($invoice->getTotalTax())}}</div>
                                    </div>
                                </div>
                                @if($invoice->discount_apply==1)
                                    <div class="col-lg-3 text-center">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">{{__('Discount')}}</div>
                                            <div class="invoice-detail-value">{{\Auth::user()->priceFormat($invoice->getTotalDiscount())}}</div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-3 text-center">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{__('Sub Total')}}</div>
                                        <div class="invoice-detail-value">{{\Auth::user()->priceFormat($invoice->getSubTotal())}}</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 text-end">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{__('Total')}}</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">{{\Auth::user()->priceFormat($invoice->getTotal())}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">

                                </div>
                                <div class="col-lg-4 text-end">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{__('Paid')}}</div>
                                        <div class="invoice-detail-value">{{\Auth::user()->priceFormat(($invoice->getTotal()-$invoice->getDue())-($invoice->invoiceTotalCreditNote()))}}</div>
                                    </div>

                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{__('Credit Note')}}</div>
                                        <div class="invoice-detail-value">{{\Auth::user()->priceFormat(($invoice->invoiceTotalCreditNote()))}}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">{{__('Due')}}</div>
                                        <div class="invoice-detail-value">{{\Auth::user()->priceFormat($invoice->getDue())}}</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">{{__('Payment Summary')}}</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th>{{__('Date')}}</th>
                                        <th class="text-center">{{__('Amount')}}</th>
                                        <th class="text-center">{{__('Account')}}</th>
                                        <th class="text-center">{{__('Payment')}}</th>
                                        <th class="text-center">{{__('Reference')}}</th>
                                        <th class="text-center">{{__('Description')}}</th>
                                        @can('delete payment invoice')
                                            <th class="text-end">{{__('Action')}}</th>
                                        @endcan
                                    </tr>
                                    @foreach($invoice->payments as $key =>$payment)
                                        <tr>
                                            <td>{{\Helper::DateFormat($payment->date)}}</td>
                                            <td class="text-center">{{\Auth::user()->priceFormat($payment->amount)}}</td>
                                            <td class="text-center">{{!empty($payment->bankAccount)?$payment->bankAccount->bank_name.' '.$payment->bankAccount->holder_name:''}}</td>
                                            <td class="text-center">{{!empty($payment->paymentMethod)?$payment->paymentMethod->name:''}}</td>
                                            <td class="text-center">{{$payment->reference}}</td>
                                            <td class="text-center">{{$payment->description}}</td>
                                            <td class="text-end">
                                                @can('delete invoice product')
                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('invoice.payment.destroy',[$invoice->id, $payment->id]) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">{{__('Credit Note Summary')}}</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th>{{__('Date')}}</th>
                                        <th class="text-center">{{__('Amount')}}</th>
                                        <th class="text-center">{{__('Description')}}</th>
                                        @if(Gate::check('edit credit note') || Gate::check('delete credit note'))
                                            <th class="text-end">{{__('Action')}}</th>
                                        @endif
                                    </tr>
                                    @foreach($invoice->creditNote as $key =>$creditNote)
                                        <tr>
                                            <td>{{\Helper::DateFormat($creditNote->date)}}</td>
                                            <td class="text-center">{{\Auth::user()->priceFormat($creditNote->amount)}}</td>
                                            <td class="text-center">{{$creditNote->description}}</td>
                                            <td class="text-end">
                                                @can('edit credit note')
                                                    <a data-url="{{ route('invoice.edit.credit.note',[$creditNote->invoice,$creditNote->id]) }}" data-ajax-popup="true" data-title="{{__('Add Credit Note')}}" data-bs-toggle="tooltip" data-original-title="{{__('Credit Note')}}" href="#" class="btn btn-primary btn-action me-1" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endcan
                                                @can('delete credit note')
                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('invoice.destroy.credit.note',[$creditNote->invoice, $creditNote->id]) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
