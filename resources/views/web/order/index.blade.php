@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{route('web.index')}}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{route('web.shop')}}">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{url()->current()}}">{{ __('web.checkout') }}</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- location section --}}
    {{-- <section class="section-box shop-template">
        <div class="container">
            <div class="order_status">
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/cartIconFilled.png')}}" />
                    </div>
                    <div class="title orange-color">CART ITEMS</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/deliveryIconOrange.png')}}" />
                    </div>
                    <div class="title orange-color">DELIVERY</div>
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
            <div class="changeLocation">
                <div>
                    <div class="locationIcon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="locationDec">
                        <span>Deliver to</span>
                        <p>دمياط فارسكور شارع المركز امام مكتبه الرسله اعلي المكتبه الدور التاني</p>
                    </div>
                </div>
                <button>Change location</button>

            </div>
            <div class="addLocation">
                <div class="section-header" onclick="toggleItems(this)">
                    <i class="arrow fas fa-angle-up"></i>
                    <div class="LocationLine"></div>
                    <span>Add new location</span>
                </div>
                <div id="addLocationForm" class="section-items">
                    <div class="inputsRow">
                        <div class="location-form-group">
                            <label>Full Name <span>*</span></label>
                            <input type="text" class="form-control input-lg" />
                       </div>
                        <div class="location-form-group">
                            <label>Country <span>*</span></label>
                            <input type="text" class="form-control input-lg" />
                       </div>
                        <div class="location-form-group">
                            <label>City <span>*</span></label>
                            <input type="text" class="form-control input-lg" />
                       </div>

                    </div>
                    <div class="inputsRow">
                        <div class="location-form-group">
                            <label>Street name <span>*</span></label>
                            <input type="text" class="form-control input-lg" />
                       </div>
                        <div class="location-form-group">
                            <label>State / Province </label>
                            <input type="text" class="form-control input-lg" />
                       </div>
                    </div>
                    <div class="inputsRow" style="direction: rtl">
                        <div class="location-form-group">
                            <label><span>*</span> secondary Phone number </label>
                            <input type="text" class="form-control input-lg" />
                        </div>
                        <div class="location-form-group">
                            <label><span>*</span> Phone number </label>
                            <input type="text" class="form-control input-lg" />
                        </div>
                        <div class="location-form-group">
                            <label><span>*</span> Zip-code </label>
                            <input type="text" class="form-control input-lg" />
                       </div>
                    </div>
                    <div class="saveLocation inputsRow">
                        <input class="checkBox" type="checkbox">
                        <span>Saved Location</span>
                   </div>
                   <div class="checkoutButtons chckBtns">
                        <div class="left">
                            <span class="custom-arrow-icon">&#60;</span>
                            <span>Shop More</span>
                        </div>
                        <button>
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 2.5H2C1.73478 2.5 1.48043 2.60536 1.29289 2.79289C1.10536 2.98043 1 3.23478 1 3.5V11.5C1 11.7652 1.10536 12.0196 1.29289 12.2071C1.48043 12.3946 1.73478 12.5 2 12.5H5V21.5C5 21.7652 5.10536 22.0196 5.29289 22.2071C5.48043 22.3946 5.73478 22.5 6 22.5H18C18.2652 22.5 18.5196 22.3946 18.7071 22.2071C18.8946 22.0196 19 21.7652 19 21.5V12.5H22C22.2652 12.5 22.5196 12.3946 22.7071 12.2071C22.8946 12.0196 23 11.7652 23 11.5V3.5C23 3.23478 22.8946 2.98043 22.7071 2.79289C22.5196 2.60536 22.2652 2.5 22 2.5ZM7 20.5V18.5C7.53043 18.5 8.03914 18.7107 8.41421 19.0858C8.78929 19.4609 9 19.9696 9 20.5H7ZM17 20.5H15C15 19.9696 15.2107 19.4609 15.5858 19.0858C15.9609 18.7107 16.4696 18.5 17 18.5V20.5ZM17 16.5C15.9391 16.5 14.9217 16.9214 14.1716 17.6716C13.4214 18.4217 13 19.4391 13 20.5H11C11 19.4391 10.5786 18.4217 9.82843 17.6716C9.07828 16.9214 8.06087 16.5 7 16.5V8.5H17V16.5ZM21 10.5H19V7.5C19 7.23478 18.8946 6.98043 18.7071 6.79289C18.5196 6.60536 18.2652 6.5 18 6.5H6C5.73478 6.5 5.48043 6.60536 5.29289 6.79289C5.10536 6.98043 5 7.23478 5 7.5V10.5H3V4.5H21V10.5ZM12 15.5C12.5933 15.5 13.1734 15.3241 13.6667 14.9944C14.1601 14.6648 14.5446 14.1962 14.7716 13.6481C14.9987 13.0999 15.0581 12.4967 14.9424 11.9147C14.8266 11.3328 14.5409 10.7982 14.1213 10.3787C13.7018 9.95912 13.1672 9.6734 12.5853 9.55764C12.0033 9.44189 11.4001 9.5013 10.8519 9.72836C10.3038 9.95542 9.83524 10.3399 9.50559 10.8333C9.17595 11.3266 9 11.9067 9 12.5C9 13.2956 9.31607 14.0587 9.87868 14.6213C10.4413 15.1839 11.2044 15.5 12 15.5ZM12 11.5C12.1978 11.5 12.3911 11.5586 12.5556 11.6685C12.72 11.7784 12.8482 11.9346 12.9239 12.1173C12.9996 12.3 13.0194 12.5011 12.9808 12.6951C12.9422 12.8891 12.847 13.0673 12.7071 13.2071C12.5673 13.347 12.3891 13.4422 12.1951 13.4808C12.0011 13.5194 11.8 13.4996 11.6173 13.4239C11.4346 13.3482 11.2784 13.22 11.1685 13.0556C11.0586 12.8911 11 12.6978 11 12.5C11 12.2348 11.1054 11.9804 11.2929 11.7929C11.4804 11.6054 11.7348 11.5 12 11.5Z" fill="white"/>
                            </svg>
                                
                                
                            <span>Proceed to PAYMENT</span>
                        </button>
                    </div>
                </div>
              </div>
        </div>
    </section> --}}


    {{-- payment section --}}
    {{-- <section class="section-box shop-template">
        <div class="container">
            <div class="order_status">
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/cartIconFilled.png')}}" />
                    </div>
                    <div class="title orange-color">CART ITEMS</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/deliveryIconFiled.png')}}" />
                    </div>
                    <div class="title orange-color">DELIVERY</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/paymentIconOrange.png')}}" />
                    </div>
                    <div class="title orange-color">PAYMENT</div>
                </div>
                <div class="line"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/receptIcon.png')}}" />
                    </div>
                    <div class="title">RECEIPT</div>
                </div>
            </div>

            <div class="payments">
                <h4>payment</h4>
                <span>Choose Payment Method Below</span>
                <div class="payment-methods">
                    <div onclick="openPayMethods()" id="payNow" class="pay-now method">
                        <div class="icons ">
                            <img src="{{asset('storage/assets/cash.png')}}" />
                            <img src="{{asset('storage/assets/mastercard.png')}}" />
                            <img src="{{asset('storage/assets/visa.png')}}" />
                        </div>
                        <div class="method-title">pay now</div>
                    </div>
                    <div onclick="openInstallment()" id="installment" class="installment method">
                        <div class="icons">
                            <img src="{{asset('storage/assets/installment.png')}}" />
                            
                        </div>
                        <div class="method-title">installment</div>
                    </div>
                </div>
                <div  id="pay-methods" class="methods">
                    <div class="cash">Cash</div>
                    <div class="visa">
                        <img src="{{asset('storage/assets/methods.png')}}" />
                    </div>
                </div>              
                <div  id="installment-methods" class="methods">
                    <div class="cash">installment</div>
                    <div class="cash">
                        installment
                    </div>
                </div>              
            </div>
            <div class="choosed-method">
                اختر وسيلة الدفع لاستكمال عملية الشراء
            </div>
           
        </div>
    </section> --}}

    {{-- receipt section --}}
    <section class="section-box shop-template">
        <div class="container">
            <div class="order_status">
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/cartIconFilled.png')}}" />
                    </div>
                    <div class="title orange-color">CART ITEMS</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/deliveryIconFiled.png')}}" />
                    </div>
                    <div class="title orange-color">DELIVERY</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/paymentIconFilled.png')}}" />
                    </div>
                    <div class="title orange-color">PAYMENT</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{asset('storage/assets/receptIconOrange.png')}}" />
                    </div>
                    <div class="title orange-color">RECEIPT</div>
                </div>
            </div>
            <div class="shipping-details">
                <div>
                    <div class="details-section">
                        <span class="details-section-title">SHIPPING INFO</span>
                            <div class="details-section-content">
                                <div>
                                    <div>
                                        <span>Name</span>
                                        <span>John Doe</span>
                                    </div>
                                    <div>
                                        <span>Phone</span>
                                        <span>+122 523 352</span>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <span>City</span> 
                                        <span>San Francisco, California</span>
                                    </div>
                                    <div>
                                        <span>Company name</span>
                                        <span> Mobel Inc</span>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <span>Email</span>
                                        <span>johndoe@company.com</span>
                                    </div>
                                    <div>
                                        <span>Zip</span>
                                        <span>94107</span>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <span>Address</span>
                                        <span>795 Folsom Ave, Suite 600</span>
                                    </div>
                                    <div>
                                        <span>Company phone</span>
                                        <span>+1223336665</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div>
                    <div class="details-section">
                        <span class="details-section-title">ORDER DETAILS</span>
                        <div class="details-section-content">
                            <div>
                                <div>
                                    <span>Order no.</span>
                                    <span>52522-63259226</span>
                                </div>
                                <div>
                                    <span>Transaction ID</span>
                                    <span>2265996</span>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <span>Order date</span>
                                    <span> 06/30/2017 </span>
                                </div>
                                <div>
                                    <span>Shipping arrival</span>
                                    <span>07/30/2017</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-section">
                      <span class="details-section-title"> PAYMENT DETAILS</span>
                      <div class="details-section-content">
                        <div>
                            <div>
                                <span> Transaction time</span>
                                <span>06/30/2017 at 00:59 </span>
                            </div>
                            <div>
                                <span>Amount</span>
                                <span>$1259,00</span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <span>Cart details </span>
                                <span> **** **** **** 5446</span>
                            </div>
                            <div>
                                <span>Items in cart</span>
                                <span>4</span>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="order-table">
                <div class="tableRow head">
                    <div>YOUR ORDER</div>
                    <div>QNTY</div>
                    <div>UNIT</div>
                    <div>PRICE</div>
                </div>
                <div class="tableRow">
                    <div> 
                        <div class="order-image">
                            <img src="{{asset('storage/assets/product.png')}}" />
                        </div>
                        <div class="order-info">
                            <div>طقم ترابيزات جانبية متداخلة</div>
                            <div>منتجات ستانلس</div>
                        </div>
                    </div>
                    <div>1</div>
                    <div>EGP 15,000</div>
                    <div>EGP 15,000</div>
                </div>
            </div>
            <div class="order-summary">
                <div class="rectangle"></div>
                <div class="content">
                    <h4>Payment Summary</h4>
                    <div class="typography">
                        <div>
                            <span>Order number</span>
                            <span>11458523</span>
                        </div>
                        <div>
                            <span>VAT Amount</span>
                            <span>EGP 15,000</span>
                        </div>
                        <div>
                            <span>Order amount</span>
                            <span>EGP 15,000</span>
                        </div>
                    </div>
                    <div class="separetor">
                        <div class="circle circle-l"></div>
                        <div class="dashed-line"></div>
                        <div class="circle circle-r"></div>
                    </div>
                    <div class="ammount">
                        <div>
                            <span>Amount to be paid</span>
                            <span>EGP 15,000</span>
                        </div>
                        <div><img src="{{asset('storage/assets/list.png')}}" /></div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection

