<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class customerController extends Controller
{

    //To view all customers in the admin panel
public function index()
{
    $customers = Customer::paginate(10); 
    return view('dashboard.customers', compact('customers'));
}

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'unique:customers,phone'],
            'location' => ['required'],
            'password' => ['required']
        ]);

        
        Customer::create($request);

      //  return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    // Show a customer's data
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
     //   return view('customers.show', compact('customer'));
    }
}


