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
<div id="message" class="message-container"></div>
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
</html>
