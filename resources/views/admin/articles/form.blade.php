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
                <form method="post" enctype="multipart/form-data" action="{{ $action }}" id="article-form">
                    @if ($article ?? '' && $article->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{ __('articles.users') }}</label>
                                    <select name="user_id"
                                        class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                                        id="validationServer">
                                        @foreach ($users as $user)
                                            <option
                                                {{ isset($article) ? ($article->user_id == $user->id ? 'selected' : '') : '' }}
                                                value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('articles.title') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="title_{{ $language->local }}"
                                            class="form-control {{ $errors->has('title_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('articles.title') }} {{ $language->name }}"
                                            value='{{ old("title_{$language->local}", $article[$language->local]->title ?? '') }}'>
                                    </div>
                                @endforeach
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('articles.user') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="user_{{ $language->local }}"
                                            class="form-control {{ $errors->has('user_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('articles.user') }} {{ $language->name }}"
                                            value='{{ old("user_{$language->local}", $article[$language->local]->user ?? '') }}'>
                                    </div>
                                @endforeach
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('articles.slug') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="slug_{{ $language->local }}"
                                            class="form-control {{ $errors->has('slug_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('articles.slug') }} {{ $language->name }}"
                                            value='{{ old("slug_{$language->local}", $article[$language->local]->slug ?? '') }}'>
                                    </div>
                                @endforeach
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label
                                            for="validationServer{{ $key }}">{{ __('articles.meta_description') }}
                                            {{ $language->name }}</label>
                                        <textarea id="myeditorinstance" name="meta_description_{{ $language->local }}"
                                            class="form-control {{ $errors->has('meta_description_' . $language->local) ? 'is-invalid' : '' }}"
                                            placeholder="{{ __('articles.meta_description') }} {{ $language->name }}" rows="4" style="height: 48px;">{{ old("meta_description_{$language->local}", $article[$language->local]->meta_description ?? '') }}</textarea>
                                    </div>
                                @endforeach
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('articles.keywords') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="keywords_{{ $language->local }}"
                                            class="form-control {{ $errors->has('keywords_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('articles.keywords') }} {{ $language->name }}"
                                            value='{{ old("keywords_{$language->local}", $article[$language->local]->keywords ?? '') }}'>
                                    </div>
                                @endforeach
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-12 mb-4">
                                        {{-- <button id="switchToArabic">AR</button> --}}
                                        <label for="validationServer{{ $key }}">{{ __('articles.description') }}
                                            {{ $language->name }}</label>
                                        <textarea id="myeditorinstance" name="description_{{ $language->local }}"
                                            class="form-control {{ $errors->has('description_' . $language->local) ? 'is-invalid' : '' }}"
                                            placeholder="{{ __('articles.meta_description') }} {{ $language->name }}" rows="4" style="height: 48px;">{{ old("description_{$language->local}", $article[$language->local]->description ?? '') }}</textarea>
                                    </div>
                                @endforeach
                                
                            </div>


                            
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('articles.type') }}</label>
                                <select name="type_id"
                                    class="form-select {{ $errors->has('type_id') ? 'is-invalid' : '' }}">
                                    <option value="">{{ __('dashboard.select') }}</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ isset($article) ? ($type->id == $article->type_id ? 'selected' : '') : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            @foreach (languages() as $key => $language)
                                <div class="col-md-3 mb-4">
                                    <label for="validationServer{">{{ __('articles.image_logo') }}
                                        {{ $language->name }}</label>
                                    <input type="text" name="image_logo_{{ $language->local }}"
                                        class="form-control {{ $errors->has('image_logo_' . $language->local) ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('articles.image_logo') }}" value="{{ old("image_logo_{$language->local}", $article[$language->local]->image_logo ?? '') }}">
                                </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                                <div class="col-md-3 mb-4">
                                    <label for="validationServer{">{{ __('articles.image') }}
                                        {{ $language->name }}</label>
                                    <input type="text" name="image_{{ $language->local }}"
                                        class="form-control {{ $errors->has('image_' . $language->local) ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('articles.image') }}" value="{{ old("image_{$language->local}", $article[$language->local]->image ?? '') }}">
                                </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                                <div class="col-md-3 mb-4">
                                    <label for="validationServer{">{{ __('articles.image_two') }}
                                        {{ $language->name }}</label>
                                    <input type="text" name="image_two_{{ $language->local }}"
                                        class="form-control {{ $errors->has('image_two_' . $language->local) ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('articles.image_two') }}" value="{{ old("image_two_{$language->local}", $article[$language->local]->image_two ?? '') }}">
                                </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                                <div class="col-md-3 mb-4">
                                    <label for="validationServer">{{ __('articles.user_image') }}
                                        {{ $language->name }}</label>
                                    <input type="text" name="user_image_{{ $language->local }}"
                                        class="form-control {{ $errors->has('user_image_' . $language->local) ? 'is-invalid' : '' }}"
                                        id="validationServer" placeholder="{{ __('articles.user_image') }}" value="{{ old("user_image_{$language->local}", $article[$language->local]->user_image ?? '') }}">

                                </div>
                            @endforeach
                        </div>
                        @if ($article ?? '' && $article->id)
                                @foreach (languages() as $key => $language)
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <img src="{{ asset($article[$language->local]->image_logo) }}"
                                                style="height: 10pc">

                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <img src="{{ asset($article[$language->local]->image) }}"
                                                style="height: 10pc">

                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <img src="{{ asset($article[$language->local]->image_two) }}"
                                                style="height: 10pc">

                                        </div>

                                        <div class="col-md-3 mb-4">
                                            <img src="{{ asset($article[$language->local]->user_image) }}"
                                                style="height: 10pc">


                                        </div>


                                    </div>
                                @endforeach
                            @endif
                    </div>
                    </div>

                        <button class="btn btn-md rounded font-sm hover-up">{{ __('dashboard.submit') }}</button>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')
    <script>
        // ClassicEditor
        //     .create(document.querySelector('#textarea1'), {
        //         ckfinder: {
        //             uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        //         }
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#textarea2'), {
        //         ckfinder: {
        //             uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        //         }
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#textareasub1'), {
        //         ckfinder: {
        //             uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        //         }
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
        // ClassicEditor
        //     .create(document.querySelector('#textareasub2'), {
        //         ckfinder: {
        //             uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        //         }
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     });
    </script>
    <script></script>
@endsection
@endsection
