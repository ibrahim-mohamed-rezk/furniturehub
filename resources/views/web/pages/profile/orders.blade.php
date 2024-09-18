@extends('web.pages.account')

@section('profileContent')
    <div class="account-profile-content-container account-orders-container">
        <table class="table orders-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">{{ __('web.order_number') }}</th>
                    <th scope="col">{{ __('web.order_date') }}</th>
                    <th scope="col">{{ __('web.order_status') }}</th>
                    <th scope="col">{{ __('web.total') }}</th>
                    <th scope="col">{{ __('web.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $row)
                    @include('web.component.account.order', ['order' => $row])
                @endforeach

            </tbody>
        </table>

    </div>
@endsection

@section('container_js')
    <script>
        const minimizeAccountMenue = () => {
            $('.account-container').toggleClass('minimize-container');
            $('.account-profile-content-container').toggleClass('minimize-account-profile-content-container');

            $('.account-item').each(function() {
                $(this).toggleClass('minimize-item');
            });

            $('.item-title').each(function() {
                $(this).toggleClass('minimize-hide');
            });

            $('.minimize-btn').toggleClass('minimize-hide');
            $('.header-title').toggleClass('minimize-hide');
            $('.account-menue-icon').toggleClass('minimize-hide');
        }
    </script>
    <script>
        $(document).ready(function() {
            function setImages(containerId, images) {
                const $container = $(containerId);
                $container.empty();

                const imageCount = images.length;

                $.each(images, function(index, src) {
                    const $div = $('<div>').addClass('image-wrapper');
                    const $img = $('<img>').attr('src', src);

                    if (imageCount === 2 || imageCount === 3) {
                        $img.addClass('small');
                    } else if (imageCount > 4 && index >= 4) {
                        $img.addClass('extra');
                    }

                    $div.append($img);
                    $container.append($div);
                });

                $container.removeClass('two-images three-images four-images');

                if (imageCount === 2) {
                    $container.addClass('two-images');
                } else if (imageCount === 3) {
                    $container.addClass('three-images');
                } else if (imageCount >= 4) {
                    $container.addClass('four-images');
                }
            }

            // Example usage for each row
            @foreach ($orders as $key => $row)
                setImages('#images-container-{{ $row->id }}', [
                    @foreach ($row->products as $product)
                        "{{ asset($product->product->image) }}"
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                ]);
            @endforeach

        });
    </script>
@endsection
