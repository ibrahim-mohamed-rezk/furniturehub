@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="#">{{__('web.offers')}}</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section-box shop-template mt-30">
        <div class="container">
            <div class="row">
                
                <!-- Banner column on the right -->

                <section class="section-box mt-50">
                    <div class="container mt-10">
                        <div class="box-swiper">
                            <div class="swiper-container swiper-group-4">
                                <div class="swiper-wrapper pt-5">
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[1]->url['first'], $banner[1]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[1]->image) }}" alt="Ecom">
                                                </a>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[2]->url['first'], $banner[2]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[2]->image) }}"
                                                         alt="furniture_hub">
                                                </a>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[3]->url['first'], $banner[3]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[3]->image) }}"
                                                         alt="furniture_hub">
                                                </a>

                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[5]->url['first'], $banner[5]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[5]->image) }}"
                                                         alt="Furniture_hub">
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




                <div class="col-lg-12">
                    <div class="box-filters mt-0 pb-5 border-bottom">
                        <div class="row">
                            <div class="row pb-3">
                                <form id="filterForm">
                                </form>

                                <div class="col-xl-2  col-lg-2  col-md-2 col-sm-2 col-xs-2" id="category_offer">
                                    <label class="cb-container">
                                        <input onclick="filtering()" form="filterForm" type="checkbox" name="category_id[]"
                                            value="84">
                                        <span
                                            class="font-xs color-gray-900 font-small  span">{{ __('web.lazyboy') }}</span><span
                                            class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-xl-2  col-lg-2  col-md-2 col-sm-2 col-xs-2" id="category_offer">
                                    <label class="cb-container">
                                        <input onclick="filtering()" form="filterForm" type="checkbox" name="category_id[]"
                                            value="28">
                                        <span
                                            class="font-xs color-gray-900 font-small  span">{{ __('web.lightning') }}</span><span
                                            class="checkmark"></span>
                                    </label>

                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-xs-2" id="category_offer">
                                    <label class="cb-container">
                                        <input onclick="filtering()" form="filterForm" type="checkbox" name="category_id[]"
                                            value="19">
                                        <span
                                            class="font-xs color-gray-900 font-small  span">{{ __('web.tables') }}</span><span
                                            class="checkmark"></span>
                                    </label>


                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-xs-2" id="category_offer">
                                    <label class="cb-container">
                                        <input onclick="filtering()" form="filterForm" type="checkbox" name="category_id[]"
                                            value="15">
                                        <span
                                            class="font-xs color-gray-900 font-small  span">{{ __('web.decor') }}</span><span
                                            class="checkmark"></span>
                                    </label>


                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-xs-2" id="category_offer">
                                    <label class="cb-container">
                                        <input onclick="filtering()" form="filterForm" type="checkbox" name="category_id[]"
                                            value="12">
                                        <span
                                            class="font-xs color-gray-900 font-small  span">{{ __('web.storage_unit') }}</span><span
                                            class="checkmark"></span>
                                    </label>


                                </div>
                                <div class="col-xl-2 col-lg-2  col-md-2 col-sm-2 col-xs-2" id="category_offer">
                                    <label class="cb-container">
                                        <input onclick="filtering()" form="filterForm" type="checkbox" name="category_id[]"
                                            value="40">
                                        <span
                                            class="font-xs color-gray-900 font-small  span">{{ __('web.room_sets') }}</span><span
                                            class="checkmark"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-3 mb-10 text-lg-start text-center">
                                <form class="form-search" method="get" action="{{ route('web.offers') }}">
                                    <div class="input-group">
                                        <input class="form-control font-xs" name="product_offer" type="text"
                                            @isset($request) value="{{ $request->product_offer }}" @endisset
                                            placeholder="{{ __('web.search_for_items') }}">
                                        <button class="btn btn-dark" type="submit">{{ __('web.search') }}</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-8 col-lg-9 mb-10 text-lg-end text-center">
                                <span
                                    class="font-sm color-gray-900 font-medium border-1-right span">{{ __('web.showing') }}
                                    <small id="num"></small>&ndash;<small id="paginates"></small>
                                    {{ __('web.of') }}
                                    <small id="count_products"></small> {{ __('web.results') }}</span>

                                <div class="d-inline-block"><span
                                        class="font-sm color-gray-500 font-medium">{{ __('web.show') }}</span>
                                    <div class="dropdown dropdown-sort ">
                                        <button class="btn dropdown-toggle font-sm color-gray-900 font-medium"
                                            id="dropdownSort2" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false" data-bs-display="static">
                                            <span>30 {{ __('web.items') }}</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                                            <li><a class="dropdown-item items " data-id="28" onclick="selectItem(this)"
                                                    style="cursor: pointer">30 {{ __('web.items') }}</a></li>
                                            <li><a class="dropdown-item items" data-id="48" onclick="selectItem(this)"
                                                    style="cursor: pointer">50 {{ __('web.items') }}</a></li>
                                            <li><a class="dropdown-item items" data-id="100" onclick="selectItem(this)"
                                                    style="cursor: pointer">100 {{ __('web.items') }}</a></li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filtering">

                    </div>

                </div>

                <section class="section-box mt-50">
                    <div class="container mt-10">
                        <div class="box-swiper">
                            <div class="swiper-container swiper-group-4">
                                <div class="swiper-wrapper pt-5">
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[0]->url['first'], $banner[0]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[0]->image) }}" alt="Ecom">
                                                </a>

                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[4]->url['first'], $banner[4]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[4]->image) }}"
                                                         alt="furniture_hub">
                                                </a>

                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[6]->url['first'], $banner[6]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[6]->image) }}"
                                                         alt="furniture_hub">
                                                </a>

                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card-grid-style-1">
                                            <div class="image-box">
                                                <a href="{{ route($banner[7]->url['first'], $banner[7]->url['second'] ??'') }}">
                                                    <img src="{{ asset($banner[7]->image) }}"
                                                         alt="Furniture_hub">
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
        </div>
    </section>
