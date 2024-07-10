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
                    @if ($accept ?? '' && $accept->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-6 mb-4">
                                    <label>{{ __('accepts.code') }} </label>
                                    <input type="text" name="code"
                                           class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                           placeholder="{{ __('accepts.code') }} "
                                           value='{{ old('code', $accept->code ?? '') }}'>
                                </div>



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
