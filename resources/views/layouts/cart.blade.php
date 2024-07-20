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
            <a href="{{route('customer.menu')}}">
                Menu
            </a>
        </div>
    </div>
</div>
<div class="menu-content">
    <!-- Food items will be dynamically populated here -->
    @yield('menu-content')
</div>

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
