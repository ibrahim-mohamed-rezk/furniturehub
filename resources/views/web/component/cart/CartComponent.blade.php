<div class="item-container">
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
    @if($cart->product->extensions->isNotEmpty())
        <div class="additions">
            <div class="additions-head">
                <span>{{__('web.count')}}</span>
                <span>{{__('web.price')}}</span>
                <span>{{__('web.extension')}}</span>
            </div>
            <div class="addition-items">
                <div id="added">
                @foreach($cart->extensions as $row)
                    <div class="addition-item">
                        <div class="addition-info">
                            <div class="addition-buttons">
                                <button data-id="{{$row->pivot->id}}" onclick="updateCartExtension(this)" style="background-color: transparent;">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M11.75 14.25H6.75C6.41848 14.25 6.10054 14.1183 5.86612 13.8839C5.6317 13.6495 5.5 13.3315 5.5 13C5.5 12.6685 5.6317 12.3505 5.86612 12.1161C6.10054 11.8817 6.41848 11.75 6.75 11.75H11.75V14.25ZM19.25 11.75H14.25V14.25H19.25C19.5815 14.25 19.8995 14.1183 20.1339 13.8839C20.3683 13.6495 20.5 13.3315 20.5 13C20.5 12.6685 20.3683 12.3505 20.1339 12.1161C19.8995 11.8817 19.5815 11.75 19.25 11.75Z" fill="#4285F4"/>
                                        <path opacity="0.3" d="M18.2375 0.5H7.7625C3.75153 0.5 0.5 3.75153 0.5 7.7625V18.2375C0.5 22.2485 3.75153 25.5 7.7625 25.5H18.2375C22.2485 25.5 25.5 22.2485 25.5 18.2375V7.7625C25.5 3.75153 22.2485 0.5 18.2375 0.5Z" fill="#4285F4"/>
                                        <path d="M19.25 11.75H14.25V6.75C14.25 6.41848 14.1183 6.10054 13.8839 5.86612C13.6495 5.6317 13.3315 5.5 13 5.5C12.6685 5.5 12.3505 5.6317 12.1161 5.86612C11.8817 6.10054 11.75 6.41848 11.75 6.75V11.75H6.75C6.41848 11.75 6.10054 11.8817 5.86612 12.1161C5.6317 12.3505 5.5 12.6685 5.5 13C5.5 13.3315 5.6317 13.6495 5.86612 13.8839C6.10054 14.1183 6.41848 14.25 6.75 14.25H11.75V19.25C11.75 19.5815 11.8817 19.8995 12.1161 20.1339C12.3505 20.3683 12.6685 20.5 13 20.5C13.3315 20.5 13.6495 20.3683 13.8839 20.1339C14.1183 19.8995 14.25 19.5815 14.25 19.25V14.25H19.25C19.5815 14.25 19.8995 14.1183 20.1339 13.8839C20.3683 13.6495 20.5 13.3315 20.5 13C20.5 12.6685 20.3683 12.3505 20.1339 12.1161C19.8995 11.8817 19.5815 11.75 19.25 11.75Z" fill="#4285F4"/>
                                        </svg>
                                        
                                </button> 
                                <button data-id="{{$row->pivot->id}}" onclick="deleteCartExtension(this)" style="background-color: transparent;">
                                    <svg width="35" height="34" viewBox="0 0 35 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.2401 2.83203H11.8359C9.5816 2.83203 7.41959 3.72756 5.82553 5.32162C4.23147 6.91568 3.33594 9.07769 3.33594 11.332V22.807C3.3731 25.0367 4.28502 27.1625 5.87507 28.7261C7.46512 30.2896 9.60593 31.1657 11.8359 31.1654H23.3109C25.5284 31.1285 27.6437 30.2264 29.2053 28.6515C30.7669 27.0767 31.6511 24.9539 31.6693 22.7362V11.332C31.6693 9.08991 30.7835 6.93857 29.2048 5.34653C27.626 3.75449 25.4821 2.85072 23.2401 2.83203ZM22.6026 23.2745C22.5328 23.7512 22.2882 24.1849 21.9164 24.4912C21.5446 24.7976 21.0722 24.9547 20.5909 24.932H14.5701C14.0818 24.9657 13.5988 24.8136 13.2179 24.5062C12.837 24.1989 12.5862 23.7589 12.5159 23.2745L11.9351 16.0495C11.9368 15.9379 11.9612 15.8278 12.0068 15.7259C12.0524 15.6239 12.1184 15.5324 12.2006 15.4569C12.2828 15.3813 12.3795 15.3233 12.4849 15.2863C12.5903 15.2494 12.702 15.2343 12.8134 15.242H22.1918C22.3032 15.2343 22.415 15.2494 22.5203 15.2863C22.6257 15.3233 22.7224 15.3813 22.8046 15.4569C22.8868 15.5324 22.9528 15.6239 22.9984 15.7259C23.0441 15.8278 23.0684 15.9379 23.0701 16.0495L22.6026 23.2745ZM24.0193 13.6129H23.8634C19.6336 13.027 15.3432 13.027 11.1134 13.6129C10.9757 13.6373 10.8346 13.6343 10.698 13.6041C10.5615 13.5739 10.4323 13.517 10.3178 13.4367C10.2033 13.3564 10.1057 13.2543 10.0308 13.1362C9.95581 13.0182 9.90489 12.8865 9.88094 12.7487C9.85671 12.6108 9.86035 12.4695 9.89163 12.333C9.92291 12.1966 9.98121 12.0678 10.0631 11.9542C10.1449 11.8407 10.2487 11.7447 10.3683 11.6719C10.4879 11.5991 10.6208 11.551 10.7593 11.5304C11.979 11.3347 13.2087 11.207 14.4426 11.1479L14.6693 9.91536C14.7012 9.55036 14.8607 9.20828 15.1198 8.9492C15.3789 8.69012 15.7209 8.53061 16.0859 8.4987H18.9193C19.2843 8.53061 19.6264 8.69012 19.8854 8.9492C20.1445 9.20828 20.304 9.55036 20.3359 9.91536L20.5201 11.0629C21.6959 11.1337 22.9284 11.247 24.1893 11.4312C24.4681 11.4766 24.718 11.6297 24.885 11.8576C25.0519 12.0856 25.1226 12.37 25.0818 12.6495C25.0611 12.9054 24.9473 13.1448 24.7619 13.3224C24.5766 13.4999 24.3325 13.6033 24.0759 13.6129H24.0193Z" fill="#F1416C"/>
                                        </svg>
                                        
                                </button>
                            </div>
                            <div class="addition-count">
                                <span class="addition-count-text">{{$row->pivot->count}}</span>
                            </div>
                            <div class="addition-price">
                                <span class="old-price">{!! $row->value_discount !!} {{ __('web.L.E') }}</span>
                                <span class="newPrice">{!! $row->value !!} {{ __('web.L.E') }}</span>
                            </div>
                            <div class="addition-title">
                                <span class="addition-title-text">{!! __('web.' . $row->title) !!}</span>
                            </div>
                            <div class="addition-img">
                                <img src="{{ $row->image }}">
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                @endforeach
                </div>
                <div id="newest">
                  <button class="newestCollapse" type="button" data-toggle="collapse" data-target="#newestCollapse{{$cart->id}}" aria-expanded="false" aria-controls="newestCollapse{{$cart->id}}">
                    {{__('web.another_extensions')}}
                  </button>
                    <div class="collapse" id="newestCollapse{{$cart->id}}">
                      
                    
                        @foreach($cart->product->extensions as $row)
                            @if(!$cart->extensions->contains('id', $row->id))
                                <div class="addition-item">
                                    <div class="addition-info">
                                        <div class="addition-buttons">
                                            <button extension-id="{{$row->id}}" data-id="{{$cart->id}}" onclick="addCartExtension(this)" style="background-color: transparent;">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M11.75 14.25H6.75C6.41848 14.25 6.10054 14.1183 5.86612 13.8839C5.6317 13.6495 5.5 13.3315 5.5 13C5.5 12.6685 5.6317 12.3505 5.86612 12.1161C6.10054 11.8817 6.41848 11.75 6.75 11.75H11.75V14.25ZM19.25 11.75H14.25V14.25H19.25C19.5815 14.25 19.8995 14.1183 20.1339 13.8839C20.3683 13.6495 20.5 13.3315 20.5 13C20.5 12.6685 20.3683 12.3505 20.1339 12.1161C19.8995 11.8817 19.5815 11.75 19.25 11.75Z" fill="#4285F4"/>
                                                    <path opacity="0.3" d="M18.2375 0.5H7.7625C3.75153 0.5 0.5 3.75153 0.5 7.7625V18.2375C0.5 22.2485 3.75153 25.5 7.7625 25.5H18.2375C22.2485 25.5 25.5 22.2485 25.5 18.2375V7.7625C25.5 3.75153 22.2485 0.5 18.2375 0.5Z" fill="#4285F4"/>
                                                    <path d="M19.25 11.75H14.25V6.75C14.25 6.41848 14.1183 6.10054 13.8839 5.86612C13.6495 5.6317 13.3315 5.5 13 5.5C12.6685 5.5 12.3505 5.6317 12.1161 5.86612C11.8817 6.10054 11.75 6.41848 11.75 6.75V11.75H6.75C6.41848 11.75 6.10054 11.8817 5.86612 12.1161C5.6317 12.3505 5.5 12.6685 5.5 13C5.5 13.3315 5.6317 13.6495 5.86612 13.8839C6.10054 14.1183 6.41848 14.25 6.75 14.25H11.75V19.25C11.75 19.5815 11.8817 19.8995 12.1161 20.1339C12.3505 20.3683 12.6685 20.5 13 20.5C13.3315 20.5 13.6495 20.3683 13.8839 20.1339C14.1183 19.8995 14.25 19.5815 14.25 19.25V14.25H19.25C19.5815 14.25 19.8995 14.1183 20.1339 13.8839C20.3683 13.6495 20.5 13.3315 20.5 13C20.5 12.6685 20.3683 12.3505 20.1339 12.1161C19.8995 11.8817 19.5815 11.75 19.25 11.75Z" fill="#4285F4"/>
                                                    </svg>
                                                    
                                            </button> 
                                            
                                        </div>
                                        <div class="addition-count">
                                            <span class="addition-count-text">0</span>
                                        </div>
                                        <div class="addition-price">
                                            <span class="old-price">{!! $row->value_discount !!} {{ __('web.L.E') }}</span>
                                            <span class="newPrice">{!! $row->value !!} {{ __('web.L.E') }}</span>
                                        </div>
                                        <div class="addition-title">
                                            <span class="addition-title-text">{!! __('web.' . $row->title) !!}</span>
                                        </div>
                                        <div class="addition-img">
                                            <img src="{{ $row->image }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="line"></div>

                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
