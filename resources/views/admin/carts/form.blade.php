@extends('admin.layouts.container')

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">{{ $title }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="col">
                            <div class="card card-product-grid">
                                <div class="info-wrap"><a class="title text-success">{{ __('carts.label_text') }}</a>
                                    <div class="price mb-2">{{ $label_text->label_message ?? __('carts.no_label_here') }}
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-4">

                    <div class="card-body">
                        <h5>{{ __('orders.products') }}</h5>
                        <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                            @foreach ($products as $product)
                                <div class="col">
                                    <div class="card card-product-grid">
                                        <a class="img-wrap"><img
                                                src="{{ asset($product->product->image ?? $product->extension->image) }}"
                                                alt="Product" height="180px"></a>
                                        <div class="info-wrap"><a class="title text-truncate">Title :
                                                {{ $product->product ? $product->product->descriptions()->name : $product->extension->title }}</a>
                                                
                                            @if ($product->product && $product->product->cost_discount)
                                                <div class="price mb-2">Price Discount :
                                                    {{ $product->product->cost_discount ?? 0 * $product->count }}</div>
                                            @else
                                                <div class="price mb-2">Price :
                                                    {{ $product->product->cost ?? $product->extension->value * $product->count }}
                                                </div>
                                            @endif
                                            <div class="price mb-2">Count : {{ $product->count }}</div>
                                            <div class="price mb-2">SKU :
                                                {{ $product->product->sku_code ?? $product->extension->sku_code }}</div>
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
                                <form action="{{ route('Carts.confirm_message') }}" method="POST">
                                    @csrf()
                                    <input type="hidden" name="id" value="{{ $user_id }}">
                                    <input type="text" class="form-control"
                                        placeholder="{{ __('carts.leave_your_label') }}" name="message">
                                    <input type="submit" class="form-control" value="{{ __('carts.submit') }}">

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
