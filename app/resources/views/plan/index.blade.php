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
                <div class="d-flex justify-content-between w-100 crd mb-3">
                    <h4 class="fw-normal">{{__('Manage Plan')}}</h4>
                    @can('create plan')
                        <a href="#" data-url="{{ route('plans.create') }}" data-ajax-popup="true" data-title="{{__('Create New Plan')}}" class="btn btn-icon icon-left btn-primary btn-round">
                            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                            <span class="btn-inner--text"> {{__('Create')}}</span>
                        </a>
                    @endcan
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row plan-div">
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
                                            @can('edit plan')
                                                <a title="Edit Plan" href="#" class="view-btn" data-url="{{ route('plans.edit',$plan->id) }}" data-ajax-popup="true" data-title="{{__('Edit Plan')}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="far fa-edit"></i></a>
                                            @endcan
                                            @can('delete plan')
                                            <a href="#!" class="btn btn-danger btn-action" data-is-delete data-delete-url="{{ route('plans.destroy', $plan->id) }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @endcan    
                                            @can('buy plan')
                                                @if($plan->id != \Auth::user()->plan)
                                                    @if($plan->price > 0)
                                                        <a title="Buy Plan" class="view-btn" href="{{route('purchase',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"><i class="fa fa-cart-plus"></i></a>
                                                    @else
                                                        <a class="view-btn">{{__('Free')}}</a>
                                                    @endif
                                                @endif
                                            @endcan
                                            @if(Auth::user()->type=='company' && Auth::user()->plan == $plan->id)
                                                <div class="text-center">
                                                    <a class="view-success-btn">
                                                        {{__('Active')}}
                                                    </a>
                                                </div>
                                                <div class="col-md-12 text-left">
                                                    <p>{{__('Expired : '.Auth::user()->dateFormat(Auth::user()->plan_expire_date))}}</p>
                                                </div>
                                            @endif
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
