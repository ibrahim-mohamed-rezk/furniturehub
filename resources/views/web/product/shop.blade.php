@extends('web.layouts.container')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/assets/web/ASSets/css/shop.css">
@endsection

@section('content')

    <div onclick="closeMobileFilter()" style="display: none" id="mobileFilterBgdisabled"></div>
    <div class="container">
        <div class="shop-content-wrapper">
            {{-- filters container --}}
            <section id="filtersContainer" class="filters-container">
                <h2 class="filters-title">
                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2699_49183)">
                            <path
                                    d="M1.08333 2.77098H2.67933C2.80454 3.23166 3.07785 3.63834 3.45711 3.92828C3.83636 4.21822 4.30049 4.3753 4.77787 4.3753C5.25526 4.3753 5.71939 4.21822 6.09864 3.92828C6.4779 3.63834 6.75121 3.23166 6.87642 2.77098H13.9167C14.0714 2.77098 14.2197 2.70953 14.3291 2.60013C14.4385 2.49073 14.5 2.34236 14.5 2.18765C14.5 2.03294 14.4385 1.88457 14.3291 1.77517C14.2197 1.66578 14.0714 1.60432 13.9167 1.60432H6.87642C6.75121 1.14364 6.4779 0.736963 6.09864 0.447025C5.71939 0.157087 5.25526 0 4.77787 0C4.30049 0 3.83636 0.157087 3.45711 0.447025C3.07785 0.736963 2.80454 1.14364 2.67933 1.60432H1.08333C0.928624 1.60432 0.780251 1.66578 0.670854 1.77517C0.561458 1.88457 0.5 2.03294 0.5 2.18765C0.5 2.34236 0.561458 2.49073 0.670854 2.60013C0.780251 2.70953 0.928624 2.77098 1.08333 2.77098ZM4.77758 1.16682C4.97949 1.16682 5.17685 1.22669 5.34473 1.33886C5.5126 1.45103 5.64345 1.61046 5.72071 1.79699C5.79797 1.98353 5.81819 2.18878 5.7788 2.38681C5.73941 2.58483 5.64219 2.76672 5.49942 2.90949C5.35666 3.05226 5.17476 3.14948 4.97674 3.18887C4.77872 3.22826 4.57346 3.20804 4.38693 3.13078C4.20039 3.05351 4.04096 2.92267 3.92879 2.7548C3.81662 2.58692 3.75675 2.38955 3.75675 2.18765C3.75706 1.917 3.86471 1.65753 4.05609 1.46615C4.24746 1.27478 4.50694 1.16713 4.77758 1.16682Z"
                                    fill="#374957" />
                            <path
                                    d="M13.9167 6.41543H12.3207C12.1957 5.95465 11.9225 5.54782 11.5432 5.25777C11.164 4.96771 10.6999 4.81055 10.2224 4.81055C9.74498 4.81055 9.28082 4.96771 8.90159 5.25777C8.52237 5.54782 8.24916 5.95465 8.12417 6.41543H1.08333C0.928624 6.41543 0.780251 6.47689 0.670854 6.58628C0.561458 6.69568 0.5 6.84405 0.5 6.99876C0.5 7.15347 0.561458 7.30184 0.670854 7.41124C0.780251 7.52064 0.928624 7.58209 1.08333 7.58209H8.12417C8.24916 8.04288 8.52237 8.4497 8.90159 8.73976C9.28082 9.02982 9.74498 9.18698 10.2224 9.18698C10.6999 9.18698 11.164 9.02982 11.5432 8.73976C11.9225 8.4497 12.1957 8.04288 12.3207 7.58209H13.9167C14.0714 7.58209 14.2197 7.52064 14.3291 7.41124C14.4385 7.30184 14.5 7.15347 14.5 6.99876C14.5 6.84405 14.4385 6.69568 14.3291 6.58628C14.2197 6.47689 14.0714 6.41543 13.9167 6.41543ZM10.2224 8.01959C10.0205 8.01959 9.82315 7.95972 9.65527 7.84755C9.4874 7.73538 9.35655 7.57595 9.27929 7.38942C9.20203 7.20289 9.18181 6.99763 9.2212 6.79961C9.26059 6.60159 9.35781 6.41969 9.50058 6.27693C9.64334 6.13416 9.82524 6.03694 10.0233 5.99755C10.2213 5.95816 10.4265 5.97837 10.6131 6.05564C10.7996 6.1329 10.959 6.26374 11.0712 6.43162C11.1834 6.59949 11.2432 6.79686 11.2432 6.99876C11.2429 7.26941 11.1353 7.52888 10.9439 7.72026C10.7525 7.91163 10.4931 8.01929 10.2224 8.01959Z"
                                    fill="#374957" />
                            <path
                                    d="M13.9167 11.2293H6.87642C6.75121 10.7686 6.4779 10.362 6.09864 10.072C5.71939 9.78209 5.25526 9.625 4.77787 9.625C4.30049 9.625 3.83636 9.78209 3.45711 10.072C3.07785 10.362 2.80454 10.7686 2.67933 11.2293H1.08333C0.928624 11.2293 0.780251 11.2908 0.670854 11.4002C0.561458 11.5096 0.5 11.6579 0.5 11.8126C0.5 11.9674 0.561458 12.1157 0.670854 12.2251C0.780251 12.3345 0.928624 12.396 1.08333 12.396H2.67933C2.80454 12.8566 3.07785 13.2633 3.45711 13.5533C3.83636 13.8432 4.30049 14.0003 4.77787 14.0003C5.25526 14.0003 5.71939 13.8432 6.09864 13.5533C6.4779 13.2633 6.75121 12.8566 6.87642 12.396H13.9167C14.0714 12.396 14.2197 12.3345 14.3291 12.2251C14.4385 12.1157 14.5 11.9674 14.5 11.8126C14.5 11.6579 14.4385 11.5096 14.3291 11.4002C14.2197 11.2908 14.0714 11.2293 13.9167 11.2293ZM4.77758 12.8335C4.57568 12.8335 4.37831 12.7736 4.21044 12.6614C4.04256 12.5493 3.91172 12.3898 3.83446 12.2033C3.75719 12.0168 3.73698 11.8115 3.77637 11.6135C3.81575 11.4155 3.91298 11.2336 4.05574 11.0908C4.19851 10.948 4.38041 10.8508 4.57843 10.8114C4.77645 10.772 4.98171 10.7923 5.16824 10.8695C5.35477 10.9468 5.5142 11.0776 5.62637 11.2455C5.73855 11.4134 5.79842 11.6107 5.79842 11.8126C5.79795 12.0832 5.69025 12.3426 5.49891 12.534C5.30757 12.7253 5.04818 12.833 4.77758 12.8335Z"
                                    fill="#374957" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2699_49183">
                                <rect width="14" height="14" fill="white" transform="translate(0.5)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span>
                        {{__('web.filter_by')}}
                    </span>
                </h2>
                <div class="price-filtring">
                    <button class="price-collapce-title collapsed" type="button" data-toggle="collapse"
                            data-target="#price-filter" aria-expanded="false" aria-controls="price-filter">
                        <div>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                      d="M4.72007 18C4.78375 17.931 4.86106 17.8758 4.94711 17.8381C5.03317 17.8004 5.12611 17.7809 5.22007 17.7809C5.31403 17.7809 5.40697 17.8004 5.49303 17.8381C5.57908 17.8758 5.65639 17.931 5.72007 18L7.36007 19.62V2.84005C7.34411 2.73539 7.35111 2.6285 7.38058 2.52681C7.41004 2.42513 7.46128 2.33106 7.53073 2.25115C7.60017 2.17124 7.68617 2.10739 7.78276 2.06403C7.87934 2.02067 7.98421 1.99884 8.09007 2.00005C8.18595 2.00264 8.28037 2.0241 8.36795 2.0632C8.45553 2.1023 8.53455 2.15827 8.60048 2.22792C8.66642 2.29758 8.71798 2.37954 8.75223 2.46913C8.78648 2.55871 8.80273 2.65417 8.80007 2.75005V19.43L10.1401 18C10.2038 17.931 10.2811 17.8758 10.3671 17.8381C10.4532 17.8004 10.5461 17.7809 10.6401 17.7809C10.734 17.7809 10.827 17.8004 10.913 17.8381C10.9991 17.8758 11.0764 17.931 11.1401 18C11.2715 18.1453 11.3442 18.3342 11.3442 18.53C11.3442 18.7259 11.2715 18.9148 11.1401 19.06L8.55007 21.79C8.48639 21.8591 8.40908 21.9143 8.32303 21.952C8.23697 21.9897 8.14403 22.0092 8.05007 22.0092C7.95611 22.0092 7.86317 21.9897 7.77711 21.952C7.69106 21.9143 7.61375 21.8591 7.55007 21.79L4.75007 19C4.67815 18.9259 4.62167 18.8382 4.5839 18.7421C4.54614 18.646 4.52784 18.5433 4.53007 18.44C4.54208 18.2762 4.60902 18.1212 4.72007 18Z"
                                      fill="#FD9636" />
                                <path
                                        d="M13.9899 4.90972L16.4999 2.21972C16.569 2.14394 16.6544 2.08478 16.7497 2.04668C16.8449 2.00858 16.9476 1.99253 17.0499 1.99972C17.1452 2.00079 17.2394 2.0208 17.327 2.05856C17.4145 2.09633 17.4937 2.15111 17.5599 2.21972L20.2699 5.04972C20.3909 5.1882 20.4575 5.36584 20.4575 5.54972C20.4575 5.7336 20.3909 5.91124 20.2699 6.04972C20.2047 6.11622 20.1269 6.16905 20.041 6.20511C19.9552 6.24117 19.863 6.25973 19.7699 6.25972C19.6759 6.25961 19.5829 6.24 19.4968 6.20213C19.4108 6.16427 19.3335 6.10897 19.2699 6.03972L17.8399 4.59972V21.2697C17.8399 21.458 17.7651 21.6386 17.6319 21.7718C17.4988 21.9049 17.3182 21.9797 17.1299 21.9797C16.9416 21.9797 16.761 21.9049 16.6278 21.7718C16.4947 21.6386 16.4199 21.458 16.4199 21.2697V4.44972L14.9999 5.93972C14.9354 6.00749 14.8579 6.06146 14.7719 6.09833C14.686 6.13521 14.5934 6.15422 14.4999 6.15422C14.4064 6.15422 14.3138 6.13521 14.2278 6.09833C14.1419 6.06146 14.0643 6.00749 13.9999 5.93972C13.867 5.80177 13.792 5.61823 13.7901 5.42671C13.7882 5.23519 13.8597 5.05022 13.9899 4.90972Z"
                                        fill="#FD9636" />
                            </svg>
                            <span>{{__('web.filter_by_price')}}</span>
                        </div>
                        <svg class="price-arrow" width="25" height="24" viewBox="0 0 25 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M12.4998 6.8006C12.6314 6.79983 12.7619 6.82506 12.8837 6.87483C13.0056 6.92459 13.1164 6.99791 13.2098 7.0906L19.2098 13.0906C19.3031 13.1838 19.377 13.2945 19.4275 13.4163C19.4779 13.5382 19.5039 13.6687 19.5039 13.8006C19.5039 14.0669 19.3981 14.3223 19.2098 14.5106C19.0215 14.6989 18.7661 14.8047 18.4998 14.8047C18.2335 14.8047 17.9781 14.6989 17.7898 14.5106L12.4998 9.2206L7.20981 14.5106C7.11658 14.6038 7.00589 14.6778 6.88406 14.7283C6.76224 14.7787 6.63167 14.8047 6.49981 14.8047C6.36796 14.8047 6.23739 14.7787 6.11557 14.7283C5.99374 14.6778 5.88305 14.6038 5.78982 14.5106C5.69658 14.4174 5.62261 14.3067 5.57215 14.1848C5.5217 14.063 5.49572 13.9325 5.49572 13.8006C5.49572 13.6687 5.5217 13.5382 5.57215 13.4163C5.62261 13.2945 5.69658 13.1838 5.78982 13.0906L11.7898 7.0906C11.8833 6.99791 11.9941 6.92459 12.1159 6.87483C12.2377 6.82506 12.3682 6.79983 12.4998 6.8006Z"
                                    fill="#FD9636" />
                        </svg>
                    </button>
                    <div class="collapse price-collapse" id="price-filter">
                        <div class="filter-direction">
                            <div class="filter-direction-item">
                                <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M7.92899 12.8318H5.07394V1.63101L7.52928 4.14254C7.63698 4.24894 7.78122 4.30781 7.93093 4.30648C8.08065 4.30515 8.22387 4.24372 8.32974 4.13543C8.43561 4.02713 8.49566 3.88064 8.49696 3.7275C8.49826 3.57436 8.44071 3.42682 8.33669 3.31666L5.51248 0.427816C5.37991 0.292184 5.22253 0.184593 5.04931 0.111187C4.87609 0.0377817 4.69043 0 4.50293 0C4.31543 0 4.12977 0.0377817 3.95655 0.111187C3.78333 0.184593 3.62595 0.292184 3.49339 0.427816L0.666886 3.31899C0.559817 3.42882 0.499786 3.57766 0.500001 3.73276C0.500215 3.88787 0.560656 4.03653 0.668028 4.14605C0.775399 4.25557 0.920907 4.31697 1.07254 4.31675C1.22417 4.31653 1.36951 4.25471 1.47658 4.14488L3.93192 1.63335V12.8318H1.07687C0.925429 12.8318 0.780191 12.8934 0.673106 13.0029C0.566021 13.1125 0.505861 13.261 0.505861 13.4159C0.505861 13.5708 0.566021 13.7194 0.673106 13.8289C0.780191 13.9385 0.925429 14 1.07687 14H7.92899C8.08043 14 8.22567 13.9385 8.33276 13.8289C8.43984 13.7194 8.5 13.5708 8.5 13.4159C8.5 13.261 8.43984 13.1125 8.33276 13.0029C8.22567 12.8934 8.08043 12.8318 7.92899 12.8318Z"
                                            fill="#FD9636" />
                                </svg>
                                <span style="cursor: pointer"><a style="color: black" class="priceBy" data-id="ASC" onclick="selectPrice(this)" >{{ __('web.low_high') }}</a></span>
                            </div>
                            <div class="line"></div>
                            <div class="filter-direction-item">
                                <svg width="9" height="14" viewBox="0 0 9 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M7.92899 1.16815H5.07394V12.369L7.52928 9.85746C7.63698 9.75106 7.78122 9.69219 7.93093 9.69352C8.08065 9.69485 8.22387 9.75628 8.32974 9.86457C8.43561 9.97287 8.49566 10.1194 8.49696 10.2725C8.49826 10.4256 8.44071 10.5732 8.33669 10.6833L5.51248 13.5722C5.37991 13.7078 5.22253 13.8154 5.04931 13.8888C4.87609 13.9622 4.69043 14 4.50293 14C4.31543 14 4.12977 13.9622 3.95655 13.8888C3.78333 13.8154 3.62595 13.7078 3.49339 13.5722L0.666886 10.681C0.559817 10.5712 0.499786 10.4223 0.500001 10.2672C0.500215 10.1121 0.560656 9.96347 0.668028 9.85395C0.775399 9.74443 0.920907 9.68303 1.07254 9.68325C1.22417 9.68347 1.36951 9.74529 1.47658 9.85512L3.93192 12.3666V1.16815H1.07687C0.925429 1.16815 0.780191 1.10662 0.673106 0.997081C0.566021 0.887546 0.505861 0.738982 0.505861 0.584076C0.505861 0.42917 0.566021 0.280606 0.673106 0.171071C0.780191 0.0615358 0.925429 -9.53674e-07 1.07687 -9.53674e-07H7.92899C8.08043 -9.53674e-07 8.22567 0.0615358 8.33276 0.171071C8.43984 0.280606 8.5 0.42917 8.5 0.584076C8.5 0.738982 8.43984 0.887546 8.33276 0.997081C8.22567 1.10662 8.08043 1.16815 7.92899 1.16815Z"
                                            fill="#FD9636" />
                                </svg>
                                <span style="cursor: pointer"><a style="color: black" class="priceBy" data-id="DESC" onclick="selectPrice(this)" >{{ __('web.high_low') }}</a></span>
                            </div>
                        </div>

                        <div class="mid-price">
                            <h3>{{__('web.average_price')}}</h3>
                            <div class="price-range">
                                <div class="range-slider" style="direction: ltr">
                                    <input disabled type="range" min="0" max="270270"   name="min_value" value="0"  id="range-min">
                                    <input disabled type="range" min="0" max="270270"   name="max_value" value="300000" id="range-max">
                                    <div style="direction: ltr; height: 3px; position: relative; z-index: 9;"
                                         class=" slider-track"></div>
                                </div>
                                <div style="direction: ltr" class="range-values">
                                    <input  class="min_value" oninput="changeMax()"  type="number" min="0" max="270270"
                                           id="range-min-value" value="0" />
                                    <input  class="max_value" oninput="changeMax()" type="number" min="0" max="270270"
                                           id="range-max-value" value="300000" />
                                </div>
                            </div>
                            <div class="all-prices">
                                <div class="priceItem" onclick="priceClick(0, 270270, this)">
                                    <div class="priceCircle"></div>
                                    <span>{{__('web.all_prices')}}</span>
                                </div>
                                @foreach ($price_ranges as $range)
                                    <div class="priceItem" onchange="filtering()" onclick="priceClick({{ $range['start'] }}, {{ $range['end'] }}, this)">
                                        <div class="priceCircle"></div>
                                        <span>{{__('web.from')}} {{ number_format($range['start']) }} {{__('web.to')}} {{ number_format($range['end']) }} ج.م</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <form  id="filterForm" class="catigory-filtring">
                    <button class="allcatigory-collapse collapsed" type="button" data-toggle="collapse"
                            data-target="#catigory-filter" aria-expanded="false" aria-controls="catigory-filter">
                        <div class="collapseHead">
                            <div>
                                <span>{{__('web.categories')}}</span>
                            </div>
                            <svg class="catigory-arrow" width="25" height="24" viewBox="0 0 25 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M12.4998 6.8006C12.6314 6.79983 12.7619 6.82506 12.8837 6.87483C13.0056 6.92459 13.1164 6.99791 13.2098 7.0906L19.2098 13.0906C19.3031 13.1838 19.377 13.2945 19.4275 13.4163C19.4779 13.5382 19.5039 13.6687 19.5039 13.8006C19.5039 14.0669 19.3981 14.3223 19.2098 14.5106C19.0215 14.6989 18.7661 14.8047 18.4998 14.8047C18.2335 14.8047 17.9781 14.6989 17.7898 14.5106L12.4998 9.2206L7.20981 14.5106C7.11658 14.6038 7.00589 14.6778 6.88406 14.7283C6.76224 14.7787 6.63167 14.8047 6.49981 14.8047C6.36796 14.8047 6.23739 14.7787 6.11557 14.7283C5.99374 14.6778 5.88305 14.6038 5.78982 14.5106C5.69658 14.4174 5.62261 14.3067 5.57215 14.1848C5.5217 14.063 5.49572 13.9325 5.49572 13.8006C5.49572 13.6687 5.5217 13.5382 5.57215 13.4163C5.62261 13.2945 5.69658 13.1838 5.78982 13.0906L11.7898 7.0906C11.8833 6.99791 11.9941 6.92459 12.1159 6.87483C12.2377 6.82506 12.3682 6.79983 12.4998 6.8006Z"
                                        fill="#FD9636" />
                            </svg>
                        </div>
                    </button>

                    <div class="collapse catigory-collapse" id="catigory-filter">
                        @foreach($categories_all as $i => $category)
                            <div class="catigoryCollapceItem @if($category->models->isEmpty()) empty-category @endif">
                                <button class="catigoryCollapceItem-collapse collapsed" type="button"
                                        @if($category->models->isEmpty()) data-has-subcategories="false" @endif
                                        data-toggle="collapse" data-target="#catigory-filter-{{ $i }}"
                                        aria-expanded="false" aria-controls="catigory-filter-{{ $i }}">
                                    <div class="collapseHead">
                                        <div class="priceCircle"></div>
                                        <div class="collapseItemTitle">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <rect width="24" height="24" transform="translate(0.5)" fill="white" />
                                                <path d="M2.5 6H22.5V16H2.5V6Z" stroke="black" stroke-linejoin="round" />
                                                <path d="M2.5 16H22.5V18H2.5V16Z" stroke="black" stroke-linejoin="round" />
                                                <path d="M5.5 6L5.5 16" stroke="black" stroke-linejoin="round" />
                                                <path d="M8.5 6V16" stroke="black" stroke-linejoin="round" />
                                                <path d="M11.5 6V16" stroke="black" stroke-linejoin="round" />
                                                <path d="M14.5 6V16" stroke="black" stroke-linejoin="round" />
                                                <path d="M17.5 6V16" stroke="black" stroke-linejoin="round" />
                                                <path d="M20.5 6V16" stroke="black" stroke-linejoin="round" />
                                                <path d="M22.5 19V18M2.5 19V18" stroke="black" stroke-linecap="round"
                                                      stroke-linejoin="round" />
                                                <path d="M22.5 6V5M2.5 6V5" stroke="black" stroke-linecap="round"
                                                      stroke-linejoin="round" />
                                            </svg>
                                            <span>{{$category->title}}</span>
                                        </div>
                                    </div>
                                    @if(!$category->models->isEmpty())
                                        <svg class="plusSvg" width="13" height="12" viewBox="0 0 13 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M11.5 5H7.5V1C7.5 0.734784 7.39464 0.48043 7.20711 0.292893C7.01957 0.105357 6.76522 0 6.5 0C6.23478 0 5.98043 0.105357 5.79289 0.292893C5.60536 0.48043 5.5 0.734784 5.5 1V5H1.5C1.23478 5 0.98043 5.10536 0.792893 5.29289C0.605357 5.48043 0.5 5.73478 0.5 6C0.5 6.26522 0.605357 6.51957 0.792893 6.70711C0.98043 6.89464 1.23478 7 1.5 7H5.5V11C5.5 11.2652 5.60536 11.5196 5.79289 11.7071C5.98043 11.8946 6.23478 12 6.5 12C6.76522 12 7.01957 11.8946 7.20711 11.7071C7.39464 11.5196 7.5 11.2652 7.5 11V7H11.5C11.7652 7 12.0196 6.89464 12.2071 6.70711C12.3946 6.51957 12.5 6.26522 12.5 6C12.5 5.73478 12.3946 5.48043 12.2071 5.29289C12.0196 5.10536 11.7652 5 11.5 5Z"
                                                    fill="black" />
                                        </svg>
                                        <svg class="minuseSvg" style="display: none" width="13" height="2" viewBox="0 0 13 2"
                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M11.66 2H1.5C1.23478 2 0.980429 1.89464 0.792893 1.70711C0.605357 1.51957 0.5 1.26522 0.5 1C0.5 0.734784 0.605357 0.48043 0.792893 0.292893C0.980429 0.105357 1.23478 0 1.5 0H11.66C11.9252 0 12.1796 0.105357 12.3671 0.292893C12.5546 0.48043 12.66 0.734784 12.66 1C12.66 1.26522 12.5546 1.51957 12.3671 1.70711C12.1796 1.89464 11.9252 2 11.66 2Z"
                                                    fill="black" />
                                        </svg>
                                    @endif

                                    @if($category->models->isEmpty())
                                        <input onclick="filtering()" type="checkbox" name="category_id[]"
                                               value="{{ $category->id }}" style="display: none" class="parent-checkbox" />
                                    @endif
                                </button>
                                @if(!$category->models->isEmpty())
                                    <div class="collapse catigoryItem-collapse" id="catigory-filter-{{ $i }}">
                                        @foreach ($category->models as $model)
                                            <div>
                                                <input  onclick="filtering()" type="checkbox" name="category_id[]"
                                                       value="{{ $model->id }}"/>
                                                <span>{{$model->details->title}}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                @endif
                            </div>
                        @endforeach
                    </div>
                </form>

            </section>

            {{-- products container --}}
            <section class="products-container">
                @if($category_one)
                    <div class="shop-banner">
                        <a href="#">
                            <img src="{{$category_one->image_products}}" alt="{{$category_one->title}}">
                        </a>
                    </div>

                @endif
                <div class="shop-catigory">
                    <div class="section-wrapper">
                        <div class="catigory-slider-2">
                            <div class="swiper-wrapper">
                                @foreach ($categories as $row)
                                    <div class="swiper-slide">
                                        <a href="{{ route('web.shop', $row->slug) }}" class="slide-container">
                                            <svg viewBox="0 0 82 119" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M14.0839 20.4864C14.8036 15.786 18.2308 11.954 22.8221 10.7162L59.5956 0.802412C66.8977 -1.16617 74.1782 4.02888 74.6915 11.5742L81.1282 106.185C81.5998 113.118 76.1039 119 69.1559 119H12.9772C5.62606 119 0.002859 112.45 1.11546 105.184L14.0839 20.4864Z"
                                                        fill="#E4EDED" />
                                            </svg>
                                            <img class="product-image"
                                                 src="{{$row->icon}}"
                                                 alt="cat-pro-1">
                                            <h3>{{$row->title}}</h3>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="catigory-slider-2-scrollbar swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
                <div class="line">

                </div>
                <div class="shop-products">
                    <div style="display: none" class="proMobHead">
                        <h2 onclick="openMobileFiltersBtn()" class="filters-title">
                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_2699_49183)">
                                    <path
                                            d="M1.08333 2.77098H2.67933C2.80454 3.23166 3.07785 3.63834 3.45711 3.92828C3.83636 4.21822 4.30049 4.3753 4.77787 4.3753C5.25526 4.3753 5.71939 4.21822 6.09864 3.92828C6.4779 3.63834 6.75121 3.23166 6.87642 2.77098H13.9167C14.0714 2.77098 14.2197 2.70953 14.3291 2.60013C14.4385 2.49073 14.5 2.34236 14.5 2.18765C14.5 2.03294 14.4385 1.88457 14.3291 1.77517C14.2197 1.66578 14.0714 1.60432 13.9167 1.60432H6.87642C6.75121 1.14364 6.4779 0.736963 6.09864 0.447025C5.71939 0.157087 5.25526 0 4.77787 0C4.30049 0 3.83636 0.157087 3.45711 0.447025C3.07785 0.736963 2.80454 1.14364 2.67933 1.60432H1.08333C0.928624 1.60432 0.780251 1.66578 0.670854 1.77517C0.561458 1.88457 0.5 2.03294 0.5 2.18765C0.5 2.34236 0.561458 2.49073 0.670854 2.60013C0.780251 2.70953 0.928624 2.77098 1.08333 2.77098ZM4.77758 1.16682C4.97949 1.16682 5.17685 1.22669 5.34473 1.33886C5.5126 1.45103 5.64345 1.61046 5.72071 1.79699C5.79797 1.98353 5.81819 2.18878 5.7788 2.38681C5.73941 2.58483 5.64219 2.76672 5.49942 2.90949C5.35666 3.05226 5.17476 3.14948 4.97674 3.18887C4.77872 3.22826 4.57346 3.20804 4.38693 3.13078C4.20039 3.05351 4.04096 2.92267 3.92879 2.7548C3.81662 2.58692 3.75675 2.38955 3.75675 2.18765C3.75706 1.917 3.86471 1.65753 4.05609 1.46615C4.24746 1.27478 4.50694 1.16713 4.77758 1.16682Z"
                                            fill="#374957" />
                                    <path
                                            d="M13.9167 6.41543H12.3207C12.1957 5.95465 11.9225 5.54782 11.5432 5.25777C11.164 4.96771 10.6999 4.81055 10.2224 4.81055C9.74498 4.81055 9.28082 4.96771 8.90159 5.25777C8.52237 5.54782 8.24916 5.95465 8.12417 6.41543H1.08333C0.928624 6.41543 0.780251 6.47689 0.670854 6.58628C0.561458 6.69568 0.5 6.84405 0.5 6.99876C0.5 7.15347 0.561458 7.30184 0.670854 7.41124C0.780251 7.52064 0.928624 7.58209 1.08333 7.58209H8.12417C8.24916 8.04288 8.52237 8.4497 8.90159 8.73976C9.28082 9.02982 9.74498 9.18698 10.2224 9.18698C10.6999 9.18698 11.164 9.02982 11.5432 8.73976C11.9225 8.4497 12.1957 8.04288 12.3207 7.58209H13.9167C14.0714 7.58209 14.2197 7.52064 14.3291 7.41124C14.4385 7.30184 14.5 7.15347 14.5 6.99876C14.5 6.84405 14.4385 6.69568 14.3291 6.58628C14.2197 6.47689 14.0714 6.41543 13.9167 6.41543ZM10.2224 8.01959C10.0205 8.01959 9.82315 7.95972 9.65527 7.84755C9.4874 7.73538 9.35655 7.57595 9.27929 7.38942C9.20203 7.20289 9.18181 6.99763 9.2212 6.79961C9.26059 6.60159 9.35781 6.41969 9.50058 6.27693C9.64334 6.13416 9.82524 6.03694 10.0233 5.99755C10.2213 5.95816 10.4265 5.97837 10.6131 6.05564C10.7996 6.1329 10.959 6.26374 11.0712 6.43162C11.1834 6.59949 11.2432 6.79686 11.2432 6.99876C11.2429 7.26941 11.1353 7.52888 10.9439 7.72026C10.7525 7.91163 10.4931 8.01929 10.2224 8.01959Z"
                                            fill="#374957" />
                                    <path
                                            d="M13.9167 11.2293H6.87642C6.75121 10.7686 6.4779 10.362 6.09864 10.072C5.71939 9.78209 5.25526 9.625 4.77787 9.625C4.30049 9.625 3.83636 9.78209 3.45711 10.072C3.07785 10.362 2.80454 10.7686 2.67933 11.2293H1.08333C0.928624 11.2293 0.780251 11.2908 0.670854 11.4002C0.561458 11.5096 0.5 11.6579 0.5 11.8126C0.5 11.9674 0.561458 12.1157 0.670854 12.2251C0.780251 12.3345 0.928624 12.396 1.08333 12.396H2.67933C2.80454 12.8566 3.07785 13.2633 3.45711 13.5533C3.83636 13.8432 4.30049 14.0003 4.77787 14.0003C5.25526 14.0003 5.71939 13.8432 6.09864 13.5533C6.4779 13.2633 6.75121 12.8566 6.87642 12.396H13.9167C14.0714 12.396 14.2197 12.3345 14.3291 12.2251C14.4385 12.1157 14.5 11.9674 14.5 11.8126C14.5 11.6579 14.4385 11.5096 14.3291 11.4002C14.2197 11.2908 14.0714 11.2293 13.9167 11.2293ZM4.77758 12.8335C4.57568 12.8335 4.37831 12.7736 4.21044 12.6614C4.04256 12.5493 3.91172 12.3898 3.83446 12.2033C3.75719 12.0168 3.73698 11.8115 3.77637 11.6135C3.81575 11.4155 3.91298 11.2336 4.05574 11.0908C4.19851 10.948 4.38041 10.8508 4.57843 10.8114C4.77645 10.772 4.98171 10.7923 5.16824 10.8695C5.35477 10.9468 5.5142 11.0776 5.62637 11.2455C5.73855 11.4134 5.79842 11.6107 5.79842 11.8126C5.79795 12.0832 5.69025 12.3426 5.49891 12.534C5.30757 12.7253 5.04818 12.833 4.77758 12.8335Z"
                                            fill="#374957" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2699_49183">
                                        <rect width="14" height="14" fill="white" transform="translate(0.5)" />
                                    </clipPath>
                                </defs>
                            </svg>
                            <span>
                                {{__('web.filter_by')}}
                            </span>
                        </h2>
{{--                        <h2>Flash Sales</h2>--}}
                    </div>

                    <div id="filtering" class="row" >
                    </div>


                </div>
            </section>
        </div>
    </div>

