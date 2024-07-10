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
                    @if ($offer ?? '' && $offer->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                @if ($offer ?? '' && $offer->id)
                                    <div class="col-md-6 mb-4">
                                        <label>{{ __('offers.status') }} </label>
                                        <select name="status" class="form-select">
                                            <option value="value" @if ('value' == $offer->status) selected @endif>Value</option>
                                            <option value="percentage" @if ('percentage' == $offer->status) selected @endif>Percentage</option>
                                        </select>
                                    </div>
                                @else

                                    <div class="col-md-6 mb-4">
                                        <label>{{ __('offers.status') }} </label>
                                        <select name="status" class="form-select">
                                            <option value="value">Value</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                @endif

                                <div class="col-md-6 mb-4">
                                    <label>{{ __('offers.discount') }} </label>
                                    <input type="text" name="discount"
                                        class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('offers.discount') }} "
                                        value='{{ old('discount', $offer->discount ?? '') }}'>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>{{ __('offers.start_date') }} </label>
                                    <input type="date" name="start_date"
                                        class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('offers.start_date') }} "
                                        value='{{ old('start_date', $offer->start_date ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label>{{ __('offers.end_date') }} </label>
                                    <input type="date" name="end_date"
                                        class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('offers.end_date') }} "
                                        value='{{ old('end_date', $offer->end_date ?? '') }}'>
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
