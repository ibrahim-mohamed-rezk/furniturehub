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
                                    <input type="text" n class="form-control" id="validationServer" disabled  value='{{ $demand->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.governorate')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled  value='{{ $demand->governorate->descriptions()->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.phone')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled value='{{ $demand->phone }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.date')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ $demand->date }}'>
                                </div>
                                <!-- <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.twoD')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$demand->twoD) }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.threeD')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$demand->threeD) }}'>
                                </div> -->
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.size')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$demand->size) }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('demands.cost_status')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled value='{{ __('demands.'.$demand->cost_status) }}'>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{__('demands.address')}}</label>
                                    <textarea type="text"  class="form-control" id="validationServer" >{{ $demand->address }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    @if($demand->file)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>{{__('demands.pdf')}}</h5>
                                <a href="{{asset($demand->file)}}" target="_blank" class="btn btn-md rounded font-sm hover-up">{{ __('demands.show_file') }}</a>
                            </div>
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-lg-12 row">
                                <div class="col-lg-12">
                                    <h5>{{__('demands.image')}}</h5>
                                </div>
                                @foreach($demand->normalImages as $image)
                                    <div class="col-lg-4">
                                        <img src="{{asset($image->image)}}" style="height: 20pc">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="col-lg-12 row">
                                <div class="col-lg-12">
                                    <h5>{{__('demands.extension')}}</h5>
                                </div>
                                @foreach($demand->extensionImages as $image)
                                    <div class="col-lg-4">
                                        <img src="{{asset($image->image)}}" style="height: 20pc">
                                        <h5>{{$image->sizes}}</h5>
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
