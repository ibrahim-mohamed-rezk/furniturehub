@extends('web.layouts.container')


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
                        <img src="{{asset('storage/assets/cartIconOrange.png')}}" />
                    </div>
                    <div class="title orange-color">CART ITEMS</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/deliveryIcon.png')}}" />
                    </div>
                    <div class="title">DELIVERY</div>
                </div>
                <div class="line"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/paymentIcon.png')}}" />
                    </div>
                    <div class="title">PAYMENT</div>
                </div>
                <div class="line"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/receptIcon.png')}}" />
                    </div>
                    <div class="title">RECEIPT</div>
                </div>
            </div>

            <div class="cartItems">
                <div class="items">
                    <div class="item">
                        <div class="leftButtons">
                            <div class="upBTNs">
                                <i class="fas fa-trash-alt"></i>
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="input-quantity">
                                <span class="minus-cart"><i class="fas fa-minus"></i></span>
                                <input class="font-xl color-brand-3 box-input" disabled>
                                <span class="plus-cart"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="itemInfo">
                            <div class="info">
                                <h4>طقم ترابيزات جانبية متداخلة</h4>
                                <span class="cat">منتجات ستانلس </span>
                                <span class="price">EGP 15,000</span>
                            </div>
                            <img src="{{asset('storage/assets/product.png')}}" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="leftButtons">
                            <div class="upBTNs">
                                <i class="fas fa-trash-alt"></i>
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="input-quantity">
                                <span class="minus-cart"><i class="fas fa-minus"></i></span>
                                <input class="font-xl color-brand-3 box-input" disabled>
                                <span class="plus-cart"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="itemInfo">
                            <div class="info">
                                <h4>طقم ترابيزات جانبية متداخلة</h4>
                                <span class="cat">منتجات ستانلس </span>
                                <span class="price">EGP 15,000</span>
                            </div>
                            <img src="{{asset('storage/assets/product.png')}}" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="leftButtons">
                            <div class="upBTNs">
                                <i class="fas fa-trash-alt"></i>
                                <i class="far fa-heart"></i>
                            </div>
                            
                            <div class="input-quantity">
                                <span class="minus-cart"><i class="fas fa-minus"></i></span>
                                <input class="font-xl color-brand-3 box-input" disabled>
                                <span class="plus-cart"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="itemInfo">
                            <div class="info">
                                <h4>طقم ترابيزات جانبية متداخلة</h4>
                                <span class="cat">منتجات ستانلس </span>
                                <span class="price">EGP 15,000</span>
                            </div>
                            <img src="{{asset('storage/assets/product.png')}}" />
                        </div>
                    </div>
                </div>
                <div class="checkout">
                    <div class="save-on">
                        <h4>Save on your order</h4>
                        <div class="save-on-input">
                            <div class="input-section">
                                <img src="{{asset('storage/assets/discount.png')}}" />
                                <input type="text" placeholder="Enter voucher code">
                            </div>
                            <button>Submit</button>
                        </div>
                    </div>
                    <label>ملخص الطلب</label>
                    <div class="orderSummary">
                        <div class="checkoutContent">
                            <div class="checkoutItem">
                                <span>EGP 60.00</span>
                                <span>المجموع الفرعي</span>
                            </div>
                            <div class="line"></div>
                            <div class="checkoutItem">
                                <span>EGP 5.99</span>
                                <span class="taxis">القيمه الضريبيه </span>
                            </div>
                            <div class="line"></div>
                            <div class="total">
                                <div>
                                    <span>EGP 65.99</span>
                                    <span>المجموع</span>
                                </div>
                                <div>
                                    <span>السعر لا يشمل التوصيل</span>
                                    <i class="fa fa-exclamation-triangle custom-warning-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="checkoutButtons">
                            <div class="left">
                                <span class="custom-arrow-icon">&#60;</span>
                                <span>Shop More</span>
                            </div>
                            <button>
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 19.5C8.20333 19.5 7.91332 19.588 7.66664 19.7528C7.41997 19.9176 7.22771 20.1519 7.11418 20.426C7.00065 20.7001 6.97094 21.0017 7.02882 21.2926C7.0867 21.5836 7.22956 21.8509 7.43934 22.0607C7.64912 22.2704 7.91639 22.4133 8.20736 22.4712C8.49834 22.5291 8.79994 22.4993 9.07403 22.3858C9.34811 22.2723 9.58238 22.08 9.7472 21.8334C9.91203 21.5867 10 21.2967 10 21C10 20.6022 9.84196 20.2206 9.56066 19.9393C9.27936 19.658 8.89782 19.5 8.5 19.5ZM19 16.5H7C6.73478 16.5 6.48043 16.3946 6.29289 16.2071C6.10536 16.0196 6 15.7652 6 15.5C6 15.2348 6.10536 14.9804 6.29289 14.7929C6.48043 14.6054 6.73478 14.5 7 14.5H15.4912C16.1426 14.4979 16.7758 14.2847 17.2959 13.8925C17.816 13.5002 18.195 12.95 18.376 12.3242L19.9614 6.7749C20.004 6.62607 20.0114 6.4694 19.9831 6.31722C19.9548 6.16505 19.8915 6.02152 19.7983 5.89793C19.7051 5.77435 19.5845 5.67408 19.446 5.60503C19.3075 5.53598 19.1548 5.50003 19 5.5H6.73907C6.53206 4.91736 6.15044 4.41271 5.64622 4.05481C5.14201 3.69692 4.53971 3.50318 3.92139 3.5H3C2.73478 3.5 2.48043 3.60536 2.29289 3.79289C2.10536 3.98043 2 4.23478 2 4.5C2 4.76522 2.10536 5.01957 2.29289 5.20711C2.48043 5.39464 2.73478 5.5 3 5.5H3.92139C4.13847 5.50076 4.34947 5.57182 4.52279 5.70253C4.6961 5.83325 4.82242 6.01659 4.88281 6.2251L5.03833 6.76984L5.03857 6.7749L6.6792 12.5171C5.91576 12.5992 5.21287 12.9709 4.71527 13.5557C4.21766 14.1405 3.96321 14.8938 4.00433 15.6606C4.04544 16.4273 4.37898 17.1491 4.93626 17.6773C5.49355 18.2055 6.23216 18.5 7 18.5H19C19.2652 18.5 19.5196 18.3946 19.7071 18.2071C19.8946 18.0196 20 17.7652 20 17.5C20 17.2348 19.8946 16.9804 19.7071 16.7929C19.5196 16.6054 19.2652 16.5 19 16.5ZM17.6743 7.5L16.4531 11.7744C16.3928 11.9831 16.2664 12.1666 16.093 12.2974C15.9196 12.4282 15.7084 12.4993 15.4912 12.5H8.75439L8.49945 11.6078L7.32642 7.5H17.6743ZM16.5 19.5C16.2033 19.5 15.9133 19.588 15.6666 19.7528C15.42 19.9176 15.2277 20.1519 15.1142 20.426C15.0006 20.7001 14.9709 21.0017 15.0288 21.2926C15.0867 21.5836 15.2296 21.8509 15.4393 22.0607C15.6491 22.2704 15.9164 22.4133 16.2074 22.4712C16.4983 22.5291 16.7999 22.4993 17.074 22.3858C17.3481 22.2723 17.5824 22.08 17.7472 21.8334C17.912 21.5867 18 21.2967 18 21C18 20.6022 17.842 20.2206 17.5607 19.9393C17.2794 19.658 16.8978 19.5 16.5 19.5Z" fill="white"/>
                                    </svg>
                                    
                                <span>Proceed to delivery</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>




            {{-- <div class="row">
                <div class="col-lg-9">
                    <div class="box-carts">
                        <div class="head-wishlist">
                            <div class="item-wishlist">
                                <div class="wishlist-cb">
                                    <input class="cb-layout cb-all" type="checkbox">
                                </div>
                                <div class="wishlist-product"><span
                                        class="font-md-bold color-brand-3">{{ __('web.product') }}</span></div>
                                <div class="wishlist-price"><span
                                        class="font-md-bold color-brand-3">{{ __('web.unit_price') }}</span></div>
                                <div class="wishlist-status"><span
                                        class="font-md-bold color-brand-3">{{ __('web.quantity') }}</span></div>
                                <div class="wishlist-action"><span
                                        class="font-md-bold color-brand-3">{{ __('web.subtotal') }}</span></div>
                                <div class="wishlist-remove"><span
                                        class="font-md-bold color-brand-3">{{ __('web.remove') }}</span></div>
                            </div>
                        </div>
                        <div class="content-wishlist mb-20">
                            @foreach ($carts as $row)
                                @include('web.component.cart.CartComponent', ['cart' => $row])
                            @endforeach
                        </div>
                        <div class="row mb-40">
                            <div class="col-lg-6 col-md-6 col-sm-6-col-6">
                                <a class="btn btn-buy w-auto arrow-back mb-10"
                                    href="{{ route('web.shop') }}">{{ __('web.continue_shopping') }}</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6-col-6 text-md-end"><a
                                    class="btn btn-buy w-auto update-cart mb-10"
                                    href="{{ route('cart.index') }}">{{ __('web.update_cart') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="summary-cart">
                        <div class="border-bottom mb-10">
                            <div class="row">
                                <div class="col-6"><span
                                        class="font-md-bold color-gray-500">{{ __('web.subtotal') }}</span></div>
                                <div class="col-6 text-end">
                                    <h4 id="total_cart"> {{ $total_cart }} {{ $currency->symbol }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-10">
                            <div class="row">
                                <div class="col-6"><span
                                        class="font-md-bold color-gray-500">{{ __('web.shipping') }}</span></div>
                                <div class="col-6 text-end">
                                    <h4 id="shipping"> {{ $shipping_cost }} {{ $currency->symbol }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="mb-10">
                            <div class="row">
                                <div class="col-6"><span class="font-md-bold color-gray-500">{{ __('web.total') }}</span>
                                </div>
                                <div class="col-6 text-end">
                                    <h4 id="total"> {{ $total_cart + $shipping_cost }} {{ $currency->symbol }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="box-button"><a class="btn btn-buy"
                                href="{{ route('order.index') }}">{{ __('web.proceed_to_checkOut') }}</a>
                        </div>
                    </div>
                    <sympl-widget productprice="{{ $total_cart }}" storecode="STR-343" isCart="true"></sympl-widget>
                </div>
            </div> --}}
            <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
            <div class="list-products-5 mt-20 mb-40">
                @foreach ($suggest_products as $row)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-2" id="component_product">
                        @include('web.component.product.productCobon', ['product' => $row])
                    </div>
                @endforeach
            </div>
            <h4 class="color-brand-3">{{ __('web.recently_viewed_items') }}</h4>
            <div class="row mt-40">
                @foreach ($views_products as $row)
                    @include('web.component.product.viewComponent', ['product' => $row])
                @endforeach
            </div>
        </div>
    </section>




@section('container_js')
    <script>
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
                    $(elem).closest('.item-wishlist').fadeOut(1000)
                    viewCart()
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
        }

        // function updateSummary() {
        //     // Make an AJAX request to get the updated cart information
        //     $.ajax({
        //         url: "{{ route('web.index') }}", // Adjust the route as per your application
        //         type: 'GET',
        //         dataType: 'json',
        //         success: function(data) {
        //             // Ensure that the expected properties are present in the received data
        //             if (data && data.data && data.data.total_cart !== undefined && data.data.currency !==
        //                 undefined) {
        //                 // Update the summary elements with the new data
        //                 $('.summary-cart .subtotal h4').text(data.data.total_cart + ' ' + data.data.currency
        //                     .symbol);
        //                 // Additional updates for shipping and total, if needed
        //             } else {
        //                 console.error('Invalid data structure received:', data);
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error updating summary:', error);
        //             toasterError('Error updating summary. Please check the console for details.');
        //         }
        //     });
        // }
    </script>
    <script>
        var csrf = '{{ csrf_token() }}'
        $(".minus-cart").on("click", function() {
            var _parent = $(this).parents(".input-quantity");
            var _currentInput = _parent.find("input");
            var _number = parseInt(_currentInput.val());
            // if (_number > 1) {
            //     _number = _number - 1;
            // }
            let cart_id = _currentInput.attr('data-id');
            var edit_cart_action = "{{ route('cart.update', ':cart_id') }}";
            edit_cart_action = edit_cart_action.replace(':cart_id', cart_id);

            $.ajax({
                url: edit_cart_action,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'count=' + _number,
                success: function(data) {
                    console.log('Data received:', data);

                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    // updateSummary();
                    viewCart();
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })

            _currentInput.val(_number);
        });
        $(".plus-cart").on("click", function() {
            var _parent = $(this).parents(".input-quantity");
            var _currentInput = _parent.find("input");
            var _number = parseInt(_currentInput.val());
            // if (_number >= 0) {
            //     _number = _number + 1;
            // }

            let cart_id = _currentInput.attr('data-id');
            var edit_cart_action = "{{ route('cart.update', ':cart_id') }}";
            edit_cart_action = edit_cart_action.replace(':cart_id', cart_id);

            $.ajax({
                url: edit_cart_action,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: 'count=' + _number,
                success: function(data) {
                    console.log('Data received:', data);
                    if (data.message != '') {
                        toasterSuccess(data.message);
                    }
                    // updateSummary();
                    viewCart();
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
            _currentInput.val(_number);
        });
    </script>
@endsection
@endsection
