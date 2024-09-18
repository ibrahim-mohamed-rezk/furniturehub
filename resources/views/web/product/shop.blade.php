@extends('web.layouts.container')
@section('content')

    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    @if ($category != null)
                        <li><a class="font-xs color-gray-500"
                                href="{{ route('web.shop') }}?category_id={{ $category->id }}">{{ $category->title }}</a>
                        </li>
                    @else
                        <li><a class="font-xs color-gray-500" href="#">{{ __('web.shop') }}</a></li>
                    @endif
                    @if ($model !== null)
                        <li><a class="font-xs color-gray-500"
                                href="{{ route('web.shop') }}?category_id={{ $category->id }}&model_id={{ $model->id }}">{{ $model->title }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <div class="section-box shop-template ">
        <div class="container">
            <section class="section-box mt-50">
                <div class="container mt-10">
                    <div class="box-swiper">
                        <div class="swiper-container swiper-group-4">
                            <div class="swiper-wrapper pt-5">
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ route($banners[0]->url['first'], $banners[0]->url['second'] ?? '') }}">
                                                <img src="{{ asset($banners[0]->image) }}" alt="furniturehub" loading="lazy">
                                            </a>

                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="card-grid-style-1">
                                        <div class="image-box">
                                            <a href="{{ route($banners[1]->url['first'], $banners[1]->url['second'] ?? '') }}">
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
                                            <a href="{{ route($banners[2]->url['first'], $banners[2]->url['second'] ?? '') }}">
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
                                            <a href="{{ route($banners[3]->url['first'], $banners[3]->url['second'] ?? '') }}">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-filters mt-0 pb-5 border-bottom">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 mb-10 text-lg-start text-center"><a
                                    class="btn btn-filter font-sm color-brand-3 font-medium" href="#ModalFiltersForm"
                                    data-bs-toggle="modal">{{ __('web.all_fillters') }}</a></div>
                            <div class="col-xl-10 col-lg-9 mb-10 text-lg-end text-center">
                                <span
                                    class="font-sm color-gray-900 font-medium border-1-right span">{{ __('web.showing') }}
                                    <small id="num"></small>&ndash;<small id="paginates"></small> {{ __('web.of') }}
                                    <small id="count_products"></small> {{ __('web.results') }}</span>
                                <div class="d-inline-block">
                                    <span class="font-sm color-gray-500 font-medium">{{ __('web.sort_by') }}</span>
                                    <div class="dropdown dropdown-sort border-1-right">
                                        <button class="btn dropdown-toggle font-sm color-gray-900 font-medium"
                                            id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                            data-bs-display="static">
                                            <span>{{ __('web.latest_products') }}</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2"
                                            style="margin: 0px;">
                                            <li><a class="dropdown-item orderBy" data-id="DESC" onclick="selectOrder(this)"
                                                    style="cursor: pointer">{{ __('web.latest_products') }}</a></li>
                                            <li><a class="dropdown-item orderBy" data-id="ASC" onclick="selectOrder(this)"
                                                    style="cursor: pointer">{{ __('web.oldest_products') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <span class="font-sm color-gray-500 font-medium">{{ __('web.sort_by') }}</span>
                                    <div class="dropdown dropdown-sort border-1-right">
                                        <button class="btn dropdown-toggle font-sm color-gray-900 font-medium"
                                            id="dropdownSort3" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false" data-bs-display="static">
                                            <span>{{ __('web.price_products') }}</span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2"
                                            style="margin: 0px;">
                                            <li><a class="dropdown-item priceBy" data-id="ASC" onclick="selectPrice(this)"
                                                    style="cursor: pointer">{{ __('web.low_high') }}</a></li>
                                            <li><a class="dropdown-item priceBy" data-id="DESC" onclick="selectPrice(this)"
                                                    style="cursor: pointer">{{ __('web.high_low') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
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
            </div>
        </div>
    </div>


    <div class="modal fade" id="ModalFiltersForm" tabindex="-1" aria-hidden="true" style="display: none;">
        <form id="filterForm">
            <div class="modal-dialog modal-xl">
                <div class="modal-content apply-job-form">
                    <div class="modal-header">
                        <h5 class="modal-title color-gray-1000 filters-icon">{{ __('web.advance_fillters') }}</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-30">
                        <div class="row">
                            <div class="col-w-1">
                                <h6 class="color-gray-900 mb-0">{{ __('web.brands') }}</h6>
                                <ul class="list-checkbox">
                                    @foreach ($categories as $row)
                                        <li>
                                            <label class="cb-container">
                                                <input onclick="filtering()" type="checkbox" name="category_id[]"
                                                    value="{{ $row->id }}">
                                                <span class="text-small">{{ $row->title }}</span><span
                                                    class="checkmark"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-w-1">
                                <h6 class="color-gray-900 mb-0">{{ __('web.special_offers') }}</h6>
                                <ul class="list-checkbox">
                                    <li>
                                        <label class="cb-container">
                                            <input onclick="filtering()" type="checkbox" name="offer[]" value="sale">
                                            <span class="text-small">{{ __('web.hot_deals') }}</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cb-container">
                                            <input onclick="filtering()" type="checkbox" name="offer[]"
                                                value="best_selling">
                                            <span class="text-small">{{ __('web.best_selling') }}</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-w-1">
                                <h6 class="color-gray-900 mb-0 ">{{ __('web.ready_to_ship_in') }}</h6>
                                <ul class="list-checkbox">
                                    <li>
                                        <label class="cb-container">
                                            <input onclick="filtering()" type="checkbox" name="shipping[]"
                                                value="7">
                                            <span class="text-small">{{ __('web.in_1_week') }}</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="cb-container">
                                            <input onclick="filtering()" type="checkbox" name="shipping[]"
                                                value="20">
                                            <span class="text-small">{{ __('web.20_business_days') }}</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    {{-- <li>
                                        <label class="cb-container">
                                            <input onclick="filtering()" type="checkbox" name="shipping[]" value="0">
                                            <span class="text-small">Shipping now</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="col-w-1">
                                <h6 class="color-gray-900 mt-10 mb-10">{{ __('web.price') }}</h6>
                                <div class="box-slider-range1 mt-20 mb-15">
                                    <div class="row mb-20">
                                        <div class="col-sm-12">
                                            <div id="slider-range1"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label
                                                class="lb-slider font-sm color-gray-500">{{ __('web.price_range') }}</label><span
                                                class="min_value-money font-sm color-gray-1000"></span>
                                            <label class="lb-slider font-sm font-medium color-gray-1000"></label>-
                                            <span class="max_value-money font-sm font-medium color-gray-1000"></span>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn apply_price " style="background-color: #fd9636; padding: 5px 10px; font-size: 12px; ">{{ __('web.ok') }}</button>

                                        </div>
                                        <div class="col-lg-12">
                                            <input class="form-control min_value" type="hidden" name="min_value"
                                                value="">
                                            <input class="form-control max_value" type="hidden" name="max_value"
                                                value="">
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@section('container_js')
    <script>
        $(document).ready(function() {
            $(".noUi-handle").on("click", function() {
                $(this).width(50);
            });
            var rangeSlider = document.getElementById("slider-range1");
            var rangeSlider2 = $("#slider-range1");
            if (rangeSlider2.length > 0) {
                var moneyFormat = wNumb({
                    decimals: 0,
                    thousand: ",",
                    prefix: "{{ $currency->symbol }}"
                });
                noUiSlider.create(rangeSlider, {
                    start: [{{ $low_cost }}, {{ $high_cost }}],
                    step: 1,
                    range: {
                        min: [{{ $low_cost }}],
                        max: [{{ $high_cost }}]
                    },
                    format: moneyFormat,
                    connect: true
                });
                $(".apply_price").on("click", function(e) {
                    e.preventDefault(); // Prevent the default form submission behavior
                    let lowPrice = updateLowValue();
                    let highPrice = updateHighValue();

                    // You can use lowPrice and highPrice as needed
                    console.log("Low Price:", lowPrice);
                    console.log("High Price:", highPrice);

                    // Call the filtering function with the updated values
                    filtering();
                });


                // Set visual min and max values and also update value hidden form inputs
                rangeSlider.noUiSlider.on("update", function(values, handle) {
                    $(".min_value-money").html(values[0]);
                    $(".max_value-money").html(values[1]);
                    $(".min_value").val(moneyFormat.from(values[0]));
                    $(".max_value").val(moneyFormat.from(values[1]));
                    updateLowValue();
                    updateHighValue();
                });
                $(".max_value").on("input", function() {
                    updateHighValue();
                });

                // Event listener for the input field with class 'min_value'
                $(".min_value").on("input", function() {
                    updateLowValue();
                });
            }
        });
    </script>
    <script>
        var url_filtering = "{{ route('web.shop') }}";

        function pagination(elem) {
            $('.paginateScroll').removeClass('active');
            $(elem).addClass('active');
            filtering(true);
        }

        function selectItem(elem) {
            $('.items').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }

        function selectPrice(elem) {
            $('.priceBy').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }


        function selectOrder(elem) {
            $('.orderBy').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }

        function updateLowValue() {
            let lowPrice = $(".min_value").val();
            return lowPrice;
        }

        function updateHighValue() {
            let highPrice = $(".max_value").val();
            return highPrice;
        }

        function filtering(resetNum) {
            let productName = {!! json_encode($request->product) !!};
            let category = {!! json_encode($request->category_id) !!};
            let model = {!! json_encode($request->model_id) !!};
            let formData = $('#filterForm').serializeArray();
            let orderBy = $('.orderBy.active').attr('data-id');
            let max_price = $(".max_value").val();
            let min_price = $(".min_value").val();
            formData.push({
                name: 'max_price',
                value: max_price
            });
            formData.push({
                name: 'min_price',
                value: min_price
            });

            if (orderBy == undefined) {
                orderBy = null;
            }
            formData.push({
                name: 'orderBy',
                value: orderBy
            });

            let itmeCount = $('.items.active').attr('data-id');
            if (itmeCount == undefined) {
                itmeCount = null;
            }
            formData.push({
                name: 'take',
                value: itmeCount
            });

            let priceBy = $('.priceBy.active').attr('data-id');
            if (priceBy == undefined) {
                priceBy = null;
            }
            formData.push({
                name: 'priceBy',
                value: priceBy
            });

            if (resetNum == true) {
                let numCount = $('.paginateScroll.active').attr('data-id');
                if (numCount == undefined) {
                    numCount = null;
                }
                formData.push({
                    name: 'num',
                    value: numCount
                });
            }

            if (productName) {
                formData.push({
                    name: 'product',
                    value: productName
                });
            }

            if (category) {
                formData.push({
                    name: 'category',
                    value: category
                });
            }

            if (model) {
                formData.push({
                    name: 'model',
                    value: model
                });
            }

            $.ajax({
                url: url_filtering,
                type: 'GET',
                dataType: 'JSON',
                data: formData,
                success: function(data) {
                    console.log(max_price);
                    $('#filtering').html(data.data.res);
                    $('#num').html(data.data.filter.num);
                    $('#paginates').html(data.data.filter.paginates);
                    $('#count_products').html(data.data.filter.count_products);
                    window.scrollTo(0, 150);
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            });
        }
        setTimeout(function() {
            filtering(null);
        }, 10);
    </script>
    
@endsection

@endsection
