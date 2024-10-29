@extends('web.layouts.container')


@section('content')
    <section class="section-box shop-template mt-60">
        <div class="container">
            <div class="row mb-100">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <h3>{{ __('web.create_an_account') }}</h3>
                    {{-- <p class="font-md color-gray-500">{{ __('web.access_to_all_features_no_credit_card_required') }}</p> --}}
                    <form action="{{route('web.register_check') }}" method="post" onsubmit="formAction(this)">
                        @CSRF
                        <div class="form-register mt-30 mb-30">

                            <input type="hidden" name="ref" value="{{ request('ref') }}">
                            <input type="hidden" name="previous" value="{{ $previous }}">

                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.full_name') }} *</label>
                                <input class="form-control" name="name" type="text" placeholder="Growth"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.email') }} *</label>
                                <input class="form-control" name="email" type="text" value="{{ old('email') }}"
                                    placeholder="Growth@gmail.com">
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.phone') }} *</label>
                                <input class="form-control" name="phone" type="number" value="{{ old('phone') }}"
                                    placeholder="01xxxxxxxxx">
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.governorate') }} *</label>
                                <select class="form-control" name="gevernorate_id">
                                    @foreach ($governorates as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.password') }} *</label>
                                <input class="form-control" name="password" type="password"
                                    placeholder="******************">
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.password_confirmation') }} *</label>
                                <input class="form-control" name="password_confirmation" type="password"
                                    placeholder="******************">
                            </div>
    
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.home_address') }} *</label>
                                <input class="form-control" name="address_1" type="text" value="{{ old('address_1') }}"
                                    placeholder="{{ __('web.home_address') }}">
                            </div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.postCode_ZIP') }} *</label>
                                <input class="form-control" name="post_code" type="number" value="{{ old('phone') }}"
                                    placeholder="{{ __('web.postCode_ZIP') }}">
                            </div>
                            <div class="form-group">
                                <label>
                                    <input class="checkagree" name="confirm"
                                        type="checkbox">{{ __('web.by_clicking_register_button_you_agree_our_terms_and_policy') }}
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.sign_up') }}">
                            </div>

                            <div class="mt-20"><span
                                    class="font-xs color-gray-500 font-medium">{{ __('web.already_have_an_account') }}?</span><a
                                    class="font-xs color-brand-3 font-medium"
                                    href="{{ route('web.login') }}">{{ __('web.sign_in') }}</a></div>
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
            </div>
        </div>
    </section>
@endsection
