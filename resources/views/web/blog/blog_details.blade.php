@extends('web.layouts.container')
@section('styles')
    <style>
        body {
            font-family: Arabic-DroidKufi;
        }

        .content-text p {
            color: #0e224d;
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ route('web.blog') }}">{{ __('web.blog') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-12 mb-50 display-list"><a class="tag-dot font-xs">{{ $article->type->name }}</a>
                            <h3 class="mt-15 mb-25">{{ $article->title }}</h3>
                            <div class="box-author mb-5">
                                <div class="img-author mr-30"><img src="{{ asset($article->user_image) }}"
                                        alt="{{ $article->title }}" loading="lazy"><span class="font-md-bold">By
                                        {{ $article->user }}</span></div>
                                <span
                                    class="datepost color-gray-500 font-sm mr-30">{{ $article->created_at->format('F d, Y') }}</span>
                            </div>
                            <div class="image-feature"><img src="{{ asset($article->image) }}" loading="lazy"
                                    alt="{{ $article->title }}"></div>
                            <div class="content-text">
                                <p>{!! $article->description !!}</p>

                                <div class="image-single"><img src="{{ asset($article->image_two) }}" loading="lazy"
                                        alt="{{ $article->title }}">
                                </div>

                            </div>
                            <div class="border-bottom-4 mb-20"></div>
                            <div class="row">

                                <div class="col-lg-6 text-end ">
                                    <div class="d-inline-block pt-5 pb-5">
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="section-box shop-template mt-30">
        <div class="container">
            <h3 class="color-brand-3">{{ __('web.related_blogs') }}</h3>
            <div class="row mt-30">
                @foreach ($relate_blogs as $key => $row)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-40">
                        @include('web.component.blog.blogComponent', ['article' => $row])
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection

@section('container_js')
@endsection
