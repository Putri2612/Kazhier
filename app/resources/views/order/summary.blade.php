@extends('layouts.admin')
@php
    $dir= asset(Storage::url('plan'));
       $dir_payment= asset(Storage::url('payments'));
@endphp
@section('page-title')
    {{__('Order Summary')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Order Summary')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('plans.index') }}">{{__('Plan')}}</a></div>
                <div class="breadcrumb-item">{{__('Order Summary')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between w-100">
                            <h4>{{__('Manage Plan')}}</h4>
                            @can('create plan')
                                <a href="#" class="btn btn-sm btn-warning" data-url="{{ route('plans.create') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Create New Plan')}}">
                                  <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.861 49.861"><path d="M45.963 21.035h-17.14V3.896C28.824 1.745 27.08 0 24.928 0s-3.896 1.744-3.896 3.896v17.14H3.895C1.744 21.035 0 22.78 0 24.93s1.743 3.895 3.895 3.895h17.14v17.14c0 2.15 1.744 3.896 3.896 3.896s3.896-1.744 3.896-3.896v-17.14h17.14c2.152 0 3.896-1.744 3.896-3.895a3.9 3.9 0 0 0-3.898-3.896z" fill="#010002"/></svg>
                                  </span>
                                    {{__('Create')}}
                                </a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row plan-div">
                            <div class="col-md-4">
                                <div class="plan-item">
                                    <h4 class="font-style"> {{$plan->name}}</h4>
                                    <div class="img-wrap">
                                        @if(!empty($plan->image))
                                            <img class="plan-img" src="{{$dir.'/'.$plan->image}}">
                                        @endif
                                    </div>
                                    <h3>
                                        {{isset(\Auth::user()->planPrice()['stripe_currency_symbol'])?\Auth::user()->planPrice()['stripe_currency_symbol'].$plan->price:''}}
                                    </h3>
                                    <div class="text-center">

                                    </div>
                                    <p class="font-style">{{$plan->duration}}</p>
                                    
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="h3 mb-0">{{__('Proceed to Payment')}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ Form::open(array('route' => array('order.pay'),'method'=>'post', 'target' => '_blank')) }}
                                        <div class="row">
                                            <ul class="col-12">
                                                <li style='list-style-type: none'>
                                                    <i class="fas fa-user-tie"></i>
                                                    <p>{{$plan->max_users}} {{__('Users')}}</p>
                                                </li>
                                                {{-- <li style='list-style-type: none'>
                                                    <i class="fas fa-user-plus"></i>
                                                    <p>{{$plan->max_customers}} {{__('Customers')}}</p>
                                                </li>
                                                <li style='list-style-type: none'>
                                                    <i class="fas fa-user-plus"></i>
                                                    <p>{{$plan->max_venders}} {{__('Venders')}}</p>
                                                </li> --}}
                                                <li style='list-style-type: none'>
                                                    <i class="fas fa-user-plus"></i>
                                                    <p>{{$plan->max_bank_accounts}} {{__('Bank Accounts')}}</p>
                                                </li>
                                            </ul>
                                            <input type="hidden" name="plan" value="{{\Illuminate\Support\Facades\Crypt::encrypt($plan->id)}}">
                                            <div class="form-group col-md-6">
                                                {{Form::label('coupon',__('Coupon Code'))}}
                                                {{Form::text('coupon',null,array('class'=>'form-control text-uppercase','Placeholder'=>__('Enter Coupon Code ')))}}
                                            </div>

                                            <div class="col-md-12 text-right">
                                                {{Form::submit(__('Pay Now'),array('class'=>'btn btn-primary'))}}
                                            </div>
                                        </div>
                                        {{ Form::close() }}
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