@endsection
@section('container_js')
    <script>
        var url_filtering = "{{ route('web.offers') }}";

        function pagination(elem) {
            $('.paginateScroll').removeClass('active')
            $(elem).addClass('active')
            filtering(true)
        }

        function selectItem(elem) {
            $('.items').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }

        function selectOrder(elem) {
            $('.orderBy').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }

        function filtering(resetNum) {
            let productName = {!! json_encode($request->product_offer) !!};
            let category = {!! json_encode($request->category_id) !!};
            let model = {!! json_encode($request->model_id) !!};
            let formData = $('#filterForm').serializeArray();
            let orderBy = $('.orderBy.active').attr('data-id');
            if (orderBy == undefined) {
                orderBy = null
            }
            formData.push({
                name: 'orderBy',
                value: orderBy
            })
            let itmeCount = $('.items.active').attr('data-id');
            if (itmeCount == undefined) {
                itmeCount = null
            }
            formData.push({
                name: 'take',
                value: itmeCount
            })
            if (resetNum == true) {
                let numCount = $('.paginateScroll.active').attr('data-id');
                if (numCount == undefined) {
                    numCount = null
                }
                formData.push({
                    name: 'num',
                    value: numCount
                })
            }
            if (productName) {
                formData.push({
                    name: 'product_offer',
                    value: productName
                })
            }
            if (category) {
                formData.push({
                    name: 'category',
                    value: category
                })
            }
            if (model) {
                console.log(model);
                formData.push({
                    name: 'model',
                    value: model
                })
            }
            $.ajax({
                url: url_filtering,
                type: 'GET',
                dataType: 'JSON',
                data: formData,
                success: function(data) {
                    $('#filtering').html(data.data.res);
                    $('#num').html(data.data.filter.num);
                    $('#paginates').html(data.data.filter.paginates);
                    $('#count_products').html(data.data.filter.count_products);
                    window.scrollTo(0, 150);

                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
        }
        setTimeout(filtering(null), 1000);
    </script>
@endsection
