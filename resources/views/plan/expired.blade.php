@extends('layouts.admin')
@php
    $logo   = asset(Storage::url('logo/'));
    $dir    = asset(Storage::url('plan'));
@endphp
@section('page-title')
    {{ __('Plan Expired') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Plan Expired')}}</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="display-4">{{ __('Thank You For Using :AppName!', ['AppName' => config('app.name', 'Kazhier')]) }}</h3>
                            <p>{{ __('Your plan has expired, please purchase new plan to continue using this software.') }} <br>
                                {{ __('You can download your data if you choose to use another software.') }}</p>
                            <div class="row pb-3">
                                <div class="col-4 d-grid p-2">
                                    <a href="{{ route('invoice.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary btn-round px-3">
                                        <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                        <span class="btn-inner--text"> {{__('Export Invoice')}}</span>
                                    </a>
                                </div>
                                <div class="col-4 d-grid p-2">
                                    <a href="{{ route('revenue.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary btn-round px-3">
                                        <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                        <span class="btn-inner--text"> {{__('Export Revenue')}}</span>
                                    </a>
                                </div>
                                <div class="col-4 d-grid p-2">
                                    <a href="{{ route('bill.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary btn-round px-3">
                                        <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                        <span class="btn-inner--text"> {{__('Export Bill')}}</span>
                                    </a>
                                </div>
                                <div class="col-6 d-grid p-2">
                                    <a href="{{ route('payment.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary btn-round px-3">
                                        <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                        <span class="btn-inner--text"> {{__('Export Payment')}}</span>
                                    </a>
                                </div>
                                <div class="col-6 d-grid p-2">
                                    <a href="{{ route('productservice.export') }}" target="_blank" class="btn btn-icon icon-left btn-primary btn-round px-3">
                                        <span class="btn-inner--icon"><i class="fas fa-file-excel"></i></span>
                                        <span class="btn-inner--text"> {{__('Export Product & Service')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row plan-div align-items-stretch justify-content-center">
                            @foreach($plans as $plan)
                                <div class="col-md-4">
                                    <div class="plan-item">
                                        <h4 class="font-style"> {{$plan->name}}</h4>
                                        <div class="img-wrap">
                                            @if(!empty($plan->image))
                                                <img class="plan-img" src="{{$dir.'/'.$plan->image}}">
                                            @endif
                                        </div>
                                        @if (Auth::user()->referral_redeemed || !Auth::user()->referred_by)
                                            <h3>
                                                {{Auth::user()->planPriceFormat($plan->price)}}
                                            </h3>
                                        @else
                                            @php
                                                $original = $plan->price;
                                                $discount = $original/10;
                                                if($discount > 50000){
                                                    $discount = 50000;
                                                }
                                                $discounted = $original - $discount;
                                            @endphp
                                            <h6 class="text-muted"><del>{{Auth::user()->planPriceFormat($original)}}</del></h6>
                                            <h3>
                                                {{Auth::user()->planPriceFormat($discounted)}}
                                            </h3>
                                        @endif
                                        <p class="font-style">{{$plan->duration}}</p>
                                        <div class="text-center">   
                                            @can('buy plan')
                                                @if($plan->id != \Auth::user()->plan)
                                                    @if($plan->price > 0)
                                                        <a title="Buy Plan" class="view-btn" href="{{route('purchase',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"><i class="fa fa-cart-plus mx-0"></i></a>
                                                    @else
                                                        <a class="view-btn">{{__('Free')}}</a>
                                                    @endif
                                                @endif
                                            @endcan
                                        </div>
                                        <div class="col-md-12 text-left">
                                            <p>{{$plan->description}}</p>
                                        </div>
                                        <ul>
                                            <li>
                                                <i class="fas fa-user-tie"></i>
                                                <p>{{$plan->max_users}} {{__('Users')}}</p>
                                            </li>
                                            <li>
                                                <i class="fas fa-user-plus"></i>
                                                <p>{{$plan->max_bank_accounts}} {{__('Bank Accounts')}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection