<div class="tab-pane fade orders" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders">
    @foreach ($orders as $key => $row)
        <div class="box-orders">
            <div class="head-orders">
                <div class="head-left">
                    <h5 class="mr-20">{{ __('web.order_ID') }} : num {{ $row->id }}</h5>
                    <span class="font-md color-brand-3 mr-20"> {{ $row->created_at->format('j F, Y') }}
                    </span><span class="label-delivery">{{ __("web.$row->status") }}</span>
                </div>
                {{--  <div class="head-right"><a
                        class="btn btn-buy font-sm-bold w-auto">{{ __('web.view_order') }}</a></div>  --}}
            </div>
            <div class="body-orders">
                @foreach ($row->products as $key => $row)
                    <div class="list-orders">
                        <div class="item-orders">
                            <div class="image-orders"><img
                                    src="{{ $row->product->image }}"
                                    alt="Ecom"></div>
                            <div class="info-orders">
                                <h5>{{ $row->product->details->name }}</h5>
                            </div>
                            <div class="quantity-orders">
                                <h5>{{ __('web.quantity') }}: {{ $row->count }}</h5>
                            </div>
                            <div class="price-orders">
                                <h3>{{ round($row->total / $currency->value) }} {{$currency->symbol}}</h3>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <nav class="orders">
        {!! $orders->links() !!}
    </nav>
</div>