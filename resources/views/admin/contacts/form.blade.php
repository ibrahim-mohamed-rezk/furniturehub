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
                                    <label for="validationServer">{{__('contacts.name')}}</label>
                                    <input type="text" n class="form-control" id="validationServer" disabled placeholder="{{__('contacts.name')}}" value='{{ $contact->name }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('contacts.email')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled placeholder="{{__('contacts.email')}}" value='{{ $contact->email }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('contacts.phone')}}</label>
                                    <input type="text"  class="form-control" id="validationServer" disabled placeholder="{{__('contacts.phone')}}" value='{{ $contact->phone }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="validationServer">{{__('contacts.subject')}}</label>
                                    <input type="text" class="form-control" id="validationServer" disabled placeholder="{{__('contacts.subject')}}" value='{{ $contact->subject }}'>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="validationServer">{{__('contacts.message')}}</label>
                                    <textarea type="text"  class="form-control" id="validationServer" disabled placeholder="{{__('contacts.message')}}">{{ $contact->message }}</textarea>
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
