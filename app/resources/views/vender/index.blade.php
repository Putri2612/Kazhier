@extends('layouts.admin')
@php
    $profile=asset(Storage::url('avatar/'));
@endphp
@push('script-page')
    <script>

        $(document).on('click', '#billing_data', function () {
            $("[name='shipping_name']").val($("[name='billing_name']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_phone']").val($("[name='billing_phone']").val());
            $("[name='shipping_zip']").val($("[name='billing_zip']").val());
            $("[name='shipping_address']").val($("[name='billing_address']").val());
        })
        $(document).on('click', '#vend_detail', function () {
            $('#cust_table').addClass('col-6').removeClass('col-12')
            $('#customer_details').removeClass('d-none');
            $('#customer_details').addClass('d-block');
            var id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function (data) {
                    $('#customer_details').html(data);
                },

            });
        });

        $(document).ready(function () {
            $('.commonModal').click(function () {
                $('#commonModal').modal({
                    backdrop: 'static'
                });
            });
        });
    </script>
@endpush
@section('page-title')
    {{__('Vendor')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Vendor')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Vendor')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row crd mb-3">
                    <h4 class="col-6 font-weight-normal">{{__('Manage Vendor')}}</h4>
                    <div class="col-6 text-right">
                        @can('create vender')
                            <a href="#" data-size="2xl" data-url="{{ route('vender.create') }}" data-ajax-popup="true" data-title="{{__('Create New Vendor')}}" class="btn btn-icon icon-left btn-primary btn-round commonModal">
                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                <span class="btn-inner--text"> {{__('Create')}}</span>
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" id="cust_table">
                                <table class="table table-flush" id="dataTable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th> {{__('Name')}}</th>
                                        <th> {{__('Contact')}}</th>
                                        <th> {{__('Email')}}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($venders as $k=>$Vender)
                                        <tr class="cust_tr" id="vend_detail" data-url="{{route('vender.show',$Vender['id'])}}" data-id="{{$Vender['id']}}">
                                            <td><a href="#" class="btn btn-outline-primary"> {{ AUth::user()->venderNumberFormat($Vender['vender_id']) }}</a></td>
                                            <td>{{$Vender['name']}}</td>
                                            <td>{{$Vender['contact']}}</td>
                                            <td>{{$Vender['email']}}</td>
                                            <td>
                                                @if($Vender['is_active']==0)
                                                    <i class="fa fa-lock" title="Inactive"></i>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 d-none" id="customer_details">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
