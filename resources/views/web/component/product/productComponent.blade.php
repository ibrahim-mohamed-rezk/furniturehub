<div class="card-grid-style-1" id="component_product">
    <div class="card-grid-inner">
        <div class="tools">
            <a class="btn btn-wishlist btn-tooltip mb-10 @if ($product->favorited()) favorited @endif"
                onclick="toggleFavorite(this)" data-id="{{ $product->id }}"
                style="@if ($product->favorited()) background:url({{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/wishlist-hover.svg) @else background:url({{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/wishlist.svg) @endif no-repeat center"
                style="cursor:pointer;" aria-label="Add To Wishlist"></a>
            <a class="btn btn-compare btn-tooltip mb-10" onclick="addCompare(this)" data-id="{{ $product->id }}"
                style="cursor:pointer;" aria-label="Compare"></a>
        </div>

        @if (in_array($product->id, $offer_ids))
            @if (getCurrentLocale() == 'ar')
                <span class="label" style="margin-left:160px"><span class="font-sm color-white ">Flash</span></span>
            @else
                <span class="label"><span class="font-sm color-white ">Flash</span></span>
            @endif
        @endif
        <div class="image-box">
            @if ($product->cost_discount)
                <span class="rounded-full  bg-brand-2 text-white "
                    style="font-size: 12px;width: auto;position: absolute;border-radius: 50px;padding: 2px 5px; ">{{ __('web.save') }}
                    {{ 100 - $product->price['percentage'] }}% </span>
            @endif
            <a href="{{ $product->url }}">
                <img  src="{{ $product->image_url }}" loading="lazy" alt="{{ $product->name }}">
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
                <strong class="font-lg-bold color-brand-3 price-main"
                    style="margin-right:-5px">{{ $product->price['price'] }}
                    {{ __("web.$currency->symbol") }}</strong>
                @if ($product->price['discount'] == true)
                    <span class="color-gray-500 price-line"
                        style="text-decoration: line-through;">{{ $product->price['price_before'] }}
                        {{ __("web.$currency->symbol") }} </span>
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
