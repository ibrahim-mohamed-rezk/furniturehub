@extends('web.layouts.container')


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
    <section class="section-box shop-template mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-filters mt-0 pb-5 border-bottom">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 mb-0 text-lg-start text-center">
                                <h5 class="color-brand-3 text-uppercase">{{ __('web.blogs') }}</h5>
                            </div>
                            <div class="col-xl-10 col-lg-9 mb-0 text-lg-end text-center">
                            {{-- <span
                                    class="font-sm color-gray-900 font-medium border-1-right span">{{ __('web.showing') }} 1
                                    - 16 {{ __('web.of') }} 17
                                    {{ __('web.results') }}</span> --}}
                                <div class="d-inline-block">
                                    <span class="font-sm color-gray-500 font-medium">{{ __('web.sort_by') }}</span>
                                    <div class="dropdown dropdown-sort border-1-right">
                                        <form action="{{ $action }}" method="GET">
                                            <button class="btn dropdown-toggle font-sm color-gray-900 font-medium"
                                                id="dropdownSort" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">{{request()->sort_by ?? __('web.latest_posts') }}</button>
                                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort"
                                                style="margin: 0px;">
                                                <li><button type="submit" class="dropdown-item" name="sort_by"
                                                        value="{{ __('web.latest_posts') }}">{{ __('web.latest_posts') }}</button>
                                                </li>
                                                <li><button type="submit" class="dropdown-item" name="sort_by"
                                                        value="{{ __('web.oldest_posts') }}">{{ __('web.oldest_posts') }}</button>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <span class="font-sm color-gray-500 font-medium">{{ __('web.show') }}</span>
                                    <div class="dropdown dropdown-sort border-1-right">
                                        <form action="{{ $action }}" method="GET">
                                            <button class="btn dropdown-toggle font-sm color-gray-900 font-medium"
                                                id="dropdownSort2" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false" data-bs-display="static">
                                                <span>{{ $blogs->perPage() }} {{__('web.blog')}}</span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                                                <li><button type="submit" class="dropdown-item" name="number"
                                                        value="30">30 {{__('web.blog')}}</button></li>
                                                <li><button type="submit" class="dropdown-item" name="number"
                                                        value="50">50 {{__('web.blog')}}</button></li>
                                                <li><button type="submit" class="dropdown-item" name="number"
                                                        value="100">100 {{__('web.blog')}}</button></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>

                                {{-- <div class="d-inline-block"><a class="view-type-grid mr-5 active" href="blog.html"></a><a
                                        class="view-type-list" href="blog-list.html"></a></div> --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-30">
                @foreach ($blogs as $key => $row)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-40">
                        <div class="card-grid-style-1">
                            <div class="image-box"><a href="{{ $row->url }}"><img src="{{ asset($row->image_logo) }}"
                                    alt="{{ $row->title }}" loading="lazy" height="237" width="316"></a></div>
                            <a class="tag-dot font-xs" href="{{ $row->url }}">{{ $row->type->name }}</a><a
                                class="color-gray-1100" href="{{ $row->url }}">
                                <h4>{{ $row->title }}</h4>
                            </a>
                            <div class="mt-20"><span
                                    class="color-gray-500 font-xs mr-30">{{ $row->created_at->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
                        <div class="nav-center">
                <nav>
                    <ul class="pagination">
                        @if ($blogs->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link page-prev paginateScroll" style="cursor: pointer"
                                    href="{{ $blogs->url($blogs->currentPage() - 1) }}"
                                    data-id="{{ $blogs->currentPage() - 1 }}"></a>
                            </li>
                        @endif

                        @for ($i = max(1, $blogs->currentPage() - 2); $i <= min($blogs->lastPage(), $blogs->currentPage() + 2); $i++)
                            <li class="page-item">
                                <a class="page-link paginateScroll {{ $i == $blogs->currentPage() ? 'active' : '' }}"
                                    href="{{ $blogs->url($i) }}" style="cursor: pointer"
                                    data-id="{{ $i }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($blogs->currentPage() < $blogs->lastPage() - 2)
                            <li class="page-item">
                                <a class="page-link paginateScroll" style="cursor: pointer">...</a>
                            </li>

                            <li class="page-item">
                                <a class="page-link paginateScroll {{ $blogs->lastPage() == $blogs->currentPage() ? 'active' : '' }}"
                                    style="cursor: pointer" data-id="{{ $blogs->lastPage() }}"
                                    href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a>
                            </li>
                        @endif

                        @if ($blogs->currentPage() < $blogs->lastPage() && $blogs->lastPage() > 1)
                            <li class="page-item">
                                <a class="page-link page-next paginateScroll" style="cursor: pointer"
                                    data-id="{{ $blogs->currentPage() + 1 }}"
                                    href="{{ $blogs->nextPageUrl() }}"></a>
                            </li>
                        @endif
                    </ul>


                    <!-- Display the latest page number outside the pagination element -->
                    <p>Latest Page: {{ $blogs->lastPage() }}</p>
                </nav>
            </div>
            <section class="section-box mt-50">
                <div class="container mt-10">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-4">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[0]->link }}">
                                                <img src="{{ asset($banners[0]->image) }}" alt="furniturehub" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[1]->link }}">
                                                <img src="{{ asset($banners[1]->image) }}"
                                                    alt="furniturehub" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[2]->link }}">
                                                <img src="{{ asset($banners[2]->image) }}"
                                                    alt="furniturehub" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ $banners[3]->link }}">
                                                <img src="{{ asset($banners[3]->image) }}"
                                                    alt="furniturehub" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>
@endsection
