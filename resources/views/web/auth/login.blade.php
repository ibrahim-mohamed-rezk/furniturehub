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

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (count($errors))
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </div>
                        @endif
                        <input type="hidden" name="previous" value="{{ $previous }}">
                        <div class="form-register mt-30 mb-30">
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.email') }} *</label>
                                <input class="form-control" name="email" type="text" placeholder="Growth@gmail.com"
                                    >
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.password') }} *</label>
                                <input class="form-control" name="password" type="password" placeholder="******************"
                                    >
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="color-gray-500 font-xs">
                                            <input class="checkagree" name="remember" type="checkbox">{{ __('web.remmber_me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <div class="form-group"><a class="font-xs color-gray-500" href="{{$forget_action}}">{{ __('web.forgot_your_password') }}?</a></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.sign_up') }}">
                            </div>
                            <div class="mt-20"><span class="font-xs color-gray-500 font-medium">{{ __('web.have_not_an_account') }} ?</span><a class="font-xs color-brand-3 font-medium"
                                    href="{{ $regist_action }}">{{ __('web.sign_up') }}</a></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="box-login-social pt-65 pl-50">
                        <h5 class="text-center">{{__('web.use_social_network_account')}}</h5>
                        <div class="box-button-login mt-25">
                            <a class="btn btn-login font-md-bold color-brand-3 mb-15" href="{{route('social.login','google')}}">{{__('web.sign_up_with')}}<img src="{{asset('public/assets/web/ASSETS_En/imgs/page/account/google.svg')}}" alt="Ecom"></a>
                            <a class="btn btn-login font-md-bold color-brand-3 mb-15"href="{{route('social.login','facebook')}}">{{__('web.sign_up_with')}}<span class="color-blue font-md-bold">{{__('web.Facebook')}}</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5"></div>
            </div>
        </div>
    </section>

@endsection
