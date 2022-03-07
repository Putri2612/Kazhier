@extends('layouts.admin')
@push('script-page')
@endpush
@php
    $dir= asset(Storage::url('plan'));
@endphp
@section('page-title')
    {{__('Plan')}}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Plan')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('Plan')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row crd mb-3">
                    <h4 class="col-6 fw-normal">{{__('Manage Plan')}}</h4>
                    <div class="col-6 text-end row justify-content-end">
                        @can('create plan')
                            <div class="col-auto">
                                <a href="#" data-url="{{ route('plans.create') }}" data-ajax-popup="true" data-title="{{__('Create New Plan')}}" class="btn btn-icon icon-left btn-primary">
                                    <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                                    <span class="btn-inner--text"> {{__('Create')}}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row plan-div">
                            @foreach($plans as $plan)
                                <div class="col-md-6 col-xxl-4 position-relative">
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
                                        <p class="font-style">{{ Auth::user()->planDurationFormat($plan->duration) }}</p>
                                        @if(Auth::user()->type=='company' && Auth::user()->plan == $plan->id)
                                            <div class="position-absolute top-0 start-0 ms-1 mt-5">
                                                <div class="badge bg-light py-1 px-1">
                                                    <span class="badge bg-success" disabled>
                                                        {{__('Active')}}
                                                    </span>
                                                    <span class="text-dark pe-3">{{__('Expire : ').Auth::user()->dateFormat(Auth::user()->plan_expire_date)}}</span>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="text-center mb-3">
                                            @can('edit plan')
                                                <a title="Edit Plan" href="#" class="btn btn-warning btn-action" data-url="{{ route('plans.edit',$plan->id) }}" data-ajax-popup="true" data-title="{{__('Edit Plan')}}" data-bs-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('delete plan')
                                            <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('plans.destroy', $plan->id) }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan    
                                            @can('buy plan')
                                                @if($plan->id)
                                                    @if($plan->price > 0)
                                                        @php
                                                            if($plan->id == Auth::user()->plan) {
                                                                $title  = __('Extend Plan');
                                                                $desc   = __('Extend');
                                                            } else {
                                                                $title  = __('Buy Plan');
                                                                $desc   = __('Purchase');
                                                            }
                                                        @endphp
                                                        <a title="{{$title}}" class="btn btn-primary stretched-link" href="{{route('purchase',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}">
                                                            <span><i class="fa fa-cart-plus"></i></span>
                                                            <span>{{ $desc }}</span>
                                                        </a>
                                                    @else
                                                        <button class="btn btn-primary" disabled>{{__('Free')}}</button>
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
                                                <p>{!!Auth::user()->planFeatureNumberFormat($plan->max_users)!!} {{__('Users')}}</p>
                                            </li>
                                            <li>
                                                <i class="fas fa-user-plus"></i>
                                                <p>{!!Auth::user()->planFeatureNumberFormat($plan->max_bank_accounts)!!} {{__('Bank Accounts')}}</p>
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
