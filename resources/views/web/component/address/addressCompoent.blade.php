@if (!$address->default_address)
    <div class="changeLocation">
        <div>
            <div class="locationIcon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="locationDec">
                <span>{{ __('web.the_address') }}</span>
                <p>{{ $address->address_1 }}</p>
            </div>
        </div>

        <div class="buttons">
            <button class="btn btn-primary default-address" data-id="{{ $address->id }}">
                {{ __('web.set_as_default') }}
            </button>
            <button class="btn btn-danger delete-address" data-id="{{ $address->id }}">
                {{ __('web.delete') }}
            </button>
        </div>
    </div>
@endif
