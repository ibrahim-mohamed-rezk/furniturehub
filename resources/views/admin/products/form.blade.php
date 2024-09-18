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
            <form method="post" enctype="multipart/form-data" onsubmit="saveForm(this)" action="{{ $action }}">
                @if ($product ?? '' && $product->id)
                {{ method_field('patch') }}
                @endif
                @CSRF
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.seller_id') }}</label>
                                <select name="seller_id" class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" id="validationServer">
                                    <option value="">{{ __('products.furniture_hub') }}</option>
                                    @foreach ($sellers as $row)
                                    <option {{ isset($product) ? ($product->seller_id == $row->id ? 'selected' : '') : '' }} value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.country_id') }}</label>
                                <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" id="validationServer">
                                    <option value="">{{ __('products.select') }}</option>
                                    @foreach ($categories as $row)
                                    <option {{ isset($product) ? ($product->category_id == $row->id ? 'selected' : '') : '' }} value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.page_offer') }}</label>
                                <select name="page_offer" class="form-control {{ $errors->has('page_offer') ? 'is-invalid' : '' }}" id="validationServer">
                                    <option value="">{{ __('products.select') }}</option>
                                    <option {{ isset($product) ? ($product->page_offer == 'no' ? 'selected' : '') : '' }} value="no">{{ __('web.no') }}</option>
                                    <option {{ isset($product) ? ($product->page_offer == 'yes' ? 'selected' : '') : '' }} value="yes">{{ __('web.yes') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.type_product') }}</label>
                                <select name="type_product" class="form-control {{ $errors->has('type_product') ? 'is-invalid' : '' }}" id="validationServer">
                                    <option value="">{{ __('products.select') }}</option>
                                    <option {{ isset($product) ? ($product->type == 'piece' ? 'selected' : '') : '' }} value="piece">{{ __('products.piece') }}</option>
                                    <option {{ isset($product) ? ($product->type == 'meter' ? 'selected' : '') : '' }} value="meter">{{ __('products.meter') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.count') }}</label>
                                <input type="number" name="count" class="form-control {{ $errors->has('count') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('products.count') }}" value='{{ old('count', $product->count ?? '') }}'>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.cost') }}</label>
                                <input type="number" name="cost" class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('products.cost') }}" value='{{ old('cost', $product->cost ?? '') }}'>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.sku_code') }}</label>
                                <input type="text" name="sku_code" class="form-control {{ $errors->has('sku_code') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('products.sku_code') }}" value='{{ old('sku_code', $product->sku_code ?? '') }}'>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.cost_discount') }}</label>
                                <input type="text" name="cost_discount" class="form-control {{ $errors->has('cost_discount') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('products.cost_discount') }}" value='{{ old('cost_discount', $product->cost_discount ?? '') }}'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>{{ __('products.descriptions') }}</h5>
                            </div>
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.name') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="name_{{ $language->local }}" class="form-control {{ $errors->has('name_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.name') }} {{ $language->name }}" value='{{ old("name_{$language->local}", $product[$language->local]->name ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.slug') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="slug_{{ $language->local }}" class="form-control {{ $errors->has('slug_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.slug') }} {{ $language->name }}" value='{{ old("slug_{$language->local}", $product[$language->local]->slug ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.material') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="material_{{ $language->local }}" class="form-control {{ $errors->has('material_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.material') }} {{ $language->name }}" value='{{ old("material_{$language->local}", $product[$language->local]->material ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.dimensions') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="dimensions_{{ $language->local }}" class="form-control {{ $errors->has('dimensions_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.dimensions') }} {{ $language->name }}" value='{{ old("dimensions_{$language->local}", $product[$language->local]->dimensions ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.color') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="color_{{ $language->local }}" class="form-control {{ $errors->has('color_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.color') }} {{ $language->name }}" value='{{ old("color_{$language->local}", $product[$language->local]->color ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.delivery') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="delivery_{{ $language->local }}" class="form-control {{ $errors->has('delivery_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.delivery') }} {{ $language->name }}" value='{{ old("delivery_{$language->local}", $product[$language->local]->delivery ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.made_in') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="made_in_{{ $language->local }}" class="form-control {{ $errors->has('made_in_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.made_in') }} {{ $language->name }}" value='{{ old("made_in_{$language->local}", $product[$language->local]->made_in ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <!--<div class="col-md-6 mb-4">-->
                            <!--    <label for="validationServer{{ $key }}">{{ __('products.slug') }}-->
                            <!--        {{ $language->name }}</label>-->
                            <!--    <input type="text" name="slug_{{ $language->local }}"-->
                            <!--        class="form-control {{ $errors->has('slug_' . $language->local) ? 'is-invalid' : '' }}"-->
                            <!--        id="validationServer{{ $key }}"-->
                            <!--        placeholder="{{ __('products.slug') }} {{ $language->name }}"-->
                            <!--        value='{{ old("slug_{$language->local}", $product[$language->local]->slug ?? '') }}'>-->
                            <!--</div>-->

                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.meta_description') }}
                                    {{ $language->name }}</label>
                                <textarea id="furtextarea{{$key+1}}" name="meta_description_{{ $language->local }}" class="form-control {{ $errors->has('meta_description_' . $language->local) ? 'is-invalid' : '' }}" placeholder="{{ __('products.meta_description') }} {{ $language->name }}" rows="4" style="height: 48px;">{{ old("meta_description_{$language->local}", $product[$language->local]->meta_description ?? '') }}</textarea>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.keywords') }}
                                    {{ $language->name }}</label>
                                <input type="text" name="keywords_{{ $language->local }}" class="form-control {{ $errors->has('keywords_' . $language->local) ? 'is-invalid' : '' }}" id="validationServer{{ $key }}" placeholder="{{ __('products.keywords') }} {{ $language->name }}" value='{{ old("keywords_{$language->local}", $product[$language->local]->keywords ?? '') }}'>
                            </div>
                            @endforeach
                            @foreach (languages() as $key => $language)
                            <div class="col-md-6 mb-4">
                                <label for="validationServer{{ $key }}">{{ __('products.description') }}
                                    {{ $language->name }}</label>
                                <textarea id="furtextareasub{{$key+1}}" name="description_{{ $language->local }}" class="form-control {{ $errors->has('description_' . $language->local) ? 'is-invalid' : '' }}" placeholder="{{ __('products.description') }} {{ $language->name }}" rows="4" style="height: 48px;">
                                            {!! old("description_{$language->local}", $product[$language->local]->description ?? '') !!}</textarea>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>{{ __('products.photos') }}</h5>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationServer">{{ __('products.image') }}</label>
                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" id="validationServer" placeholder="{{ __('products.image') }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                @if ($product ?? '' && $product->id)
                                <img src="{{ asset($product->image) }}" style="margin-top: 15px;height: 5pc;width: 15pc;">
                                @endif
                            </div>
                            <div class="col-md-12 row" id="photos">
                                @if ($product ?? '' && $product->id)
                                @foreach ($photos as $key => $photo)
                                <div class="row pricing-list-item border-item mb-4" style="background-color: rgba(21,97,203,0.1);height:auto">

                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('products.photo') }}</label>
                                        <input type="hidden" name="images[{{ $key }}][id]" value="{{ $photo->id }}">
                                        <input type="file" name="images[{{ $key }}][image]" class="form-control " id="validationServer" placeholder="{{ __('products.image') }}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <img src="{{ asset($photo->image) }}" style="margin-top: 15px;height: 5pc;width: 15pc;">
                                    </div>
                                    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
                                        <i class="fas fa-times-circle" data-id="{{ $photo->id }}" onclick="reomvephoto(this)"></i>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <a style="cursor: pointer;" data-id="{{ $count_photos }}" onclick="addphoto(this)" class="btn_1 gray "><i class="fa fa-fw fa-plus-circle"></i>{{ __('products.addphoto') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>{{ __('products.items') }}</h5>
                            </div>
                            <div class="col-md-12 row" id="items">
                                @if ($product ?? '' && $product->id)
                                @foreach ($items as $key => $item)
                                <div class="row pricing-list-item border-item mb-4" style="background-color: rgba(21,97,203,0.1);height:auto">

                                    <input type="hidden" name="items[{{ $key }}][id]" value="{{ $item->id }}">
                                    @foreach (languages() as $language)
                                    <div class="col-md-5 mb-4">
                                        <label for="validationServer">{{ __('products.name') }}</label>
                                        <input type="text" name="items[{{ $key }}][name_{{ $language->local }}]" class="form-control " id="validationServer" placeholder="{{ __('products.name') . ' ' . $language->local }}" value="{{ $item->descriptions($language->id)->name }}">
                                    </div>
                                    @endforeach
                                    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
                                        <i class="fas fa-times-circle" onclick="remove(this)"></i>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <a style="cursor: pointer;" data-id="{{ $count_items }}" onclick="additem(this)" class="btn_1 gray "><i class="fa fa-fw fa-plus-circle"></i>{{ __('products.additem') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>{{ __('products.extensions') }}</h5>
                            </div>
                            <!-- <div class="col-md-12 row" id="points">
                                    @if ($product ?? '' && $product->id)
                                        @foreach ($points as $key => $point)
                                            <div class="row pricing-list-item border-item mb-4"
                                                style="background-color: rgba(21,97,203,0.1);height:auto">

                                                <input type="hidden" name="points[{{ $key }}][id]"
                                                    value="{{ $point->id }}">
                                                @foreach (languages() as $language)
                                                    <div class="col-md-5 mb-4">
                                                        <label for="validationServer">{{ __('products.key') }}</label>
                                                        <input type="text"
                                                            name="points[{{ $key }}][key_{{ $language->local }}]"
                                                            class="form-control " id="validationServer"
                                                            placeholder="{{ __('products.key') . ' ' . $language->local }}"
                                                            value="{{ $point->descriptions($language->id)->key }}">
                                                    </div>
                                                @endforeach
                                                <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
                                                    <i class="fas fa-times-circle" onclick="remove(this)"></i>
                                                </div>
                                                @foreach (languages() as $language)
                                                    <div class="col-md-6 mb-4">
                                                        <label for="validationServer">{{ __('products.value') }}</label>
                                                        <input type="text"
                                                            name="points[{{ $key }}][value_{{ $language->local }}]"
                                                            class="form-control " id="validationServer"
                                                            placeholder="{{ __('products.value') . ' ' . $language->local }}"
                                                            value="{{ $point->descriptions($language->id)->value }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-md-12 mb-4">
                                    <a style="cursor: pointer;" data-id="{{ $count_points }}" onclick="addpoint(this)"
                                        class="btn_1 gray "><i
                                            class="fa fa-fw fa-plus-circle"></i>{{ __('products.addpoint') }}</a>
                                </div> -->
                            <div class="col-lg-12 mb-4">
                                <div class="clearfix"></div>
                                <div class="row">
                                    @foreach ($extensions as $key => $row)
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" {{ in_array($row['id'], $product_extensions) ? 'checked' : '' }} value="{{ $row['id'] }}" class="custom-control-input" id="extension_{{ $key }}" name="extensions[]">
                                            <label class="custom-control-label" for="extension_{{ $key }}">
                                                {{__('web.' . $row['title']) . "-" . $row['value'] }} </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>{{ __('products.sections') }}</h5>
                            </div>
                            <div class="col-md-12 row" id="sections">
                                @if ($product ?? '' && $product->id)
                                @foreach ($sections as $key => $section)
                                <div class="row pricing-list-item border-item mb-4" style="background-color: rgba(21,97,203,0.1);height:auto">
                                    <input type="hidden" name="sections[{{ $key }}][id]" value="{{ $section->id }}">

                                    @foreach (languages() as $language)
                                    <div class="col-md-5 mb-4">
                                        <label for="validationServer">{{ __('products.key') }}</label>
                                        <input type="text" name="sections[{{ $key }}][key_{{ $language->local }}]" class="form-control " id="validationServer" placeholder="{{ __('products.key') . ' ' . $language->local }}" value="{{ $section->descriptions($language->id)->key }}">
                                    </div>
                                    @endforeach
                                    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
                                        <i class="fas fa-times-circle" onclick="remove(this)"></i>
                                    </div>
                                    @foreach (languages() as $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('products.value') }}</label>
                                        <input type="text" name="sections[{{ $key }}][value_{{ $language->local }}]" class="form-control " id="validationServer" placeholder="{{ __('products.value') . ' ' . $language->local }}" value="{{ $section->descriptions($language->id)->value }}">
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <a style="cursor: pointer;" data-id="{{ $count_sections }}" onclick="addsection(this)" class="btn_1 gray "><i class="fa fa-fw fa-plus-circle"></i>{{ __('products.addsection') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <h5>{{ __('products.tags') }}</h5>
                            </div>
                            <div class="col-md-12 row" id="tags">
                                @if ($product ?? '' && $product->id)
                                @foreach ($tags as $key => $tag)
                                <div class="row pricing-list-item border-item mb-4" style="background-color: rgba(21,97,203,0.1);height:auto">

                                    <input type="hidden" name="tags[{{ $key }}][id]" value="{{ $tag->id }}">
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('products.photo') }}</label>
                                        <input type="file" name="tags[{{ $key }}][image]" class="form-control " id="validationServer" placeholder="{{ __('products.image') }}">
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <img src="{{ asset($tag->image) }}" style="margin-top: 15px;height: 5pc;width: 15pc;">
                                    </div>
                                    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
                                        <i class="fas fa-times-circle" onclick="remove(this)"></i>
                                    </div>
                                    @foreach (languages() as $language)
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('products.name') }}</label>
                                        <input type="text" name="tags[{{ $key }}][name_{{ $language->local }}]" class="form-control " id="validationServer" placeholder="{{ __('products.name') . ' ' . $language->local }}" value="{{ $tag->descriptions($language->id)->name }}">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer">{{ __('products.description') }}</label>
                                        <input type="text" name="tags[{{ $key }}][description_{{ $language->local }}]" class="form-control " id="validationServer" placeholder="{{ __('products.description') . ' ' . $language->local }}" value="{{ $tag->descriptions($language->id)->description }}">
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <div class="col-md-12 mb-4">
                                <a style="cursor: pointer;" data-id="{{ $count_tags }}" onclick="addtag(this)" class="btn_1 gray "><i class="fa fa-fw fa-plus-circle"></i>{{ __('products.addtag') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <button type="submit" class="btn btn-md rounded font-sm hover-up">{{ __('dashboard.submit') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>


@section('inner_js')
<script>
    var editor1, editor2, editor3, editor4;

    ClassicEditor
        .create(document.querySelector('#furtextarea1'), {
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            }
        })
        .then(newEditor => {
            editor1 = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#furtextarea2'), {
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            }
        })
        .then(newEditor => {
            editor2 = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#furtextareasub1'), {
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            }
        })
        .then(newEditor => {
            editor3 = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#furtextareasub2'), {
            ckfinder: {
                uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            }
        })
        .then(newEditor => {
            editor4 = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

        function saveForm(elem) {
            event.preventDefault();

            // Get the content of the editors
            var descriptionContent1 = editor1.getData();
            var descriptionContent2 = editor2.getData();
            var descriptionContent3 = editor3.getData();
            var descriptionContent4 = editor4.getData();

            var action = $(elem).attr('action');
            let dataform = new FormData($(elem)[0]);

            // Append the content of the editors to the FormData
            dataform.append('meta_description_en', descriptionContent2);
            dataform.append('meta_description_ar', descriptionContent1);
            dataform.append('description_en', descriptionContent4);
            dataform.append('description_ar', descriptionContent3);

            $.ajax({
                url: action,
                type: 'POST',
                data: dataform,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#errors').css('display', 'none');
                    $('#errors').html('');
                    window.location.assign({!! json_encode(url(getCurrentLocale() . '/admin/products')) !!});
                },
                error: function (data) {
                    console.log(data.responseJSON.errors);
                    $('#errors').css('display', 'block');
                    $('#errors').html('');
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("html").offset().top
                    }, 500);
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#errors').append('<li>' + value + '</li>');
                    });
                }
            });
        }

    // Ensure filtering function is called after a delay
    setTimeout(function() {
        filtering(null);
    }, 1000);

    function addphoto(elem) {
        var num = $(elem).attr('data-id');

        var newrow = parseInt(num) + 1;
        $(elem).attr('data-id', newrow);

        $.ajax({
            url: url_addphoto,
            type: 'GET',
            data: 'key=' + num,
            success: function(data) {
                $('#photos').append(data);
            }
        })
    }

    function addsection(elem) {
        var num = $(elem).attr('data-id');

        var newrow = parseInt(num) + 1;
        $(elem).attr('data-id', newrow);

        $.ajax({
            url: url_addsection,
            type: 'GET',
            data: 'key=' + num,
            success: function(data) {
                $('#sections').append(data);
            }
        })
    }

    function addpoint(elem) {
        var num = $(elem).attr('data-id');

        var newrow = parseInt(num) + 1;
        $(elem).attr('data-id', newrow);

        $.ajax({
            url: url_addpoint,
            type: 'GET',
            data: 'key=' + num,
            success: function(data) {
                $('#points').append(data);
            }
        })
    }

    function additem(elem) {
        var num = $(elem).attr('data-id');

        var newrow = parseInt(num) + 1;
        $(elem).attr('data-id', newrow);

        $.ajax({
            url: url_additem,
            type: 'GET',
            data: 'key=' + num,
            success: function(data) {
                $('#items').append(data);
            }
        })
    }

    function addtag(elem) {
        var num = $(elem).attr('data-id');

        var newrow = parseInt(num) + 1;
        $(elem).attr('data-id', newrow);

        $.ajax({
            url: url_addtag,
            type: 'GET',
            data: 'key=' + num,
            success: function(data) {
                $('#tags').append(data);
            }
        })
    }

    function remove(elem) {
        $(elem).closest('.row').remove();
    }

    function reomvephoto(elem) {
        var id = $(elem).attr('data-id');
        $.ajax({
            url: url_removephoto,
            type: 'GET',
            data: 'id=' + id,
            success: function(data) {
                $(elem).closest('.row').remove();

            }
        })

    }
</script>
<script>
    let url_addphoto = {!!json_encode(url(getCurrentLocale().'/admin/addphoto')) !!},
        url_removephoto = {!!json_encode(url(getCurrentLocale().'/admin/removephoto')) !!},
        url_addsection = {!!json_encode(url(getCurrentLocale().'/admin/addsection')) !!},
        url_addpoint = {!!json_encode(url(getCurrentLocale().'/admin/addpoint')) !!},
        url_additem = {!!json_encode(url(getCurrentLocale().'/admin/additem')) !!},
        url_addtag = {!!json_encode(url(getCurrentLocale().'/admin/addtag')) !!}
</script>

@endsection
@endsection