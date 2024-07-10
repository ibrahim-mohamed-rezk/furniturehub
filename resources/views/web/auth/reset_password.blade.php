@extends('web.layouts.container')


@section('content')
    <section class="section-box shop-template mt-60">
        <div class="container">
            <div class="row mb-100">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <h3>{{ __('web.member_login') }}</h3>
                    <p class="font-md color-gray-500">{{ __('web.Welcome_back') }}</p>
                    <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
                        @CSRF
                        <div class="form-register mt-30 mb-30">
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.password') }} *</label>
                                <input class="form-control" name="password"   type="password" placeholder="******************"
                                >
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.password_confirmation') }} *</label>
                                <input class="form-control" name="password_confirmation"  type="password"
                                       placeholder="******************" >
                            </div>
                            <div class="form-group">
                                <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.verify_code') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
