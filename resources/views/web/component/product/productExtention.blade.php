<div class="modal productAdditionsModal fade" id="productAdditionsModal" tabindex="-1" role="dialog" aria-labelledby="productadditionsModalTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <div class="modal-info">
                        <h4>{{__('web.get_exclusive_offers_on_lazy_boy_add_ons')}}</h4>
                        <h3>{{__('web.lazy_boy_add_ons')}}</h3>
                    </div>
                </h5>
                <div class="modal-buttons">
                    <button class="productAdditionsModalSubmit">{{__('web.submit')}}</button>
                    <button type="button" class="productAdditionsModalClose" data-dismiss="modal" aria-label="Close">
                        {{__('web.close')}}
                    </button>
                </div>
            </div>
            <div class="modal-body">
                @foreach($product->extensions as $row)
                    <div class="addition-item">
                        <div class="addition-info">
                            <div class="addition-checkbox">
                                <input type="checkbox" value="{{ $row->id }}"> <!-- Use the extension ID as value -->
                            </div>
                            <div class="addition-img">
                                <img src="{{ $row->image }}">
                            </div>
                            <div class="addition-title">
                                <span class="addition-title-text">{!! __('web.' . $row->title) !!}</span>
                                <div class="addition-price">
                                    <span class="newPrice">{!! $row->value !!} {{ __('web.L.E') }}</span>
                                    <span class="old-price">{!! $row->value_discount !!} {{ __('web.L.E') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

