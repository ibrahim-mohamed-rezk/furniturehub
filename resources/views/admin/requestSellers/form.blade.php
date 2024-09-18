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
                                    <label for="validationServer">{{__('demands.name')}}</label>
                                    <input type="text" n class="form-control" id="validationServer" disabled  value='{{ $sellerRequest->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.governorate')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled  value='{{ $sellerRequest->governorate->descriptions()->name}}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.phone')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $sellerRequest->phone }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.date')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $sellerRequest->created_at->format('Y-m-d') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.brand_name')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $sellerRequest->brand_name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.website_link')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $sellerRequest->website_link }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.social_media_page')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $sellerRequest->social_media_page }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.section')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $sellerRequest->section }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.question')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $sellerRequest->question }}'>
                                </div>
                                {{-- <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.twoD')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$sellerRequest->twoD) }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.threeD')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$sellerRequest->threeD) }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.size')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$sellerRequest->size) }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.cost_status')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$sellerRequest->cost_status) }}'>
                                </div> --}}
                                {{-- <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{__('demands.address')}}</label>
                                    <textarea type="text"  class="form-control" id="validationServer" >{{ $sellerRequest->address }}</textarea>
                                </div> --}}

                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-lg-12 row">
                                <div class="col-lg-12">
                                    <h5>{{__('demands.normal')}}</h5>
                                </div>
                                @foreach($sellerRequest->normalImages as $image)
                                    <div class="col-lg-4">
                                        <img src="{{asset($image->image)}}" style="height: 20pc">
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
