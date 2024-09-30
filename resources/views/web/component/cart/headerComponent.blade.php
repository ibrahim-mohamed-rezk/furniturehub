<div class="item">
    <div class="leftButtons">
        <div class="upBTNs">
            <a onclick="deleteCart(this)" data-id="{{ $cart->id }}" style="cursor: pointer"><i
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
        @if ($cart && $cart->product && $cart->product->id !== null)
            <div class="input-quantity">
                <a class="minus-cart" onclick="decrease_cart(this)"><i class="fas fa-minus"></i></a>
                <input class="font-xl color-brand-3 box-input" data-id="{{ $cart->id }}" type="text"
                    value="{{ $cart->count }}" disabled>
                <a class="plus-cart" onclick="update_cart(this)"><i class="fas fa-plus"></i></a>
            </div>
        @endif
    </div>
    <div class="itemInfo">
        <div class="info">
            {{-- <h4 >{{ $cart->product->details->name }}</h4> --}}
            <span class="title">{{ $cart->product->details->name ?? __('web.' . $cart->extension->title) }}</span>
            <span class="cat">{{ $cart->product->category->details->title ?? '' }}</span>
            <span class="price">{{ $cart->product->cost_discount ?? $cart->product->cost ?? $cart->extension->value }}
                {{ __('web.L.E') }}</span>
        </div>
        <img src="{{ $cart->product->image_url ?? $cart->extension->image }}"
            alt="{{ $cart->product->details->name ?? $cart->extension->title }}" height="75px"
            style="min-width:112px" />
    </div>
</div>
