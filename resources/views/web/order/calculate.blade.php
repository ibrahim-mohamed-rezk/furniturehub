<div class="row mb-10">
    <div class="col-lg-6 col-6"><span class="font-md-bold color-brand-3">{{ __('web.subtotal') }}</span></div>
    <div class="col-lg-6 col-6 text-end"><span class="font-lg-bold color-brand-3">{{ $response['total_products'] . " L.E" }} </span>
    </div>
</div>
@if ($response['cobon']['check_valid'])
    <div class="border-bottom mb-10 pb-5">
        <div class="row">
            <div class="col-lg-6 col-6">
                <span class="font-md-bold color-brand-3">{{ __('web.cobon') }}</span>
            </div>
            <div class="col-lg-6 col-6 text-end">
                <span class="font-lg-bold color-brand-3">{{ $response['cobon']['msg'] }}</span>
            </div>
        </div>
    </div>
@endif
@if ($response['offer']['check_valid'])
    <div class="border-bottom mb-10 pb-5">
        <div class="row">
            <div class="col-lg-6 col-6">
                <span class="font-md-bold color-brand-3">{{ __('web.offer') }}</span>
            </div>
            <div class="col-lg-6 col-6 text-end">
                <span class="font-lg-bold color-brand-3">{{ $response['offer']['msg'] }}</span>
            </div>
        </div>
    </div>
@endif

<div class="border-bottom mb-10 pb-5">
    <div class="row">
        <div class="col-lg-6 col-6">
            <span class="font-md-bold color-brand-3">{{ __('web.tax_value') }}</span>
        </div>
        <div class="col-lg-6 col-6 text-end">
            <span class="font-lg-bold color-brand-3">{{ $response['tax_value'] . " L.E"}}</span>
        </div>
    </div>
</div>
<div class="border-bottom mb-10 pb-5">

    <div class="row">
        <div class="col-lg-6 col-6">
            <span class="font-md-bold color-brand-3">{{ __('web.total') }}</span>
        </div>
        <div class="col-lg-6 col-6 text-end">
            <span class="font-lg-bold color-brand-3">{{ $response['total'] . " L.E"}}</span>
        </div>
    </div>
</div>

<div class="row">
    {{-- <div class="col-lg-6 col-6">
            <span class="font-md-bold color-brand-3">{{ __('web.shipping') }}</span>
        </div> --}}
    <div class="col-lg-12 col-12 text-center">
        <span class="font-md-bold color-brand-3">{{ __('web.price_not_include_fulfilled') }}</span>
    </div>
</div>
