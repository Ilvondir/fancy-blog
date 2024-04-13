<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        if (Auth::check()) return redirect()->route("home");
        else 
            return view("authorization.login");
    }

    public function authenticate(Request $request) {

        $credentials= $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("home");
        }
        

        return back()->withErrors([
            "error" => "The login attempt has failed."
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
}