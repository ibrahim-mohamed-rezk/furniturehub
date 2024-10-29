<div class="item">
    <div class="leftButtons">
        <div class="upBTNs">
            <a onclick="deleteCart(this)" data-id="{{ $cart->id }}" data-product="{{$cart->product->id ?? $cart->extension->id}}" style="cursor: pointer"><i
                        class="fas fa-trash-alt"></i></a>
            @if ($cart && $cart->product && $cart->product->id !== null)
                <a onclick="toggleFavoriteCart(this)" data-id="{{ $cart->product->id }}" style="cursor: pointer">
                    @if ($cart->product->favorited())
                        <i class="fas fa-heart" style="color: red;"></i>
                    @else
                        <i class="far fa-heart"></i>
                    @endif
                </a>
            @endif

        </div>

        {{-- <div class="downBTNs">
            <i class="fas fa-plus"><span class="plus-cart"></span></i>
            <span><input onchange="editCart(this)" data-id="{{$cart->id}}" type="text" value="{{$cart->count}}" disabled></span>
            <i class="fas fa-minus"><span class="minus-cart"></span></i>
        </div> --}}
        @if ($cart && $cart->product && $cart->product->id !== null)
            <div class="input-quantity">
                <a class="minus-cart" data-id="{{ $cart->id }}" onclick="decrease_cart(this)"><i class="fas fa-minus"></i></a>
                <input class="font-xl color-brand-3 box-input" data-id="{{ $cart->id }}" type="text"
                       value="{{ $cart->count }}" disabled>
                <a class="plus-cart" data-id="{{ $cart->id }}" onclick="update_cart(this)"><i class="fas fa-plus"></i></a>
            </div>
        @endif

    </div>
    <div class="itemInfo">
        <a href="{{ $cart->product->url ?? '#' }}">

            <div class="info">
                <h4>{{ $cart->product->details->name ?? __('web.' . $cart->extension->title) }}</h4>
                <span class="cat">{{ $cart->product->category->details->title ?? '' }} </span>
                <span class="price">{{ $cart->product->cost_discount ??  $cart->product->cost ?? $cart->extension->value }}
                    {{ __('web.L.E') }}</span>
            </div>
        </a>
        <a href="{{ $cart->product->url ?? '#'}}">
            <img src="{{ $cart->product->image_url ?? $cart->extension->image }}" height="135px"
            />
        </a>
    </div>
</div>
