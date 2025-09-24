<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PayProduct;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Thêm dòng này



// User

Route::get('/add-to-cart/{id}', [PayProduct::class, 'addToCart'])->name('cart.add');

Route::get('/pay', [PayProduct::class, 'pay']);
Route::get('/cart', [PayProduct::class, 'cart']);
Route::get('/',[HomeController::class, 'index'])->name('index');
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/delete-cart-item/{id}', [PayProduct::class, 'deleteCartItem'])->name('cart.delete');

// Product Payment

//Route::get('/admin', [AdminController::class, 'index']);
//Route::post('/admin', [AdminController::class, 'store']);

// Admin
Route::get('/return-admin-dashboard',[AdminController::class,'showDashboard'])->name('admin-dashboard');
Route::get('/admin',[AdminController::class,'index'])->name('admin-login');
Route::get('/dashboard',[AdminController::class,'showDashboard'])->name('showDashboard');
//login
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
//logout
Route::get('/logout',[AdminController::class,'logout'])->name('index');

Route::post('/save-category-product',[AdminController::class,'save_category_product']);

Route::get('/delete-category-product/{id}', [AdminController::class, 'delete_category_product'])->name('category.delete');



