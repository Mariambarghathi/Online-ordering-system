<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            //seeder credentials 
            if (Auth::user()->email !== 'admin@magicalcrumbles.com') {
                Auth::logout();
                return back()->withErrors(['email' => 'Unauthorized login attempt.']);
            }

            return redirect()->intended('/dashboard/products/index');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        //ends the sesssion and regenerate new token
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard/login');
    }
}
