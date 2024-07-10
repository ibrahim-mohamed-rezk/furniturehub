<section class="section-box pt-50 bg-home9">
    <div class="container">
        <div class="box-product-category">
            <div class="d-flex">
                <div class="box-category-left">
                    <div class="box-menu-category bg-white">
                        <a href="{{ route('web.shop',$category->slug) }}">
                            <h5 class="title-border-bottom mb-20">{{ $category->title }}</h5>
                        </a>
                        {{-- <h5 class="title-border-bottom mb-20">{{$category->title}}</h5> --}}
                        <ul class="list-nav-arrow">
                            @foreach ($category->models as $model)
                                <li>
                                    <a
                                        href="{{ route('web.shop',$category->slug.'/'.$model->slug) }}">{{ $model->details->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="box-category-right">
                    <div class="row">
                        @foreach ($category->product_fourth() as $row)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6" id="component_category">
                                @include('web.component.product.productComponentCategory', [
                                    'product' => $row,
                                ])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
