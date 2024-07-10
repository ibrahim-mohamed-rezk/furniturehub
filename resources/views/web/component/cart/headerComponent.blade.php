<div class="item-cart mb-20">
    <div class="cart-image">
        <img src="{{$cart->product->image_url}}"    alt="{{$cart->product->details->name}}">
    </div>
    <div class="cart-info">
        <a class="font-sm-bold color-brand-3" href="{{$cart->product->url}}">{{$cart->product->details->name}}</a>
        <p>
            <span class="color-brand-2 font-sm-bold">{{$cart->count}} x {{$cart->product->price['price']}} {{$currency->symbol}}</span>
        </p>
    </div>
</div>