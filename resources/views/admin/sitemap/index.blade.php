@extends('admin.layouts.container')

@section('styles')
    @parent
    <style>
        .panel {
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: #f9f9f9;
            border-radius: 10px 10px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .panel-title {
            font-size: 20px;
            margin: 0;
        }

        .panel-body {
            padding: 15px;
        }

        .panel-body .form-group {
            margin-bottom: 20px;
        }

        .sitemap-url {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .link-wrapper {
            flex: 1;
        }

        .link-wrapper p {
            margin: 0;
        }

        .coupon-copy {
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
        }

        .coupon-copy:hover {
            background-color: #0056b3;
        }

        /* .copied {
                                display: none;
                            } */

        .copied.active {
            display: inline-block;
            margin-left: 5px;
        }

        /* Dark Mode Styles */
        .dark .panel-heading {
            background-color: #121212;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .dark .panel {
            background-color: #1e1e1e;

        }

        .dark .panel-title {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        }

        .dark .sitemap-url {
            color: #fff;
        }

        .dark .coupon-copy {
            background-color: #007bff;
        }

        .dark .coupon-copy:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <i class="sicon-forked"></i>
                            {{ __('web.site_map') }}
                        </h6>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="rec-flex rec-flex-row center sp mb-15">
                                {{-- <h6 class="title title--icon">
                                    <i class="sicon-forked"></i>
                                    {{__('web.site_map')}}
                                </h6> --}}
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" id="sitemap-url" class="form-control"
                                    placeholder="{{ __('Recipient\'s username') }}"
                                    value="https://furniturehubapp.com/sitemap.xml" readonly>
                                <div class="input-group-append">
                                    <button id="copy-url" type="button" class="btn btn-outline-secondary"
                                        onclick="copyUrl(this)">
                                        <i class="sicon-link"></i>
                                        <span class="copied ">{{ __('web.copy') }}</span>
                                    </button>
                                </div>
                            </div>

                            {{-- <div class="rec-flex rec-flex-row center sp payment-url payment-url--light row">
                                <div class="link-wrapper col-lg-6">
                                    <p id="sitemap-url" class="media-heading">https://furniturehubapp.com/sitemap.xml</p>
                                </div>
                                <div class="col-lg-6">

                                    <button id="copy-url" type="button" class="btn btn-xs btn-order-status coupon-copy"
                                        onclick="copyUrl()">
                                        <i class="sicon-link"></i>
                                        <span class="copied">{{ __('web.copy') }}</span>
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="text-center">
                            <a id="robots_file_form_submit" href="{{ route('admin.site_map') }}" data-inline-loader=""
                                class="btn btn-tiffany btn-full">
                                {{ __('site-map.refresh') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            <i class="sicon-forked"></i>
                            {{ __('web.robots') }}
                        </h6>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="rec-flex rec-flex-row center sp mb-15">
                                {{-- <h6 class="title title--icon">
                                    <i class="sicon-forked"></i>
                                    {{__('web.site_map')}}
                                </h6> --}}
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" id="robots-url" class="form-control"
                                    placeholder="{{ __('Recipient\'s username') }}"
                                    value="https://furniturehubapp.com/robots.txt" readonly>
                                <div class="input-group-append">
                                    <button id="copy-url-robots" type="button" class="btn btn-outline-secondary"
                                        onclick="copyUrlRobots(this)">
                                        <i class="sicon-link"></i>
                                        <span class="copied">{{ __('web.copy') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-12">
                <div class="border border-secondary rounded p-3 mb-3" id="xml-content"></div>
                <button class="btn btn-primary" id="show-more-btn">{{ __('site-map.show_more') }}</button>
                <a class="nav-link btn-icon" href="{{ route('admin.site_map') }}"><i
                    class="material-icons">{{ __('site-map.refresh') }}</i></a>
                    <br>
                    <br>
            </div> --}}
        </div>
    </section>
@endsection

@section('inner_js')
    @parent
    <script>
        // window.onload = function() {
        //     fetch('https://furniturehubapp.com/sitemap.xml')
        //         .then(response => response.text())
        //         .then(data => {
        //             displayPartialXml(data, 50);
        //         });

        //     function displayPartialXml(xml, numRows) {
        //         var lines = xml.split('\n');
        //         var partialXml = lines.slice(0, numRows).join('\n');
        //         document.getElementById('xml-content').innerText = partialXml;
        //     }

        //     function toggleFullXml() {
        //         fetch('https://furniturehubapp.com/sitemap.xml')
        //             .then(response => response.text())
        //             .then(data => {
        //                 document.getElementById('xml-content').innerText = data;
        //             });
        //     }

        //     document.getElementById('show-more-btn').addEventListener('click', toggleFullXml);
        // }

        function copyUrl(button) {
            var urlText = document.getElementById('sitemap-url').value;

            var input = document.createElement('input');
            input.setAttribute('value', urlText);
            document.body.appendChild(input);

            input.select();

            document.execCommand('copy');

            document.body.removeChild(input);

            var copiedText = button.querySelector('.copied');
            copiedText.textContent = '{{ __('web.copied') }}';

            setTimeout(function() {
                copiedText.textContent = '{{ __('web.copy') }}';
            }, 2000);
        }


        function copyUrlRobots() {
            var urlText = document.getElementById('robots-url').value;

            var input = document.createElement('input');
            input.setAttribute('value', urlText);
            document.body.appendChild(input);

            input.select();

            document.execCommand('copy');

            document.body.removeChild(input);

            var copiedText = button.querySelector('.copied');
            copiedText.textContent = '{{ __('web.copied') }}';

            setTimeout(function() {
                copiedText.textContent = '{{ __('web.copy') }}';
            }, 2000);
        }
    </script>
@endsection
