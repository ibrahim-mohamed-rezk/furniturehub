@extends('web.layouts.container')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/assets/web/ASSets/css/home.css">
@endsection


@section('content')

    <header class="container">
        <div class="header-wrapper">
            <div class="header-slider-1">
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="slide-container">
                                <a href="{{ route($slider->url['first'], $slider->url['second'] ?? '') }}">
                                    <img src="{{ asset($slider->image) }}" alt="{{ asset($slider->title) }}" loading="lazy">
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="header-slider-1-pagination">
                    <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                          aria-label="Go to slide 1"></span>
                </div>

                <div class="header-slider-1-next">
                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M1 4.99993H11L7.71 1.70994C7.61627 1.61697 7.54188 1.50637 7.49111 1.38451C7.44034 1.26265 7.4142 1.13195 7.4142 0.999937C7.4142 0.867925 7.44034 0.73722 7.49111 0.61536C7.54188 0.493501 7.61627 0.382901 7.71 0.289938C7.89736 0.103687 8.15081 -0.000854492 8.415 -0.000854492C8.67919 -0.000854492 8.93264 0.103687 9.12 0.289938L13.41 4.58993C13.7856 4.96328 13.9978 5.47035 14 5.99993C13.9951 6.52603 13.7832 7.02903 13.41 7.39993L9.12 11.6999C9.02676 11.7925 8.9162 11.8658 8.79463 11.9157C8.67306 11.9655 8.54286 11.9909 8.41146 11.9905C8.28007 11.99 8.15005 11.9637 8.02884 11.913C7.90762 11.8623 7.79758 11.7882 7.705 11.6949C7.61242 11.6017 7.53911 11.4911 7.48925 11.3696C7.4394 11.248 7.41398 11.1178 7.41444 10.9864C7.41491 10.855 7.44125 10.725 7.49196 10.6038C7.54267 10.4825 7.61676 10.3725 7.71 10.2799L11 6.99993H1C0.734783 6.99993 0.480429 6.89457 0.292892 6.70704C0.105356 6.5195 0 6.26515 0 5.99993C0 5.73471 0.105356 5.48036 0.292892 5.29283C0.480429 5.10529 0.734783 4.99993 1 4.99993Z"
                                fill="white" />
                    </svg>
                </div>

                <div class="header-slider-1-preve">
                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M13 4.99993H3L6.29 1.70994C6.38373 1.61697 6.45812 1.50637 6.50889 1.38451C6.55966 1.26265 6.5858 1.13195 6.5858 0.999937C6.5858 0.867925 6.55966 0.73722 6.50889 0.61536C6.45812 0.493501 6.38373 0.382901 6.29 0.289938C6.10264 0.103687 5.84919 -0.000854492 5.585 -0.000854492C5.32081 -0.000854492 5.06736 0.103687 4.88 0.289938L0.59 4.58993C0.214412 4.96328 0.00223279 5.47035 0 5.99993C0.00486659 6.52603 0.216844 7.02903 0.59 7.39993L4.88 11.6999C4.97324 11.7925 5.0838 11.8658 5.20537 11.9157C5.32694 11.9655 5.45714 11.9909 5.58854 11.9905C5.71993 11.99 5.84995 11.9637 5.97116 11.913C6.09238 11.8623 6.20242 11.7882 6.295 11.6949C6.38758 11.6017 6.46089 11.4911 6.51075 11.3696C6.5606 11.248 6.58602 11.1178 6.58556 10.9864C6.58509 10.855 6.55875 10.725 6.50804 10.6038C6.45733 10.4825 6.38324 10.3725 6.29 10.2799L3 6.99993H13C13.2652 6.99993 13.5196 6.89457 13.7071 6.70704C13.8946 6.5195 14 6.26515 14 5.99993C14 5.73471 13.8946 5.48036 13.7071 5.29283C13.5196 5.10529 13.2652 4.99993 13 4.99993Z"
                                fill="white" />
                    </svg>
                </div>
            </div>
        </div>
    </header>

    <section class="container">
        <div class="section-wrapper">
            <div class="catigory-slider-2">
                <div class="swiper-wrapper">
                    @foreach ($categories_all as $row)
                        <div class="swiper-slide">
                            <a href="{{ route('web.shop', $row->slug) }}" class="slide-container">
                                <svg viewBox="0 0 82 119" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M14.0839 20.4864C14.8036 15.786 18.2308 11.954 22.8221 10.7162L59.5956 0.802412C66.8977 -1.16617 74.1782 4.02888 74.6915 11.5742L81.1282 106.185C81.5998 113.118 76.1039 119 69.1559 119H12.9772C5.62606 119 0.002859 112.45 1.11546 105.184L14.0839 20.4864Z"
                                            fill="#E4EDED" />
                                </svg>
                                <img class="product-image" src="{{ asset($row->icon) }}" alt="cat-pro-1" loading="lazy">
                                <h3>{{ $row->title }} </h3>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="catigory-slider-2-next">
                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M1 4.99993H11L7.71 1.70994C7.61627 1.61697 7.54188 1.50637 7.49111 1.38451C7.44034 1.26265 7.4142 1.13195 7.4142 0.999937C7.4142 0.867925 7.44034 0.73722 7.49111 0.61536C7.54188 0.493501 7.61627 0.382901 7.71 0.289938C7.89736 0.103687 8.15081 -0.000854492 8.415 -0.000854492C8.67919 -0.000854492 8.93264 0.103687 9.12 0.289938L13.41 4.58993C13.7856 4.96328 13.9978 5.47035 14 5.99993C13.9951 6.52603 13.7832 7.02903 13.41 7.39993L9.12 11.6999C9.02676 11.7925 8.9162 11.8658 8.79463 11.9157C8.67306 11.9655 8.54286 11.9909 8.41146 11.9905C8.28007 11.99 8.15005 11.9637 8.02884 11.913C7.90762 11.8623 7.79758 11.7882 7.705 11.6949C7.61242 11.6017 7.53911 11.4911 7.48925 11.3696C7.4394 11.248 7.41398 11.1178 7.41444 10.9864C7.41491 10.855 7.44125 10.725 7.49196 10.6038C7.54267 10.4825 7.61676 10.3725 7.71 10.2799L11 6.99993H1C0.734783 6.99993 0.480429 6.89457 0.292892 6.70704C0.105356 6.5195 0 6.26515 0 5.99993C0 5.73471 0.105356 5.48036 0.292892 5.29283C0.480429 5.10529 0.734783 4.99993 1 4.99993Z"
                                fill="black" />
                    </svg>
                </div>

                <div class="catigory-slider-2-preve">
                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M13 4.99993H3L6.29 1.70994C6.38373 1.61697 6.45812 1.50637 6.50889 1.38451C6.55966 1.26265 6.5858 1.13195 6.5858 0.999937C6.5858 0.867925 6.55966 0.73722 6.50889 0.61536C6.45812 0.493501 6.38373 0.382901 6.29 0.289938C6.10264 0.103687 5.84919 -0.000854492 5.585 -0.000854492C5.32081 -0.000854492 5.06736 0.103687 4.88 0.289938L0.59 4.58993C0.214412 4.96328 0.00223279 5.47035 0 5.99993C0.00486659 6.52603 0.216844 7.02903 0.59 7.39993L4.88 11.6999C4.97324 11.7925 5.0838 11.8658 5.20537 11.9157C5.32694 11.9655 5.45714 11.9909 5.58854 11.9905C5.71993 11.99 5.84995 11.9637 5.97116 11.913C6.09238 11.8623 6.20242 11.7882 6.295 11.6949C6.38758 11.6017 6.46089 11.4911 6.51075 11.3696C6.5606 11.248 6.58602 11.1178 6.58556 10.9864C6.58509 10.855 6.55875 10.725 6.50804 10.6038C6.45733 10.4825 6.38324 10.3725 6.29 10.2799L3 6.99993H13C13.2652 6.99993 13.5196 6.89457 13.7071 6.70704C13.8946 6.5195 14 6.26515 14 5.99993C14 5.73471 13.8946 5.48036 13.7071 5.29283C13.5196 5.10529 13.2652 4.99993 13 4.99993Z"
                                fill="black" />
                    </svg>
                </div>
                <div class="catigory-slider-2-scrollbar swiper-scrollbar"></div>
            </div>
        </div>
    </section>

    @include('web.component.category.categoryComponent',[
        'title' => __('web.new_arrivals'),
        'products' => $news_products,
        'url' => route('web.shop', ['orderBy' => 'DESC']),  // Proper URL with query string
        'index' => 1
    ])

    <section class="container">
        <div class="home-banner-1-wrapper">
            <div class="home-banner-content">
                <div><a href="{{ route($banners['0']->url['first'], $banners['0']->url['second'] ?? '') }}"><img src="{{asset($banners['0']->image)}}" alt="{{asset($banners['0']->name)}}" loading="lazy"></a></div>
                <div><a href="{{ route($banners['2']->url['first'], $banners['2']->url['second'] ?? '') }}"><img src="{{asset($banners['2']->image)}}" alt="{{asset($banners['2']->name)}}" loading="lazy"></a></div>
                <div><a href="{{ route($banners['1']->url['first'], $banners['1']->url['second'] ?? '') }}"><img src="{{asset($banners['1']->image)}}" alt="{{asset($banners['1']->name)}}" loading="lazy"></a></div>
            </div>
        </div>
    </section>
    @include('web.component.category.categoryComponent',[
        'title' => __('web.best_selling'),
        'products' => $sale_products,
        'url' => route('web.shop', ['orderBy' => 'DESC']),
        'index' => 2
    ])
    <section class="container">
        <div class="home-banner-2-wrapper">
            <div class="home-banner-content">
                <div>
                    <a href="{{ route($banners['3']->url['first'], $banners['3']->url['second'] ?? '') }}">
                        <img src="{{asset($banners['3']->image)}}" alt="{{asset($banners['3']->name)}}" loading="lazy">
                    </a>
                </div>
                <div>
                    <a href="{{ route($banners['4']->url['first'], $banners['4']->url['second'] ?? '') }}">
                        <img src="{{asset($banners['4']->image)}}" alt="{{asset($banners['4']->name)}}" loading="lazy">
                    </a>
                </div>
            </div>
        </div>
    </section>
    @include('web.component.category.categoryComponent',[
        'title' => __('web.hot_deals'),
        'products' => $hot_products,
        'url' => route('web.offers'),
        'index' => 3
    ])

    <section class="container">
        <div class="home-banner-2-wrapper">
            <div class="home-banner-content-reversed">
                <div>
                    <a href="{{ route($banners['4']->url['first'], $banners['4']->url['second'] ?? '') }}">
                        <img src="{{asset($banners['4']->image)}}" alt="{{asset($banners['4']->name)}}" name="4" loading="lazy">

                    </a>
                </div>
                <div>
                    <a href="{{ route($banners['3']->url['first'], $banners['3']->url['second'] ?? '') }}">
                        <img src="{{asset($banners['3']->image)}}" alt="{{asset($banners['3']->name)}}" name="3" loading="lazy">
                    </a>

                </div>
            </div>
        </div>
    </section>


    <section class="container">
        <div class="home-banner-3-wrapper">
            <div class="home-banner-3-content">
                <div class="side-banner-col">
                    @foreach($right_products_cobon as $product)
                        @include('web.component.product.productCobon',['product'=>$product])
                    @endforeach
                </div>
                @if($cobonProduct && $only_product_offer)
                    <div class="side-banner-col">
                        <div class="timer" data-total-seconds="{{ $totalSeconds }}">
                            <div class="title">
                                <div class="square"></div>
                                <h2>{{__('web.big_sales')}}</h2>
                            </div>
                            <div class="timer-clock">
                                <div class="days clock-unit">
                                    <div class="num-label">{{__('web.days')}}</div>
                                    <div class="number">
                                        <span class="num" id="days">00</span>
                                        <span>:</span>
                                    </div>
                                </div>
                                <div class="hours clock-unit">
                                    <div class="num-label">{{__('web.hour')}}</div>
                                    <div class="number">
                                        <span class="num" id="hours">00</span>
                                        <span>:</span>
                                    </div>
                                </div>
                                <div class="minutes clock-unit">
                                    <div class="num-label">{{__('web.minutes')}}</div>
                                    <div class="number">
                                        <span class="num" id="minutes">00</span>
                                        <span>:</span>
                                    </div>
                                </div>
                                <div class="seconds clock-unit">
                                    <div class="num-label">{{__('web.seconds')}}</div>
                                    <div class="number">
                                        <span class="num" id="seconds">00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="middle-banner-img">
                            <div class="home-banner-3-swiper">
                                <div class="swiper-wrapper">
                                    @foreach ($only_product_offer->photos as $photo)
                                        <div class="swiper-slide">
                                            <div class="new-offer">
                                                {{__('web.limited_time_offer')}}
                                            </div>
                                            <img src="{{ $photo->image_url }}" alt="{{ $only_product_offer->name }}" loading="lazy">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="home-banner-3-next">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M5 10.9998H15L11.71 7.70981C11.6163 7.61685 11.5419 7.50625 11.4911 7.38439C11.4403 7.26253 11.4142 7.13183 11.4142 6.99981C11.4142 6.8678 11.4403 6.7371 11.4911 6.61524C11.5419 6.49338 11.6163 6.38278 11.71 6.28982C11.8974 6.10356 12.1508 5.99902 12.415 5.99902C12.6792 5.99902 12.9326 6.10356 13.12 6.28982L17.41 10.5898C17.7856 10.9632 17.9978 11.4702 18 11.9998C17.9951 12.5259 17.7832 13.0289 17.41 13.3998L13.12 17.6998C13.0268 17.7924 12.9162 17.8657 12.7946 17.9155C12.6731 17.9654 12.5429 17.9908 12.4115 17.9904C12.2801 17.9899 12.1501 17.9636 12.0288 17.9128C11.9076 17.8621 11.7976 17.788 11.705 17.6948C11.6124 17.6016 11.5391 17.491 11.4893 17.3694C11.4394 17.2479 11.414 17.1177 11.4144 16.9863C11.4149 16.8549 11.4412 16.7249 11.492 16.6036C11.5427 16.4824 11.6168 16.3724 11.71 16.2798L15 12.9998H5C4.73478 12.9998 4.48043 12.8945 4.29289 12.7069C4.10536 12.5194 4 12.265 4 11.9998C4 11.7346 4.10536 11.4802 4.29289 11.2927C4.48043 11.1052 4.73478 10.9998 5 10.9998Z"
                                                fill="white" />
                                    </svg>

                                </div>

                                <div class="home-banner-3-preve">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M19 10.9998H9L12.29 7.70981C12.3837 7.61685 12.4581 7.50625 12.5089 7.38439C12.5597 7.26253 12.5858 7.13183 12.5858 6.99981C12.5858 6.8678 12.5597 6.7371 12.5089 6.61524C12.4581 6.49338 12.3837 6.38278 12.29 6.28982C12.1026 6.10356 11.8492 5.99902 11.585 5.99902C11.3208 5.99902 11.0674 6.10356 10.88 6.28982L6.59 10.5898C6.21441 10.9632 6.00223 11.4702 6 11.9998C6.00487 12.5259 6.21684 13.0289 6.59 13.3998L10.88 17.6998C10.9732 17.7924 11.0838 17.8657 11.2054 17.9155C11.3269 17.9654 11.4571 17.9908 11.5885 17.9904C11.7199 17.9899 11.8499 17.9636 11.9712 17.9128C12.0924 17.8621 12.2024 17.788 12.295 17.6948C12.3876 17.6016 12.4609 17.491 12.5107 17.3694C12.5606 17.2479 12.586 17.1177 12.5856 16.9863C12.5851 16.8549 12.5588 16.7249 12.508 16.6036C12.4573 16.4824 12.3832 16.3724 12.29 16.2798L9 12.9998H19C19.2652 12.9998 19.5196 12.8945 19.7071 12.7069C19.8946 12.5194 20 12.265 20 11.9998C20 11.7346 19.8946 11.4802 19.7071 11.2927C19.5196 11.1052 19.2652 10.9998 19 10.9998Z"
                                                fill="white" />
                                    </svg>

                                </div>
                            </div>
                            <div class="middle-banner-info">
                                <div class="cat-title">
                                    <div class="bann-title">
                                        <span>{{$only_product_offer->category->details->title}}</span>
                                        <h2>{{$only_product_offer->name}}</h2>
                                    </div>
                                    <div class="bann-price">
                                        @if($only_product_offer->cost_discount)
                                            <span>{{__('web.'.$only_product_offer->type)}}</span>
                                            <span>{{ $only_product_offer->cost_discount }} {{ __('web.L.E') }} /</span>
                                            <span>{{ $only_product_offer->cost }} {{ __('web.L.E') }}  </span>
                                        @else
                                             <span>{{__('web.'.$only_product_offer->type)}}</span>
                                             <span>{{ $only_product_offer->cost }} {{ __('web.L.E') }} /</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="save-stars">
                                    <div class="bann-stars">
                                        @if ($only_product_offer->rates['rate'] != 0)

                                            @include('web.component.rate.rateComponent', [
                                             'rate' => $only_product_offer->rates['rate'],
                                             ])
                                        @endif
                                    </div>
                                    <div class="bann-save">
                                        {{ __('web.save') }} {{ 100 - $only_product_offer->percentage }}%
                                    </div>
                                </div>
                            </div>
                            <div class="middle-banner-buttons">
                                <button data-id="{{ $only_product_offer->id }}" onclick="addCart(this)">
                                    <span>{{__('web.add_to_cart')}}</span>
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M15.1699 15.5625C14.0654 15.5625 13.1699 16.4579 13.1699 17.5625C13.1699 18.6671 14.0654 19.5625 15.1699 19.5625C16.2745 19.5625 17.1699 18.6671 17.1699 17.5625C17.1699 16.4579 16.2745 15.5625 15.1699 15.5625ZM15.1699 15.5625H7.46387C7.00281 15.5625 6.77185 15.5625 6.58203 15.4805C6.41458 15.4081 6.2693 15.2916 6.16346 15.143C6.04482 14.9765 5.99711 14.7538 5.90267 14.313L3.44141 2.82715C3.34476 2.37613 3.29579 2.15088 3.17578 1.98242C3.06994 1.83385 2.92469 1.71691 2.75724 1.64455C2.56738 1.5625 2.33771 1.5625 1.87646 1.5625H1.16992M4.16992 4.5625H17.0431C17.7649 4.5625 18.1255 4.5625 18.3677 4.71286C18.5799 4.84456 18.7352 5.05112 18.803 5.2915C18.8803 5.56593 18.781 5.91246 18.5809 6.60596L17.1963 11.406C17.0767 11.8206 17.0169 12.0275 16.8955 12.1814C16.7884 12.3172 16.6471 12.4235 16.487 12.4888C16.306 12.5625 16.091 12.5625 15.662 12.5625H5.90039M6.16992 19.5625C5.06535 19.5625 4.16992 18.6671 4.16992 17.5625C4.16992 16.4579 5.06535 15.5625 6.16992 15.5625C7.27449 15.5625 8.16992 16.4579 8.16992 17.5625C8.16992 18.6671 7.27449 19.5625 6.16992 19.5625Z"
                                                stroke="white" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                    </svg>

                                </button>
                                <div>
                                    <a href="#" class="openProductModal" data-id="{{ $only_product_offer->id }}" onclick="toggleFavorite(this)">

                                        <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M10.5 4.67381C8.5 -0.0206301 1.5 0.47937 1.5 6.4794C1.5 12.4794 10.5 17.4796 10.5 17.4796C10.5 17.4796 19.5 12.4794 19.5 6.4794C19.5 0.47937 12.5 -0.0206301 10.5 4.67381Z"
                                                    stroke="#FD9636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="del">
                                @foreach($only_product_offer->items as $item)
                                    <strong style="color: #fd9636">{{$item->details->name}}</strong><br>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endif
                <div class="side-banner-col">
                    @foreach($left_products_cobon as $product)
                        @include('web.component.product.productCobon',['product'=>$product])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @foreach($categories_all as $key => $row)
        @include('web.component.category.categoryComponent',[
            'title' => $row->title,
            'products' => $row->product_fourth(),
            'url' =>  route('web.shop', $row->slug) ,
            'index' => $key + 4
        ])
        @if($key % 2 == 0)
            @if($key % 4 == 0)
                <section class="container">
                    <div class="home-banner-2-wrapper">
                        <div class="home-banner-content">
                            <div>
                                <a href="{{ route($banners[$key+5]->url['first'], $banners[$key+5]->url['second'] ?? '') }}">
                                    <img src="{{asset($banners[$key+5]->image)}}" alt="{{$banners[$key+5]->name}}" name="{{$key+5}}" loading="lazy">
                                </a>
                            </div>
                            <div>
                                <a href="{{ route($banners[$key+6]->url['first'], $banners[$key+6]->url['second'] ?? '') }}">
                                    <img src="{{asset($banners[$key+6]->image)}}" alt="{{$banners[$key+6]->name}}" name="{{$key+6}}" loading="lazy">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            @else
                <section class="container">
                    <div class="home-banner-2-wrapper">
                        <div class="home-banner-content-reversed">
                            <div>
                                <a href="{{ route($banners[$key+5]->url['first'], $banners[$key+5]->url['second'] ?? '') }}">
                                    <img src="{{asset($banners[$key+5]->image)}}" alt="{{$banners[$key+5]->name}}" name="{{$key+5}}" loading="lazy">

                                </a>
                            </div>
                            <div>
                                <a href="{{ route($banners[$key+6]->url['first'], $banners[$key+6]->url['second'] ?? '') }}">
                                    <img src="{{asset($banners[$key+6]->image)}}" alt="{{$banners[$key+6]->name}}" name="{{$key+6}}" loading="lazy">
                                </a>

                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endif

    @endforeach
    <section class="container">
        <div class="home-articals-wrapper">
            <h2>{{__('web.view_our_latest_articles')}}</h2>
            <div class="home-articals-content">
                @foreach($articles as $article)
                    @include('web.component.blog.blogComponent',['article'=>$article])

                @endforeach
            </div>
        </div>
    </section>

    <section class="container">
        <div class="home-banner-4-wrapper">
            <div class="home-banner-content">
                <div class="small-bann">
                    <div>
                        <a href="{{ route($banners[25]->url['first'], $banners[25]->url['second'] ?? '') }}">
                            <img src="{{$banners[25]->image}}" alt="{{$banners[25]->name}}" loading="lazy">
                        </a>
                    </div>
                    <div>
                        <a href="{{ route($banners[26]->url['first'], $banners[26]->url['second'] ?? '') }}">
                            <img src="{{$banners[26]->image}}" alt="{{$banners[26]->name}}" loading="lazy">
                        </a>

                    </div>
                </div>
                <div class="big-bann">
                    <a href="{{ route($banners[27]->url['first'], $banners[27]->url['second'] ?? '') }}">
                        <img src="{{$banners[27]->image}}" alt="{{$banners[27]->name}}" loading="lazy">
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('container_js')
    <script src="{{url('')}}/assets/web/ASSets/js/home.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            // Get the timer element and the total seconds
            const timerElement = document.querySelector(".timer");
            let countdownTime = parseInt(timerElement.getAttribute("data-total-seconds"), 10);

            const daysElement = document.getElementById("days");
            const hoursElement = document.getElementById("hours");
            const minutesElement = document.getElementById("minutes");
            const secondsElement = document.getElementById("seconds");

            function updateTimer() {
                if (countdownTime >= 0) {
                    let days = Math.floor(countdownTime / (60 * 60 * 24));
                    let hours = Math.floor((countdownTime % (60 * 60 * 24)) / (60 * 60));
                    let minutes = Math.floor((countdownTime % (60 * 60)) / 60);
                    let seconds = countdownTime % 60;

                    daysElement.textContent = days < 10 ? "0" + days : days;
                    hoursElement.textContent = hours < 10 ? "0" + hours : hours;
                    minutesElement.textContent = minutes < 10 ? "0" + minutes : minutes;
                    secondsElement.textContent = seconds < 10 ? "0" + seconds : seconds;

                    countdownTime--;
                } else {
                    clearInterval(timerInterval);  // Stop the countdown when it reaches zero
                }
            }

            const timerInterval = setInterval(updateTimer, 1000);
            updateTimer();  // Initial call to show the timer immediately
        });

    </script>
@endsection