@endsection

@section('container_js')
    <script>
        //price range
        const rangeMin = document.getElementById('range-min');
        const rangeMax = document.getElementById('range-max');
        const minValueDisplay = document.getElementById('range-min-value');
        const maxValueDisplay = document.getElementById('range-max-value');
        const sliderTrack = document.querySelector('.slider-track');
        const priceCircle = document.querySelector('.priceCircle');

        function updateRange() {
            const minValue = parseInt(rangeMin.value);
            const maxValue = parseInt(rangeMax.value);



            minValueDisplay.value = rangeMin.value;
            maxValueDisplay.value = rangeMax.value;

            const percentMin = (rangeMin.value / rangeMin.max) * 100;
            const percentMax = (rangeMax.value / rangeMax.max) * 100;

            sliderTrack.style.background =
                `linear-gradient(to right, #E4E7E9 ${percentMin}%, #FA8232 ${percentMin}%, #FA8232 ${percentMax}%, #E4E7E9 ${percentMax}%)`;
        }

        rangeMin.addEventListener('input', updateRange);
        rangeMax.addEventListener('input', updateRange);
        updateRange();

        function changeMax() {
            const minValue = parseInt(minValueDisplay.value);
            const maxValue = parseInt(maxValueDisplay.value);

            rangeMin.value = minValue;
            rangeMax.value = maxValue;

            updateRange();
            filtering();
        }


        function priceClick(min, max, element) {
            rangeMin.value = min;
            rangeMax.value = max;

            const allCircles = document.querySelectorAll('.priceCircle');
            allCircles.forEach(circle => circle.classList.remove('active'));

            const priceCircle = element.querySelector('.priceCircle');
            priceCircle.classList.add('active');

            updateRange();
            filtering();

        }

    </script>
    <script src="{{ url('') }}/assets/web/ASSets/js/home.js"></script>
    <script>
        var url_filtering = "{{ route('web.shop') }}";

        function pagination(elem) {
            $('.paginateScroll').removeClass('active');
            $(elem).addClass('active');
            filtering(true);
        }

        function selectItem(elem) {
            $('.items').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }

        function selectPrice(elem) {
            $('.priceBy').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }


        function selectOrder(elem) {
            $('.orderBy').removeClass('active')
            $(elem).addClass('active')
            filtering()
        }




        function filtering(resetNum) {
            let productName = {!! json_encode($request->product) !!};
            let model = {!! json_encode($request->model_id) !!};
            let formData = $('#filterForm').serializeArray();
            let orderBy = $('.orderBy.active').attr('data-id');
            let min_price = $(".min_value").val();
            let max_price = $(".max_value").val();
            if (max_price !== null) {
                formData.push({
                    name: 'max_price',
                    value: max_price
                });
            }
            if (min_price !== null) {
                formData.push({
                    name: 'min_price',
                    value: min_price
                });
            }

            if (orderBy == undefined) {
                orderBy = null;
            }
            formData.push({
                name: 'orderBy',
                value: orderBy
            });

            let itmeCount = $('.items.active').attr('data-id');
            if (itmeCount == undefined) {
                itmeCount = null;
            }
            formData.push({
                name: 'take',
                value: itmeCount
            });

            let priceBy = $('.priceBy.active').attr('data-id');
            if (priceBy == undefined) {
                priceBy = null;
            }
            formData.push({
                name: 'priceBy',
                value: priceBy
            });

            if (resetNum == true) {
                let numCount = $('.paginateScroll.active').attr('data-id');
                if (numCount == undefined) {
                    numCount = null;
                }
                formData.push({
                    name: 'num',
                    value: numCount
                });
            }

            if (productName) {
                formData.push({
                    name: 'product',
                    value: productName
                });
            }

            // Check if category_id[] is present in the form data
            let hasCategoryId = formData.some(item => item.name === 'category_id[]');

            let category = {!! json_encode($request->category_id) !!};
            if (!hasCategoryId && category) {
                formData.push({
                    name: 'category',
                    value: category
                });
            }

            if (model) {
                formData.push({
                    name: 'model',
                    value: model
                });
            }

            $.ajax({
                url: url_filtering,
                type: 'GET',
                dataType: 'JSON',
                data: formData,
                success: function(data) {
                    $('#filtering').html(data.data.res);
                    $('#num').html(data.data.filter.num);
                    $('#paginates').html(data.data.filter.paginates);
                    $('#count_products').html(data.data.filter.count_products);
                    window.scrollTo(0, 150);
                },
                error: function(data) {
                    toasterError(Object.values(data.responseJSON.errors)[0]);
                }
            });
        }
        setTimeout(function() {
            filtering(null);
        }, 10);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const emptyCategoryButtons = document.querySelectorAll('button[data-has-subcategories="false"]');

            emptyCategoryButtons.forEach(button => {
                const checkbox = button.querySelector('.parent-checkbox');

                button.addEventListener('click', function() {
                    checkbox.checked = !checkbox.checked;
                    if (checkbox.checked) {
                        button.classList.add('selected');
                        filtering();
                    } else {
                        button.classList.remove('selected');
                        filtering();

                    }
                });
            });
        });
        function openMobileFiltersBtn(){
            const filtersContainer = document.getElementById('filtersContainer');
            const mobileFilterBgdisabled = document.getElementById('mobileFilterBgdisabled');

            filtersContainer.classList.add('showInMobile')
            mobileFilterBgdisabled.classList.add('mobileFilterBg')
        }

        function closeMobileFilter(){
            const filtersContainer = document.getElementById('filtersContainer');
            const mobileFilterBgdisabled = document.getElementById('mobileFilterBgdisabled');

            filtersContainer.classList.remove('showInMobile')
            mobileFilterBgdisabled.classList.remove('mobileFilterBg')
        }

    </script>
@endsection
