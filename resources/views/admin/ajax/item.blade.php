<div class="row pricing-list-item border-item mb-4"  style="background-color: rgba(21,97,203,0.1);height:auto">
    @foreach(languages() as $language)
        <div class="col-md-5 mb-4">
            <label for="validationServer">{{ __('products.name') }}</label>
            <input type="text" name="items[{{$key}}][name_{{$language->local}}]"
                   class="form-control "
                   id="validationServer" placeholder="{{ __('products.name') .' '.$language->local }}">
        </div>
    @endforeach
    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
        <i class="fas fa-times-circle" onclick="remove(this)"></i>
    </div>
</div>