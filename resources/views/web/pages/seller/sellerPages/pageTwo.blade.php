<div id="pageTwo" class="page-details" style="display: none">
    <div class="page-heade">
        <h2>{{__('web.seller_register')}}</h2>
        <span>{{__('web.welcome_to_our_family')}}</span>
    </div>
    <div class="page-steps">
        <div class="step active">1</div>
        <div class="steps-border passed"></div>
        <div class="step active">2</div>
        <div class="steps-border active"></div>
        <div class="step">3</div>
    </div>
    <div class="page-from">
        <div class="form">
            <div class="pageFormInput">
                <label>{{__('web.specialization')}} * </label>
                <div class="inputContainer">
                    <div class="inputIconContainer">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
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
                    <select id="specializationSelect" type="text" placeholder="{{__('web.specialization')}}">
                        <option>{{__('web.select_your_specialization')}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        <option value="other">{{__('web.other_specializations')}}</option>
                    </select>

                </div>
            </div>
            <div class="pageFormInput">
                <label>{{__('web.brand_name')}}  * </label>
                <div class="inputContainer">
                    <div class="inputIconContainer">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
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
                    <input type="text" placeholder="{{__('web.brand_name')}} " />
                </div>
            </div>
            <div id="otherSpecializationDiv" class="pageFormInput" style="display: none;">
                <div class="inputContainer">
                    <textarea type="text" placeholder="{{__('web.other_specializations')}}" style="height: 108px;width: 100%;"></textarea>
                </div>
            </div>
        </div>
        <div class="product-images">
            <div class="product-images-head">
                <span>{{__('web.products_images')}} * :</span>
                <span class="red">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_3259_78215)">
                                    <path
                                            d="M8.00017 15.1654C6.58273 15.1654 5.19713 14.7451 4.01858 13.9576C2.84003 13.1701 1.92146 12.0508 1.37903 10.7413C0.836601 9.43173 0.694677 7.99075 0.971205 6.60055C1.24773 5.21036 1.93029 3.93338 2.93257 2.9311C3.93484 1.92883 5.21182 1.24627 6.60202 0.96974C7.99222 0.693213 9.43319 0.835136 10.7427 1.37756C12.0523 1.91999 13.1715 2.83856 13.959 4.01711C14.7465 5.19567 15.1668 6.58127 15.1668 7.9987C15.1651 9.89888 14.4094 11.7207 13.0658 13.0644C11.7222 14.408 9.90034 15.1636 8.00017 15.1654ZM8.00017 1.83203C6.78051 1.83203 5.58825 2.1937 4.57415 2.8713C3.56005 3.54891 2.76965 4.51201 2.30291 5.63882C1.83617 6.76563 1.71405 8.00554 1.95199 9.20176C2.18993 10.398 2.77725 11.4968 3.63967 12.3592C4.5021 13.2216 5.60089 13.8089 6.79711 14.0469C7.99332 14.2848 9.23324 14.1627 10.36 13.696C11.4869 13.2292 12.45 12.4388 13.1276 11.4247C13.8052 10.4106 14.1668 9.21835 14.1668 7.9987C14.1651 6.36374 13.5148 4.79625 12.3587 3.64016C11.2026 2.48407 9.63513 1.8338 8.00017 1.83203Z"
                                            fill="#FF1212" />
                                    <path
                                            d="M8.00016 7.06445C8.17697 7.06445 8.34654 7.13469 8.47157 7.25971C8.59659 7.38474 8.66683 7.55431 8.66683 7.73112V10.8378C8.66683 11.0146 8.59659 11.1842 8.47157 11.3092C8.34654 11.4342 8.17697 11.5045 8.00016 11.5045C7.82335 11.5045 7.65378 11.4342 7.52876 11.3092C7.40373 11.1842 7.3335 11.0146 7.3335 10.8378V7.73112C7.3335 7.55431 7.40373 7.38474 7.52876 7.25971C7.65378 7.13469 7.82335 7.06445 8.00016 7.06445Z"
                                            fill="#FF1212" />
                                    <path
                                            d="M8.00008 6.15885C8.46032 6.15885 8.83341 5.78576 8.83341 5.32552C8.83341 4.86528 8.46032 4.49219 8.00008 4.49219C7.53984 4.49219 7.16675 4.86528 7.16675 5.32552C7.16675 5.78576 7.53984 6.15885 8.00008 6.15885Z"
                                            fill="#FF1212" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3259_78215">
                                        <rect width="16" height="16" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            {{__('web.add_a_sample_of_your_work')}}
                        </span>
            </div>
            <div id="productImagesInputs" class="product-images-inputs">
                <div onclick="clickInput()" class="imgInput">
                    <input style="display: none"  onchange="uploadeImg(event)" type="file" id="file" name="images[]" />
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                              d="M9 11H5C4.73478 11 4.48043 10.8946 4.29289 10.7071C4.10536 10.5196 4 10.2652 4 10C4 9.73478 4.10536 9.48043 4.29289 9.29289C4.48043 9.10536 4.73478 9 5 9H9V11ZM15 9H11V11H15C15.2652 11 15.5196 10.8946 15.7071 10.7071C15.8946 10.5196 16 10.2652 16 10C16 9.73478 15.8946 9.48043 15.7071 9.29289C15.5196 9.10536 15.2652 9 15 9Z"
                              fill="#707070" />
                        <path opacity="0.3"
                              d="M14.19 0H5.81C2.60123 0 0 2.60123 0 5.81V14.19C0 17.3988 2.60123 20 5.81 20H14.19C17.3988 20 20 17.3988 20 14.19V5.81C20 2.60123 17.3988 0 14.19 0Z"
                              fill="#707070" />
                        <path
                                d="M15 9H11V5C11 4.73478 10.8946 4.48043 10.7071 4.29289C10.5196 4.10536 10.2652 4 10 4C9.73478 4 9.48043 4.10536 9.29289 4.29289C9.10536 4.48043 9 4.73478 9 5V9H5C4.73478 9 4.48043 9.10536 4.29289 9.29289C4.10536 9.48043 4 9.73478 4 10C4 10.2652 4.10536 10.5196 4.29289 10.7071C4.48043 10.8946 4.73478 11 5 11H9V15C9 15.2652 9.10536 15.5196 9.29289 15.7071C9.48043 15.8946 9.73478 16 10 16C10.2652 16 10.5196 15.8946 10.7071 15.7071C10.8946 15.5196 11 15.2652 11 15V11H15C15.2652 11 15.5196 10.8946 15.7071 10.7071C15.8946 10.5196 16 10.2652 16 10C16 9.73478 15.8946 9.48043 15.7071 9.29289C15.5196 9.10536 15.2652 9 15 9Z"
                                fill="#707070" />
                    </svg>
                    <span>Add File</span>
                </div>
            </div>
        </div>
    </div>
    <div class="page-btn">
        <button id="nextTwoButton" type="submit">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M18.5228 8.49339L2.57045 0.88492C2.26775 0.739757 1.92918 0.686351 1.59649 0.731287C1.2638 0.776224 0.951531 0.917537 0.698185 1.13781C0.444839 1.35807 0.261491 1.64767 0.170745 1.97088C0.0800003 2.29409 0.0858253 2.6368 0.187501 2.95674L1.87749 8.43682C1.96122 8.70032 2.12441 8.93148 2.34468 9.09858C2.56496 9.26569 2.83153 9.36056 3.10785 9.3702L11.1052 9.63183C11.1982 9.61934 11.2926 9.62538 11.3832 9.6496C11.4738 9.67382 11.5586 9.71573 11.6329 9.77293C11.7072 9.83012 11.7694 9.90146 11.816 9.98283C11.8626 10.0642 11.8926 10.154 11.9043 10.247C11.9242 10.4338 11.8714 10.621 11.7568 10.7698C11.6422 10.9186 11.4747 11.0176 11.2891 11.046C11.2087 11.0518 11.1278 11.047 11.0487 11.0319L3.10078 10.7915C2.80614 10.7826 2.5167 10.8705 2.27665 11.0415C2.03661 11.2126 1.85917 11.4576 1.77142 11.739L0.180431 16.9504C0.0429835 17.3836 0.0825968 17.8536 0.290613 18.2577C0.49863 18.6618 0.858138 18.9672 1.29059 19.1071C1.70187 19.2317 2.14453 19.2015 2.5351 19.0222L18.5157 11.5976C18.9263 11.4078 19.2455 11.0639 19.4043 10.6403C19.5631 10.2168 19.5487 9.74782 19.3642 9.33485C19.1914 8.96418 18.8934 8.66626 18.5228 8.49339Z"
                        fill="white" />
            </svg>
            <span>{{__('web.next')}}</span>
        </button>

        <button class="backButton" id="backTwoButton" type="submit" style="background-color: grey">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                <path
                        d="M18.5228 8.49339L2.57045 0.88492C2.26775 0.739757 1.92918 0.686351 1.59649 0.731287C1.2638 0.776224 0.951531 0.917537 0.698185 1.13781C0.444839 1.35807 0.261491 1.64767 0.170745 1.97088C0.0800003 2.29409 0.0858253 2.6368 0.187501 2.95674L1.87749 8.43682C1.96122 8.70032 2.12441 8.93148 2.34468 9.09858C2.56496 9.26569 2.83153 9.36056 3.10785 9.3702L11.1052 9.63183C11.1982 9.61934 11.2926 9.62538 11.3832 9.6496C11.4738 9.67382 11.5586 9.71573 11.6329 9.77293C11.7072 9.83012 11.7694 9.90146 11.816 9.98283C11.8626 10.0642 11.8926 10.154 11.9043 10.247C11.9242 10.4338 11.8714 10.621 11.7568 10.7698C11.6422 10.9186 11.4747 11.0176 11.2891 11.046C11.2087 11.0518 11.1278 11.047 11.0487 11.0319L3.10078 10.7915C2.80614 10.7826 2.5167 10.8705 2.27665 11.0415C2.03661 11.2126 1.85917 11.4576 1.77142 11.739L0.180431 16.9504C0.0429835 17.3836 0.0825968 17.8536 0.290613 18.2577C0.49863 18.6618 0.858138 18.9672 1.29059 19.1071C1.70187 19.2317 2.14453 19.2015 2.5351 19.0222L18.5157 11.5976C18.9263 11.4078 19.2455 11.0639 19.4043 10.6403C19.5631 10.2168 19.5487 9.74782 19.3642 9.33485C19.1914 8.96418 18.8934 8.66626 18.5228 8.49339Z"
                        fill="white" />
            </svg>

            <span>{{__('web.back')}}</span>
        </button>
    </div>
</div>