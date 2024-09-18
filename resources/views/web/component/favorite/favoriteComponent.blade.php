<div class="item-wishlist">
    <div class="wishlist-cb">
        <input class="cb-layout cb-select" type="checkbox">
    </div>
    <div class="wishlist-product">
        <div class="product-wishlist">
            <div class="product-image">
                <a href="shop-single-product.html">
                    <img src="{{$favorite->product->image_url}}" loading="lazy" alt="{{$favorite->product->details->name}}">
                </a>
            </div>
            <div class="product-info">
                <a href="shop-single-product.html">
                    <h6 class="color-brand-3">{{$favorite->product->details->name}} </h6>
                </a>
                <div class="rating">
                    @include('web.component.rate.rateComponent',['rate'=>$favorite->product->rates['rate']])
                </div>
            </div>
        </div>
    </div>
    <div class="wishlist-price">
        <h4 class="color-brand-3">{{$favorite->product->cost_discount ?? $favorite->product->cost}}</h4>
    </div>
    <div class="wishlist-status">
        <span class="btn btn-gray font-md-bold color-brand-3"> {{ $favorite->product->stocked }}</span>
    </div>
    <div class="wishlist-action">
        <a class="btn btn-cart font-sm-bold" data-id="{{$favorite->product->id}}" onclick="addCart(this)" style="cursor: pointer">{{ __('web.add_to_cart') }}</a>
    </div>
    <div class="wishlist-remove">
        <a class="btn btn-delete" onclick="deleteFavorite(this)" data-id="{{$favorite->id}}" style="cursor: pointer" ></a>
    </div>
</div>