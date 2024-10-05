@extends('web.layouts.layout')

@section('container_content')

{{--     @include('web.component.popups.login.login-popup',['status'=>'hide'])--}}
{{--     @include('web.component.popups.signup.signup',['status'=>'show'])--}}
{{--     @include('web.component.popups.phone.add-number',['status'=>'show'])--}}
    {{--    @include('web.component.popups.phone.add-otp',['status'=>'hide'])--}}

    @include('web.layouts.header')

    {{-- @include('web.layouts.sidebar') --}}

    @yield('add_content')

    <main class="main " style="overflow: hidden">
        @if (request()->route()->getName() !== 'web.index')
            <div class="sec-header">
                <div class="container">
                    <ul class='categories-shop'>
                        @foreach ($categoriesMain as $index => $row)
                            <li class='categories-item' onmouseover="showContent('content{{ $index + 1 }}-1')"
                                onmouseout="hideContent('content{{ $index + 1 }}-1')" style="font-size:15px">
                                {{ $row->title }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="box-categories-shop">
                    @foreach ($categoriesMain as $index => $row)
                        <div id="content{{ $index + 1 }}-1" class="hidden-content tob-header"
                            onmouseover="showContent('content{{ $index + 1 }}-1')"
                            onmouseout="hideContent('content{{ $index + 1 }}-1')">
                            <div class="main">
                                <div class="main-items main-items-tags " style="height:200px">
                                    <div class="tags">
                                        <ul class='main-cat'>
                                            @foreach ($row->models as $model)
                                                <li class='cat-item' style="list-style:circle;"><a
                                                        href="{{ route('web.shop', $model->slug) }}" Style="color:black;">
                                                        {{ $model->details->title }}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <span class='view'><a href="{{ route('web.shop', $row->slug) }}"
                                            Style="color:#fd9636">{{ __('web.view_all') }}</a></span>
                                </div>
                                <div class="image" style="background-image: url({{ asset($row->banner) }});">

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endif

        {{-- cart dropdown --}}
        <div class="container" style=" position: relative;">

            <div class="dropdown-cart-container">

                <div class="dropdown-cart">
                    <div class="dropdown-cart-header">
                        <div class="cart-title">
                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.68421 18.1842C7.35631 18.1842 7.03577 18.2814 6.76313 18.4636C6.49049 18.6458 6.278 18.9047 6.15252 19.2077C6.02703 19.5106 5.9942 19.8439 6.05817 20.1655C6.12214 20.4871 6.28004 20.7826 6.5119 21.0144C6.74376 21.2463 7.03917 21.4042 7.36077 21.4681C7.68237 21.5321 8.01572 21.4993 8.31866 21.3738C8.6216 21.2483 8.88053 21.0358 9.0627 20.7632C9.24487 20.4905 9.34211 20.17 9.34211 19.8421C9.34211 19.4024 9.16744 18.9807 8.85652 18.6698C8.5456 18.3589 8.12391 18.1842 7.68421 18.1842ZM19.2895 14.8684H6.02632C5.73318 14.8684 5.45205 14.752 5.24478 14.5447C5.0375 14.3374 4.92105 14.0563 4.92105 13.7632C4.92105 13.47 5.0375 13.1889 5.24478 12.9816C5.45205 12.7743 5.73318 12.6579 6.02632 12.6579H15.4113C16.1313 12.6556 16.8312 12.42 17.406 11.9864C17.9808 11.5529 18.3997 10.9447 18.5998 10.2531L20.3521 4.11963C20.3991 3.95513 20.4073 3.78197 20.376 3.61377C20.3447 3.44558 20.2748 3.28694 20.1718 3.15035C20.0688 3.01375 19.9355 2.90293 19.7824 2.82661C19.6293 2.75029 19.4606 2.71055 19.2895 2.71053H5.73792C5.50912 2.06655 5.08733 1.50878 4.53004 1.11322C3.97274 0.717646 3.30704 0.503516 2.62364 0.5H1.60526C1.31213 0.5 1.031 0.616447 0.823724 0.823724C0.616447 1.031 0.5 1.31213 0.5 1.60526C0.5 1.8984 0.616447 2.17952 0.823724 2.3868C1.031 2.59408 1.31213 2.71053 1.60526 2.71053H2.62364C2.86357 2.71136 3.09678 2.7899 3.28834 2.93438C3.4799 3.07885 3.61951 3.28149 3.68626 3.51195L3.85815 4.11403L3.85842 4.11963L5.67175 10.4663C4.82795 10.557 4.05107 10.9679 3.50108 11.6142C2.9511 12.2606 2.66987 13.0932 2.71531 13.9406C2.76075 14.7881 3.1294 15.5859 3.74534 16.1697C4.36129 16.7535 5.17765 17.0789 6.02632 17.0789H19.2895C19.5826 17.0789 19.8637 16.9625 20.071 16.7552C20.2783 16.5479 20.3947 16.2668 20.3947 15.9737C20.3947 15.6805 20.2783 15.3994 20.071 15.1921C19.8637 14.9849 19.5826 14.8684 19.2895 14.8684ZM17.8242 4.92105L16.4745 9.6454C16.4078 9.87605 16.2682 10.0789 16.0765 10.2235C15.8848 10.3681 15.6514 10.4466 15.4113 10.4474H7.96538L7.6836 9.46124L6.3871 4.92105H17.8242ZM16.5263 18.1842C16.1984 18.1842 15.8779 18.2814 15.6052 18.4636C15.3326 18.6458 15.1201 18.9047 14.9946 19.2077C14.8691 19.5106 14.8363 19.8439 14.9003 20.1655C14.9642 20.4871 15.1221 20.7826 15.354 21.0144C15.5859 21.2463 15.8813 21.4042 16.2029 21.4681C16.5245 21.5321 16.8578 21.4993 17.1608 21.3738C17.4637 21.2483 17.7226 21.0358 17.9048 20.7632C18.087 20.4905 18.1842 20.17 18.1842 19.8421C18.1842 19.4024 18.0095 18.9807 17.6986 18.6698C17.3877 18.3589 16.966 18.1842 16.5263 18.1842Z"
                                    fill="#425A8B" />
                            </svg>
                            <span>{{ __('web.cart_items') }}</span>
                        </div>
                        <div class="dropdown-cart-close">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.61499 7.00004L13.86 2.75504C14.017 2.62057 14.1445 2.45509 14.2346 2.26899C14.3246 2.0829 14.3752 1.8802 14.3832 1.67362C14.3912 1.46704 14.3564 1.26104 14.2809 1.06855C14.2055 0.876066 14.0911 0.701245 13.945 0.555063C13.7988 0.40888 13.624 0.294494 13.4315 0.219082C13.239 0.14367 13.033 0.108861 12.8264 0.11684C12.6198 0.12482 12.4171 0.175415 12.231 0.26545C12.0449 0.355485 11.8795 0.483016 11.745 0.640039L7.49999 4.88504L3.25499 0.640039C2.96803 0.394299 2.59892 0.265889 2.22141 0.280471C1.84389 0.295053 1.48578 0.451551 1.21864 0.718693C0.951499 0.985835 0.795 1.34394 0.780418 1.72146C0.765836 2.09897 0.894246 2.46809 1.13999 2.75504L5.38499 7.00004L1.13999 11.245C0.860609 11.5261 0.703796 11.9063 0.703796 12.3025C0.703796 12.6988 0.860609 13.079 1.13999 13.36C1.42103 13.6394 1.80121 13.7962 2.19749 13.7962C2.59376 13.7962 2.97394 13.6394 3.25499 13.36L7.49999 9.11504L11.745 13.36C12.026 13.6394 12.4062 13.7962 12.8025 13.7962C13.1988 13.7962 13.5789 13.6394 13.86 13.36C14.1394 13.079 14.2962 12.6988 14.2962 12.3025C14.2962 11.9063 14.1394 11.5261 13.86 11.245L9.61499 7.00004Z"
                                    fill="#8E8E8E" />
                            </svg>
                        </div>
                    </div>
                    <hr style="color: #aabfff; margin-bottom: 0">
                    <div class="items" id="carts">
       

                    </div>
                    <div class="cart-total">
                        <div class="total-row">
                            <div class="">
                                <span style="color: #4B4B4B" class="font-md-bold ">{{ __('web.total') }}</span>
                            </div>
                            <div class="">
                                <span style="color: #000" class="font-md-bold " id="total_cart">&nbsp;</span>
                                <span style="color: #000" class="font-md-bold ">{{ $currency->symbol }}
                                </span>
                            </div>
                        </div>
                        <hr style="margin: 5px 0; color: #aabfff">
                        <div class="total-row">
                            {{-- <div class="dropdown-cart-btn to-checkout-btn">
                                <a href="{{ route('order.index') }}">{{ __('web.checkout') }}</a>
                            </div> --}}
                            <div class="dropdown-cart-btn to-checkout-btn" style="margin: auto;">
                                <a href="{{ route('cart.index') }}">{{ __('web.view_cart') }}</a>
                            </div>
                        </div>
                        <div class="continu-shopping"><a
                                href="{{ route('web.shop') }}">{{ __('web.or_continue_shopping') }}</a></div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <section class="section-box mt-20 mb-50">
            <div class="container">
                <ul class="list-col-5">
                    @foreach ($footer_cards as $row)
                        <li>
                            <div class="item-list">
                                <div class="icon-left"><img src="{{ asset($row->image) }}" loading="lazy"
                                        alt="Furniture Hub">
                                </div>
                                <div class="info-right">
                                    <h5 class="font-lg-bold color-gray-100">{{ $row->title }}</h5>
                                    <p class="font-sm color-gray-500">{{ $row->description }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
        

    </main>


    <footer class="footer" style="background-color:#E8E9E4">
        <div class="container">
            <div class="footer-content">
                <div class="footer-top">
                    <div class="footer-subscribe">
                        <div class="subscribe-text">
                            <h4 class="" style="color:black">{{__('web.get_a_surprise_discount')}}</h4>
                            <span class="" style="color:black">{{__('web.join_our_email_subscription_now')}}</span>
                        </div>
                        <form onsubmit="formAction(this)" method="POST" action="{{ route('web.newsletter') }}">
                            @CSRF
                            <div class="subscribe-search">
                                <input type="email" name="email" placeholder="{{__('web.enter_your_email')}}" />
                                <button>{{__('web.subscribe')}}</button>
                            </div>
                        </form>
                    </div>
                    <div class="subscribe-download-app">
                        <div class="download-text">
                            <h4 style="color:black">{{__('web.download_your_app')}}</h4>
                            <span style="color:black">{{__('web.follow_the_offers_first')}}</span>
                        </div>
                        <div class="download-image">
                            <div class="">
                                <a href="{{ settings('google') }}" target="_blank">
                                    <img src="{{asset('storage/assets/google-play.png')}}" alt="Furniture Hub"/>
                                </a>
                            </div>
                            <div class="">
                                <a href="{{ settings('apple') }}" target="_blank">
                                    <img src="{{asset('storage/assets/app-store.png')}}" alt="Furniture Hub"/>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-body">
                    <div class="footer-aboout-us">
                        <h4 style="color:black">{{__('web.about_us')}} <span></span></h4>
                        <p style="color:black">{{__('web.shop_now_footer')}}</p>
                        <div class="about-email">
                            <i class="fas fa-envelope"></i>
                            <span><a href="mail:info@furniturehubapp.com" target="_blank" style="color:black">info@furniturehubapp.com</a></span>
                        </div>
                        <div class="about-phone">
                            <i class="fas fa-phone"></i>
                            <span><a href="tel:01060552252" target="_blank" style="color:black">010-605-52252</a></span>
                        </div>
                    </div>
                    <div class="footer-logo">
                        <div class="footer-logo-img">
                            @if (getCurrentLocale() == 'en')
                                <img src="{{ asset(settings('logo')) }}" alt="Furniture Hub">
                            @else
                                <img src="{{ asset(settings('logo_ar')) }}" alt="Furniture Hub">
                            @endif
                        </div>
                        <div class="footer-follow">
                            <span style="color:black">{{__('web.follow_us')}}</span>
                            <div class="follow-icons">
                                <a href="{{ settings('facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://wa.me/201060552252" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                <a href="{{ settings('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                {{-- <a href="http://m.me/Furniturehub.eg" target="_blank"><i class="fab fa-messanger"></i></a> --}}
                                <a href="{{ settings('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{ settings('linkedin') }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.pinterest.com/furniturehub_eg/" target="_blank"><i class="fab fa-pinterest"></i></a>



                            </div>
                        </div>
                    </div>
                    <div class="footer-account">
                        <h4 style="color:black">{{__('web.main_pages')}} <span></span></h4>
                        <ul>
                            <li><a href="{{ route('web.blog') }}" target="_blank" style="color:black" title="{{__('web.read_our_latest_blog')}}">{{ __('web.blog') }}</a></li>
                            <li><a href="{{ route('web.shop') }}" target="_blank" style="color:black" title="{{__('web.shop_our_products')}}">{{ __('web.products') }}</a></li>
                            <li><a href="{{ route('web.contact') }}" target="_blank" style="color:black" title="{{__('web.contact_us_for_inquiries')}}">{{ __('web.contact_us') }}</a></li>
                            <li><a href="{{ route('web.privacy') }}" target="_blank" style="color:black" title="{{__('web.read_our_return_policy')}}">{{ __('web.return_policy') }}</a></li>
                            <li><a href="{{ route('web.faq') }}" target="_blank" style="color:black" title="{{__('web.find_answers_to_frequently_asked_questions')}}">{{ __('web.FAQs') }}</a></li>

                        </ul>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="bottom-text">
                        <div>
                            {{__('web.privacy_policy')}}</div>
                        <div>
                            |</div>
                        <div>
                            {{__('web.terms_conditions')}}</div>
                    </div>
                    <div class="bottom-payment">
                        <img src="{{asset('storage/assets/footer-payments.png')}}" alt="Furniture Hub payment">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
@endsection
