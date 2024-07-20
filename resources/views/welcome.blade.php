@extends('layouts.home')
@section('content')
    <section class="about-us">
        <div class="about-image">
            <img src="{{asset('images/mainimg.jpg')}}" alt="Food Image" />
        </div>
        <div class="about-content">
            <h1>About <span>Us</span></h1>
            <p>
                Welcome to PerfectPlate, the ultimate solution for enhancing the lives
                of university students and staff. Effortlessly browse menus, place
                orders, and track deliveries in real-time. Save time and enjoy your
                meals with just a few taps, making your life more efficient and
                stress-free.
            </p>
        </div>
    </section>
@endsection
