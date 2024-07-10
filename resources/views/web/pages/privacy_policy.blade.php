@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="#">{{ __('web.privacy_policy') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto page-content">
                    <h2 class="text-center mb-20">{{ __('web.privacy_policy') }}</h2><img class="mb-30"
                    src="{{ settings('privacy_policy_image') }}" alt="Furniture Hub"
                    >
                    @if (getCurrentLocale() == 'en')
                        <div>
                            {!! settings('privacy_policy_des_en') !!}
                        </div>
                    @else
                        <div>
                            {!! settings('privacy_policy_des_ar') !!}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
