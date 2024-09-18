@extends('web.layouts.container')

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
        @if (url()->previous() == url('') . '/cart' or url()->previous() == url('') . '/address' or url()->previous() == url('') . '/order' )
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

                <button onclick="handleAddressChange({{ json_encode($default_address) }})">{{ __('web.change_address') }}</button>

            @endif
        </div>
        <div class="locations">
            @include('web.component.address.addressList', ['addresses' => $addresses])

        </div>

        <div class="addLocation">
            <div class="section-header" onclick="toggleItems(this, '{{ $action }}')">
                <i class="arrow fas fa-angle-up" id="arrow"></i>
                <div class="LocationLine"></div>
                <span>{{ __('web.add_address') }}</span>
            </div>
            <div id="addLocationForm" class="section-items">
                <form id="myForm" class="myForm" method="post">
                    @csrf
                    <div class="inputsRow">
                        <div class="location-form-group">
                            <label>{{ __('web.first_name') }}<span>*</span></label>
                            <input id="firstNameInput" name="first_name" type="text" class="form-control input-lg" />
                        </div>
                        <div class="location-form-group">
                            <label>{{ __('web.last_name') }} <span>*</span></label>
                            <input id="lastNameInput" type="text" name="last_name" class="form-control input-lg" />
                        </div>
                        <div class="location-form-group">
                            <label>{{ __('web.city') }} <span>*</span></label>
                            <select id="cityInput" name="governorate_id" class="form-control input-lg select-city">
                                <option value="default">{{ __('web.Select_an_option') }}</option>
                                @foreach ($governorates as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="inputsRow">
                        <div class="location-form-group">
                            <label>{{ __('web.home_address') }} <span>*</span></label>
                            <input id="address1Input" type="text" name="address_1" class="form-control input-lg" />
                        </div>
                        <div class="location-form-group">
                            <label>{{ __('web.delivery_address') }} </label>
                            <input id="address2Input" type="text" name="address_2" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="inputsRow" style="direction: rtl">

                        <div class="location-form-group">
                            <label><span>*</span> {{ __('web.phone') }} </label>
                            <input name="phone" id="phoneInput" type="number" class="form-control input-lg" />
                        </div>
                        <div class="location-form-group">
                            <label><span>*</span> {{ __('web.postCode_ZIP') }} </label>
                            <input name="post_code" id="zipCodeInput" type="text" class="form-control input-lg" />
                        </div>

                    </div>
                    <div class="inputRow">
                        <div class="location-form-group">
                            <label><span>*</span> {{ __('web.additional_information') }} </label>
                            <input name="information" id="informationInput" type="text" class="form-control input-lg" />
                        </div>
                    </div>
                    <div class="checkoutButtons chckBtns">
                        <button type="submit">
                            <span>{{ __('web.apply') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="checkoutButtons chckBtns">

            <button onclick="window.location='{{ route('order.index') }}'" style="cursor: pointer; display: flex; align-items: center;">
                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 2.5H2C1.73478 2.5 1.48043 2.60536 1.29289 2.79289C1.10536 2.98043 1 3.23478 1 3.5V11.5C1 11.7652 1.10536 12.0196 1.29289 12.2071C1.48043 12.3946 1.73478 12.5 2 12.5H5V21.5C5 21.7652 5.10536 22.0196 5.29289 22.2071C5.48043 22.3946 5.73478 22.5 6 22.5H18C18.2652 22.5 18.5196 22.3946 18.7071 22.2071C18.8946 22.0196 19 21.7652 19 21.5V12.5H22C22.2652 12.5 22.5196 12.3946 22.7071 12.2071C22.8946 12.0196 23 11.7652 23 11.5V3.5C23 3.23478 22.8946 2.98043 22.7071 2.79289C22.5196 2.60536 22.2652 2.5 22 2.5ZM7 20.5V18.5C7.53043 18.5 8.03914 18.7107 8.41421 19.0858C8.78929 19.4609 9 19.9696 9 20.5H7ZM17 20.5H15C15 19.9696 15.2107 19.4609 15.5858 19.0858C15.9609 18.7107 16.4696 18.5 17 18.5V20.5ZM17 16.5C15.9391 16.5 14.9217 16.9214 14.1716 17.6716C13.4214 18.4217 13 19.4391 13 20.5H11C11 19.4391 10.5786 18.4217 9.82843 17.6716C9.07828 16.9214 8.06087 16.5 7 16.5V8.5H17V16.5ZM21 10.5H19V7.5C19 7.23478 18.8946 6.98043 18.7071 6.79289C18.5196 6.60536 18.2652 6.5 18 6.5H6C5.73478 6.5 5.48043 6.60536 5.29289 6.79289C5.10536 6.98043 5 7.23478 5 7.5V10.5H3V4.5H21V10.5ZM12 15.5C12.5933 15.5 13.1734 15.3241 13.6667 14.9944C14.1601 14.6648 14.5446 14.1962 14.7716 13.6481C14.9987 13.0999 15.0581 12.4967 14.9424 11.9147C14.8266 11.3328 14.5409 10.7982 14.1213 10.3787C13.7018 9.95912 13.1672 9.6734 12.5853 9.55764C12.0033 9.44189 11.4001 9.5013 10.8519 9.72836C10.3038 9.95542 9.83524 10.3399 9.50559 10.8333C9.17595 11.3266 9 11.9067 9 12.5C9 13.2956 9.31607 14.0587 9.87868 14.6213C10.4413 15.1839 11.2044 15.5 12 15.5ZM12 11.5C12.1978 11.5 12.3911 11.5586 12.5556 11.6685C12.72 11.7784 12.8482 11.9346 12.9239 12.1173C12.9996 12.3 13.0194 12.5011 12.9808 12.6951C12.9422 12.8891 12.847 13.0673 12.7071 13.2071C12.5673 13.347 12.3891 13.4422 12.1951 13.4808C12.0011 13.5194 11.8 13.4996 11.6173 13.4239C11.4346 13.3482 11.2784 13.22 11.1685 13.0556C11.0586 12.8911 11 12.6978 11 12.5C11 12.2348 11.1054 11.9804 11.2929 11.7929C11.4804 11.6054 11.7348 11.5 12 11.5Z" fill="white" />
                </svg>
                <span>{{ __('web.proceed_to_checkOut') }}</span>
            </button>

        </div>
    </div>
</section>
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