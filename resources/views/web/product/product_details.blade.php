@extends('web.layouts.container')
@section('styles')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "{!! $product->name !!}",
            "brand": {"@type": "Brand","name": "furniturehub"},
            "sku": "{!! $product->sku_code !!}",
            "description": "{!! $product->description !!}",
            "image":"{!! $product->image_url !!}",
            "url":"{!! $product->url !!}",
            "offers": 
                [{
                "@type": "Offer",
                "price": "{!!$product->cost!!}",
                "priceCurrency": "{!! __("web.L.E") !!}",
                "itemCondition": "https://schema.org/NewCondition",
                "url": "{!! $product->url !!}",
                "sku": "{!! $product->sku_code !!}",
                "availability" : "https://schema.org/InStock",
                }],
            "review": {
                "@type": "Review",
                "reviewRating": {
                "@type": "Rating",
                "ratingValue": 4,
                "bestRating": 5
                },
                "author": {
                "@type": "Person",
                "name": "FurnitureHub"
                }
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": {!! $product->rates['rate'] !!},
                "reviewCount": 89
            }
        }
    </script>
    <script type='text/javascript'
        src='https://platform-api.sharethis.com/js/sharethis.js#property=6514290cc8722100193bdfde&product=inline-share-buttons'
        async='async'></script>
