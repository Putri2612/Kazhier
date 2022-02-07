@extends('layouts.admin')
@section('page-title')
    {{__('Dashboard')}}
@endsection
@push('script-page')
    <script>
        const Canvas = document.querySelector('#chart-sales').getContext('2d');
        const DisplayChart = new Chart(Canvas, {
            type: 'line',
            options: {
                scales: {
                    yAxis: {
                        min: 0,
                        ticks: {
                            callback: (label, index, labels) => new Intl.NumberFormat('{{ Config::get('app.locale') }}', { maximumSignificantDigits: 2 }).format(label)
                        }
                    }
                },
                tooltips: {
                    callbacks: {
                        label: (tooltipItem, data) => {
                            let Value = data.datasets[tooltipItem.datasetIndex].label;
                            Value += ': ';
                            Value += `${new Intl.NumberFormat('{{ Config::get('app.locale') }}', { maximumSignificantDigits: 2 }).format(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index])}`
                            return Value;
                        }
                    }
                }
            },
            data : {
                labels : @json($chartData['label']),
                datasets: [{
                    label   : 'Order',
                    borderColor: '#0087f8',
                    backgroundColor: '#0087f8',
                    data    : @json($chartData['data'])
                }]
            }
        })
    </script>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{__('Dashboard')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL USERS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$user->total_user}}
                        </div>
                    </div>
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <div class="progreess-status mt-2">
                                <span>{{__('PAID USERS')}} :</span>
                                <span><strong>{{$user['total_paid_user']}} </strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL ORDERS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$user->total_orders}}
                        </div>
                    </div>
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <div class="progreess-status mt-2">
                                <span>{{__('TOTAL ORDER AMOUNT')}} :</span>
                                <span><strong>{{\Auth::user()->priceFormat($user['total_orders_price'])}}  </strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{__('TOTAL PLANS')}}</h4>
                        </div>
                        <div class="card-body">
                            {{$user['total_plan']}}
                        </div>
                    </div>
                    <div class="card-stats">
                        <div class="card-stats-title">
                            <div class="progreess-status mt-2">
                                <span>{{__('MOST PURCHASE PLAN')}} :</span>
                                <span><strong>{{$user['most_purchese_plan']}}  </strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <h5 class="h3 mb-0">{{__('Recent Order')}}</h5>
        <div class="card">
            <div class="card-body">
                <div class="chart">
                    <canvas id="chart-sales" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </section>
@endsection


