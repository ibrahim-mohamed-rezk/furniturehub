@extends('web.layouts.container')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/assets/web/ASSets/css/blog.css">
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
                    {{--  <div class="collapse catigory-collapse" id="catigory-filter">
                        @foreach($categories_all as $i => $category)
                            <div class="catigoryCollapceItem @if($category->models->isEmpty()) empty-category @endif">
                                <button class="catigoryCollapceItem-collapse collapsed" type="button"
                                        @if($category->models->isEmpty()) data-has-subcategories="false" @endif
                                        data-toggle="collapse" data-target="#catigory-filter-{{ $i }}"
                                        aria-expanded="false" aria-controls="catigory-filter-{{ $i }}">
                                    <div class="collapseHead">
                                        <div class="priceCircle"></div>
                                        <div class="collapseItemTitle">
                                            {!! $category->icon_search !!}
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
                    </div>  --}}
                </form>
            </section>

            {{-- products container --}}
            <section class="products-container">
                {{--  @if($category_one)
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

                </div>  --}}
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
                    </div>
                    <div  class="row" >
                        @foreach($blogs as $key => $row)
                            @include('web.component.blog.blogComponent',['article'=>$row])
                        @endforeach
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