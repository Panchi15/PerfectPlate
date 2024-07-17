<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PerfectPlate</title>
        <link rel="stylesheet" href="{{asset('style/style.css')}}">
    </head>
    <body>
        <div class="header-container">
            <h1>PerfectPlate</h1>
            <div class="button-container">
                <button onclick="openLoginForm()">Log In</button>
                <button onclick="openSignUpForm()">Sign Up</button>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>

        <!-- Login Form Modal -->
        <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeLoginForm()">&times;</span>
                <h2>Log In</h2>
                <form action="{{route('customer.login')}}" method="POST">
                    @csrf
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                    <div class="password-container">
                        <label for="password">Password</label>
                        <a href="#" id="forgot-password">Forgot Password?</a>
                    </div>
                    <input type="password" id="password" name="password" required>
                    {{--<div class="remember-me-container">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <label for="rememberMe">Remember Me</label>
                    </div>--}}
                    <input type="submit" value="Log In">
                    <button type="button" class="sign-up-button" onclick="openSignUpForm()">Don't have an account?</button>
                </form>
            </div>
        </div>


    <!-- Sign Up Form Modal -->
        <div id="signUpModal" class="modal"  >
            <div class="modal-content">
                <span class="close" onclick="closeSignUpForm()">&times;</span>
                <h2>Sign Up</h2>
                <!-- Post method is to send the data for the controller && it routes the action from Route/web.php-->
                <form id="signUpForm" method="post" action="{{route('customer.signup')}}">
                    @csrf

                    <label for="fname">First Name</label>
                    <input type="text" id="firstName" name="fname" required>

                    <label for="lname">Last Name</label>
                    <input type="text" id="lastName" name="lname" required>

                    <label for="email">APIIT Email</label>
                    <input type="email" id="apiitEmail" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="newPassword" name="password" required>

                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>

                    <!-- Optional Fields -->
                    <div id="optionalFields">
                        <label for="allergies">Allergies</label>
                        <input type="text" id="allergies" name="allergies">

                        <label for="dietaryPreference">Dietary Preference</label>
                        <select id="dietaryPreference" name="dietaryPreference">
                            <option value="vegetarian">Vegetarian</option>
                            <option value="nonVegetarian">Non-Vegetarian</option>
                        </select>

                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="students">Student</option>
                            <option value="staff">Staff</option>
                        </select>

                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob">
                    </div>

                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>

    <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>
