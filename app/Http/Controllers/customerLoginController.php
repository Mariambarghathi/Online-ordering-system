<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('store.guest.login');
    }

 public function login(Request $request)
{
    $credentials = $request->validate([
        'name' => ['required', 'string'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Optional: restrict to specific users
        if (Auth::user()->name !== 'admin') {
            Auth::logout();
            return back()->withErrors(['name' => 'Unauthorized login attempt.']);
        }

        // ✅ FIXED: Use route() if you're using named routes
        return redirect()->intended(route('store.registered.catalog'));
    }

    // ❗ MISSING: Error message if login fails
    return back()->withErrors([
        'name' => 'Invalid credentials.',
    ]);
}


if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    // Optional: restrict to specific users
    if (Auth::user()->name !== 'admin') {
        Auth::logout();
        return back()->withErrors(['name' => 'Unauthorized login attempt.']);
    }

    return redirect()->intended('store.registered.catalog');
}

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/store/guest/login');
    }
}
