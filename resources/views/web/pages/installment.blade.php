@extends('web.layouts.container')
@section('style')
    <style>
        /* Add hover effect CSS */
        .image-hover {
            transition: opacity 0.3s ease-in-out;
        }

        .image-hover:hover {
            opacity: 0.8;
            /* Adjust the opacity value as needed */
        }
    </style>
@endsection
@section('content')
    <div class="container mt-30">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner 1.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 justify-content-center">
                <!-- Carousel Slider -->
                <div id="carouselLeftToRight" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row" style="margin-left:-200px">
                                @foreach ($firstPartition as $key => $row)
                                    <div class="col-2">
                                        <img class="d-block w-100" src="{{ $row['image'] }}" alt="Furniture Hub" loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row" style="margin-left:-200px">
                                @foreach ($secondPartition as $key => $row)
                                    <div class="col-2">
                                        <img class="d-block w-100" src="{{ $row['image'] }}" alt="Furniture Hub" loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Carousel Control Arrows -->
                    <a class="carousel-control-prev" href="#carouselLeftToRight" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselLeftToRight" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a> --}}
                    <!-- End Carousel Control Arrows -->
                </div>
                <!-- End Carousel Slider -->
            </div>
        </div>

    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <a href="{{ route('web.installment_pay') }}" class="w-100  image-hover"><img
                            src="{{ url('') }}/public/storage/Installment/bunner 2.jpg" alt="Furniture Hub" loading="lazy"
                            class="w-100  image-hover"></a>

                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner 3.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner a.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner b.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image"> 
                    <img src="{{ url('') }}/public/storage/Installment/bunner c.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner e.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner f.jpg" alt="Furniture Hub" loading="lazy"
                        class="w-100 image-hover">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('container_js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
