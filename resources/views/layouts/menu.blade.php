<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{asset('style/menu.css')}}">

</head>
<body>

<div class="header-container">
    <h1>PerfectPlate</h1>
    <div class="cart-container">
        <div class="profile">
            @if(isset($currentview) && $currentview == 'menu')
                <a href="{{route('customer.profile')}}">Profile</a>
            @elseif(isset($currentview) && $currentview == 'profile')
                <a href="{{route('customer.menu')}}">Menu</a>
            @endif

        </div>
        <div class="logout">
            <a class="dropdown-item" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

        </div>
        <div class="cart-icon">
            <a href="{{route('customer.cart')}}">
            <img src="{{asset('images/basket_icon.png')}}" alt="Cart" id="cart">
            </a>
        </div>
        <div class="cart-count">
            <p id="cart-count">{{$cartItemCount}}</p>
        </div>
    </div>
</div>
<div class="nav">
    <!-- Navigation items will be dynamically populated here -->
    @yield('nav')
</div>
<div class="menu-content">
    <!-- Food items will be dynamically populated here -->
    @yield('menu-content')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        @if(session('order_success'))
        alert("{{ session('order_success') }}");
        @endif
    });
</script>
</body>
<footer>
    <div class="loc">
        <div class="f-name">
            <h1>PerfectPlate</h1>
        </div>
        <div class="f-loc">
            <h2>Location</h2>
            <p>No.388, Union Place, Colombo 02</p>
            <a href="https://maps.app.goo.gl/Wkjw3VHzJo87YRdu5" target="_blank">Location</a>
        </div>
    </div>
    <div class="o_hours">
        <h2>Opening Hours</h2>
        <p>Monday - Friday</p>
        <p>9.00AM - 5.00PM</p>
        <p>Tel: 0112345678</p>
    </div>
    <div class="c-rights">
        <p>© 2021 PerfectPlate. All Rights Reserved.</p>
    </div>
</footer>
</html>
