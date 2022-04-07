<div class="card mt-4">
    <div class="card-body">
        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
            @foreach($plans as $plan)
                <li class="media">
                    <img alt="" class="me-3 rounded-circle" width="50" src="{{asset(Storage::url('plan')).'/'.$plan->image}}">
                    <div class="media-body">
                        <div class="media-title font-style">{{$plan->name}}</div>
                        <div class="text-job text-muted"> {{Auth::user()->planPriceFormat($plan->price)}} /  {{ __($plan->duration)}}</div>
                    </div>
                    <div class="media-items">
                        <div class="media-item">
                            <div class="media-value">{!!Auth::user()->planFeatureNumberFormat($plan->max_users)!!}</div>
                            <div class="media-label">{{__('Users')}}</div>
                        </div>
                        <div class="media-item">
                            <div class="media-value">{!!Auth::user()->planFeatureNumberFormat($plan->max_bank_accounts)!!}</div>
                            <div class="media-label">{{__('Bank Accounts')}}</div>
                        </div>
                        <div class="media-item">
                            @php
                                if($plan->id == $user->plan) {
                                    $title  = __('Extend Plan');
                                    $desc   = __('Extend');
                                } else {
                                    $title  = __('Upgrade Plan');
                                    $desc   = __('Upgrade');
                                }
                            @endphp
                            <div class="media-value">
                                <a href="{{route('plan.active',[$user->id,$plan->id])}}" class="btn btn-primary" title="{{ $title }}">
                                    <i class="fas fa-cart-plus"></i>
                                    <span>{{ $desc }}</span>
                                </a>
                            </div>
                            <div class="media-label text-success"><h6></h6></div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
