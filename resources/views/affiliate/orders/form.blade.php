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
                <form >

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
                                    <label for="validationServer">{{__('affiliates.profit')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $order->affiliate_profit }}'>
                                </div>
                                
                                

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
                                        <a class="img-wrap"><img src="{{asset($product->product->image)}}" alt="Product"></a>
                                        <div class="info-wrap"><a class="title text-truncate" >{{$product->product->descriptions()->name}}</a>
                                            <div class="price mb-2">{{$product->total}}</div>
                                            <div class="price mb-2">{{$product->count}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')

@endsection

@endsection