@section('container_js')
    {{-- script to open add lcoation form --}}
    <script>
    function toggleItems(sectionHeader) {
        const sectionItems = sectionHeader.nextElementSibling;
        const arrow = sectionHeader.querySelector('.arrow');

        if (sectionItems.style.maxHeight) {
        sectionItems.style.maxHeight = null;
        sectionItems.style.opacity = 0;
        arrow.style.transform = 'rotate(0deg)';
        } else {
        sectionItems.style.maxHeight = 'fit-content'; // Set to a reasonable max-height
        sectionItems.style.opacity = 1;
        arrow.style.transform = 'rotate(180deg)';
        }
        
  }    
    </script>
    <script>
        function openPayMethods(){
            document.getElementById("pay-methods").style.display = "flex"
            document.getElementById("payNow").classList.add('opened')
            document.getElementById("installment").classList.remove('opened')
            document.getElementById("installment-methods").style.display = "none"
        }

        function openInstallment(){
            document.getElementById("installment-methods").style.display = "flex"
            document.getElementById("installment").classList.add('opened')
            document.getElementById("payNow").classList.remove('opened')
            document.getElementById("pay-methods").style.display = "none"
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const paymentTypeRadios = document.querySelectorAll("input[name='payment_type']");

            paymentTypeRadios.forEach(radio => {
                radio.addEventListener("change", function() {
                    const selectedValue = this.value;
                    const mainPaymentDiv = document.querySelector(".main-payment");
                    const installmentDiv = document.querySelector(".instament");
                    const payDiv = document.querySelector(".pay");
                    const depositDiv = document.querySelector(".deposit");

                    if (selectedValue === "installment") {
                        mainPaymentDiv.style.display = "none";
                        depositDiv.style.display = "none";
                        installmentDiv.style.display = "";
                        payDiv.style.display = "none";
                    } else if (selectedValue === "cash_on_delivery") {
                        mainPaymentDiv.style.display = "none";
                        depositDiv.style.display = "";
                        payDiv.style.display = "none";
                        installmentDiv.style.display = "none";


                    }else{
                        mainPaymentDiv.style.display = "none";
                        depositDiv.style.display = "none";
                        payDiv.style.display = "";
                        installmentDiv.style.display = "none";

                    }
                });
            });
        });
    </script>
    <script>
        let url_calculate_order = "{{ route('order.calculate') }}";
        setTimeout(
            function() {
                calculate()
            }, 500);

        function calculate() {
            let cobon = $('#cobon').val();
            let deposit = $('#cobon').val();
            $.ajax({
                url: url_calculate_order,
                type: 'GET',
                data: 'cobon=' + cobon,
                dataType: 'json',
                success: function(data) {
                    $('#calculate').html(data.data);
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            })
        }

        function orderPay(elem) {
            event.preventDefault();
            var action = $(elem).attr('action');
            var method = $(elem).attr('method');
            var dataform = new FormData($(elem)[0]);

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
@endsection
