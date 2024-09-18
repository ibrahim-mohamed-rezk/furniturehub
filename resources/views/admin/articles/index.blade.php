@extends('admin.layouts.container')

@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">{{ $title }}</h2>
            </div>
            <div>
                <a class="btn btn-primary btn-sm rounded" href="{{ $action }}">{{ $trashed_title }}</a>
            </div>
        </div>
        <div class="card mb-4">
            <form action="{{ $action }}">
                <header class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <input type="text" name="title" placeholder="{{ __($routes . '.title') }}"
                                class="form-control" value="{{ $request->title }}">
                        </div>
                        <div class="col-md-2 col-12 me-auto mb-md-0 mb-3">
                            <input type="text" class="form-control" disabled value="{{ isset($count) ? $count : '' }}">

                        </div>
                        <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                            <select name="user_id" class="form-control">
                                <option disabled selected>All</option>
                                @foreach ($users as $row)
                                    <option
                                        {{ isset($request->user_id) ? ($request->user_id == $row->id ? 'selected' : '') : '' }}
                                        value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-2 col-6">
                            <input class="form-control" type="date" name="start_date" value="{{ $request->start_date }}">
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
                @foreach ($articles as $key => $row)
                    <article class="itemlist">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-6">
                                <a class="itemside" href="#">
                                    <div class="left">
                                        <img class="img-sm img-thumbnail" src="{{ asset($row->user_image) }}"
                                            alt="Item">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="info">
                                    <h6 class="mb-0">{{ $row->title }}</h6>
                                    <div class="job">{{ $row->user }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 text-md-end">
                                @if (!$row->deleted_at)
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                        href="{{ route($routes . '.edit', $row->id) }}"><i
                                            class="material-icons md-edit"></i> {{ __('dashboard.edit') }}</a>
                                    @if ($row->show == 1)
                                        <h6 class="mb-0">{{ __('dashboard.published') }}</h6>
                                    @else
                                        <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                            href="{{ route($routes . '.show_article', $row->id) }}"><i
                                                class="material-icons md-edit"></i> {{ __('dashboard.publish') }}</a>
                                    @endif
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-2"
                                            href="{{ route($routes . '.show', $row->id) }}" target="_blank"><i
                                                class="material-icons md-edit"></i> {{ __('dashboard.show') }}</a>
                                    <a class="btn btn-sm font-sm rounded btn-brand mr-5" href="javascript:void(0);" onclick="shareBlog('{{ $row->url }}')">
                                        <i class="material-icons md-show"></i> {{ __('dashboard.share') }}
                                    </a>
                                @endif
                                <button class="btn btn-sm font-sm btn-light rounded" onclick="deleteRow(this)"
                                    href="https://furniturehubapp.com/en/admin/articles/{{ $row->id }}"><i
                                        class="material-icons md-delete_forever"></i>
                                    {{ __('dashboard.' . $delete_button) }}</button>
                            </div>
                        </div>
                        <!-- row .//-->
                    </article>
                @endforeach
            </div>

        </div>
        <!-- card end//-->
        <div class="pagination-area mt-30 mb-50">
            {!! $articles->appends($_GET)->links() !!}
        </div>
    </section>
@endsection
@section('inner_js')
    <script>
        function shareBlog(url) {
            const courseUrl = `${url}`;
    
            if (navigator.share) {
                navigator.share({
                    title: 'Check out this blog',
                    text: 'Take a look at this furniture blog!',
                    url: url
                }).then(() => {
                    console.log('Successful share');
                }).catch((error) => {
                    console.error('Error sharing', error);
                });
            } else {
                // Fallback if navigator.share is not supported
                alert('Share not supported on this browser. Copy this link: ' + url);
            }
        }
    </script>

@endsection