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
                    @if($governorate ?? ''  && $governorate->id)
                        {{method_field('patch')}}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('governorates.delivery_cost')}}</label>
                                    <input type="number" name="delivery_cost" class="form-control {{ $errors->has('delivery_cost') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('governorates.delivery_cost')}}" value='{{ old("delivery_cost", $governorate->delivery_cost ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4"></div>

                                @foreach(languages() as $key=>$language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{$key}}">{{__('governorates.name')}} {{$language->name}}</label>
                                        <input type="text" name="name_{{$language->local}}" class="form-control {{ $errors->has('name_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('governorates.name')}} {{$language->name}}" value='{{ old("name_{$language->local}", $governorate[$language->local]->name ?? "") }}'>
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
