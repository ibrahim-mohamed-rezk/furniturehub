<div class="item-wishlist">
    <div class="wishlist-cb">
        <input class="cb-layout cb-select" type="checkbox">
    </div>
    <div class="wishlist-product">
        <div class="product-wishlist">
            <div class="product-image">
                <a href="{{ $cart->product->url }}">
                    <img src="{{$cart->product->image_url}}" alt="Ecom">
                </a>
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
    <div class="wishlist-price">
        <h4 class="color-brand-3">{{$cart->product->price['price']}} {{$currency->symbol}}</h4>
    </div>
    <div class="wishlist-status">
        <div class="box-quantity">
            <div class="input-quantity">
                <input class="font-xl color-brand-3" onchange="editCart(this)" data-id="{{$cart->id}}" type="text" value="{{$cart->count}}" disabled>
                <span class="minus-cart"></span>
                <span class="plus-cart"></span>
            </div>
        </div>
    </div>
    <div class="wishlist-action">
        <h4 class="color-brand-3">{{$cart->product->price['price'] * $cart->count}} {{$currency->symbol}}</h4>
    </div>
    <div class="wishlist-remove"><a class="btn btn-delete" onclick="deleteCart(this)" data-id="{{$cart->id}}" style="cursor: pointer" ></a></div>
</div>