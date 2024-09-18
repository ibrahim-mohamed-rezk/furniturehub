@extends('web.layouts.container')



@section('styles')
<link rel="stylesheet" href="{{url('') }}/assets/web/ASSets_Ar/css/custom/home.css">
@endsection

@section('content')
<header class="container">
    <div class="header-wrapper">
        <div class="header-slider-1">
            <div class="swiper-wrapper">
                @php
                $items = [
                url('/storage/assets/home/slider-1.png'),
                url('/storage/assets/home/slider-1.png'),
                url('/storage/assets/home/slider-1.png'),
                url('/storage/assets/home/slider-1.png'),
                url('/storage/assets/home/slider-1.png'),
                ];
                @endphp

                @foreach($items as $item)
                <div class="swiper-slide">
                    <div class="slide-container">
                        <img src="{{ $item }}" alt="Slider Image">
                    </div>
                </div>
                @endforeach

            </div>
            <div class="header-slider-1-pagination">
                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button"
                    aria-label="Go to slide 1"></span>
            </div>

            <div class="header-slider-1-next">
                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 4.99993H11L7.71 1.70994C7.61627 1.61697 7.54188 1.50637 7.49111 1.38451C7.44034 1.26265 7.4142 1.13195 7.4142 0.999937C7.4142 0.867925 7.44034 0.73722 7.49111 0.61536C7.54188 0.493501 7.61627 0.382901 7.71 0.289938C7.89736 0.103687 8.15081 -0.000854492 8.415 -0.000854492C8.67919 -0.000854492 8.93264 0.103687 9.12 0.289938L13.41 4.58993C13.7856 4.96328 13.9978 5.47035 14 5.99993C13.9951 6.52603 13.7832 7.02903 13.41 7.39993L9.12 11.6999C9.02676 11.7925 8.9162 11.8658 8.79463 11.9157C8.67306 11.9655 8.54286 11.9909 8.41146 11.9905C8.28007 11.99 8.15005 11.9637 8.02884 11.913C7.90762 11.8623 7.79758 11.7882 7.705 11.6949C7.61242 11.6017 7.53911 11.4911 7.48925 11.3696C7.4394 11.248 7.41398 11.1178 7.41444 10.9864C7.41491 10.855 7.44125 10.725 7.49196 10.6038C7.54267 10.4825 7.61676 10.3725 7.71 10.2799L11 6.99993H1C0.734783 6.99993 0.480429 6.89457 0.292892 6.70704C0.105356 6.5195 0 6.26515 0 5.99993C0 5.73471 0.105356 5.48036 0.292892 5.29283C0.480429 5.10529 0.734783 4.99993 1 4.99993Z"
                        fill="white" />
                </svg>
            </div>

            <div class="header-slider-1-preve">
                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                @for ($i = 0; $i < 50; $i++) 
                    <div class="swiper-slide">
                        <a href="#" class="slide-container">
                            <svg width="82" height="119" viewBox="0 0 82 119" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.0839 20.4864C14.8036 15.786 18.2308 11.954 22.8221 10.7162L59.5956 0.802412C66.8977 -1.16617 74.1782 4.02888 74.6915 11.5742L81.1282 106.185C81.5998 113.118 76.1039 119 69.1559 119H12.9772C5.62606 119 0.002859 112.45 1.11546 105.184L14.0839 20.4864Z"
                                    fill="#E4EDED" />
                            </svg>
                            <img class="product-image" src="{{url('')}}/storage/assets/home/cat-pro-3.png" alt="cat-pro-1">
                            <h3>Children’s Room</h3>
                        </a>
                    </div>
                @endfor
        </div>

        <div class="catigory-slider-2-next">
            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 4.99993H11L7.71 1.70994C7.61627 1.61697 7.54188 1.50637 7.49111 1.38451C7.44034 1.26265 7.4142 1.13195 7.4142 0.999937C7.4142 0.867925 7.44034 0.73722 7.49111 0.61536C7.54188 0.493501 7.61627 0.382901 7.71 0.289938C7.89736 0.103687 8.15081 -0.000854492 8.415 -0.000854492C8.67919 -0.000854492 8.93264 0.103687 9.12 0.289938L13.41 4.58993C13.7856 4.96328 13.9978 5.47035 14 5.99993C13.9951 6.52603 13.7832 7.02903 13.41 7.39993L9.12 11.6999C9.02676 11.7925 8.9162 11.8658 8.79463 11.9157C8.67306 11.9655 8.54286 11.9909 8.41146 11.9905C8.28007 11.99 8.15005 11.9637 8.02884 11.913C7.90762 11.8623 7.79758 11.7882 7.705 11.6949C7.61242 11.6017 7.53911 11.4911 7.48925 11.3696C7.4394 11.248 7.41398 11.1178 7.41444 10.9864C7.41491 10.855 7.44125 10.725 7.49196 10.6038C7.54267 10.4825 7.61676 10.3725 7.71 10.2799L11 6.99993H1C0.734783 6.99993 0.480429 6.89457 0.292892 6.70704C0.105356 6.5195 0 6.26515 0 5.99993C0 5.73471 0.105356 5.48036 0.292892 5.29283C0.480429 5.10529 0.734783 4.99993 1 4.99993Z"
                    fill="black" />
            </svg>
        </div>

        <div class="catigory-slider-2-preve">
            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M13 4.99993H3L6.29 1.70994C6.38373 1.61697 6.45812 1.50637 6.50889 1.38451C6.55966 1.26265 6.5858 1.13195 6.5858 0.999937C6.5858 0.867925 6.55966 0.73722 6.50889 0.61536C6.45812 0.493501 6.38373 0.382901 6.29 0.289938C6.10264 0.103687 5.84919 -0.000854492 5.585 -0.000854492C5.32081 -0.000854492 5.06736 0.103687 4.88 0.289938L0.59 4.58993C0.214412 4.96328 0.00223279 5.47035 0 5.99993C0.00486659 6.52603 0.216844 7.02903 0.59 7.39993L4.88 11.6999C4.97324 11.7925 5.0838 11.8658 5.20537 11.9157C5.32694 11.9655 5.45714 11.9909 5.58854 11.9905C5.71993 11.99 5.84995 11.9637 5.97116 11.913C6.09238 11.8623 6.20242 11.7882 6.295 11.6949C6.38758 11.6017 6.46089 11.4911 6.51075 11.3696C6.5606 11.248 6.58602 11.1178 6.58556 10.9864C6.58509 10.855 6.55875 10.725 6.50804 10.6038C6.45733 10.4825 6.38324 10.3725 6.29 10.2799L3 6.99993H13C13.2652 6.99993 13.5196 6.89457 13.7071 6.70704C13.8946 6.5195 14 6.26515 14 5.99993C14 5.73471 13.8946 5.48036 13.7071 5.29283C13.5196 5.10529 13.2652 4.99993 13 4.99993Z"
                    fill="black" />
            </svg>
        </div>
        <div class="catigory-slider-2-scrollbar swiper-scrollbar"></div>
    </div>
    </div>
