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
                <form >

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('rates.user')}}</label>
                                    <input type="text" n class="form-control" id="validationServer" disabled placeholder="{{__('rates.user')}}" value='{{ $rate->user->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('rates.product')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled placeholder="{{__('rates.product')}}" value='{{ $rate->product->descriptions()->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('rates.rate')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled placeholder="{{__('rates.rate')}}" value='{{ $rate->rate }}'>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{__('rates.comment')}}</label>
                                    <textarea type="text"  class="form-control" id="validationServer" disabled placeholder="{{__('rates.comment')}}">{{ $rate->comment }}</textarea>
                                </div>

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
