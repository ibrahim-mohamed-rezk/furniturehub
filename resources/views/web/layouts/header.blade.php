
{{-- install app above header --}}
<div class="get-app-container" id="installPopup">
    <div class="logo">
        <img src="https://furniturehubapp.com/public/storage/icon_pop_up1.svg" alt="logo">
    </div>
    <div class="content">
        <h2>فرنتشر هب | لتجربة شراء اسهل</h2>
        <p>حمل التطبيق الآن واحصل على العروض الحصرية</p>
        <div class="rating">
            <div class="stars">
                <i class="fa fa-star" style="font-size: 12px"></i>
                <i class="fa fa-star" style="font-size: 12px"></i>
                <i class="fa fa-star" style="font-size: 12px"></i>
                <i class="fa fa-star" style="font-size: 12px"></i>
                <i class="fas fa-star-half-alt" style="font-size: 12px"></i>
            </div>
            <div class="rating-num">(2,500)</div>
        </div>
    </div>
    <button class="button" id="downloadAppLink"
        onclick="handleDownload('https://apps.apple.com/us/app/furniture-hub/id1464607582', 'https://play.google.com/store/apps/details?id=org.furniture.hub.app')">حمل
        تطبيقك</button>
    <div class="close" onclick=" handleClose()">×</div>
</div>


{{-- install app popup --}}
{{-- @if (getCurrentLocale() == 'en')
<div id="installPopup" class="install-popup">
    <p><img src="{{ asset('storage/pop_up3/banner--E.png') }}" alt=""></p>
    <a href="#" id="downloadAppLink" onclick="handleDownload('{{ settings('apple') }}', '{{ settings('google') }}')">
        <button class="download-button">{{ __('web.download_your_app') }}</button>
    </a>
    <span class="close-icon" onclick="hideInstallPopup()">✖</span>
</div>
@else
<div id="installPopup" class="install-popup">
    <p><img src="{{ asset('storage/pop_up3/banner--A.png') }}" alt=""></p>
    <a href="#" id="downloadAppLink" onclick="handleDownload('{{ settings('apple') }}', '{{ settings('google') }}')">
        <button class="download-button">{{ __('web.download_your_app') }}</button>
    </a>
    <span class="close-icon" onclick="hideInstallPopup()">✖</span>
</div>
@endif --}}



{{-- topbar --}}
<div class="topbar">
    <div class="container-topbar">
        <div class="menu-topbar-left d-none d-xl-block">
            <ul class="nav-small">
                <li><a class="font-xs" href="{{ route('web.about_us') }}">{{ __('web.about_us') }}</a></li>
                <li><a class="font-xs" href="{{ route('web.customization') }}">{{ __('web.customization') }}</a></li>
                <li><a class="font-xs" href="{{ route('web.seller_register') }}">{{ __('web.open_a_shop') }}</a></li>
                <li><a class="font-xs"
                        href="{{ route('web.quantities') }}">{{ __('web.wholesale_orders_and_quantities') }}</a></li>
                <li><a class="font-xs" href="{{ route('web.faq') }}">{{ __('web.FAQs') }}</a></li>

            </ul>
        </div>
        <div class="info-topbar text-center d-none d-xl-block"></div>
        <div class="menu-topbar-right"><span class="font-xs color-brand-3">{{ __('web.need_help_call_us') }}</span><span
                class="font-sm-bold color-success"><a
                    href="tel:{{ settings('phone') }}">{{ settings('phone') }}</a></span>
            <div class="dropdown dropdown-language">
                <button class="btn dropdown-toggle" id="dropdownPage" type="button" data-bs-toggle="dropdown"
                    aria-expanded="true" data-bs-display="static">
                    <span class="dropdown-right font-xs color-brand-3">
                        <img src="{{ asset($language->image) }}" loading="lazy" alt="Furniture Hub">
                        {{ $language->name }}
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownPage" data-bs-popper="static">
                    @foreach ($languages as $language)
                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedUrl($language->local) }}">
                        <img src="{{ asset($language->image) }}" loading="lazy" alt="Furniture Hub">
                        {{ $language->name }}
                    </a>
                    @endforeach
                </ul>
            </div>
            <div onclick="switchMode()">
                darck mode
            </div>
        </div>
    </div>
