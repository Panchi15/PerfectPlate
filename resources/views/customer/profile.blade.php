@extends('layouts.menu')
@section('nav')
<div class="profile-navigation">
    <a href="{{route('customer.profile')}}">Profile</a>
    <a href="{{route('customer.profile.orders')}}">Orders</a>
</div>
@endsection

@section('menu-content')
<div class="profile-container">
    <div class="profile-details">
        <h1>Profile</h1>
        <div class="profile-info">
            <table>
                <tr>
                    <th>First Name</th>
                    <td>: {{$user->fname}}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>: {{$user->lname}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: {{$user->email}}</td>
                </tr>
                <tr>
                    <th>Allergies</th>
                    <td>: {{$user->allergies}}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>: {{$user->role}}</td>
                </tr>
                <tr>
                    <th>Date Of Birth</th>
                    <td>: {{$user->dob}}</td>
                </tr>
                <tr>
                    <th>Dietary Preference</th>
                    <td>: {{$user->dietaryPreference}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="profile-edit">
        <h1>Edit Profile</h1>
        <form action="{{route('customer.profile.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="name" value="{{$user->fname}}">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" value="{{$user->lname}}">
            </div>
            {{-- <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{$user->email}}">
            </div> --}}
            <div class="form-group">
                <label for="allergies">Allergies</label>
                <input type="text" name="allergies" id="phone" value="{{$user->allergies}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="form-group">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" id="dob" value="{{$user->dob}}">
            </div>
            <div>
                <label for="dietaryPreference">Dietary Preference</label>
                <select id="dietaryPreference" name="dietaryPreference">
                    <option value="vegetarian" {{ $user->dietaryPreference == 'vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                    <option value="nonVegetarian" {{ $user->dietaryPreference == 'nonVegetarian' ? 'selected' : '' }}>Non-Vegetarian</option>
                </select>
            </div>
            <div>
                <label for="role">Role</label>
                <select id="role" name="role">
                    <option value="students" {{ $user->role == 'students' ? 'selected' : '' }}>Student</option>
                    <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>


            <button type="submit">Update</button>
        </form>
    </div>
@endsection
