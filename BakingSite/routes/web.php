<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\AdminShopsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'index']);

// all the admin page routes

// Admin product page routes
Route::get('/admin/products', [AdminProductsController::class, 'index'])->middleware(['auth', 'checkRoles:admin'])->name('adminProducts');
Route::get('/admin/products/{product}/edit', [AdminProductsController::class, 'edit'])->middleware(['auth', 'checkRoles:admin'])->name('adminProductsEdit');
Route::put('/admin/products/{product}', [AdminProductsController::class, 'update'])->middleware(['auth', 'checkRoles:admin'])->name('adminProductsUpdate');
Route::get('/admin/products/create', [AdminProductsController::class, 'create'])->middleware(['auth', 'checkRoles:admin'])->name('adminProductsCreate');
Route::post('/admin/products', [AdminProductsController::class, 'store'])->middleware(['auth', 'checkRoles:admin'])->name('adminProductsStore');
Route::delete('/admin/products/{product}', [AdminProductsController::class, 'destroy'])->middleware(['auth', 'checkRoles:admin'])->name('adminProductsDestroy');

// Admin user page routes
Route::get('/admin/users', [AdminUsersController::class, 'index'])->middleware(['auth', 'checkRoles:admin'])->name('adminUsers');
Route::get('/admin/users/create', [AdminUsersController::class, 'create'])->middleware(['auth', 'checkRoles:admin'])->name('adminUsersCreate');
Route::post('/admin/users', [AdminUsersController::class, 'store'])->middleware(['auth', 'checkRoles:admin'])->name('adminUsersStore');
Route::get('/admin/users/{user}/edit', [AdminUsersController::class, 'edit'])->middleware(['auth', 'checkRoles:admin'])->name('adminUsersEdit');
Route::put('/admin/users/{user}', [AdminUsersController::class, 'update'])->middleware(['auth', 'checkRoles:admin'])->name('adminUsersUpdate');
Route::delete('/admin/users/{user}', [AdminUsersController::class, 'destroy'])->middleware(['auth', 'checkRoles:admin'])->name('adminUsersDestroy');

// Admin shop page routes
Route::get('/admin/shops', [AdminShopsController::class, 'index'])->middleware(['auth', 'checkRoles:admin'])->name('adminShops');
Route::get('/admin/shops/create', [AdminShopsController::class, 'create'])->middleware(['auth', 'checkRoles:admin'])->name('adminShopsCreate');
Route::post('/admin/shops', [AdminShopsController::class, 'store'])->middleware(['auth', 'checkRoles:admin'])->name('adminShopsStore');
Route::get('/admin/shops/{shop}/edit', [AdminShopsController::class, 'edit'])->middleware(['auth', 'checkRoles:admin'])->name('adminShopsEdit');
Route::put('/admin/shops/{shop}', [AdminShopsController::class, 'update'])->middleware(['auth', 'checkRoles:admin'])->name('adminShopsUpdate');
Route::delete('/admin/shops/{shop}', [AdminShopsController::class, 'destroy'])->middleware(['auth', 'checkRoles:admin'])->name('adminShopsDestroy');

// all admin order routes
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('adminOrders');
Route::get('/admin/orders/{order}/edit', [AdminOrderController::class, 'edit'])->name('adminOrdersEdit');
Route::post('/admin/orders/{order}', [AdminOrderController::class, 'update'])->name('adminOrdersUpdate');

// all the customer page routes

// all customer product page routs
Route::get('/home', [CustomerProductController::class, 'index'])->name('home');
Route::get('/products', [CustomerProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [CustomerProductController::class, 'show'])->name('customerProductsShow');

// all shopping cart routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart', [CartController::class, 'add'])->name('cartAdd');
Route::put('/cart', [CartController::class, 'update'])->name('cartUpdate');
Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cartRemoveItem');
Route::delete('/cart', [CartController::class, 'removeAll'])->name('cartRemoveAll');

// all order routes
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/create', [OrderController::class, 'create'])->name('orderForm');
Route::post('/order', [OrderController::class, 'store'])->name('orderStore');



require __DIR__.'/auth.php';
