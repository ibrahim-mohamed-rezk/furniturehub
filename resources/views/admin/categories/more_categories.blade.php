@extends('admin.layouts.container')

@section('content')
    <section class="content-main">
        <div class="content-header">
            <div class="row">
                @foreach ($categories as $key => $row)
                    @if ($all_names[$key] != [])
                        <div class="col-xl-6 col-lg-12">
                            <div class="card mb-4">
                                <article class="card-body">
                                    <h5 class="card-title">{{ $row->title }} statistics</h5>
                                    <canvas id="myChart{{ $key + 5 }}" height="120px"></canvas>
                                </article>
                            </div>

                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
@endsection
@section('inner_js')
    @foreach ($all_count as $key => $row)
        @if ($all_names[$key] != [])
            <script>
                if ($('#myChart{{ $key + 5 }}').length) {
                    var ctx = document.getElementById("myChart{{ $key + 5 }}");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode($all_names[$key]) !!},
                            datasets: [{
                                    label: "Count",
                                    backgroundColor: "#008000",
                                    barThickness: 10,
                                    data: {!! json_encode($all_count[$key]) !!}
                                }, {
                                    label: "Deleted",
                                    backgroundColor: "#FF0000",
                                    barThickness: 10,
                                    data: {!! json_encode($all_count_deleted[$key]) !!}
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
            </script>
        @endif
    @endforeach
@endsection
