@extends('layouts.admin')
@section('title')
    {{ __('Term of Service') }}
@endsection
@push('script-page')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('textarea'))
            .then(editor => console.log(editor))
            .catch(error => console.error(error));
    </script>
@endpush
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{__('Term of Service')}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item">{{__('ToS')}}</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="row crd mb-3">
                    <h4 class="col-6 fw-normal">{{__('Manage Term of Service')}}</h4>
                    <div class="col-6"></div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <p>{{ __('Last update:') }} <span class="text-muted">{{ $content['date'] ? $content['date'] : __('Never') }}</span></p>
                        {{ Form::open(['route' => 'tos.update', 'method' => 'PUT']) }}
                            <textarea name="tos" id="tos">{!! json_decode($content['content']) !!}</textarea>
                            <div class="text-end mt-3">
                                {{ Form::submit(__('Save Change'),array('class'=>'btn btn-primary')) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection