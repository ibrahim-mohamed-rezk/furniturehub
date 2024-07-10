<div class="row">
    <div class="form-group col-md-5 mb-4">
        <label class="mb-5 font-sm color-gray-700">{{ __('web.image_for_room_extensions') }} {{ $key }}  *</label>
        <input class="form-control" type="file" name="images_extensions[{{$key}}]" accept="image/*">
        
    
    </div>
    <div class=" form-group col-md-5 mb-4">
        <label class="mb-5 font-sm color-gray-700">{{ __('web.dimensions_for_Room_extensions') }} {{ $key }} </label>
        <input class="form-control" type="text" name="dimensions_extensions[{{$key}}]" placeholder="{{ __('web.dimensions_for_Room_extensions') }} 1">
    </div>
    <div class="form-group col-md-2 mb-4">
        <button class="btn btn-danger" onclick="remove(this)">Remove</button>
    </div>

</div>