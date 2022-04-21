@extends('layouts.admin')
@php
    $profile=asset(Storage::url('avatar/'));
@endphp

@push('script-page')
    <script>
        SelectricChangeCallbacks.push((event) => {
            if(event.target.name == 'discount_type'){
                const unit = ['%', '{{ Auth::user()->currencySymbol() }}'];
                document.querySelector('.discount-unit').innerHTML = unit[event.target.value];
            }
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
                const discount      = data.type == 1 ? pagination.priceFormat(data.discount) : pagination.numberFormat(data.discount) + '%',
                    max_discount    = pagination.priceFormat(data.max_discount);
                
                let editURL = "{{ route('customer-category.edit', [':id']) }}";
                editURL     = editURL.replace(':id', data.id);
            
                let deleteURL = "{{ route('customer-category.destroy', [':id']) }}";
                deleteURL     = deleteURL.replace(':id', data.id);
                return `
                    <tr class="font-style">
                        <td>${data.name}</td>
                        <td>${discount}</td>
                        <td>${max_discount}</td>
                        <td class="action">
                            <a href="#!" class="btn btn-primary btn-action me-1" data-url="${editURL}" data-ajax-popup="true" data-title="{{__("Edit Customer Category")}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="${deleteURL}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
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
    {{__('Customer Category')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Customer Category')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item active"><a href="{{route('customer.index')}}">{{__('Customer')}}</a></div>
                <div class="breadcrumb-item">{{__('Category')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row mb-3 crd">
                    <h4 class="fw-normal col-6">{{__('Manage Customer Category')}}</h4>
                    <div class="col-6 text-end row justify-content-end">
                    {{-- @can('create customer') --}}
                        <div class="col-auto">
                            <a href="#" data-url="{{ route('customer-category.create') }}" data-ajax-popup="true" data-title="{{__('Create New Customer Category')}}" class="btn btn-icon icon-left btn-primary">
                                <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                <span class="btn-inner--text"> {{__('Create')}}</span>
                            </a>
                        </div>
                    {{-- @endcan --}}
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
                                    <table class="table table-flush dataTable no-paginate" data-pagination-table data-pagination-url="{{ route('customer-category.get') }}">
                                        <thead class="thead-light">
                                        <tr>
                                            <th> {{__('Name')}}</th>
                                            <th> {{__('Discount')}}</th>
                                            <th> {{__('Maximum Discount')}}</th>
                                            <th> {{__('Action')}}</th>
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
            </div>
        </div>
    </section>
@endsection
