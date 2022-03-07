@extends('layouts.admin')
@section('page-title')
    {{ __('Referral Transaction History') }}
@endsection

@push('script-page')
    <script>
        
    </script>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Transaction History')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item active"><a href="#">{{__('Referral')}}</a></div>
                <div class="breadcrumb-item">{{__('Transaction History')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Transaction History')}}</h4>
                        <div class="col-6"></div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(array('route' => array('referral.history'),'method' => 'GET', 'class' => 'row justify-content-end align-items-end pt-3 pb-5 mb-5')) }}
                                <div class="col-12 col-md-6 col-lg-auto form-group">
                                    {{ Form::label('date', __('Date')) }}
                                    {{ Form::text('date', isset($_GET['date'])?$_GET['date']:null, array('class' => 'form-control datepicker-range')) }}
                                </div>
                                <div class="col-12 col-md-6 col-lg-2 form-group">
                                    {{ Form::label('email', __('Email')) }}
                                    {{ Form::email('email', isset($_GET['email'])?$_GET['email']:null, array('class' => 'form-control rounded-control')) }}
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-round btn-primary"><i class="fas fa-search"></i></button>
                                    <a href="{{route('referral.history')}}" class="btn btn-round btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                            {{ Form::close() }}
                            @if (empty($_GET['email']))
                                <div class="text-muted">{{ __('Only showing 30 newest transactions') }}</div>
                            @endif
                            <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer" id="table-1_wrapper">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-flush dataTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>{{ __('Point owner') }}</th>
                                                        <th>{{ __('Creator') }}</th>
                                                        <th>{{ __('Amount') }}</th>
                                                        <th>{{ __('Description') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($history as $hist)
                                                        <tr class="font-style">
                                                            <td>{{ $hist->Point->Owner->name }}</td>
                                                            <td>{{ $hist->Creator->name }}</td>
                                                            <td>{{ $hist->amount }}</td>
                                                            <td>{{ $hist->description }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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