</section>

<section class="container">
    <div class="flash-sales-wrapper">
        <h2>Flash Sales</h2>
        <div class="flash-sales-slider-3">
            <div class="swiper-wrapper">

                @for ($i = 0; $i < 20; $i++)
                <div class="swiper-slide">
                    <div class="slide-container">
                        hi
                    </div>
                </div>
                @endfor

            </div>
        </div>
    </div>
</section>

@endsection
@section('container_js')
<script>
    var swiper = new Swiper(".header-slider-1", {
        loop: true,
        autoplay: {
            delay: 8000,
        },
        
        pagination: {
            el: ".header-slider-1-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".header-slider-1-next",
            prevEl: ".header-slider-1-preve",
        },
    });

    function calculateSlidesPerView(width, swiperContainer) {
        const containerWidth = swiperContainer.clientWidth;
        const slideWidth = width; 
        const slidesPerView = Math.floor(containerWidth / slideWidth);
        return slidesPerView;
    }

    var swiper = new Swiper(".catigory-slider-2", {
        spaceBetween: 10,
        slidesPerView: calculateSlidesPerView(116, document.querySelector('.catigory-slider-2')),
        navigation: {
            nextEl: ".catigory-slider-2-next",
            prevEl: ".catigory-slider-2-preve",
        },
        scrollbar: {
            el: '.catigory-slider-2-scrollbar',
            draggable: true,
        },
        on: {
            resize: function () {
                this.params.slidesPerView = calculateSlidesPerView(116, document.querySelector('.catigory-slider-2'));
                this.update();
            }
        }
    });

    var swiper = new Swiper(".flash-sales-slider-3", {
        spaceBetween: 30,
        slidesPerView: calculateSlidesPerView(286, document.querySelector('.flash-sales-slider-3')),
        on: {
            resize: function () {
                this.params.slidesPerView = calculateSlidesPerView(286, document.querySelector('.flash-sales-slider-3'));
                this.update();
            }
        }
    });
</script>
@endsection