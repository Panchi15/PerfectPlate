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
</html>
