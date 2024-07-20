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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'allergies' => 'required|string',
            'role' => 'required|string',
            'dob' => 'required|date',
        ]);

        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
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
            return redirect()->back();
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
