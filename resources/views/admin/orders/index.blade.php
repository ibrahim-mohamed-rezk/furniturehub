@extends('admin.layouts.container')

@section('content')


<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">{{$title}}</h2>
        </div>
        <div>
            <a class="btn btn-primary btn-sm rounded" href="{{$action}}">{{$trashed_title}}</a>
        </div>
    </div>
    <div class="card mb-4">
        <form action="{{$action}}">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                        <input type="number" name="id" placeholder="{{__($routes.'.id')}}" class="form-control" value="{{$request->id}}">
                    </div>
                    <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                        <input type="text" name="user" placeholder="{{__($routes.'.user')}}" class="form-control" value="{{$request->user}}">
                    </div>
                    <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                        <input type="text" class="form-control" disabled value="{{isset($count) ? $count : "" }}">
                    </div>
                    <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                        <input type="text" class="form-control" disabled value="{{isset($sum) ? $sum : "" }}">
                    </div>
                    <div class="col-md-2 col-6">
                        <input class="form-control" type="date" name="start_date" value="{{$request->start_date}}">
                    </div>
                    <div class="col-md-2 col-6">
                        <input class="form-control" type="date" name="end_date" value="{{$request->end_date}}">
                    </div>
                    <div class="col-md-2 col-6">
                        <button type="submit" class="btn btn-primary form-control" style="color:white"> {{__('dashboard.search')}} </button>
                    </div>
                </div>
            </header>
        </form>
        <!-- card-header end//-->
        <div class="card-body">
            @foreach($orders as $key => $row)
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-sm-4 col-8 flex-grow-1 col-name">
                        <div class="info">
                            <h6 class="mb-0">{{$row->id}}</h6>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-4 col-8 flex-grow-1 col-name">
                        <div class="info">
                            <h6 class="mb-0">{{$row->user->name}}</h6>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-8 flex-grow-1 col-name">
                        <div class="info">
                            <h6 class="mb-0">{{$row->created_at->format('Y-m-d')}}</h6>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4 col-8 flex-grow-1 col-name">
                        <div class="info">
                            <h6 class="mb-0">{{$row->total}}</h6>
                        </div>
                    </div>

                    @if($row->payment)
                    <div class="col-lg-2 col-sm-4 col-8 flex-grow-1 col-name">
                        <div class="info">
                            <h6 class="mb-0">{{$row->payment->payment_type}}</h6>
                        </div>
                    </div>
                    @if($row->label)
                    <div class="col-lg-2 col-sm-4 col-8 flex-grow-1 col-name">
                        <div class="info">
                            <h6 class="mb-0 text-success">{{ $row->label }}</h6>
                        </div>
                    </div>
                    @else
                    <div class="col-lg-2 col-sm-4 col-8 flex-grow-1 col-name">

                        <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="{{ route('orders.confirm',$row->id) }}"><i class="material-icons md-edit"></i> {{ __('carts.confirm') }}</a>
                    </div>
                    @endif
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                        @if (!$row->deleted_at)
                        <a class="btn btn-sm font-sm rounded btn-brand mr-2" href="{{ route($routes . '.show', $row->id) }}"><i class="material-icons md-edit"></i> {{ __('dashboard.show') }}</a>
                        @endif
                        <a class="btn btn-sm font-sm btn-light rounded" onclick="deleteRow(this)" href="{{route($routes.'.destroy', $row->id)}}#"><i class="material-icons md-delete_forever"></i> {{__('dashboard.'.$delete_button)}}</a>
                    </div>
                    @endif

                </div>
                <!-- row .//-->
            </article>
            @endforeach
        </div>
    </div>
    <!-- card end//-->
    <div class="pagination-area mt-30 mb-50">
        {!! $orders->appends($_GET)->links() !!}
    </div>
</section>

@endsection