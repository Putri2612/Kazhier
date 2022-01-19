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
                        <a href="#" data-url="{{ route('customer-category.create') }}" data-ajax-popup="true" data-title="{{__('Create New Customer Category')}}" class="btn btn-icon icon-left btn-primary commonModal btn-round">
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
                                <table class="table table-flush dataTable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th> {{__('Name')}}</th>
                                        <th> {{__('Discount')}}</th>
                                        <th> {{__('Maximum Discount')}}</th>
                                        <th> {{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                    @php
                                        $discount = $category->discount_type == 1 ? Auth::user()->priceFormat($category->discount) : number_format($category->discount, 2, ',', '.') . '%';
                                    @endphp
                                        <tr class="font-style">
                                            <td class="font-style">{{$category->name}}</td>
                                            <td>{{$discount}}</td>
                                            <td>{{Auth::user()->priceFormat($category->max_discount)}}</td>
                                            <td class="action text-end">
                                                {{-- @can('edit payment') --}}
                                                    <a href="#!" class="btn btn-primary btn-action me-1" data-url="{{ route('customer-category.edit',$category->id) }}" data-ajax-popup="true" data-title="{{__('Edit Customer Category')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                {{-- @endcan
                                                @can('delete payment') --}}
                                                    <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('customer-category.destroy', $category->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
