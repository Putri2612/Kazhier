<div class="row">
    <div class="col-12">
        <div class="mb-5">
            {{__('Referral Points')}}: <span class="text-primary">{{ $point }}</span>
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
                <p class="lead">{{ __('Cash Out') }}</p>
                <div class="mt-2">{{ __('Transfer points you\'ve earned to your bank account') }}</div>
                <div class="font-weight-bold">{{ __('(Only available for :PlanName plan)', ['PlanName' => $expensive]) }}</div>
            </div>
            <div>
                <div class="btn btn-primary btn-cash-out{{ !empty($plans)? ' disabled' : '' }}" can-navigate data-navigate-from="#options" data-navigate-to="#upgrade">
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
                    @if(!empty($plan->image))
                        <img class="plan-img" src="{{$dir.'/'.$plan->image}}">
                    @endif
                </div>
                @php
                    $price          = $plan->price / 1000;
                    $pointEnough    = $point >= $price;
                @endphp
                <h3 {!! !$pointEnough ? 'class="text-danger"' : '' !!}>
                    {{ $price.' '.__('Points') }}
                </h3>
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