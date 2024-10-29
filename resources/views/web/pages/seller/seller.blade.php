@extends('web.layouts.container')

@section('styles')
    <link rel="stylesheet" href="{{url('') }}/assets/web/ASSets/css/seller.css">
@endsection

@section('content')
    <div class="container">
        <div class="content-wrapper">
            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('web.pages.seller.sellerPages.pageOne')
                @include('web.pages.seller.sellerPages.pageTwo')
                @include('web.pages.seller.sellerPages.pageThree')
            </form>

            <div class="page-img">
                <img src="{{asset($banner->image)}}" alt="{{$banner->name}}" />
            </div>
        </div>
    </div>
@endsection

@section('container_js')
    <script>
        const translations = @json(trans('web'));
    </script>

    <script src="{{url('') }}/assets/web/ASSets/js/seller.js">

    </script>
    <script>
        document.getElementById('specializationSelect').addEventListener('change', function() {
            const otherSpecializationDiv = document.getElementById('otherSpecializationDiv');

            // Check if the selected value is 'other'
            if (this.value === 'other') {
                otherSpecializationDiv.style.display = 'block'; // Show the textarea
            } else {
                otherSpecializationDiv.style.display = 'none'; // Hide the textarea
            }
        });
        document.addEventListener("DOMContentLoaded", function () {
            const nextOneButton = document.getElementById('nextOneButton');
            const nextTwoButton = document.getElementById('nextTwoButton');
            const backTwoButton = document.getElementById('backTwoButton');
            const backThreeButton = document.getElementById('backThreeButton');
            const pageOne = document.getElementById('pageOne');
            const pageTwo = document.getElementById('pageTwo');
            const pageThree = document.getElementById('pageThree');

            nextOneButton.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent form submission

                pageOne.style.display = 'none';
                pageTwo.style.display = 'block';


            });
            nextTwoButton.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent form submission

                pageTwo.style.display = 'none';
                pageThree.style.display = 'block';


            });
            backTwoButton.addEventListener("click",function (e) {
                e.preventDefault(); // Prevent form submission

                pageOne.style.display = 'block';
                pageTwo.style.display = 'none';

            });
            backThreeButton.addEventListener("click",function (e) {
                e.preventDefault(); // Prevent form submission

                pageTwo.style.display = 'block';
                pageThree.style.display = 'none';

            });
        });
    </script>
    <script>
        document.getElementById('governorate').addEventListener('change', function() {
            var governorateId = this.value;

            // Clear the cities dropdown
            var citySelect = document.getElementById('city');
            citySelect.innerHTML = '<option selected>{{__('web.select_the_city_to_which_you_belong')}}</option>';

            if (governorateId) {
                fetch(`/get-cities/${governorateId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(city => {
                            var option = document.createElement('option');
                            option.value = city.id;
                            option.text = city.name;
                            citySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching cities:', error));
            }
        });


    </script>
@endsection