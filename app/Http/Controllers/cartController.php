<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')
            ->where('customer_id', Auth::guard('customer')->id())
            ->get();

        return view('store.registered.cart', compact('cartItems'));
    }

    public function increase($id)
    {
        $item = CartItem::findOrFail($id);
        if ($item->customer_id == Auth::guard('customer')->id()) {
            $item->quantity += 1;
            $item->save();
        }
        return back();
    }

    public function decrease($id)
    {
        $item = CartItem::findOrFail($id);
        if ($item->customer_id == Auth::guard('customer')->id() && $item->quantity > 1) {
            $item->quantity -= 1;
            $item->save();
        } elseif ($item->quantity <= 1) {
            $item->delete();
        }
        return back();
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        if ($item->customer_id == Auth::guard('customer')->id()) {
            $item->delete();
        }
        return back();
    }

    public function submitOrder(Request $request)
    {
        $customerId = Auth::guard('customer')->id();

        $cartItems = CartItem::with('product')
            ->where('customer_id', $customerId)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->withErrors('Your cart is empty.');
        }

        $order = Order::create([
            'customer_id' => $customerId,
            'status' => 'pending',
            'total' => $cartItems->sum(fn($item) => $item->product->price * $item->quantity),
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        CartItem::where('customer_id', $customerId)->delete();

        return redirect()->route('store.registered.orders.index')->with('success', 'Order submitted successfully!');
    }

    public function add(Request $request, $productId)
    {
        $customerId = Auth::guard('customer')->id();

        if (!$customerId) {
            return redirect()->route('guest.login.form')->withErrors('Please log in to add items to your cart.');
        }

        $existing = CartItem::where('customer_id', $customerId)
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $existing->quantity += 1;
            $existing->save();
        } else {
            CartItem::create([
                'customer_id' => $customerId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Item added to cart.');
    }
}