@endsection

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500"
                            href="{{ route('web.shop') }}?category_id={{ $product->category->category_id }}">{{ $product->category->getTitleOfMainCategoryById($product->category->id) }}</a>
                    </li>
                    <li><a class="font-xs color-gray-500"
                            href="{{ route('web.shop') }}?category_id={{ $product->category->id }}">{{ $product->category->details->title }}</a>
                    </li>
                    <li><a class="font-xs color-gray-500" href="#">{{ $product->name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="overflow: hidden; ">
                    <div class="gallery-image">
                        <div class="galleries">
                            <div class="detail-gallery">
                                @if ($product->cost_discount)
                                    <label class="label">{{ __('web.save') }}
                                        {{ 100 - $product->percentage }}%</label>
                                @endif
                                @if (in_array($product->id, $offer_ids))
                                    <label class="label">{{ __('web.use_cobon_to_save') }}</label>
                                @endif
                                {{-- @if (in_array($product->id, $offer_category_ids))

                                    <label class="label">{{ __('web.use_cobon_to_save') }}</label>
                                    
                                @endif --}}

                                <div class="product-image-slider">
                                    <figure class="border-radius-10"
                                        style="display: inline-block; width: auto; height: auto; margin: 0;">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="downloadable-image" data-filename="{{ $product->image_url }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </figure>
                                    @foreach ($product->photos as $photo)
                                        <figure class="border-radius-10"
                                            style="display: inline-block; width: auto; height: auto; margin: 0;">
                                            <img src="{{ $photo->image_url }}" alt="{{ $product->name }}"
                                                class="downloadable-image" data-filename="{{ $product->image_url }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                            <div class="slider-nav-thumbnails">
                                <div>
                                    <div class="item-thumb"
                                        style="display: inline-block; width: auto; height: auto; margin: 0;">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                            class="downloadable-image" data-filename="{{ $product->image_url }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </div>
                                @foreach ($product->photos as $photo)
                                    <div>
                                        <div class="item-thumb"
                                            style="display: inline-block; width: auto; height: auto; margin: 0;">
                                            <img src="{{ $photo->image_url }}" alt="{{ $product->name }}"
                                                class="downloadable-image" data-filename="{{ $product->image_url }}"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="color-brand-3 mb-10" style="font-size: 1.75em;">{{ $product->name }}</h1>
                    @if ($product->rates['rate'] != 0)
                        <div class="rating mt-5">
                            {{-- <h6>{{ $product->rates['rate'] }} {{ __('web.out_of') }} 5</h6> --}}
                            <span class="font-xs color-gray-500">({{ $product->rates['rate'] }} {{ __('web.out_of') }}
                                5)</span>
                            @include('web.component.rate.rateComponent', [
                                'rate' => $product->rates['rate'],
                            ])
                        </div>
                    @endif

                    @if ($product->cost_discount)
                        @if ($product->cost < 10000)
                            <sympl-widget productprice="{{ $product->cost }}" storecode="STR-343"></sympl-widget>
                        @endif
                    @else
                        @if ($product->cost < 10000)
                            <sympl-widget productprice="{{ $product->cost }}" storecode="STR-343"></sympl-widget>
                        @endif
                    @endif
                    <div class="border-bottom pt-20 mb-10"></div>
                    <div class="box-product-price">

                        @if ($product->cost_discount)
                            <h3 class="color-brand-3 price-main d-inline-block mr-10">{{ $product->cost_discount }}
                                {{ __('web.L.E') }}</h3>
                            <span class="color-gray-500 price-line font-xl line-througt">{{ $product->cost }}
                                {{ __('web.L.E') }}</span>
                                @else
                                <h3 class="color-brand-3 price-main d-inline-block mr-10">{{ $product->cost }}
                                    {{ __('web.L.E') }}</h3>
                        @endif
                        <span class="color-brand-3 font-xl">{{ '/' . __('products.' . $product->type) }} </span>

                    </div>
                    <div class="progress mb-5" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $product->percentage }}%"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    @if ($product->cost_discount)
                        <span>{{ __('web.saving') }} : {{ $product->cost_discount - $product->cost }}
                            {{ __('web.L.E') }}</span>
                    @endif


                    <div class="product-description mt-20 color-gray-900">
                        @foreach ($product->items as $key => $item)
                            @if ($key != 0)
                                <br>
                            @endif – {{ $item->details->name }}
                        @endforeach
                    </div>
                    <div class="buy-product mt-20">
                        <div class="box-quantity">
                            {{-- <p class="font-sm mb-2">{{ __('web.quantity') }}</p> --}}
                            <div class="input-quantity">
                                <span class="quantity-control minus-cart"></span>
                                <input class="font-xl color-brand-3 count" type="text" value="1" min="1">
                                <span class="quantity-control plus-cart"></span>
                            </div>
                            {{--  <div class="input-quantity">
                                <span class="minus-cart"><i class="fas fa-minus"></i></span>
                                <input class="font-xl color-brand-3 box-input count"type="text" value="1" min="1">
                                <span class="plus-cart"><i class="fas fa-plus"></i></span>
                            </div>  --}}
                            <div class="button-buy mt-2">
                                <a class="btn btn-cart" data-id="{{ $product->id }}" onclick="addCart(this)"
                                    style="cursor: pointer">{{ __('web.add_to_cart') }}</a>
                                <a class="btn btn-buy" data-id="{{ $product->id }}" onclick="buynow(this)"
                                    style="cursor: pointer">{{ __('web.buy_now') }}</a>
                                <a class="btn btn-buy" href="https://wa.me/201060552252?text={{ url()->current() }}"
                                    style="cursor: pointer;background: #52d160;"
                                    target="_blank">{{ __('web.contact_us') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="border-bottom pt-30 mb-20"></div><a class="mr-30 " onclick="toggleFavoriteProduct(this)"
                        data-id="{{ $product->id }}" style="cursor:pointer;"><span
                            class="btn btn-wishlist mr-5 opacity-100 transform-none"></span><span
                            class="font-md color-gray-900">{{ __('web.add_to_Wishlist') }}</span></a>
                    <a onclick="addCompare(this)" data-id="{{ $product->id }}" style="cursor:pointer;"><span
                            class="btn btn-compare mr-5 opacity-100 transform-none"></span><span
                            class="font-md color-gray-900">{{ __('web.add_to_Compare') }}</span></a>
                </div>
            </div>
        </div>
        <div class="border-bottom pt-10 mb-10"></div>
        @if ($extensions->isNotEmpty())
            <section class="section-box shop-template">
                <div class="container">
                    <div class="pt-30 mb-10">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                @foreach ($extensions as $row)
                                    <tr>
                                        <td>{!! __('web.' . $row->title) !!}</td>
                                        <td>{!! $row->value !!} {{ __('web.L.E') }}<span
                                                class="mx-5 line-througt">{!! $row->value_discount !!} {{ __('web.L.E') }}
                                            </span></td>
                                        <td><a class="btn btn-cart" data-id="{{ $row->id }}" style="width: 150px"
                                                onclick="addCart(this)"
                                                style="cursor: pointer">{{ __('web.add_to_cart') }}</a></td>
                                    </tr>
                                @endforeach



                            </table>
                        </div>

                    </div>
                </div>
            </section>
            <div class="border-bottom pt-10 mb-10"></div>
        @endif

        <div class="sharethis-inline-share-buttons"></div>

        </div>
    </section>
    <section class="section-box shop-template">
        <div class="container">
            <div class="pt-30 mb-10">
                <ul class="nav nav-tabs nav-tabs-product" role="tablist">
                    <li><a class="active" href="#tab-specification" data-bs-toggle="tab" role="tab"
                            aria-controls="tab-specification" aria-selected="true">{{ __('web.specification') }}</a>
                    </li>
                    <li><a href="#tab-description" style="padding-left: 10px;" data-bs-toggle="tab" role="tab"
                            style="margin-left:-14px;" aria-controls="tab-description"
                            aria-selected="true">{{ __('web.description') }}</a>
                    </li>

                    <li><a href="#tab-reviews" data-bs-toggle="tab" role="tab" aria-controls="tab-reviews"
                            aria-selected="true">{{ __('web.reviews') }} </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade " id="tab-description" role="tabpanel" aria-labelledby="tab-description">
                        <div class="display-text-short">
                            <p>{!! $product->description !!}</p>
                        </div>
                        <div class="mt-20 text-center"><a
                                class="btn btn-border font-sm-bold pl-80 pr-80 btn-expand-more">{{ __('web.more_details') }}</a>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="tab-specification" role="tabpanel"
                        aria-labelledby="tab-specification">
                        {{-- <h5 class="mb-25">{{ __('web.specification') }}</h5> --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td>{{ __('products.material') }}</td>
                                    <td>{!! $product->material !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('products.dimensions') }}</td>
                                    <td>{!! $product->dimensions !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('products.color') }}</td>
                                    <td>{!! $product->color !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('products.delivery') }}</td>
                                    <td>{!! $product->delivery !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('products.made_in') }}</td>
                                    <td>{!! $product->made_in !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('products.sku_code') }}</td>
                                    <td>{!! $product->sku_code !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('web.category') }}</td>
                                    <td>{!! $product->category->details->title !!}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('products.tags') }}</td>
                                    <td>
                                        @foreach ($product->tags as $key => $tag)
                                            {{ $tag->details->name }} @if (count($product->tags) - 1 != $key)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>

                                @foreach ($product->sections as $section)
                                    <tr>
                                        <td>{{ $section->details->key }}</td>
                                        <td>{{ $section->details->value }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="tab-reviews">
                        <div class="comments-area">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="mb-30 title-question">{{ __('web.customer_reviews') }}</h4>
                                    <div class="d-flex mb-30">
                                        <div class="product-rate d-inline-block mr-15">
                                            <div class="product-rating"
                                                style="width: {{ $product->rates['rate_percentage'] }}%"></div>
                                        </div>
                                        <h6>{{ $product->rates['rate'] }} {{ __('web.out_of') }} 5</h6>
                                    </div>
                                    @foreach ($product->rates['rating'] as $key => $rate)
                                        <div class="progress"><span>{{ $key }} <img
                                                    src="{{ url('') }}/public/assets/web/ASSETS/imgs/template/icons/star.svg"
                                                    alt="star"></span>
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $rate['percentage'] }}%"
                                                aria-valuenow="{{ $rate['percentage'] }}" aria-valuemin="0"
                                                aria-valuemax="100">{{ $rate['percentage'] }}%</div>
                                        </div>
                                    @endforeach
                                    <!-- <a class="font-xs text-muted" href="#">How are ratings calculated?</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (count($releated_products) > 0)
                        <div class="border-bottom pt-30 mb-20"></div>
                        <h4 class="color-brand-3">{{ __('web.related_products') }}</h4>
                        <div class="list-products-5 mt-20">
                            @foreach ($releated_products as $row)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-2" id="component_product">
                                    @include('web.component.product.productCobon', ['product' => $row])
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (count($random_products) > 0)
                        <div class="border-bottom pt-20 mb-40"></div>
                        <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
                        <div class="list-products-5 mt-20">
                            @foreach ($random_products as $row)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-2" id="component_product">
                                    @include('web.component.product.productCobon', ['product' => $row])
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (count($view_products) > 0)
                        <div class="border-bottom pt-20 mb-40"></div>
                        <h4 class="color-brand-3">{{ __('web.recently_viewed_items') }}</h4>
                        <div class="row mt-40">
                            @foreach ($view_products as $row)
                                @include('web.component.product.viewComponent', ['product' => $row])
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>




@endsection
