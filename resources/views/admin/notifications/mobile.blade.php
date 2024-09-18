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
                <a href="{{ route('notifications.index') }}" class="btn btn-primary">{{ __('notifications.index') }}</a>
            </div>
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data" action="{{ $action }}">
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('notifications.email') }}</label>
                                    <select id="userSelect" name="user_id" class="form-select">
                                        <option value="">{{ __('notifications.all') }}</option>
                                        <option value="registered">{{ __('notifications.registered') }}</option>
                                        <option value="not_registered">{{ __('notifications.not_registered') }}</option>
                                        @foreach ($users as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('notifications.link') }}</label>
                                    <input type="file" class="form-control" name="link">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="validationServerName">{{ __('notifications.name') }}</label>
                                    <input type="text" name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        id="validationServerName" placeholder="{{ __('notifications.name') }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="validationServerDescription">{{ __('notifications.description') }}</label>
                                    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('notifications.description') }}" rows="4" style="height: 48px;"></textarea>
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
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (necessary for Select2) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

    <script>
        // Initialize Select2
        $(document).ready(function() {
            $('#userSelect').select2();
        });
    </script>
@endsection
@endsection
