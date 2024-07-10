@extends('web.layouts.container')

@section('content')


        <div class="section-box">
            <div class="breadcrumbs-div">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a class="font-xs color-gray-1000" href="{{route('web.index')}}">Home</a></li>
                        <li><a class="font-xs color-gray-500" href="#">{{$page->title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="section-box shop-template mt-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto page-content">
                        <h2 class="text-center mb-20">{{$page->title}}</h2><img class="mb-30" src="{{asset($page->image)}}" alt="Furniture Hub">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </section>

@stop