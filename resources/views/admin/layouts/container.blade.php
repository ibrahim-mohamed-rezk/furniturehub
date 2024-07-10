@extends('admin.layouts.layout')

@section('container_content')

    @include('admin.layouts.sidebar')
    <main class="main-wrap">

        @include('admin.layouts.header')
        @if (session('error'))
            <div class="alert alert-danger">
                
                {{ session('error') }}
            </div>
        @endif
        <div style="display:none" class="alert alert-danger" id="errors"></div>
        @if (count($errors))
            <div class="alert alert-danger">
                
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy;, Ecom - HTML Ecommerce Template .
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">All rights reserved</div>
            </div>
        </div>
    </footer>
@endsection
