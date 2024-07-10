@extends('web.layouts.container')



@section('content')
    <section class="section-box shop-template mt-60">
        <div class="container">
            <div class="row mb-100">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <p class="font-md color-gray-500">{{ __('web.Welcome_back') }}</p>
                    <p class="font-md color-gray-500">
                    <h3>{{ __('web.order_no') }}</h3>
                    </p>
                    <div class="form-register mt-30 mb-30">
                        <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.full_name') }} *</label>
                                    <input class="form-control" type="text" name="fullname"
                                        placeholder="{{ __('web.enter_your_name') }}">
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.state') }} *</label>
                                    <input class="form-control" type="text" name="state"
                                        placeholder="{{ __('web.enter_your_state') }}">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.phone') }} *</label>
                                    <input class="form-control" type="tel" name="phone"
                                        placeholder="{{ __('web.enter_your_phone') }}">
                                </div>
                                <div class="form-group col-md-6 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.address') }} *</label>
                                    <textarea class="form-control" rows="3" name="address" placeholder="{{ __('web.enter_your_address') }}"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.image_for_room') }} 1 *</label>
                                    <input class="form-control" type="file" name="image" accept="image/*">
                                    
                                </div>
                                <div class="form-group col-md-5 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.dimensions_for_room') }}
                                        1</label>
                                    <input class="form-control" type="text" name="dimension"
                                        placeholder="{{ __('web.dimensions_for_room') }} 1">
                                </div>
                                
                            </div>
                            <div id="photos" class="form-group col-md-12 mb-4"></div>
                            <div class="form-group col-md-6 mb-4">
                                <button type="button" data-id="{{ $count_photos }}" onclick="addphoto(this)"
                                    class="btn btn-primary">{{ __('web.add_image') }}</button>
                            </div>
                            <div class="row">

                                <div class="form-group  col-md-4 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.sizes') }} *</label>
                                    <select class="form-control" name="size">
                                        <option value="true">{{ __('web.yes') }}</option>
                                        <option value="false" selected>{{ __('web.no') }}</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group  col-md-4 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.2D_drawing') }} *</label>
                                    <select class="form-control" name="twoD_drawing">
                                        <option value="yes">{{ __('web.yes') }}</option>
                                        <option value="no">{{ __('web.no') }}</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-4 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.3D_drawing') }} *</label>
                                    <select class="form-control" name="threeD_drawing">
                                        <option value="yes">{{ __('web.yes') }}</option>
                                        <option value="no">{{ __('web.no') }}</option>
                                    </select>
                                </div> --}}
                            </div>
                            {{-- <div class="form-group ">
                                Choose the price category
                            </div> --}}
                            <div class="row">

                                <div id="extensions" class="form-group col-md-12 mb-4"></div>
                                <div class="form-group col-md-6 mb-4">
                                    <button type="button" data-id="{{ $count_photos }}" onclick="addextension(this)"
                                        class="btn btn-primary">{{ __('web.add_image') }}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group  col-md-6 mb-4">
                                    <label class="mb-5 font-sm color-gray-700">{{ __('web.upload_PDF') }} *</label>
                                    <input class="form-control" type="file" name="pdf" accept=".pdf">
                                </div>

                            </div>

                            {{-- <div class="form-group ">
                                Choose the price category
                            </div> --}}
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.select_cost') }} *</label>

                                <select class="form-control" name="cost_state" onchange="showSelectedCost(this)">
                                    <option value="" disabled selected>{{ __('web.Select_an_option') }} </option>
                                    <option value="low">{{ __('web.limited_cost') }}</option>
                                    <option value="medium">{{ __('web.average_cost') }}</option>
                                    <option value="high">{{ __('web.high_cost') }}</option>
                                </select>
                            </div>
                            <div id="selected-cost-message" class="form-group col-md-6 mb-4"></div>
                            <div class="form-group">
                                <label class="mb-5 font-sm color-gray-700">{{ __('web.receiving_date') }} *</label>
                                <input class="form-control" type="date" name="receiving_date"
                                    placeholder="{{ __('web.receiving_date') }}">
                            </div>


                            <div class="form-group">
                                <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.apply') }}">
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

        function addextension(elem) {
            var num = $(elem).attr('data-id');

            var newrow = parseInt(num) + 1;
            $(elem).attr('data-id', newrow);

            $.ajax({
                url: url_addextension,
                type: 'GET',
                data: 'key=' + num,
                success: function(data) {
                    $('#extensions').append(data);
                }
            })
        }
        function remove(elem){
            $(elem).closest('.row').remove();
        }
        
        
    </script>

    
    <script>
        function showSelectedCost(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex].text;
            if (selectedOption === "{{ __('web.limited_cost') }}") {
                const message = "{{ __('web.three_year_warranty') }}";
                document.getElementById("selected-cost-message").innerText = message;
            } else if (selectedOption === "{{ __('web.average_cost') }}") {
                const message = "{{ __('web.five_year_warranty') }}";
                document.getElementById("selected-cost-message").innerText = message;
            } else if (selectedOption === "{{ __('web.high_cost') }}") {
                const message = "{{ __('web.ten_year_warranty') }}";
                document.getElementById("selected-cost-message").innerText = message;
            }
        }
    </script>
    <script>
        let url_addphoto = {!! json_encode(url(getCurrentLocale() . '/web/addphoto')) !!},
            url_addextension = {!! json_encode(url(getCurrentLocale() . '/web/addextension')) !!}
    </script>
@endsection
