@extends('layouts.admin')
@section('page-title')
    {{ __('Referral Withdraw Request') }}
@endsection

@push('script-page')
    <script>
        $('.selectric').on('change', event => {
            const currentUrl = window.location.href.split('?')[0],
                value   = event.currentTarget.value;
                console.log(event.currentTarget);
            window.location.href = `${currentUrl}?status=${value}`;
        })
    </script>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Withdraw Request')}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></div>
                <div class="breadcrumb-item active"><a href="#">{{__('Referral')}}</a></div>
                <div class="breadcrumb-item">{{__('Withdraw Request')}}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="row crd mb-3">
                        <h4 class="col-6 fw-normal">{{__('Manage Withdraw Request')}}</h4>
                        <div class="col-6"></div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-10"></div>
                                <div class="col-md-auto">
                                    <div class="form-group">
                                        {{ Form::label('status', __('Status')) }}
                                        {{ Form::select('status',$statusOptions,(isset($_GET['status'])? $_GET['status'] : ''), array('class' => 'form-control font-style selectric')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer" id="table-1_wrapper">
                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-flush dataTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>{{ __('User') }}</th>
                                                        <th>{{ __('Bank Account') }}</th>
                                                        <th>{{ __('Bank Name') }}</th>
                                                        <th>{{ __('Amount') }}</th>
                                                        <th>{{ __('Status') }}</th>
                                                        <th>{{ __('Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($req as $request)
                                                        <tr class="font-style">
                                                            <td>{{ $request->user->name }}</td>
                                                            <td>{{ $request->destination }}</td>
                                                            <td>{{ $request->bank_name }}</td>
                                                            <td>{{ $request->amount }}</td>
                                                            <td>{{ $request->status }}</td>
                                                            <td>
                                                                @if ($request->status != 'success')
                                                                    @php
                                                                        $status = $request->status;
                                                                        $nextInd= array_search($status, App\Models\ReferralWithdrawRequest::$status) + 1;
                                                                        $next   = App\Models\ReferralWithdrawRequest::$status[$nextInd];
                                                                    @endphp

                                                                    <a href="#!" class="btn btn-success btn-action" data-status-update="{{ $next }}" data-status-url="{{ route('referral.withdraw.process', $request->id) }}">
                                                                        @if ($status == 'pending')
                                                                            <i class="fas fa-money-bill-wave-alt"></i>
                                                                        @elseif ($status == 'processed')
                                                                            <i class="fas fa-check"></i>
                                                                        @endif
                                                                    </a>
                                                                @endif
                                                            </td>
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