<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function showRegisterForm()
    {
        return view('store.guest.create_account');
    }
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|unique:customers,phone_number', // ✅ validate against phone_number
        'location' => 'required|string|max:255',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $customer = Customer::create([
        'name' => $request->name,
        'phone_number' => $request->phone, // ✅ use phone_number here
        'location' => $request->location,
        'password' => Hash::make($request->password),
    ]);

    Auth::guard('web')->login($customer);

    return redirect()->route('store.registered.catalog')->with('success', 'Account created and logged in!');
}

}
