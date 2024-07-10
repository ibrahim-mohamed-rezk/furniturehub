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
                <form method="post" enctype="multipart/form-data" action="{{ $action }}">
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('members.name')}}</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('members.name')}}" value='{{ old("name", $member->name ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('members.email')}}</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('members.email')}}" value='{{ old("email", $member->email ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('members.phone')}}</label>
                                    <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('members.phone')}}" value='{{ old("phone", $member->phone ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('members.password')}}</label>
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('members.password')}}" >
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('teams.photo') }}
                                    </label>
                                    <input type="file" name="photo"
                                           class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}"
                                           id="validationServer" placeholder="{{ __('teams.photo') }}"
                                           value='{{ old('photo') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                        <img src="{{asset($member->photo)}}" style="height:10pc">
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
