@extends('web.layouts.container')


@section('content')
    {{-- @php
            dd($order);
        @endphp --}}
    <div class="card" id='printable_div_id'>
        <div class="card-body">
            <div class="container mb-4 mt-3">
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f; font-size: 20px;">{{ __('web.invoice') }} </p>
                    </div>
                    <div class="col-xl-3 float-end" id="print">
                        <style type="text/css">
                            @media print {
                                #print {
                                    display: none;
                                }
                            }
                        </style>
                        <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"
                            onclick="printdiv('printable_div_id');">
                            <i class="far fa-file-pdf text-danger"></i> {{ __('web.export') }}
                        </a>
                    </div>
                </div>
                <hr class="my-3">
                <div class="container">
                    <div class="col-md-12">
                        <div class="text-end">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <img src="{{ asset(settings('logo')) }}" alt="">
                            <p class="pt-0"></p>
                        </div>
                    </div>
                    <div class="cart-wrapper">

                        <div class="note-block">

                            <div class="row">
                                <!-- === left content === -->

                                <div class="col-md-6">

                                    <div class="white-block">

                                        <div class="h5">{{ __('web.shipping_info') }}</div>

                                        <hr />

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.name') }}</strong> <br />
                                                    <span>{{ $user_info->name }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.email') }}</strong><br />
                                                    <span>{{ $user_info->email }}</span>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.phone') }}</strong><br />
                                                    <span>+{{ $user_info->address()->phone ?? '' }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.postCode_ZIP') }}</strong><br />
                                                    <span>{{ $user_info->address()->post_code ?? '' }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.city') }}</strong><br />
                                                    <span>{{ $user_info->address()->governorate($user_info->address()->governorate_id)->details->name ?? ' ' }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.address') }}</strong><br />
                                                    <span>{{ $user_info->address()->address_1 ?? '' }}</span>
                                                </div>
                                            </div>



                                        </div>

                                    </div> <!--/col-md-6-->

                                </div>

                                <!-- === right content === -->

                                <div class="col-md-6">
                                    <div class="white-block">

                                        <div class="h5">{{ __('web.order_details') }}</div>

                                        <hr />

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.order_ID') }}</strong> <br />
                                                    <span>{{ $order->id }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.transaction_ID') }}</strong> <br />
                                                    <span>#{{ $order->token }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.creation_date') }}</strong> <br />
                                                    <span>{{ $order->created_at->format('M d,y') }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.status') }}</strong> <br />
                                                    <span>{{ $order->status }}</span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="h5">{{ __('web.payment_details') }}</div>

                                        <hr />

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.transaction_time') }}</strong> <br />
                                                    <span>{{ $order->created_at->format('M d,y') }}</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.subtotal') }}</strong><br />
                                                    <span>{{ $order->total_products . " L.E"}} </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.tax_value') }}</strong><br />
                                                    <span>{{ $order->tax_value . " L.E"}} 
                                                    </span>
                                                </div>
                                            </div>
                                            @if ($order->cobon_discount != 0)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong
                                                            style="color: #F36621">{{ __('web.cobon_discount') }}</strong><br />
                                                        <span>{{ $order->cobon_discount . " L.E"}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($order->offer_discount != 0)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <strong
                                                            style="color: #F36621">{{ __('web.offer_discount') }}</strong><br />
                                                        <span>{{ $order->offer_discount . " L.E"}} </span>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <strong>{{ __('web.total') }}</strong><br />
                                                    <span>{{ $order->total . " L.E"}} </span>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#F36621" class="text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('web.name') }}</th>
                                    <th scope="col">{{ __('web.quantity') }}</th>
                                    <th scope="col">{{ __('web.unit_price') }}</th>

                                    <th scope="col">{{ __('web.price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_products as $key => $product)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $product->product->details->name }}</td>
                                        <td>{{ $product->count }}</td>
                                        <td>{{ $product->product->cost . " L.E"}} </td>
                                        <td>{{ ($product->total * $product->count) . " L.E" }} </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot style="background-color:#F36621" class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">{{ __('web.total') }}</th>
                                <th scope="col"></th>
                                <th scope="col"></th>

                                <th scope="col">{{ $order->total . " L.E"}} </th>
                            </tfoot>
                        </table>
                    </div>

                    

                    <hr class="my-4">
                    <div class="row">
                        <div class="col-xl-10">
                            <p style="color: #F36621">{{ __('web.thank_you_for_your_purchase') }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
