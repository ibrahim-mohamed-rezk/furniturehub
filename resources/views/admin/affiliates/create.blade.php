

@extends('admin.layouts.container')
@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">{{ $title }}</h2>
                </div>
            </div>

            <div class="col-lg-12">
                <form>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('affiliates.name') }}</label>
                                    <input type="text" n class="form-control" id="validationServer" disabled
                                        value='{{ $affiliate->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('affiliates.email') }}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled
                                        value='{{ $affiliate->email }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('affiliates.phone') }}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled
                                        value='{{ $affiliate->phone }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('affiliates.governorate') }}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled
                                        value='{{ $affiliate->governorate_id($affiliate->governorate_id) }}'>
                                </div>


                            </div>
                        </div>
                    </div>
                    @if ($affiliate->status =='refused')
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mx-auto">
                                        <label for="validationServer">{{ __('affiliates.status') }}</label>
                                        <input type="text" class="form-control" id="validationServer" disabled
                                            value='{{ __('affiliates.refused') }}'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        @if (!$user_affiliate)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-success"
                                                href="{{ route('affiliate.accept', $affiliate->id) }}">{{ __('affiliates.accepted') }}</a>

                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-danger"
                                                href="{{ route('affiliate.refuse', $affiliate->id) }}">{{ __('affiliates.refused') }}</a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mx-auto">
                                            <label for="validationServer">{{ __('affiliates.status') }}</label>
                                            <input type="text" class="form-control" id="validationServer" disabled
                                                value='{{ __('affiliates.'. $user_affiliate->affiliate) }}'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row ">
                                        <div class="col-lg-3 mx-auto">
                                            <div class="card card-body mb-4">
                                                <article class="icontext"><span
                                                        class="icon icon-sm rounded-circle bg-primary-light"><i
                                                            class="text-primary material-icons md-person"></i></span>
                                                    <div class="text">
                                                        <h6 class="mb-1 card-title">Users</h6>
                                                        <span>{{ $affiliate_count->affiliate_count_user }}</span><span
                                                            class="text-sm">Affiliate Users Count</span>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mx-auto">
                                            <div class="card card-body mb-4">
                                                <article class="icontext"><span
                                                        class="icon icon-sm rounded-circle bg-success-light"><i
                                                            class="text-success material-icons md-local_shipping"></i></span>
                                                    <div class="text">
                                                        <h6 class="mb-1 card-title">Orders</h6>
                                                        <span>{{ $affiliate_count->affiliate_count_order }}</span><span
                                                            class="text-sm">Affiliate Orders Count</span>
                                                    </div>
                                                </article>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <span
                                    class="title h5 text-primary mx-auto border rounded p-2 mt-5">{{ __('users.index') }}</span>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th scope="col">{{ __('affiliates.name') }}</th>
                                                    <th scope="col">{{ __('affiliates.email') }}</th>
                                                    <th scope="col">{{ __('affiliates.created_at') }}</th>
                                                    <th scope="col">{{ __('affiliates.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key => $row)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td><b>{{ $row->name }}</b></td>
                                                        <td><b>{{ $row->email }}</b></td>
                                                        <td>{{ $row->created_at->format('Y M d') }} </td>
                                                        @if (!$row->deleted_at)
                                                            <td>
                                                                <a class="btn btn-sm font-sm rounded btn-brand mr-5"
                                                                    href="{{ route('members.edit', $row->id) }}"><i
                                                                        class="material-icons md-edit"></i>
                                                                    {{ __('dashboard.edit') }}</a>
                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="card mb-4">
                                <span
                                    class="title h5 text-primary mx-auto border rounded p-2 mt-5">{{ __('orders.index') }}</span>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#ID</th>
                                                    <th scope="col">{{ __('affiliates.name') }}</th>
                                                    <th scope="col">{{ __('affiliates.email') }}</th>
                                                    <th scope="col">{{ __('affiliates.total') }}</th>
                                                    <th scope="col">{{ __('affiliates.profit') }}</th>
                                                    <th scope="col">{{ __('affiliates.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $key => $row)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td><b>{{ $row->user->name }}</b></td>
                                                        <td><b>{{ $row->user->email }}</b></td>
                                                        <td>{{ $row->total }} </td>
                                                        <td>{{ $row->affiliate_profit }} </td>
                                                        @if (!$row->deleted_at)
                                                            <td>
                                                                <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                                                    href="{{ route('orders.show', $row->id) }}"><i
                                                                        class="material-icons md-edit"></i>
                                                                    {{ __('dashboard.show') }}</a>
                                                            </td>
                                                        @endif

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th>#ID</th>
                                                    <th scope="col">{{ __('affiliates.name') }}</th>
                                                    <th scope="col">{{ __('affiliates.email') }}</th>
                                                    <th scope="col">{{ __('affiliates.total') ." : ". $totals }}</th>
                                                    <th scope="col">{{ __('affiliates.profit') ." : " . $profits }}</th>
                                                    <th scope="col">{{ __('affiliates.Action') }}</th>
                                                </tr>

                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card mb-4">
                                        <article class="card-body">
                                            <h5 class="card-title">Sale statistics</h5>
                                            <canvas id="myChartaffiliate1" data-sales="{{ $sales }}"
                                                data-visitors="{{ $visitors }}" height="120px"></canvas>
                                        </article>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif


                </form>
            </div>
        </div>
    </section>
@endsection
@section('inner_js')
    <script>
        if ($('#myChartaffiliate1').length) {
            var canvas = document.getElementById('myChartaffiliate1');
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
