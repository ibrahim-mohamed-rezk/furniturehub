<div class="tab-pane fade" id="tab-order-tracking" role="tabpanel" aria-labelledby="tab-order-tracking">
    <p class="font-md color-gray-600">
        {{ __('web.to_track_your_order_please_enter_your_OrderID_in_the_box_below_and_press_track_button_this_was_given_to_you_on') }}<br
            class="d-none d-lg-block">{{ __('web.your_receipt_and_in_the_confirmation_email_you_should_have_received') }}
    </p>
    <div class="row mt-30">
        <div class="col-lg-6">
            <div class="form-tracking">
                <form action="#" method="get">
                    <div class="d-flex">
                        <div class="form-group box-input">
                            <input class="form-control" type="text" placeholder="FDSFWRFAF13585">
                        </div>
                        <div class="form-group box-button">
                            <button class="btn btn-buy font-md-bold"
                                type="submit">{{ __('web.tracking_now') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="border-bottom mb-20 mt-20"></div>
    <h3 class="mb-10">{{ __('web.order_status') }}<span
            class="color-success">{{ __('web.international_shipping') }}</span></h3>
    <h6 class="color-gray-500">{{ __('web.estimated_delivery_date') }} 27 August -
        29 August</h6>
    <div class="table-responsive">
        <div class="list-steps">
            <div class="item-step">
                <div class="rounded-step">
                    <div class="icon-step step-1 active"></div>
                    <h6 class="mb-5">{{ __('web.order_placed') }}</h6>
                    <p class="font-md color-gray-500">15 August 2022</p>
                </div>
            </div>
            <div class="item-step">
                <div class="rounded-step">
                    <div class="icon-step step-2 active"></div>
                    <h6 class="mb-5">{{ __('web.in_producttion') }}</h6>
                    <p class="font-md color-gray-500">16 August 2022</p>
                </div>
            </div>
            <div class="item-step">
                <div class="rounded-step">
                    <div class="icon-step step-3 active"></div>
                    <h6 class="mb-5">{{ __('web.international_shipping') }}</h6>
                    <p class="font-md color-gray-500">17 August 2022</p>
                </div>
            </div>
            <div class="item-step">
                <div class="rounded-step">
                    <div class="icon-step step-4"></div>
                    <h6 class="mb-5">{{ __('web.shipping_final_mile') }}</h6>
                    <p class="font-md color-gray-500">18 August 2022</p>
                </div>
            </div>
            <div class="item-step">
                <div class="rounded-step">
                    <div class="icon-step step-5"></div>
                    <h6 class="mb-5">{{ __('web.delivered') }}</h6>
                    <p class="font-md color-gray-500">19 August 2022</p>
                </div>
            </div>
        </div>
    </div>



</div>