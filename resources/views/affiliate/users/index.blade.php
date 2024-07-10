@extends('admin.layouts.container')

@section('content')


    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">{{$title}}</h2>
            </div>
            {{-- <div>
                <a class="btn btn-primary btn-sm rounded" href="{{$action}}">{{$trashed_title}}</a></div> --}}
        </div>
        <div class="card mb-4">
            <form action="{{$action}}">
                <header class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                            <input user="text" name="name" placeholder="{{__($routes.'.name')}}" class="form-control" value="{{$request->name}}">
                        </div>
                        <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                            <input user="text" name="email" placeholder="{{__($routes.'.email')}}" class="form-control" value="{{$request->email}}">
                        </div>
                        <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                            <input user="number" name="phone" placeholder="{{__($routes.'.phone')}}" class="form-control" value="{{$request->phone}}">
                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="start_date" value="{{$request->start_date}}">
                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="end_date" value="{{$request->end_date}}">
                        </div>
                        <div class="col-md-2 col-6">
                            <button user="submit" class="btn btn-primary form-control" style="color:white"> {{__('dashboard.search')}}   </button>
                        </div>
                    </div>
                </header>
            </form>
            <!-- card-header end//-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th scope="col">{{ __('affiliates.name') }}</th>
                                <th scope="col">{{ __('affiliates.email') }}</th>
                                <th scope="col">{{ __('affiliates.phone') }}</th>
                                <th scope="col">{{ __('affiliates.created_at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><b>{{ $row->name }}</b></td>
                                    <td><b>{{ $row->email }}</b></td>
                                    <td><b>{{ $row->phone }}</b></td>
                                    <td>{{ $row->created_at->format('Y M d') }} </td>
                                    

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- card end//-->
        <div class="pagination-area mt-30 mb-50">
            {!! $members->appends($_GET)->links() !!}
        </div>
    </section>

@endsection