</div>


{{-- header --}}
<header id="header" class="header header-container sticky-bar">
    <div class="container">
        <div class="main-header">
            <!--  mobile menu button to open sidebar   -->
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
                <img src="{{asset('storage/assets/Vector.png')}}" />
            </div>
            <div class="header-left">
                @if (getCurrentLocale() == 'en')
                <div class="header-logo mx-2">
                    <a class="d-flex" href="{{ route('web.index') }}">
                        <img alt="Furniture Hub" src="{{ asset(settings('logo')) }}" loading="lazy" id="logo">
                    </a>
                </div>
                @else
                <div class="header-logo mx-2">
                    <a class="d-flex" href="{{ route('web.index') }}">
                        <img alt="Furniture Hub" src="{{ asset(settings('logo_ar')) }}" loading="lazy" id="logo">
                    </a>
                </div>
                @endif

                <div class="header-search">
                    <div class="box-header-search">
                        <form class="form-search" method="get" action="{{ route('web.shop') }}">
                            <div class="box-category">

                                <select name="category_id" class="select-active select2-hidden-accessible "
                                    onchange="redirectOnChange(this)">
                                    <option value="">{{ __('web.all_categories') }}</option>
                                    @foreach ($categoriesMain as $row)
                                    <option
                                        {{ isset($request) ? ($request->category_id == $row->id ? 'selected' : '') : '' }}
                                        value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-keysearch">
                                <input class="form-control font-xs" name="product" type="text" @isset($request)
                                    value="{{ $request->product }}" @endisset
                                    placeholder="{{ __('web.search_for_items') }}">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li onmouseover="showContent('content1')" onmouseout="hideContent('content1')">
                                <a href="{{ route('web.index') }}">{{ __('web.home') }}</a>
                                <!-- <span class="box-menue"></span> -->
                            </li>
                            <li onmouseover="showContent('content2')" onmouseout="hideContent('content2')"><a
                                    href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>


                            {{-- <li class="has-children"><a href="shop-vendor-list.html">{{ __('web.vendors') }}</a>
                            <ul class="sub-menu">
                                <!--<li><a href="shop-vendor-list.html">{{ __('web.products_by_furniture') }}</a></li>-->
                                <!--<li><a href="shop-vendor-single.html">{{ __('web.products_by_vendors') }}</a></li>-->
                                <li><a href="shop-vendor-single.html">{{ __('web.customizations') }}</a></li>
                            </ul>
                            </li> --}}

                            <li onmouseover="showContent('content3')" onmouseout="hideContent('content3')"><a
                                    href="{{ route('web.blog') }}">{{ __('web.blog') }}</a></li>

                            <li onmouseover="showContent('content4')" onmouseout="hideContent('content4')"><a
                                    href="{{ route('web.contact') }}">{{ __('web.contact_us') }}</a></li>
                        </ul>
                    </nav>

                </div>
                @if (Auth::user())
                <div class="header-shop">
                    <div class="icons-container" id="icon-header" class="pl-10">
                        {{-- header compare icon --}}
                        <a class=" icon-list icon-compare" href="{{ route('compare.index') }}"
                            title="{{ __('web.compare') }}">
                            <span>&nbsp;</span>
                            <svg width="23" height="23" viewBox="0 0 21 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M9.89474 14.15V16.85C9.89474 19.1 8.99475 20 6.74474 20H4.04474C1.79474 20 0.894745 19.1 0.894745 16.85V14.15C0.894745 11.9 1.79474 11 4.04474 11H6.74474C8.99475 11 9.89474 11.9 9.89474 14.15Z"
                                    fill="#425A8B" />
                                <path opacity="0.4"
                                    d="M16.3947 9C18.88 9 20.8947 6.98528 20.8947 4.5C20.8947 2.01472 18.88 0 16.3947 0C13.9094 0 11.8947 2.01472 11.8947 4.5C11.8947 6.98528 13.9094 9 16.3947 9Z"
                                    fill="#425A8B" />
                                <path
                                    d="M13.6748 20C13.4048 20 13.1548 19.85 13.0248 19.62C12.8948 19.38 12.8948 19.1 13.0348 18.86L14.0048 17.24C14.2148 16.88 14.6748 16.77 15.0348 16.98C15.3948 17.19 15.5048 17.65 15.2948 18.01L15.1148 18.31C17.5848 17.67 19.4048 15.43 19.4048 12.77C19.4048 12.36 19.7448 12.02 20.1548 12.02C20.5648 12.02 20.8948 12.36 20.8948 12.78C20.8948 16.76 17.6548 20 13.6748 20Z"
                                    fill="#425A8B" />
                                <path
                                    d="M1.64474 7.97C1.23474 7.97 0.894745 7.64 0.894745 7.22C0.894745 3.24 4.13475 0 8.11475 0C8.39475 0 8.63475 0.15 8.77474 0.38C8.90475 0.62 8.90475 0.9 8.76474 1.14L7.79474 2.75C7.57474 3.11 7.11474 3.23 6.76474 3.01C6.40474 2.8 6.29474 2.34 6.50475 1.98L6.68474 1.68C4.22474 2.32 2.39474 4.56 2.39474 7.22C2.39474 7.64 2.05474 7.97 1.64474 7.97Z"
                                    fill="#425A8B" />
                            </svg>

                        </a>

                        {{-- header wishlist icon --}}
                        <a class=" icon-list icon-wishlist" href="{{ route('favorite.index') }}"
                            title="{{ __('web.wishlist') }}">
                            <span>&nbsp;</span>
                            <span class="number-item font-xs">1</span>
                            <svg width="24" height="24" viewBox="0 0 21 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8947 4.16217C8.89471 -0.544016 1.89471 -0.0427642 1.89471 5.97228C1.89471 11.9873 10.8947 17 10.8947 17C10.8947 17 19.8947 11.9873 19.8947 5.97228C19.8947 -0.0427642 12.8947 -0.544016 10.8947 4.16217Z"
                                    stroke="#425A8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        {{-- header cart icon --}}
                        <span class=" icon-list icon-cart" title="{{ __('web.cart') }}">
                            <span>&nbsp;</span>
                            <span class="number-item font-xs" id="count_carts"></span>
                            <svg width="24" height="24" viewBox="0 0 20 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.18421 18.1842C6.85631 18.1842 6.53577 18.2814 6.26313 18.4636C5.99049 18.6458 5.778 18.9047 5.65252 19.2077C5.52703 19.5106 5.4942 19.8439 5.55817 20.1655C5.62214 20.4871 5.78004 20.7826 6.0119 21.0144C6.24376 21.2463 6.53917 21.4042 6.86077 21.4681C7.18237 21.5321 7.51572 21.4993 7.81866 21.3738C8.1216 21.2483 8.38053 21.0358 8.5627 20.7632C8.74487 20.4905 8.84211 20.17 8.84211 19.8421C8.84211 19.4024 8.66744 18.9807 8.35652 18.6698C8.0456 18.3589 7.62391 18.1842 7.18421 18.1842ZM18.7895 14.8684H5.52632C5.23318 14.8684 4.95205 14.752 4.74478 14.5447C4.5375 14.3374 4.42105 14.0563 4.42105 13.7632C4.42105 13.47 4.5375 13.1889 4.74478 12.9816C4.95205 12.7743 5.23318 12.6579 5.52632 12.6579H14.9113C15.6313 12.6556 16.3312 12.42 16.906 11.9864C17.4808 11.5529 17.8997 10.9447 18.0998 10.2531L19.8521 4.11963C19.8991 3.95513 19.9073 3.78197 19.876 3.61377C19.8447 3.44558 19.7748 3.28694 19.6718 3.15035C19.5688 3.01375 19.4355 2.90293 19.2824 2.82661C19.1293 2.75029 18.9606 2.71055 18.7895 2.71053H5.23792C5.00912 2.06655 4.58733 1.50878 4.03004 1.11322C3.47274 0.717646 2.80704 0.503516 2.12364 0.5H1.10526C0.812129 0.5 0.531001 0.616447 0.323724 0.823724C0.116447 1.031 0 1.31213 0 1.60526C0 1.8984 0.116447 2.17952 0.323724 2.3868C0.531001 2.59408 0.812129 2.71053 1.10526 2.71053H2.12364C2.36357 2.71136 2.59678 2.7899 2.78834 2.93438C2.9799 3.07885 3.11951 3.28149 3.18626 3.51195L3.35815 4.11403L3.35842 4.11963L5.17175 10.4663C4.32795 10.557 3.55107 10.9679 3.00108 11.6142C2.4511 12.2606 2.16987 13.0932 2.21531 13.9406C2.26075 14.7881 2.6294 15.5859 3.24534 16.1697C3.86129 16.7535 4.67765 17.0789 5.52632 17.0789H18.7895C19.0826 17.0789 19.3637 16.9625 19.571 16.7552C19.7783 16.5479 19.8947 16.2668 19.8947 15.9737C19.8947 15.6805 19.7783 15.3994 19.571 15.1921C19.3637 14.9849 19.0826 14.8684 18.7895 14.8684ZM17.3242 4.92105L15.9745 9.6454C15.9078 9.87605 15.7682 10.0789 15.5765 10.2235C15.3848 10.3681 15.1514 10.4466 14.9113 10.4474H7.46538L7.1836 9.46124L5.8871 4.92105H17.3242ZM16.0263 18.1842C15.6984 18.1842 15.3779 18.2814 15.1052 18.4636C14.8326 18.6458 14.6201 18.9047 14.4946 19.2077C14.3691 19.5106 14.3363 19.8439 14.4003 20.1655C14.4642 20.4871 14.6221 20.7826 14.854 21.0144C15.0859 21.2463 15.3813 21.4042 15.7029 21.4681C16.0245 21.5321 16.3578 21.4993 16.6608 21.3738C16.9637 21.2483 17.2226 21.0358 17.4048 20.7632C17.587 20.4905 17.6842 20.17 17.6842 19.8421C17.6842 19.4024 17.5095 18.9807 17.1986 18.6698C16.8877 18.3589 16.466 18.1842 16.0263 18.1842Z"
                                    fill="#425A8B" />
                            </svg>
                        </span>

                        {{-- header account icon --}}
                        <a class="icon-list" href="{{route('web.dashboard')}}">
                            <div class="icon-container">
                                <svg width="25" height="25" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.75 11.0001C21.7543 9.21747 21.3152 7.4618 20.4723 5.89108C19.6295 4.32036 18.4092 2.9839 16.9214 2.00199C15.4337 1.02009 13.7251 0.423571 11.9494 0.266133C10.1738 0.108695 8.38692 0.395281 6.74959 1.10009C5.11226 1.8049 3.6759 2.90581 2.5698 4.30373C1.4637 5.70164 0.722591 7.35267 0.413179 9.1082C0.103767 10.8637 0.235767 12.6686 0.797297 14.3605C1.35883 16.0523 2.33226 17.5779 3.62997 18.8001L4.01997 19.1401H4.07997C4.21997 19.2701 4.37997 19.3801 4.52997 19.5001C4.67997 19.6201 4.74997 19.6701 4.85997 19.7401C5.01709 19.8559 5.18069 19.9628 5.34997 20.0601L5.68997 20.2701C5.85997 20.3701 6.03997 20.4601 6.21997 20.5501L6.56997 20.7201L7.11997 20.9501L7.48997 21.0901L8.04997 21.2701L8.47997 21.3801L8.99997 21.5001L9.55997 21.5801L9.98997 21.6401C10.33 21.6401 10.67 21.6901 10.99 21.6901C11.31 21.6901 11.67 21.6901 11.99 21.6401L12.42 21.5801L12.98 21.5001L13.5 21.3801L13.94 21.2601L14.49 21.0901L14.9 21.0001L15.44 20.7701L15.8 20.6001L16.32 20.3201L16.66 20.1101L17.15 19.8001L17.48 19.5501C17.63 19.43 17.79 19.3201 17.93 19.1901H17.99L18.38 18.8501C19.4512 17.8436 20.3034 16.627 20.8832 15.2763C21.463 13.9256 21.7581 12.4699 21.75 11.0001ZM1.74997 11.0001C1.74997 8.5468 2.72452 6.19403 4.45923 4.45931C6.19394 2.7246 8.54672 1.75005 11 1.75005C13.4532 1.75005 15.806 2.7246 17.5407 4.45931C19.2754 6.19403 20.25 8.5468 20.25 11.0001C20.2528 13.3425 19.3582 15.5969 17.75 17.3001C17.1047 16.0681 16.1345 15.0363 14.9447 14.3164C13.7548 13.5964 12.3907 13.2159 11 13.2159C9.60927 13.2159 8.2451 13.5964 7.05525 14.3164C5.86541 15.0363 4.89528 16.0681 4.24997 17.3001C2.64177 15.5969 1.74713 13.3425 1.74997 11.0001ZM16.43 18.4801L16.04 18.7501L15.76 18.9101C15.2689 19.2098 14.7498 19.461 14.21 19.6601L13.89 19.7801L13.46 19.9101L13.07 20.0101L12.67 20.0901L12.18 20.1701H11.85C11.57 20.1701 11.29 20.1701 11 20.1701C10.71 20.1701 10.43 20.1701 10.15 20.1701H9.81997L9.32997 20.0901L8.92997 20.0001L8.53997 19.9001L8.10997 19.7701L7.79997 19.6601C7.25527 19.4535 6.7299 19.1991 6.22997 18.9001L5.99997 18.7501L5.60997 18.4801C5.5577 18.4312 5.50076 18.3877 5.43997 18.3501C5.92199 17.2675 6.70749 16.3478 7.70137 15.7023C8.69525 15.0569 9.85491 14.7134 11.04 14.7134C12.225 14.7134 13.3847 15.0569 14.3786 15.7023C15.3725 16.3478 16.1579 17.2675 16.64 18.3501C16.5653 18.3853 16.4948 18.4289 16.43 18.4801ZM11 12.4801C11.8422 12.482 12.6661 12.2337 13.367 11.7665C14.0678 11.2994 14.6141 10.6346 14.9364 9.8564C15.2587 9.07824 15.3425 8.22185 15.1772 7.39597C15.0119 6.57008 14.6049 5.81193 14.008 5.21776C13.411 4.6236 12.6509 4.22021 11.8242 4.05882C10.9976 3.89742 10.1416 3.98529 9.36498 4.31128C8.58836 4.63726 7.9261 5.18666 7.46229 5.88972C6.99848 6.59278 6.75403 7.4178 6.75997 8.26005C6.75997 9.38549 7.20636 10.465 8.00123 11.2617C8.7961 12.0585 9.87453 12.5074 11 12.5101V12.4801ZM11 5.48005C11.543 5.47811 12.0745 5.63698 12.5273 5.93665C12.9802 6.23631 13.3342 6.66335 13.5447 7.16392C13.7553 7.66449 13.8129 8.21619 13.7103 8.74945C13.6077 9.28272 13.3496 9.77368 12.9684 10.1604C12.5872 10.5472 12.1 10.8124 11.5683 10.9227C11.0366 11.033 10.4841 10.9834 9.98054 10.7802C9.47697 10.5769 9.04485 10.2291 8.73866 9.78064C8.43246 9.33216 8.2659 8.80306 8.25997 8.26005C8.25997 7.53336 8.54865 6.83643 9.0625 6.32258C9.57635 5.80873 10.2733 5.52005 11 5.52005V5.48005Z"
                                        fill="#425A8B" />
                                </svg>
                            </div>
                        </a>


                    </div>
                </div>
                @else
                <div>
                    <button class="nav-login-btn">
                        <span>تسجيل الدخول</span>
                        <img src="{{asset('storage/assets/account.svg.png')}}" />
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>

