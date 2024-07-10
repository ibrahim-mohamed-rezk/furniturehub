<div class="tab-pane fade notifications" id="tab-notification" role="tabpanel" aria-labelledby="tab-notification">
    <div class="list-notifications">
        @foreach ($notifications as $key => $row)
            <div class="item-notification">
                <div class="image-notification"><img
                        src="{{ url('') }}/public/storage/bell.png" alt="Ecom"
                        height="90px" width="90px"></div>
                <div class="info-notification">
                    <h5 class="mb-5">{{ $row->name }}</h5>
                    <p class="font-md color-brand-3">{{ $row->description }}</p>
                </div>

            </div>
        @endforeach

    </div>
    <nav>
        {!! $notifications->links() !!}
    </nav>
</div>
