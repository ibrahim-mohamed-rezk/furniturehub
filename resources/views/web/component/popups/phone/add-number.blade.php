<style>
    .phoneModal {
        .modal-dialog {
            max-width: 100% !important;

            .modal-content {
                width: clamp(294px, 27.760416666666664vw, 533px);
                max-width: 100%;
                margin-top: 100px;
                background: none;
                margin-left: auto;
                margin-right: auto;
                z-index: 99999;
                align-items: center;
                justify-content: center;
                border: none;

                .popup-container {
                    width: 100%;
                    background-color: #FFFFFF;
                    margin: 0 auto;
                    border-radius: 30px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                    gap: clamp(30px, 2.083vw, 40px);
                    padding: clamp(20px, 2.083vw, 40px) clamp(15px, 2.604166666666667vw, 50px);

                    .close-btn {
                        position: absolute;
                        top: clamp(10px, 1.14583vw, 22px);
                        right: clamp(10px, 1.14583vw, 22px);
                        cursor: pointer;
                    }

                    .popup-title {
                        font-family: Alexandria;
                        font-size: clamp(25px, 1.8229166666666667vw, 35px);
                        font-weight: 500;
                        line-height: 42.67px;
                        text-align: center;
                        color: #000000;
                    }

                    .popup-info {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        flex-direction: column;
                        gap: clamp(8px, 0.520833vw, 10px);

                        h3 {
                            font-family: Alexandria;
                            font-size: clamp(15px, 1.04166vw, 20px);
                            font-weight: 500;
                            line-height: 24.38px;
                            text-align: center;
                            color: #000000;
                        }

                        span {
                            font-family: Alexandria;
                            font-size: clamp(10px, 0.72916vw, 14px);
                            font-weight: 300;
                            line-height: 17.07px;
                            text-align: center;
                            color: #000000;
                        }
                    }

                    form {
                        width: 100%;

                        .input-container {
                            width: 100%;
                            display: flex;
                            flex-direction: column;
                            gap: clamp(10px, 0.78125vw, 15px);
                            padding: 0 clamp(10px, .989583vw, 19px);

                            .popup-input {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border: 1px solid #FD9636;
                                border-radius: 12px;
                                width: 100%;

                                .custom-dropdown,
                                input {
                                    border: none;
                                    outline: none;
                                }

                                .custom-dropdown {
                                    width: 21%;
                                    position: relative;
                                    border-radius: 12px;

                                    .dropdown-btn {
                                        width: 100%;
                                        padding: clamp(5px, 0.52083vw, 10px);
                                        font-family: Cairo;
                                        font-size: clamp(12px, 0.78125vw, 15px);
                                        font-weight: 500;
                                        line-height: 28.11px;
                                        border: none;
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        background: #fff;
                                        border-radius: 12px;
                                        color: #000;
                                        gap: 5px;

                                        img {
                                            width: 31%;
                                        }
                                    }

                                    .dropdown-content {
                                        display: none;
                                        position: absolute;
                                        background-color: #fff;
                                        min-width: 160px;
                                        border: 1px solid #ddd;
                                        z-index: 1;
                                        height: 250px;
                                        overflow: auto;
                                    }

                                    .dropdown-item {
                                        padding: 10px;
                                        cursor: pointer;
                                        display: flex;
                                        align-items: center;

                                        img {
                                            width: 20px;
                                            height: auto;
                                            margin-right: 10px;
                                        }

                                        &:hover {
                                            background-color: #f1f1f1;
                                        }
                                    }
                                }

                                input[type="phone"] {
                                    width: 79%;
                                    border-inline-start: 1px solid #FD9636;
                                    padding: 16px;
                                    border-end-end-radius: 12px;
                                    border-start-end-radius: 12px;
                                    font-family: Alexandria;
                                    font-size: clamp(12px, 0.78125vw, 15px);
                                    font-weight: 400;
                                    line-height: 18.29px;
                                    color: #000;
                                }
                            }

                            .popup-aleart {
                                font-family: Alexandria;
                                width: 100%;
                                font-size: 11px;
                                font-weight: 400;
                                line-height: 13.41px;
                                text-align: center;
                                color: #FF121280;
                            }
                        }

                        .popup-btn {
                            width: 100%;
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            button {
                                border: none;
                                outline: none;
                                background-color: #FD9636;
                                width: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-family: Alexandria;
                                font-size: clamp(15px, 1.0416vw, 20px);
                                font-weight: 500;
                                line-height: 24.38px;
                                color: #fff;
                                padding: clamp(10px, 1.0416vw, 20px) 0;
                                border-radius: 12px;
                            }
                        }
                    }

                }
            }
        }
    }

    body.dark {
        .phoneModal {
            .modal-dialog {

                .modal-content {
                    .popup-container {
                        background-color: var(--dark-mode-second);

                        .popup-title {
                            color: #fff;
                        }

                        .popup-info {

                            h3 {
                                color: #fff;
                            }

                            span {

                                color: #fff;
                            }
                        }

                        form {
                            .input-container {


                                .popup-input {


                                    .custom-dropdown {
                                        .dropdown-btn {
                                            color: #fff;
                                            background-color: transparent !important;
                                        }

                                        .dropdown-content {
                                            display: none;
                                            position: absolute;
                                            background-color: transparent;
                                            ;
                                            border: 1px solid var(--dark-mode-white);

                                        }

                                        .dropdown-item {
                                            &:hover {
                                                background-color: transparent;
                                            }
                                        }
                                    }

                                    input[type="phone"] {
                                        color: #fff;
                                        background: transparent;

                                    }
                                }
                            }

                        }
                    }
                }
            }
        }
    }
