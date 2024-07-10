@extends('web.layouts.container')

@section('add_content')
    <a href="https://api.whatsapp.com/send?phone=201060552252" class="btn btn-whatsapp" target="_blank">
        <i class="lab la-whatsapp"></i>
    </a>
    <div class="section-box box-quickmenu ">
        <div class="container">
            <div class="box-inner-quickmenu">
                <ul>
                    <li><a href="{{ route('web.shop') }}">{{ __('web.todays_deals') }}</a></li>
                    <li><a href="{{ route('web.cobon') }}">{{ __('web.coupons') }}</a></li>
                    <li><a href="{{ route('web.contact') }}">{{ __('web.customer_service') }}</a></li>
                    <li><a href="{{ route('web.shop') }}?category_id=35&model_id=40">{{ __('web.bean_bags') }}</a></li>
                    <li><a href="{{ route('web.installment') }}">{{ __('web.instalment') }}</a></li>
                    <!--<li><a href="#">{{ __('web.operations') }}</a></li>-->
                    <!--<li><a href="#">{{ __('web.B2B') }}</a></li>-->
                    <!-- <li><a href="{{ route('web.soon') }}">{{ __('web.VR') }}</a></li>
                                                                            <li><a href="{{ route('web.soon') }}">{{ __('web.AR') }}</a></li> -->
                    <li><a href="{{ route('web.offers') }}" style="color: #FD9636;">{{__('web.offers')}}</a></li>
                    <li><a href="{{ route('web.affiliate_register') }}">{{ __('web.affiliate_register') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <section class="section-box mt-35">
        <div class="banner-hero banner-home9">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3" id="home-banner">
                        <a href="{{ $banners[0]->link }}">
                            <div class="banner-left" style='background-image: url("{{ $banners[0]->image }}")' loading="lazy">
                                {{-- <div class="box-adsolute-banner">
                                <h5 class="color-gray-900">Office Collection</h5><a
                                    class="btn btn-link-brand-2 text-capitalize">Shop Now</a>
                            </div> --}}
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="box-swiper">
                            <div class="swiper-container swiper-banner-1">
                                <div class="swiper-wrapper">
                                    @foreach ($sliders as $row)
                                        <div class="swiper-slide">
                                            <a href="{{ $row->link }}">

                                                <div class="banner-middle"
                                                    style='background-image: url("{{ $row->image }}");' loading="lazy">

                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                                    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
                                    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3" id="home-banner">
                        <a href="{{ $banners[1]->link }}">

                            <div class="banner-right-home6" style='background-image: url("{{ $banners[1]->image }}")' loading="lazy">
                                {{-- <div class="box-adsolute-banner">
                                <h5 class="color-gray-900">Comfort Chair</h5><a
                                    class="btn btn-link-brand-2 text-capitalize">Shop Now</a>
                            </div> --}}
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="section-box ">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="box-slider-product">
                        <div class="head-slider">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5>{{ __('web.new_arrivals') }}</h5>
                                </div>
                                <div class="col-lg-5">
                                    <div class="box-button-slider-2">
                                        <div
                                            class="swiper-button-prev swiper-button-prev-style-top swiper-button-prev-newarrival">
                                        </div>
                                        <div
                                            class="swiper-button-next swiper-button-next-style-top swiper-button-next-newarrival">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-products">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-group-3-newarrival">
                                    <div class="swiper-wrapper">
                                        @foreach ($news_products as $row)
                                            @include('web.component.product.sliderHomeComponent', [
                                                'product' => $row,
                                            ])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="box-slider-product">
                        <div class="head-slider">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5>{{ __('web.best_selling') }}</h5>
                                </div>
                                <div class="col-lg-5">
                                    <div class="box-button-slider-2">
                                        <div
                                            class="swiper-button-prev swiper-button-prev-style-top swiper-button-prev-bestselling">
                                        </div>
                                        <div
                                            class="swiper-button-next swiper-button-next-style-top swiper-button-next-bestselling">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-products">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-group-3-bestselling">
                                    <div class="swiper-wrapper">
                                        @foreach ($sale_products as $row)
                                            @include('web.component.product.sliderHomeComponent', [
                                                'product' => $row,
                                            ])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="box-slider-product">
                        <div class="head-slider">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5>{{ __('web.hot_deals') }}</h5>
                                </div>
                                <div class="col-lg-5">
                                    <div class="box-button-slider-2">
                                        <div
                                            class="swiper-button-prev swiper-button-prev-style-top swiper-button-prev-hotdeal">
                                        </div>
                                        <div
                                            class="swiper-button-next swiper-button-next-style-top swiper-button-next-hotdeal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-products">
                            <div class="box-swiper">
                                <div class="swiper-container swiper-group-3-hotdeal">
                                    <div class="swiper-wrapper">
                                        @foreach ($hot_products as $row)
                                            @include('web.component.product.sliderHomeComponent', [
                                                'product' => $row,
                                            ])
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="section-box mt-10">
        <div class="container">
            <div class="slide-container swiper-container">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        @foreach ($categorieshome as $row)
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <span class="overlay"></span>
                                    <div class="card-image1">
                                        <a href="{{ route('web.shop', $row->slug) }}">
                                            <img src="{{ asset($row->image) }}" alt="" class="card-img">

                                        </a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <a href="{{ route('web.shop', $row->slug) }}">
                                        <h5 class="name">{{ $row->title }}</h5>

                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="swiper-button-next swiper-button-next-group-3"></div>
                <div class="swiper-button-prev swiper-button-next-group-3"></div>
            </div>
        </div>
    </div>
    @if ($cobonProduct)
        <section class="section-box pt-30">
            <div class="container">
                <a href="{{ $banners[27]->link }}">
                    <img src="{{ $banners[27]->image }}" loading="lazy" style="background-size: contain;" alt="">
                </a>
                <div class="head-main bd-gray-200">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="mb-5">{{ __('web.latest_deals') }}</h3>
                            <p class="font-base color-gray-500">{{ __('web.special_products_in_this_month') }}</p>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="box-all-hurry">
                                <div class="d-inline-block box-text-hurryup"><span
                                        class="font-md-bold color-gray-900">{{ __('web.hurry_up') }}</span><br><span
                                        class="font-xs color-gray-500">{{ __('web.offers_end_in') }}</span></div>
                                <div class="box-count box-count-square hide-period">
                                    <div class="deals-countdown" data-countdown="{{ $cobonProduct->end_date }} 00:00:00">
                                        
                                    </div>
                                </div>
                                <a class="btn btn-view-all font-md-bold" href="{{ $banners[27]->link }}">{{ __('web.view_all') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-grid-style-3 hover-show hurry-up hurry-up-2">
                            <div class="card-grid-inner">
                                <span class="label"><span class="font-lg-bold color-white"  @if (getCurrentLocale() == 'ar') style="margin:20px" @else style="margin:10px"@endif>{{ __('web.hurry_up') }}</span></span>
                                <div class="image-box">
                                    <a href="{{ $only_product_offer->url }}">
                                        <img src="{{ $only_product_offer->image_url }}" alt="Ecom" loading="lazy" style="max-width: 100%; height: auto;">
                                    </a>
                                </div>
                                <div class="text-center mt-10 mb-15">
                                    <h4>{{ __('web.special_offer') }}</h4>
                                </div>
                                <div class="box-count box-count-square">
                                    <div class="deals-countdown" data-countdown="2024/03/06 00:00:00"><span
                                            class="countdown-section"><span
                                                class="countdown-amount font-sm-bold lh-16">00</span><span
                                                class="countdown-period lh-14 font-xs"> day </span></span><span
                                            class="countdown-section"><span
                                                class="countdown-amount font-sm-bold lh-16">00</span><span
                                                class="countdown-period font-xs lh-14"> hour </span></span><span
                                            class="countdown-section"><span
                                                class="countdown-amount font-sm-bold lh-16">00</span><span
                                                class="countdown-period font-xs lh-14"> min </span></span><span
                                            class="countdown-section"><span
                                                class="countdown-amount font-sm-bold lh-16">00</span><span
                                                class="countdown-period font-xs lh-14"> sec </span></span></div>
                                </div>
                                <div class="divide"></div>
                                <div class="info-right"><span class="font-xs color-gray-500">{{ $only_product_offer->category->details->title }}</span><br><a
                                        class="color-brand-3 font-sm-bold" href="shop-single-product-3.html">
                                        <h5>{{ $only_product_offer->name }}</h5>
                                    </a>
                                    @if ($only_product_offer->rates['count'] != 0)
                                        <div class="rating">
                                            @include('web.component.rate.rateComponent', ['rate' => $only_product_offer->rates['rate']])
                                        </div>
                                    @endif
                                    <div class="price-info">
                                        <h3 class="color-brand-3 price-main d-inline-block">{{$only_product_offer->price['price']}}
                                            {{ __("web.$currency->symbol") }}</h3><span
                                            class="color-gray-500 price-line">{{$only_product_offer->price['price_before']}}
                                            {{ __("web.$currency->symbol") }}</span>
                                        <span class="color-gray-500">{{ '/'.__('products.'.$only_product_offer->type) }} </span>
                                        
                                    </div>
                                    <div class="box-progress">
                                        <div class="progress-bar">
                                            <div class="progress-bar-inner" style="width:96% "></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6"><span
                                                    class="font-xs color-gray-500">{{ __('web.available') }}:</span><span
                                                    class="font-xs-bold color-gray-900">12</span></div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end"><span
                                                    class="font-xs color-gray-500">{{ __('web.sold') }}:</span><span
                                                    class="font-xs-bold color-gray-900">230</span></div>
                                        </div>
                                    </div>
                                    <div class="divide"></div>
                                    <ul class="list-features mb-30">
                                        @foreach ($only_product_offer->items as $row)
                                            <li>{{ $row->details->name }}</li>
                                        @endforeach
                                    </ul><a class="btn btn-cart" data-id="{{ $only_product_offer->id }}" onclick="addCart(this)"
                                        style="cursor: pointer">Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($shipping_products as $row)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                    @include('web.component.product.productCobon', ['product' => $row])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif

    @foreach ($categories as $key => $categories_row)
        @if (isset($banners[$key * 4 + 2]))
            <section class="section-box mt-50">
                <div class="container mt-10">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-4">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[$key * 4 + 2]->link }}">
                                                <img src="{{ asset($banners[$key * 4 + 2]->image) }}" alt="Ecom" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[$key * 4 + 3]->link }}">
                                                <img src="{{ asset($banners[$key * 4 + 3]->image) }}"
                                                    alt="($key * 4) + 3" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[$key * 4 + 4]->link }}">
                                                <img src="{{ asset($banners[$key * 4 + 4]->image) }}"
                                                    alt="($key * 4) + 4" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[$key * 4 + 5]->link }}">
                                                <img src="{{ asset($banners[$key * 4 + 5]->image) }}"
                                                    alt="{{ $key * 4 + 5 }}" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @foreach ($categories_row as $row)
            @include('web.component.category.categoryComponent', ['category' => $row])
        @endforeach
    @endforeach
    <section class="section-box ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <a href="{{ $banners[22]->link }}">
                                <div class="banner-bottom-1" style='background-image: url("{{ $banners[22]->image }}");background-size: contain;' loading="lazy">

                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <a href="{{ $banners[24]->link }}">
                                <div class="banner-bottom-2" style='background-image: url("{{ $banners[24]->image }}");background-size: contain;' loading="lazy">

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a href="{{ $banners[23]->link }}">
                        <div class="banner-bottom-3" style='background-image: url("{{ $banners[23]->image }}")' loading="lazy">

                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <a href="{{ $banners[25]->link }}">
                                <div class="banner-bottom-4" style='background-image: url("{{ $banners[25]->image }}");background-size: contain;' loading="lazy">

                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <a href="{{ $banners[26]->link }}">
                                <div class="banner-bottom-5" style='background-image: url("{{ $banners[26]->image }}");background-size: contain;' loading="lazy">

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-50">
        <div class="container">
            <div class="head-main">
                <h3 class="mb-5">{{ __('web.latest_news_events') }}</h3>
                <p class="font-base color-gray-500">{{ __('web.from_our_blog_forum') }}</p>
                <div class="box-button-slider"></div>
                <div class="swiper-button-next swiper-button-next-group-4"></div>
                <div class="swiper-button-prev swiper-button-prev-group-4"></div>
            </div>
        </div>
    </section>
    <div class="container mt-10">
        <div class="box-swiper">
            <div class="swiper-container swiper-group-4">
                <div class="swiper-wrapper pt-5">
                    @foreach ($articles as $row)
                        <div class="swiper-slide">
                            @include('web.component.blog.blogComponent', ['article' => $row])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('container_js')
    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 8,
            spaceBetween: 20,
            centerSlide: true,
            fade: true,
            gragCursor: true,
            loopFillGroupWithBlank: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints:{
                0:{
                    slidesPerView: 1,
                },
                520:{
                    slidesPerView: 3,

                },
                950:{
                    slidesPerView: 4,

                },
                1125:{
                    slidesPerView: 6,

                },
                1400:{
                    slidesPerView: 8,

                },
            },
        });
    </script>

@endsection
