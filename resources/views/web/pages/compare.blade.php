@extends('web.layouts.container')


@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="index.html">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-grid.html">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-compare.html">{{ __('web.compare') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template">
        <div class="container">
            <div class="row mb-80">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="box-compare-products">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><span>{{ __('web.products') }}</span></td>
                                        <td><img src="/assets/web/assets/imgs/page/compare/img1.png" alt="Ecom">
                                            <h6><a class="text-brand-3" href="shop-single-product.html">Dell Optiplex 9020
                                                    Small Form Business Desktop Tower PC</a></h6>
                                        </td>
                                        <td><img src="/assets/web/assets/imgs/page/compare/img2.png" alt="Ecom">
                                            <h6><a class="text-brand-3" href="shop-single-product-2.html">HP 24 All-in-One
                                                    PC, Intel Core i3-1115G4, 4GB RAM</a></h6>
                                        </td>
                                        <td><img src="/assets/web/assets/imgs/page/compare/img3.png" alt="Ecom">
                                            <h6><a class="text-brand-3" href="shop-single-product-3.html">Logitech Brio 4K
                                                    Webcam, Ultra 4K HD Video Calling</a></h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>{{ __('web.reviews') }}</span></td>
                                        <td>
                                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </td>
                                        <td>
                                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </td>
                                        <td>
                                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><span>{{ __('web.product_type') }}</span></td>
                                        <td><span>LED LCDs</span></td>
                                        <td><span>LED LCDs</span></td>
                                        <td><span>LED LCDs</span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><span>{{ __('web.price') }}</span></td>
                                        <td><span class="font-sm-bold color-brand-3">$2786.5</span></td>
                                        <td><span class="font-sm-bold color-brand-3">$2856.0</span></td>
                                        <td><span class="font-sm-bold color-brand-3">$2950.0</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>{{ __('web.stock_status') }}</span></td>
                                        <td><span class="btn btn-gray font-sm-bold">{{ __('web.in_stock') }}</span></td>
                                        <td><span class="btn btn-out-stock font-sm-bold">{{ __('web.out_of_stock') }}</span></td>
                                        <td><span class="btn btn-gray font-sm-bold">{{ __('web.in_stock') }}</span></td>
                                    </tr>
                                    <tr>
                                        <td><span>{{ __('web.buy_now') }}</span></td>
                                        <td><a class="btn btn-buy w-auto" href="shop-cart.html">{{ __('web.add_to_cart') }}</a></td>
                                        <td><a class="btn btn-cart w-auto" href="page-contact.html">{{ __('web.contact_us') }}</a></td>
                                        <td><a class="btn btn-buy w-auto" href="shop-cart.html">{{ __('web.add_to_cart') }}</a></td>
                                    </tr>
                                    <tr>
                                        <td><span>{{ __('web.remove') }}</span></td>
                                        <td><a class="btn btn-delete" href="#"></a></td>
                                        <td><a class="btn btn-delete" href="#"></a></td>
                                        <td><a class="btn btn-delete" href="#"></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="color-brand-3">{{ __('web.recently_viewed_items') }}</h4>
            <div class="row mt-40 mb-40">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card-grid-style-2 card-grid-none-border hover-up">
                        <div class="image-box"><a href="shop-single-product.html"><img
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp1.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">Dell</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">Dell Optiplex 9020 Small
                                Form Business Desktop</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp2.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">HP</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">HP 24 All-in-One PC,
                                Intel Core i3-1115G4, 4GB RAM</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp1.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">Gateway</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">Gateway 23.8&quot;
                                All-in-one Desktop</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                    src="/assets/web/assets/imgs/page/homepage1/imgsp2.png" alt="Ecom"></a>
                        </div>
                        <div class="info-right"><span class="font-xs color-gray-500">HP</span><br><a
                                class="color-brand-3 font-xs-bold" href="shop-single-product.html">HP 22 All-in-One PC,
                                Intel Pentium Silver J5040</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
                                    class="font-xs color-gray-500"> (65)</span></div>
                            <div class="price-info"><strong
                                    class="font-lg-bold color-brand-3 price-main">$2556.3</strong><span
                                    class="color-gray-500 price-line">$3225.6</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
            <div class="list-products-5 mt-20">
                <div class="card-grid-style-3">
                    <div class="card-grid-inner">
                        <div class="tools"><a class="btn btn-trend btn-tooltip mb-10" href="#" aria-label="Trend"
                                data-bs-placement="left"></a><a class="btn btn-wishlist btn-tooltip mb-10"
                                href="shop-wishlist.html" aria-label="Add To Wishlist"></a><a
                                class="btn btn-compare btn-tooltip mb-10" href="shop-compare.html"
                                aria-label="Compare"></a><a class="btn btn-quickview btn-tooltip" aria-label="Quick view"
                                href="#ModalQuickview" data-bs-toggle="modal"></a></div>
                        <div class="image-box"><span class="label bg-brand-2">-17%</span><a
                                href="shop-single-product-2.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp3.png"
                                    alt="Ecom"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">HP</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product-2.html">HP 24mh FHD Monitor - Computer Monitor</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                href="shop-single-product-2.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp4.png"
                                    alt="Ecom"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Logitech</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product-2.html">Logitech H390 Wired Headset, Stereo Headphones</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                href="shop-single-product-2.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp5.png"
                                    alt="Ecom"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Samsung</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product-2.html">Samsung 36&quot; French door 28 cu. ft. Smart Energy</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                href="shop-single-product-2.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp6.png"
                                    alt="Ecom"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Apple</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product-2.html">2022 Apple iMac with Retina 5K Display 8GB RAM</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
                                href="shop-single-product-2.html"><img src="/assets/web/assets/imgs/page/homepage1/imgsp7.png"
                                    alt="Ecom"></a></div>
                        <div class="info-right"><a class="font-xs color-gray-500"
                                href="shop-vendor-single.html">Samsung</a><br><a class="color-brand-3 font-sm-bold"
                                href="shop-single-product-2.html">Samsung 36&quot; French door 28 cu. ft. Smart Energy</a>
                            <div class="rating"><img src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><img
                                    src="/assets/web/assets/imgs/template/icons/star.svg" alt="Ecom"><span
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
        </div>
    </section>


    <div class="modal fade" id="ModalFiltersForm" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content apply-job-form">
                <div class="modal-header">
                    <h5 class="modal-title color-gray-1000 filters-icon">Addvance Fillters</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-30">
                    <div class="row">
                        <div class="col-w-1">
                            <h6 class="color-gray-900 mb-0">Brands</h6>
                            <ul class="list-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox" checked="checked"><span
                                            class="text-small">Apple</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Samsung</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Baseus</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Remax</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Handtown</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Elecom</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Razer</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Auto Focus</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Nillkin</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Logitech</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">ChromeBook</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-w-1">
                            <h6 class="color-gray-900 mb-0">Special offers</h6>
                            <ul class="list-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">On sale</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox" checked="checked"><span class="text-small">FREE
                                            shipping</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Big deals</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Shop Mall</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                            <h6 class="color-gray-900 mb-0 mt-40">Ready to ship in</h6>
                            <ul class="list-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">1 business day</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox" checked="checked"><span class="text-small">1&ndash;3
                                            business days</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">in 1 week</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Shipping now</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="col-w-1">
                            <h6 class="color-gray-900 mb-0">Ordering options</h6>
                            <ul class="list-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Accepts gift cards</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Customizable</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox" checked="checked"><span class="text-small">Can be
                                            gift-wrapped</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Installment 0%</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                            <h6 class="color-gray-900 mb-0 mt-40">Rating</h6>
                            <ul class="list-checkbox">
                                <li class="mb-5"><a href="#"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><span
                                            class="ml-10 font-xs color-gray-500 d-inline-block align-top">(5
                                            stars)</span></a></li>
                                <li class="mb-5"><a href="#"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><span
                                            class="ml-10 font-xs color-gray-500 d-inline-block align-top">(4
                                            stars)</span></a></li>
                                <li class="mb-5"><a href="#"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><span
                                            class="ml-10 font-xs color-gray-500 d-inline-block align-top">(3
                                            stars)</span></a></li>
                                <li class="mb-5"><a href="#"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><span
                                            class="ml-10 font-xs color-gray-500 d-inline-block align-top">(2
                                            stars)</span></a></li>
                                <li class="mb-5"><a href="#"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star-gray.svg"
                                            alt="Ecom"><span
                                            class="ml-10 font-xs color-gray-500 d-inline-block align-top">(1
                                            star)</span></a></li>
                            </ul>
                        </div>
                        <div class="col-w-2">
                            <h6 class="color-gray-900 mb-0">Material</h6>
                            <ul class="list-checkbox">
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Nylon (8)</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Tempered Glass (5)</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox" checked="checked"><span class="text-small">Liquid Silicone
                                            Rubber (5)</span><span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="cb-container">
                                        <input type="checkbox"><span class="text-small">Aluminium Alloy (3)</span><span
                                            class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                            <h6 class="color-gray-900 mb-20 mt-40">Product tags</h6>
                            <div><a class="btn btn-border mr-5" href="#">Games</a><a class="btn btn-border mr-5"
                                    href="#">Electronics</a><a class="btn btn-border mr-5"
                                    href="#">Video</a><a class="btn btn-border mr-5" href="#">Cellphone</a><a
                                    class="btn btn-border mr-5" href="#">Indoor</a><a class="btn btn-border mr-5"
                                    href="#">VGA Card</a><a class="btn btn-border mr-5" href="#">USB</a><a
                                    class="btn btn-border mr-5" href="#">Lightning</a><a
                                    class="btn btn-border mr-5" href="#">Camera</a></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start pl-30"><a class="btn btn-buy w-auto" href="#">Apply
                        Fillter</a><a class="btn font-sm-bold color-gray-500" href="#">Reset Fillter</a></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalQuickview" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content apply-job-form">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-30">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="gallery-image">
                                <div class="galleries-2">
                                    <div class="detail-gallery">
                                        <div class="product-image-slider-2">
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-1.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-2.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-3.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-4.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-5.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-6.jpg" alt="product image">
                                            </figure>
                                            <figure class="border-radius-10"><img
                                                    src="/assets/web/assets/imgs/page/product/img-gallery-7.jpg" alt="product image">
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="slider-nav-thumbnails-2">
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-1.jpg"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-2.jpg"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-3.jpg"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-4.jpg"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-5.jpg"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-6.jpg"
                                                    alt="product image"></div>
                                        </div>
                                        <div>
                                            <div class="item-thumb"><img src="/assets/web/assets/imgs/page/product/img-gallery-7.jpg"
                                                    alt="product image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-tags">
                                <div class="d-inline-block mr-25"><span
                                        class="font-sm font-medium color-gray-900">Category:</span><a class="link"
                                        href="#">Smartphones</a></div>
                                <div class="d-inline-block"><span
                                        class="font-sm font-medium color-gray-900">Tags:</span><a class="link"
                                        href="#">Blue</a>,<a class="link" href="#">Smartphone</a></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-info">
                                <h5 class="mb-15">SAMSUNG Galaxy S22 Ultra, 8K Camera & Video, Brightest Display Screen, S
                                    Pen Pro</h5>
                                <div class="info-by"><span class="bytext color-gray-500 font-xs font-medium">by</span><a
                                        class="byAUthor color-gray-900 font-xs font-medium" href="shop-vendor-list.html">
                                        Ecom Tech</a>
                                    <div class="rating d-inline-block"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><img src="/assets/web/assets/imgs/template/icons/star.svg"
                                            alt="Ecom"><span class="font-xs color-gray-500 font-medium"> (65
                                            reviews)</span></div>
                                </div>
                                <div class="border-bottom pt-10 mb-20"></div>
                                <div class="box-product-price">
                                    <h3 class="color-brand-3 price-main d-inline-block mr-10">$2856.3</h3><span
                                        class="color-gray-500 price-line font-xl line-througt">$3225.6</span>
                                </div>
                                <div class="product-description mt-10 color-gray-900">
                                    <ul class="list-dot">
                                        <li>8k super steady video</li>
                                        <li>Nightography plus portait mode</li>
                                        <li>50mp photo resolution plus bright display</li>
                                        <li>Adaptive color contrast</li>
                                        <li>premium design & craftmanship</li>
                                        <li>Long lasting battery plus fast charging</li>
                                    </ul>
                                </div>
                                <div class="box-product-color mt-10">
                                    <p class="font-sm color-gray-900">Color:<span class="color-brand-2 nameColor">Pink
                                            Gold</span></p>
                                    <ul class="list-colors">
                                        <li class="disabled"><img src="/assets/web/assets/imgs/page/product/img-gallery-1.jpg"
                                                alt="Ecom" title="Pink"></li>
                                        <li><img src="/assets/web/assets/imgs/page/product/img-gallery-2.jpg" alt="Ecom"
                                                title="Gold"></li>
                                        <li><img src="/assets/web/assets/imgs/page/product/img-gallery-3.jpg" alt="Ecom"
                                                title="Pink Gold"></li>
                                        <li><img src="/assets/web/assets/imgs/page/product/img-gallery-4.jpg" alt="Ecom"
                                                title="Silver"></li>
                                        <li class="active"><img src="/assets/web/assets/imgs/page/product/img-gallery-5.jpg"
                                                alt="Ecom" title="Pink Gold"></li>
                                        <li class="disabled"><img src="/assets/web/assets/imgs/page/product/img-gallery-6.jpg"
                                                alt="Ecom" title="Black"></li>
                                        <li class="disabled"><img src="/assets/web/assets/imgs/page/product/img-gallery-7.jpg"
                                                alt="Ecom" title="Red"></li>
                                    </ul>
                                </div>
                                <div class="box-product-style-size mt-10">
                                    <div class="row">
                                        <div class="col-lg-12 mb-10">
                                            <p class="font-sm color-gray-900">Style:<span
                                                    class="color-brand-2 nameStyle">S22</span></p>
                                            <ul class="list-styles">
                                                <li class="disabled" title="S22 Ultra">S22 Ultra</li>
                                                <li class="active" title="S22">S22</li>
                                                <li title="S22 + Standing Cover">S22 + Standing Cover</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 mb-10">
                                            <p class="font-sm color-gray-900">Size:<span
                                                    class="color-brand-2 nameSize">512GB</span></p>
                                            <ul class="list-sizes">
                                                <li class="disabled" title="1GB">1GB</li>
                                                <li class="active" title="512 GB">512 GB</li>
                                                <li title="256 GB">256 GB</li>
                                                <li title="128 GB">128 GB</li>
                                                <li class="disabled" title="64GB">64GB</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-product mt-5">
                                    <p class="font-sm mb-10">Quantity</p>
                                    <div class="box-quantity">
                                        <div class="input-quantity">
                                            <input class="font-xl color-brand-3" type="text" value="1"><span
                                                class="minus-cart"></span><span class="plus-cart"></span>
                                        </div>
                                        <div class="button-buy"><a class="btn btn-cart" href="shop-cart.html">Add to
                                                cart</a><a class="btn btn-buy" href="shop-checkout.html">{{ __('web.buy_now') }}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