</style>

{{-- to open modal --}}
{{-- <button data-toggle="modal" data-target="#phoneModal">open modal</button> --}}
<div class="modal phoneModal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="phoneModalTitle"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="popup-container">
                {{-- <button type="button" class="btn-close closeModal" data-dismiss="modal" aria-label="Close">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M23.65 0H9.68333C4.33538 0 0 4.33538 0 9.68333V23.65C0 28.998 4.33538 33.3333 9.68333 33.3333H23.65C28.998 33.3333 33.3333 28.998 33.3333 23.65V9.68333C33.3333 4.33538 28.998 0 23.65 0Z"
                            fill="#6D6D6D" />
                        <path
                            d="M19.0166 16.6668L23.7332 11.9502C23.9077 11.8007 24.0494 11.6169 24.1494 11.4101C24.2495 11.2033 24.3057 10.9781 24.3146 10.7486C24.3234 10.519 24.2847 10.2902 24.201 10.0763C24.1172 9.8624 23.9901 9.66816 23.8276 9.50573C23.6652 9.34331 23.471 9.21621 23.2571 9.13242C23.0432 9.04863 22.8143 9.00995 22.5848 9.01882C22.3553 9.02769 22.13 9.0839 21.9233 9.18394C21.7165 9.28398 21.5326 9.42568 21.3832 9.60015L16.6666 14.3168L11.9499 9.60015C11.6311 9.32711 11.2209 9.18443 10.8015 9.20063C10.382 9.21683 9.98411 9.39072 9.68728 9.68755C9.39046 9.98437 9.21657 10.3823 9.20037 10.8017C9.18417 11.2212 9.32685 11.6313 9.59989 11.9502L14.3166 16.6668L9.59989 21.3835C9.28947 21.6958 9.11523 22.1182 9.11523 22.5585C9.11523 22.9988 9.28947 23.4212 9.59989 23.7335C9.91216 24.0439 10.3346 24.2181 10.7749 24.2181C11.2152 24.2181 11.6376 24.0439 11.9499 23.7335L16.6666 19.0168L21.3832 23.7335C21.6955 24.0439 22.1179 24.2181 22.5582 24.2181C22.9985 24.2181 23.4209 24.0439 23.7332 23.7335C24.0436 23.4212 24.2179 22.9988 24.2179 22.5585C24.2179 22.1182 24.0436 21.6958 23.7332 21.3835L19.0166 16.6668Z"
                            fill="#6D6D6D" />
                    </svg>
                </button> --}}
                <h2 class="popup-title">{{__('web.confirm_your_phone_number')}}</h2>
                <div class="popup-info">
                    <h3>{{__('web.enter_your_phone_number_to_confirm')}}</h3>
                    <span>{{__('web.to_continue_shopping')}}</span>
                </div>

                <form action="{{ route('web.update_phone') }}" method="POST" onsubmit="formAction(this)">
                    @csrf
                    <div class="input-container">
                        <div class="popup-input">
                            <div class="custom-dropdown">
                                <button type="button" class="dropdown-btn" onclick="toggleDropdown()" id="dropdownBtn">
                                    <img src="{{url('/public/storage/assets/popups/eg.svg')}}" alt="eg-flag" />
                                    <span>+20</span>
                                </button>
                            </div>
                            <input type="phone" name="phone" placeholder="{{__('web.phone_number')}}" id="phoneInput" />
                            <input type="hidden" name="country_code" id="countryCodeInput" value="+20">
                        </div>
                        <span
                            class="popup-aleart">{{__('web.make_sure_to_enter_the_number_correctly_to_complete_the_purchase_process')}}</span>
                    </div>
                    <div class="popup-btn">
                        <button type="submit" data-dismiss="modal" aria-label="Close">{{__('web.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    function selectItem(element) {
        var selectedValue = element.getAttribute('data-value');
        var selectedImg = element.querySelector('img').src;

        var dropdownBtn = document.getElementById("dropdownBtn");
        dropdownBtn.innerHTML = '<img src="' + selectedImg + '" alt="flag" /> <span>' + selectedValue + '</span>';

        // Set the hidden input value for country code
        document.getElementById("countryCodeInput").value = selectedValue;

        document.getElementById("dropdown").style.display = "none";
    }


    // Check if the instance exists before calling hide
    if (phoneModal) {
        phoneModal.hide();
    } else {
        console.error('Modal instance not found.');
    }
}


    // Close the dropdown if clicked outside
    window.onclick = function(event) {
        var dropdown = document.getElementById("dropdown");
        if (!event.target.closest('.custom-dropdown')) {
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }
</script>