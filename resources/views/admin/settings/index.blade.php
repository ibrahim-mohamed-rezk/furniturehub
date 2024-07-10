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
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('settings.paginate_dashboard')}}</label>
                                    <input type="number" name="paginate_dashboard" class="form-control {{ $errors->has('paginate_dashboard') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{__('settings.paginate_dashboard')}}" value='{{ old("paginate_dashboard", $settings['paginate_dashboard'] ?? "") }}'>
                                </div>
                                <div class="col-md-6 mb-4"></div>


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
