@extends('web.layouts.container')


@section('content')
    <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
        @if ($address ?? '' && $address->id)
            {{ method_field('patch') }}
        @endif
        @CSRF

        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <h5 class="font-md-bold color-brand-3 mt-15 mb-20">{{ __('web.shipping_address') }}</h5>
                </div>
                <input type="hidden" name="prev" value="{{ $prev }}">
                <div class="col-lg-6">
                    <div class="form-group">
                        <input class="form-control font-sm" type="text" value='{{ old('first_name', $address->first_name ?? '') }}' name="first_name"
                            placeholder="{{ __('web.first_name') }}*">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input class="form-control font-sm" type="text" value='{{ old('last_name', $address->last_name ?? '') }}' name="last_name"
                            placeholder="{{ __('web.last_name') }}*">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control font-sm" type="text" value='{{ old('address_1', $address->address_1 ?? '') }}' name="address_1"
                            placeholder="{{ __('web.address') }} 1*">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control font-sm" type="text" value='{{ old('address_2', $address->address_2 ?? '') }}' name="address_2"
                            placeholder="{{ __('web.address') }} 2*">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <select name="governorate_id" class="form-control font-sm select-style1 color-gray-700">
                            <option value>{{ __('web.Select_an_option') }}</option>
                            @foreach ($governorates as $key => $row)
                                <option value="{{ $row->id }}" {{ (isset($address) ? $address->governorate_id : '') ==  $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <input class="form-control font-sm" name="post_code" value='{{ old('post_code', $address->post_code ?? '') }}' type="text"
                            placeholder="{{ __('web.postCode_ZIP') }}*">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <input class="form-control font-sm" name="phone" value='{{ old('phone', $address->phone ?? '') }}' type="text"
                            placeholder="{{ __('web.phone') }}*">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-0">
                        <textarea class="form-control font-sm" name="information" value='{{ old('information', $address->information ?? '') }}' placeholder="{{ __('web.additional_information') }}"
                            rows="5"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mt-20">
                        <input class="btn btn-buy w-auto h54 font-md-bold" type="submit" value="{{ __('web.apply') }}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
