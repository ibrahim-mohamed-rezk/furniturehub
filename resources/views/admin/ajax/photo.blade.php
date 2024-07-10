<div class="row pricing-list-item border-item mb-4"  style="background-color: rgba(21,97,203,0.1);height:auto">

    <div class="col-md-6 mb-4">
        <label for="validationServer">{{ __('products.photo') }}</label>
        <input type="file" name="images[{{$key}}][image]"
               class="form-control "
               id="validationServer" placeholder="{{ __('products.image') }}">
    </div>
    <div class="col-md-4 mb-4"></div>
    <div class="form-group col-lg-2" style="font-size: 30px;margin-top:20px;">
        <i class="fas fa-times-circle" onclick="remove(this)"></i>
    </div>
</div>