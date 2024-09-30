@extends('web.component.popups.popupLayout')

<style>
    .popup-contaier {
        width: calc(100% / 1.619);
        height: 97.3vh;
        max-width: 1186px;
        max-height: 831px;
        background-color: #FFFFFF;
        margin: 0 auto;
        padding: 22px 0;
        border-radius: 30px;
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
            height: 100%;
            max-height: 100%;
            overflow-y: auto;
            width: calc(100% / 2.518);
            display: flex;
            align-items: flex-start;
            justify-content: start;
            flex-direction: column;
            box-shadow: 0px 4px 35px 0px #00000014;
            border-radius: 40px;
            padding: clamp(10px, 1.97916vw, 38px);
            box-sizing: border-box;
            scrollbar-width: none;
            -ms-overflow-style: none;

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
                gap: 17px;

                .btn-google,
                .btn-facebook {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #E9F1FF;
                    padding: 11px 0;
                    border-radius: 9px;
                    color: #4285F4;
                    gap: clamp(6px, .52083vw, 10px);

                    svg{
                        width: 24px;
                        height: 24px;
                    }
                }

                .btn-google {
                    width: calc(100% / 1.519);
                    font-family: Poppins;
                    font-size: clamp(10px, .833vw, 16px);
                    font-weight: 400;
                    line-height: 24px;
                }

                .btn-facebook {
                    width: calc(100% / 3.376);
                    font-family: Poppins;
                    font-size: clamp(8px, .625vw, 12px);
                    font-weight: 400;
                    line-height: 18px;
                }
            }

            form {
                margin-top: 5px;
                display: flex;
                align-items: flex-start;
                justify-content: flex-start;
                flex-direction: column;
                width: 100%;

                .input-section {
                    margin-top: 12px;
                    display: flex;
                    align-items: flex-start;
                    justify-content: flex-start;
                    flex-direction: column;
                    width: 100%;
                    gap: 7px;

                    label {
                        font-family: Poppins;
                        font-size: clamp(10px, .833vw, 16px);
                        font-weight: 400;
                        line-height: 24px;
                        color: #000;
                    }

                    input {
                        border: 1px solid #FD9636;
                        color: #808080;
                        font-family: Poppins;
                        font-size: clamp(10px, .729vw, 14px);
                        font-weight: 300;
                        line-height: 21px;
                        padding: 12px 15px;
                        width: 100%;
                        border-radius: 9px
                    }
                }

                .login-btn {
                    margin-top: clamp(15px, 1.5625vw, 30px);
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
                box-shadow: none;
            }
        }
    }

    @media(max-width: 600px) {
        .popup-contaier {
            width: 90%;
            max-height: 750px;

            .popup-form{
                max-height: 700px;
                padding: 0 19px;

            }

        }
    }
</style>

@section('popup-content')
<div class="popup-contaier">
    <div class="bg-img">
        <img src="{{url('')}}/storage/assets/popups/login-popup-bg.png" alt="bg">
    </div>
    <div class="popup-form">
        <div class="formm-welcome">
            <h2>
                <span>Welcome to</span>
                <span>Furniture hub</span>
            </h2>
        </div>
        <h2 class="form-title">Sign Up</h2>
        <div class="form-buttons">
            <div class="btn-google">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                <span>Sign in with Google</span>
            </div>
            <div class="btn-facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" viewBox="0 0 27 26" fill="none">
                    <ellipse cx="13.6133" cy="12.1055" rx="11.0957" ry="11.1294"
                        fill="url(#paint0_linear_3192_66888)" />
                    <path
                        d="M17.7449 16.527L18.2378 13.3857H15.1544V11.3482C15.1544 10.4886 15.5843 9.65021 16.9654 9.65021H18.3681V6.97592C18.3681 6.97592 17.0956 6.76367 15.8797 6.76367C13.3392 6.76367 11.6802 8.26848 11.6802 10.9916V13.3857H8.85742V16.527H11.6802V24.1211C12.2469 24.2082 12.8267 24.2527 13.4173 24.2527C14.0079 24.2527 14.5877 24.2082 15.1544 24.1211V16.527H17.7449Z"
                        fill="#F7F7F7" />
                    <defs>
                        <linearGradient id="paint0_linear_3192_66888" x1="13.6133" y1="0.976074" x2="13.6133"
                            y2="23.1688" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#18ACFE" />
                            <stop offset="1" stop-color="#0163E0" />
                        </linearGradient>
                    </defs>
                </svg>
                <span>Facebook</span>
            </div>
        </div>
        <form>
            <div class="input-section">
                <label for="name">Full name</label>
                <input type="text" name="name" placeholder="Full name" />
            </div>
            <div class="input-section">
                <label for="Phone">Phone</label>
                <input type="Phone" name="Phone" placeholder="Phone" />
            </div>
            <div class="input-section">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="E-mail" />
            </div>
            <div class="input-section">
                <label for="password">password</label>
                <input type="password" name="password" placeholder="password" />
            </div>
            <div class="input-section">
                <label for="Confirm password">Confirm password</label>
                <input type="password" name="Confirm password" placeholder="Confirm password" />
            </div>
            <div class="login-btn">
                <button type="submit">Sign Up</button>
            </div>

        </form>
    </div>
</div>
@endsection