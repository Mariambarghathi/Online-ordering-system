<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10); 
        return view('dashboard.customers', compact('customers'));
    }

    public function showRegisterForm()
    {
        return view('store.guest.create-account');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:customers,phone_number',
            'location' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'phone_number' => $request->phone,
            'location' => $request->location,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('store.registered.catalog')->with('success', 'Account created and logged in!');
    }

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

        // Use correct field names based on your customers table
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('store.registered.catalog'));
        }

        return back()->withErrors([
            'name' => 'Invalid username or password.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('guest.welcome');
    }
}
