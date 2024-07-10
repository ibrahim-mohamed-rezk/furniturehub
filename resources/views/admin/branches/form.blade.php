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
                    @if($branch ?? ''  && $branch->id)
                        {{method_field('patch')}}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @foreach(languages() as $key=>$language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{$key}}">{{__('branches.address')}} {{$language->name}}</label>
                                        <input type="text" name="address_{{$language->local}}" class="form-control {{ $errors->has('address_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('branches.address')}} {{$language->name}}" value='{{ old("address_{$language->local}", $branch[$language->local]->address ?? "") }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{$key}}">{{__('branches.work_time')}} {{$language->name}}</label>
                                        <input type="text" name="work_time_{{$language->local}}" class="form-control {{ $errors->has('work_time_'.$language->local) ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('branches.work_time')}} {{$language->name}}" value='{{ old("work_time_{$language->local}", $branch[$language->local]->work_time ?? "") }}'>
                                    </div>
                                @endforeach


                                <div class="col-md-6 mb-4">
                                    <label for="validationServer{{$key}}">{{__('branches.email')}}</label>
                                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('branches.email')}}" value='{{ old("email", $branch->email ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer{{$key}}">{{__('branches.phone')}}</label>
                                    <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="validationServer{{$key}}" placeholder="{{__('branches.phone')}}" value='{{ old("phone", $branch->phone ?? "") }}'>
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
