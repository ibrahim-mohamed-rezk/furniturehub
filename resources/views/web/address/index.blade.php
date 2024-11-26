@extends('web.layouts.container')

@section('styles')
<link href="{{ url('') }}/assets/web/ASSets/css/address.css" rel="stylesheet">
@endsection

@section('content')
<div class="section-box">
    <div class="breadcrumbs-div">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                <li><a class="font-xs color-gray-500" href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                <li><a class="font-xs color-gray-500" href="{{ url()->current() }}">{{ __('web.address') }}</a></li>
            </ul>
        </div>
    </div>
</div>

{{-- location section --}}
<section class="section-box shop-template">
    <div class="container">
        @if (url()->previous() == url('') . '/cart' or url()->previous() == url('') . '/address' or url()->previous() ==
        url('') . '/order' )
        <div class="order_status">
            <div class="order_status_item">
                <a href="{{ route('cart.index') }}">
                    <div class="icon">
                        <img src="{{ asset('public/storage/assets/cartIconFilled.png') }}" />
                    </div>
                </a>
                <div class="title orange-color">{{ __('web.cart_items') }}</div>
            </div>
            <div class="line ornge"></div>
            <div class="order_status_item">
                <div class="icon">
                    <img src="{{ asset('public/storage/assets/deliveryIconOrange.png') }}" />
                </div>
                <div class="title orange-color">{{ __('web.the_delivery') }}</div>
            </div>
            <div class="line"></div>
            <div class="order_status_item">
                <div class="icon">
                    <img src="{{ asset('public/storage/assets/paymentIcon.png') }}" />
                </div>
                <div class="title">{{ __('web.payment') }}</div>
            </div>
            <div class="line"></div>
            <div class="order_status_item">
                <div class="icon">
                    <img src="{{ asset('public/storage/assets/receptIcon.png') }}" />
                </div>
                <div class="title">{{ __('web.receipt') }}</div>
            </div>
        </div>
        @endif
        <div class="changeLocation defaultAddress">
            <div>
                <div class="locationIcon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="locationDec">
                    <span>{{ __('web.the_address_current') }}</span>
                    <p>{{ $default_address->address_1 ?? __('web.add_address') }}</p>
                </div>
            </div>
            @if ($default_address)

            <button
                onclick="handleAddressChange({{ json_encode($default_address) }})">{{ __('web.change_address') }}</button>
            @endif
        </div>
        <div class="locations">
            @include('web.component.address.addressList', ['addresses' => $addresses])
        </div>

        <div class="addLocationBtnSection">
            <button type="button" class="addLocationBtn" data-toggle="modal" data-target="#addLocationModal">
                ADD Location
            </button>
        </div>
        
        <div class="checkoutButtons chckBtns">

            <button class="goToShop" onclick="window.location='{{ route('order.index') }}'"
                style="cursor: pointer; display: flex; align-items: center;">
                <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.5 1L1.90428 6.35164C1.64521 6.6577 1.5 7.07021 1.5 7.5C1.5 7.9298 1.64521 8.34231 1.90428 8.64837L6.5 14"
                        stroke="#8B8B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Shop More</span>
            </button>
            <button onclick="window.location='{{ route('order.index') }}'"
                style="cursor: pointer; display: flex; align-items: center;">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 2.5H2C1.73478 2.5 1.48043 2.60536 1.29289 2.79289C1.10536 2.98043 1 3.23478 1 3.5V11.5C1 11.7652 1.10536 12.0196 1.29289 12.2071C1.48043 12.3946 1.73478 12.5 2 12.5H5V21.5C5 21.7652 5.10536 22.0196 5.29289 22.2071C5.48043 22.3946 5.73478 22.5 6 22.5H18C18.2652 22.5 18.5196 22.3946 18.7071 22.2071C18.8946 22.0196 19 21.7652 19 21.5V12.5H22C22.2652 12.5 22.5196 12.3946 22.7071 12.2071C22.8946 12.0196 23 11.7652 23 11.5V3.5C23 3.23478 22.8946 2.98043 22.7071 2.79289C22.5196 2.60536 22.2652 2.5 22 2.5ZM7 20.5V18.5C7.53043 18.5 8.03914 18.7107 8.41421 19.0858C8.78929 19.4609 9 19.9696 9 20.5H7ZM17 20.5H15C15 19.9696 15.2107 19.4609 15.5858 19.0858C15.9609 18.7107 16.4696 18.5 17 18.5V20.5ZM17 16.5C15.9391 16.5 14.9217 16.9214 14.1716 17.6716C13.4214 18.4217 13 19.4391 13 20.5H11C11 19.4391 10.5786 18.4217 9.82843 17.6716C9.07828 16.9214 8.06087 16.5 7 16.5V8.5H17V16.5ZM21 10.5H19V7.5C19 7.23478 18.8946 6.98043 18.7071 6.79289C18.5196 6.60536 18.2652 6.5 18 6.5H6C5.73478 6.5 5.48043 6.60536 5.29289 6.79289C5.10536 6.98043 5 7.23478 5 7.5V10.5H3V4.5H21V10.5ZM12 15.5C12.5933 15.5 13.1734 15.3241 13.6667 14.9944C14.1601 14.6648 14.5446 14.1962 14.7716 13.6481C14.9987 13.0999 15.0581 12.4967 14.9424 11.9147C14.8266 11.3328 14.5409 10.7982 14.1213 10.3787C13.7018 9.95912 13.1672 9.6734 12.5853 9.55764C12.0033 9.44189 11.4001 9.5013 10.8519 9.72836C10.3038 9.95542 9.83524 10.3399 9.50559 10.8333C9.17595 11.3266 9 11.9067 9 12.5C9 13.2956 9.31607 14.0587 9.87868 14.6213C10.4413 15.1839 11.2044 15.5 12 15.5ZM12 11.5C12.1978 11.5 12.3911 11.5586 12.5556 11.6685C12.72 11.7784 12.8482 11.9346 12.9239 12.1173C12.9996 12.3 13.0194 12.5011 12.9808 12.6951C12.9422 12.8891 12.847 13.0673 12.7071 13.2071C12.5673 13.347 12.3891 13.4422 12.1951 13.4808C12.0011 13.5194 11.8 13.4996 11.6173 13.4239C11.4346 13.3482 11.2784 13.22 11.1685 13.0556C11.0586 12.8911 11 12.6978 11 12.5C11 12.2348 11.1054 11.9804 11.2929 11.7929C11.4804 11.6054 11.7348 11.5 12 11.5Z"
                        fill="white" />
                </svg>
                <span>{{ __('web.proceed_to_checkOut') }}</span>
            </button>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title" id="addLocationModalLabel">Add New adders</h5>
                </div>
                <div class="buttons">
                    <button class="modalHeadButton saveBtn">
                        <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.26279 2.75871C5.38317 1.62953 6.33887 0.75 7.5 0.75H12.5C13.6611 0.75 14.6168 1.62953 14.7372 2.75871C15.5004 2.77425 16.1602 2.81372 16.7236 2.91721C17.4816 3.05644 18.1267 3.32168 18.6517 3.84661C19.2536 4.44853 19.5125 5.2064 19.6335 6.10651C19.75 6.97348 19.75 8.0758 19.75 9.44339V15.5531C19.75 16.9207 19.75 18.023 19.6335 18.89C19.5125 19.7901 19.2536 20.548 18.6517 21.1499C18.0497 21.7518 17.2919 22.0107 16.3918 22.1317C15.5248 22.2483 14.4225 22.2483 13.0549 22.2483H6.94513C5.57754 22.2483 4.47522 22.2483 3.60825 22.1317C2.70814 22.0107 1.95027 21.7518 1.34835 21.1499C0.746434 20.548 0.48754 19.7901 0.366524 18.89C0.249963 18.023 0.24998 16.9207 0.250001 15.5531V9.44339C0.24998 8.0758 0.249963 6.97348 0.366524 6.10651C0.48754 5.2064 0.746434 4.44853 1.34835 3.84661C1.87328 3.32168 2.51835 3.05644 3.27635 2.91721C3.83977 2.81372 4.49963 2.77425 5.26279 2.75871ZM5.26476 4.25913C4.54668 4.27447 3.99332 4.31061 3.54735 4.39253C2.98054 4.49664 2.65246 4.66382 2.40901 4.90727C2.13225 5.18403 1.9518 5.57261 1.85315 6.30638C1.75159 7.06173 1.75 8.06285 1.75 9.49826V15.4983C1.75 16.9337 1.75159 17.9348 1.85315 18.6901C1.9518 19.4239 2.13225 19.8125 2.40901 20.0893C2.68577 20.366 3.07435 20.5465 3.80812 20.6451C4.56347 20.7467 5.56458 20.7483 7 20.7483H13C14.4354 20.7483 15.4365 20.7467 16.1919 20.6451C16.9257 20.5465 17.3142 20.366 17.591 20.0893C17.8678 19.8125 18.0482 19.4239 18.1469 18.6901C18.2484 17.9348 18.25 16.9337 18.25 15.4983V9.49826C18.25 8.06285 18.2484 7.06173 18.1469 6.30638C18.0482 5.57261 17.8678 5.18403 17.591 4.90727C17.3475 4.66382 17.0195 4.49664 16.4527 4.39253C16.0067 4.31061 15.4533 4.27447 14.7352 4.25913C14.6067 5.37972 13.655 6.25 12.5 6.25H7.5C6.345 6.25 5.39326 5.37972 5.26476 4.25913ZM7.5 2.25C7.08579 2.25 6.75 2.58579 6.75 3V4C6.75 4.41421 7.08579 4.75 7.5 4.75H12.5C12.9142 4.75 13.25 4.41421 13.25 4V3C13.25 2.58579 12.9142 2.25 12.5 2.25H7.5ZM13.5483 9.98826C13.8309 10.2911 13.8146 10.7657 13.5117 11.0483L9.22603 15.0483C8.93787 15.3172 8.4907 15.3172 8.20255 15.0483L6.48826 13.4483C6.18545 13.1657 6.16908 12.6911 6.45171 12.3883C6.73433 12.0854 7.20893 12.0691 7.51174 12.3517L8.71429 13.4741L12.4883 9.95171C12.7911 9.66908 13.2657 9.68545 13.5483 9.98826Z"
                                fill="white" />
                        </svg>
                        <span>Save Location</span>
                    </button>
                    <button type="button" class="modalHeadButton CloseBtn" data-dismiss="modal" aria-label="Close">
                        close
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="myForm" class="myForm" method="post">
                    @csrf

                    <div class="pageFormInput">
                        <label>{{ __('web.first_name') }}</label>
                        <div class="inputContainer">
                            <div class="inputIconContainer">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20Z"
                                        fill="#A1A5B7" />
                                    <path
                                        d="M10 11.9398C7.90137 11.9398 6.20005 10.2385 6.20005 8.13984C6.20005 6.04116 7.90137 4.33984 10 4.33984C12.0987 4.33984 13.8 6.04116 13.8 8.13984C13.8 10.2385 12.0987 11.9398 10 11.9398Z"
                                        fill="#A1A5B7" />
                                    <path
                                        d="M10 20C7.61433 20.0027 5.30725 19.1473 3.5 17.59C3.96857 16.2392 4.84631 15.068 6.01121 14.2391C7.1761 13.4102 8.5703 12.9648 10 12.9648C11.4297 12.9648 12.8239 13.4102 13.9888 14.2391C15.1537 15.068 16.0314 16.2392 16.5 17.59C14.6927 19.1473 12.3857 20.0027 10 20Z"
                                        fill="#A1A5B7" />
                                </svg>
                            </div>
                            <input id="firstNameInput" name="first_name" type="text" placeholder="{{__('web.first_name')}}" />
                        </div>
                    </div>

                    <div class="pageFormInput">
                        <label>{{ __('web.city') }} * </label>
                        <div class="inputContainer">
                            <div class="inputIconContainer">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M14.55 0H6.45C3.16391 0 0.5 2.66391 0.5 5.95V14.05C0.5 17.3361 3.16391 20 6.45 20H14.55C17.8361 20 20.5 17.3361 20.5 14.05V5.95C20.5 2.66391 17.8361 0 14.55 0Z"
                                        fill="#7E8299" />
                                    <path
                                        d="M19.8901 3.33984L4.41008 19.4798L4.33008 19.5998C4.86729 19.8153 5.43342 19.9501 6.01008 19.9998L12.7301 12.9998L17.9701 18.3298C18.1037 18.4626 18.2819 18.541 18.4701 18.5498C18.7495 18.2989 19.0071 18.0245 19.2401 17.7298C19.235 17.5594 19.1632 17.3978 19.0401 17.2798L13.7701 11.9198L20.4101 4.99984C20.3196 4.42389 20.1443 3.8645 19.8901 3.33984Z"
                                        fill="#7E8299" />
                                    <path
                                        d="M7.19001 2.82017C6.39432 2.91821 5.65326 3.27619 5.08187 3.83854C4.51048 4.40089 4.14072 5.13615 4.03001 5.93017C3.96071 6.44604 4.00441 6.97081 4.15809 7.46811C4.31177 7.9654 4.57175 8.42334 4.92001 8.81017L6.75001 10.8702C6.85785 10.9901 6.9897 11.0859 7.137 11.1516C7.2843 11.2172 7.44375 11.2511 7.60501 11.2511C7.76627 11.2511 7.92572 11.2172 8.07302 11.1516C8.22032 11.0859 8.35217 10.9901 8.46001 10.8702L10.3 8.81017C10.8932 8.15163 11.221 7.29647 11.22 6.41017C11.2191 5.90075 11.1106 5.39727 10.9017 4.93264C10.6929 4.46801 10.3883 4.05269 10.0079 3.71385C9.62755 3.375 9.17993 3.12025 8.69435 2.96625C8.20877 2.81225 7.69615 2.76247 7.19001 2.82017ZM7.61001 7.76017C7.343 7.76017 7.082 7.68099 6.85999 7.53265C6.63798 7.38431 6.46495 7.17347 6.36277 6.92679C6.26059 6.68011 6.23386 6.40867 6.28595 6.1468C6.33804 5.88492 6.46661 5.64438 6.65542 5.45557C6.84422 5.26677 7.08476 5.1382 7.34664 5.08611C7.60851 5.03402 7.87995 5.06075 8.12663 5.16293C8.37331 5.26511 8.58415 5.43814 8.73249 5.66015C8.88083 5.88216 8.96001 6.14316 8.96001 6.41017C8.96001 6.76821 8.81778 7.11159 8.5646 7.36476C8.31143 7.61794 7.96805 7.76017 7.61001 7.76017Z"
                                        fill="#7E8299" />
                                </svg>
                            </div>
                            <select id="cityInput" name="governorate_id">
                                <option value="default" selected>{{ __('web.Select_an_option') }}</option>
                                @foreach($governorates as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="pageFormInput">
                        <label>{{ __('web.phone') }}</label>
                        <div class="inputContainer">
                            <div class="inputIconContainer">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20Z"
                                        fill="#A1A5B7" />
                                    <path
                                        d="M10 11.9398C7.90137 11.9398 6.20005 10.2385 6.20005 8.13984C6.20005 6.04116 7.90137 4.33984 10 4.33984C12.0987 4.33984 13.8 6.04116 13.8 8.13984C13.8 10.2385 12.0987 11.9398 10 11.9398Z"
                                        fill="#A1A5B7" />
                                    <path
                                        d="M10 20C7.61433 20.0027 5.30725 19.1473 3.5 17.59C3.96857 16.2392 4.84631 15.068 6.01121 14.2391C7.1761 13.4102 8.5703 12.9648 10 12.9648C11.4297 12.9648 12.8239 13.4102 13.9888 14.2391C15.1537 15.068 16.0314 16.2392 16.5 17.59C14.6927 19.1473 12.3857 20.0027 10 20Z"
                                        fill="#A1A5B7" />
                                </svg>
                            </div>
                            <input name="phone" id="phoneInput" type="number" placeholder="{{ __('web.phone') }}" />
                        </div>
                    </div>

                    <div class="pageFormInput">
                        <label>{{ __('web.additional_information') }}</label>
                        <div class="inputContainer">
                            <div class="inputIconContainer">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20Z"
                                        fill="#A1A5B7" />
                                    <path
                                        d="M10 11.9398C7.90137 11.9398 6.20005 10.2385 6.20005 8.13984C6.20005 6.04116 7.90137 4.33984 10 4.33984C12.0987 4.33984 13.8 6.04116 13.8 8.13984C13.8 10.2385 12.0987 11.9398 10 11.9398Z"
                                        fill="#A1A5B7" />
                                    <path
                                        d="M10 20C7.61433 20.0027 5.30725 19.1473 3.5 17.59C3.96857 16.2392 4.84631 15.068 6.01121 14.2391C7.1761 13.4102 8.5703 12.9648 10 12.9648C11.4297 12.9648 12.8239 13.4102 13.9888 14.2391C15.1537 15.068 16.0314 16.2392 16.5 17.59C14.6927 19.1473 12.3857 20.0027 10 20Z"
                                        fill="#A1A5B7" />
                                </svg>
                            </div>
                            <input name="information" id="informationInput" type="text"
                                placeholder="{{ __('web.additional_information') }}" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('container_js')
<script>
    // Define the handleAddressChange function globally
    function handleAddressChange(defaultAddress) {
        const addLocationForm = document.getElementById("addLocationForm");
        const arrow = document.getElementById("arrow");

        const fullNameInput = document.getElementById("fullNameInput");
        const countryInput = document.getElementById("countryInput");
        const address1Input = document.getElementById("address1Input");
        const address2Input = document.getElementById("address2Input");
        const zipCodeInput = document.getElementById("zipCodeInput");
        const informationInput = document.getElementById("informationInput");
        const phoneInput = document.getElementById("phoneInput");
        const cityInput = document.getElementById("cityInput");

        const form = document.getElementById("myForm");

        firstNameInput.value = "{{ $default_address->first_name ?? ''  }}";
        lastNameInput.value = "{{ $default_address->last_name ?? ''}}";
        address1Input.value = "{{ $default_address->address_1 ?? ''}}";
        address2Input.value = "{{ $default_address->address_2 ?? ''}}";
        zipCodeInput.value = "{{ $default_address->post_code ?? ''}}";
        informationInput.value = "{{ $default_address->information ?? ''}}";
        phoneInput.value = "{{ $default_address->phone ?? ''}}";
        const defaultGovernorateId = "{{ $default_address->governorate_id ?? ''}}";

        Array.from(cityInput.options).forEach(option => {
            if (option.value === defaultGovernorateId) {
                option.selected = true;
            } else {
                option.selected = false;
            }
        });

        form.action = "{{ route('address.update', $default_address->id ??''  ) }}";

        const methodField = form.querySelector('input[name="_method"]');
        if (!methodField) {
            const patchInput = document.createElement('input');
            patchInput.type = 'hidden';
            patchInput.name = '_method';
            patchInput.value = 'PATCH';
            form.appendChild(patchInput);
        }

        if (addLocationForm.style.maxHeight) {
            addLocationForm.style.maxHeight = null;
            addLocationForm.style.opacity = 0;
            arrow.style.transform = 'rotate(0deg)';
        } else {
            addLocationForm.style.maxHeight = 'fit-content';
            addLocationForm.style.opacity = 1;
            arrow.style.transform = 'rotate(180deg)';
        }

    }
</script>
<script>
    function toggleItems(sectionHeader, action) {
        const sectionItems = sectionHeader.nextElementSibling;
        const arrow = sectionHeader.querySelector('.arrow');
        const inputs = sectionItems.querySelectorAll('.form-control');
        const selectCity = sectionItems.querySelector('.select-city');
        const form = sectionItems.querySelector('.myForm');
        const methodInput = form.querySelector('input[name="_method"]');
        if (methodInput) {
            methodInput.remove();
        }
        if (sectionItems.style.maxHeight) {
            sectionItems.style.maxHeight = null;
            sectionItems.style.opacity = 0;
            arrow.style.transform = 'rotate(0deg)';
            form.action = action;

        } else {
            sectionItems.style.maxHeight = 'fit-content';
            sectionItems.style.opacity = 1;
            arrow.style.transform = 'rotate(180deg)';
            form.action = action;

        }

        inputs.forEach(input => {
            if (input.tagName === 'INPUT' || input.tagName === 'TEXTAREA') {
                input.value = '';
            }
        });
        selectCity.value = "default";

    }
</script>




<script>
    function viewAddress() {
        $.ajax({
            url: "{{ route('web.address_show') }}",
            type: 'GET',
            data: '',
            dataType: 'json',
            success: function(data) {
                $('.locations').html(data.address);
                $('.defaultAddress').html(data.default_address);

            },
            error: function(xhr, status, error) {
                toastr.error("Failed to fetch addresses.");
                console.error('AJAX request failed:', error);
            }
        });

    }

    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();
            var url = form.attr('action');
            var method = form.attr('method');
            var hasPatchMethod = form.find('input[name="_method"][value="PATCH"]').length > 0;

            $.ajax({
                type: method,
                url: url,
                data: formData,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    toastr.success("{{ __('web.success') }}");
                    if (hasPatchMethod) {
                        location.reload();
                    } else {

                        viewAddress();
                        toggleItems(form.parents('.section-box').find('.section-header')[0],
                            url);
                    }
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            });
        });
    });
    $(document).on('click', '.delete-address', function(e) {
        e.preventDefault();

        const addressId = $(this).data('id');
        const deleteUrl = "{{ route('address.destroy', ':id') }}".replace(':id', addressId);

        $.ajax({
            type: 'DELETE',
            url: deleteUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(res) {

                toasterSuccess("{{ __('web.address_deleted_successfully') }}");
                viewAddress();



            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                toastr.error('Failed to delete address');
            }
        });
    });

    $(document).on('click', '.default-address', function(e) {
        e.preventDefault();

        const addressId = $(this).data('id');
        const defaultUrl = "{{ route('default_address', ':id') }}".replace(':id', addressId);

        $.ajax({
            type: 'GET',
            url: defaultUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(res) {

                toasterSuccess("{{ __('web.success') }}");
                viewAddress();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                toastr.error('Failed to delete address');
            }
        });
    });
</script>
@endsection