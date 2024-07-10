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
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.email') }} *</label>
                                <input class="form-control" name="email" type="text" placeholder="stevenjob@gmail.com"
                                >
                            </div>
                            <div class="form-group">
                                <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.forget_password') }}">
                            </div>
                            <div class="mt-20"><span class="font-xs color-gray-500 font-medium">{{ __('web.have_an_account') }} ?</span><a class="font-xs color-brand-3 font-medium"
                           href="{{ $login_action }}">{{ __('web.login') }}</a></div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-5"></div>
            </div>
        </div>
    </section>

@endsection
