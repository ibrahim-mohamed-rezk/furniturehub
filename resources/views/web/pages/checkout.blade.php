@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="index.html">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-grid.html">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="shop-cart.html">{{ __('web.checkout') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box-border">
                        <div class="box-payment main-payment">
                            <label class="btn btn-gpay">
                                <input type="radio" name="payment_type" value="cash_on_delivery"
                                    onchange="show_pickup_point(this)" data-target=".cash_on_delivery" checked>
                                <img src="{{ asset('assets/web/assets/imgs/page/checkout/gpay.svg') }}" alt="Google Pay">
                            </label>
                            <label class="btn btn-paypal">
                                <input type="radio" name="payment_type" value="installment"
                                    onchange="show_pickup_point(this)" data-target=".installment">
                                <img src="{{ asset('assets/web/assets/imgs/page/checkout/paypal.svg') }}" alt="PayPal">
                            </label>
                            <label class="btn btn-amazon">
                                <input type="radio" name="payment_type" value="pay_now" onchange="show_pickup_point(this)"
                                    data-target=".pay_now">
                                <img src="{{ asset('assets/web/assets/imgs/page/checkout/amazon.svg') }}" alt="Amazon Pay">
                            </label>
                        </div>

                        <div class="box-payment instament" style="display:none">
                            <label class="btn btn-gpay">
                                <input type="radio" name="payment_type" value="forsa" onchange="show_pickup_point(this)"
                                    data-target=".forsa" checked>
                                <img src="{{ asset('assets/web/assets/imgs/payment/paymob_forsa.png') }}" alt="Google Pay">
                            </label>
                            <label class="btn btn-paypal">
                                <input type="radio" name="payment_type" value="sympl" onchange="show_pickup_point(this)"
                                    data-target=".sympl">
                                <img src="{{ asset('assets/web/assets/imgs/payment/paymob_sympl.png') }}" alt="PayPal">
                            </label>
                            <label class="btn btn-amazon">
                                <input type="radio" name="payment_type" value="aman" onchange="show_pickup_point(this)"
                                    data-target=".aman">
                                <img src="{{ asset('assets/web/assets/imgs/payment/paymob_aman.png') }}" alt="Amazon Pay">
                            </label>
                            <label class="btn btn-amazon">
                                <input type="radio" name="payment_type" value="valu" onchange="show_pickup_point(this)"
                                    data-target=".valu">
                                <img src="{{ asset('assets/web/assets/imgs/payment/paymob_valu.png') }}" alt="Amazon Pay">
                            </label>
                            <label class="btn btn-amazon">
                                <input type="radio" name="payment_type" value="banks" onchange="show_pickup_point(this)"
                                    data-target=".banks">
                                <img src="{{ asset('assets/web/assets/imgs/payment/paymob_installment.png') }}"
                                    alt="Amazon Pay">
                            </label>
                        </div>
                        <div class="box-payment pay" style="display: none">
                            <label class="btn btn-gpay">
                                <input type="radio" name="payment_type" value="vodafone_cash"
                                    onchange="show_pickup_point(this)" data-target=".vodafone_cash" checked>
                                <img src="{{ asset('assets/web/assets/imgs/payment/vod.png') }}" alt="Google Pay">
                            </label>
                            <label class="btn btn-paypal">
                                <input type="radio" name="payment_type" value="card" onchange="show_pickup_point(this)"
                                    data-target=".card">
                                <img src="{{ asset('assets/web/assets/imgs/payment/paymob_cards.png') }}" alt="PayPal">
                            </label>

                        </div>


                        <div class="border-bottom-4 text-center mb-20">
                            <div class="text-or font-md color-gray-500">Or</div>
                        </div>
                        <div class="row">
                            <div class="mt-40">
                                <h4 class="mb-10">Mohamed</h4>

                                <div class="mb-10">
                                    <p class="font-sm color-brand-3 font-medium">{{ __('web.delivery_address') }}
                                    </p>
                                    <span class="font-sm color-gray-500 font-medium">------</span>
                                </div>

                                <div class="mb-10">
                                    <p class="font-sm color-brand-3 font-medium">
                                        {{ __('web.secound_address') }}</p>
                                    <span class="font-sm color-gray-500 font-medium">.....</span>
                                </div>
                                <div class="mb-10">
                                    <p class="font-sm color-brand-3 font-medium">{{ __('web.phone') }}</p><span
                                        class="font-sm color-gray-500 font-medium">+201064451586</span>
                                </div>

                                <div class="mb-10 mt-15">
                                    <a class="btn btn-buy w-auto" href="#">
                                        {{ __('web.edit') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-20">
                        <div class="col-lg-6 col-5 mb-20"><a class="btn font-sm-bold color-brand-1 arrow-back-1"
                                href="shop-cart.html">{{ __('web.return_to_cart') }}</a></div>
                        <div class="col-lg-6 col-7 mb-20 text-end"><a class="btn btn-buy w-auto arrow-next"
                                href="shop-checkout.html">{{ __('web.place_an_order') }}</a></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-border">
                        <h5 class="font-md-bold mb-20">{{ __('web.your_order') }}</h5>
                        <div class="listCheckout">
                            <div class="item-wishlist">
                                <div class="wishlist-product">
                                    <div class="product-wishlist">
                                        <div class="product-image"><a href="shop-single-product.html"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/page/product/img-sub.png"
                                                    alt="Ecom"></a></div>
                                        <div class="product-info"><a href="shop-single-product.html">
                                                <h6 class="color-brand-3">Gateway 23.8&quot; All-in-one Desktop, Fully
                                                    Adjustable Stand</h6>
                                            </a>
                                            <div class="rating"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-status">
                                    <h5 class="color-gray-500">x1</h5>
                                </div>
                                <div class="wishlist-price">
                                    <h4 class="color-brand-3 font-lg-bold">$2.51</h4>
                                </div>
                            </div>
                            <div class="item-wishlist">
                                <div class="wishlist-product">
                                    <div class="product-wishlist">
                                        <div class="product-image"><a href="shop-single-product.html"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/page/product/img-sub2.png"
                                                    alt="Ecom"></a></div>
                                        <div class="product-info"><a href="shop-single-product.html">
                                                <h6 class="color-brand-3">HP 24 All-in-One PC, Intel Core i3-1115G4, 4GB
                                                    RAM</h6>
                                            </a>
                                            <div class="rating"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-status">
                                    <h5 class="color-gray-500">x1</h5>
                                </div>
                                <div class="wishlist-price">
                                    <h4 class="color-brand-3 font-lg-bold">$1.51</h4>
                                </div>
                            </div>
                            <div class="item-wishlist">
                                <div class="wishlist-product">
                                    <div class="product-wishlist">
                                        <div class="product-image"><a href="shop-single-product.html"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/page/product/img-sub3.png"
                                                    alt="Ecom"></a></div>
                                        <div class="product-info"><a href="shop-single-product.html">
                                                <h6 class="color-brand-3">Dell Optiplex 9020 Small Form Business Desktop
                                                    Tower PC</h6>
                                            </a>
                                            <div class="rating"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><img
                                                    src="{{ url('') }}/assets/web/assets/imgs/template/icons/star.svg"
                                                    alt="Ecom"><span class="font-xs color-gray-500"> (65)</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wishlist-status">
                                    <h5 class="color-gray-500">x1</h5>
                                </div>
                                <div class="wishlist-price">
                                    <h4 class="color-brand-3 font-lg-bold">$3.51</h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex mt-15">
                            <input class="form-control mr-15" placeholder="{{ __('web.enter_your_coupon') }}">
                            <button class="btn btn-buy w-auto">{{ __('web.apply') }}</button>
                        </div>
                        <div class="form-group mb-0">
                            <div class="row mb-10">
                                <div class="col-lg-6 col-6"><span
                                        class="font-md-bold color-brand-3">{{ __('web.subtotal') }}</span></div>
                                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">$6.51</span>
                                </div>
                            </div>
                            <div class="border-bottom mb-10 pb-5">
                                <div class="row">
                                    <div class="col-lg-6 col-6"><span
                                            class="font-md-bold color-brand-3">{{ __('web.shipping') }}</span>
                                    </div>
                                    <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-6"><span
                                        class="font-md-bold color-brand-3">{{ __('web.total') }}</span></div>
                                <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">$6.51</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('container_js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const paymentTypeRadios = document.querySelectorAll("input[name='payment_type']");

            paymentTypeRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    const selectedValue = this.value;
                    const mainPaymentDiv = document.querySelector(".main-payment");
                    const installmentDiv = document.querySelector(".instament");
                    const payDiv = document.querySelector(".pay");

                    if (selectedValue === "installment") {
                        mainPaymentDiv.style.display = "none";
                        installmentDiv.style.display = "";
                        payDiv.style.display = "none";
                    } else if (selectedValue === "cash_on_delivery" || selectedValue ===
                        "pay_now") {
                        mainPaymentDiv.style.display = "none";
                        payDiv.style.display = "";
                        installmentDiv.style.display = "none";


                    }
                });
            });
        });
    </script>
@endsection
