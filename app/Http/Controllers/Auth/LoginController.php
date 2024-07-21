<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{
    public function signup(Request $request)
    {

        $request->validate([
            'fname' => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'lname' => 'required|string|max:255|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'allergies' => 'nullable|string|max:255',
            'dietaryPreference' => 'nullable|string|in:vegetarian,nonVegetarian',
            'role' => 'required|string|in:students,staff',
            'dob' => 'nullable|date',
        ]);

        // Convert email to lowercase
        $email = strtolower($request->email);

        // Capitalize the first letter of fname and lname, and make the rest lowercase
        $fname = ucfirst(strtolower($request->fname));
        $lname = ucfirst(strtolower($request->lname));

        User::create([
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'password' => bcrypt($request->password),
            'allergies' => $request->allergies,
            'role' => $request->role,
            'dob' => $request->dob,
            'dietaryPreference' => $request->dietaryPreference,
        ]);

        return redirect()->route('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $rememberMe = $request->rememberMe ? true : false;

        if (Auth::attempt($credentials, $rememberMe)) {

            return redirect()->route('customer.menu');
        } else {
            return redirect()->back()->withErrors(['invalid' => 'Invalid credentials']);
        }
    }
    public function logout()
    {

        Auth::logout();
        return redirect()->route('welcome');
    }

    public function showLoginForm()
    {
        return view('welcome');
    }

    public function forgotpassword()
    {
        return view('forgot');
    }
    public function newpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('welcome');
    }
}
