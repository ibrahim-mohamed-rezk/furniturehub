
<div class="col-lg-3 col-md-6 col-sm-12">
    <div class="card-grid-style-2 card-grid-none-border hover-up">
        <div class="image-box">
            <a href="{{$product->url}}"><img src="{{$product->image_url}}" loading="lazy" alt="{{$product->name}}" class="downloadable-image" data-filename="{{ $product->image_url }}"> </a>
        </div>
        <div class="info-right">
            <span class="font-xs color-gray-500">{{$product->category->details->title}}</span>
            <br>
            <a lass="color-brand-3 font-xs-bold" href="{{$product->url}}">{{$product->name}}</a>
            @if($product->rates['count'] != 0)
                <div class="rating">
                    @include('web.component.rate.rateComponent',['rate'=>$product->rates['rate']])
                    {{-- <span class="font-xs color-gray-500">({{$product->rates['count']}})</span> --}}
                </div>
            @endif
            <div class="price-info">
                <strong class="font-lg-bold color-brand-3 price-main">{{$product->cost}} {{ __("web.L.E")  }}</strong>
                @if($product->cost_discount)
                    <span class="color-gray-500 price-line">{{$product->cost_discount}} {{ __("web.L.E")  }}</span>
                @endif
        </div>
    </div>
    </div>
</div>