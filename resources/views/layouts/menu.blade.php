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
        <img src="{{asset('images/basket_icon.png')}}" alt="Cart" id="cart">
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
{{--
<script src="{{asset('js/menu.js')}}"></script>
--}}
</body>
</html>
