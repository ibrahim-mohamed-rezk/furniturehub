@extends('admin.layouts.container')

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-6">
                <div class="content-header">
                    <h2 class="content-title">{{ $title }}</h2>
                </div>
            </div>
            <div class="col-6">
                <a href="{{ route('notifications.mobile_notification') }}" class="btn btn-primary">{{__('notifications.mobile_notifications')}}</a>
            </div>
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data" action="{{ $action }}">
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('notifications.email')}}</label>
                                    <select name="user_id" class="form-select">
                                        <option value="">{{__('notifications.all')}}</option>
                                        
                                        @foreach ($users as $row)
                                            <option value="{{ $row->id }}"> {{ $row->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
         
                                
                                
                                @foreach (languages() as $key => $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('notifications.name') }}
                                            {{ $language->name }}</label>
                                        <input type="text" name="name_{{ $language->local }}"
                                               class="form-control {{ $errors->has('name_' . $language->local) ? 'is-invalid' : '' }}"
                                               id="validationServer{{ $key }}"
                                               placeholder="{{ __('notifications.name') }} {{ $language->name }}">
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer{{ $key }}">{{ __('notifications.description') }}
                                            {{ $language->name }}</label>
                                        <textarea name="description_{{ $language->local }}"
                                                  class="form-control {{ $errors->has('description_' . $language->local) ? 'is-invalid' : '' }}"
                                                  placeholder="{{ __('notifications.description') }} {{ $language->name }}" rows="4" style="height: 48px;"></textarea>
                                    </div>
                                @endforeach


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
