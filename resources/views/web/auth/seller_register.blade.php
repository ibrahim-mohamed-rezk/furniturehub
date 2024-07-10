@extends('web.layouts.container')



@section('content')
    <section class="section-box shop-template mt-60">
        <div class="container">
            <div class="row mb-100">
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <h3>{{ __('web.seller_register') }}</h3>
                    <p class="font-md color-gray-500">{{ __('web.welcome_with_our_family') }}</p>
                    <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
                        @csrf
                        <div class="form-register mt-30 mb-30">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.name') }} *</label>
                                        <input class="form-control" type="text" name="name" placeholder="{{ __('web.enter_your_name') }}">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.phone') }} *</label>
                                        <input class="form-control" type="text" name="phone"
                                            placeholder="{{ __('web.enter_your_phone_number') }}">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.brand_name') }} *</label>
                                        <input class="form-control" type="text" name="brand_name"
                                            placeholder="{{ __('web.enter_brand_name') }}">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.city') }} *</label>
                                        <select class="form-control" name="city" >
                                            @foreach ($cities as $row )
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.section') }} *</label>
                                        <input class="form-control" type="text" name="section"
                                            placeholder="{{ __('web.section') }}">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.email') }} *</label>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="{{ __('web.enter_your_email') }}"> 
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.website_link') }} </label>
                                        <input class="form-control" type="text" name="website_link"
                                            placeholder="{{ __('web.website_link') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="mb-5 font-sm color-gray-700">{{ __('web.social_media_page') }}
                                        </label>
                                        <input class="form-control" type="text" name="social_media_page"
                                            placeholder="{{ __('web.social_media_page') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mySelect"
                                    class="mb-5 font-sm color-gray-700">{{ __('web.have_you_worked_with_other_platforms_before') }}
                                </label>
                                <select class="form-control" name="question" id="mySelect">
                                    <option value="" disabled selected>{{ __('web.select_option') }}</option>
                                    <option value="yes">{{ __('web.yes') }}</option>
                                    <option value="no">{{ __('web.no') }}</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.image_product') }} *</label>
                                <input class="form-control" type="file" name="image" accept="image/*">
                            </div>

                            <div id="photos" class="form-group col-md-12 mb-4"></div>
                            <div class="form-group col-md-6 mb-4">
                                <button type="button" data-id="{{ $count_photos }}" onclick="addphoto(this)"
                                    class="btn btn-primary">{{ __('web.add_some_products_images') }}</button>
                            </div>



                            <div class="form-group">
                                <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.register') }}">
                            </div>
                        </div>
                    </form>
                </div>
 

            </div>
            <div class="col-lg-5"></div>
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
        function remove(elem){
            $(elem).closest('.row').remove();
        }
    </script>
    <script>
        let url_addphoto = {!! json_encode(url(getCurrentLocale() . '/web/seller/addphoto')) !!}
    </script>
@endsection
