@extends('web.pages.account')

@section('profileContent')
    <div class="account-profile-content-container address-contaier">
        <div class="addresses-container">
            @include('web.component.address.addressListProfile', [
                'addresses' => $addresses,
                ['default_address' => $default_address],
            ])

        </div>
        <div class="add-address-button">
            <button class="add-address-text"
                onclick="toggleLocation( '{{ $action }}')">{{ __('web.add_address') }}</button>
        </div>
        <div style="width: 100%; border-bottom: 1px #D9D9D9 solid; margin: 25px 0;"></div>

        {{-- add location section --}}
        <div class="addLocation none">
            <div class="section-header">
                {{-- <div class="LocationLine"></div> --}}
                <span>{{ __('web.add_address') }}</span>
            </div>
            <form id="addLocationForm" class="accountLocation-section-items none" method="post">
                @csrf
                <div class="inputs-container">
                    <div class="input-content">
                        <div class="input-field">
                            <input type="text" id="firstNameInput" name="first_name" placeholder="{{ __('web.first_name') }}"
                                class="input-class">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.first_name') }}</span>
                            <span class="required">*</span>
                        </div>
                    </div>
                    <div class="input-content">
                        <div class="input-field">
                            <input type="text" id="lastNameInput" name="last_name" placeholder="{{ __('web.last_name') }}"
                                class="input-class">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.last_name') }}</span>
                            <span class="required">*</span>
                        </div>
                    </div>
                    <div class="input-content">
                        <div class="input-field">
                            <select name="governorate_id" class="input-class" id="select-governorate">
                                <option value="default">{{ __('web.Select_an_option') }}</option>
                                @foreach ($governorates as $key => $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.governorate') }} </span>
                            <span class="required">*</span>
                        </div>
                    </div>

                    <div style="width: calc((200% / 3) - 45px) !important; max-width: 687px;" class="input-content">
                        <div class="input-field">
                            <input type="text" id="address1Input" name="address_1" placeholder="{{ __('web.home_address') }}"
                                class="input-class">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.home_address') }} </span>
                            <span class="required">*</span>
                        </div>
                    </div>
                    <div class="input-content">
                        <div class="input-field">
                            <input name="post_code" id="zipCodeInput" type="text"
                                placeholder="{{ __('web.postCode_ZIP') }}" class="input-class">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.postCode_ZIP') }} </span>
                            <span class="required">*</span>
                        </div>
                    </div>
                    <div style="width: calc((200% / 3) - 45px) !important; max-width: 687px;" class="input-content">
                        <div class="input-field">
                            <input type="text" id="address2Input" name="address_2" placeholder="{{ __('web.delivery_address') }}"
                                class="input-class">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.delivery_address') }} </span>
                            <span class="required">*</span>
                        </div>
                    </div>

                    <div class="input-content">
                        <div class="input-field">
                            <input name="phone" id="phoneInput" type="tel" placeholder="{{ __('web.phone') }}"
                                class="input-class">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.phone') }} </span>
                            <span class="required">*</span>
                        </div>
                    </div>
                    <div style="width: calc((200% / 3) - 45px) !important; max-width: 687px;" class="input-content">
                        <div class="input-field">
                            <input name="information" id="informationInput" type="text" class="input-class"
                                placeholder="{{ __('web.additional_information') }}">
                        </div>
                        <div class="label">
                            <span class="text">{{ __('web.additional_information') }} </span>
                            <span class="required">*</span>
                        </div>
                    </div>
                </div>

                <div class="checkoutButtons chckBtns">
                    <button type="submit">{{ __('web.apply') }}</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('container_js')
    <script>
        const minimizeAccountMenue = () => {
            $('.account-container').toggleClass('minimize-container');
            $('.account-profile-content-container').toggleClass('minimize-account-profile-content-container');

            $('.account-item').each(function() {
                $(this).toggleClass('minimize-item');
            });

            $('.item-title').each(function() {
                $(this).toggleClass('minimize-hide');
            });

            $('.minimize-btn').toggleClass('minimize-hide');
            $('.header-title').toggleClass('minimize-hide');
            $('.account-menue-icon').toggleClass('minimize-hide');
        }
    </script>
    <script>
        function toggleCard(element) {
            const card = element.nextElementSibling;
            card.classList.toggle('none');

        }

        function toggleLocation(action) {
            const location = document.querySelector('.addLocation');
            const locationForm = document.querySelector('#addLocationForm');
            const inputs = locationForm.querySelectorAll('.input-class');
            const selectCity = location.querySelector('#select-governorate');

            location.classList.toggle('show');
            location.classList.toggle('none');
            locationForm.classList.toggle('show');
            locationForm.classList.toggle('none');
            locationForm.action = action;

            inputs.forEach(input => {
                if (input.tagName === 'INPUT') {
                    input.value = '';
                }
            });
            selectCity.value = "default";
        }

        function handleAddressChange(defaultAddress) {
            const location = document.querySelector('.addLocation');
            const addLocationForm = document.querySelector('#addLocationForm');

            const firstNameInput = document.getElementById("firstNameInput");
            const lastNameInput = document.getElementById("lastNameInput");
            const address1Input = document.getElementById("address1Input");
            const address2Input = document.getElementById("address2Input");
            const zipCodeInput = document.getElementById("zipCodeInput");
            const informationInput = document.getElementById("informationInput");
            const phoneInput = document.getElementById("phoneInput");
            const cityInput = document.getElementById("select-governorate");

            firstNameInput.value = "{{ $default_address->first_name }}";
            lastNameInput.value = "{{ $default_address->last_name }}";
            address1Input.value = "{{ $default_address->address_1 }}";
            address2Input.value = "{{ $default_address->address_2 }}";
            zipCodeInput.value = "{{ $default_address->post_code }}";
            informationInput.value = "{{ $default_address->information }}";
            phoneInput.value = "{{ $default_address->phone }}";
            const defaultGovernorateId = "{{ $default_address->governorate_id }}";

            Array.from(cityInput.options).forEach(option => {
                if (option.value === defaultGovernorateId) {
                    option.selected = true;
                } else {
                    option.selected = false;
                }
            });

            addLocationForm.action = "{{ route('address.update', $default_address->id) }}";

            const methodField = addLocationForm.querySelector('input[name="_method"]');
            if (!methodField) {
                const patchInput = document.createElement('input');
                patchInput.type = 'hidden';
                patchInput.name = '_method';
                patchInput.value = 'PATCH';
                addLocationForm.appendChild(patchInput);
            }

            location.classList.toggle('show');
            location.classList.toggle('none');
            addLocationForm.classList.toggle('show');
            addLocationForm.classList.toggle('none');


        }

        function viewAddress() {
            $.ajax({
                url: "{{ route('web.address_show_profile') }}",
                type: 'GET',
                data: '',
                dataType: 'json',
                success: function(data) {
                    $('.addresses-container').html(data.address);

                },
                error: function(xhr, status, error) {
                    toastr.error("Failed to fetch addresses.");
                    console.error('AJAX request failed:', error);
                }
            });

        }
        $(document).ready(function() {
            $('#addLocationForm').submit(function(e) {
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
                            toggleLocation(url);
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
