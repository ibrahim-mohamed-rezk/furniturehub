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
                <form method="post" enctype="multipart/form-data" action="{{ $action }}">
                    @csrf

                    @if ($user ?? '' && $user->id)
                        @if ($edit == 1)
                            {{ method_field('patch') }}
                        @endif
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('users.name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('users.name') }}"
                                        value='{{ old('name', $user->name ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('users.email') }}</label>
                                    <input type="email" name="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('users.email') }}"
                                        value='{{ old('email', $user->email ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('users.phone') }}</label>
                                    <input type="number" name="phone"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('users.phone') }}"
                                        value='{{ old('phone', $user->phone ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('users.password') }}</label>
                                    <input type="password" name="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('users.password') }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('users.photo') }}
                                    </label>
                                    <input type="file" name="photo"
                                        class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('users.photo') }}"
                                        value='{{ old('photo') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    @if ($user ?? '' && $user->id)
                                        <img src="{{ asset($user->photo) }}" style="height:10pc">
                                    @endif
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label>{{ __('users.modules') }} </label>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        @foreach ($modules as $key => $row)
                                            <div class="col-sm-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                        {{ in_array($row['id'], $user_modules) ? 'checked' : '' }}
                                                        value="{{ $row['id'] }}" class="custom-control-input"
                                                        id="module_{{ $key }}" name="modules[]">
                                                    <label class="custom-control-label" for="module_{{ $key }}">
                                                        {{ __($row['path'] . '.index') }} </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-md rounded font-sm hover-up">{{ __('dashboard.submit') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        @if ($user ?? '' && $user->id)
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card mb-4">
                        <article class="card-body">
                            <h5 class="card-title">{{ $user->name }} {{ __('web.statistics') }}</h5>
                            <canvas id="myChart25" height="120px"></canvas>
                        </article>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card mb-4">
                        <article class="card-body">
                            <h5 class="card-title">{{ $user->name }} {{ __('web.statistics') }}</h5>
                            <canvas id="myChart26" height="120px"></canvas>
                        </article>
                    </div>
                </div>
            </div>
        @endif
    </section>


@section('inner_js')
    @if ($user ?? '' && $user->id)
        <script>
            if ($('#myChart25').length) {
                var canvas = document.getElementById("myChart25");
                var ctx = canvas.getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($labels) !!},
                        datasets: [{
                                label: {!! json_encode(__('web.created')) !!},
                                tension: 0.3,
                                fill: false,
                                backgroundColor: "#008000",
                                borderColor: "#008000",
                                data: {!! json_encode($data_products_created) !!}
                            }, {
                                label: {!! json_encode(__('web.updated')) !!},
                                tension: 0.3,
                                fill: false,
                                backgroundColor: "#0000ff",
                                borderColor: "#0000ff",
                                data: {!! json_encode($data_products_updated) !!}
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
            } //end if
            if ($('#myChart26').length) {
                var canvas = document.getElementById("myChart26");
                var ctx = canvas.getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($labels_daily) !!},
                        datasets: [{
                                label: {!! json_encode(__('web.created')) !!},
                                backgroundColor: "#008000",
                                barThickness: 5,
                                data: {!! json_encode($data_products_created_daily) !!}
                            }, {
                                label: {!! json_encode(__('web.updated')) !!},
                                backgroundColor: "#0000ff",
                                barThickness: 5,
                                data: {!! json_encode($data_products_updated_daily) !!}
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
            } //end if
        </script>
    @endif
@endsection

@endsection
