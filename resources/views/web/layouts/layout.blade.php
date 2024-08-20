<!DOCTYPE html>
<html @if (getCurrentLocale() == 'ar') class="rtl" lang="ar" dir="rtl" @else lang="en" @endif>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="author" content>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="app-url" content="{{ route('web.index') }}">
    <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
    <meta name="google-site-verification" content="W9gBJs5w75R9LTS6KQmL1LsSDrbgsOX-DLI7cbrzbD8" />
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(settings('url_icon')) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta property="og:image" content="{{ asset(settings('logo')) }}" />
    <meta name="title" content="Furniture Hub">
    @if (getCurrentLocale() == 'en')
        <link href="{{ url('') }}/assets/web/ASSETS_En/css/style.css" rel="stylesheet">
        <meta name="description"
            content="{{ $description ?? ($product->meta_description ?? settings('meta_description_en')) }}">
        <meta name="keywords" content="{{ $keywords ?? ($product->keywords ?? settings('meta_keywords_en')) }}">
    @else
        <link href="{{ url('') }}/assets/web/ASSets_Ar/css/style.css" rel="stylesheet">
        <meta name="description"
            content="{{ $description ?? ($product->meta_description ?? settings('meta_description_ar')) }}">
        <meta name="keywords" content="{{ $keywords ?? ($product->keywords ?? settings('meta_keywords_ar')) }}">
    @endif

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>{{ __('web.furniture_hub') }} | {{ $title ?? __('web.the_furniture_store') }}</title>


    {{-- <script async src="https://www.googletagmanager.com/gtm.js?id=GTM-KCL6JRMV"></script> --}}
    <!-- Google Analytics Script -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XMPQ3KQXT1"></script> --}}
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-XMPQ3KQXT1');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5L9BCFJL');
    </script>
    <!-- End Google Tag Manager -->
    <script>
        !function (w, d, t) {
        w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};

        ttq.load('CNQPQ3RC77U13F68P23G');
        ttq.page();
        }(window, document, 'ttq');
    </script>

    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '870740691108331');
        fbq('track', 'PageView');
    </script>
    {{-- <script>
        gtag('event', 'conversion', {'send_to': 'AW-749200665/Mx6aCIqL3YIYEJnKn-UC'});
    </script> --}}
    <link rel="canonical" href="{{ url()->current() }}">

    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=870740691108331&ev=PageView&noscript=1" />
    </noscript>


    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "FurnitureHub",
            "description": "Your actual meta description here",
            "telephone": "+2{{settings('phone')}}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "New Damietta, Elhay Al Motamayez , Damietta , Egypt",
                "addressLocality": "Damietta",
                "addressRegion": "Damietta",
                "postalCode": "34524",
                "addressCountry": "Egypt"
            },
            "url": "https://furniturehubapp.com/",
            "logo": "https://furniturehubapp.com/assets/web/ASSETS/imgs/template/logoFur1.png",
            "sameAs": "https://www.facebook.com/furniturehubapp"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "url": "https://furniturehubapp.com/",
            "potentialAction": {
            "@type": "SearchAction",
            "target": "https://furniturehubapp.com/shop?&q={query}",
            "query": "required"
            }
        }
    </script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

    <!-- Google Tag Manager -->
    <!-- End Google Tag Manager -->

    @yield('styles')
    <style>
        .install-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            text-align: center;
            border-radius: 10px;
            max-width: 300px;
            width: 80%;
            background: url('{{ asset('public/storage/pop_up3/Untitled-1.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .close-icon {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
            cursor: pointer;
        }

        .install-popup p {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .install-popup button {
            background-color: #f36621;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
    @if (getCurrentLocale() == 'en')
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
                z-index: 1111111;
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

            /* categories shop */
            .sec-header {
                padding: 25px;
                background: #fbfbfb;
                position: relative;
                display: block;
            }

            @media (max-width: 1199.98px) {
                .sec-header {
                    display: none !important;
                }
            }

            .sec-header .categories-shop {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 16px;
                font-size: 18px;
            }

            .sec-header .categories-shop .categories-item {
                cursor: pointer;
                transition: .3s
            }

            .sec-header .categories-shop .categories-item:hover {
                color: #fd9636;
            }

            .box-categories-shop {
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10000;
            }

            .sec-header .main-items-tags {
                flex-direction: column;
            }

            .sec-header .tags {
                display: flex;
                gap: 90px;
                max-height: 200px;
            }

            .sec-header .main-items-tags .main-cat {
                flex-wrap: wrap;
                gap: 30px;
            }

            .sec-header .main-items-tags .main-cat .cat-item {
                margin-right: 90px;
            }

            .sec-header .view {
                text-align: center;
                margin-right: 100px;
                cursor: pointer;
                transition: .3s
            }

            .sec-header .view:hover {
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

            /* categories shop */
            .sec-header {
                padding: 25px;
                background: #fbfbfb;
                position: relative;
                display: block;
            }

            @media (max-width: 1199.98px) {
                .sec-header {
                    display: none !important;
                }
            }

            .sec-header .categories-shop {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 25px;
                font-size: 18px;
            }

            .sec-header .categories-shop .categories-item {
                cursor: pointer;
                transition: .3s
            }

            .sec-header .categories-shop .categories-item:hover {
                color: #fd9636;
            }

            .box-categories-shop {
                position: absolute;
                top: 100%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10000;
            }

            .sec-header .main-items-tags {
                flex-direction: column;
            }

            .sec-header .main-items-tags {
                flex-direction: column;
            }

            .sec-header .tags {
                display: flex;
                gap: 90px;
                max-height: 200px;
            }

            .sec-header .main-items-tags .main-cat {
                flex-wrap: wrap;
                gap: 30px;
            }

            .sec-header .main-items-tags .main-cat .cat-item {
                margin-left: 90px;
            }

            .sec-header .tags {
                display: flex;
                gap: 90px;
            }

            .sec-header .view {
                text-align: center;
                margin-left: 100px;
                cursor: pointer;
                transition: .3s
            }

            .sec-header .view:hover {
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
        <a href="https://wa.me/201060552252" target="_blank"><img
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
        <script src="{{ url('') }}/assets/web/ASSETS_En/js/shop.js?v=1.2.1"></script>
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
        <script src="{{ url('') }}/assets/web/ASSets_Ar/js/shop.js?v=1.2.1"></script>
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
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/custom/formAction.js"></script>
    <script src="{{ url('') }}/assets/web/ASSETS_En/js/custom/toastrResponse.js"></script>

    <script>
        let url_toggle_fav = "{{ route('favorite.store') }}",
            url_add_compare = "{{ route('compare.store') }}",
            url_add_cart = "{{ route('cart.store') }}",
            url_cart = "{{ route('cart.index') }}",
            url_view_cart = "{{ route('cart.view') }}",
            url_view_favorite = "{{ route('favorite.view') }}",
            user_auth = {!! json_encode($user_info) !!},
            login_page = "{{ route('web.login') }}",
            check_out_page = "{{ route('order.index') }}",
            base_url = "{{ url('') }}";
    </script>

    <script>
        function redirectOnChange(select) {
            var categoryId = select.value;
            if (categoryId) {
                window.location.href = "{{ route('web.shop') }}?category_id=" + categoryId;
            }
        }
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5L9BCFJL" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
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
        $(document).ready(function() {
            var timeout;

            $('.btn-group').hover(
                function() {
                    if ($(window).width() > 768) {
                        $(this).find('.dropdown-cat').show();
                    }
                },
                function() {
                    if ($(window).width() > 768) {
                        timeout = setTimeout(function() {
                            $('.dropdown-cat').hide();
                        }, 20);
                    }
                }
            );

            $('.dropdown-cat').hover(
                function() {
                    clearTimeout(timeout);
                },
                function() {
                    if ($(window).width() > 768) {
                        $(this).hide();
                    }
                }
            );


            // Allow clicking on dropdown items
            $('.dropdown-item-cat').on('click', function() {
                $('.dropdown-cat').hide();
                window.location.href = $(this).attr('href');

            });
        });
    </script>
    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 9,
            spaceBetween: 30,
            centerSlide: true,
            fade: true,
            gragCursor: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                520: {
                    slidesPerView: 3,

                },
                950: {
                    slidesPerView: 4,

                },
                1125: {
                    slidesPerView: 6,

                },
                1400: {
                    slidesPerView: 8,

                },
            },
        });
    </script>

    <!-- updatedScript -->

    <script>
        function showContent(contentId) {
            document.getElementById(contentId).classList.add('show-content');
        }

        function hideContent(contentId) {
            document.getElementById(contentId).classList.remove('show-content');
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to check if the user is using a mobile device
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

            // Function to show the install pop-up if on a mobile device and not shown before
            function showInstallPopup() {
                if (isMobile().iOS() || isMobile().Android()) {
                    // Check if the pop-up has been shown before by checking a cookie
                    if (document.cookie.indexOf('installPopupShown=true') === -1) {
                        var installPopup = document.getElementById('installPopup');
                        installPopup.style.display = 'block';

                        // Set the download link based on the device
                        var downloadLink = document.getElementById('downloadAppLink');
                        if (isMobile().iOS()) {
                            downloadLink.href = '{{ settings('apple') }}';
                        } else if (isMobile().Android()) {
                            downloadLink.href = '{{ settings('google') }}';
                        }

                        // Set a cookie to indicate that the pop-up has been shown
                        document.cookie = 'installPopupShown=true; expires=' + new Date(new Date().getTime() + 1 *
                            60 * 60 * 1000).toUTCString() + '; path=/';
                    }
                }
            }

            // Function to handle the download action
            function handleDownload(appleLink, googleLink) {
                // Check if the pop-up has been shown before by checking a cookie
                if (document.cookie.indexOf('installPopupShown=true') === -1) {
                    var installPopup = document.getElementById('installPopup');
                    installPopup.style.display = 'none';

                    // Set the download link based on the device
                    var downloadLink = document.getElementById('downloadAppLink');
                    if (isMobile().iOS()) {
                        window.location.href = appleLink;
                    } else if (isMobile().Android()) {
                        window.location.href = googleLink;
                    }

                    // Set a cookie to indicate that the pop-up has been shown
                    document.cookie = 'installPopupShown=true; expires=' + new Date(new Date().getTime() + 1 * 60 *
                        60 * 1000).toUTCString() + '; path=/';
                }
            }

            // Call the function on page load
            showInstallPopup();
        });

        // Function to hide the install pop-up
        function hideInstallPopup() {
            var installPopup = document.getElementById('installPopup');
            installPopup.style.display = 'none';
        }

        // switch to darck and light mode
            function switchMode() {
                document.body.classList.toggle('dark');
                localStorage.setItem('darkMode', document.body.classList.contains('dark'));


            }
            // Load the saved mode from localStorage
            if (localStorage.getItem('darkMode') === 'true') {
                document.body.classList.add('dark');
            }
            </script>






</body>

</html>
