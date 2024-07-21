<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PerfectPlate</title>
        <link rel="stylesheet" href="{{asset('style/style.css')}}">
    </head>
    <body>
    <header>
        <div class="header-container">
            <h1>PerfectPlate</h1>
            <div class="button-container">
                <button onclick="openLoginForm()">Log In</button>
                <button onclick="openSignUpForm()">Sign Up</button>
            </div>
        </div>
    </header>

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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="password-container">
                        <label for="password">Password</label>
                        <a href="{{route('forgotpassword')}}" id="forgot-password">Forgot Password?</a>
                    </div>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="remember-me-container">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <label for="rememberMe">Remember Me</label>
                    </div>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <label for="fname">First Name</label>
                    <input type="text" id="firstName" name="fname" value="{{ old('fname') }}" required>
                    @error('fname')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="lname">Last Name</label>
                    <input type="text" id="lastName" name="lname" value="{{ old('lname') }}" required>
                    @error('lname')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="email">APIIT Email</label>
                    <input type="email" id="apiitEmail" name="email" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="password">Password</label>
                    <input type="password" id="newPassword" name="password" required>
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" required>
                    @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                    @enderror

                    <!-- Optional Fields -->
                    <div id="optionalFields">
                        <label for="allergies">Allergies</label>
                        <input type="text" id="allergies" name="allergies" value="{{ old('allergies') }}">
                        @error('allergies')
                        <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="dietaryPreference">Dietary Preference</label>
                        <select id="dietaryPreference" name="dietaryPreference">
                            <option value="vegetarian" {{ old('dietaryPreference') == 'vegetarian' ? 'selected' : '' }}>Vegetarian</option>
                            <option value="nonVegetarian" {{ old('dietaryPreference') == 'nonVegetarian' ? 'selected' : '' }}>Non-Vegetarian</option>
                        </select>
                        @error('dietaryPreference')
                        <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="students" {{ old('role') == 'students' ? 'selected' : '' }}>Student</option>
                            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                        @error('role')
                        <div class="error">{{ $message }}</div>
                        @enderror

                        <label for="dob">Date of Birth</label>
                        <input type="date" id="dob" name="dob" value="{{ old('dob') }}">
                        @error('dob')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Sign Up">
                </form>
            </div>
        </div>

    <script src="{{asset('js/script.js')}}"></script>
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
