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
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <input type="number" name="id" placeholder="{{__($routes.'.id')}}" class="form-control" value="{{$request->id}}">
                        </div>
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <input type="text" name="user" placeholder="{{__($routes.'.user')}}" class="form-control" value="{{$request->user}}">
                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="start_date" value="{{$request->start_date}}">
                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="end_date" value="{{$request->end_date}}">
                        </div>
                        <div class="col-md-2 col-6">
                            <button type="submit" class="btn btn-primary form-control" style="color:white"> {{__('dashboard.search')}}   </button>
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
                                <th scope="col">{{ __('affiliates.total') }}</th>
                                <th scope="col">{{ __('affiliates.profit') }}</th>
                                <th scope="col">{{ __('affiliates.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><b>{{ $row->user->name }}</b></td>
                                    <td><b>{{ $row->user->email }}</b></td>
                                    <td>{{ $row->total }} </td>
                                    <td>{{ $row->affiliate_profit }} </td>
                                    @if (!$row->deleted_at)
                                        <td>
                                            <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                                href="{{ route('orders.show', $row->id) }}"><i
                                                    class="material-icons md-edit"></i>
                                                {{ __('dashboard.show') }}</a>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach

                        </tbody>
                        {{-- <tfoot>
                            <tr>

                                <th>#ID</th>
                                <th scope="col">{{ __('affiliates.name') }}</th>
                                <th scope="col">{{ __('affiliates.email') }}</th>
                                <th scope="col">{{ __('affiliates.total') ." : ". $totals }}</th>
                                <th scope="col">{{ __('affiliates.profit') ." : " . $profits }}</th>
                                <th scope="col">{{ __('affiliates.actions') }}</th>
                            </tr>

                        </tfoot> --}}
                    </table>
                </div>

            </div>
        </div>
        <!-- card end//-->
        <div class="pagination-area mt-30 mb-50">
            {!! $orders->appends($_GET)->links() !!}
        </div>
    </section>

@endsection
