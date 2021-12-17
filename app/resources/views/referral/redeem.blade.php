<div class="row">
    <div class="col-12">
        <div class="mb-5">
            {{__('Balance')}}: <span class="text-primary">{{ Auth::user()->priceFormat($point) }}</span>
        </div>
    </div>
</div>
<div class="row align-items-stretch text-center" id="options">
    <div class="col-6">
        <div class="d-flex flex-column justify-content-between h-100">
            <div class="mb-5 pb-4">
                <p class="lead">{{ __('Upgrade Your Plan') }}</p>
                <div class="mt-2">{{ __('Increase your productivity with better plan') }}</div>
            </div>
            <div>
                <div class="btn btn-primary btn-upgrade{{ empty($plans)? ' disabled' : '' }}" can-navigate data-navigate-from="#options" data-navigate-to="#upgrade">
                    {{ __('Upgrade Plan') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="d-flex flex-column justify-content-between h-100">
            <div>
                <p class="lead">{{ __('Withdraw') }}</p>
                <div class="mt-2">{{ __('Withdraw your referrals to your bank account') }}</div>
                <div class="fw-bold">{{ __('(Minimum balance: :amount)', ['amount' => Auth::user()->planPriceFormat(config('referral.minWithdrawal'))])}}</div>
            </div>
            <div>
                <div class="btn btn-primary btn-cash-out" can-navigate data-navigate-from="#options" data-navigate-to="#withdraw">
                    {{ __('Cash Out') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row plan-div" style="display: none" id="upgrade">
    @foreach($plans as $plan)
        <div class="col-md-6">
            <div class="plan-item">
                <h4 class="font-style"> {{$plan->name}}</h4>
                <div class="img-wrap">
                    @php
                        $dir= asset(Storage::url('plan'));
                    @endphp
                    @if(!empty($plan->image))
                        <img class="plan-img" src="{{$dir.'/'.$plan->image}}">
                    @endif
                </div>
                @php
                    $price          = $plan->price;
                    $pointEnough    = $point >= $price;
                @endphp
                <h2 {!! !$pointEnough ? 'class="text-danger"' : '' !!}>
                    {{ Auth::user()->planPriceFormat($price) }}
                </h2>
                <p class="font-style">{{$plan->duration}}</p>
                <div class="text-center mb-5">
                    @can('buy plan')
                        <a title="Buy Plan" class="btn btn-primary btn-round {!! !$pointEnough ? ' disabled' : '' !!}" 
                            href="{{route('referral.redeem.plan',\Illuminate\Support\Facades\Crypt::encrypt($plan->id))}}"
                            {!! !$pointEnough ? 'style="pointer-event:none"' : '' !!}
                            >
                            <i class="fa fa-cart-plus"></i>
                        </a>
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
<div class="row" style="display: none" id="withdraw">
    <div class="col-md-12">
        @php
            $now    = now();
            $date   = $now->day;
            $processingDate = config('referral.withdrawalDate');
            if($date > $processingDate) {
                $now->addMonth();
            }
            $now->day = $processingDate;
        @endphp
        <p class="lead">{{ __('Withdraw') }}</p>
        <div class="col-12 mb-3">{!! __('Our staff will process your request on <strong>:date</strong>', ['date' => Auth::user()->dateFormat($now)]) !!}</div>
        {{ Form::open(['route' => 'referral.withdraw.request', 'method' => 'POST', 'class' => 'row']) }}
        <div class="form-group col-md-6">
            {{ Form::label('amount', __('Amount')) }}
            {{ Form::text('amount', null, ['class' => 'form-control', 'data-is-number', 'required']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('account', __('Account Number')) }}
            {{ Form::text('account', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="col-md-12 text-end">
            {{ Form::submit(__('Withdraw'), ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
</div>