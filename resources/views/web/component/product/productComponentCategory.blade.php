<div class="card-grid-style-1">
    <div class="card-grid-inner">
        {{-- @if (in_array($product->id, $offer_categories_ids))
            @if (getCurrentLocale() == 'ar')
                <span class="label" style="margin-left:230px"><span class="font-sm color-white ">Flash</span></span>
            @else
                <span class="label"><span class="font-sm color-white ">Flash</span></span>
            @endif
        @endif --}}
        <div class="tools">
            <a class="btn btn-wishlist btn-tooltip mb-10 @if ($product->favorited()) favorited @endif"
                onclick="toggleFavorite(this)" data-id="{{ $product->id }}"
                style="@if ($product->favorited()) background:url({{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/wishlist-hover.svg) @else background:url({{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/wishlist.svg) @endif no-repeat center"
                style="cursor:pointer;" aria-label="Add To Wishlist"></a>
            <a class="btn btn-compare btn-tooltip mb-10" onclick="addCompare(this)" data-id="{{ $product->id }}"
                style="cursor:pointer;" aria-label="Compare"></a>
            <a class="btn btn-quickview btn-tooltip mb-10" aria-label="{{ __('web.quick_view') }}"
                href="#{{ $product->sku_code }}" data-bs-toggle="modal"></a>
        </div>
        <div class="image-box">

            @if ($product->cost_discount)
                <span class="rounded-full  text-white "
                    style="font-size: 12px;width: auto;position: absolute;border-radius: 50px;padding: 2px 5px;background-color: #fd9636 ">{{ __('web.save') }}
                    {{ 100 - $product->percentage }}% </span>
            @elseif (in_array($product->id, $offer_categories_ids))
                <span class="rounded-full  text-white "
                    style="font-size: 12px;width: auto;position: absolute;border-radius: 50px;padding: 2px 5px;background-color: #fd9636 ">{{ __('web.use_cobon_to_save') }}
                </span>
            @endif
            <a href="{{ $product->url }}">
                <img src="{{ $product->image_url }}" loading="lazy" alt="Ecom"
                    style="max-width: 100%; height: auto;" class="downloadable-image"
                    data-filename="{{ $product->image_url }}">
            </a>
        </div>


        <div class="info-right">
            <a class="font-xs color-gray-500" href="{{ $product->url }}">{{ $product->category->details->title }}</a>
            <br>
            <a class="color-brand-3 font-sm-bold" href="{{ $product->url }}">{{ $product->name }}</a>
            @if ($product->rates['count'] != 0)
                <div class="rating">
                    @include('web.component.rate.rateComponent', ['rate' => $product->rates['rate']])
                    {{-- <span class="font-xs color-gray-500">({{ $product->rates['count'] }})</span> --}}
                </div>
            @endif
            <div class="price-info">
                @if (in_array($product->id, $offer_ids) && !$product->cost_discount)
                    @if (isset($cobonProduct))
                        <strong
                            class="font-md-bold color-brand-3 price-main ">{{ $product->calculate_cobon($cobonProduct->discount) }}
                            {{ __("web.L.E") }}</strong>
                    @else
                        <strong
                            class="font-md-bold color-brand-3 price-main ">{{ $product->calculate_cobon($cobonCategory->discount) }}
                            {{ __("web.L.E") }}</strong>
                    @endif
                @else
                    <strong class="font-md-bold color-brand-3 price-main ">{{ $product->cost_discount }}
                        {{ __("web.L.E") }}</strong>
                @endif
                @if ($product->cost_discount)
                    <span class="color-gray-500 price-line"
                        style="text-decoration: line-through;">{{ $product->cost }}
                        {{ __("web.L.E") }} </span>
                @elseif (in_array($product->id, $offer_ids))
                    <span class="color-gray-500 price-line"
                        style="text-decoration: line-through;">{{ $product->cost }}
                        {{ __("web.L.E") }} </span>
                @else
                    <strong class="font-md-bold color-brand-3 price-main ">{{ $product->cost }}
                        {{ __("web.L.E") }}</strong>
                @endif
                <span class="color-gray-500">{{ '/' . __('products.' . $product->type) }} </span>

                @if (in_array($product->id, $offer_ids))
                    <ul>
                        <li>{{ __('web.use_coupon_and_get_offer') }}</li>
                    </ul>
                @endif


            </div>

            <div class="mt-20 box-btn-cart">
                <a class="btn btn-cart" data-id="{{ $product->id }}" onclick="addCart(this)"
                    style="cursor: pointer">{{__('web.add_to_cart')}}</a>
            </div>
            <ul class="list-features">
                @foreach ($product->items as $row)
                    <li>{{ $row->details->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="{{ $product->sku_code }}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content apply-job-form">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-30">
                <div class="row">
                    <div class="col-lg-6">


                        <div class="gallery-image">
                            <div class="galleries-2">
                                <div class="detail-gallery">
                                    @if ($product->cost_discount)
                                        <label class="label">{{ __('web.save') }}
                                            {{ 100 - $product->percentage}}%</label>
                                    @endif
                                    @if (in_array($product->id, $offer_ids))
                                        <label class="label">{{ __('web.use_cobon_to_save') }}</label>
                                    @endif
                                    <div class="product-image-slider-2">

                                        <figure class="border-radius-10"><img src="{{ $product->image_url }}"
                                                alt="{{ $product->name }}"></figure>
                                        @foreach ($product->photos as $photo)
                                            <figure class="border-radius-10"><img src="{{ $photo->image_url }}"
                                                    alt="{{ $product->name }}"></figure>
                                        @endforeach


                                    </div>
                                </div>
                                {{-- <div class="slider-nav-thumbnails-2">

                                    <div>
                                        <div class="item-thumb"><img src="{{ $product->image_url }}"
                                                alt="{{ $product->name }}"></div>
                                    </div>
                                    @foreach ($product->photos as $photo)
                                        <div>
                                            <div class="item-thumb"><img src="{{ $photo->image_url }}"
                                                    alt="{{ $product->name }}"></div>
                                        </div>
                                    @endforeach


                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="color-brand-3 mb-10" style="font-size: 1.75em;">{{ $product->name }}</h1>
                        @if ($product->rates['rate'] != 0)
                            <div class="rating mt-5">
                                {{-- <h6>{{ $product->rates['rate'] }} {{ __('web.out_of') }} 5</h6> --}}
                                <span class="font-xs color-gray-500">({{ $product->rates['rate'] }}
                                    {{ __('web.out_of') }}
                                    5)</span>
                                @include('web.component.rate.rateComponent', [
                                    'rate' => $product->rates['rate'],
                                ])
                            </div>
                        @endif

                        @if ($product->cost_discount)
                            @if ($product->cost < 10000)
                                <sympl-widget productprice="{{ $product->cost }}"
                                    storecode="STR-343"></sympl-widget>
                            @endif
                        @else
                            @if ($product->cost < 10000)
                                <sympl-widget productprice="{{ $product->cost }}"
                                    storecode="STR-343"></sympl-widget>
                            @endif
                        @endif
                        <div class="border-bottom pt-20 mb-10"></div>
                        <div class="box-product-price">
                            <h3 class="color-brand-3 price-main d-inline-block mr-10">{{ $product->cost }}
                                {{ __("web.L.E") }}</h3>
                            @if ($product->cost_discount)
                                <span
                                    class="color-gray-500 price-line font-xl line-througt">{{ $product->cost_discount }}
                                    {{ __("web.L.E") }}</span>
                            @endif
                            <span class="color-brand-3 font-xl">{{ '/' . __('products.' . $product->type) }} </span>

                        </div>
                        <div class="progress mb-5" style="height: 5px;">
                            <div class="progress-bar" role="progressbar"
                                style="width: {{ $product->percentage }}%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        @if ($product->cost_discount)
                            <span>{{ __('web.saving') }} :
                                {{ $product->cost_discount - $product->cost }}
                                {{ __("web.L.E") }}</span>
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
                                    <input class="font-xl color-brand-3 count" type="text" value="1"
                                        min="1">
                                    <span class="quantity-control minus-cart"></span>
                                    <span class="quantity-control plus-cart"></span>
                                </div>
                                <div class="button-buy mt-2">
                                    <a class="btn btn-cart" data-id="{{ $product->id }}" onclick="addCart(this)"
                                        style="cursor: pointer"><i class="fa fa-shopping-cart"></i> {{ __('web.cart') }}</a>
                                    {{-- <a class="btn btn-buy" data-id="{{ $product->id }}" onclick="buynow(this)"
                                        style="cursor: pointer"><i class="fas fa-money-check-alt"></i></a> --}}
                                    <a class="btn btn-buy"
                                        href="https://wa.me/201060552252?text={{ url()->current() }}"
                                        style="cursor: pointer;background: #52d160;"
                                        target="_blank"><i class="fab fa-whatsapp"></i> {{ __('web.contact_us') }} </a>
                                </div>
                            </div>
                        </div>

                        <div class="border-bottom pt-30 mb-20"></div><a class="mr-30 "
                            onclick="toggleFavoriteProduct(this)" data-id="{{ $product->id }}"
                            style="cursor:pointer;"><span
                                class="btn btn-wishlist mr-5 opacity-100 transform-none"></span><span
                                class="font-md color-gray-900">{{ __('web.add_to_Wishlist') }}</span></a><a
                            onclick="addCompare(this)" data-id="{{ $product->id }}" style="cursor:pointer;"><span
                                class="btn btn-compare mr-5 opacity-100 transform-none"></span><span
                                class="font-md color-gray-900">{{ __('web.add_to_Compare') }}</span></a>
                        <div class="info-product mt-20 font-md color-gray-900">SKU:
                            {{ $product->sku_code }}<br>{{ __('web.category') }}:
                            {{ $product->category->details->title }}<br>Tags:
                            @foreach ($product->tags as $key => $tag)
                                {{ $tag->details->name }} @if (count($product->tags) - 1 != $key)
                                    ,
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
