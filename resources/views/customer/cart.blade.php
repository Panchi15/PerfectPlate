@extends('layouts.cart')
@section('menu-content')
    <div class="cart">
        <div class="cart-items">
            <div class="cart-item">
                <table>
                    <tr>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Additional</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>

                    </tr>
                    @foreach($carts as $cart)
                        @php($item = $items->find($cart->ItemID))
                        <tr>
                            <td>{{$item->itemName}}</td>
                            <td>{{$cart->Quantity}}</td>
                            <td>{{$cart->customization}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$cart->TotalPrice}}</td>
                            <td>
                                <form action="{{route('customer.cart.delete',['cart'=> $cart])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="cart-total">
            <p>Total: ${{$totel}}</p>
        </div>
        <div class="cart-buttons">
            <a href="{{route('customer.menu')}}" class="button">Continue Shopping</a>
            <a href="{{route('customer.cart.checkout',['totel'=>$totel])}}" class="button">Checkout</a>
        </div>
    </div>

@endsection
