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
                    @if ($slider ?? '' && $slider->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('sliders.name') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="name_{{ $language->local }}"
                                            class="form-control {{ $errors->has('name_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('sliders.name') }} {{ $language->name }}"
                                            value='{{ old("name_{$language->local}", $slider[$language->local]->name ?? '') }}'>
                                    </div>
                                @endforeach

                                @foreach (languages() as $key => $language)

                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('sliders.image') }} {{ $language->name }}</label>
                                        <input type="file" name="image_{{$language->local}}" class="form-control {{ $errors->has('image_'.$language->locale) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('sliders.image') }} {{ $language->name }}" value='{{ old("image_{$language->local}") }}'>
                                    </div>
                                @endforeach
                                @foreach (languages() as $key => $language)

                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('banners.description') }}
                                            {{ $language->name }}</label>
                                        <textarea name="description_{{ $language->local }}" class="form-control {{ $errors->has('description_' . $language->local) ? 'is-invalid' : '' }}" placeholder="{{ __('banners.description') }} {{ $language->name }}" rows="4" style="height: 48px;">{{ old("description_{$language->local}", $slider[$language->local]->description ?? '') }}</textarea>

                                    </div>
                                @endforeach
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('sliders.link') }}</label>
                                        <input type="text" name="link" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('sliders.link')}}" value='{{ old("link", $slider->link ?? "") }}'>
                                    </div>

                                <div class="col-md-6 mb-4"></div>


                                <div class="col-md-6 mb-4">
                                    @if ($slider ?? '' && $slider->id)
                                        @foreach (languages() as $key => $language)
                                            <img src="{{asset($slider[$language->local]->image)}}" style="height: 10pc">
                                        @endforeach
                                    @endif
                                </div>
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
