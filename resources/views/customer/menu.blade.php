@extends('layouts.menu')
@section('nav')
    <div class="navi">
        <div class="search-container">
            <form action="{{route('customer.menu.search')}}" method="get">
                <div class="search">
                    <input type="text" id="search" placeholder="Search for food items..." name="search" value="{{ request('search') ?  : '' }}">
                    <input type="submit" value="search">
                </div>
        <div class="filter-cart-container">
            <div class="filter-container">
                    <label for="dietaryFilter">Filter by:</label>
                    <select id="dietaryFilter" name="dietaryFilter" onchange="this.form.submit()">
                        <option value="all">All</option>
                        <option value="Vegetarian" {{ request('dietaryFilter') == 'Vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                        <option value="nonVegetarian" {{ request('dietaryFilter') == 'nonVegetarian' ? 'selected' : '' }}>Non Vegetarian</option>
                    </select>
            </div>
        </div>
                </form>


    </div>


@endsection
@section('menu-content')

@foreach($items as $item)
    <div class="menu-item">
        <div class="menu-item-details">
            <h3>{{$item->itemName}}</h3>
            <p>Price: {{$item->price}}</p>
            <p>Dietary: {{$item->dietary}}</p>
            {{--<form action="{{route('customer.menu.addToCart')}}" method="post">
                @csrf
                <input type="hidden" name="item_id" value="{{$item->id}}">
                <input type="submit" value="Add to Cart">
            </form>--}}
        </div>
    </div>

@endforeach
@endsection
