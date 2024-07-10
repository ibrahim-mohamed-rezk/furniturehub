<div class="swiper-slide">
    <div class="card-grid-style-2">
        @if($product->cost_discount)
        <span class="label bg-brand-2">-{{100-$product->price['percentage']}}%</span>
        @endif
        <div class="image-box">
            <a href="{{$product->url}}">
                <img  src="{{$product->image_url}}" loading="lazy" alt="{{$product->name}}">
            </a>
        </div>
        <div class="info-right">
            <a class="color-brand-3 font-sm-bold" href="{{route('web.product_details',$product->id)}}">{{$product->name}}</a>
            @if($product->rates['count'] != 0)
                <div class="rating">
                    @include('web.component.rate.rateComponent',['rate'=>$product->rates['rate']])
                    {{-- <span class="font-xs color-gray-500">({{$product->rates['count']}})</span> --}}
                </div>
            @endif

            <div class="price-info">
                <strong class="font-lg-bold color-brand-3 price-main">{{$product->price['price']}} {{ __("web.$currency->symbol")  }}</strong>
                @if($product->price['discount'] == true)
                    <span class="color-gray-500 price-line">{{$product->price['price_before']}} {{ __("web.$currency->symbol")  }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
