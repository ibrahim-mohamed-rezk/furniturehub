@foreach ($carts as $row)
    @include('web.component.cart.CartComponent', [
        'cart' => $row,
    ])
@endforeach
