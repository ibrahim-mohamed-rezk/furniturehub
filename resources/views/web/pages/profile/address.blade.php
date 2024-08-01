@extends('web.pages.account')

@section('profileContent')
<div class="account-profile-content-container address-contaier">
    <div class="addresses-container">
        <div class="addres-item">
            <div class="left">
                <div class="icon-background">
                    <svg width="39" height="39" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.0015 3.08643C15.1586 3.08643 8.77734 9.18947 8.77734 16.6883C8.77734 20.2594 10.4051 25.0085 13.6153 30.8039C16.1935 35.457 19.1761 39.6647 20.7274 41.7583C20.9895 42.116 21.3323 42.407 21.7278 42.6075C22.1234 42.808 22.5607 42.9125 23.0041 42.9125C23.4476 42.9125 23.8849 42.808 24.2805 42.6075C24.676 42.407 25.0188 42.116 25.2809 41.7583C26.8296 39.6647 29.8148 35.457 32.393 30.8039C35.5978 25.0103 37.2256 20.2612 37.2256 16.6883C37.2256 9.18947 30.8443 3.08643 23.0015 3.08643ZM23.0015 23.0002C21.8762 23.0002 20.7761 22.6665 19.8405 22.0413C18.9048 21.4162 18.1756 20.5275 17.7449 19.4879C17.3143 18.4483 17.2016 17.3043 17.4212 16.2006C17.6407 15.0969 18.1826 14.0831 18.9783 13.2874C19.774 12.4917 20.7878 11.9498 21.8915 11.7302C22.9952 11.5107 24.1392 11.6234 25.1788 12.054C26.2185 12.4846 27.1071 13.2139 27.7323 14.1496C28.3574 15.0852 28.6911 16.1853 28.6911 17.3106C28.6895 18.819 28.0895 20.2653 27.0229 21.3319C25.9562 22.3986 24.51 22.9986 23.0015 23.0002Z"
                            fill="white" />
                    </svg>
                </div>
                <div class="delivery-details">
                    <div class="delivery-title">Deliver to</div>
                    <div class="delivery-address">دمياط فارسكور شارع المركز امام مكتبه الرسله اعلي المكتبه الدور التاني
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="default-badge">
                    <div class="badge-text">Default</div>
                </div>
                <div class="change-location-btn">
                    <div class="change-location-text">Change location</div>
                </div>
                <div class="icon-container">
                    <div class="dots-icon" onclick="toggleCard(this)">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div id="account-locationItem-card" class="card none">
                        <div class="remove-container">
                            <div class="remove-box">
                                <div class="remove-icon">
                                    <svg width="20" height="20" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.75 7.22222V13.4444M6.25 7.22222V13.4444M2.75 3.66667V14.1556C2.75 15.1512 2.75 15.6487 2.94074 16.029C3.10852 16.3635 3.37604 16.636 3.70532 16.8064C4.0793 17 4.56912 17 5.5473 17H10.4527C11.4309 17 11.92 17 12.294 16.8064C12.6233 16.636 12.8917 16.3635 13.0594 16.029C13.25 15.6491 13.25 15.152 13.25 14.1583V3.66667M2.75 3.66667H4.5M2.75 3.66667H1M4.5 3.66667H11.5M4.5 3.66667C4.5 2.83833 4.5 2.42436 4.63321 2.09766C4.81082 1.66205 5.15128 1.31576 5.58008 1.13533C5.90168 1 6.3096 1 7.125 1H8.875C9.6904 1 10.0981 1 10.4197 1.13533C10.8485 1.31576 11.1891 1.66205 11.3667 2.09766C11.4999 2.42436 11.5 2.83833 11.5 3.66667M11.5 3.66667H13.25M13.25 3.66667H15"
                                            stroke="#FF1212" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </div>
                            <div class="remove-text">Remove</div>
                        </div>
                        <div class="divider"></div>
                        <div class="title">Make Default</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="addres-item">
            <div class="left">
                <div class="icon-background">
                    <svg width="39" height="39" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.0015 3.08643C15.1586 3.08643 8.77734 9.18947 8.77734 16.6883C8.77734 20.2594 10.4051 25.0085 13.6153 30.8039C16.1935 35.457 19.1761 39.6647 20.7274 41.7583C20.9895 42.116 21.3323 42.407 21.7278 42.6075C22.1234 42.808 22.5607 42.9125 23.0041 42.9125C23.4476 42.9125 23.8849 42.808 24.2805 42.6075C24.676 42.407 25.0188 42.116 25.2809 41.7583C26.8296 39.6647 29.8148 35.457 32.393 30.8039C35.5978 25.0103 37.2256 20.2612 37.2256 16.6883C37.2256 9.18947 30.8443 3.08643 23.0015 3.08643ZM23.0015 23.0002C21.8762 23.0002 20.7761 22.6665 19.8405 22.0413C18.9048 21.4162 18.1756 20.5275 17.7449 19.4879C17.3143 18.4483 17.2016 17.3043 17.4212 16.2006C17.6407 15.0969 18.1826 14.0831 18.9783 13.2874C19.774 12.4917 20.7878 11.9498 21.8915 11.7302C22.9952 11.5107 24.1392 11.6234 25.1788 12.054C26.2185 12.4846 27.1071 13.2139 27.7323 14.1496C28.3574 15.0852 28.6911 16.1853 28.6911 17.3106C28.6895 18.819 28.0895 20.2653 27.0229 21.3319C25.9562 22.3986 24.51 22.9986 23.0015 23.0002Z"
                            fill="white" />
                    </svg>
                </div>
                <div class="delivery-details">
                    <div class="delivery-title">Deliver to</div>
                    <div class="delivery-address">دمياط فارسكور شارع المركز امام مكتبه الرسله اعلي المكتبه الدور التاني
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="default-badge" style="display: none">
                    <div class="badge-text">Default</div>
                </div>
                <div class="change-location-btn">
                    <div class="change-location-text">Change location</div>
                </div>
                <div class="icon-container">
                    <div class="dots-icon" onclick="toggleCard(this)">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                    <div id="account-locationItem-card" class="card none">
                        <div class="remove-container">
                            <div class="remove-box">
                                <div class="remove-icon">
                                    <svg width="20" height="20" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.75 7.22222V13.4444M6.25 7.22222V13.4444M2.75 3.66667V14.1556C2.75 15.1512 2.75 15.6487 2.94074 16.029C3.10852 16.3635 3.37604 16.636 3.70532 16.8064C4.0793 17 4.56912 17 5.5473 17H10.4527C11.4309 17 11.92 17 12.294 16.8064C12.6233 16.636 12.8917 16.3635 13.0594 16.029C13.25 15.6491 13.25 15.152 13.25 14.1583V3.66667M2.75 3.66667H4.5M2.75 3.66667H1M4.5 3.66667H11.5M4.5 3.66667C4.5 2.83833 4.5 2.42436 4.63321 2.09766C4.81082 1.66205 5.15128 1.31576 5.58008 1.13533C5.90168 1 6.3096 1 7.125 1H8.875C9.6904 1 10.0981 1 10.4197 1.13533C10.8485 1.31576 11.1891 1.66205 11.3667 2.09766C11.4999 2.42436 11.5 2.83833 11.5 3.66667M11.5 3.66667H13.25M13.25 3.66667H15"
                                            stroke="#FF1212" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </div>
                            <div class="remove-text">Remove</div>
                        </div>
                        <div class="divider"></div>
                        <div class="title">Make Default</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="add-address-button">
        <button class="add-address-text" onclick="toggleLocation()">Add Address</button>
    </div>
    <div style="width: 100%; border-bottom: 1px #D9D9D9 solid; margin: 25px 0;"></div>

    {{-- add location section --}}
    <div class="addLocation none">
        <div class="section-header">
            {{-- <div class="LocationLine"></div> --}}
            <span>Add new location</span>
        </div>
        <div id="addLocationForm" class="accountLocation-section-items none">
            <div class="inputs-container">
                <div class="input-content">
                    <div class="input-field">
                        <input type="text">
                    </div>
                    <div class="label">
                        <span class="text">Full Name </span>
                        <span class="required">*</span>
                    </div>
                </div>
                <div class="input-content">
                    <div class="input-field">
                        <select>

                        </select>
                    </div>
                    <div class="label">
                        <span class="text">Governorate </span>
                        <span class="required">*</span>
                    </div>
                </div>
                <div class="input-content">
                    <div class="input-field">
                        <select>

                        </select>
                    </div>
                    <div class="label">
                        <span class="text">Center or city </span>
                        <span class="required">*</span>
                    </div>
                </div>
                <div style="width: calc((200% / 3) - 45px) !important; max-width: 687px;" class="input-content">
                    <div class="input-field">
                        <input type="tel">
                    </div>
                    <div class="label">
                        <span class="text">Detailed address </span>
                        <span class="required">*</span>
                    </div>
                </div>
                <div class="input-content">
                    <div class="input-field">
                        <input type="tel">
                    </div>
                    <div class="label">
                        <span class="text">Zip-code </span>
                        <span class="required">*</span>
                    </div>
                </div>
                <div class="input-content">
                    <div class="input-field">
                        <input type="tel">
                    </div>
                    <div class="label">
                        <span class="text">Phone number </span>
                        <span class="required">*</span>
                    </div>
                </div>
                <div class="input-content">
                    <div class="input-field">
                        <input type="tel">
                    </div>
                    <div class="label">
                        <span class="text">secondary Phone number </span>
                        <span class="required">*</span>
                    </div>
                </div>
            </div>
            <div class="checks-container">
                <div class="save-checks">
                    <div class="check-box">
                        <input type="checkbox">
                    </div>
                    <div class="check-lable">saved location</div>
                </div>
                <div class="save-checks">
                    <div class="check-box">
                        <input type="checkbox">
                    </div>
                    <div class="check-lable">Make default</div>
                </div>
            </div>


            <div class="checkoutButtons chckBtns">
                <button>Save Location</button>
            </div>
        </div>
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
    function toggleLocation() {
        const location = document.querySelector('.addLocation');
        const locationForm = document.querySelector('.accountLocation-section-items');
        location.classList.toggle('show');
        location.classList.toggle('none');
        locationForm.classList.toggle('show');
        locationForm.classList.toggle('none');
    }
    // $(document).ready(function() {
    //     $('.dots-icon').click(function() {
    //         $('#account-locationItem-card').toggleClass('none');
    //     })
    // })
</script>

@endsection