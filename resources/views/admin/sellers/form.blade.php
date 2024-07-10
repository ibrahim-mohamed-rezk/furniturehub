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
                <form method="post" enctype="multipart/form-data" action="{{ $action }}">
                    @if ($seller ?? '' && $seller->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-6 mb-4">
                                    <label>{{ __('sellers.code') }} </label>
                                    <input type="text" name="code"
                                           class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                           placeholder="{{ __('sellers.code') }} "
                                           value='{{ old('code', $seller->code ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label>{{ __('sellers.name') }} </label>
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('sellers.name') }} "
                                        value='{{ old('name', $seller->name ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label>{{ __('sellers.email') }} </label>
                                    <input type="email" name="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('sellers.email') }} "
                                        value='{{ old('email', $seller->email ?? '') }}'>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>{{ __('sellers.phone') }} </label>
                                    <input type="tel" name="phone"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('sellers.phone') }} "
                                        value='{{ old('phone', $seller->phone ?? '') }}'>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>{{ __('sellers.photo') }}</label>
                                    <input type="file" name="photo"
                                        class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('offers.photo') }}">
                                </div>
                                
                                @if ($seller ?? '' && $seller->id )
                                    <div class="col-md-6 mb-4">
                                        <img src="{{ asset($seller->photo) }}"
                                            alt="Article Image" height="200pc">
                                    </div>
                                @endif



                            </div>

                            <button class="btn btn-md rounded font-sm hover-up">{{ __('dashboard.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')
@endsection
@endsection
