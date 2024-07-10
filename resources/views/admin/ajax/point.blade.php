<div class="row pricing-list-item border-item mb-4"  style="background-color: rgba(21,97,203,0.1);height:auto">
    @foreach(languages() as $language)
        <div class="col-md-5 mb-4">
            <label for="validationServer">{{ __('products.key') }}</label>
            <input type="text" name="points[{{$key}}][key_{{$language->local}}]"
                   class="form-control "
                   id="validationServer" placeholder="{{ __('products.key') .' '.$language->local }}">
        </div>
    @endforeach
    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
        <i class="fas fa-times-circle" onclick="remove(this)"></i>
    </div>
    @foreach(languages() as $language)
        <div class="col-md-6 mb-4">
            <label for="validationServer">{{ __('products.value') }}</label>
            <input type="text" name="points[{{$key}}][value_{{$language->local}}]"
                   class="form-control "
                   id="validationServer" placeholder="{{ __('products.value') .' '. $language->local }}">
        </div>
    @endforeach
</div>