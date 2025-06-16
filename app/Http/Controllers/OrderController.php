<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
    
    $statuses = ['accepted', 'rejected', 'pending', 'preparing', 'delivered'];

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


public function customerIndex()
{
    $customerId = Auth::guard('customer')->id();
    $orders = Order::with('orderItems')
        ->where('customer_id', $customerId)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('store.registered.orders.index', compact('orders'));
}

public function customerShow($id)
{
    $order = Order::with(['orderItems.product'])
        ->where('id', $id)
        ->where('customer_id', Auth::guard('customer')->id())
        ->firstOrFail();

    return view('store.registered.orders.details', compact('order'));
}

public function cancel($id)
{
    $order = Order::findOrFail($id);

    // Only allow the customer who owns the order to cancel it
    if ($order->customer_id !== Auth::guard('customer')->id()) {
        abort(403, 'Unauthorized action.');
    }

    // Prevent cancel if already rejected or delivered
    if (in_array($order->status, ['rejected', 'delivered'])) {
        return back()->withErrors('This order can no longer be cancelled.');
    }

    $order->status = 'cancelled';
    $order->save();

    return redirect()->route('store.registered.orders.index')->with('success', 'Order cancelled.');
}

}
