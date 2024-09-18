@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ url()->current() }}">{{ __('web.receipt') }}</a></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- receipt section --}}
    <section class="section-box shop-template">
        <div class="container">
            <div class="order_status">
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('public/storage/assets/cartIconFilled.png') }}" />
                    </div>
                    <div class="title orange-color">{{ __('web.cart_items') }}</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('public/storage/assets/deliveryIconFiled.png') }}" />
                    </div>
                    <div class="title orange-color">{{ __('web.the_delivery') }}</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('public/storage/assets/paymentIconFilled.png') }}" />
                    </div>
                    <div class="title orange-color">{{ __('web.payment') }}</div>
                </div>
                <div class="line ornge"></div>
                <div class="order_status_item">
                    <div class="icon">
                        <img src="{{ asset('public/storage/assets/receptIconOrange.png') }}" />
                    </div>
                    <div class="title orange-color">{{ __('web.receipt') }}</div>
                </div>
            </div>
            <div class="order-table">
                <div class="tableRow head">
                    <div>{{ __('web.your_order') }}</div>
                    <div>{{ __('web.quantity') }}</div>
                    <div>{{ __('web.unit_price') }}</div>
                    <div>{{ __('web.discount') }}</div>
                    <div>{{ __('web.price') }}</div>
                </div>
                @foreach ($order_products as $product)
                    <div class="tableRow">
                        <div>
                            <div class="order-image">
                                <img src="{{ asset($product->product->image ?? $product->extension->image) }}" />
                            </div>
                            <div class="order-info">
                                <div>{{ $product->product->details->name  ?? __('web.'.$product->extension->title)}}</div>
                                <div>{{ $product->product->category->details->title ?? __('web.'.$product->extension->title) }}</div>
                            </div>
                        </div>
                        <div>{{ $product->count }}</div>
                        <div>{{ $product->product->cost ?? $product->extension->value }} {{ __('web.EGP') }}</div>
                        @if ($product->product->price['discount'] )
                            <div>{{ ($product->product->price['price_before'] - $product->product->price['price']) ?? $product->extension->value }}
                                {{ __('web.EGP') }}</div>
                        @endif
                        <div>{{ $product->total * $product->count }} {{ __('web.EGP') }}</div>
                    </div>
                @endforeach

            </div>
            <div class="order-summary">
                <div class="rectangle"></div>
                <div class="content">
                    <h4>{{ __('web.order_summary') }}</h4>
                    <div class="typography">
                        <div>
                            <span>{{ __('web.order_number') }}</span>
                            <span>{{ $order->token }}</span>
                        </div>
                        <div>
                            <span>{{ __('web.vat_amount') }}</span>
                            <span> 0 {{ __('web.EGP') }}</span>
                        </div>
                        @if ($order->total < $cost)
                            <div>
                                <span>{{ __('web.copon') }}</span>
                                <span>{{ $cost - $order->total }} {{ __('web.EGP') }}</span>
                            </div>
                        @endif
                        <div>
                            <span>{{ __('web.amount_to_be_paid') }}</span>
                            <span>{{ $order->total }} {{ __('web.EGP') }}</span>
                        </div>
                        <div>
                            <span>{{ __('web.remain_amount') }}</span>
                            <span>{{ $order->remain }} {{ __('web.EGP') }}</span>
                        </div>

                    </div>
                    <div class="separetor">
                        <div class="circle circle-l"></div>
                        <div class="dashed-line"></div>
                        <div class="circle circle-r"></div>
                    </div>
                    <div class="ammount">
                        <div>
                            <span>{{ __('web.order_amount') }}</span>

                            <span>{{ $order->total + $order->remain }} {{ __('web.EGP') }}</span>
                        </div>
                        <div>
                            <a href="{{ route('generate.pdf') }}?order_id={{ $order->id }}&lang={{ $lang }}"
                                target="_blank">
                                <img src="{{ asset('public/storage/assets/list.png') }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('container_js')
@endsection
