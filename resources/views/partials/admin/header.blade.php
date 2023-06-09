@php
    $users          = Auth::user();
    $profile        = asset(Storage::url('avatar/'));
    $currantLang    = $users->currentLanguage();
    $languages      = Utility::languages();
    $userPlan       = $users->currentPlan;
    if($userPlan) {
        $pricier    = \App\Models\Plan::where('price', '>', $userPlan->price)->count();
    }
@endphp
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container-fluid">

        <ul class="navbar-nav me-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    
        <ul class="navbar-nav navbar-end">
            @if ($users->can('manage plan') && $userPlan)
                <li>
                    <a href="{{ route('plans.index') }}" class="nav-link nav-link-lg">
                        @if ($pricier)
                            <span><i class="fa-solid fa-circle-up"></i></span>
                            <span class="d-none d-lg-inline"> {{__('Upgrade')}}</span>
                        @else
                            <span><i class="fa-solid fa-arrows-rotate"></i></span>
                            <span class="d-none d-lg-inline"> {{__('Extend')}}</span>
                        @endif
                    </a>
                </li>
            @endif
            @can('manage language')
                <li class="dropdown dropdown-list-toggle">
                    <a href="#" data-bs-toggle="dropdown" class="nav-link notification-toggle nav-link-lg language-dd">
                        <i class="fas fa-language"></i>
                    </a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-end">
                        <div class="dropdown-header">{{__('Choose Language')}}
                        </div>
                        @can('create language')
                            <a href="{{route('manage.language',[$currantLang])}}" class="dropdown-item btn manage-language-btn">
                                <span> {{ __('Create & Customize') }}</span>
                            </a>
                        @endcan
                        <div class="dropdown-list-content dropdown-list-icons">
                            @foreach($languages as $language)
                                @if(\Auth::guard('customer')->check())
                                    <a href="{{route('customer.change.language',$language)}}" class="dropdown-item dropdown-item-unread @if($language == $currantLang) active-language @endif">
                                        <span> {{Str::upper($language)}}</span>
                                    </a>
                                @elseif(\Auth::guard('vender')->check())
                                    <a href="{{route('vender.change.language',$language)}}" class="dropdown-item dropdown-item-unread @if($language == $currantLang) active-language @endif">
                                        <span> {{Str::upper($language)}}</span>
                                    </a>
                                @else
                                    <a href="{{route('change.language',$language)}}" class="dropdown-item dropdown-item-unread @if($language == $currantLang) active-language @endif">
                                        <span> {{Str::upper($language)}}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
            @endcan
            <li class="dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{(!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')}}" class="rounded-circle me-1">
                    <div class="d-none d-lg-inline-block">{{__('Hi')}}, {{\Auth::user()->name}}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-title">{{__('Welcome!')}}</div>
                    @if(\Auth::guard('customer')->check())
                        <a href="{{route('customer.profile')}}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> {{__('My profile')}}
                        </a>
                    @elseif(\Auth::guard('vender')->check())
                        <a href="{{route('vender.profile')}}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> {{__('My profile')}}
                        </a>
                    @else
                        <a href="{{route('profile')}}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> {{__('My profile')}}
                        </a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <form-btn
                        id="logout"
                        type="dropdown-item"
                        method="post"
                        text="{{ __('Logout') }}"
                        icon-type="solid"
                        icon="sign-out-alt"
                        class="text-danger"
                        @if (Auth::guard('customer')->check())
                            url="{{ route('customer.logout') }}"
                        @else 
                            url="{{ route('logout') }}"
                        @endif
                    ></form-btn>
                </div>
            </li>
        </ul>
    </div>
</nav>

