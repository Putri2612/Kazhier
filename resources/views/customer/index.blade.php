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
        $(document).on('click', '#cust_detail', function () {
            const detail = document.querySelector('#customer_details'),
                content = detail.querySelector('#content');
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
                const category = data.category ? data.category.name : "{{ __('General customer') }}";
                @can('edit constant unit')
                    let editURL = "{{ route('customer.edit', [':id']) }}";
                    editURL     = editURL.replace(':id', data.id);
                @endcan
                @can('delete constant unit')
                    let deleteURL = "{{ route('customer.destroy', [':id']) }}";
                    deleteURL     = deleteURL.replace(':id', data.id);
                @endcan
                let showURL = "{{route('customer.show',':id')}}";
                showURL     = showURL.replace(':id', data.id);
                return `
                    <tr class="font-style cust_tr" id="cust_detail" data-url="${showURL}" data-id="${data.id}">
                        <td><a href="#" class="btn btn-outline-primary">${data.customer_number}</a></td>
                        <td>${data.name}</td>
                        <td>${data.contact}</td>
                        <td>${data.email}</td>
                        <td>${category}</td>
                        @if(Gate::check('edit customer') || Gate::check('delete customer'))
                            <td class="action text-end">
                                @can('edit customer')
                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__("Edit Customer")}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @endcan
                                @can('delete customer')
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
@section('page-title')
    {{__('Customer')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Customer')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Customer')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row mb-3 crd">
                    <h4 class="fw-normal col-6">{{__('Manage Customer')}}</h4>
                    <div class="col-6 text-end row justify-content-end">
                        <div class="col-auto">
                            @can('create customer')
                                <a href="#" data-size="2xl" data-url="{{ route('customer.create') }}" data-ajax-popup="true" data-title="{{__('Create New Customer')}}" class="btn btn-icon icon-left btn-primary commonModal">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12" id="cust_table">
                                <div class="row">
                                    <div id="pagination-limit" class="col-auto"></div>
                                </div>
                                <div class="table-resposive">
                                    <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('customer.get') }}">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Contact')}}</th>
                                                <th>{{__('Email')}}</th>
                                                <th>{{ __('Category') }} </th>
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
                <div class="d-none card" id="customer_details">
                    <div class="card-body">
                        <div id="content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
