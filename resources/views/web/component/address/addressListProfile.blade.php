@foreach ($addresses as $address)
    @include('web.component.address.addressProfile',['address'=>$address,'default_address'=>$default_address])
@endforeach