<style>
    .loginModal {
        .modal-dialog {
            max-width: 100% !important;

            .modal-content {
                width: calc(100% / 1.619);
                max-width: 100%;
                margin-top: 100px;
                background: none;
                margin-left: auto;
                margin-right: auto;
                z-index: 99999;
                align-items: center;
                justify-content: center;
                border: none;



                .popup-contaier {
                    width: 100%;
                    max-width: 1186px;
                    background-color: #FFFFFF;
                    margin: 0 auto;
                    padding: 22px 0;
                    border-radius: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 20px;
                    overflow: hidden;



                    .bg-img {
                        border-radius: 40px;
                        overflow: hidden;
                        width: calc(100% / 1.824);
                        height: 100%;

                        img {
                            width: 100%;
                            height: 100%;
                        }
                    }

                    .popup-form {
                        width: calc(100% / 2.518);
                        display: flex;
                        align-items: flex-start;
                        justify-content: start;
                        flex-direction: column;
                        box-shadow: 0px 4px 35px 0px #00000014;
                        border-radius: 40px;
                        padding: 38px;
                        height: 100%;
                        max-height: 100%;
                        overflow-y: auto;
                        box-sizing: border-box;
                        scrollbar-width: none;
                        -ms-overflow-style: none;
                        position: relative;

                        .closeModal {
                            position: absolute;
                            background: #6e6e6e70;
                            width: clamp(24px, 1.7187500000000002vw, 33px);
                            height: clamp(24px, 1.7187500000000002vw, 33px);
                            border-radius: 8px;
                            top: 20px;
                            inset-inline-end: 20px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            border: none;
                            outline: none;
                        }

                        .formm-welcome {
                            width: 100%;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;

                            h2 {
                                font-family: Poppins;
                                font-size: clamp(16px, 1.09375vw, 21px);
                                font-weight: 400;
                                line-height: 31.5px;
                                color: #000000;

                                span:nth-child(2) {
                                    color: #FD9636;
                                }
                            }
                        }

                        .form-title {
                            font-family: Poppins;
                            font-size: clamp(40px, 2.8645vw, 55px);
                            font-weight: 500;
                            line-height: 82.5px;
                            text-align: start;
                            color: #000;
                        }

                        .form-buttons {
                            display: flex;
                            width: 100%;
                            justify-content: space-between;
                            align-items: center;

                            .or {
                                font-family: Poppins;
                                font-size: 12px;
                                font-weight: 400;
                                line-height: 18px;
                                color: #FD9636;
                            }

                            .btn-google,
                            .btn-facebook {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                padding: 11px 0;
                                border-radius: 9px;
                                color: #4285F4;
                                gap: 10px;
                                width: calc(50% - 17px);
                                font-family: Poppins;
                                font-size: clamp(12px, 0.7291666666666666vw, 14px);
                                font-weight: 400;
                                line-height: clamp(18px, 1.09375vw, 21px);

                            }

                            .btn-google {
                                color: #34A853;
                                border: 1px solid #34A853;
                                background-color: #fff;
                            }

                            .btn-facebook {
                                color: #4285F4;
                                background-color: #E9F1FF;
                                border: 1px solid #097BEA;

                            }
                        }

                        form {
                            margin-top: clamp(10px, .625vw, 12px);
                            display: flex;
                            align-items: flex-start;
                            justify-content: flex-start;
                            flex-direction: column;
                            width: 100%;

                            .input-section {
                                margin-top: clamp(15px, 1.718vw, 33px);
                                display: flex;
                                align-items: flex-start;
                                justify-content: flex-start;
                                flex-direction: column;
                                width: 100%;
                                gap: 8px;

                                label {
                                    font-family: Poppins;
                                    font-size: clamp(10px, .833vw, 16px);
                                    font-weight: 400;
                                    line-height: 24px;
                                    color: #000;
                                }

                                .inputSec {
                                    width: 100%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    border: 1px solid #FD9636;
                                    padding: 16px 21px;
                                    border-radius: 9px;


                                    input {
                                        color: #808080;
                                        font-family: Poppins;
                                        font-size: clamp(10px, .729vw, 14px);
                                        font-weight: 300;
                                        line-height: 21px;
                                        width: 100%;
                                        border: none;
                                        outline: none;
                                    }
                                }
                            }

                            .Forgot-password {
                                width: 100%;
                                text-align: end;
                                margin-top: 10px;
                                font-family: Poppins;
                                font-size: clamp(10px, .677vw, 13px);
                                font-weight: 400;
                                line-height: 19.5px;

                                a {
                                    color: #FD9636;
                                }
                            }

                            .login-btn {
                                margin-top: clamp(30px, 1.875vw, 36px);
                                width: 100%;

                                button {
                                    width: 100%;
                                    border-radius: 10px;
                                    font-family: Poppins;
                                    font-size: clamp(10px, .833vw, 16px);
                                    font-weight: 500;
                                    line-height: 24px;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    border: none;
                                    outline: none;
                                    background-color: #FD9636;
                                    box-shadow: 0px 4px 19px 0px #7793414D;
                                    color: #fff;
                                    padding: clamp(8px, .625vw, 12px);
                                }
                            }

                            .no-account {
                                width: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-family: Poppins;
                                font-size: clamp(9px, .677vw, 13px);
                                font-weight: 400;
                                line-height: 19.5px;
                                margin-top: clamp(12px, 1.5625vw, 30px);

                                span {
                                    color: #8D8D8D;
                                }

                                a {
                                    color: #FD9636;
                                }
                            }
                        }
                    }

                    .popup-form::-webkit-scrollbar {
                        display: none;
                    }

                    @media(max-width: 991px) {
                        .bg-img {
                            display: none;
                        }

                        .popup-form {
                            width: 100%;
                            padding: 22px 26px;
                            margin: 0 10px;
                            background: #FFFFFFE5;

                            .inputSec {
                                background: #fff !important;
                            }
                        }
                    }
                }

                @media(max-width: 991px) {
                    .popup-contaier {
                        background-image: url("{{url('')}}/storage/modalBg.png");
                        background-position: right;
                        padding: 10px 0;
                    }
                }
            }
        }

        @media(max-width: 600px) {
            .modal-dialog {
                .modal-content {
                    width: 90% !important;

                }
            }
        }
    }

    body.dark {
        .loginModal {
            .modal-dialog {

                .modal-content {
                    .popup-contaier {
                        width: 100%;
                        max-width: 1186px;
                        background-color: var(--dark-mode-second);

                        .popup-form {
                            background: var(--dark-mode-second);

                            .formm-welcome {
                                h2 {
                                    color: #fff;
                                }
                            }

                            .form-title {
                                color: #fff;
                            }

                            .form-buttons {

                                .btn-google,
                                .btn-facebook {
                                    background-color: transparent;
                                }
                            }

                            form {
                                .input-section {

                                    label {
                                        color: #fff;
                                    }

                                    .inputSec {
                                        background: transparent;

                                        input {
                                            color: #fff;
                                            background: transparent;
                                            ;
                                        }
                                    }
                                }

                                .no-account {
                                    span {
                                        color: #fff;
                                    }

                                }
                            }
                        }

                        @media(max-width: 991px) {

                            .popup-form {
                                width: 100%;
                                padding: 22px 26px;
                                margin: 0 10px;
                                background: var(--dark-mode-second);

                                .inputSec {
                                    background: var(--dark-mode-second) !important;
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
{{-- <button data-toggle="modal" data-target="#loginModal">open modal</button> --}}
<div class="modal loginModal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="popup-contaier">
                <div class="bg-img">
                    <img src="{{url('')}}/storage/assets/popups/login-popup-bg.png" alt="bg">
                </div>
                <div class="popup-form">
                    <button type="button" class="closeModal" data-bs-dismiss="modal" aria-label="Close">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M23.65 0H9.68333C4.33538 0 0 4.33538 0 9.68333V23.65C0 28.998 4.33538 33.3333 9.68333 33.3333H23.65C28.998 33.3333 33.3333 28.998 33.3333 23.65V9.68333C33.3333 4.33538 28.998 0 23.65 0Z"
                                fill="#6D6D6D" />
                            <path
                                d="M19.0185 16.6668L23.7352 11.9502C23.9096 11.8007 24.0513 11.6169 24.1514 11.4101C24.2514 11.2033 24.3076 10.9781 24.3165 10.7486C24.3254 10.519 24.2867 10.2902 24.2029 10.0763C24.1191 9.8624 23.992 9.66816 23.8296 9.50573C23.6672 9.34331 23.4729 9.21621 23.259 9.13242C23.0452 9.04863 22.8163 9.00995 22.5868 9.01882C22.3572 9.02769 22.132 9.0839 21.9252 9.18394C21.7185 9.28398 21.5346 9.42568 21.3852 9.60015L16.6685 14.3168L11.9518 9.60015C11.633 9.32711 11.2229 9.18443 10.8034 9.20063C10.384 9.21683 9.98606 9.39072 9.68924 9.68755C9.39241 9.98437 9.21852 10.3823 9.20232 10.8017C9.18612 11.2212 9.3288 11.6313 9.60184 11.9502L14.3185 16.6668L9.60184 21.3835C9.29142 21.6958 9.11719 22.1182 9.11719 22.5585C9.11719 22.9988 9.29142 23.4212 9.60184 23.7335C9.91411 24.0439 10.3365 24.2181 10.7768 24.2181C11.2172 24.2181 11.6396 24.0439 11.9518 23.7335L16.6685 19.0168L21.3852 23.7335C21.6974 24.0439 22.1199 24.2181 22.5602 24.2181C23.0005 24.2181 23.4229 24.0439 23.7352 23.7335C24.0456 23.4212 24.2198 22.9988 24.2198 22.5585C24.2198 22.1182 24.0456 21.6958 23.7352 21.3835L19.0185 16.6668Z"
                                fill="#6D6D6D" />
                        </svg>
                    </button>

                    <div class="formm-welcome">
                        <h2>
                            <span>{{__('web.welcome_to')}}</span>
                            <span>{{__('web.furniture_hub')}}</span>
                        </h2>
                    </div>
                    <h2 class="form-title">{{__('web.sign_in')}}</h2>
                    <div class="form-buttons">
                        <a class="btn-google" href="{{route('social.login','google')}}">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.7546 12.3446C21.7546 11.5242 21.6869 10.9255 21.5404 10.3047H12.0098V14.0076H17.604C17.4913 14.9278 16.8822 16.3137 15.5287 17.2449L15.5098 17.3689L18.5231 19.6636L18.7319 19.6841C20.6493 17.9434 21.7546 15.3824 21.7546 12.3446Z"
                                    fill="#4285F4" />
                                <path
                                    d="M12.0096 22.1014C14.7503 22.1014 17.0511 21.2144 18.7317 19.6845L15.5285 17.2453C14.6713 17.8329 13.5209 18.2431 12.0096 18.2431C9.32523 18.2431 7.04694 16.5025 6.23479 14.0967L6.11575 14.1066L2.98238 16.4903L2.94141 16.6023C4.61065 19.8618 8.0394 22.1014 12.0096 22.1014Z"
                                    fill="#34A853" />
                                <path
                                    d="M6.2355 14.0968C6.02121 13.4759 5.89719 12.8107 5.89719 12.1233C5.89719 11.4359 6.02121 10.7707 6.22423 10.1499L6.21855 10.0176L3.04592 7.5957L2.94211 7.64424C2.25414 8.99684 1.85938 10.5158 1.85938 12.1233C1.85938 13.7309 2.25414 15.2497 2.94211 16.6023L6.2355 14.0968Z"
                                    fill="#FBBC05" />
                                <path
                                    d="M12.0096 6.00318C13.9157 6.00318 15.2015 6.81251 15.9346 7.48885L18.7994 4.73932C17.04 3.13174 14.7503 2.14502 12.0096 2.14502C8.03943 2.14502 4.61066 4.38452 2.94141 7.644L6.22353 10.1496C7.04696 7.74382 9.32527 6.00318 12.0096 6.00318Z"
                                    fill="#EB4335" />
                            </svg>
                            <span>{{__('web.google')}}</span>
                        </a>
                        <span class="or">or</span>
                        <a class="btn-facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26"
                                fill="none">
                                <ellipse cx="13.6133" cy="12.1055" rx="11.0957" ry="11.1294"
                                    fill="url(#paint0_linear_3192_66888)" />
                                <path
                                    d="M17.7449 16.527L18.2378 13.3857H15.1544V11.3482C15.1544 10.4886 15.5843 9.65021 16.9654 9.65021H18.3681V6.97592C18.3681 6.97592 17.0956 6.76367 15.8797 6.76367C13.3392 6.76367 11.6802 8.26848 11.6802 10.9916V13.3857H8.85742V16.527H11.6802V24.1211C12.2469 24.2082 12.8267 24.2527 13.4173 24.2527C14.0079 24.2527 14.5877 24.2082 15.1544 24.1211V16.527H17.7449Z"
                                    fill="#F7F7F7" />
                                <defs>
                                    <linearGradient id="paint0_linear_3192_66888" x1="13.6133" y1="0.976074"
                                        x2="13.6133" y2="23.1688" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#18ACFE" />
                                        <stop offset="1" stop-color="#0163E0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            <span>{{__('web.facebook')}}</span>
                        </a>
                    </div>
                    <form action="{{ route('web.login') }}" method="post" onsubmit="formActionAuth(this)">
                        @CSRF
                        <div class="input-section">
                            <label for="email">{{__('web.enter_your_email_address')}}</label>
                            <div class="inputSec">
                                <input type="email" name="email" placeholder="{{__('web.email_address')}}" />
                            </div>
                        </div>
                        <div class="input-section">
                            <label for="password">{{__('web.enter_your_password')}}</label>
                            <div class="inputSec">
                                <input type="password" id="passwordInput" name="password"
                                    placeholder="{{__('web.password')}}" />
                                <svg id="showPasswordInput" onclick="showPassword()" width="22" height="20"
                                    viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 13.5995C10.288 13.5995 9.59196 13.3883 8.99995 12.9927C8.40793 12.5972 7.94651 12.0349 7.67403 11.3771C7.40156 10.7193 7.33027 9.99546 7.46917 9.29713C7.60808 8.5988 7.95095 7.95734 8.45442 7.45387C8.95788 6.9504 9.59934 6.60753 10.2977 6.46863C10.996 6.32972 11.7198 6.40101 12.3777 6.67349C13.0355 6.94596 13.5977 7.40738 13.9933 7.9994C14.3889 8.59142 14.6 9.28744 14.6 9.99945C14.5974 10.9534 14.2172 11.8676 13.5427 12.5421C12.8681 13.2167 11.954 13.5968 11 13.5995ZM11 7.89945C10.5847 7.89945 10.1786 8.02262 9.8333 8.25337C9.48796 8.48412 9.2188 8.81209 9.05985 9.19582C8.90091 9.57954 8.85932 10.0018 8.94035 10.4091C9.02138 10.8165 9.22139 11.1907 9.51508 11.4844C9.80877 11.7781 10.183 11.9781 10.5903 12.0591C10.9977 12.1401 11.4199 12.0985 11.8036 11.9396C12.1874 11.7807 12.5153 11.5115 12.7461 11.1662C12.9768 10.8208 13.1 10.4148 13.1 9.99945C13.1 9.4425 12.8788 8.90835 12.4849 8.51453C12.0911 8.1207 11.557 7.89945 11 7.89945ZM11 19.3095C8.29015 19.1853 5.71298 18.1005 3.73 16.2495C1.55 14.3395 0.25 11.9995 0.25 9.99945C0.25 5.55945 5.88 0.689453 11 0.689453C16.12 0.689453 21.75 5.68945 21.75 9.99945C21.75 14.5195 16.22 19.3095 11 19.3095ZM11 2.18945C6.77 2.18945 1.75 6.41945 1.75 9.99945C1.75 11.5595 2.89 13.5195 4.75 15.1195C6.45719 16.7156 8.66726 17.6668 11 17.8095C15.76 17.8095 20.25 13.4095 20.25 9.99945C20.25 6.76945 15.47 2.18945 11 2.18945Z"
                                        fill="#ADADAD" />
                                </svg>
                                <svg style="display: none" id="hidePasswordInput" onclick="hidePassword()" width="22"
                                    height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.2884 11.1319C13.2983 11.0221 13.2983 10.9116 13.2884 10.8019C13.2596 10.6045 13.3095 10.4037 13.4274 10.2429C13.5452 10.082 13.7216 9.97387 13.9184 9.94185C14.0152 9.9248 14.1144 9.92744 14.2101 9.94963C14.3058 9.97182 14.396 10.0131 14.4754 10.071C14.5547 10.1289 14.6216 10.2022 14.6719 10.2865C14.7223 10.3709 14.7551 10.4645 14.7684 10.5619C14.7833 10.7516 14.7833 10.9421 14.7684 11.1319C14.7684 11.6046 14.6753 12.0727 14.4944 12.5095C14.3135 12.9463 14.0483 13.3431 13.714 13.6774C13.3797 14.0117 12.9829 14.2769 12.5461 14.4578C12.1093 14.6387 11.6412 14.7319 11.1684 14.7319H10.7684C10.5709 14.7093 10.3904 14.6091 10.2666 14.4535C10.1428 14.2979 10.0859 14.0994 10.1084 13.9019C10.1184 13.8045 10.1476 13.71 10.1943 13.624C10.241 13.5379 10.3043 13.462 10.3806 13.4006C10.4569 13.3392 10.5446 13.2936 10.6386 13.2663C10.7327 13.2391 10.8312 13.2308 10.9284 13.2419C11.2255 13.2757 11.5263 13.2463 11.8112 13.1557C12.0961 13.0651 12.3586 12.9152 12.5815 12.7159C12.8043 12.5167 12.9825 12.2725 13.1044 11.9995C13.2262 11.7265 13.2889 11.4308 13.2884 11.1319ZM19.8784 6.30185C19.8128 6.22634 19.7329 6.1645 19.6433 6.11987C19.5538 6.07523 19.4563 6.04868 19.3565 6.04171C19.2566 6.03475 19.1564 6.04751 19.0615 6.07928C18.9667 6.11105 18.8789 6.16119 18.8034 6.22685C18.6509 6.35946 18.5574 6.54722 18.5433 6.74882C18.5363 6.84864 18.5491 6.94886 18.5809 7.04375C18.6126 7.13864 18.6628 7.22634 18.7284 7.30185C19.7207 8.36069 20.3237 9.7253 20.4384 11.1719C20.4384 14.5819 15.9484 18.9819 11.1884 18.9819C9.89527 18.9332 8.63007 18.5912 7.48844 17.9819C7.39991 17.932 7.30217 17.9006 7.20115 17.8896C7.10013 17.8787 6.99793 17.8884 6.90077 17.9181C6.8036 17.9478 6.7135 17.997 6.63591 18.0626C6.55833 18.1283 6.49489 18.209 6.44945 18.2999C6.40401 18.3907 6.37751 18.4899 6.37156 18.5914C6.36561 18.6928 6.38033 18.7944 6.41484 18.89C6.44935 18.9855 6.50292 19.0731 6.5723 19.1473C6.64167 19.2216 6.72542 19.281 6.81844 19.3219C8.17078 20.0232 9.66548 20.4062 11.1884 20.4419C16.4084 20.4419 21.9384 15.6619 21.9384 11.1319C21.8274 9.33292 21.0999 7.6272 19.8784 6.30185ZM20.8784 1.97185L2.58844 20.1419C2.45099 20.281 2.26403 20.3601 2.06844 20.3619C1.86697 20.3601 1.6738 20.2814 1.52844 20.1419C1.38737 19.9995 1.30823 19.8072 1.30823 19.6069C1.30823 19.4065 1.38737 19.2142 1.52844 19.0719L3.52844 17.0719C1.52844 15.2319 0.398438 13.0719 0.398438 11.1519C0.438437 6.69185 6.06844 1.82185 11.1884 1.82185C13.2507 1.89086 15.2498 2.5503 16.9484 3.72185L19.7884 0.901852C19.8519 0.809287 19.9354 0.73216 20.0327 0.676159C20.13 0.620158 20.2386 0.586712 20.3506 0.578287C20.4625 0.569862 20.5749 0.586674 20.6795 0.627482C20.7841 0.668289 20.8782 0.732053 20.9548 0.814069C21.0315 0.896084 21.0887 0.994261 21.1224 1.10136C21.156 1.20845 21.1652 1.32174 21.1492 1.43285C21.1333 1.54397 21.0926 1.65009 21.0301 1.74337C20.9677 1.83666 20.8851 1.91474 20.7884 1.97185H20.8784ZM4.66844 15.9719L7.99844 12.6619C7.66678 11.9919 7.55378 11.2348 7.67536 10.4973C7.79694 9.75971 8.14697 9.07893 8.67609 8.55091C9.20521 8.02289 9.88673 7.67429 10.6245 7.55425C11.3623 7.43421 12.1192 7.5488 12.7884 7.88185L15.9084 4.78185C14.4979 3.87346 12.8655 3.36855 11.1884 3.32185C6.95844 3.32185 1.93844 7.52185 1.93844 11.1319C1.93844 12.6219 2.95844 14.4419 4.62844 15.9919L4.66844 15.9719ZM9.12844 11.5219L11.5784 9.07185C11.4486 9.06201 11.3183 9.06201 11.1884 9.07185C10.6315 9.07185 10.0973 9.2931 9.70351 9.68693C9.30969 10.0808 9.08844 10.6149 9.08844 11.1719C9.08976 11.2896 9.10316 11.4069 9.12844 11.5219Z"
                                        fill="#323A3E" />
                                </svg>
                            </div>
                        </div>
                        <div class="Forgot-password">
                            <a href="#">{{__('web.forget_password')}}</a>
                        </div>
                        <div class="login-btn">
                            <button type="submit">{{__('web.sign_in')}}</button>
                        </div>
                        <div class="no-account">
                            <span>{{__('web.no_account')}}</span>
                            <a data-bs-target="#signupModal" data-bs-toggle="modal"
                                style="cursor: pointer">{{__('web.sign_up')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>