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
                    @if($country ?? ''  && $country->id)
                        {{method_field('patch')}}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @foreach(languages() as $key=>$language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{$key}}">{{__('countries.name')}} {{$language->name}}</label>
                                        <input type="text" name="name_{{$language->local}}" class="form-control {{ $errors->has('name_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('countries.name')}} {{$language->name}}" value='{{ old("name_{$language->local}", $country[$language->local]->name ?? "") }}'>
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

@endsection

@endsection
