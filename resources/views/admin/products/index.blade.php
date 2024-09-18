@extends('admin.layouts.container')

@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">{{ $title }}</h2>
            </div>
            <div>
                <a class="btn btn-primary btn-sm rounded" form="products_form"
                    href="{{ $action }}">{{ $trashed_title }}</a>
            </div>
        </div>
        <div class="card mb-4">
            <form id="products_form" action="{{ $action }}">
                <header class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <input type="text" name="title" placeholder="{{ __($routes . '.title') }}"
                                class="form-control" value="{{ $request->title }}">
                        </div>
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <input type="text" name="sku" placeholder="{{ __($routes . '.sku') }}"
                                class="form-control" value="{{ $request->sku }}">
                        </div>
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <select name="offer" class="form-control">
                                <option value="all" selected>{{ __('web.offer') }}</option>
                                <option {{ isset($request->offer) ? ($request->offer == 'yes' ? 'selected' : '') : '' }}
                                    value="yes">Yes</option>
                                <option {{ isset($request->offer) ? ($request->offer == 'no' ? 'selected' : '') : '' }}
                                    value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <select name="category_id[]" class="form-control">
                                <option disabled selected>All</option>
                                @foreach ($categories as $row)
                                    <option
                                        {{ isset($request->category) ? ($request->category == $row->id ? 'selected' : '') : '' }}
                                        value="{{ $row->id }}">{{ $row->title }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                            <input type="text" class="form-control" disabled value="{{ isset($count) ? $count : '' }}">

                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="start_date"
                                value="{{ $request->start_date }}">
                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="end_date" value="{{ $request->end_date }}">
                        </div>
                        <div class="col-md-2 col-6">
                            <button type="submit" class="btn btn-primary form-control" style="color:white">
                                {{ __('dashboard.search') }} </button>
                        </div>
                    </div>
                </header>
            </form>
            <!-- card-header end//-->
            <div class="card-body">
                @foreach ($products as $key => $row)
                    <product class="itemlist">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6">
                                <a class="itemside" href="#">
                                    <div class="left">
                                        <img class="img-sm img-thumbnail" src="{{ asset($row->image) }}" alt="Item">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="info">
                                    <h6 class="mb-0">{{ $row->name }}</h6>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="info">
                                    <h6 class="mb-0">{{ $row->sku_code }}</h6>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6">
                                @if ($row->cost_discount)
                                    <div class="info">
                                        <h6 class="mb-0">{{ $row->cost_discount }}</h6>
                                    </div>
                                @else
                                    <div class="info">
                                        <h6 class="mb-0">{{ $row->cost }}</h6>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-3 col-md-12 text-md-end">
                                @if (!$row->deleted_at)
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                        href="{{ route($routes . '.edit', $row->id) }}" target="_blank" ><i
                                            class="material-icons md-edit" ></i> {{ __('dashboard.edit') }}</a>
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                        href="{{ $row->url }}" target="_blank"><i
                                            class="material-icons md-edit"></i> {{ __('dashboard.show') }}</a>
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="javascript:void(0);" onclick="shareProduct('{{ $row->url }}')">
                                        <i class="material-icons md-show"></i> {{ __('dashboard.share') }}
                                    </a>
                                @endif
                                <button class="btn btn-sm font-sm btn-light rounded" onclick="deleteRow(this)"
                                    href="{{ route($routes . '.destroy', $row->id) }}#"><i
                                        class="material-icons md-delete_forever"></i>
                                    {{ __('dashboard.' . $delete_button) }}</button>
                                <button class="btn btn-sm font-sm btn-light rounded" onclick="confirmDelete(this)"
                                    href="{{ route($routes . '.force_delete', $row->id) }}#"><i
                                        class="material-icons md-delete_forever"></i>
                                    {{ __('dashboard.force_delete') }}</button>

                            </div>
                        </div>
                        <!-- row .//-->
                    </product>
                @endforeach
            </div>

        </div>
        <!-- card end//-->
        <div class="pagination-area mt-30 mb-50">
            {!! $products->appends($_GET)->links() !!}
        </div>
    </section>
@endsection
@section('inner_js')
    <script>
        function shareProduct(url) {
            const productUrl = `${url}`;
    
            if (navigator.share) {
                navigator.share({
                    title: 'Check out this produt',
                    text: 'Take a look at this furniture produt!',
                    url: productUrl
                }).then(() => {
                    console.log('Successful share');
                }).catch((error) => {
                    console.error('Error sharing', error);
                });
            } else {
                // Fallback if navigator.share is not supported
                alert('Share not supported on this browser. Copy this link: ' + productUrl);
            }
        }
    </script>

@endsection