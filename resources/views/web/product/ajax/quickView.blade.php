<div class="col-lg-6">
    <div class="gallery-image">
        <div class="galleries-2">
            <div class="detail-gallery">
                <div class="product-image-slider-2">
                    <figure class="border-radius-10">
                        <img src="{{$product->image_url}}" alt="product image">
                    </figure>
{{--                    @foreach($product->photos as $photo)--}}
{{--                        <figure class="border-radius-10">--}}
{{--                            <img src="{{$photo->image_url}}" alt="product image">--}}
{{--                        </figure>--}}
{{--                    @endforeach--}}
                </div>
            </div>
            <div class="slider-nav-thumbnails-2">
{{--                <div>--}}
{{--                    <div class="item-thumb">--}}
{{--                        <img src="{{$product->image_url}}" alt="product image">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @foreach($product->photos as $photo)--}}
{{--                    <div>--}}
{{--                        <div class="item-thumb">--}}
{{--                            <img src="{{$photo->image_url}}" alt="product image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
    <div class="box-tags">
        <div class="d-inline-block mr-25">
            <span class="font-sm font-medium color-gray-900">Category:</span>
            <a class="link"  href="#">{{$product->category->details->title}}</a>
        </div>
        <div class="d-inline-block">
            <span class="font-sm font-medium color-gray-900">Tags:</span>
            @foreach($product->tags as $key=>$tag) {{$tag->details->name}} @if((count($product->tags) - 1) != $key) , @endif @endforeach
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="product-info">
        <h5 class="mb-15">{{$product->name}}</h5>
        <div class="info-by">
            <div class="rating d-inline-block">
                @if($product->rates['rate'] != 0)
                    <div class="rating mt-5">
                        @include('web.component.rate.rateComponent',['rate'=>$product->rates['rate']])
                        <span class="font-xs color-gray-500">({{$product->rates['count']}})</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="border-bottom pt-10 mb-20"></div>
        <div class="box-product-price">
            <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3>
            <span class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
        </div>
        <div class="product-description mt-10 color-gray-900">
            <ul class="list-dot">
                @foreach($product->items as $key=>$item)
                    <li>{{$item->details->name}}</li>
                @endforeach
            </ul>
        </div>

        <div class="buy-product mt-5">
            <p class="font-sm mb-10">Quantity</p>
            <div class="box-quantity">
                <div class="input-quantity">
                    <input class="font-xl color-brand-3" type="text" value="1"><span
                            class="minus-cart"></span><span class="plus-cart"></span>
                </div>
                <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add to
                        cart</a><a class="btn btn-buy" href="shop-checkout.html">Buy now</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ url('') }}/assets/web/assets/js/vendors/slick.js"></script>
