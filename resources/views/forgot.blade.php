@extends('layouts.home')
@section('content')
    <div class="forgot">
        <h1>Reset Password</h1>
        <form action="{{route('newpassword')}}" method="post">
            @csrf
            @method('put')
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

@endsection
