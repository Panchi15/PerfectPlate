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
            @if(session('order_success'))
                <div class="alert alert-success">
                    {{ session('order_success') }}
                </div>
            @endif
        @if($items->count() == 0)
            <div class="empty-cart">
                <p>No items found</p>
            </div>
                @else
                    @foreach($items as $item)
                        <div class="menu-item">
                            <div class="menu-item-details">
                                <h3>{{$item->itemName}}</h3>
                                <p>Price: {{$item->price}}</p>
                                <p>Dietary: {{$item->dietary}}</p>
                                @if($item->stock == 0)
                                    <div class="out-of-stock">
                                        <p>Out of stock</p>
                                    </div>
                                @endif
                            </div>

                            <div class="menu-item-actions">
                                <form action="{{route('customer.cart.add')}}" method="post">
                                    @csrf
                                    <label for="customization">Customization</label>
                                    <select id="customization" name="customization">
                                        <option value="None">None</option>
                                        <option value="Tomato">Tomato</option>
                                        <option value="Cheese">Cheese</option>
                                        <option value="Onion">Onion</option>
                                        <option value="Salad Leaves">Salad Leaves</option>
                                        <option value="Sauce">Sauce</option>
                                    </select>
                                    <input type="hidden" name="ItemID" value="{{$item->id}}">
                                    <input type="number" name="Quantity" value="0" min="0" max="{{$item->stock}}">
                                    @if($item->stock == 0)
                                        <input type="submit" value="Add to cart" disabled>
                                    @else
                                        <input type="submit" value="Add to cart">
                                    @endif
                                </form>
                            </div>
                        </div>

    @endforeach
        @endif

@endsection
