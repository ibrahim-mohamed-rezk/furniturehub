@extends('web.layouts.container')


@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="index.html">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-grid.html">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-cart.html">{{ __('web.cart') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="box-carts">
                        <div class="head-wishlist">
                            <div class="item-wishlist">
                                <div class="wishlist-cb">
                                    <input class="cb-layout cb-all" type="checkbox">
                                </div>
                                <div class="wishlist-product"><span class="font-md-bold color-brand-3">{{ __('web.product') }}</span></div>
                                <div class="wishlist-price"><span class="font-md-bold color-brand-3">{{ __('web.unit_price') }}</span></div>
                                <div class="wishlist-status"><span class="font-md-bold color-brand-3">{{ __('web.quantity') }}</span></div>
                                <div class="wishlist-action"><span class="font-md-bold color-brand-3">{{ __('web.subtotal') }}</span></div>
                                <div class="wishlist-remove"><span class="font-md-bold color-brand-3">{{ __('web.remove') }}</span></div>
                            </div>
                        </div>
                        <div class="content-wishlist mb-20">
                            <div class="item-wishlist">
                                <div class="wishlist-cb">
                                    <input class="cb-layout cb-select" type="checkbox">
                                </div>
                                <div class="wishlist-product">
                                    <div class="product-wishlist">
                                        <div class="product-image"><a href="shop-single-product.html"><img
                                                    src="/assets/web/assets/imgs/page/product/img-sub.png" alt="Furniture Hub"></a></div>
                                        <div class="product-info"><a href="shop-single-product.html">
                                                <h6 class="color-brand-3">Dell Optiplex 9020 Small Form Business Desktop
                                                    Tower PC</h6>
                                            </a>
                                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-price">
                                    <h4 class="color-brand-3">$2.51</h4>
                                </div>
                                <div class="wishlist-status">
                                    <div class="box-quantity">
                                        <div class="input-quantity">
                                            <input class="font-xl color-brand-3" type="text" value="1"><span
                                                class="minus-cart"></span><span class="plus-cart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-action">
                                    <h4 class="color-brand-3">$2.51</h4>
                                </div>
                                <div class="wishlist-remove"><a class="btn btn-delete" href="#"></a></div>
                            </div>
                            <div class="item-wishlist">
                                <div class="wishlist-cb">
                                    <input class="cb-layout cb-select" type="checkbox">
                                </div>
                                <div class="wishlist-product">
                                    <div class="product-wishlist">
                                        <div class="product-image"><a href="shop-single-product.html"><img
                                                    src="/assets/web/assets/imgs/page/product/img-sub2.png" alt="Furniture Hub"></a></div>
                                        <div class="product-info"><a href="shop-single-product.html">
                                                <h6 class="color-brand-3">HP 24 All-in-One PC, Intel Core i3-1115G4, 4GB RAM
                                                </h6>
                                            </a>
                                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-price">
                                    <h4 class="color-brand-3">$1.51</h4>
                                </div>
                                <div class="wishlist-status">
                                    <div class="box-quantity">
                                        <div class="input-quantity">
                                            <input class="font-xl color-brand-3" type="text" value="1"><span
                                                class="minus-cart"></span><span class="plus-cart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-action">
                                    <h4 class="color-brand-3">$1.51</h4>
                                </div>
                                <div class="wishlist-remove"><a class="btn btn-delete" href="#"></a></div>
                            </div>
                            <div class="item-wishlist">
                                <div class="wishlist-cb">
                                    <input class="cb-layout cb-select" type="checkbox">
                                </div>
                                <div class="wishlist-product">
                                    <div class="product-wishlist">
                                        <div class="product-image"><a href="shop-single-product.html"><img
                                                    src="/assets/web/assets/imgs/page/product/img-sub3.png" alt="Furniture Hub"></a></div>
                                        <div class="product-info"><a href="shop-single-product.html">
                                                <h6 class="color-brand-3">Gateway 23.8&quot; All-in-one Desktop, Fully
                                                    Adjustable Stand</h6>
                                            </a>
                                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Furniture Hub"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-price">
                                    <h4 class="color-brand-3">$3.51</h4>
                                </div>
                                <div class="wishlist-status">
                                    <div class="box-quantity">
                                        <div class="input-quantity">
                                            <input class="font-xl color-brand-3" type="text" value="1"><span
                                                class="minus-cart"></span><span class="plus-cart"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-action">
                                    <h4 class="color-brand-3">$3.51</h4>
                                </div>
                                <div class="wishlist-remove"><a class="btn btn-delete" href="#"></a></div>
                            </div>
                        </div>
                        <div class="row mb-40">
                            <div class="col-lg-6 col-md-6 col-sm-6-col-6"><a class="btn btn-buy w-auto arrow-back mb-10"
                                    href="shop-grid.html">{{ __('web.continue_shopping') }}</a></div>
                            <div class="col-lg-6 col-md-6 col-sm-6-col-6 text-md-end"><a
                                    class="btn btn-buy w-auto update-cart mb-10" href="shop-cart.html">{{ __('web.update_cart') }}</a>
                            </div>
                        </div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-6">
                                <div class="box-cart-left">
                                    <h5 class="font-md-bold mb-10">{{ __('web.calculate_shipping') }}</h5><span
                                        class="font-sm-bold mb-5 d-inline-block color-gray-500">{{ __('web.flat_rate') }}</span><span
                                        class="font-sm-bold d-inline-block color-brand-3">5%</span>
                                    <div class="form-group">
                                        <select class="form-control select-style1 color-gray-700">
                                            <option value="1">USA</option>
                                            <option value="1">EURO</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-10">
                                            <input class="form-control" placeholder="{{ __('web.stage_country') }}">
                                        </div>
                                        <div class="col-lg-6 mb-10">
                                            <input class="form-control" placeholder="{{ __('web.postCode_ZIP') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="box-cart-right p-20">
                                    <h5 class="font-md-bold mb-10">{{ __('web.apply_coupon') }}</h5><span
                                        class="font-sm-bold mb-5 d-inline-block color-gray-500">{{ __('web.using_a_promo_code') }}</span>
                                    <div class="form-group d-flex">
                                        <input class="form-control mr-15" placeholder="{{ __('web.enter_your_coupon') }}">
                                        <button class="btn btn-buy w-auto">{{ __('web.apply') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="summary-cart">
                        <div class="border-bottom mb-10">
                            <div class="row">
                                <div class="col-6"><span class="font-md-bold color-gray-500">{{ __('web.subtotal') }}</span></div>
                                <div class="col-6 text-end">
                                    <h4> $2.51</h4>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-10">
                            <div class="row">
                                <div class="col-6"><span class="font-md-bold color-gray-500">{{ __('web.shipping') }}</span></div>
                                <div class="col-6 text-end">
                                    <h4> {{ __('web.free') }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-10">
                            <div class="row">
                                <div class="col-6"><span class="font-md-bold color-gray-500">{{ __('web.estimate_for') }}</span></div>
                                <div class="col-6 text-end">
                                    <h6>United Kingdom</h6>
                                </div>
                            </div>
                        </div>
                        <div class="mb-10">
                            <div class="row">
                                <div class="col-6"><span class="font-md-bold color-gray-500">{{ __('web.total') }}</span></div>
                                <div class="col-6 text-end">
                                    <h4> $2.51</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box-button"><a class="btn btn-buy" href="shop-checkout.html">{{ __('web.proceed_to_checkOut') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
            <div class="list-products-5 mt-20 mb-40">
                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10"
                                href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a
                                class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html"
                                aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view"
                                href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                href="shop-single-product.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp3.png"
                                    alt="Furniture Hub"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Hisense</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product.html">Hisense 43&quot; Class 4K UHD LED XClass Smart TV HDR</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500">(65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a>
                            </div>
                            <ul class="list-features">
                                <li>27-inch (diagonal) Retina 5K display</li>
                                <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                                <li>AMD Radeon Pro 5300 graphics</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10"
                                href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a
                                class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html"
                                aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view"
                                href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                href="shop-single-product.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp4.png"
                                    alt="Furniture Hub"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product.html">2022 Apple 10.9-inch iPad Air Wi-Fi 64GB - Silver</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500">(65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a>
                            </div>
                            <ul class="list-features">
                                <li>27-inch (diagonal) Retina 5K display</li>
                                <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                                <li>AMD Radeon Pro 5300 graphics</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10"
                                href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a
                                class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html"
                                aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view"
                                href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                href="shop-single-product.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp5.png"
                                    alt="Furniture Hub"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">LG</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product.html">LG 65&quot; Class 4K UHD Smart TV OLED A1 Series </a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500">(65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a>
                            </div>
                            <ul class="list-features">
                                <li>27-inch (diagonal) Retina 5K display</li>
                                <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                                <li>AMD Radeon Pro 5300 graphics</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10"
                                href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a
                                class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html"
                                aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view"
                                href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                href="shop-single-product.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp6.png"
                                    alt="Furniture Hub"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product.html">Apple AirPods Pro with MagSafe Charging Case</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500">(65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a>
                            </div>
                            <ul class="list-features">
                                <li>27-inch (diagonal) Retina 5K display</li>
                                <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                                <li>AMD Radeon Pro 5300 graphics</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10"
                                href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a
                                class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html"
                                aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view"
                                href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                href="shop-single-product.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp7.png"
                                    alt="Furniture Hub"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Razer</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product.html">Razer Power Up Gaming Bundle V2 - Cynosa Lite</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500">(65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2856.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                            <div class="mt-20 box-btn-cart"><a class="btn btn-cart" href="shop-cart.html">Add To Cart</a>
                            </div>
                            <ul class="list-features">
                                <li>27-inch (diagonal) Retina 5K display</li>
                                <li>3.1GHz 6-core 10th-generation Intel Core i5</li>
                                <li>AMD Radeon Pro 5300 graphics</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="color-brand-3">{{ __('web.recently_viewed_items') }}</h4>
            <div class="row mt-40">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                        <div class="image-box"><a href="shop-single-product.html"><img
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp1.png" alt="Furniture Hub"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">HP</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">HP DeskJet 2755e
                                Wireless Color All-in-One Printer</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500"> (65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                        <div class="image-box"><a href="shop-single-product.html"><img
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp2.png" alt="Furniture Hub"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">HP</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">Original HP 63XL Black
                                High-yield Ink Cartridge</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500"> (65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                        <div class="image-box"><a href="shop-single-product.html"><img
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp1.png" alt="Furniture Hub"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">Logitech</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">Logitech H390 Wired
                                Headset, Stereo Headphones</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500"> (65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                        <div class="image-box"><a href="shop-single-product.html"><img
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp2.png" alt="Furniture Hub"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">Logitech</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">Logitech MK345 Wireless
                                Combo Full-Sized</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Furniture Hub"><span
                                    class="font-xs color-gray-500"> (65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
