@extends('admin.layouts.container')

@section('content')



    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">{{$title}}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data" action="{{$action}}">
                    @if($page ?? ''  && $page->id)
                        {{method_field('patch')}}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">

                                @foreach(languages() as $key=>$language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('pages.title')}} {{$language->name}}</label>
                                        <input type="text" name="title_{{$language->local}}" class="form-control {{ $errors->has('title_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('pages.title')}} {{$language->name}}" value='{{ old("title_{$language->local}", $page[$language->local]->title ?? "") }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('pages.slug')}} {{$language->name}}</label>
                                        <input type="text" name="slug_{{$language->local}}" class="form-control {{ $errors->has('slug_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('pages.slug')}} {{$language->name}}" value='{{ old("slug_{$language->local}", $page[$language->local]->slug ?? "") }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('pages.keywords')}} {{$language->name}}</label>
                                        <input type="text" name="keywords_{{$language->local}}" class="form-control {{ $errors->has('keywords_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('pages.keywords')}} {{$language->name}}" value='{{ old("keywords_{$language->local}", $page[$language->local]->keywords ?? "") }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('pages.meta_description')}} {{$language->name}}</label>
                                        <textarea type="text" name="meta_description_{{$language->local}}" class="form-control {{ $errors->has('meta_description_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('pages.meta_description')}} {{$language->name}}">{{ old("meta_description_{$language->local}", $page[$language->local]->meta_description ?? "") }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{__('pages.description')}} {{$language->name}}</label>
                                        <textarea type="text" name="description_{{$language->local}}" class="form-control {{ $errors->has('description_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('pages.description')}} {{$language->name}}">{{ old("description_{$language->local}", $page[$language->local]->description ?? "") }}</textarea>
                                    </div>
                                @endforeach
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('pages.image') }}</label>
                                    <input type="file" name="image"
                                           class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('pages.image') }}">
                                </div>
                                    <div class="col-md-6 mb-4">
                                        <img src="{{asset($page->image)}}" style="margin-top: 15px;height: 5pc;width: 15pc;">
                                    </div>

                            </div>
                            <button class="btn btn-md rounded font-sm hover-up">{{__('dashboard.submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')

@endsection

@endsection
