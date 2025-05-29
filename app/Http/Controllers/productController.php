<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3); 
    return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

public function store(Request $request)
{
    try {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'isAvailable' => 'sometimes|boolean',
            'imgUrl' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation failed:', $e->errors());
        return back()->withErrors($e->errors())->withInput();
    }

    $input['isAvailable'] = $request->has('isAvailable');

    if ($request->hasFile('imgUrl')) {
        $file = $request->file('imgUrl');
        $path = $file->store('products', 'public');
        $input['imgUrl'] = $path;  // e.g. "products/filename.jpg"
    }

    Product::create($input);

    return redirect()->route('dashboard.products.index')->with('success', 'Product added successfully!');
}

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }

  public function update(Request $request, Product $product)
{
    $input = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'isAvailable' => 'sometimes|boolean',
        'imgUrl' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $input['isAvailable'] = $request->has('isAvailable');

    if ($request->hasFile('imgUrl')) {
        $file = $request->file('imgUrl');
        $path = $file->store('products', 'public');
        $input['imgUrl'] = $path;
    }

    $product->update($input);

    return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully!');
}


    public function destroy(Product $product)
    {
        if ($product->imgUrl && \Storage::disk('public')->exists($product->imgUrl)) {
            \Storage::disk('public')->delete($product->imgUrl);
        }

        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully!');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.show', compact('product'));
    }
}
