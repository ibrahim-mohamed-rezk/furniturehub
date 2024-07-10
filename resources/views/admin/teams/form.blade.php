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
                    @if ($team ?? '' && $team->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">

                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('teams.name') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="name_{{ $language->local }}"
                                            class="form-control {{ $errors->has('name_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('teams.name') }} {{ $language->name }}"
                                            value='{{ old("name_{$language->local}", $team[$language->local]->name ?? '') }}'>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('teams.job') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="job_{{ $language->local }}"
                                            class="form-control {{ $errors->has('job_' . $language->local) ? 'is-invalid' : '' }}"
                                            id="validationServer{{ $key }}"
                                            placeholder="{{ __('teams.job') }} {{ $language->name }}"
                                            value='{{ old("job_{$language->local}", $team[$language->local]->job ?? '') }}'>
                                    </div>
                                @endforeach


                                <div class="col-md-6 mb-4">
                                    <label for="validationServer{{ $key }}">{{ __('teams.image') }}
                                    </label>
                                    <input type="file" name="image"
                                        class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                        id="validationServer{{ $key }}" placeholder="{{ __('teams.image') }}"
                                        value='{{ old('image') }}'>
                                </div>

                                @if ($team ?? '' && $team->id)
                                    <div class="col-md-6 mb-4">
                                        <img src="{{asset($team->image)}}" style="height: 20pc">
                                    </div>
                                @endif
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
