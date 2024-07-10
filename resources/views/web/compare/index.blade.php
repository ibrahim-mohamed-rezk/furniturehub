@extends('web.layouts.container')


@section('content')
<div class="section-box">
    <div class="breadcrumbs-div">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="font-xs color-gray-1000" href="{{ route('web.index') }}">{{ __('web.home') }}</a></li>
                <li><a class="font-xs color-gray-500" href="{{ route('web.shop') }}">{{ __('web.shop') }}</a></li>
                <li><a class="font-xs color-gray-500" href="{{ URL::current() }}">{{ __('web.compare') }}</a></li>
            </ul>
        </div>
    </div>
</div>
<section class="section-box shop-template">
    <div class="container">
        <div class="row mb-80">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="box-compare-products">
                    <div class="table-responsive">
                        @if(count($compares) > 0)
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>{{ __('web.products') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <img src="{{$row->product->image_url}}" loading="lazy" alt="{{$row->product->details->name}}">
                                        <h6>
                                            <a class="text-brand-3" href="{{$row->url}}">{{$row->product->details->name}}</a>
                                        </h6>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>
                                        <span>{{ __('web.reviews') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <div class="rating">
                                            @for($i=0 ; $i < $row->product->rates['rate'];$i++)
                                                <img src="{{ url('') }}/public/assets/web/ASSETS/imgs/template/icons/star.svg" loading="lazy" alt="Furniture Hub">
                                            @endfor
                                        </div>
                                    </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <span>{{ __('web.product_type') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <span>{{$row->product->category->details->title}}</span>
                                    </td>
                                    @endforeach
                                </tr>

                                <tr>
                                    <td>
                                        <span>{{ __('web.price') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <span class="font-sm-bold color-brand-3">{{$row->product->price['price']}}</span>
                                    </td>
                                    @endforeach

                                </tr>
                                <tr>
                                    <td>
                                        <span>{{ __('web.stock_status') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <span class="btn btn-gray font-sm-bold">{{ $row->product->stocked }}</span>
                                    </td>
                                    @endforeach

                                </tr>
                                <tr>
                                    <td>
                                        <span>{{ __('web.buy_now') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <a class="btn btn-buy w-auto" @if($row->product->bought['status'] == 'inStock') data-id="{{$row->product->id}}" onclick="addCart(this)" style="cursor:pointer;" @else href="{{ $row->product->bought['action'] }}" @endif >{{ $row->product->bought['title'] }}</a>
                                    </td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td>
                                        <span>{{ __('web.remove') }}</span>
                                    </td>
                                    @foreach($compares as $row)
                                    <td class="compare{{$row->id}}">
                                        <a class="btn btn-delete" data-id="{{$row->id}}" onclick="deleteFavorite(this)" href="#"></a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
        <div class="list-products-5 mt-20 mb-40">
            @foreach($suggest_products as $row)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 p-2" id="component_product">
                    @include('web.component.product.productCobon', ['product' => $row])
                </div>
            @endforeach
        </div>
        <h4 class="color-brand-3">{{ __('web.you_may_also_like') }}</h4>
        <div class="list-products-5 mt-20">
            @foreach($views_products as $row)
                @include('web.component.product.viewComponent',['product'=>$row])
            @endforeach
        </div>
    </div>
</section>




@section('container_js')
<script>
    function deleteFavorite(elem) {
        event.preventDefault();
        let compare_id = $(elem).attr('data-id');
        var url_delete_compare = "{{route('compare.destroy',':compare_id')}}"
        url_delete_compare = url_delete_compare.replace(':compare_id', compare_id);

        $.ajax({
            url: url_delete_compare,
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
                $('.compare' + compare_id).fadeOut(1000)
            },
            error: function(data) {
                toasterError(Object.values(data.responseJSON.errors)[0]);
            }
        })
    }
</script>
@endsection
@endsection