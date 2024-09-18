<div>
    <div class="locationIcon">
        <i class="fas fa-map-marker-alt"></i>
    </div>
    <div class="locationDec">
        <span>{{ __('web.the_address_current') }}</span>
        <p>{{ $default_address->address_1 }}</p>
    </div>
</div>
<button onclick="handleAddressChange({{ json_encode($default_address) }})">{{ __('web.change_address') }}</button>
