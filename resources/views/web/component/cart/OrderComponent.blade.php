
<div class="item-wishlist">
    <div class="wishlist-product">
        <div class="product-wishlist">
            <div class="product-image">
                <a href="{{ $cart->product->url }}">
                    <img src="{{$cart->product->image_url}}" alt="{{$cart->product->details->name}}"></a>
            </div>
            <div class="product-info">
                <a href="{{ $cart->product->url }}">
                    <h6 class="color-brand-3">{{$cart->product->details->name}}</h6>
                </a>
                <div class="rating">
                    @include('web.component.rate.rateComponent',['rate'=>$cart->product->rates['rate']])
                </div>
            </div>
        </div>
    </div>
    <div class="wishlist-status">
        <h5 class="color-gray-500">x{{$cart->count}}</h5>
    </div>
    <div class="wishlist-price">
        <h4 class="color-brand-3 font-lg-bold">{{$cart->product->price['price']}} {{$currency->symbol}}</h4>
    </div>
</div>