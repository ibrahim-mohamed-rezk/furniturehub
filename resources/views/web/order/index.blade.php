@extends('web.layouts.container')
@section('styles')
    <link href="{{ url('') }}/assets/web/ASSets/css/cart.css" rel="stylesheet">
    <style>
        .visa {
            border: 1px solid transparent;
            cursor: pointer;
        }

        .visa:hover {
            border: 1px solid lightgray;
        }

        .method.active{
            background: #FD96361A !important;
            border: 1px solid var(--main) !important;
        }
    </style>
    <script>
        function setCobonValue() {
            let cobon = localStorage.getItem('userCobon');
            if (cobon) {
                document.querySelector('input[name="cobon"]').value = cobon;
            }
        }
        document.addEventListener('DOMContentLoaded', setCobonValue);
    </script>
@endsection
@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ url()->current() }}">{{ __('web.checkout') }}</a></li>
                </ul>
            </div>
        </div>
    </div>


    {{-- payment section --}}
    <section class="section-box shop-template">
        <div class="container">
            <div class="order_status">
                <div class="order_status_item">
                    <a href="{{ route('cart.index') }}">
                        <div class="icon">
                            <img src="{{ asset('storage/assets/cartIconFilled.png') }}" />
                        </div>
                    </a>
                    <div class="title orange-color">{{ __('web.cart_items') }}</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <a href="{{ route('address.index') }}">
                        <div class="icon">
                            <img src="{{ asset('storage/assets/deliveryIconFiled.png') }}" />
                        </div>
                    </a>
                    <div class="title orange-color">{{ __('web.delivery') }}</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('storage/assets/paymentIconOrange.png') }}" />
                    </div>
                    <div class="title orange-color">{{ __('web.payment') }}</div>
                </div>
                <div class="line"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('storage/assets/receptIcon.png') }}" />
                    </div>
                    <div class="title">{{ __('web.receipt') }}</div>
                </div>
            </div>
            <form action="{{ route('order.store') }}" method="POST" onsubmit="orderPay(this)">
                @CSRF
                <input type="hidden" name="cobon">
                <div class="payments">
                    <h4>{{ __('web.payment') }}</h4>
                    <span>{{ __('web.choose_payment_method_below') }}</span>
                    <div class="payment-methods">
                        <div onclick="openPayMethods()" id="payNow" class="pay-now method">
                            <div class="icons ">
                                <img src="{{ asset('storage/assets/cash.png') }}" />
                                <img src="{{ asset('storage/assets/mastercard.png') }}" />
                                <img src="{{ asset('storage/assets/visa.png') }}" />
                            </div>
                            <div class="method-title">{{ __('web.pay_now') }}</div>
                        </div>
                        <div onclick="openInstallment()" id="installment" class="installment method">
                            <div class="icons">
                                <img src="{{ asset('storage/assets/installment.png') }}" />

                            </div>
                            <div class="method-title">{{ __('web.instalment') }}</div>
                        </div>
                    </div>
                    <div id="pay-methods" class="methods">
                        {{-- <div class="cash">{{ __('web.deposit') }}</div> --}}
                        <div class="visa">
                            <input type="radio" name="status" value="card">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/paymob_cards.png') }}" loading="lazy"
                                alt="PayPal" width="120px" height="70px">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="cardDeposit">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/deposit.png') }}" loading="lazy"
                                alt="PayPal" width="120px" height="70px">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="vodafone_cash">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/vod.png') }}" loading="lazy"
                                alt="PayPal" width="120px" height="70px">
                        </div>
                    </div>
                    <div id="installment-methods" class="methods">
                        <div class="visa">
                            <input type="radio" name="status" value="forsa">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/paymob_forsa.png') }}" loading="lazy"
                                alt="forsa">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="sympl">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/paymob_sympl.png') }}" loading="lazy"
                                alt="sympl">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="aman">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/paymob_aman.png') }}" loading="lazy"
                                alt="aman">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="valu">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/paymob_valu.png') }}" loading="lazy"
                                alt="valu">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="installment_discount">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/paymob_installment.png') }}"
                                loading="lazy" alt="installment discount">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="contact">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/contact.webp') }}"
                                loading="lazy" alt="installment discount">
                        </div>
                        <div class="visa">
                            <input type="radio" name="status" value="khazna">
                            <img src="{{ asset('assets/web/ASSETS_En/imgs/payment/khazna.webp') }}"
                                loading="lazy" alt="installment discount">
                        </div>

                        <div class="visa">
                            <input type="radio" name="status" value="sohulia">
                            <img src="{{ asset('storage/banks/souhola.png') }}" loading="lazy"
                                alt="installment discount">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-buy w-auto">{{ __('web.apply') }}</button>

                {{-- <div class="choosed-method" id="payment">
                    {{ __('web.choose_a_payment_method_to_complete_your_purchase') }}
                </div> --}}
            </form>

        </div>
    </section>
@endsection

@section('container_js')
    <script>
        // let url_calculate_order = "{{ route('order.calculate') }}";
        // setTimeout(
        //     function() {
        //         calculate()
        //     }, 500);

        // function calculate() {
        //     let cobon = $('#cobon').val();
        //     let deposit = $('#cobon').val();
        //     $.ajax({
        //         url: url_calculate_order,
        //         type: 'GET',
        //         data: 'cobon=' + cobon,
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#calculate').html(data.data);
        //         },
        //         error: function(data) {
        //             toasterError(Object.values(data.responseJSON.errors)[0]);
        //         }
        //     })
        // }

        function orderPay(elem) {
            event.preventDefault();
            var action = $(elem).attr('action');
            var method = $(elem).attr('method');
            var dataform = new FormData($(elem)[0]);
            localStorage.removeItem('userCobon');
            $.ajax({
                url: action,
                type: method,
                data: dataform,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    $('#payment').html(data.data);
                    $('.choosed-method').css('border', 'none');
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#payment").offset().top
                    }, 2000);

                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
        }
    </script>
    <script>
        function openPayMethods() {
            document.getElementById("pay-methods").style.display = "flex"
            document.getElementById("installment-methods").style.display = "none"
            document.getElementById("payNow").classList.add("active");
            document.getElementById("installment").classList.remove("active");
        }

        function openInstallment() {
            document.getElementById("installment-methods").style.display = "flex"
            document.getElementById("pay-methods").style.display = "none"
            document.getElementById("payNow").classList.remove("active");
            document.getElementById("installment").classList.add("active");
        }
        document.addEventListener('DOMContentLoaded', function() {
            const visaDivs = document.querySelectorAll('.visa');

            visaDivs.forEach(function(visaDiv) {
                const radioInput = visaDiv.querySelector('input[type="radio"]');
                const visaImage = visaDiv.querySelector('img');

                // Hide the radio input
                radioInput.style.display = 'none';

                // Add a click event listener to the image
                visaImage.addEventListener('click', function() {
                    // Check the radio button
                    radioInput.checked = true;

                    // Reset borders for all visaDivs
                    visaDivs.forEach(function(div) {
                        div.style.border = 'none';
                    });

                    // Apply border style to the clicked div
                    visaDiv.style.border =
                        '2px solid #fd9636';
                });
            });
        });
    </script>
@endsection
