<div class="row">
    <div class="form-group col-md-10 mb-4">
      <label class="mb-5 font-sm color-gray-700">{{ __('web.image_product') }} *</label>
      <input class="form-control" type="file" name="images[{{ $key }}]" accept="image/*">
    </div>
    <div class="form-group col-md-2 mb-4">
      <button class="btn btn-danger" onclick="remove(this)">{{ __('web.remove') }}</button>
    </div>
  </div>
  