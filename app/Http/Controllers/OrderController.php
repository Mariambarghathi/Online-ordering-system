<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
 public function index()
{
    $orders = Order::with(['customer', 'items.product'])->paginate(10);
    return view('dashboard.orders.index', compact('orders'));
}


public function edit($id)
{
    $order = Order::with(['customer', 'items.product'])->findOrFail($id);
    
    $statuses = ['accepted', 'rejected', 'pending', 'preparing', 'delivered', 'cancelled'];

 return view('dashboard.orders.details', compact('order', 'statuses'));
}

public function update(Request $request, $id)
{

$request->validate([
    'status' => 'required|in:accepted,rejected,pending,preparing,delivered,cancelled',
]);
    

    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->route('orders.details', $order->id)->with('success', 'Order status updated successfully.');
}


}
