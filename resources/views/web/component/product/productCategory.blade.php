<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <div class="box-slider-product">
        <div class="content-products">
            <div class="box-swiper">
                <div class="swiper-container swiper-group-3-hotdeal">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card-product-small">
                                <div class="card-image">
                                    <a href="{{$product->url}}">
                                        <img src="{{$product->image_url}}" loading="lazy" alt="{{$product->name}}">
                                    </a>
                                </div>
                                <div class="card-info">
                                    @if($product->rates['count'] != 0)
                                        <div class="rating">
                                            @include('web.component.rate.rateComponent',['rate'=>$product->rates['rate']])
                                            <span class="font-xs color-gray-500">({{$product->rates['count']}})</span>
                                        </div>
                                    @endif
                                    <div class="box-prices">
                                        <strong class="font-lg-bold color-brand-3 price-main">{{$product->price['price']}} {{ __("web.$currency->symbol")  }}</strong>
                                        @if($product->price['discount'] == true)
                                            <span class="color-gray-500 price-line">{{$product->price['price_before']}} {{ __("web.$currency->symbol")  }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-product-small">
                                <div class="card-image">
                                    <a href="#"> <img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/page/homepage9/sp8.png"
                                                alt="Ecom" loading="lazy"></a></div>
                                <div class="card-info">
                                    <div class="rating"><img 
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom">
                                        <span class="font-xs color-gray-500">(65)</span>
                                    </div>
                                    <div class="box-prices">
                                        <div class="price-bold color-brand-3">$2856.3</div>
                                        <div class="price-line text-end color-gray-500">$3256</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-product-small">
                                <div class="card-image"> <a href="#"> <img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/page/homepage9/sp9.png"
                                                alt="Ecom"></a></div>
                                <div class="card-info">
                                    <div class="rating"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom"><img
                                                src="{{ url('') }}/assets/web/ASSETS_En/imgs/template/icons/star.svg"
                                                alt="Ecom">
                                        <span class="font-xs color-gray-500">(65)</span>
                                    </div>
                                    <div class="box-prices">
                                        <div class="price-bold color-brand-3">$2856.3</div>
                                        <div class="price-line text-end color-gray-500">$3256</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>