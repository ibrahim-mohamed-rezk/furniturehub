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

            <div class="col-lg-3 mx-auto">
                <div class="card card-body mb-4">
                    <article class="icontext"><span class="icon icon-sm rounded-circle bg-primary-light"><i
                                class="text-primary material-icons md-person"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Users</h6>
                            <span>{{ $affiliate_count->affiliate_count_user }}</span><span class="text-sm">Affiliate Users
                                Count</span>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3 mx-auto">
                <div class="card card-body mb-4">
                    <article class="icontext"><span class="icon icon-sm rounded-circle bg-success-light"><i
                                class="text-success material-icons md-local_shipping"></i></span>
                        <div class="text">
                            <h6 class="mb-1 card-title">Orders</h6>
                            <span>{{ $affiliate_count->affiliate_count_order }}</span><span class="text-sm">Affiliate Orders
                                Count</span>
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
                        <canvas id="myChartaffiliate2" data-sales="{{ $sales }}" data-visitors="{{ $visitors }}"
                            height="120px"></canvas>
                    </article>
                </div>

            </div>


        </div>

    </section>
@endsection

@section('inner_js')
    <script>
        if ($('#myChartaffiliate2').length) {
            var canvas = document.getElementById('myChartaffiliate2');
            var ctx = canvas.getContext('2d');
            var datasales = JSON.parse(canvas.getAttribute('data-sales'));
            var datavisitors = JSON.parse(canvas.getAttribute('data-visitors'));

            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {

                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                            label: 'Orders',
                            tension: 0.3,
                            fill: true,
                            backgroundColor: 'rgba(44, 120, 220, 0.2)',
                            borderColor: 'rgba(44, 120, 220)',
                            data: datasales
                        },
                        {
                            label: 'Users',
                            tension: 0.3,
                            fill: true,
                            backgroundColor: 'rgba(4, 209, 130, 0.2)',
                            borderColor: 'rgb(4, 209, 130)',
                            data: datavisitors
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
                    }
                }
            });
        } //End if
    </script>
@endsection
