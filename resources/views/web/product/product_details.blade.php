@extends('web.layouts.container')

@section('styles')
<link rel="stylesheet" href="{{url('') }}/assets/web/ASSets/css/product-details.css">
@endsection

@section('content')

<div class="container">
    <div class="product-wrapper">
        <section class="product-details">
            <div class="product-image">
                <div class="images">
                    <div class="big-img big-img-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img id="proBigImg" src="{{$product->image}}" alt="{{$product->name}}">
                            </div>
                            @foreach($product->photos as $key => $image)
                                <div class="swiper-slide">
                                    <img id="proBigImg" src="{{$image->image}}" alt="{{$product->name}}">
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="small-imgs">
                        <div class="small-images big-img-swiper-pagination">
                        </div>
                    </div>
                </div>
                <div class="keys">
                    <div class="code">SKU: {{$product->sku_code}}</div>
                    <div class="tags">
                        <span>{{__('web.tags')}}:</span>
                        <div class="tags-content">
                            @foreach($product->tags as $tag)
                                <span>{{$tag->details->name}}</span>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="product-info-sec">
                <div class="product-info">
                    <div class="info">
                        <div class="catigory">
                            <span><a href="{{ route('web.shop') }}?category_id={{ $product->category->category_id }}" style="color: black">{{ $product->category->getTitleOfMainCategoryById($product->category->id) }}</a></span>
                            <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.04904e-05 3.99714C-0.000464916 4.07234 0.0152988 4.14688 0.0463986 4.21649C0.0774984 4.28611 0.123322 4.34942 0.181242 4.40281L3.93086 7.83099C3.98896 7.88454 4.05808 7.92705 4.13423 7.95606C4.21039 7.98507 4.29207 8 4.37457 8C4.45707 8 4.53875 7.98507 4.6149 7.95606C4.69106 7.92705 4.76018 7.88454 4.81827 7.83099C4.93467 7.72394 5 7.57913 5 7.42818C5 7.27723 4.93467 7.13242 4.81827 7.02537L1.50611 3.99714L4.81827 0.97463C4.93467 0.867579 5 0.722765 5 0.571819C5 0.420873 4.93467 0.27606 4.81827 0.169008C4.76018 0.115455 4.69106 0.0729489 4.6149 0.043942C4.53875 0.0149345 4.45707 4.76837e-07 4.37457 4.76837e-07C4.29207 4.76837e-07 4.21039 0.0149345 4.13423 0.043942C4.05808 0.0729489 3.98896 0.115455 3.93086 0.169008L0.181242 3.59719C0.0657883 3.70361 0.000700951 3.84725 1.04904e-05 3.99714Z"
                                    fill="#8C9EC5" />
                            </svg>

                            <span><a href="{{ route('web.shop') }}?category_id={{ $product->category_id }}" style="color: black">{!! $product->category->details->title !!}</a></span>
                        </div>
                        <h2 class="pro-title">{!! $product->name !!}</h2>
                    </div>
                    <div class="stars">
                        @if ($product->rates['rate'] != 0)
                            @include('web.component.rate.rateComponent', [
                             'rate' => $product->rates['rate'],
                             ])
                        @endif
                    </div>
                </div>
                <div class="product-price">
                    @if($product->cost_discount)
                        <div class="price">
                            <span>{{ number_format($product->cost_discount) }} {{ __('web.L.E') }} / {{__('web.'.$product->type)}}</span>
                            <span>{{ number_format($product->cost) }} {{ __('web.L.E') }}  </span>
                        </div>
                        <div class="save">
                            <svg class="saveIcon" viewBox="0 0 36 36">
                                <!-- Background circle (gray) -->
                                <circle cx="18" cy="18" r="15.915" fill="white" stroke="#0000001A" stroke-width="5" />

                                <!-- Foreground circle (red) -->
                                <circle id="red-circle" cx="18" cy="18" r="15.915" fill="none" stroke="#FF1212"
                                        stroke-width="5"
                                        stroke-dasharray="{{100 - $product->percentage }}, 100"
                                        stroke-linecap="round"
                                        class="progress-circle" />

                                <!-- Text inside the circle -->
                                <text x="18" y="16.5" class="circle-text" text-anchor="middle">OFF</text>
                                <text x="18" y="26" class="circle-text" text-anchor="middle">{{100 - $product->percentage}}%</text>
                            </svg>

                            <span>{{__('web.save')}} : {{ number_format($product->cost - $product->cost_discount) }} {{ __('web.L.E') }}</span>
                        </div>
                    @else
                        <div class="price">
                            <span>{{ number_format($product->cost) }} {{ __('web.L.E') }} / {{__('web.'.$product->type)}}</span>
                        </div>
                    @endif

                </div>
                <br>
                <div class="product-count">
                    <span class="count-name">{{__('web.count')}}</span>
                    <div class="count-buttons">
                        <button class="plus">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.325 1.875V6.825H2.375C2.06337 6.825 1.7645 6.94879 1.54415 7.16915C1.32379 7.3895 1.2 7.68837 1.2 8C1.2 8.31163 1.32379 8.6105 1.54415 8.83085C1.7645 9.05121 2.06337 9.175 2.375 9.175H7.325V14.125C7.325 14.4366 7.44879 14.7355 7.66915 14.9559C7.8895 15.1762 8.18837 15.3 8.5 15.3C8.81163 15.3 9.1105 15.1762 9.33085 14.9559C9.55121 14.7355 9.675 14.4366 9.675 14.125V9.175H14.625C14.9366 9.175 15.2355 9.05121 15.4559 8.83085C15.6762 8.6105 15.8 8.31163 15.8 8C15.8 7.68837 15.6762 7.3895 15.4559 7.16915C15.2355 6.94879 14.9366 6.825 14.625 6.825H9.675V1.875C9.675 1.56337 9.55121 1.2645 9.33085 1.04415C9.1105 0.823794 8.81163 0.7 8.5 0.7C8.18837 0.7 7.8895 0.823794 7.66915 1.04415C7.44879 1.2645 7.325 1.56337 7.325 1.875Z"
                                    fill="white" stroke="#FFF7F7" stroke-width="0.6" />
                            </svg>
                        </button>
                        <input value="1" type="number" class="count">
                        <button class="minus">
                            <svg width="17" height="4" viewBox="0 0 17 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.54415 1.16915C1.32379 1.3895 1.2 1.68837 1.2 2C1.2 2.31163 1.32379 2.6105 1.54415 2.83085C1.7645 3.05121 2.06337 3.175 2.375 3.175H14.625C14.9366 3.175 15.2355 3.05121 15.4559 2.83085C15.6762 2.61049 15.8 2.31163 15.8 2C15.8 1.68837 15.6762 1.38951 15.4559 1.16915C15.2355 0.948794 14.9366 0.825 14.625 0.825H2.375C2.06337 0.825 1.7645 0.948795 1.54415 1.16915Z"
                                    fill="#3C3C3C" stroke="#3C3C3C" stroke-width="0.6" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="product-desctiption">
                    <span>{{__('web.description')}} :</span>
                    <div class="display-text-short">
                        <p >
                            {!! $product->description !!}
                        </p>

                    </div>
                    <div class="mt-20 "><a
                                class="see-more btn-expand-more" style="cursor: pointer">{{ __('web.see_more') }}</a>
                    </div>
                </div>
                <div class="product-installment-banner">
                    <div class="banner-wrapper">
                        <sympl-widget productprice="{{ $product->cost }}" storecode="STR-343"></sympl-widget>

                    </div>
                </div>
                <div class="line"></div>
                <div class="product-buttons">
                    <div class="whatsappBtn">
                        <button onclick="window.open('https://wa.me/201010408471', '_blank')">
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.0137 15.0337C10.0474 15.0337 6.82042 11.8047 6.81934 7.83723C6.82042 6.8315 7.6391 6.01367 8.64236 6.01367C8.74551 6.01367 8.84757 6.02236 8.94529 6.03974C9.16027 6.07558 9.36441 6.14835 9.55225 6.25804C9.57939 6.27434 9.59784 6.3004 9.60219 6.33081L10.0213 8.97329C10.0267 9.00479 10.017 9.0352 9.99633 9.05801C9.76506 9.31433 9.46972 9.49896 9.14073 9.59128L8.98221 9.63581L9.04192 9.78895C9.58264 11.1661 10.6836 12.2663 12.0615 12.8094L12.2146 12.8702L12.2591 12.7116C12.3514 12.3826 12.536 12.0871 12.7922 11.8558C12.8107 11.8384 12.8356 11.8297 12.8606 11.8297C12.866 11.8297 12.8715 11.8297 12.878 11.8308L15.5197 12.2501C15.5512 12.2555 15.5772 12.2729 15.5935 12.3C15.7021 12.4879 15.7748 12.6932 15.8118 12.9082C15.8291 13.0038 15.8367 13.1048 15.8367 13.2102C15.8367 14.2148 15.0191 15.0326 14.0137 15.0337Z"
                                    fill="#FDFDFD" />
                                <path
                                    d="M21.0474 9.62952C20.8335 7.21187 19.726 4.96907 17.929 3.31495C16.1212 1.65104 13.7759 0.734375 11.3231 0.734375C5.93982 0.734375 1.5598 5.1157 1.5598 10.5006C1.5598 12.3078 2.05816 14.0684 3.0017 15.602L0.897461 20.2613L7.63473 19.5434C8.80628 20.0235 10.0462 20.2668 11.322 20.2668C11.6575 20.2668 12.0017 20.2494 12.347 20.2136C12.651 20.181 12.9583 20.1332 13.2602 20.0724C17.7683 19.1611 21.0593 15.1589 21.0854 10.5527V10.5006C21.0854 10.2073 21.0723 9.91408 21.0463 9.62952H21.0474ZM7.89423 17.4983L4.16675 17.8958L5.27968 15.4293L5.05709 15.1306C5.0408 15.1089 5.02452 15.0872 5.00606 15.0622C4.03972 13.7274 3.52939 12.1504 3.52939 10.5017C3.52939 6.20288 7.0256 2.70564 11.3231 2.70564C15.3492 2.70564 18.7618 5.84773 19.0908 9.85869C19.1082 10.0737 19.1179 10.2899 19.1179 10.5027C19.1179 10.5636 19.1168 10.6233 19.1158 10.6874C19.0332 14.2835 16.5218 17.3376 13.0082 18.1152C12.7401 18.1749 12.4654 18.2206 12.1917 18.2499C11.9073 18.2825 11.6152 18.2988 11.3253 18.2988C10.2927 18.2988 9.28945 18.0989 8.34157 17.7036C8.23625 17.6612 8.13309 17.6156 8.03646 17.5689L7.89532 17.5005L7.89423 17.4983Z"
                                    fill="#FDFDFD" />
                            </svg>
                            <span>{{__('web.contact_support')}}</span>
                        </button>
                    </div>
                    <div class="addToCartBtn">
                        <button data-id="{{ $product->id }}" onclick="addCart(this)" data-ext="{{ $product->extensions->isNotEmpty() ? 'true' : 'false' }}">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.5 15C14.3954 15 13.5 15.8954 13.5 17C13.5 18.1046 14.3954 19 15.5 19C16.6046 19 17.5 18.1046 17.5 17C17.5 15.8954 16.6046 15 15.5 15ZM15.5 15H7.79395C7.33288 15 7.10193 15 6.91211 14.918C6.74466 14.8456 6.59938 14.7291 6.49354 14.5805C6.3749 14.414 6.32719 14.1913 6.23274 13.7505L3.77148 2.26465C3.67484 1.81363 3.62587 1.58838 3.50586 1.41992C3.40002 1.27135 3.25477 1.15441 3.08732 1.08205C2.89746 1 2.66779 1 2.20653 1H1.5M4.5 4H17.3732C18.095 4 18.4555 4 18.6978 4.15036C18.91 4.28206 19.0653 4.48862 19.133 4.729C19.2104 5.00343 19.111 5.34996 18.911 6.04346L17.5264 10.8435C17.4068 11.2581 17.3469 11.465 17.2256 11.6189C17.1185 11.7547 16.9772 11.861 16.817 11.9263C16.6361 12 16.4211 12 15.9921 12H6.23047M6.5 19C5.39543 19 4.5 18.1046 4.5 17C4.5 15.8954 5.39543 15 6.5 15C7.60457 15 8.5 15.8954 8.5 17C8.5 18.1046 7.60457 19 6.5 19Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>{{__('web.add_to_cart')}}</span>
                        </button>
                    </div>
                    <div class="compareBtn">
                        <a onclick="addCompare(this)" data-id="{{ $product->id }}">
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M10.399 16.0646V19.0346C10.399 21.5096 9.40899 22.4996 6.934 22.4996H3.96401C1.48902 22.4996 0.499023 21.5096 0.499023 19.0346V16.0646C0.499023 13.5896 1.48902 12.5996 3.96401 12.5996H6.934C9.40899 12.5996 10.399 13.5896 10.399 16.0646Z"
                                    fill="#FD9636" />
                                <path opacity="0.4"
                                    d="M17.5486 10.4C20.2824 10.4 22.4986 8.18378 22.4986 5.44998C22.4986 2.71618 20.2824 0.5 17.5486 0.5C14.8148 0.5 12.5986 2.71618 12.5986 5.44998C12.5986 8.18378 14.8148 10.4 17.5486 10.4Z"
                                    fill="#FD9636" />
                                <path
                                    d="M14.5582 22.4987C14.2612 22.4987 13.9862 22.3337 13.8432 22.0807C13.7002 21.8167 13.7002 21.5087 13.8542 21.2447L14.9212 19.4627C15.1522 19.0667 15.6582 18.9457 16.0542 19.1767C16.4502 19.4077 16.5712 19.9137 16.3402 20.3097L16.1422 20.6397C18.8592 19.9357 20.8612 17.4717 20.8612 14.5457C20.8612 14.0947 21.2352 13.7207 21.6862 13.7207C22.1372 13.7207 22.5002 14.0947 22.5002 14.5567C22.5002 18.9347 18.9362 22.4987 14.5582 22.4987Z"
                                    fill="#FD9636" />
                                <path
                                    d="M1.32402 9.26697C0.873022 9.26697 0.499023 8.90397 0.499023 8.44197C0.499023 4.06399 4.06301 0.5 8.441 0.5C8.74899 0.5 9.01299 0.665 9.16699 0.917999C9.30999 1.182 9.30999 1.49 9.15599 1.754L8.089 3.52499C7.847 3.92099 7.341 4.05299 6.956 3.81099C6.56 3.57999 6.439 3.07399 6.67 2.67799L6.868 2.34799C4.16201 3.05199 2.14902 5.51598 2.14902 8.44197C2.14902 8.90397 1.77502 9.26697 1.32402 9.26697Z"
                                    fill="#FD9636" />
                            </svg>
                        </a>
                    </div>
                    <div class="favoritBtn">
                        <a onclick="toggleFavorite(this)" data-id="{{ $product->id }}">
                            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.5 4.67381C8.5 -0.0206301 1.5 0.47937 1.5 6.4794C1.5 12.4794 10.5 17.4796 10.5 17.4796C10.5 17.4796 19.5 12.4794 19.5 6.4794C19.5 0.47937 12.5 -0.0206301 10.5 4.67381Z"
                                    stroke="#FD9636" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                @if($product->items)
                    @foreach($product->items as $item)
                        <div class="product-del">{{$item->name}}</div>
                    @endforeach

                @endif
            </div>
        </section>
        <sectoin class="product-panners">
            <div class="sm-bna">
                <img src="{{url('') }}/storage/assets/product/sm-ban.png" alt="sm-ban">
            </div>
            <div class="bg-ban">
                <img src="{{url('') }}/storage/assets/product/bg-ban.png" alt="big-ban">
            </div>
        </sectoin>
        <section class="product-information">
            <div class="information-title">{{__('web.product_details')}}</div>
            <div class="information-table " id="tab-specification" role="tabpanel" aria-labelledby="tab-specification">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td>{{ __('products.material') }}</td>
                            <td>{!! $product->material !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('products.dimensions') }}</td>
                            <td>{!! $product->dimensions !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('products.color') }}</td>
                            <td>{!! $product->color !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('products.delivery') }}</td>
                            <td>{!! $product->delivery !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('products.made_in') }}</td>
                            <td>{!! $product->made_in !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('products.sku_code') }}</td>
                            <td>{!! $product->sku_code !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('web.category') }}</td>
                            <td>{!! $product->category->details->title !!}</td>
                        </tr>
                        <tr>
                            <td>{{ __('products.tags') }}</td>
                            <td>
                                @foreach ($product->tags as $key => $tag)
                                {{ $tag->details->name }} @if (count($product->tags) - 1 != $key)
                                ,
                                @endif
                                @endforeach
                            </td>
                        </tr>

                        @foreach ($product->sections as $section)
                        <tr>
                            <td>{{ $section->details->key }}</td>
                            <td>{{ $section->details->value }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
        <section class="product-information">
            <div class="information-title">
                <span class="title">{{__('web.reviews')}}</span>
                <div class="stars">
                    <span>{{ $product->rates['rate'] }} {{ __('web.out_of') }} 5</span>

                </div>
            </div>
            <div class="line"></div>

            @foreach ($product->rates['rating'] as $key => $rate)
                <div class="ratings">
                    <div class="rating">
                        <div class="stars">
                            @for ($m = 0; $m < (5-$key); $m++)
                                <svg width="24" height="21" viewBox="0 0 24 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.6198 0.564045L7.87648 5.85276C7.80014 5.99992 7.68734 6.12721 7.5478 6.22367C7.40826 6.32012 7.24616 6.38284 7.07548 6.40643L0.94198 7.25465C0.745508 7.2818 0.560942 7.36072 0.409161 7.4825C0.25738 7.60427 0.144444 7.76403 0.0831242 7.94371C0.0218048 8.12339 0.014555 8.3158 0.062191 8.4992C0.109827 8.68259 0.210447 8.84964 0.352673 8.98145L4.79164 13.098C5.04268 13.3308 5.1565 13.6659 5.098 13.9938L4.05022 19.8069C4.0167 19.993 4.03858 20.1844 4.11338 20.3593C4.18818 20.5342 4.31293 20.6858 4.47351 20.7967C4.63409 20.9077 4.8241 20.9738 5.02206 20.9874C5.22001 21.001 5.41803 20.9616 5.5937 20.8737L11.0804 18.1286C11.2332 18.0524 11.4031 18.0126 11.5756 18.0126C11.7481 18.0126 11.918 18.0524 12.0708 18.1286L17.5575 20.8737C17.7332 20.9616 17.9312 21.001 18.1292 20.9874C18.3271 20.9738 18.5171 20.9077 18.6777 20.7967C18.8383 20.6858 18.963 20.5342 19.0379 20.3593C19.1127 20.1844 19.1345 19.993 19.101 19.8069L18.0532 13.9938C18.0241 13.8321 18.0367 13.666 18.0901 13.5099C18.1435 13.3538 18.236 13.2125 18.3596 13.098L22.7986 8.98145C22.9408 8.84964 23.0414 8.68259 23.089 8.4992C23.1367 8.3158 23.1294 8.12339 23.0681 7.94371C23.0068 7.76403 22.8939 7.60427 22.7421 7.4825C22.5903 7.36072 22.4057 7.2818 22.2093 7.25465L16.0758 6.40643C15.9051 6.38284 15.743 6.32012 15.6034 6.22367C15.4639 6.12721 15.3511 5.99992 15.2748 5.85276L12.5314 0.564045C12.1378 -0.188015 11.0102 -0.188015 10.6198 0.564045Z"
                                    fill="black" fill-opacity="0.1" />
                                </svg>
                            @endfor
                            @for ($j = 0; $j < ($key); $j++)
                                <svg width="24" height="21" viewBox="0 0 24 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.0886 0.564045L8.34523 5.85276C8.26889 5.99992 8.15609 6.12721 8.01655 6.22367C7.87701 6.32012 7.71491 6.38284 7.54423 6.40643L1.41073 7.25465C1.21426 7.2818 1.02969 7.36072 0.877911 7.4825C0.72613 7.60427 0.613194 7.76403 0.551874 7.94371C0.490555 8.12339 0.483305 8.3158 0.530941 8.4992C0.578577 8.68259 0.679197 8.84964 0.821423 8.98145L5.26039 13.098C5.51143 13.3308 5.62525 13.6659 5.56675 13.9938L4.51897 19.8069C4.48545 19.993 4.50733 20.1844 4.58213 20.3593C4.65693 20.5342 4.78168 20.6858 4.94226 20.7967C5.10284 20.9077 5.29285 20.9738 5.49081 20.9874C5.68876 21.001 5.88678 20.9616 6.06245 20.8737L11.5492 18.1286C11.7019 18.0524 11.8719 18.0126 12.0444 18.0126C12.2169 18.0126 12.3868 18.0524 12.5395 18.1286L18.0263 20.8737C18.202 20.9616 18.4 21.001 18.5979 20.9874C18.7959 20.9738 18.9859 20.9077 19.1465 20.7967C19.3071 20.6858 19.4318 20.5342 19.5066 20.3593C19.5814 20.1844 19.6033 19.993 19.5698 19.8069L18.522 13.9938C18.4928 13.8321 18.5055 13.666 18.5588 13.5099C18.6122 13.3538 18.7047 13.2125 18.8283 13.098L23.2673 8.98145C23.4095 8.84964 23.5102 8.68259 23.5578 8.4992C23.6054 8.3158 23.5982 8.12339 23.5369 7.94371C23.4755 7.76403 23.3626 7.60427 23.2108 7.4825C23.059 7.36072 22.8745 7.2818 22.678 7.25465L16.5445 6.40643C16.3738 6.38284 16.2117 6.32012 16.0722 6.22367C15.9326 6.12721 15.8198 5.99992 15.7435 5.85276L13.0001 0.564045C12.6066 -0.188015 11.479 -0.188015 11.0886 0.564045Z"
                                    fill="#FFC100" />
                                </svg>
                            @endfor
                        </div>
                        <span>({{$rate['count']}})</span>
                        <div  class="ratePercent">
                            <div style="width: {{ $rate['percentage'] }}%;" class="percent"></div>
                        </div>
                    </div>
                </div>
            @endforeach

        </section>
    </div>
</div>

<section class="container no-padding-container">
    <div class="flash-sales-wrapper">
        <div class="sec-title">
            <h2><a href="{{route('web.shop', ['category_id' => $product->category_id])}}">{{__('web.related_products')}}</a></h2>
            <div class="flash-navigation">
                <a href="{{route('web.shop', ['category_id' => $product->category_id])}}">{{__('web.show_more')}}</a>
                <div class="flash-sales-slider-3-next flash-sales-slider-3-next-0">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20.5M20.5 12L13.5 5M20.5 12L13.5 19" stroke="black" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flash-sales-slider-3-prev flash-sales-slider-3-prev-0">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 5L4.5 12L11.5 19M4.5 12H20.5" stroke="black" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="flash-sales-slider-3">
            <div class="swiper-wrapper">

                @foreach ($releated_products as $row)
                    @include('web.component.product.product', ['product' => $row])
                @endforeach


            </div>
        </div>
    </div>
</section>
<section class="container no-padding-container">
    <div class="flash-sales-wrapper">
        <div class="sec-title">
            <h2><a>{{__('web.recently_viewed_items')}}</a></h2>
            <div class="flash-navigation">
{{--                <a href="#">{{__('web.show_more')}}</a>--}}
                <div class="flash-sales-slider-3-next flash-sales-slider-3-next-1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20.5M20.5 12L13.5 5M20.5 12L13.5 19" stroke="black" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flash-sales-slider-3-prev flash-sales-slider-3-prev-1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.5 5L4.5 12L11.5 19M4.5 12H20.5" stroke="black" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
        @if($view_products)
            <div class="flash-sales-slider-3">
                <div class="swiper-wrapper">

                    @foreach ($view_products as $row)
                        @include('web.component.product.product', ['product' => $row])
                    @endforeach


                </div>
            </div>

        @endif
    </div>
</section>


@endsection

@section('container_js')
    <script>
        var productImages = @json($product->photos);

        // Check if productImages is correctly populated
        var swiper = new Swiper(".big-img-swiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 8000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.big-img-swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    // Check if productImages[index] exists and has an image property
                    if (productImages[index] && productImages[index].image) {
                        var imageUrl = productImages[index].image;
                    } else {
                        // Fallback to a default image if not found
                        var imageUrl = "{{$product->image}}";
                    }

                    return `<div class="${className} small-img" data-swiper-slide-index="${index}">
                            <img src="${imageUrl}" alt="smallImg">
                        </div>`;
                },
            },
        });

        // Handle thumbnail click to navigate to the corresponding slide
        document.querySelectorAll('.small-img').forEach((thumbnail) => {
            thumbnail.addEventListener('click', function () {
                const slideIndex = this.getAttribute('data-swiper-slide-index');
                swiper.slideToLoop(slideIndex); // Slide to the clicked thumbnail
            });
        });
    </script>

    <script>



    function calculateSpaceBetween(websspace, mobsspace) {
        if (window.innerWidth <= 576) { 
            return mobsspace; 
        } else {
            return websspace; 
        }
        return 30;
    }

    function calculateSlidesPerViewResponsive(webscreen, mobscreen, swiperContainer) {
        const containerWidth = swiperContainer.clientWidth;
        
        let slideWidth;
        if (window.innerWidth <= 576) { 
            slideWidth = mobscreen; 
        } else {
            slideWidth = webscreen; 
        }
        
        const slidesPerView =containerWidth / slideWidth;

        return slidesPerView;
    }

    document.querySelectorAll('.flash-sales-slider-3').forEach((swiperContainer, index) => {
        const swiper = new Swiper(swiperContainer, {
            spaceBetween: calculateSpaceBetween(30, 10),
            slidesPerView: calculateSlidesPerViewResponsive(286, 161, swiperContainer),
            navigation: {
                nextEl: `.flash-sales-slider-3-next-${index}`,
                prevEl: `.flash-sales-slider-3-prev-${index}`,
            },
            on: {
                resize: function () {
                    this.params.slidesPerView = calculateSlidesPerViewResponsive(286, 161, swiperContainer);
                    this.params.spaceBetween = calculateSpaceBetween(30, 10);
                    this.update();
                }
            }
        });
    });


    const plusButton = document.querySelector('.plus');
    const minusButton = document.querySelector('.minus');
    const inputField = document.querySelector('.count-buttons input');

    plusButton.addEventListener('click', function() {
        let currentValue = parseInt(inputField.value);
        inputField.value = currentValue + 1;
    });

    minusButton.addEventListener('click', function() {
        let currentValue = parseInt(inputField.value);
        if (currentValue > 1) {
            inputField.value = currentValue - 1;
        }
    });


</script>
<script>
    function setProgress(percentage) {
        percentage = Math.max(0, Math.min(100, percentage));

        const redCircle = document.getElementById('red-circle');
        const dashArrayValue = `${percentage}, 100`; // Set dasharray to current percentage and the remaining length

    }

    setProgress({{$product->percentage}});
</script>
<script>
    const expandDescription = (button) => {
        const description = document.querySelector('.product-description-text');
        description.classList.toggle('hideText');

        if (description.classList.contains('hideText')) {
            button.textContent = "{{__('web.see_more')}}";
        } else {
            button.textContent = "{{__('web.show_less')}}";
        }
    }
</script>
@endsection