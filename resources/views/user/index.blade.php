@extends('layouts.admin')
@php
    $profile=asset(Storage::url('avatar/'));
@endphp
@section('page-title')
    {{__('User')}}
@endsection
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
                                                                ({{__('Expire : ') }} {{!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date):'Unlimited'}})
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
                                                            <a href="#" class="" data-confirm="{{__('Are You Sure?')}}|{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$user['id']}}').submit();">
                                                                <i class="fa-solid fa-lg fa-trash"></i>
                                                            </a>
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user['id']],'id'=>'delete-form-'.$user['id']]) !!}
                                                            {!! Form::close() !!}
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
                </div>
            </div>
        </div>
    </section>
@endsection
