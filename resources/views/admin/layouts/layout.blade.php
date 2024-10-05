<!DOCTYPE html>
<!-- <html @if(getCurrentLocale() == "ar")  lang="ar" dir="rtl" @else lang="en" @endif> -->
<html lang="en" >
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
    <link href="{{ asset('/assets/admin/assets/css/style3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ __('dashboard.dashboard') }} | {{ $title ?? ' ' }}</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <x-head.tinymce-config/>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <style>
        .page-break-before {
            page-break-before: always;
        }

        .page-break-after {
            page-break-after: always;
        }



        /* Basic styles for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10000000000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 0;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }


        .ck-editor__editable[role="textbox"] {
            /* editing area */
            color: black;
            min-height: 200px;

        }
    </style>

    @yield('styles')

</head>

<body class="{{ $theme == 'dark' ? 'dark' : 'light' }}">

    @yield('container_content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="{{ url('') }}/assets/admin/assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="{{ url('') }}/assets/admin/assets/js/vendors/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{url('')}}/assets/admin/assets/js/vendors/select2.min.js"></script> --}}
    <script src="{{ url('') }}/assets/admin/assets/js/vendors/perfect-scrollbar.js"></script>
    <script src="{{ url('') }}/assets/admin/assets/js/vendors/jquery.fullscreen.min.js"></script>
    {{-- <script src="{{url('')}}/assets/admin/assets/js/vendors/chart.js"></script> --}}
    <script src="{{ url('') }}/assets/admin/assets/js/main.js?v=1.0.0"></script>
    <script src="{{ url('') }}/assets/admin/assets/js/custom-chart.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


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
    <script>
        function confirmDelete(elem) {
            var urls = $(elem).attr('href');
            var message = "{{ __('dashboard.are_you_sure_you_want_to_delete_this_item') }}";
            if (confirm(message)) {
                $.ajax({
                    url: urls,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                });
                setTimeout(
                    function() {
                        location.reload();
                    }, 100);
            }
        }
    </script>

    @yield('inner_js')

</body>

</html>
