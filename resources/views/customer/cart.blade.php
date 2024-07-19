@extends('layouts.cart')
@section('menu-content')
    <div class="cart">
        <div class="cart-items">
            <div class="cart-item">
                    <div class="cart-item-details">
                        <div><p>Item Name</p></div>
                        <div><p>Quantity</p></div>
                        <div><p>Additional</p></div>
                        <div><p>Unit Price</p></div>
                        <div><p>Total Price</p></div>
                    </div>
            </div>

            @foreach($carts as $cart)
                @php($item = $items->find($cart->ItemID))
                <div class="cart-item">
                    <div class="cart-item-details">
                        <div><p>{{$item->itemName}}</p></div>
                        <div><p>{{$cart->Quantity}}</p></div>
                        <div><p>{{$cart->customization}}</p></div>
                        <div><p>${{$item->price}}</p></div>
                        <div><p>${{$cart->TotalPrice}}</p></div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="cart-total">
            <p>Total: ${{$totel}}</p>
        </div>
        <div class="cart-buttons">
            <a href="{{route('customer.menu')}}" class="button">Continue Shopping</a>
           {{-- <a href="{{route('customer.checkout')}}" class="button">Checkout</a>--}}
        </div>
    </div>
@endsection
