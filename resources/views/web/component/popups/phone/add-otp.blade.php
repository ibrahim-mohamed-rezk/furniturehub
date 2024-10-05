@extends('web.component.popups.popupLayout')

<style>
    .popup-container {
        width: clamp(350px, 27.76vw, 533px);
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
                font-size: clamp(15px, 1.04166vw, 20px);
                font-weight: 500;
                line-height: 24.38px;
                text-align: center;
                color: #000000;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: clamp(8px, 0.520833vw, 10px);
                direction: ltr;
            }
        }

        form {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0;
            margin: 0;
            gap: clamp(30px, 2.083vw, 40px);

            .input-container {
                width: 100%;
                display: flex;
                flex-direction: column;

                .inputs {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    direction: ltr;

                    .input {
                        width: clamp(40px, 3.125vw, 60px);
                        border: none;
                        background: #D9D9D9;
                        margin: 0 clamp(4px, 0.364583vw, 7px);
                        cursor: not-allowed;
                        pointer-events: none;
                        border-radius: 12px;
                        font-family: Alexandria;
                        font-size: clamp(15px, 1.0416vw, 20px);
                        font-weight: 500;
                        line-height: 24.38px;
                        text-align: center;
                        padding: clamp(10px, 0.9375vw, 18px) 0;
                    }

                    .input:focus {
                        outline: none;
                    }

                    .input:nth-child(1) {
                        cursor: pointer;
                        pointer-events: all;
                    }

                    .input.err {
                        background: #FF12121A;
                        border: 1px solid #FF1212;
                    }
                }

                .err-message {
                    font-family: Alexandria;
                    font-size: clamp(8px, 0.572916vw, 11px);
                    font-weight: 600;
                    line-height: 13.41px;
                    margin-top: clamp(10px, 1.0416vw, 20px);
                    width: 100%;
                    text-align: center;
                    color: #CE0000;
                }

            }

            .popup-aleart {
                display: flex;
                width: 100%;
                align-items: center;
                justify-content: center;
                gap: clamp(10px, 1.0416vw, 20px);

                span {
                    font-family: Alexandria;
                    font-size: clamp(15px, 1.0416vw, 20px);
                    font-weight: 500;
                    line-height: 13.41px;
                    text-align: center;
                }

                .counter {
                    color: #000;
                }

                span:nth-child(2) {
                    color: #FD9636;
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

                button:disabled {
                    background-color: #ff121215;
                }
            }

        }
    }
</style>

