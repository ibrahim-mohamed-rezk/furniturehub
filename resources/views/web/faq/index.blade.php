@extends('web.layouts.container')
@section('styles')
    <style>
        .faq-section {
            /* background-color: #f9f9f9; */
            padding: 30px;
            /* height: calc(100vh - 155px); */
        }

        p {
            font-size: 18px;
            line-height: 1.5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .questions {
            margin-top: 20px;
        }

        .accordion-item {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
        }

        .accordion-header {
            background-color: #CCC5B9;
            color: black;
            padding: 15px;
            cursor: pointer;
            display: block;
            font-size: 18px;
            font-weight: bold;
        }

        .accordion-content {
            padding: 15px;
            display: none;
            font-size: 16px;
            background-color: #fff;
        }

        input[type="checkbox"] {
            display: none;
        }

        input[type="checkbox"]:checked+.accordion-header {
            background-color: #CCC5B9;
        }

        input[type="checkbox"]:checked+.accordion-header+.accordion-content {
            display: block;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .col-lg-6 {
                width: 100%;
            }
        }
    </style>
    @foreach ($faqs as $key =>$row)

        <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity":{
                "@type":"Question",
                "name":"{!! $row->request !!}",
                "acceptAnswer":{
                    "@type":"Answer",
                    "text":" {!! $row->response !!}"
                }
            }
            }
        </script>
    @endforeach
    
@endsection
@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ url()->current() }}">{{ __('web.FAQs') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 mx-auto page-content">

            <h2 class="text-center mb-20">{{ __('web.FAQs') }}</h2>
            <img class="mb-30" src="/public/storage/imgs/privcy Policy.jpg" alt="Furniture Hub">

            <div class="faq-section sec-padd">
                <div class="container">
                    <div class="questions">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="accordion">
                                    @foreach ($faqs as $key =>$row)
                                        <!-- Question 1 -->
                                        <div class="accordion-item">
                                            <input type="checkbox" id="question{{ $key }}">
                                            <label for="question{{ $key }}" class="accordion-header">
                                                {!! $row->request !!}
                                            </label>
                                            <div class="accordion-content">
                                                <p>
                                                    {!! $row->response !!}
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        
                                    @endforeach

                                    

                                </div>
                            </div>
                            

                        </div>
                    </div>

                    <!-- Add News section here -->

                </div>
            </div>
        </div>
    </div>
@endsection