{{-- shearch box in mobile view --}}
<div class="mobile-header-search" style="display: none">
    <div class="mobile-box-header-search">
        <form class="mobile-form-search" method="get" action="{{ route('web.shop') }}">
            <div class="mobile-box-category">

                <select name="category_id" class="select-active select2-hidden-accessible "
                    onchange="redirectOnChange(this)">
                    <option value="">{{ __('web.all_categories') }}</option>
                    @foreach ($categoriesMain as $row)
                    <option {{ isset($request) ? ($request->category_id == $row->id ? 'selected' : '') : '' }}
                        value="{{ $row->id }}">{{ $row->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mobile-box-keysearch">
                <input class="form-control font-xs" name="product" type="text" @isset($request)
                    value="{{ $request->product }}" @endisset placeholder="{{ __('web.search_for_items') }}">
            </div>
        </form>
    </div>
</div>


<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">

            <div class="mobile-logo">
                @if (getCurrentLocale() == 'en')
                <a class="d-flex" href="{{ route('web.index') }}">
                    <img alt="Furniture Hub" src="{{ asset(settings('logo')) }}" loading="lazy">
                </a>
                @else
                <a class="d-flex" href="{{ route('web.index') }}">
                    <img alt="Furniture Hub" src="{{ asset(settings('logo_ar')) }}" loading="lazy">
                </a>
                @endif


            </div>

            <div class="perfect-scroll">

                <hr>
                <div class="mobile-account">
                    <div class="mobile-header-top">
                        <div class="user-account"><a href="{{ route('account.index') }}"><img
                                    src="{{ asset(settings('logo')) }}" loading="lazy" alt="Furniture Hub"></a>
                            <div class="content">
                                <h6 class="user-name">{{ __('web.hello') }}<span class="text-brand"> Steven !</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <ul class="mobile-menu">
                        <li><a href="{{ route('account.index') }}">{{ __('web.my_account') }}</a></li>
                        <li><a href="{{ route('web.logout') }}">{{ __('web.sign_out') }}</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- <div class="sidebar-left"><a class="btn btn-open" href="#"></a> --}}

