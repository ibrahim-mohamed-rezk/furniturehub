@extends('admin.layouts.container')

@section('content')



<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-request">{{$title}}</h2>
            </div>
        </div>
        <div class="col-lg-12">
            <form method="post" enctype="multipart/form-data" action="{{$action}}">
                @if($faq ?? '' && $faq->id)
                {{method_field('patch')}}
                @endif
                @CSRF
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">

                            @foreach(languages() as $key=>$language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{__('faqs.request')}} {{$language->name}}</label>
                                <input type="text" name="request_{{$language->local}}" class="form-control {{ $errors->has('request_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('faqs.request')}} {{$language->name}}" value='{{ old("request_{$language->local}", $faq[$language->local]->request ?? "") }}'>
                            </div>
                            @endforeach

                            @foreach(languages() as $key=>$language)

                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{__('faqs.response')}} {{$language->name}}</label>
                                <textarea id="textarea{{$key+1}}"  name="response_{{ $language->local }}" class="form-control {{ $errors->has('response_' . $language->local) ? 'is-invalid' : '' }}" placeholder="{{ __('faqs.response') }} {{ $language->name }}" rows="4" style="height: 48px;">{{ old("response_{$language->local}", $faq[$language->local]->response ?? '') }}</textarea>
                            </div>

                            @endforeach


                        </div>
                        <button class="btn btn-md rounded font-sm hover-up">{{__('dashboard.submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


@section('inner_js')
    <script>
        ClassicEditor
            .create(document.querySelector('#textarea1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#textarea2'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#textareasub1'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#textareasub2'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

@endsection