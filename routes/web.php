<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\cartController;



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


//store

Route::get('/store/guest/register', [CustomerController::class, 'showRegisterForm'])->name('guest.register.form');
Route::post('/store/guest/register', [CustomerController::class, 'register'])->name('guest.register');

Route::get('/store/guest/welcome', function () {return view('store.guest.welcome');})->name('guest.welcome');
Route::get('store/guest/shop', [ProductController::class, 'shop'])->name('store.guest.shop');

// Customer login
Route::get('/store/guest/login', [CustomerController::class, 'showLoginForm'])->name('guest.login.form');
Route::post('/store/guest/login', [CustomerController::class, 'login'])->name('guest.login');



Route::middleware('auth:customer')->group(function () {

Route::get('store/registered/catalog', [ProductController::class, 'catalog'])->name('store.registered.catalog');

//cart 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{item}/increase', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/{item}/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/submit', [CartController::class, 'submitOrder'])->name('cart.submitOrder');

//order
 Route::get('/orders/index', [OrderController::class, 'customerIndex'])->name('store.registered.orders.index');
    Route::get('/orders/{order}/details', [OrderController::class, 'customerShow'])->name('store.registered.orders.details');
//details 
Route::get('/store/registered/orders/{order}', [OrderController::class, 'customerShow'])->name('store.registered.orders.details');

Route::post('/store/registered/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('store.registered.orders.cancel');


Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

Route::post('/store/guest/logout', [CustomerController::class, 'logout'])->name('guest.logout');

});

