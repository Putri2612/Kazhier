@extends('layouts.admin')
@php
    $profile=asset(Storage::url('avatar/'));
@endphp
@section('page-title')
    {{__('User')}}
@endsection

@push('script-page')
    <script>
        document.querySelector('#search-form').addEventListener('submit', event => {
            event.preventDefault();
            console.log(event);
            let form = event.currentTarget,
                url  = form.action;
                url  = url.replace('QUERY', form.query.value);
            window.location.href = url;
        });
    </script>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('User')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item">{{__('User')}}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row crd mb-3">
                    <h4 class="col-6 fw-normal">{{__('Manage User')}}</h4>
                    <div class="col-6 text-end">
                        @can('create user')
                        @if (Auth::user()->type == 'super admin')
                            <a href="#" data-url="{{ route('users.create') }}" data-ajax-popup="true" data-title="{{__('Create New User')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fa fa-plus"></i><span class="d-none d-md-inline"> {{__('Create')}}</span>
                            </a>
                        @else
                            @php 
                                $user = \Auth::user();
                                $totalUser = $user->countUsers();
                                $plan = App\Models\Plan::find($user->plan);
                            @endphp
                            @if ($totalUser < $plan->max_users || $plan->max_users == -1)
                                <a href="#" data-url="{{ route('users.create') }}" data-ajax-popup="true" data-title="{{__('Create New User')}}" class="btn btn-icon icon-left btn-primary">
                                    <i class="fa fa-plus"></i><span class="d-none d-md-inline"> {{__('Create')}}</span>
                                </a>
                            @endif
                        @endif
                            
                        @endcan
                        @if(\Auth::user()->type == 'super admin')
                            <a href="{{route('syncData')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-sync-alt"></i><span class="d-none d-md-inline"> {{__('Sync User Data')}}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['route' => ['users.search', ['QUERY']], 'id' => 'search-form']) }}
                            <div class="row justify-content-end">
                                <div class="col-12 col-md-4">{{ Form::text('query', !empty($query) ? $query : null, ['class' => 'form-control', 'placeholder' => __('Search') . '...']) }}</div>
                                <div class="col-12 col-md-auto">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    @if(!empty($query)) <a href="{{route('users.index')}}" class="btn btn-danger"><i class="fas fa-times"></i></a> @endif
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                    <div class="card-body">
                        <div class="staff-wrap">
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-sm-6">
                                        <div class="staff staff-grid-view pb-0">
                                            <div class="row">
                                                <div class="col-xxl-3 col-12">
                                                    <img src="{{(!empty($user->avatar))? asset(Storage::url("avatar/".$user->avatar)): asset(Storage::url("avatar/avatar.png"))}}" class="rounded-circle">
                                                </div>
                                                <div class="col">
                                                    <div class="text-start mb-3">
                                                        <h2 class="m-0 font-style ">{{$user->name}} </h2>
                                                        <p>{{$user->email}}</p>
                                                        <p class="font-style">
                                                            @if(Auth::user()->type == 'super admin')
                                                                <b class="text-primary font-style">{{!empty($user->currentPlan)?$user->currentPlan->name:''}}</b>
                                                                ({{__('Expire : ') }} {{!empty($user->plan_expire_date) ? \Helper::DateFormat($user->plan_expire_date):'Unlimited'}})
                                                            @else 
                                                                {{$user->type}}
                                                            @endif
                                                        </p>
                                                        @if($user->delete_status==0)
                                                            <p class="soft-del">{{__('Soft Deleted')}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="row mb-3">
                                                        @if(Auth::user()->type == 'super admin')
                                                            <div class="col">
                                                                <a href="#" class="" data-url="{{ route('plan.upgrade',$user->id) }}" data-ajax-popup="true" data-title="{{__('Upgrade Plan')}}">
                                                                    <i class="fa-solid fa-lg fa-arrow-up"></i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @can('edit user')
                                                        <div class="col">
                                                            <a href="#" class="" data-url="{{ route('users.edit',$user->id) }}" data-ajax-popup="true" data-title="{{__('Update User')}}">
                                                                <i class="fa-solid fa-lg fa-pen"></i>
                                                            </a>
                                                        </div>
                                                        @endcan
                                                        @can('delete user')
                                                        <div class="col">
                                                            <a href="#" class="" data-is-delete data-delete-url="{{ route('users.destroy', $user['id']) }}">
                                                                <i class="fa-solid fa-lg fa-trash"></i>
                                                            </a>
                                                        </div>
                                                        @endcan
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($hasPage)
                        <div class="card-body">
                            <ul class="pagination justify-content-end">
                                <li class="page-item {{ !$prev ? 'disabled' : '' }}">
                                    @php
                                        if(empty($prev)) {
                                            $url = '#';
                                        } else if(!empty($query)) {
                                            $url = route('users.page-with-search', ['page' => $prev, 'query' => $query]);
                                        } else {
                                            $url = route('users.page', ['page' => $prev]);
                                        }
                                    @endphp
                                    <a class="page-link" href="{{ $url }}">{{ __('Previous') }}</a>
                                </li>
                                @for ($index = 1; $index <= $totalPage; $index++)
                                    @if ($index == 1 || $index == $totalPage || ($index > $page - 2 && $index < $page + 2))
                                        <li class="page-item {{ $index == $page ? 'active' : '' }}">
                                            @php
                                                if($index == $page) {
                                                    $url = '#';
                                                } else if(!empty($query)) {
                                                    $url = route('users.page-with-search', ['page' => $index, 'query' => $query]);
                                                } else {
                                                    $url = route('users.page', ['page' => $index]);
                                                }
                                            @endphp
                                            <a class="page-link" href="{{ $url }}">{{ $index }}</a>
                                        </li>
                                    @elseif ($index == $page - 2 || $index == $page + 2)
                                        <li class="page-item disabled">
                                            <a class="page-link">&hellip;</a>
                                        </li>
                                    @endif
                                @endfor
                                <li class="page-item {{ !$next ? 'disabled' : '' }}">
                                    @php
                                        if(!$next) {
                                            $url = '#';
                                        } else if(!empty($query)) {
                                            $url = route('users.page-with-search', ['page' => $next, 'query' => $query]);
                                        } else {
                                            $url = route('users.page', ['page' => $next]);
                                        }
                                    @endphp
                                    <a class="page-link" href="{{ $url }}">{{ __('Next') }}</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
