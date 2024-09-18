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
    @if (getCurrentLocale() == 'en')
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
gtag('config', '{!! settings('google_analytics_G') !!}');
</script>

<script type="text/javascript">
    (function(c, l, a, r, i, t, y) {
                    c[a] = c[a] || function() {
                        (c[a].q = c[a].q || []).push(arguments)
                    };
                    t = l.createElement(r);
                    t.async = 1;
                    t.src = "https://www.clarity.ms/tag/" + i;
                    y = l.getElementsByTagName(r)[0];
                    y.parentNode.insertBefore(t, y);
                })(window, document, "clarity", "script", "n6op54r9hd");
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
})(window, document, 'script', 'dataLayer', '{!! settings('google_tag_manager_GTM') !!}');
    </script>
    <!-- End Google Tag Manager -->
<!-- Hotjar Tracking Code for Furniture Hub -->
    <script>
(function(h,o,t,j,a,r){
h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
h._hjSettings={hjid:5106716,hjsv:6};
a=o.getElementsByTagName('head')[0];
r=o.createElement('script');r.async=1;
r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
a.appendChild(r);
})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<script>
    ! function(w, d, t) {
                    w.TiktokAnalyticsObject = t;
                    var ttq = w[t] = w[t] || [];
                    ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias",
                        "group", "enableCookie", "disableCookie"
                    ], ttq.setAndDefer = function(t, e) {
                        t[e] = function() {
                            t.push([e].concat(Array.prototype.slice.call(arguments, 0)))
                        }
                    };
                    for (var i = 0; i < ttq.methods.length; i++) ttq.setAndDefer(ttq, ttq.methods[i]);
                    ttq.instance = function(t) {
                        for (var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++) ttq.setAndDefer(e, ttq.methods[n]);
                        return e
                    }, ttq.load = function(e, n) {
                        var i = "https://analytics.tiktok.com/i18n/pixel/events.js";
                        ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = i, ttq._t = ttq._t || {}, ttq._t[e] = +new Date,
                            ttq._o = ttq._o || {}, ttq._o[e] = n || {};
                        var o = document.createElement("script");
                        o.type = "text/javascript", o.async = !0, o.src = i + "?sdkid=" + e + "&lib=" + t;
                        var a = document.getElementsByTagName("script")[0];
                        a.parentNode.insertBefore(o, a)
                    };

ttq.load('CNQPQ3RC77U13F68P23G');
            ttq.page();
        }(window, document, 'ttq');
    </script>

<link rel="canonical" href="{{ url()->current() }}">

<!-- Meta Pixel Code -->
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
fbq('init', '{!! settings('facebook_pixel') !!}');
        fbq('track', 'PageView');
</script>
    <noscript>
        <img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=394447856705010&ev=PageView&noscript=1" />
    </noscript>
<!-- End Meta Pixel Code -->
{{-- {!! settings('scheme_for_organization') !!}
        {!! settings('scheme_for_website') !!} --}}
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "FurnitureHub",
"description": "{{ settings('meta_description_ar') }}",
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
"logo": "https://furniturehubapp.com/public/assets/web/ASSETS/imgs/template/logoFur1.png",
            "sameAs": "https://www.facebook.com/furniturehubapp"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
"name":"Furniture Hub",
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
@if (getCurrentLocale() == 'en')
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
<a href="https://wa.me/201010408471" target="_blank"><img src="{{ asset('public/storage/icons/whatsApp.webp') }}"
        loading="lazy" alt="Contact" width="100px"
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
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={!! settings('google_tag_manager_GTM') !!}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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
// Function to hide the install pop-up
function hideInstallPopup() {
var installPopup = document.getElementById('installPopup');
installPopup.style.display = 'none';
}
</script>
{{-- <script>
                document.querySelectorAll('.downloadable-image').forEach(img => {
                    img.addEventListener('contextmenu', function(event) {
                        event.preventDefault();
                        const url = event.target.getAttribute('data-url');
                        const downloadLink = document.createElement('a');
                        downloadLink.href = `/download?url=${encodeURIComponent(url)}`;
                        downloadLink.download = '';
                        document.body.appendChild(downloadLink);
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    });
                });
            </script>  --}}
{{-- <script>
                // Prevent right-click context menu
                document.addEventListener('contextmenu', event => event.preventDefault());
        
                // Prevent drag and drop
                document.addEventListener('dragstart', event => event.preventDefault());
        
                // Optional: Detecting common screenshot key presses (this won't cover all methods)
                document.addEventListener('keydown', event => {
                    if (event.key === 'PrintScreen' || (event.ctrlKey && event.key === 's') || (event.metaKey && event
                            .shiftKey && event.key === '4')) {
                        alert('Screenshots are not allowed!');
                        event.preventDefault();
                    }
                });
        
                // Create and add the watermark element
                function addWatermark() {
                    const watermark = document.createElement('div');
                    watermark.style.position = 'absolute';
                    watermark.style.top = '50%';
                    watermark.style.left = '50%';
                    watermark.style.transform = 'translate(-50%, -50%)';
                    watermark.style.color = 'rgba(255, 255, 255, 0.5)';
                    watermark.style.fontSize = '20px';
                    watermark.style.pointerEvents = 'none';
                    watermark.style.userSelect = 'none';
                    watermark.innerHTML = `Furniture Hub ${Math.random().toString(36).substring(7)}`;
        
                    // Ensure the watermark is added to the correct container
                    const container = document.querySelector('.watermarked');
                    if (container) {
                        container.style.position = 'relative'; // Ensure the container has a position context
                        container.appendChild(watermark);
                    }
                }
        
                // Update watermark text periodically
                function updateWatermark() {
                    const watermark = document.querySelector('.watermarked div');
                    if (watermark) {
                        watermark.innerHTML = `Furniture Hub ${Math.random().toString(36).substring(7)}`;
                    }
                }
        
                // Initial add and periodic update
                addWatermark();
                setInterval(updateWatermark, 2000);
            </script> --}}
