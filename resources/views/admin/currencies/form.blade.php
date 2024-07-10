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
                    @if($currency ?? ''  && $currency->id)
                        {{method_field('patch')}}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('currencies.symbol')}}</label>
                                    <input type="text" name="symbol" class="form-control {{ $errors->has('symbol') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('currencies.symbol')}}" value='{{ old("symbol", $currency->symbol ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('currencies.value')}}</label>
                                    <input type="number" step=".01" name="value" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('currencies.value')}}" value='{{ old("value", $currency->value ?? "") }}'>
                                </div>

                                @foreach(languages() as $key=>$language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{$key}}">{{__('currencies.name')}} {{$language->name}}</label>
                                        <input type="text" name="name_{{$language->local}}" class="form-control {{ $errors->has('name_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('currencies.name')}} {{$language->name}}" value='{{ old("name_{$language->local}", $currency[$language->local]->name ?? "") }}'>
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
