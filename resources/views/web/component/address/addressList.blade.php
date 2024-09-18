@foreach ($addresses as $address)
    @include('web.component.address.addressCompoent', ['address' => $address])
@endforeach
