@extends('admin.layouts.container')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Dashboard</h2>
                <p>Whole data about your business here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext"><span class="icon icon-sm rounded-circle bg-primary-light"><i
                                class="text-primary material-icons md-monetization_on"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Revenue</h6><span>{{ number_format($order_Sum) }}</span><span
                                class="text-sm">Shipping
                                fees are
                                not included</span>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext"><span class="icon icon-sm rounded-circle bg-success-light"><i
                                class="text-success material-icons md-local_shipping"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Orders</h6><span>{{ $order_count }}</span><span
                                class="text-sm">Excluding orders
                                in
                                transit</span>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext"><span class="icon icon-sm rounded-circle bg-warning-light"><i
                                class="text-warning material-icons md-qr_code"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Products</h6><span>{{ $product_count }}</span><span
                                class="text-sm">In {{ $categories_count }}
                                Categories</span>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-body mb-4">
                    <article class="icontext"><span class="icon icon-sm rounded-circle bg-info-light"><i
                                class="text-info material-icons md-shopping_basket"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Monthly Earning</h6><span>{{ number_format($order_Sum_last) }}</span><span
                                class="text-sm">Based
                                in your
                                local time.</span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">
                    <article class="card-body">
                        <h5 class="card-title">Sale statistics</h5>
                        <canvas id="myChart" data-sales="{{ $sales }}" data-visitors="{{ $visitors }}"
                            data-products="{{ $products }}" height="120px"></canvas>
                    </article>
                </div>

            </div>
            <div class="col-xl-10 col-lg-12">
                <div class="card mb-4">
                    <article class="card-body">
                        <h5 class="card-title">Categories statistics</h5>
                        <canvas id="myChart3" data-sales="{{ $sales }}" data-visitors="{{ $visitors }}"
                            data-products="{{ $products }}" height="120px"></canvas>
                    </article>
                </div>

            </div>
            <div class="col-xl-2 col-lg-12">
                <div class="card mb-4" style="margin-top: 200px">
                    <a class="btn btn-success" href="{{ route('more_category') }}">Show More Categories statistics </a>
                </div>

            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-4">
                    <article class="card-body">
                        <h5 class="card-title">Sale statistics</h5>
                        <canvas id="myChartcity" data-sales="{{ $sales }}" data-visitors="{{ $visitors }}"
                            data-products="{{ $products }}" height="120px"></canvas>
                    </article>
                </div>

            </div>

        </div>
        <div class="card mb-4">
            
        </div>
    </section>
@endsection

@section('inner_js')
    <script>
        if ($('#myChart3').length) {
            var ctx = document.getElementById("myChart3");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($data_categories) !!},
                    datasets: [{
                            label: "Count",
                            backgroundColor: "#008000",
                            barThickness: 10,
                            data: {!! json_encode($category_not_count) !!}
                        }, {
                            label: "Deleted",
                            backgroundColor: "#FF0000",
                            barThickness: 10,
                            data: {!! json_encode($category_deleted_count) !!}
                        },


                    ]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                usePointStyle: true,
                            },
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } //end if
        if ($('#myChartcity').length) {
            var ctx = document.getElementById("myChartcity");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($data_governorates) !!},
                    datasets: [{
                            label: "Count",
                            backgroundColor: "#008000",
                            barThickness: 10,
                            data: {!! json_encode($data_count_goverates) !!}
                        }


                    ]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                usePointStyle: true,
                            },
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        } //end if
        
    </script>
@endsection