<script>
    $(document).ready(function() {
                    var csrf = '{{ csrf_token() }}';
        
                    function updateCartQuantity(button, increment) {
                        var _parent = button.parents(".input-quantity");
                        var _currentInput = _parent.find("input");
                        var _number = parseInt(_currentInput.val()) + increment;
                        let cart_id = _currentInput.attr('data-id');
                        var edit_cart_action = "{{ route('cart.update', ':cart_id') }}";
                        edit_cart_action = edit_cart_action.replace(':cart_id', cart_id);
        
                        // Log current operation for debugging
                        console.log('Updating cart quantity for cart_id:', cart_id);
                        console.log('New quantity:', _number);
        
                        $.ajax({
                            url: edit_cart_action,
                            type: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            },
                            data: {
                                count: _number
                            },
                            success: function(data) {
                                console.log('Data received:', data);
                                if (data.message != '') {
                                    toasterSuccess(data.message);
                                }
                                // Update the input value with the new quantity
                                _currentInput.val(_number);
                                viewCart();
                                viewCartInside();
                            },
                            error: function(data) {
                                console.error('Error received:', data);
                                if (data.responseJSON && data.responseJSON.errors) {
                                    toasterError(Object.values(data.responseJSON.errors)[0]);
                                } else {
                                    toasterError('An error occurred while updating the cart.');
                                }
                            }
                        });
                    }
        
                    $(".minus-cart").off("click").on("click", function() {
                        var _currentInput = $(this).parents(".input-quantity").find("input");
                        if (parseInt(_currentInput.val()) > 1) { // Ensure quantity doesn't go below 1
                            updateCartQuantity($(this), -1);
                        }
                    });
        
                    $(".plus-cart").off("click").on("click", function() {
                        var _currentInput = $(this).parents(".input-quantity").find("input");
                        updateCartQuantity($(this), 1);
                    });
                });
</script>
<script>
    $(document).ready(function() {
                    var csrf = '{{ csrf_token() }}';
        
                    function updateCartQuantity(button, increment) {
                        var _parent = button.parents(".input-quantity");
                        var _currentInput = _parent.find("input");
                        var _number = parseInt(_currentInput.val()) + increment;
                        let cart_id = _currentInput.attr('data-id');
                        edit_cart_action = edit_cart_action.replace(':cart_id', cart_id);
        
                        // Log current operation for debugging
                        console.log('Updating cart quantity for cart_id:', cart_id);
                        console.log('New quantity:', _number);
        
                        $.ajax({
                            url: edit_cart_action,
                            type: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': csrf
                            },
                            data: {
                                count: _number
                            },
                            success: function(data) {
                                console.log('Data received:', data);
                                if (data.message != '') {
                                    toasterSuccess(data.message);
                                }
                                // Update the input value with the new quantity
                                _currentInput.val(_number);
                                viewCart();
                                viewCartInside();
                            },
                            error: function(data) {
                                console.error('Error received:', data);
                                if (data.responseJSON && data.responseJSON.errors) {
                                    toasterError(Object.values(data.responseJSON.errors)[0]);
                                } else {
                                    toasterError('An error occurred while updating the cart.');
                                }
                            }
                        });
                    }
        
                    $(".minus-cart").off("click").on("click", function() {
                        console.log("Minus button clicked");
                        var _currentInput = $(this).parents(".input-quantity").find("input");
                        if (parseInt(_currentInput.val()) > 1) { // Ensure quantity doesn't go below 1
                            updateCartQuantity($(this), -1);
                        }
                    });
        
                    $(".plus-cart").off("click").on("click", function() {
                        console.log("Plus button clicked");
                        var _currentInput = $(this).parents(".input-quantity").find("input");
                        updateCartQuantity($(this), 1);
                    });
                });
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
if (isMobile().iOS()) {
window.location.href = appleLink;
} else if (isMobile().Android()) {
window.location.href = googleLink;
}


        }

function handleClose() {
document.querySelector(".get-app-container").style.display = "none";

}
</script>

</body>

</html>
