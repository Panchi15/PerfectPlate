<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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
        ]);

        return redirect()->route('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            return redirect()->route('customer.menu');
        }else{
            return redirect()->back();
        }
    }

}
