@extends('layouts.admin')
@section('title')
    {{ __('Edit User Agreements') }}
@endsection
@push('script-page')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script>
        document.querySelectorAll('textarea').forEach(element => {
            ClassicEditor.create(element)
                .then(editor => console.log(editor))
                .catch(error => console.error(error));
        })
    </script>
@endpush
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{__('User Agreements')}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
            <div class="breadcrumb-item">{{__('User Agreements')}}</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="row crd mb-3">
                    <h4 class="col-6 fw-normal">{{__('Edit User Agreements')}}</h4>
                    <div class="col-6"></div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#eula" data-bs-target="#eula" role="tab" aria-controls="" aria-selected="true">{{__('End User License Agreement')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tos" data-bs-target="#tos" role="tab" aria-controls="" aria-selected="false">{{__('Term Of Service')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#policy" data-bs-target="#policy" role="tab" aria-controls="" aria-selected="false">{{__('Privacy Policy')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="eula">
                                <p>{{ __('Last update:') }} <span class="text-muted">{{ $eula['date'] ? $eula['date'] : __('Never') }}</span></p>
                                {{ Form::open(['url' => route('agreement.update', 'eula'), 'method' => 'PUT']) }}
                                    <textarea name="editor" id="editor">{!! json_decode($eula['content']) !!}</textarea>
                                    <div class="text-end mt-3">
                                        {{ Form::submit(__('Save Change'),array('class'=>'btn btn-primary')) }}
                                    </div>
                                {{ Form::close() }}
                            </div>
                            <div class="tab-pane fade" id="tos">
                                <p>{{ __('Last update:') }} <span class="text-muted">{{ $term_of_service['date'] ? $term_of_service['date'] : __('Never') }}</span></p>
                                {{ Form::open(['url' => route('agreement.update', 'term-of-service'), 'method' => 'PUT']) }}
                                    <textarea name="editor" id="editor">{!! json_decode($term_of_service['content']) !!}</textarea>
                                    <div class="text-end mt-3">
                                        {{ Form::submit(__('Save Change'),array('class'=>'btn btn-primary')) }}
                                    </div>
                                {{ Form::close() }}
                            </div>
                            <div class="tab-pane fade" id="policy">
                                <p>{{ __('Last update:') }} <span class="text-muted">{{ $policy['date'] ? $policy['date'] : __('Never') }}</span></p>
                                {{ Form::open(['url' => route('agreement.update', 'policy'), 'method' => 'PUT']) }}
                                    <textarea name="editor" id="editor">{!! json_decode($policy['content']) !!}</textarea>
                                    <div class="text-end mt-3">
                                        {{ Form::submit(__('Save Change'),array('class'=>'btn btn-primary')) }}
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection