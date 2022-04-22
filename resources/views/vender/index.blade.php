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
            const detail = document.querySelector('#vender-detail'),
                content  = detail.querySelector('#detail');
            detail.classList.remove('d-none');
            detail.classList.add('d-block');

            var id = $(this).data('id');
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                cache: false,
                success: function (data) {
                    content.innerHTML = data;
                    detail.scrollIntoView();
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
                let showURL = "{{route('vender.show',':id')}}";
                showURL     = showURL.replace(':id', data.id);
                return `
                    <tr class="font-style cust_tr" id="vend_detail" data-url="${showURL}" data-id="${data.id}">
                        <td><a href="#" class="btn btn-outline-primary">${data.vender_number}</a></td>
                        <td>${data.name}</td>
                        <td>${data.contact}</td>
                        <td>${data.email}</td>
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
                    <h4 class="col-12 col-md-6 fw-normal">{{__('Manage Vendor')}}</h4>
                    <div class="col-12 col-md-6 row justify-content-end">
                        @can('create vender')
                            <div class="col-auto">
                                <a href="#" data-size="2xl" data-url="{{ route('vender.create') }}" data-ajax-popup="true" data-title="{{__('Create New Vendor')}}" class="btn btn-icon icon-left btn-primary commonModal">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div id="pagination-limit" class="col-auto"></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('vender.get') }}">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th> {{__('Name')}}</th>
                                            <th> {{__('Contact')}}</th>
                                            <th> {{__('Email')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="pagination-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card d-none" id="vender-detail">
                    <div class="card-body" id="detail"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
