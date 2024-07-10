@extends('web.layouts.container')



@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ request()->url() }}">{{ __('web.affiliate_register') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-60">
        <div class="container">
            <div class="row mb-100">

                <form action="{{ $action }}" method="post" onsubmit="formAction(this)">
                    @csrf
                    <div class="form-register mt-30 mb-30">
                        <div class="row">
                            <div class="col-4 ">
                                <h3>{{ __('web.affiliate_register') }}</h3>
                                <br>
                                <p class="font-md color-gray-500">{{ __('web.welcome_with_our_family_affiliate') }}</p>
                            </div>
                            <div class="col-2">
                                
                            </div>
                            <div class="col-6">
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
                                            <input class="form-control" type="number" name="phone"
                                                placeholder="{{ __('web.enter_your_phone_number') }}">
                                        </div>
        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.email') }} *</label>
                                            <input class="form-control" type="email" name="email"
                                                placeholder="{{ __('web.enter_your_email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-5 font-sm color-gray-700">{{ __('web.city') }} *</label>
                                            <select class="form-control" name="city">
                                                @foreach ($cities as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
        
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="font-md-bold btn btn-buy" type="submit" value="{{ __('web.register') }}" style="width: 90px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        
                    </div>
                </form>



            </div>
        </div>
        </div>
    </section>
@endsection
