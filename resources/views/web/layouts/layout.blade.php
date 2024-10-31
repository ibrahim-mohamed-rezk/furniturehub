<!DOCTYPE html>
<html @if (getCurrentLocale() == 'ar') class="rtl" lang="ar" dir="rtl" @else lang="en" @endif>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=6">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="author" content>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="{{ route('web.index') }}">
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    {{-- <meta name="google-site-verification" content="W9gBJs5w75R9LTS6KQmL1LsSDrbgsOX-DLI7cbrzbD8" /> --}}
    <meta name="google-site-verification" content="RU9YnukMrwwgT1f_LV1Yjcx63GtW1vbkITSB3_xI95E" />
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(settings('url_icon')) }}">
    <meta property="og:image" content="{{ asset('/public/storage/icon+logo.jpg') }}" />
    <meta name="title" content="Furniture Hub">
    <meta name="p:domain_verify" content="5b498a11418a4ea856e9a7833888bf03" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @if (LaravelLocalization::getCurrentLocale() == 'en')
        <link href="{{ url('') }}/assets/web/ASSETS_En/css/STYLEeN9.css" rel="stylesheet">
        <meta name="description"
              content="{{ $description ?? ($product->meta_description ?? settings('meta_description_en')) }}">
        <meta name="keywords" content="{{ $keywords ?? ($product->keywords ?? settings('meta_keywords_en')) }}">
    @else
        <link href="{{ url('') }}/assets/web/ASSets_Ar/css/STYLEAR12.css" rel="stylesheet">
        <meta name="description"
              content="{{ $description ?? ($product->meta_description ?? settings('meta_description_ar')) }}">
        <meta name="keywords" content="{{ $keywords ?? ($product->keywords ?? settings('meta_keywords_ar')) }}">
    @endif

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link href="{{ url('') }}/assets/web/ASSets/css/footer.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/web/ASSets/css/header.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/web/ASSets/css/darkMode.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>{{ __('web.furniture_hub') }} | {{ $title ?? __('web.the_furniture_store') }}</title>


    @yield('styles')

    @if (LaravelLocalization::getCurrentLocale() == 'en')
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .get-app-container {
                display: none;
                align-items: center;
                justify-content: space-between;
                border: 1px solid #ddd;
                background-color: white;
                width: 100%;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 15px 30px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .logo {
                width: 50px;
            }

            .lgoo img {
                width: 100%;

            }

            .content {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .content h2 {
                margin: 0;
                font-size: 16px;
                color: #333;
            }

            .content p {
                margin: 4px 0;
                font-size: 14px;
                color: #6666669f;
            }

            .rating {
                display: flex;
                align-items: center;
                margin-top: 4px;
            }

            .stars {
                color: #f1a20f;
                font-size: 22px;
                margin-right: 4px;
                padding-bottom: 6px;
            }

            .button {
                background-color: #ff7b2c;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                text-wrap: nowrap;
            }

            .close {
                position: absolute;
                top: 8px;
                right: 33px;
                font-size: 22px;
                cursor: pointer;
                color: #ff7b2c;
            }

            @media (max-width: 769px) {
                .get-app-container {
                    display: flex;
                    padding: 5px;
                }


                .content h2,
                .rating-num {
                    font-size: 11px;
                    text-wrap: wrap;
                }

                .content p {
                    font-size: 10px;
                    text-wrap: wrap;
                    margin: 0;
                    margin-bottom: -8px;
                    margin-top: -8px;
                }

                .stars {
                    font-size: 20px;
                }

                .button {
                    font-size: 9px;
                    font-size: 10px;
                    padding-left: 5px;
                    padding-right: 5px;
                    margin-left: 30px;
                }

                .close {
                    top: 2px;
                    right: 10px;
                }
            }
        </style>
        <style>
            .floating-button {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: transparent;
                color: white;
                width: 40px;
                height: 40px;
                padding: 5px;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                font-size: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background-color 0.3s ease, transform 0.3s ease;
                z-index: 9999;
            }

            .floating-button.active {
                transform: translateY(5px);
            }

            .floating-button span {
                margin-left: 5px;
            }

            /* EN */
            .box-container {
                position: relative
            }

            .hidden-content {
                transform-origin: top;
                transition: transform 0.3s ease-in-out;
                padding: 10px;
                border: 1px solid #ccc;
                margin-top: 5px;
                z-index: 100;
                position: absolute;
                width: 1000px;
                background: #fff;
                top: 0;
                margin: 0;
                transform: translateX(-50%) scaleY(0);
                left: 50%;
                padding: 70px 65px;
                max-height: 400px;
            }

            .hidden-content .image {
                background-size: cover;
                background-position: center right;
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                right: 0;
                background-image: url({{ asset('public/storage/tests.png') }});
            }

            /* Displayed content on hover */
            .show-content {
                transform: translateX(-50%) scaleY(1);
            }

            .tob-header {
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;
                overflow: hidden;
            }

            .tob-header .main {
                display: flex;
            }

            .tob-header .main-items {
                display: flex;
                flex-basis: 50%;
                gap: 20px;
                font-size: 20px;
                z-index: 10000;
            }

            .tob-header .main-items .main-cat {
                display: flex;
                flex-direction: column;
                gap: 22px;
            }

            .tob-header .main-items .main-cat .cat-item {
                transition: .3s;
                cursor: pointer;

            }

            .tob-header .main-items .main-cat .cat-item:hover {
                color: #fd9636;
            }

            

            @media (max-width: 1199.98px) {
                .burger-icon {
                    display: inline-block !important;
                }
            }
        </style>
    @else
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .get-app-container {
                direction: rtl;
                display: none;
                align-items: center;
                justify-content: space-between;
                border: 1px solid #ddd;
                background-color: white;
                width: 100%;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding: 15px 30px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .logo {
                width: 50px;
            }

            .lgoo img {
                width: 100%;

            }

            .content {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }

            .content h2 {
                margin: 0;
                font-size: 16px;
                color: #333;
            }

            .content p {
                margin: 4px 0;
                font-size: 14px;
                color: #6666669f;
                margin: 0;
                margin-bottom: -8px;
                margin-top: -8px;

            }

            .rating {
                display: flex;
                align-items: center;
                margin-top: 4px;
            }

            .stars {
                color: #f1a20f;
                font-size: 22px;
                margin-right: 4px;
                padding-bottom: 6px;
            }

            .button {
                background-color: #ff7b2c;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                text-wrap: nowrap;
            }

            .close {
                position: absolute;
                top: 8px;
                left: 33px;
                font-size: 22px;
                cursor: pointer;
                color: #ff7b2c;
            }

            @media (max-width: 769px) {
                .get-app-container {
                    display: flex;
                    padding: 5px;
                }

                .content h2,
                .rating-num {
                    font-size: 11px;
                    text-wrap: wrap;
                }

                .content p {
                    font-size: 10px;
                    text-wrap: wrap;
                    margin: 0;
                    margin-bottom: -8px;
                    margin-top: -8px;

                }

                .stars {
                    font-size: 20px;
                }

                .button {
                    font-size: 10px;
                    padding-left: 5px;
                    padding-right: 5px;
                    margin-left: 30px;

                }

                .close {
                    top: 2px;
                    left: 10px;
                }
            }
        </style>
        <style>
            .floating-button {
                position: fixed;
                bottom: 20px;
                left: 20px;
                z-index: 11111111;
                background-color: transparent;
                color: white;
                padding: 5px;
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                cursor: pointer;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                font-size: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background-color 0.3s ease, transform 0.3s ease;
                z-index: 1111111;

            }

            .floating-button.active {
                transform: translateY(5px);
            }

            .floating-button span {
                margin-left: 5px;
            }





            /* New Style 27/2 */
            .box-container {
                position: relative
            }

            .hidden-content {
                transform-origin: top;
                transition: transform 0.3s ease-in-out;
                padding: 10px;
                border: 1px solid #ccc;
                margin-top: 5px;
                z-index: 100;
                position: absolute;
                width: 1000px;
                background: #fff;
                top: 0;
                margin: 0;
                transform: translateX(-50%) scaleY(0);
                left: 50%;
                padding: 70px 65px;
                max-height: 400px;
            }

            .hidden-content .image {
                background-size: cover;
                background-position: center right;
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                right: 0;
                transform: rotateY(180deg) rotateX(360deg);
                background-image: url({{ asset('public/storage/tests.png') }});
            }

            /* Displayed content on hover */
            .show-content {
                transform: translateX(-50%) scaleY(1);
            }

            .tob-header {
                border-bottom-left-radius: 25px;
                border-bottom-right-radius: 25px;
                overflow: hidden;

            }

            .tob-header .main {
                display: flex;
            }

            .tob-header .main-items {
                display: flex;
                flex-basis: 50%;
                gap: 20px;
                font-size: 20px;
                z-index: 10000;
            }

            .tob-header .main-items .main-cat {
                display: flex;
                flex-direction: column;
                gap: 22px;
            }

            .tob-header .main-items .main-cat .cat-item {
                transition: .3s;
                cursor: pointer;
            }

            .tob-header .main-items .main-cat .cat-item:hover {
                color: #fd9636;
            }

            @media (max-width: 1199.98px) {
                .burger-icon {
                    display: inline-block !important;
                }
            }
        </style>
    @endif



</head>


<body>

<div class="floating-button">
    <a href="https://wa.me/201010408471" target="_blank"><img
                src="{{ asset('public/storage/icons/whatsApp.webp') }}" loading="lazy" alt="Contact" width="100px"
                style="width: 100px;">
    </a>
</div>

@yield('container_content')

@if (getCurrentLocale() == 'en')
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/waypoints.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/wow.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/magnific-popup.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/select2.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/isotope.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/scrollup.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/swiper-bundle.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/noUISlider.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/slider.js"></script>
    <!-- Count down-->
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/counterup.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/jquery.countdown.min.js"></script>
    <!-- Count down-->
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/jquery.elevatezoom.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/vendors/slick.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/main.js?v=3.0.0"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/Shop.js?v=1.2.1"></script>
@else
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/modernizr-3.6.0.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/waypoints.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/wow.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/magnific-popup.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/perfect-scrollbar.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/select2.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/isotope.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/scrollup.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/swiper-bundle.min.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/noUISlider.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/slider.js"></script>
    <!-- Count down-->
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/counterup.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/jquery.countdown.min.js"></script>
    <!-- Count down-->
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/jquery.elevatezoom.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/vendors/slick.js"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/main.js?v=3.0.0"></script>
    <script src="{{ url('') }}/assets/web/ASSets_Ar/js/SHop.js?v=1.2.1"></script>
@endif
<script src="{{ url('') }}/assets/web/updated.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://assets.sympl.ai/widgets/ecom-prod-dtls/widget.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ url('') }}/assets/web/ASSETS_En/js/custom/FORMACTION10.js"></script>
<script src="{{ url('') }}/assets/web/ASSETS_En/js/custom/toastrResponse.js"></script>

<script>
    let url_toggle_fav = "{{ route('favorite.store') }}",
        url_add_compare = "{{ route('compare.store') }}",
        url_add_cart = "{{ route('cart.store') }}",
        url_delete_cart = "{{ route('cart.destroy', ':cart_id') }}",
        edit_cart_action = "{{ route('cart.update', ':cart_id') }}",
        url_cart = "{{ route('cart.index') }}",
        url_view_cart = "{{ route('cart.view') }}",
        url_view_cart_inside = "{{ route('cart.view.inside') }}",
        url_view_favorite = "{{ route('favorite.view') }}",
        user_auth = {!! json_encode($user_info) !!},
        login_page = "{{ route('web.login') }}",
        check_out_page = "{{ route('order.index') }}",
        base_url = "{{ url('/public') }}";
</script>

<script>
    function redirectOnChange(select) {
        var categoryId = select.value;
        if (categoryId) {
            window.location.href = "{{ route('web.shop') }}?category_id=" + categoryId;
        }
    }
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        document.querySelector('.dropdown-cart-container').style.display = 'block'; // Show the cart dropdown
    }

</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={!! settings('google_tag_manager_GTM') !!}" height="0"
                  width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


@yield('container_js')
@if (\Auth::user())
    <script>
        setTimeout(
            function() {
                viewCart()
                viewFavorite()
            }, 50);
    </script>
@endif




<script>
    function hideInstallPopup() {
        var installPopup = document.getElementById('installPopup');
        installPopup.style.display = 'none';
    }

</script>



<script>
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
        var mobile = isMobile();

        if (mobile.iOS()) {
            window.location.href = appleLink;
        } else if (mobile.Android()) {
            window.location.href = googleLink;
        }
    }

    function handleClose() {
        document.querySelector(".get-app-container").style.display = "none";

    }
    @guest()
        document.addEventListener('DOMContentLoaded', function() {
            const loginButton = document.querySelector('.nav-login-btn');
            const popupElement = document.querySelector('.sign-in-modal');

            loginButton.addEventListener('click', function(event) {
                event.preventDefault();

                if (popupElement.classList.contains('hide')) {
                    popupElement.classList.remove('hide');
                    popupElement.classList.add('show');
                } else {
                    popupElement.classList.remove('show');
                    popupElement.classList.add('hide');
                }
            });

        });
    @endguest


</script>
<script>
    function showPassword() {
        const passwordInput = document.getElementById("passwordInput");
        const showPasswordIcon = document.getElementById("showPasswordInput");
        const hidePasswordIcon = document.getElementById("hidePasswordInput");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordIcon.style.display = "none";
            hidePasswordIcon.style.display = "block";
        }
    }

    function hidePassword() {
        const passwordInput = document.getElementById("passwordInput");
        const showPasswordIcon = document.getElementById("showPasswordInput");
        const hidePasswordIcon = document.getElementById("hidePasswordInput");

        if (passwordInput.type === "text") {
            passwordInput.type = "password";
            hidePasswordIcon.style.display = "none";
            showPasswordIcon.style.display = "block";
        }
    }

    function showPasswordSignUp() {
        const passwordInput = document.getElementById("passwordInputSignUp");
        const showPasswordIcon = document.getElementById("showPasswordInputSignUp");
        const hidePasswordIcon = document.getElementById("hidePasswordInputSignUp");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordIcon.style.display = "none";
            hidePasswordIcon.style.display = "block";
        }
    }

    function hidePasswordSignUp() {
        const passwordInput = document.getElementById("passwordInputSignUp");
        const showPasswordIcon = document.getElementById("showPasswordInputSignUp");
        const hidePasswordIcon = document.getElementById("hidePasswordInputSignUp");

        if (passwordInput.type === "text") {
            passwordInput.type = "password";
            hidePasswordIcon.style.display = "none";
            showPasswordIcon.style.display = "block";
        }
    }
    function showPasswordSignUpConfirm() {
        const passwordInput = document.getElementById("passwordInputSignUpConfirm");
        const showPasswordIcon = document.getElementById("showPasswordInputSignUpConfirm");
        const hidePasswordIcon = document.getElementById("hidePasswordInputSignUpConfirm");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordIcon.style.display = "none";
            hidePasswordIcon.style.display = "block";
        }
    }

    function hidePasswordSignUpConfirm() {
        const passwordInput = document.getElementById("passwordInputSignUpConfirm");
        const showPasswordIcon = document.getElementById("showPasswordInputSignUpConfirm");
        const hidePasswordIcon = document.getElementById("hidePasswordInputSignUpConfirm");

        if (passwordInput.type === "text") {
            passwordInput.type = "password";
            hidePasswordIcon.style.display = "none";
            showPasswordIcon.style.display = "block";
        }
    }
    function calculateSlidesPerView(swiperContainer) {
        const containerWidth = swiperContainer.clientWidth;

        let slideWidth;
        if (window.innerWidth <= 768) {
            slideWidth = 130;
        } else {
            slideWidth = 268;
        }

        const slidesPerView = Math.floor(containerWidth / slideWidth);
        return slidesPerView;
    }
    // features swiper configration
    var swiper = new Swiper(".features-slider", {
        slidesPerView: calculateSlidesPerView(document.querySelector('.features-slider')),
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 5000,
        navigation: {
            nextEl: ".features-slider-next",
            prevEl: ".features-slider-preve",
        },
        scrollbar: {
            el: '.features-slider-scrollbar',
            draggable: true,
        },
        on: {
            resize: function () {
                this.params.slidesPerView = calculateSlidesPerView(document.querySelector('.features-slider'));
                this.update();
            }
        }
    });
</script>

<script>
    // to show dropdown menue when hovering over sec-header
   document.querySelectorAll('.categories-item').forEach(function(item) {
        item.addEventListener('mouseover', function() {
            const dropdownMenu = item.querySelector('.dropdown-menu');
            if (dropdownMenu) {
                dropdownMenu.classList.add('show');  
                item.setAttribute('aria-expanded', 'true');  
            }
        });

        item.addEventListener('mouseleave', function() {
            const dropdownMenu = item.querySelector('.dropdown-menu');
            const categoriesShop = item.querySelector('.categories-shop');
            if (dropdownMenu) {
                dropdownMenu.classList.remove('show');  
                item.setAttribute('aria-expanded', 'false');  
            }
        });
    });
</script>

<script>
const switchMode = () => {
    const body = document.querySelector('body');
    body.classList.toggle("dark"); 

    localStorage.setItem('switchMode', body.classList.contains("dark"));
};

if (localStorage.getItem('switchMode') === 'true') {
    document.querySelector('body').classList.add("dark");
    document.getElementById('darkModeInput').checked = true;
}

</script>

</body>

</html>
