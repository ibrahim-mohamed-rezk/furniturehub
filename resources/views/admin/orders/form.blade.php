@extends('admin.layouts.container')

@section('content')



    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">{{$title}}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col">
                                <div class="card card-product-grid">
                                    <div class="info-wrap"><a class="title text-success">{{__('carts.label_text')}}</a>
                                        <div class="price mb-2">{{$label_message ?? __('carts.no_label_here')}}</div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.user')}}</label>
                                    <input type="text" n class="form-control" id="validationServer" disabled value='{{ $order->user->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.status')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled  value='{{ __('orders.'.$order->status) }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.total')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->total }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.total_products')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->total_products }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.total_delivery')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->total_delivery }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.offer_discount')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->offer_discount }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.tax_value')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->tax_value }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.cobon')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->cobon_id ? $order->cobon->code : '' }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.cobon_discount')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->cobon_discount }}'>
                                </div>

                            </div>
                        </div>
                    </div>
                    @if ($address)
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.first_name')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->first_name }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.last_name')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->last_name }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.phone')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->phone }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.address_1')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->address_1 }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.address_2')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->address_2 }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.post_code')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->post_code }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.information')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->information }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.governorate')}}</label>
                                        <input type="text" n class="form-control" id="validationServer" disabled value='{{ $address->governorate($address->governorate_id) }}'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>{{__('orders.payment')}}</h5>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.payment_id')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->payment->payment_id }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('orders.way')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->payment->payment_type }}'>
                                </div>
                                @if ($order->payment->payment_type == "card")
                                    @if($order->total_products * 0.3 == $order->total)
                                    <div class="col-md-6 mb-4">
                                            <label for="validationServer">{{__('orders.type')}}</label>
                                            <input type="text"  class="form-control" id="validationServer" disabled value='{{__('orders.deposit')}}'>
                                        </div>

                                    @else
                                        <div class="col-md-6 mb-4">
                                            <label for="validationServer">{{__('orders.type')}}</label>
                                            <input type="text"  class="form-control" id="validationServer" disabled value='{{__('orders.pay')}}'>
                                        </div>
                                        

                                @endif
                                    
                                @else
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('orders.type')}}</label>
                                        <input type="text"  class="form-control" id="validationServer" disabled value='{{__('orders.installment')}}'>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>{{__('orders.products')}}</h5>
                            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                                @foreach($products as $product)
                                    <div class="col">
                                        <div class="card card-product-grid">
                                            <a class="img-wrap"><img src="{{asset($product->product->image ?? $product->extension->image)}}" alt="Product"></a>
                                            <div class="info-wrap"><a class="title text-truncate" >{{$product->product->details->name ?? __('web.'.$product->extension->title)}}</a>
                                                <div class="price mb-2">{{$product->total}}</div>
                                                <div class="price mb-2">{{$product->product->sku_code ?? $product->extension->sku_code}}</div>
                                                <div class="price mb-2">{{$product->count}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('orders.confirm_message')}}" method="POST">
                                        @csrf()
                                        <input type="hidden" name="id" value="{{$order_id}}">
                                        <input type="text" class="form-control" placeholder="{{__('carts.leave_your_label')}}" name="message">
                                        <input type="submit" class="form-control" value="{{__('carts.submit')}}">

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>


@section('inner_js')

@endsection

@endsection
