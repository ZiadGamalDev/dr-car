@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header content-header{{ 1 }}">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-bold">{{ trans('lang.dashboard') }}<small
                            class="mx-3">|</small><small>{{ trans('lang.dashboard_overview') }}</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb bg-white float-sm-right rounded-pill px-4 py-2 d-none d-md-flex">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-tachometer-alt"></i>
                                {{ trans('lang.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ trans('lang.dashboard') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white shadow-sm">
                    <div class="inner">
                        <h3 class="text-primary">20</h3>

                        <p>{{ trans('lang.dashboard_total_bookings') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <a href="{{ route('bookings.index') }}" class="small-box-footer">{{ trans('lang.dashboard_more_info') }}
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white shadow-sm">
                    <div class="inner">
                        @if (1 != false)
                            <h3 class="text-primary"> 100د.إ </h3>
                        @else
                            <h3 class="text-primary">100د.إ</h3>
                        @endif

                        <p>{{ trans('lang.dashboard_total_earnings') }} <span
                                style="font-size: 11px">({{ trans('lang.dashboard_after taxes') }})</span></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a href="{{ route('earnings.index') }}"
                        class="small-box-footer">{{ trans('lang.dashboard_more_info') }}
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white shadow-sm">
                    <div class="inner">
                        <h3 class="text-primary">10</h3>
                        <p>{{ trans('lang.e_provider_plural') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <a href="{{ route('eProviders.index') }}"
                        class="small-box-footer">{{ trans('lang.dashboard_more_info') }}
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-white shadow-sm">
                    <div class="inner">
                        <h3 class="text-primary">5</h3>

                        <p>{{ trans('lang.dashboard_total_customers') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{!! route('users.index') !!}" class="small-box-footer">{{ trans('lang.dashboard_more_info') }}
                        <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header no-border">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">{{ trans('lang.earning_plural') }}</h3>
                            <a href="{{ route('payments.index') }}">{{ trans('lang.dashboard_view_all_payments') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                @if (1 != false)
                                    <span class="text-bold text-lg">50د.إ</span>
                                @else
                                    <span class="text-bold text-lg">د.إ50</span>
                                @endif
                                <span>{{ trans('lang.dashboard_earning_over_time') }}</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success"> 20</span></span>
                                <span class="text-muted">{{ trans('lang.dashboard_total_bookings') }}</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2"> <i class="fas fa-square text-primary"></i>
                                {{ trans('lang.dashboard_this_year') }} </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header no-border">
                        <h3 class="card-title">{{ trans('lang.e_provider_plural') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('eProviders.index') }}" class="btn btn-tool btn-sm"><i
                                    class="fas fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>{{ trans('lang.e_provider_image') }}</th>
                                    <th>{{ trans('lang.e_provider') }}</th>
                                    <th>{{ trans('lang.e_provider_addresses') }}</th>
                                    <th>{{ trans('lang.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($eProviders as $eProvider) --}}
                                <tr>
                                    <td>
                                        {{-- {!! getMediaColumn($eProvider, 'image', 'img-circle mr-2') !!} --}}
                                        img-circle mr-2
                                    </td>
                                    <td>3M Car Detailing</td>
                                    <td>
                                        {{-- {!! getArrayColumn($eProvider->addresses, 'address') !!} --}}
                                        address
                                    </td>
                                    <td class="text-center">
                                        <a href="{!! route('eProviders.edit', 1) !!}" class="text-muted"> <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts_lib')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
@endpush
@push('scripts')
    <script type="text/javascript">
        var data = [1000, 2000, 3000, 2500, 2700, 2500, 3000];
        var labels = ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        function renderChart(chartNode, data, labels) {
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            };

            var mode = 'index';
            var intersect = true;
            return new Chart(chartNode, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: data
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,

                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    @if ('1' == '0')
                                        return "{{ setting('default_currency') }} " + value;
                                    @else
                                        return value + " د.إ";
                                    @endif

                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        }

        $(function() {
            'use strict'

            var $salesChart = $('#sales-chart')
            $.ajax({
                url: "https://abdelrahman-salah.online/api/payments/byMonth?api_token=PivvPlsQWxPl1bB5KrbKNBuraJit0PrUZekQUgtLyTRuyBq921atFtoR1HuA",
                success: function(result) {
                    $("#loadingMessage").html("");
                    var data = result.data[0];
                    var labels = result.data[1];
                    renderChart($salesChart, data, labels)
                },
                error: function(err) {
                    $("#loadingMessage").html("Error");
                }
            });
            //var salesChart = renderChart($salesChart, data, labels);
        })
    </script>
@endpush
