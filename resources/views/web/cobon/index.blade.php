@extends('web.layouts.container')


@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{route('web.index')}}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="#">{{ __('web.cobon') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="section-box shop-template mt-30">
        <div class="container">

            <div class="row mt-30">
                @foreach ($cobons as $key => $row)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-40">
                        <div class="card-grid-style-1">
                            <div class="image-box">
                                <img src="{{ asset($row->image) }}" alt="{{ $row->code }}" loading="lazy" height="237" width="316"></div>

                                <h4>{{ $row->code }}</h4>
                            <div class="mt-20"><span
                                        class="color-gray-500 font-xs mr-30">{{ $row->start_date }} - {{ $row->end_date }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
