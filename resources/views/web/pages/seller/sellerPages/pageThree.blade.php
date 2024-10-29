<div id="pageThree" class="page-details" style="display: none">
    <div class="page-heade">
        <h2>{{__('web.seller_register')}}</h2>
        <span>{{__('web.welcome_to_our_family')}}</span>
    </div>
    <div class="page-steps">
        <div class="step active">1</div>
        <div class="steps-border passed"></div>
        <div class="step active">2</div>
        <div class="steps-border passed"></div>
        <div class="step active">3</div>
    </div>
    <div class="page-from">
        <div class="form">

            <div class="checkContainer">
                <span>{{__('web.where_are_you_located_in_square')}}</span>
                <div class="checkboxes">
                    <div class="checkbox">
                        <input id="online" name="question_one" value="online" checked onclick="hideBranches(event)" type="checkbox">
                        <label>{{__('web.online')}}</label>
                    </div>
                    <div class="checkbox">
                        <input id="branch" name="question_one" value="exhibition" onclick="showBranches(event)" type="checkbox">
                        <label>{{__('web.exhibition')}}</label>
                    </div>
                    <div class="checkbox">
                        <input id="both" name="question_one" value="both" onclick="showBranches(event)" type="checkbox">
                        <label>{{__('web.both')}}</label>
                    </div>
                </div>
            </div>

            <div class="checkContainer">
                <span>{{__('web.have_you_dealt_with_platforms_before')}}</span>
                <div class="checkboxes">
                    <div class="checkbox">
                        <input name="question_two" value="yes" onclick="showTextarea(event)" id="isPlatformYes" type="checkbox">
                        <label>{{__('web.yes')}}</label>
                    </div>
                    <div class="checkbox">
                        <input checked name="question_two" value="no" onclick="hideTextarea(event)" id="isPlatformNo" type="checkbox">
                        <label>{{__('web.no')}}</label>
                    </div>
                </div>
            </div>

            <div id="platformsTextArea" style="display: none" class="pageFormInput">
                <div class="textContainer">
                    <label>{{__('web.platforms_worked_on')}}</label>
                    <textarea name="platforms" type="text"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none" id="branchesInputs" class="branches">
        <div class="branchNumbers">
            <span>{{__('web.number_of_branches')}} </span>
            <div class="branchCOunter">
                <a onclick="minusOne()" class="minus">
                    <svg width="13" height="3" viewBox="0 0 13 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.35669 1.42969H11.2258" stroke="#9098B1" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </a>
                <div class="counterInput">
                    <input id="branchesNumberInput" name="number_of_branches" oninput="handelBranchesNumberInput()" min="1" max="9" value="1"
                           type="number">
                </div>
                <a onclick="plusOne()" class="plus">
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.1311 4.53906V15.0705" stroke="#FD9636" stroke-width="3" stroke-linecap="round"
                              stroke-linejoin="round" />
                        <path d="M3.86548 9.80664H14.3969" stroke="#FD9636" stroke-width="3" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="branchesLocations">
            <span>{{__('web.branch_addresses_in_detail')}} :</span>
            <div id="branchesLocations" class="loactionItems">
                <div class="locationItem">
                    <input type="text" placeholder="{{__('web.enter_branch_address')}}">
                </div>
            </div>
        </div>
    </div>

    <div class="page-btn">
        <button data-toggle="modal" data-target="#senSuccessModal" class="sendBtn" type="submit">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M18.5228 8.49339L2.57045 0.88492C2.26775 0.739757 1.92918 0.686351 1.59649 0.731287C1.2638 0.776224 0.951531 0.917537 0.698185 1.13781C0.444839 1.35807 0.261491 1.64767 0.170745 1.97088C0.0800003 2.29409 0.0858253 2.6368 0.187501 2.95674L1.87749 8.43682C1.96122 8.70032 2.12441 8.93148 2.34468 9.09858C2.56496 9.26569 2.83153 9.36056 3.10785 9.3702L11.1052 9.63183C11.1982 9.61934 11.2926 9.62538 11.3832 9.6496C11.4738 9.67382 11.5586 9.71573 11.6329 9.77293C11.7072 9.83012 11.7694 9.90146 11.816 9.98283C11.8626 10.0642 11.8926 10.154 11.9043 10.247C11.9242 10.4338 11.8714 10.621 11.7568 10.7698C11.6422 10.9186 11.4747 11.0176 11.2891 11.046C11.2087 11.0518 11.1278 11.047 11.0487 11.0319L3.10078 10.7915C2.80614 10.7826 2.5167 10.8705 2.27665 11.0415C2.03661 11.2126 1.85917 11.4576 1.77142 11.739L0.180431 16.9504C0.0429835 17.3836 0.0825968 17.8536 0.290613 18.2577C0.49863 18.6618 0.858138 18.9672 1.29059 19.1071C1.70187 19.2317 2.14453 19.2015 2.5351 19.0222L18.5157 11.5976C18.9263 11.4078 19.2455 11.0639 19.4043 10.6403C19.5631 10.2168 19.5487 9.74782 19.3642 9.33485C19.1914 8.96418 18.8934 8.66626 18.5228 8.49339Z"
                        fill="white" />
            </svg>
            <span>{{__('web.send_request')}}</span>
        </button>

        <button class="backButton" id="backThreeButton" type="submit" style="background-color: grey">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                <path
                        d="M18.5228 8.49339L2.57045 0.88492C2.26775 0.739757 1.92918 0.686351 1.59649 0.731287C1.2638 0.776224 0.951531 0.917537 0.698185 1.13781C0.444839 1.35807 0.261491 1.64767 0.170745 1.97088C0.0800003 2.29409 0.0858253 2.6368 0.187501 2.95674L1.87749 8.43682C1.96122 8.70032 2.12441 8.93148 2.34468 9.09858C2.56496 9.26569 2.83153 9.36056 3.10785 9.3702L11.1052 9.63183C11.1982 9.61934 11.2926 9.62538 11.3832 9.6496C11.4738 9.67382 11.5586 9.71573 11.6329 9.77293C11.7072 9.83012 11.7694 9.90146 11.816 9.98283C11.8626 10.0642 11.8926 10.154 11.9043 10.247C11.9242 10.4338 11.8714 10.621 11.7568 10.7698C11.6422 10.9186 11.4747 11.0176 11.2891 11.046C11.2087 11.0518 11.1278 11.047 11.0487 11.0319L3.10078 10.7915C2.80614 10.7826 2.5167 10.8705 2.27665 11.0415C2.03661 11.2126 1.85917 11.4576 1.77142 11.739L0.180431 16.9504C0.0429835 17.3836 0.0825968 17.8536 0.290613 18.2577C0.49863 18.6618 0.858138 18.9672 1.29059 19.1071C1.70187 19.2317 2.14453 19.2015 2.5351 19.0222L18.5157 11.5976C18.9263 11.4078 19.2455 11.0639 19.4043 10.6403C19.5631 10.2168 19.5487 9.74782 19.3642 9.33485C19.1914 8.96418 18.8934 8.66626 18.5228 8.49339Z"
                        fill="white" />
            </svg>

            <span>{{__('web.back')}}</span>
        </button>
    </div>
</div>