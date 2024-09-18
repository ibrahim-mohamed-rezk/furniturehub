<div class="swiper-slide">
    <div class="card-product-small">
        <div class="card-image">
            <a href="{{$product->url}}">
                <img src="{{$product->image_url}}" loading="lazy" alt="{{ $product->name }}" class="downloadable-image" data-filename="{{ $product->image_url }}">
            </a>
        </div>
        <div class="card-info">
            <div class="product-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{$product->name}}
            </div>
            @if($product->rates['count'] != 0)
                <div class="rating">
                    @include('web.component.rate.rateComponent',['rate'=>$product->rates['rate']])
                    {{-- <span class="font-xs color-gray-500">({{$product->rates['count']}})</span> --}}
                </div>
            @endif
            <div class="box-prices">
                <div class="price-bold color-brand-3">{{$product->cost}} {{ __("web.L.E")  }}</div>
                @if($product->cost_discount)
                    <div class="price-line text-end color-gray-500">{{$product->cost_discount}} {{ __("web.L.E")  }}</div>
                @endif
            </div>
            <!-- Add product title here -->

        </div>
    </div>
</div>
