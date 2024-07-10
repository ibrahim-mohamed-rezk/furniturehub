<div class="row">
    <div class="form-group col-md-5 mb-4">
      <label class="mb-5 font-sm color-gray-700">{{ __('web.image_for_room') }} *</label>
      <input class="form-control" type="file" name="images[{{ $key }}]" accept="image/*">
    </div>
    <div class="form-group col-md-5 mb-4">
      <label class="mb-5 font-sm color-gray-700">{{ __('web.dimensions_for_room') }}</label>
      <input class="form-control" type="text" name="dimensions[{{ $key }}]"
        placeholder="{{ __('web.dimensions_for_room') }} 1">
    </div>
    <div class="form-group col-md-2 mb-4">
      <button class="btn btn-danger" onclick="remove(this)">Remove</button>
    </div>
  </div>
  