<section class="container no-padding-container">
    <div class="flash-sales-wrapper">
        <div class="sec-title">
            <h2><a href="{{$url}}">{{$title}}</a></h2>
            <div class="flash-navigation">
                <a href="{{$url}}">{{__('web.show_more')}}</a>
                
                <div class="flash-sales-slider-3-prev flash-sales-slider-3-prev-{{$index}}">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 5L4.5 12L11.5 19M4.5 12H20.5" stroke="black" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flash-sales-slider-3-next flash-sales-slider-3-next-{{$index}}">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20.5M20.5 12L13.5 5M20.5 12L13.5 19" stroke="black" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="flash-sales-slider-3">
            <div class="swiper-wrapper">
                @if($index == 1)
                    @foreach ($products as $row)
                        @include('web.component.product.productNew',['product'=>$row])
                    @endforeach
                @else
                    @foreach ($products as $row)
                        @include('web.component.product.product',['product'=>$row])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
