<div class="checkoutItem">
    <span>{{ $response['total_products'] }} {{ __('web.L.E') }}</span>
    <span>{{ __('web.subtotal') }}</span>
</div>
@if ($response['cobon']['check_valid'])
    <div class="checkoutItem">
        <span>{{ $response['cobon']['msg'] }}</span>
        <span>{{ __('web.cobon') }}</span>
    </div>
@endif
@if ($response['offer']['check_valid'])
    <div class="checkoutItem">
        <span>{{ $response['offer']['msg'] }}</span>
        <span>{{ __('web.offer') }}</span>
    </div>
@endif
<div class="line"></div>
<div class="checkoutItem">
    <span>{{ $response['tax_value'] }} {{ __('web.L.E') }}</span>
    <span class="taxis">{{ __('web.tax_value') }}</span>
</div>
<div class="line"></div>
<div class="total">
    <div>
        <span> {{ $response['total'] }} {{ __('web.L.E') }}</span>
        <span>{{ __('web.total') }}</span>
    </div>
    <div>
        <span>{{ __('web.price_not_include_fulfilled') }}</span>
        <i class="fa fa-exclamation-triangle custom-warning-icon"></i>
    </div>
</div>
