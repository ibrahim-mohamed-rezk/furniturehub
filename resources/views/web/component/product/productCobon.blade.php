<div class="card-grid-style-1">
    <div class="card-grid-inner">
        {{-- @if (in_array($product->id, $offer_ids))
            @if (getCurrentLocale() == 'ar')
                <span class="label" style="margin-left:230px"><span class="font-sm color-white ">Flash</span></span>
            @else
                <span class="label"><span class="font-sm color-white ">Flash</span></span>
            @endif
        @endif --}}
        <div class="tools">
            <a class="btn btn-wishlist btn-tooltip mb-10 @if ($product->favorited()) favorited @endif"
                onclick="toggleFavorite(this)" data-id="{{ $product->id }}"
                style="@if ($product->favorited()) background:url({{ url('') }}/public/assets/web/ASSETS_En/imgs/template/icons/wishlist-hover.svg) @else background:url({{ url('') }}/public/assets/web/ASSETS_En/imgs/template/icons/wishlist.svg) @endif no-repeat center"
                style="cursor:pointer;" aria-label="Add To Wishlist"></a>
            <a class="btn btn-compare btn-tooltip mb-10" onclick="addCompare(this)" data-id="{{ $product->id }}"
                style="cursor:pointer;" aria-label="Compare"></a>
        </div>
        <div class="image-box">

            @if ($product->cost_discount)
                <span class="rounded-full  text-white "
                    style="font-size: 12px;width: auto;position: absolute;border-radius: 50px;padding: 2px 5px;background-color: #fd9636 " >{{ __('web.save') }}
                    {{ 100 - $product->price['percentage'] }}% </span>
            @elseif (in_array($product->id, $offer_ids  ) )
                <span class="rounded-full  text-white "
                    style="font-size: 12px;width: auto;position: absolute;border-radius: 50px;padding: 2px 5px;background-color: #fd9636 " >{{ __('web.use_cobon_to_save') }} </span>

            @endif
            <a href="{{ $product->url }}">
                <img src="{{ $product->image_url }}" loading="lazy" alt="Ecom" style="max-width: 100%; height: auto;">
            </a>
        </div>
        @if (in_array($product->id, $offer_ids) && isset($cobonProduct))
            @if (request()->route()->getName() == 'web.index')
                <div class="box-count">
                    <div class="deals-countdown" data-countdown="{{ $cobonProduct->end_date }} 00:00:00" style="background-color: #fd9636">
                        <span class="countdown-section">
                            <span class="countdown-amount font-sm-bold lh-16">00</span>
                            <span class="countdown-period lh-14 font-xs"> day </span>
                        </span>
                        <span class="countdown-section">
                            <span class="countdown-amount font-sm-bold lh-16">00</span>
                            <span class="countdown-period font-xs lh-14"> hour </span>
                        </span>
                        <span class="countdown-section">
                            <span class="countdown-amount font-sm-bold lh-16">00</span>
                            <span class="countdown-period font-xs lh-14"> min </span>
                        </span>
                        <span class="countdown-section">
                            <span class="countdown-amount font-sm-bold lh-16">00</span>
                            <span class="countdown-period font-xs lh-14"> sec </span>
                        </span>
                    </div>
                </div>
            @endif
        @endif
  

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
                @if(in_array($product->id, $offer_ids) && $product->price['discount'] == false)
                    @if(isset($cobonProduct))
                        <strong class="font-md-bold color-brand-3 price-main ">{{$product->calculate_cobon($cobonProduct->discount)}}
                            {{ __("web.$currency->symbol") }}</strong>
                    @else
                        <strong class="font-md-bold color-brand-3 price-main ">{{$product->calculate_cobon($cobonCategory->discount)}}
                            {{ __("web.$currency->symbol") }}</strong>
                    @endif

                @else
                    <strong class="font-md-bold color-brand-3 price-main ">{{ $product->price['price'] }}
                        {{ __("web.$currency->symbol") }}</strong>
                @endif
                @if ($product->price['discount'] == true)
                    <span class="color-gray-500 price-line"
                        style="text-decoration: line-through;">{{ $product->price['price_before'] }}
                        {{ __("web.$currency->symbol") }} </span>
                @elseif ((in_array($product->id, $offer_ids)))

                    <span class="color-gray-500 price-line"
                        style="text-decoration: line-through;">{{$product->price['price']}}
                        {{ __("web.$currency->symbol") }} </span>
                        
                @endif
                <span class="color-gray-500">{{ '/'.__('products.'.$product->type) }} </span>

                @if (in_array($product->id, $offer_ids))
                    <ul >
                        <li >{{__('web.use_coupon_and_get_offer') }}</li>
                    </ul>
                @endif


            </div>
            <div class="mt-20 box-btn-cart">
                <a class="btn btn-cart" data-id="{{ $product->id }}" onclick="addCart(this)"
                    style="cursor: pointer">Add To Cart</a>
            </div>
            <ul class="list-features">
                @foreach ($product->items as $row)
                    <li>{{ $row->details->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