@section('popup-content')
    <div class="popup-layout show" id="popupLayout">

        <div class="popup-container">
        <div class="close-btn" onclick="closePopup()">
            <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3"
                    d="M23.65 0H9.68333C4.33538 0 0 4.33538 0 9.68333V23.65C0 28.998 4.33538 33.3333 9.68333 33.3333H23.65C28.998 33.3333 33.3333 28.998 33.3333 23.65V9.68333C33.3333 4.33538 28.998 0 23.65 0Z"
                    fill="#6D6D6D" />
                <path
                    d="M19.0166 16.6668L23.7332 11.9502C23.9077 11.8007 24.0494 11.6169 24.1494 11.4101C24.2495 11.2033 24.3057 10.9781 24.3146 10.7486C24.3234 10.519 24.2847 10.2902 24.201 10.0763C24.1172 9.8624 23.9901 9.66816 23.8276 9.50573C23.6652 9.34331 23.471 9.21621 23.2571 9.13242C23.0432 9.04863 22.8143 9.00995 22.5848 9.01882C22.3553 9.02769 22.13 9.0839 21.9233 9.18394C21.7165 9.28398 21.5326 9.42568 21.3832 9.60015L16.6666 14.3168L11.9499 9.60015C11.6311 9.32711 11.2209 9.18443 10.8015 9.20063C10.382 9.21683 9.98411 9.39072 9.68728 9.68755C9.39046 9.98437 9.21657 10.3823 9.20037 10.8017C9.18417 11.2212 9.32685 11.6313 9.59989 11.9502L14.3166 16.6668L9.59989 21.3835C9.28947 21.6958 9.11523 22.1182 9.11523 22.5585C9.11523 22.9988 9.28947 23.4212 9.59989 23.7335C9.91216 24.0439 10.3346 24.2181 10.7749 24.2181C11.2152 24.2181 11.6376 24.0439 11.9499 23.7335L16.6666 19.0168L21.3832 23.7335C21.6955 24.0439 22.1179 24.2181 22.5582 24.2181C22.9985 24.2181 23.4209 24.0439 23.7332 23.7335C24.0436 23.4212 24.2179 22.9988 24.2179 22.5585C24.2179 22.1182 24.0436 21.6958 23.7332 21.3835L19.0166 16.6668Z"
                    fill="#6D6D6D" />
            </svg>
        </div>
        <h2 class="popup-title">قم بتأكيد رقم هاتفك</h2>
        <div class="popup-info">
            <h3>لقد تم إرسال رمز مكون من 6 أرقام إلى</h3>
            <span>
                <img src="{{url('/storage/assets/popups/eg-flag.png')}}" alt="eg-flag" />
                +20 101 826 0856
            </span>
        </div>
        <form>
            @php
            $err = false
            @endphp
            <div class="input-container">
                <div id="otpInputs" class="inputs">
                    <input class="input {{ $err ? 'err' : '' }}" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input {{ $err ? 'err' : '' }}" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input {{ $err ? 'err' : '' }}" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input {{ $err ? 'err' : '' }}" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input {{ $err ? 'err' : '' }}" type="text" inputmode="numeric" maxlength="1" />
                    <input class="input {{ $err ? 'err' : '' }}" type="text" inputmode="numeric" maxlength="1" />
                </div>
                @if ($err)
                <span class="err-message">كلمة المرور غير صالحة أو غير صحيحة. حاول مرة أخرى!</span>
                @endif
            </div>
            <span class="popup-aleart">
                <span class="counter" id="countdown">01:00</span>
                <span> إعادة إرسال OTP</span>
            </span>
            <div class="popup-btn">
                <button disabled type="submit" id="submitButton">اكمل مشترياتك</button>
            </div>
        </form>
    </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll("#otpInputs .input");
    const submitButton = document.getElementById("submitButton");
    const inputsContainer = document.getElementById("otpInputs");

    function checkInputs() {
        const allFilled = Array.from(inputs).every(input => input.value.length > 0);
        submitButton.disabled = !allFilled;
    }

    function focusFirstEmptyInput() {
        let focused = false;

        for (const input of inputs) {
            if (input.value === "") {
                input.focus();
                focused = true;
                break;
            }
        }
        
        if (!focused) {
            inputs[inputs.length - 1].focus(); 
        }
    }


    inputs.forEach((input, index) => {
        input.addEventListener("input", function (e) {
            let val = e.target.value;

            if (isNaN(val) || val === "") {
                e.target.value = "";
                return;
            }

            if (val.length > 1) {
                e.target.value = val.slice(0, 1);
            }

            const nextInput = input.nextElementSibling;
            if (nextInput && nextInput.tagName === "INPUT") {
                nextInput.focus();
            }

            checkInputs(); 
        });

        input.addEventListener("keyup", function (e) {
            const key = e.key.toLowerCase();
            if ((key === "backspace" || key === "delete") && e.target.value === "") {
                const prevInput = inputs[index - 1];
                if (prevInput) {
                    prevInput.focus(); 
                }
            }
            checkInputs();
        });
    });

    inputsContainer.addEventListener("click", function () {
        focusFirstEmptyInput();
    });
});

    // time countdown
    function startCountdown(duration, display) {
        let timer = duration, minutes, seconds;

        const interval = setInterval(function () {
            minutes = Math.floor(timer / 60);
            seconds = timer % 60;

            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                clearInterval(interval);
                display.textContent = "00:00"; 
            }
        }, 1000);
    }

    // Start the countdown when DOM content is loaded
    document.addEventListener("DOMContentLoaded", function () {
        const oneMinute = 60; 
        const countdownSpan = document.getElementById('countdown');
        startCountdown(oneMinute, countdownSpan);
    });

    // close Popup
    const closePopup = ()=>{
        const item = document.getElementById('popupLayout')
        item.classList.remove('show');
    }


</script>