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
                    @if ($subcategory ?? '' && $subcategory->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('categories.title') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="title_{{ $language->local }}"
                                               class="form-control {{ $errors->has('title_' . $language->local) ? 'is-invalid' : '' }}"
                                               id="validationServer"
                                               placeholder="{{ __('categories.title') }} {{ $language->name }}"
                                               value='{{ old("title_{$language->local}", $category[$language->local]->title ?? '') }}'>
                                    </div>

                                @endforeach
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('categories.image_products') }}
                                            {{ $language->name }}</label>
                                        <input type="file" name="image_products_{{ $language->local }}"
                                               class="form-control {{ $errors->has('image_products_' . $language->local) ? 'is-invalid' : '' }}"
                                               id="validationServer"
                                               placeholder="{{ __('categories.image_products') }} {{ $language->name }}"
                                               value='{{ old("image_products_{$language->local}", $category[$language->local]->image_products ?? '') }}'>
                                    </div>
                                @endforeach
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('categories.image') }}</label>
                                    <input type="file" name="image"
                                           class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('categories.image') }}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('categories.icon') }}</label>
                                    <input type="file" name="icon"
                                           class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('categories.icon') }}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('categories.icon_search') }}</label>
                                    <input type="file" name="icon_search"
                                           class="form-control {{ $errors->has('icon_search') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('categories.icon_search') }}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('categories.image') }}</label>
                                    <input type="file" name="image"
                                           class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('categories.image') }}">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('categories.banner') }}</label>
                                    <input type="file" name="banner"
                                           class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('categories.banner') }}">
                                </div>


                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('categories.category_id') }}</label>
                                    <select name="category_id"  class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                        <option value="">{{__('categories.main')}}</option>
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}"
                                                    {{ (isset($subcategory) ? $subcategory->category_id : '') ==  $row->id ? 'selected' : '' }}>
                                                {{ $row->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($subcategory ?? '' && $subcategory->id)
                                
                                    <div class="col-md-6 mb-4">
                                        <img src="{{ asset($subcategory->image) }}" alt="" width="200px">
                                        <img src="{{ asset($subcategory->banner) }}" alt="" width="200px">

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