</div>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="mobile-logo">
                @if (getCurrentLocale() == 'en')
                <a class="d-flex" href="{{ route('web.index') }}">
                    <img alt="Furniture Hub" style="width: 161px" loading="lazy" src="{{ asset(settings('logo')) }}">
                </a>
                @else
                <a class="d-flex" href="{{ route('web.index') }}">
                    <img alt="Furniture Hub" style="width: 161px" loading="lazy" src="{{ asset(settings('logo_ar')) }}">
                </a>
                @endif
            </div>
            <div class="dropdown dropdown-language">
                <button class="btn dropdown-toggle" id="dropdownPage" type="button" data-bs-toggle="dropdown"
                    aria-expanded="true" data-bs-display="static">
                    <span class="dropdown-right font-xs color-brand-3">
                        <img src="{{ asset($language->image) }}" loading="lazy" alt="Furniture Hub">
                        {{ $language->name }}
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownPage" data-bs-popper="static">
                    @foreach ($languages as $language)
                    <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedUrl($language->local) }}">
                        <img src="{{ asset($language->image) }}" loading="lazy" alt="Furniture Hub">
                        {{ $language->name }}
                    </a>
                    @endforeach
                </ul>

            </div>
            <div class="perfect-scroll">
                <hr>
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav class="mt-15">
                        <ul class="mobile-menu font-heading">
                            @foreach ($categorieshome as $row)
                            <li class="has-children"><span class="menu-expand"><i class="fi-rr-caret-down"></i></span><a
                                    class="active" href="#">{{ $row->title }}</a>
                                @if (count($row->models))
                                @foreach ($row->models as $model)
                                <ul class="sub-menu" style="display: none;">
                                    <li><a href="{{ route('web.shop', $row->slug . '/' . $model->slug) }}"
                                            style="color: gray;">{{ $model->details->title }}</a></li>

                                </ul>
                                @endforeach
                                @endif

                                <ul class="sub-menu" style="display: none;">
                                    <li><a href="{{ route('web.shop', $row->slug) }}"
                                            style="color: gray;">{{ __('web.view_all_products') }}</a></li>

                                </ul>
                            </li>
                            @endforeach


                        </ul>
                    </nav>
                </div>
                @if (Auth::user())
                <div class="mobile-account">
                    <div class="mobile-header-top">
                        <div class="user-account"><a href="{{ route('account.index') }}"><img loading="lazy"
                                    src="{{ Auth::user()->photo }}" alt="Furniture Hub"></a>
                            <div class="content">
                                <h6 class="user-name">{{ __('web.hello') }}<span class="text-brand">
                                        {{ Auth::user()->name }} !</span></h6>
                            </div>
                        </div>
                    </div>
                    <ul class="mobile-menu">
                        <li><a href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                        <li><a href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                        <li><a href="{{ route('web.blog') }}">{{ __('web.blog') }}</a></li>
                        <li><a href="{{ route('web.contact') }}">{{ __('web.contact_us') }}</a></li>
                        <li><a href="{{ route('account.index') }}">{{ __('web.account') }}</a></li>
                        <li><a href="{{ route('compare.index') }}">{{ __('web.compare') }}</a></li>
                        <li><a href="{{ route('cart.index') }}">{{ __('web.cart') }}</a></li>
                        <li><a href="{{ route('favorite.index') }}">{{ __('web.wishlist') }}</a></li>
                        <li><a href="{{ route('web.logout') }}">{{ __('web.sign_out') }}</a></li>

                        <li><a href="{{ route('web.about_us') }}">{{ __('web.about_us') }}</a></li>
                        <li><a href="{{ route('web.customization') }}">{{ __('web.customization') }}</a></li>
                        <li><a href="{{ route('web.seller_register') }}">{{ __('web.open_a_shop') }}</a></li>
                        <li><a href="{{ route('web.quantities') }}">{{ __('web.wholesale_orders_and_quantities') }}</a>
                        </li>


                        <li><a href="tel:{{ settings('phone') }}" class="text-primary">{{ __('web.call_us') }}</a></li>



                    </ul>
                </div>
                @else
                <div class="mobile-account">
                    <ul class="mobile-menu">
                        <li><a href="{{ route('web.login') }}">{{ __('web.login') }}</a></li>

                        <li><a href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                        <li><a href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                        <li><a href="{{ route('web.blog') }}">{{ __('web.blog') }}</a></li>
                        <li><a href="{{ route('web.contact') }}">{{ __('web.contact_us') }}</a></li>
                        <li><a href="{{ route('web.about_us') }}">{{ __('web.about_us') }}</a></li>
                        <li><a href="{{ route('web.customization') }}">{{ __('web.customization') }}</a></li>
                        <li><a href="{{ route('web.seller_register') }}">{{ __('web.open_a_shop') }}</a></li>
                        <li><a href="{{ route('web.quantities') }}">{{ __('web.wholesale_orders_and_quantities') }}</a>
                        </li>
                        <li><a href="tel:{{ settings('phone') }}" class="text-primary">{{ __('web.call_us') }}</a></li>

                    </ul>
                </div>
                @endif

                {{-- <div class="mobile-banner">
                    <div class="bg-5 block-iphone"
                        style='background-color: {{ $bannerMobile->color }};background-image:url("{{ asset($bannerMobile->image) }}")'>
                <p class="font-base text-white mb-10">{!! $bannerMobile->description !!}</p>
                <a class="btn btn-arrow" href="{{ $bannerMobile->link }}">{{ __('web.learn_more') }}</a>
            </div>
        </div> --}}
        {{-- <div class="site-copyright color-gray-400 mt-30">Copyright 2022 &copy; Furniture Hub - Marketplace
                    Template.<br>Designed by<a href="http://alithemes.com" target="_blank">&nbsp; AliThemes</a></div> --}}
    </div>
</div>
</div>
</div>

<script>
    const adContainer = document.getElementById('installPopup');
    const header = document.getElementById('header')
    const adStyle = window.getComputedStyle(adContainer);

    function handleClose() {
      document.querySelector(".get-app-container").style.display = "none";
      header.classList.remove('header-under-ad');
    };

    function isMobile() {
        return {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            }
        };
    }

    function handleDownload(appleLink, googleLink) {
        var installPopup = document.getElementById('installPopup');
        installPopup.style.display = 'none';
        
        var downloadLink = document.getElementById('downloadAppLink');
        if (isMobile().iOS()) {
            window.location.href = appleLink;
        } else if (isMobile().Android()) {
            window.location.href = googleLink;
        }
    }

    window.addEventListener('scroll', function() {
        if (window.scrollY < 100) {
            adContainer.classList.remove('sticky-ad');
        }
        if (window.scrollY > 100) {
            adContainer.classList.add('sticky-ad');
        }
        // make header after app ad
        if (window.scrollY > 100 && adStyle.display !== 'none') {
            header.classList.add('header-under-ad');
        }
        if (window.scrollY < 100) {
            header.classList.remove('header-under-ad');
        }
    });
    
</script>