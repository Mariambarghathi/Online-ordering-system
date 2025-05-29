<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;



//Admin login 
Route::get('/dashboard/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/dashboard/login', [LoginController::class, 'login']);

//restriction
Route::middleware('auth')->group(function () {
  
//products 
Route::get('/dashboard/products/index', [ProductController::class, 'index'])->name('dashboard.products.index');
Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('dashboard.products.create');
Route::post('/dashboard/products/store', [ProductController::class, 'store'])->name('dashboard.products.store');
Route::get('/dashboard/products/{product}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])->name('dashboard.products.update');
Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->name('dashboard.products.destroy');
Route::get('/dashboard/products/{product}', [ProductController::class, 'show'])->name('dashboard.products.show');

//orders
Route::get('/dashboard/orders/index', [OrderController::class, 'index'])->name('dashboard.orders.index');
Route::get('/dashboard/orders/{order}/details', [OrderController::class, 'edit'])->name('orders.details');
Route::put('/dashboard/orders/{order}/details', [OrderController::class, 'update'])->name('orders.updateStatus');


// customers 
Route::get('/dashboard/customers', [CustomerController::class, 'index'])->name('dashboard.customers.index');

//logout
Route::post('/dashboard/logout', [LoginController::class, 'logout'])->name('dashboard.logout');

});







