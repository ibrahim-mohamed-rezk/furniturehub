@extends('admin.layouts.layout')
@section('container_content')

    <main >
        <section class="content-main">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{__('web.sign_in')}}</h4>
                    <form method="POST" action="{{$action}}">
                        @CSRF

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(count($errors))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </div>
                        @endif

                        <div class="mb-3">
                            <input class="form-control" name="email" placeholder="{{__('web.email')}}" type="email">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" name="password" placeholder="{{__('web.password')}}" type="password">
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <label class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" checked=""><span class="form-check-label">{{__('web.remeber')}}</span>--}}
{{--                            </label>--}}
{{--                        </div>--}}
                        <div class="mb-4">
                            <button class="btn btn-primary w-100" type="submit"> {{__('web.login')}}</button>
                        </div>

                    </form>
                    </div>
            </div>
        </section>

    </main>

@stop
