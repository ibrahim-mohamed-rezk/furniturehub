@extends('web.layouts.container')
@section('content')
    <div class="section-box">
        <div class="breadcrumbs-div">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                    <li><a class="font-xs color-gray-500" href="{{ route('web.installment') }}">{{ __('web.instalment') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-30">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Centered Big Image -->
                <div class="d-flex justify-content-center align-items-center big-image">
                    <img src="{{ url('') }}/public/storage/Installment/bunner 1.jpg" alt="Furniture Hub" loading="lazy" class="w-100 image-hover"
                        style="
        height: 280px; margin-bottom:50px">
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="p-4 border rounded text-center"
                    style="background-color: #f36621; margin-top: 100px; height: 120px; width: 318px;">
                    <div id="resultArea" class="mt-3">
                        <p style="font-size: 30px; color: white;">
                            <span class="result-value" id="result" style="display: none;"></span>
                            <span class="result-label">{{ __('web.EGP') }}</span>
                        </p>
                    </div>
                    <br>
                    <p style="font-size: 30px; color: white;">
                        {{ __('web.mothly') }}
                    </p>
                </div>
            </div>




            <div class="col-md-6">
                <!-- Form Design -->
                <form id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('web.price') }}</label>
                        <input type="number" class="form-control" id="price" name="price"
                            placeholder="{{ __('web.price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="bank" class="form-label">{{ __('web.select_bank') }}</label>
                        <select class="form-select" id="bank" name="bank">
                            <option value="" disabled selected>{{ __('web.choose_a_bank') }}</option>
                            @foreach ($banks as $key => $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="period" class="form-label">{{ __('web.select_period') }}</label>
                        <select class="form-select" id="period" name="period">
                            <option value="">{{ __('web.choose_a_period') }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input class="form-control" id="message" placeholder="%" readonly>
                        <input class="form-control" id="percent" name="percent" type="hidden">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg btn-block   " style="background-color: #f36621; color:white;font-size: 1.5rem; padding-left: 150px; padding-right: 150px;">{{ __('web.calculate') }}</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('container_js')
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#myForm', function(event) {
                event.preventDefault();

                const form = $(this);
                const resultMessage = $('#resultMessage');
                const resultArea = $('#resultArea');
                const resultValue = $('#result');
                const resultLabel = $('.result-label');

                const formData = new FormData(form[0]);

                const submitUrl = "{{ route('calculate.equation') }}";

                $.ajax({
                    url: submitUrl,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {


                        resultMessage.css('display', 'block');
                        resultArea.css('display', 'block');

                        resultValue.text(data.result);
                        resultValue.css('display', 'inline');
                        resultLabel.css('display', 'inline');

                    },
                    error: function(xhr) {
                        // console.log(xhr);
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            const errorMessage = Object.values(xhr.responseJSON.errors)[0];
                            toasterError(errorMessage);
                        } else {
                            toasterError('An error occurred.');
                        }
                    }
                });
            });
        });
    </script>


    <script>
        var translations = {
            'web.Year': '{{ __('web.Year') }}',
            'web.Month': '{{ __('web.Month') }}',

        };

        const bankSelect = document.getElementById('bank');
        const periodSelect = document.getElementById('period');
        const percentInput = document.getElementById('percent');
        const messageInput = document.getElementById('message');

        const debounce = (func, delay) => {
            let timer;
            return function() {
                clearTimeout(timer);
                timer = setTimeout(func, delay);
            };
        };

        const updatePeriods = () => {
            var bank = bankSelect.value;
            if (bank) {
                fetch('/get-periods/' + bank)
                    .then(response => response.json())
                    .then(periods => {
                        const optionsHTML = periods.map(period => {

                            return `<option value="${period.id}" data-percent="${period.percent}">
                                        ${period.period} ${translations['web.Month']}
                                    </option>`;
                        }).join('');

                        periodSelect.innerHTML =
                            `<option value="">{{ __('web.choose_a_period') }}</option>${optionsHTML}`;
                    });
            } else {
                periodSelect.innerHTML = `<option value="">{{ __('web.choose_a_period') }}</option>`;
            }
        };

        bankSelect.addEventListener('change', debounce(updatePeriods, 300));

        periodSelect.addEventListener('change', function() {
            var selectedPeriodOption = this.options[this.selectedIndex];
            var selectedPercent = selectedPeriodOption.getAttribute('data-percent');

            percentInput.value = selectedPercent ? selectedPercent : '';
            messageInput.value = selectedPercent ? selectedPercent + ' ' + '%' : '';
            console.log(percentInput.value);
        });
    </script>
@endsection
