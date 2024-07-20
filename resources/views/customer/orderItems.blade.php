@extends('layouts.menu')

@section('menu-content')
    <div class="orderitems-container">
        @foreach($orderitems as $orderitem)
            @php($item = $items->find($orderitem->ItemID))
            <div class="orderitems">
                <div class="orderitems-details">
                    <p>Item : {{$item->itemName}} x {{$orderitem->Quantity}}</p>
                    <p>Customization : {{$orderitem->Customization}}</p>
                    <p>Price: ${{$orderitem->Price}}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="backtoorder">
        <a href="{{route('customer.profile.orders')}}">Back to Orders</a>
    </div>
@endsection
