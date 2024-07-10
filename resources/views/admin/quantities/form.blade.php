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
                <form>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('quantities.name') }}</label>
                                    <input type="text" n class="form-control" id="validationServer" disabled
                                        value='{{ $quantity->name }}'>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('quantities.phone') }}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled
                                        value='{{ $quantity->phone }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('quantities.phone') }}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled
                                        value='{{ $quantity->phone }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('quantities.business_activity') }}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled
                                        value='{{ $quantity->business_activity }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{ __('quantities.Notes') }}</label>
                                    <textarea  class="form-control" id="validationServer" cols="30" rows="10" disabled>{{ $quantity->notes }}</textarea>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-lg-12 row">
                                <div class="col-lg-12">
                                    <h5>{{ __('quantities.normal') }}</h5>
                                </div>
                                @foreach ($quantity->normalImages as $image)
                                    <div class="col-lg-4">
                                        <img src="{{ asset($image->image) }}" style="height: 20pc">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')
@endsection

@endsection
