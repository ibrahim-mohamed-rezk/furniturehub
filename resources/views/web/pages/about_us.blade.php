@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="#">{{ __('web.about_us') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h5 class="color-gray-500 mb-10">{{ __('web.about_us') }}</h5>
                    @if (getCurrentLocale() == 'en')
                        <h2>{{ settings('about_us_title_en') }}</h2>
                        <div class="row mt-20">
                            <div class="col-lg-6">
                                <p class="font-sm font-medium color-gray-700 mb-15">{!! settings('about_us_des_en') !!}</p>

                                {{-- <ul class="list-services mt-20">
                                    <li class="hover-up">{{ settings('about_us_one_en') }}</li>
                                    <li class="hover-up">{{ settings('about_us_two_en') }}</li>
                                    <li class="hover-up">{{ settings('about_us_three_en') }}</li>
                                    <li class="hover-up">{{ settings('about_us_four_en') }}</li>
                                </ul> --}}
                            </div>
                            <div class="col-lg-6 mt-3"><img src="{{asset("/public/assets/web/ASSETS_En/imgs/page/about/img.png")}}" loading="lazy"
                                    alt="Furniture Hub"></div>
                        </div>
                    @else
                        <h2>{{ settings('about_us_title_ar') }}</h2>
                        <div class="row mt-20">
                            <div class="col-lg-6">
                                <p class="font-sm font-medium color-gray-700 mb-15">{!! settings('about_us_des_ar') !!}</p>
                                {{-- 
                                <ul class="list-services mt-20">
                                    <li class="hover-up">{{ settings('about_us_one_ar') }}</li>
                                    <li class="hover-up">{{ settings('about_us_two_ar') }}</li>
                                    <li class="hover-up">{{ settings('about_us_three_ar') }}</li>
                                    <li class="hover-up">{{ settings('about_us_four_ar') }}</li>
                                </ul> --}}
                            </div>
                            <div class="col-lg-6 mt-3"><img src="{{asset("/public/assets/web/ASSETS_En/imgs/page/about/img.png")}}" loading="lazy"
                                    alt="Furniture Hub"></div>
                        </div>
                    @endif
                    <div class="box-contact-support pt-80 pb-50 pl-50 pr-50 background-gray-50 mt-50 mb-90">
                        <div class="row">
                            <div class="col-lg-3 mb-30 text-center text-lg-start">
                                <h4 class="mb-5">20 {{ __('web.Year') }}</h4>
                                <p class="font-md color-gray-700">
                                    {{ __('web.We_ve_more_than_20_years_working_experience') }}</p>
                            </div>
                            <div class="col-lg-3 mb-30 text-center text-lg-start">
                                <h4 class="mb-5">35 {{ __('web.employee') }}</h4>
                                <p class="font-md color-gray-700 mb-5">
                                    {{ __('web.We_ve_more_than_35_employees_working_near_you') }}</p>
                            </div>
                            <div class="col-lg-3 mb-30 text-center text-lg-start">
                                <h4 class="mb-5">2 {{ __('web.branches') }}</h4>
                                <p class="font-md color-gray-700 mb-5">
                                    {{ __('web.We_have_2_branches_and_we_are_expanding') }}</p>
                            </div>
                            <div class="col-lg-3 mb-30 text-center text-lg-start">
                                <h4 class="mb-5">3 {{ __('web.countries') }}</h4>
                                <p class="font-md color-gray-700 mb-5">
                                    {{ __('web.We_reach_3_countries_around_the_world') }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- <h5 class="color-gray-500 mb-10">{{ __('web.behind_the_brands') }}</h5>
                    <h2 class="mb-40">{{ __('web.the_people_who_work_at_FurnitureHub_share_the_vision_and_values_of_our_community') }}</h2> --}}
                    {{-- <div class="row mb-50">
                        @foreach ($teams as $key => $row)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="card-staff hover-up">
                                    <div class="image-staff"><img src="{{ asset($row->image) }}" loading="lazy" alt="Ecom"></div>
                                    <div class="info-staff">
                                        <h5>{{ $row->name }}</h5>
                                        <p class="font-md color-gray-500">{{ $row->job }}</p>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                        
                    </div> --}}

                    <h2 class="mb-5">{{ __('web.visit_our_stores') }}</h2>
                    <p class="font-sm color-gray-700">{{ __('web.find_us_at_these_locations') }}</p>
                    <div class="box-contact-address pt-30 pb-50">
                        <div class="col-lg-4">
                            @foreach ($branches as $key => $row)
                                <div class="mb-30">
                                    <h4>{{ $row->address }}</h4>
                                    <p class="font-sm color-gray-700">
                                        {{ $row->email }}<br>{{ $row->phone }}<br>{{ $row->work_time }}
                                    </p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-contact-support pt-80 pb-50 background-gray-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb-30 text-center text-lg-start">
                        <h3 class="mb-5">{{ __('web.we_d_love_to_here_from_you') }}</h3>
                        <p class="font-sm color-gray-700">{{ __('web.chat_with_our_friendly_team') }}</p>
                    </div>
                    <div class="col-lg-3 text-center mb-30">
                        <div class="box-image mb-20"><img src="/public/assets/web/ASSETS_En/imgs/page/contact/chat.svg" loading="lazy"
                            alt="Furniture Hub"></div>
                        <h4 class="mb-5">{{ __('web.chat_to_sales') }}</h4>
                        <p class="font-sm color-gray-700 mb-5">{{ __('web.speak_to_our_team') }}</p><a
                            class="font-sm color-gray-900"
                            href="mailto:sales@ecom.com">{{ $first_branch->email ?? ' ' }}</a>
                    </div>
                    <div class="col-lg-3 text-center mb-30">
                        <div class="box-image mb-20"><img src="/public/assets/web/ASSETS_En/imgs/page/contact/call.svg" loading="lazy"
                            alt="Furniture Hub"></div>
                        <h4 class="mb-5">{{ __('web.call_us') }}</h4>
                        <p class="font-sm color-gray-700 mb-5">{{ $first_branch->work_time }} {{ __('web.daily') }}</p><a
                            class="font-sm color-gray-900"
                            href="tel:+2{{ $first_branch->phone ?? ' ' }}">{{ $first_branch->phone ?? ' ' }}</a>
                    </div>
                    <div class="col-lg-3 text-center mb-30">
                        <div class="box-image mb-20"><img src="/public/assets/web/ASSETS_En/imgs/page/contact/map.svg" loading="lazy"
                            alt="Furniture Hub">
                        </div>
                        <h4 class="mb-5">{{ __('web.visit_us') }}</h4>
                        <p class="font-sm color-gray-700 mb-5">{{ __('web.visit_our_office') }}</p><span
                            class="font-sm color-gray-900">{{ $first_branch->address ?? ' ' }}<br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
