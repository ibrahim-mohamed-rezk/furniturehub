<tr>
    <td>
        <div class="images-container" id="images-container-{{ $row->id }}">

        </div>
    </td>
    <td>
        <div class="order-number">#{{ $order->id ?? '' }}</div>
    </td>
    <td>
        <div class="order-date">{{ $order->created_at->format('M d,y') ?? '' }}</div>
    </td>
    <td>
        <div class="order-status">{{ __('web.' . $order->status) }}</div>
    </td>
    <td>
        <div class="order-total">
            <span>{{ $order->total ?? '' }} LE</span>
            <span>{{ __('web.for') }} {{ $order->products()->count() ?? '' }} {{ __('web.items') }}</span>
        </div>
    </td>
    <td>
        <div data-toggle="modal" data-target="#exampleModa{{ $order->id }}" class="custom-button">
            <div class="custom-button-text">{{ __('web.view_all') }}</div>
        </div>
    </td>
</tr>

<!-- order Modal -->
<div class="modal fade" id="exampleModa{{ $order->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 90vw; max-width: 100vw !important; top: 0;" role="document">
        <div class="modal-content ">
            <h5 class="modal-title" style="text-align: start; width: 90%; margin: 0 auto;" id="exampleModalLabel">
                {{ __('web.order_summary') }} </h5>
            <div style="width: 100%">

                <div class="shipping-details">
                    <div>
                        @if ($order->user->defaultAddress)
                            <div class="details-section">
                                <span class="details-section-title">{{ __('web.shipping_info') }}</span>

                                <div class="details-section-content">
                                    <div>
                                        <div>
                                            <span>{{ __('web.name') }}</span>

                                            <span>{{ $order->user->defaultAddress->first_name . ' ' . $order->user->defaultAddress->last_name ?? '' }}</span>
                                        </div>
                                        <div>
                                            <span>{{ __('web.phone') }}</span>
                                            <span>{{ $order->user->defaultAddress->phone ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <span>{{ __('web.city') }}</span>
                                            <span>{{ $order->user->defaultAddress->governorate() ?? '' }}</span>
                                        </div>
                                        <div>
                                            <span>{{ __('web.email') }}</span>
                                            <span> {{ $order->user->email ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <span>{{ __('web.home_address') }}</span>
                                            <span>{{ $order->user->defaultAddress->address_1 ?? '' }}</span>
                                        </div>
                                        <div>
                                            <span>{{ __('web.delivery_address') }}</span>
                                            <span>{{ $order->user->defaultAddress->address_2 ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <span>{{ __('web.postCode_ZIP') }}</span>
                                            <span>{{ $order->user->defaultAddress->post_code ?? '' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div>
                        <div class="details-section">
                            <span class="details-section-title">{{ __('web.order_details') }}</span>
                            <div class="details-section-content">
                                <div>
                                    <div>
                                        <span>{{ __('web.order_no') }}</span>
                                        <span>#{{ $order->id ?? '' }}</span>
                                    </div>
                                    <div>
                                        <span>{{ __('web.transaction_ID') }}</span>
                                        <span>{{ $order->payment->payment_id ?? '' }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <span>{{ __('web.order_date') }}</span>
                                        <span> {{ $order->created_at->format('M d,y') ?? '' }} </span>
                                    </div>

                                    <div>
                                        <span>{{ __('web.order_ID') }}</span>
                                        @if ($order->payment != null)
                                            <span>{{ $order->payment->payment_log()->order ?? '' }}</span>
                                        @else
                                            <span></span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="details-section">
                            <span class="details-section-title"> {{ __('web.payment_details') }}</span>
                            <div class="details-section-content">
                                <div>
                                    <div>

                                        <span> {{ __('web.transaction_time') }}</span>
                                        @if ($order->payment != null)
                                            <span>{{ $order->payment->payment_log()->created_at ?? '' }} </span>
                                        @else
                                            <span></span>
                                        @endif
                                    </div>
                                    <div>
                                        <span>{{ __('web.total') }}</span>
                                        <span>{{ $order->total ?? '' }} LE</span>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <span>{{ __('web.cart_details') }}</span>
                                        <span> **** **** **** ****</span>
                                    </div>
                                    <div>
                                        <span>{{ __('web.items') }}</span>
                                        <span>{{ $order->products()->count() ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-table">
                    <div class="tableRow head">
                        <div>{{ __('web.your_order') }}</div>
                        <div>{{ __('web.quantity') }}</div>
                        <div>{{ __('web.unit_price') }}</div>
                        <div>{{ __('web.price') }}</div>
                    </div>
                    @foreach ($order->products as $product)
                        <div class="tableRow">
                            <div>
                                <div class="order-image">
                                    <img src="{{ asset($product->product->image) }}" />
                                </div>
                                <div class="order-info">
                                    <div>{{ $product->product->details->name }}</div>
                                    <div>{{ $product->product->category->details->title }}</div>
                                </div>
                            </div>
                            <div>{{ $product->count }}</div>
                            @if ($product->product->cost_discount)
                                <div>{{ $product->product->cost_discount }} LE</div>
                            @else
                                <div>{{ $product->product->cost }} LE</div>
                            @endif
                            <div>{{ $product->total }} LE</div>
                        </div>
                    @endforeach
                </div>
                <div class="order-summary">
                    <div class="rectangle"></div>
                    <div class="content">
                        <h4>{{ __('web.payment_details') }}</h4>
                        <div class="typography">
                            <div>
                                <span>{{ __('web.order_no') }}</span>
                                @if ($order->payment != null)
                                    <span>{{ $order->payment->payment_log()->order }}</span>
                                @else
                                    <span></span>
                                @endif
                            </div>
                            <div>
                                <span>{{ __('web.vat_amount') }}</span>
                                <span>0 LE</span>
                            </div>
                            <div>
                                <span>{{ __('web.order_amount') }}</span>
                                <span>{{ $product->total ?? 0 }} LE</span>
                            </div>
                        </div>
                        <div class="separetor">
                            <div class="circle circle-l"></div>
                            <div class="dashed-line"></div>
                            <div class="circle circle-r"></div>
                        </div>
                        <div class="ammount">
                            <div>
                                <span>{{ __('web.amount_to_be_paid') }}</span>
                                <span>{{ $product->total ?? 0 }} LE</span>
                            </div>
                            {{-- <div><img src="{{ asset('storage/assets/list.png') }}" /></div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
