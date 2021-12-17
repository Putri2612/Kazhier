@extends('layouts.admin')
@php
    $dir= asset(Storage::url('plan'));
    $dir_payment= asset(Storage::url('payments'));
@endphp
@section('page-title')
    {{__('Order Summary')}}
@endsection

@push('script-page')
    <script>
        const original = {{ $plan->price }},
            balance = {{ $point }};
        
        const updatePrice = (duration) => {
            let price = original * duration;
            return price;
        }

        document.querySelectorAll('[name="durations"]').forEach(element => {
            element.addEventListener('change', event => {
                const duration  = parseInt(event.currentTarget.value),
                    endPrice    = updatePrice(duration),
                    formatter   = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                    }),
                    priceDisp   = document.querySelector('.price'),
                    form        = document.querySelector('[type="submit"]');

                priceDisp.innerHTML = formatter.format(endPrice);
                if(balance < endPrice) {
                    form.disabled = true;
                    priceDisp.classList.add('text-danger');
                } else {
                    form.disabled = false;
                    priceDisp.classList.remove('text-danger');
                }
            });
        });
    </script>
@endpush

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
                                    <h2 class="price">
                                        {{ Auth::user()->planPriceFormat($plan->price) }}
                                    </h2>
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
                                        {{ Form::open(array('route' => array('referral.checkout.plan'),'method'=>'post')) }}
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
