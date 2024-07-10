@extends('web.layouts.container')

@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500"
                            href="{{ request()->url() }}">{{ __('web.wholesale_orders_and_quantities') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-30">
        <div class="container">
            <div class="row">
                {{-- @if (getCurrentLocale() == 'ar')
                    <div class="col-lg-12 mb-40" style="padding-left:9px">
                        <div class="text-center">

                            <a href="{{ $banner[0]->link }}">
                                <img src="{{ asset($banner[0]->image) }}" alt="Furniture Hub">
                            </a>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12 mb-40" style="padding-right:9px">
                        <div class="text-center">
                            <a href="{{ $banner[0]->link }}">
                                <img src="{{ asset($banner[0]->image) }}" alt="Furniture Hub">
                            </a>
                        </div>
                    </div>
                @endif --}}
                {{-- <div class="row">
                    @foreach ($categories as $key => $row)
                        <div class="col-lg-1" id="quantities">
                            <div class="text-center">
                                <a href="{{ route('web.shop') }}?category_id={{ $row->id }}">
                                    <img src="{{ $row->image }}" alt="Furniture Hub" width="200px">
                                    <span class="text-black">{{$row->title}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
                    @csrf
                    <div class="form-register mt-30 mb-30">
                        <div class="row ">
                            <div class="col-lg-4 pt-100">

                                <h4>{{ __('web.Wholesale_orders_and_quantities') }}</h4>
                                <br>
                                <p>{{ __('web.furniture_hub_offers_special_prices_for_wholesale_orders_and_large_quantities_register_your_informations_and_we_will_contact_you_as_soon_as_possible_to_answer_all_your_inquiries') }}
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.name') }} *</label>
                                            <input class="form-control" type="text" name="name"
                                                placeholder="{{ __('web.enter_your_name') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.phone') }} *</label>
                                            <input class="form-control" type="text" name="phone"
                                                placeholder="{{ __('web.enter_your_phone_number') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.business_activity') }}
                                                *</label>
                                            <input class="form-control" type="text" name="business_activity"
                                                placeholder="{{ __('web.business_activity') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.image_product') }}
                                                *</label>
                                            <input class="form-control" type="file" name="image" accept="image/*">
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <button type="button" data-id="{{ $count_photos }}" onclick="addphoto(this)"
                                            class="btn btn-gray">{{ __('web.add_some_products_images') }}</button>
                                    </div>
                                    <div id="photos" class="row"></div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.notes') }} </label>
                                            <textarea class="form-control" cols="30" name="notes" placeholder="{{ __('web.notes') }}" rows="3"></textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="font-md-bold btn btn-buy" type="submit"
                                                value="{{ __('web.register') }}" style="width: 100px">
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>








                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('container_js')
    <script>
        function addphoto(elem) {
            var num = $(elem).attr('data-id');

            var newrow = parseInt(num) + 1;
            $(elem).attr('data-id', newrow);

            $.ajax({
                url: url_addphoto,
                type: 'GET',
                data: 'key=' + num,
                success: function(data) {
                    $('#photos').append(data);
                }
            })
        }

        function remove(elem) {
            $(elem).closest('.col-lg-6').remove();
        }
    </script>
    <script>
        let url_addphoto = {!! json_encode(url(getCurrentLocale() . '/web/quantities/addphoto')) !!}
    </script>
@endsection
