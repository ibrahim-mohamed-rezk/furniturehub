@extends('admin.layouts.container')

@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">{{ $title }}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data" action="{{ $action }}">
                    @if ($cobon ?? '' && $cobon->id)
                        {{ method_field('patch') }}
                    @endif
                    @CSRF
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label>{{ __('cobons.type') }} </label>
                                    <select onchange="typeSelect(this)" name="type" class="form-select">
                                        <option value="all" @if ($cobon ?? '' && $cobon->id) @if ('all' == $cobon->type) selected @endif  @endif>all</option>
                                        <option value="category" @if ($cobon ?? '' && $cobon->id) @if ('category' == $cobon->type) selected @endif @endif>category</option>
                                        <option value="product" @if ($cobon ?? '' && $cobon->id) @if ('product' == $cobon->type) selected @endif @endif>product</option>
                                        <option value="sales" @if ($cobon ?? '' && $cobon->id) @if ('sales' == $cobon->type) selected @endif @endif>sales</option>
                                    </select>
                                </div>
                                    <div class="col-md-6 mb-4">
                                        <label>{{ __('cobons.status') }} </label>
                                        <select name="status" class="form-select">
                                            <option value="value" @if ($cobon ?? '' && $cobon->id) @if ('value' == $cobon->status) selected @endif  @endif>Value</option>
                                            <option value="percentage" @if ($cobon ?? '' && $cobon->id) @if ('percentage' == $cobon->status) selected @endif @endif>Percentage</option>
                                        </select>
                                    </div>

                                <div class="col-md-6 mb-4">
                                    <label>{{ __('cobons.code') }} </label>
                                    <input type="text" name="code"
                                           class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                           placeholder="{{ __('cobons.code') }} "
                                           value='{{ old('code', $cobon->code ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label>{{ __('cobons.discount') }} </label>
                                    <input type="number" name="discount"
                                        class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('cobons.discount') }} "
                                        value='{{ old('discount', $cobon->discount ?? '') }}'>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label>{{ __('cobons.start_date') }} </label>
                                    <input type="date" name="start_date"
                                        class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('cobons.start_date') }} "
                                        value='{{ old('start_date', $cobon->start_date ?? '') }}'>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label>{{ __('cobons.end_date') }} </label>
                                    <input type="date" name="end_date"
                                        class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}"
                                        placeholder="{{ __('cobons.end_date') }} "
                                        value='{{ old('end_date', $cobon->end_date ?? '') }}'>
                                </div>
                                <div class="col-md-12 mb-4" id="products" @if ($cobon ?? '' && $cobon->id) @if($cobon->type != 'product') style="display: none" @endif  @else style="display: none" @endif>
                                    <label for="validationServer">{{__('cobons.product')}}</label>
                                    <input type="text" name="search_product" value="" placeholder="{{__('cobons.product')}}" id="input-product" class="form-control usersBox" />
                                    <div id="branche-product" class="well well-sm usersBox form-control" style="height: 150px; overflow: auto;">
                                        @if ($cobon ?? '' && $cobon->id)
                                            @foreach($products as $row)

                                                <div id="branche-product{{$row->product_id}}" class="branches"><i class="fa fa-minus-circle"></i> {{$row->product->descriptions()->name}}<input type="hidden" name="product_ids[]" value="{{$row->product_id}}"></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4" id="categories"  @if ($cobon ?? '' && $cobon->id) @if($cobon->type != 'category') style="display: none" @endif   @else style="display: none" @endif>
                                    <label for="validationServer">{{__('cobons.category')}}</label>
                                    <input type="text" name="search_category" value="" placeholder="{{__('cobons.category')}}" id="input-category" class="form-control usersBox" />
                                    <div id="branche-category" class="well well-sm usersBox form-control" style="height: 150px; overflow: auto;">
                                        @if ($cobon ?? '' && $cobon->id)
                                            @foreach($categories as $row)
                                                <div id="branche-category{{$row->category_id}}" class="branches"><i class="fa fa-minus-circle"></i> {{$row->category->descriptions()->title}}<input type="hidden" name="category_ids[]" value="{{$row->category_id}}"></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-md rounded font-sm hover-up">{{ __('dashboard.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@section('inner_js')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        let url_search_category = "{{url('')}}/admin/search/category",
            url_search_product = "{{url('')}}/admin/search/product"
    </script>
    <script>
        function typeSelect(elem)
        {
            let target = $(elem).val();
            $('#products').hide();
            $('#categories').hide();
            if(target == 'product')
            {
                $('#products').show();
            }
            else if(target == 'category')
            {
                $('#categories').show();
            }
        }
    </script>

    <script>

        $('input[name=\'search_product\']').autocomplete({

            'source': function (request, response) {
                let target = request['term'];
                $.ajax({
                    url: url_search_product,
                    data: 'name='+target,
                    dataType: 'json',
                    type: 'get',

                    success: function (json) {
                        response($.map(json, function (item) {
                            return {
                                label:`${item['name']}` ,
                                value: item['name'],
                                id: item['id']
                            };
                        }));
                    }
                });
            }, 'select': function (e, selected) {
                var item = selected['item'];
                $('#branche-product' + item['id']).remove();
                $('#input-product').removeAttr('value');
                $('#branche-product').append('<div id="branche-product' + item['id'] + '" class="branches"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="product_ids[]" value="' + item['id'] + '" /></div>');
            }
        });

        $('#branche-product').delegate('.fa-minus-circle', 'click', function () {
            $(this).parent().remove();
        });
    </script>
    <script>

        $('input[name=\'search_category\']').autocomplete({

            'source': function (request, response) {
                let target = request['term'];
                $.ajax({
                    url: url_search_category,
                    data: 'name='+target,
                    dataType: 'json',
                    type: 'get',

                    success: function (json) {
                        response($.map(json, function (item) {
                            return {
                                label:`${item['title']}` ,
                                value: item['title'],
                                id: item['id']
                            };
                        }));
                    }
                });
            }, 'select': function (e, selected) {
                var item = selected['item'];
                $('#branche-category' + item['id']).remove();
                $('#input-category').removeAttr('value');
                $('#branche-category').append('<div id="branche-product' + item['id'] + '" class="branches"><i class="fa fa-minus-circle"></i> ' + item['label'] + '<input type="hidden" name="category_ids[]" value="' + item['id'] + '" /></div>');
            }
        });

        $('#branche-category').delegate('.fa-minus-circle', 'click', function () {
            $(this).parent().remove();
        });
    </script>
@endsection
@endsection
