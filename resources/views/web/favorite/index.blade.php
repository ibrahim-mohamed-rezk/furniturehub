@extends('web.layouts.container')


@section('content')
<div class="section-box">
    <div class="breadcrumbs-div">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="font-xs color-gray-1000" href="index.html">{{ __('web.home') }}</a></li>
                <li><a class="font-xs color-gray-500" href="shop-grid.html">{{ __('web.shop') }}</a></li>
                <li><a class="font-xs color-gray-500" href="shop-wishlist.html">{{ __('web.wishlist') }}</a></li>
            </ul>
        </div>
    </div>
</div>
<section class="section-box shop-template">
    <div class="container">
        <div class="box-wishlist">
            <div class="head-wishlist">
                <div class="item-wishlist">
                    <div class="wishlist-cb">
                        <input class="cb-layout cb-all" type="checkbox">
                    </div>
                    <div class="wishlist-product"><span class="font-md-bold color-brand-3">{{ __('web.product') }}</span></div>
                    <div class="wishlist-price"><span class="font-md-bold color-brand-3">{{ __('web.price') }}</span></div>
                    <div class="wishlist-status"><span class="font-md-bold color-brand-3">{{ __('web.stock_status') }}</span></div>
                    <div class="wishlist-action"><span class="font-md-bold color-brand-3">{{ __('web.action') }}</span></div>
                    <div class="wishlist-remove"><span class="font-md-bold color-brand-3">{{ __('web.remove') }}</span></div>
                </div>
            </div>
            <div class="content-wishlist">
                @foreach($favorites as $row)
                @include('web.component.favorite.favoriteComponent',['favorite'=>$row])
                @endforeach
            </div>
        </div>
        <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
        <div class="list-products-5 mt-20 mb-40">
            @foreach($suggest_products as $row)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-2" id="component_product">

                    @include('web.component.product.productCobon',['product'=>$row])
                </div>
            @endforeach
        </div>
        <h4 class="color-brand-3">{{ __('web.recently_viewed_items') }}</h4>
        <div class="list-products-5 mt-20 mb-40">
            @foreach($views_products as $row)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-2" id="component_product">

                    @include('web.component.product.productCobon',['product'=>$row])
                </div>
            @endforeach
        </div>
        
    </div>
</section>




@section('container_js')
<script>
    function deleteFavorite(elem) {
        event.preventDefault();
        let fav_id = $(elem).attr('data-id');
        let url_delete_favorite = "{{route('favorite.destroy',':fav_id')}}"
        url_delete_favorite = url_delete_favorite.replace(':fav_id', fav_id);

        $.ajax({
            url: url_delete_favorite,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: '',
            dataType: 'json',
            success: function(data) {
                if (data.message != '') {
                    toasterSuccess(data.message);
                }
                $(elem).closest('.item-wishlist').fadeOut(1000)
                viewFavorite()
            },
            error: function(data) {
                toasterError(Object.values(data.responseJSON.errors)[0]);
            }
        })
    }
</script>
@endsection
@endsection