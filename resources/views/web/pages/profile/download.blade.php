@extends('web.pages.account')

@section('profileContent')
<div class="account-dwonload-container">
    @for ($i = 0; $i < 10; $i++) <div class="product-container">
        <div class="product-overlay">
            <button class="view">VIEW</button>
            <button class="add-to-cart">ADD TO CART</button>
        </div>
        <img class="product-image" src="{{asset('storage/assets/download.png')}}" alt="Product Image">
        <div class="product-info">
            <div class="product-title">Modern Wooden Storage Bench | 2 Drawers</div>
            <div class="product-category">Shoes Cabinet</div>
        </div>
</div>
@endfor

</div>

@endsection