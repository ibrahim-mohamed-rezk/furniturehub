@extends('web.layouts.container')

@section('styles')
<link href="{{ url('') }}/assets/web/ASSets/css/cart.css" rel="stylesheet">
@endsection

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ URL::current() }}">{{ __('web.cart') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template">
        <div class="container">

            <div class="order_status">
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('storage/assets/cartIconOrange.png') }}" />
                    </div>
                    <div class="title orange-color">{{ __('web.cart_items') }}</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('storage/assets/deliveryIcon.png') }}" />
                    </div>
                    <div class="title">{{ __('web.the_delivery') }}</div>
                </div>
                <div class="line"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('storage/assets/paymentIcon.png') }}" />
                    </div>
                    <div class="title">{{ __('web.payment') }}</div>
                </div>
                <div class="line"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('storage/assets/receptIcon.png') }}" />
                    </div>
                    <div class="title">{{ __('web.receipt') }}</div>
                </div>
            </div>

            <div class="cartItems">
                <div class="items" id="items">
                    @include('web.cart.ajax.cartsInside', ['carts' => $carts])
                </div>
                <div class="checkout">
 
                    <div class="save-on">
                        <h4>{{ __('web.save_on_your_order') }}</h4>
                        <div class="save-on-input">
                            <div class="input-section">
                                <img src="{{ asset('storage/assets/discount.gif') }}" />
                                <input type="text" onchange="viewCartInside()" id="cobon" name="cobon"
                                    placeholder="{{ __('web.enter_voucher_code') }}">
                            </div>
                            {{-- <button type="button">{{ __('web.apply') }}</button> --}}
                        </div>
                    </div>
                    <label>{{ __('web.order_summary') }}</label>
                    <div class="orderSummary">
                        <div class="checkoutContent" id="checkoutContent">
                            {{-- @include('web.cart.ajax.details') --}}
                        </div>
                        <div class="checkoutButtons">
                            <button class="goToShop" onclick="window.location='{{ route('web.shop') }}'">
                               
                                <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.5 1L1.90428 6.35164C1.64521 6.6577 1.5 7.07021 1.5 7.5C1.5 7.9298 1.64521 8.34231 1.90428 8.64837L6.5 14" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                    <span>{{ __('web.show_more') }}</span>
                               
                            </button>
                            <button button onclick="window.location='{{ route('address.index') }}'"
                                style="cursor: pointer; display: flex; align-items: center;">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.5 19.5C8.20333 19.5 7.91332 19.588 7.66664 19.7528C7.41997 19.9176 7.22771 20.1519 7.11418 20.426C7.00065 20.7001 6.97094 21.0017 7.02882 21.2926C7.0867 21.5836 7.22956 21.8509 7.43934 22.0607C7.64912 22.2704 7.91639 22.4133 8.20736 22.4712C8.49834 22.5291 8.79994 22.4993 9.07403 22.3858C9.34811 22.2723 9.58238 22.08 9.7472 21.8334C9.91203 21.5867 10 21.2967 10 21C10 20.6022 9.84196 20.2206 9.56066 19.9393C9.27936 19.658 8.89782 19.5 8.5 19.5ZM19 16.5H7C6.73478 16.5 6.48043 16.3946 6.29289 16.2071C6.10536 16.0196 6 15.7652 6 15.5C6 15.2348 6.10536 14.9804 6.29289 14.7929C6.48043 14.6054 6.73478 14.5 7 14.5H15.4912C16.1426 14.4979 16.7758 14.2847 17.2959 13.8925C17.816 13.5002 18.195 12.95 18.376 12.3242L19.9614 6.7749C20.004 6.62607 20.0114 6.4694 19.9831 6.31722C19.9548 6.16505 19.8915 6.02152 19.7983 5.89793C19.7051 5.77435 19.5845 5.67408 19.446 5.60503C19.3075 5.53598 19.1548 5.50003 19 5.5H6.73907C6.53206 4.91736 6.15044 4.41271 5.64622 4.05481C5.14201 3.69692 4.53971 3.50318 3.92139 3.5H3C2.73478 3.5 2.48043 3.60536 2.29289 3.79289C2.10536 3.98043 2 4.23478 2 4.5C2 4.76522 2.10536 5.01957 2.29289 5.20711C2.48043 5.39464 2.73478 5.5 3 5.5H3.92139C4.13847 5.50076 4.34947 5.57182 4.52279 5.70253C4.6961 5.83325 4.82242 6.01659 4.88281 6.2251L5.03833 6.76984L5.03857 6.7749L6.6792 12.5171C5.91576 12.5992 5.21287 12.9709 4.71527 13.5557C4.21766 14.1405 3.96321 14.8938 4.00433 15.6606C4.04544 16.4273 4.37898 17.1491 4.93626 17.6773C5.49355 18.2055 6.23216 18.5 7 18.5H19C19.2652 18.5 19.5196 18.3946 19.7071 18.2071C19.8946 18.0196 20 17.7652 20 17.5C20 17.2348 19.8946 16.9804 19.7071 16.7929C19.5196 16.6054 19.2652 16.5 19 16.5ZM17.6743 7.5L16.4531 11.7744C16.3928 11.9831 16.2664 12.1666 16.093 12.2974C15.9196 12.4282 15.7084 12.4993 15.4912 12.5H8.75439L8.49945 11.6078L7.32642 7.5H17.6743ZM16.5 19.5C16.2033 19.5 15.9133 19.588 15.6666 19.7528C15.42 19.9176 15.2277 20.1519 15.1142 20.426C15.0006 20.7001 14.9709 21.0017 15.0288 21.2926C15.0867 21.5836 15.2296 21.8509 15.4393 22.0607C15.6491 22.2704 15.9164 22.4133 16.2074 22.4712C16.4983 22.5291 16.7999 22.4993 17.074 22.3858C17.3481 22.2723 17.5824 22.08 17.7472 21.8334C17.912 21.5867 18 21.2967 18 21C18 20.6022 17.842 20.2206 17.5607 19.9393C17.2794 19.658 16.8978 19.5 16.5 19.5Z"
                                        fill="white" />
                                </svg>

                                <span>{{ __('web.proceed_to_checkOut') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>




    @section('container_js')
        <script>
            setTimeout(
                function() {
                    viewCartInside()
                }, 500);

            function viewCartInside() {
                let cobon = $('#cobon').val();
                let deposit = $('#cobon').val();

                localStorage.setItem('userCobon', cobon);

                $.ajax({
                    url: url_view_cart_inside,
                    type: 'GET',
                    data: 'cobon=' + cobon,
                    dataType: 'json',
                    success: function(data) {
                        $('#checkoutContent').html(data.data);
                        $('#items').html(data.data.products);
                    },
                    error: function(data) {
                        toasterError(Object.values(data.responseJSON.errors)[0]);
                    }
                })
            }

            function getCobonFromCache() {
                return localStorage.getItem('userCobon');
            }

            function deleteCart(elem) {
                event.preventDefault();
                let cart_id = $(elem).attr('data-id');
                let url_delete_cart = "{{ route('cart.destroy', ':cart_id') }}"
                url_delete_cart = url_delete_cart.replace(':cart_id', cart_id);
                $.ajax({
                    url: url_delete_cart,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: '',
                    dataType: 'json',
                    success: function(data) {
                        if (data.message != '') {
                            toasterSuccess(data.message);
                        }
                        $(elem).closest('.item').fadeOut(1000)
                        viewCart()
                        viewCartInside()

                    },
                    error: function(data) {
                        toasterError(Object.values(data.responseJSON.errors)[0]);
                    }
                })
            }

            function toggleFavoriteCart(elem) {
                event.preventDefault();
                let id = $(elem).attr('data-id');
                if (user_auth == null) {
                    window.location.href = login_page
                } else {
                    $.ajax({
                        url: url_toggle_fav,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'product_id=' + id,
                        dataType: 'json',
                        success: function(data) {
                            if (data.message != '') {
                                toasterSuccess(data.message);
                            }
                            let check_fav = $(elem).hasClass("favorited");
                            if (check_fav) {
                                $(elem).removeClass('favorited');
                                $(elem).find('i').removeClass('fas').addClass('far').css('color',
                                ''); // Use empty color to reset
                            } else {
                                $(elem).addClass('favorited');
                                $(elem).find('i').removeClass('far').addClass('fas').css('color',
                                'red'); // Set color to red
                            }
                            viewFavorite();
                        },
                        error: function(data) {
                            toasterError(Object.values(data.responseJSON.errors)[0]);
                        }
                    })
                }
            }
        </script>

    @endsection
@endsection
