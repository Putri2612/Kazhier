@extends('layouts.admin')
@php
    $dir= asset(Storage::url('plan'));
    $dir_payment= asset(Storage::url('payments'));
@endphp

@push('script-page')
    <script>
        const original = {{ $plan->price }},
            isDiscounted = {{ !Auth::user()->referral_redeemed && Auth::user()->referred_by ? 1 : 0 }};
        
        const updatePrice = (duration) => {
            let price = { totalPrice : original * duration};
            if(isDiscounted){
                let discount = price.totalPrice / 10;
                discount = discount > 50000 ? 50000 : discount;
                price['discounted'] = price.totalPrice - discount;
            }
            return price;
        }

        document.querySelectorAll('[name="durations"]').forEach(element => {
            element.addEventListener('change', event => {
                const duration  = parseInt(event.currentTarget.value),
                    endPrice    = updatePrice(duration),
                    formatter   = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    })
                
                if(Object.hasOwnProperty.call(endPrice, 'discounted')) {
                    document.querySelector('.price').innerHTML = formatter.format(endPrice.discounted);
                    document.querySelector('.original-price').innerHTML = formatter.format(endPrice.totalPrice);
                } else {
                    document.querySelector('.price').innerHTML = formatter.format(endPrice.totalPrice);
                }
            });
        });
    </script>
@endpush

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
                                    @if (Auth::user()->referral_redeemed || !Auth::user()->referred_by)
                                        <h2 class="price">
                                            {{Auth::user()->planPriceFormat($plan->price)}}
                                        </h2>
                                    @else
                                        @php
                                            $original = $plan->price;
                                            $discount = $original/10;
                                            if($discount > 50000){
                                                $discount = 50000;
                                            }
                                            $discounted = $original - $discount;
                                        @endphp
                                        <h6 class="text-muted"><del class="original-price">{{Auth::user()->planPriceFormat($original)}}</del></h6>
                                        <h2 class="price">
                                            {{Auth::user()->planPriceFormat($discounted)}}
                                        </h2>
                                    @endif
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
                                        {{ Form::open(array('route' => array('order.pay'),'method'=>'post')) }}
                                        <div class="row">
                                            @php
                                                if($plan->duration == 'month'){
                                                    $durations = [
                                                        __('1 Month')   => 1,
                                                        __('6 Months')  => 6,
                                                        __('1 Year')    => 12
                                                    ];
                                                } else {
                                                    $durations = [
                                                        __('1 Year')    => 1,
                                                        __('2 Years')   => 2,
                                                        __('3 Years')   => 3,
                                                    ];
                                                }
                                            @endphp

                                            <div class="col-md-6 btn-group">
                                                @foreach ($durations as $label => $value)
                                                    <input type="radio" class="btn-check" name="durations" value="{{$value}}" id="dur{{$value}}" {{ $value == 1 ? 'checked' : ''}}/>
                                                    <label for="dur{{$value}}" class="btn btn-outline-primary">{{$label}}</label>
                                                @endforeach
                                            </div>

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
                                            <div class="form-group col-md-6">
                                                {{Form::label('coupon',__('Coupon Code'))}}
                                                {{Form::text('coupon',null,array('class'=>'form-control text-uppercase','Placeholder'=>__('Enter Coupon Code ')))}}
                                            </div>

                                            <div class="col-md-12 text-end">
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
