@extends('layouts.menu')
@section('nav')
    <div class="profile-navigation">
        <a href="{{route('customer.profile')}}">Profile</a>
        <a href="{{route('customer.profile.orders')}}">Orders</a>
    </div>
@endsection

@section('menu-content')
    <ol>
        @foreach($orders as $order)
            <div class="orderitem-container">
                <div class="orderitem-details">
                    <li><p>Date: {{$order->created_at->format('d/m/y H:i')}}</p></li>
                    <p>${{$order->TotalPrice}}</p>
                    <a href="{{route('customer.profile.orderitems',['order'=>$order])}}">View Order</a>
                </div>
            </div>

        @endforeach
    </ol>

@endsection
