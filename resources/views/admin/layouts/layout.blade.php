<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(settings('url_icon')) }}">
    <link href="{{ url('/public') }}/assets/admin/assets/css/style.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ __('dashboard.dashboard') }} | {{ $title ?? ' ' }}</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    
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
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D83C10B4RY"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D83C10B4RY"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FZSQ79JSPC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FZSQ79JSPC');
    </script>
    <style>
        .page-break-before {
            page-break-before: always;
        }
        .page-break-after {
            page-break-after: always;
        }
        .ck-editor__editable[role="textbox"] {
                /* editing area */
                color: black;
                min-height: 200px;

            }
    </style>
    

</head>

<body class="{{ $theme == 'dark' ? 'dark' : 'light' }}">

    @yield('container_content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ url('/public') }}/assets/admin/assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/public') }}/assets/admin/assets/js/vendors/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{url('/public')}}/assets/admin/assets/js/vendors/select2.min.js"></script> --}}
    <script src="{{ url('/public') }}/assets/admin/assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="{{ url('/public') }}/assets/admin/assets/js/vendors/jquery.fullscreen.min.js"></script>
    {{-- <script src="{{url('/public')}}/assets/admin/assets/js/vendors/chart.js"></script> --}}
    <script src="{{ url('/public') }}/assets/admin/assets/js/main.js?v=1.0.0"></script>
    <script src="{{ url('/public') }}/assets/admin/assets/js/custom-chart.js" type="text/javascript"></script>

    <script>
        function deleteRow(elem) {
            var urls = $(elem).attr('href');
            $.ajax({
                url: urls,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                }
            })
            setTimeout(
                function() {
                    location.reload();
                }, 100);
        }
    </script>

    @yield('inner_js')

</body>

</html>
