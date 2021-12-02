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
                            <h4>{{__('Plan')}}</h4>
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
                                        {{ $plan->price / 1000 . ' ' . __('Points')}}
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
                                        {{ Form::open(array('route' => array('referral.checkout.plan', [$orderID]),'method'=>'post')) }}
                                        <div class="row">
                                            <ul class="col-12">
                                                <li style='list-style-type: none'>
                                                    <i class="fas fa-user-tie"></i>
                                                    <p>{{$plan->max_users}} {{__('Users')}}</p>
                                                </li>
                                                <li style='list-style-type: none'>
                                                    <i class="fas fa-user-plus"></i>
                                                    <p>{{$plan->max_bank_accounts}} {{__('Bank Accounts')}}</p>
                                                </li>
                                            </ul>
                                            <input type="hidden" name="plan" value="{{\Illuminate\Support\Facades\Crypt::encrypt($plan->id)}}">
                                            
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
