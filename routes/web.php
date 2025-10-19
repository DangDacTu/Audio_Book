<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PayProduct;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\UserController; 
use Illuminate\Support\Facades\DB;

// ==================== User Authentication ====================
Route::get('/', [UserController::class, 'showLogin'])->name('user.login');
Route::post('/', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegister'])->name('user.register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

// ==================== Home ====================
Route::get('/home',[HomeController::class, 'index'])->name('index');
Route::get('/home',[HomeController::class, 'index'])->name('home');

// ==================== Product / Cart ====================
Route::get('/add-to-cart/{id}', [PayProduct::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [PayProduct::class, 'cart']);
Route::get('/delete-cart-item/{id}', [PayProduct::class, 'deleteCartItem'])->name('cart.delete');

// ==================== Payment ====================
Route::get('/pay', [PayProduct::class, 'pay']);
Route::get('/pay-momo', [PayProduct::class, 'payMomo'])->name('pay.momo');
Route::post('/payment-momo', [PayProduct::class, 'paymentMomo'])->name('payment.momo');
Route::post('/payment-vnpay', [PayProduct::class, 'paymentVnpay'])->name('payment.vnpay');
Route::get('/payment/vnpay/return', [PayProduct::class, 'libraryAfterPayment'])->name('payment.vnpay.return');

// ==================== Admin ====================
Route::get('/admin',[AdminController::class,'index'])->name('admin-login');
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/return-admin-dashboard',[AdminController::class,'showDashboard'])->name('admin-dashboard');
Route::get('/dashboard',[AdminController::class,'showDashboard'])->name('showDashboard');

// ==================== Category / Product Management ====================
Route::post('/save-category-product',[AdminController::class,'save_category_product']);
Route::get('/delete-category-product/{id}', [AdminController::class, 'delete_category_product'])->name('category.delete');
Route::get('/edit-product/{id}', [AdminController::class, 'edit_category_product'])->name('category.edit');
Route::post('/update-product/{id}', [AdminController::class, 'update_category_product'])->name('category.update');

// ==================== Product Listing ====================
Route::get('/add-product', function() {
    $all_category_product = [];
    return view('addProduct', compact('all_category_product'));
})->name('add.product');

Route::get('/product-list', function() {
    $all_category_product = DB::table('tbl_product')->get();
    return view('productList', compact('all_category_product'));
})->name('product.list');

// ==================== User Management ====================
Route::get('/user-info', [UserController::class, 'listUsers'])->name('user.info');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('user.delete');

// ==================== Search ====================
Route::get('/search', [HomeController::class, 'search'])->name('product.search');

// ==================== Library ====================
Route::get('/library', [HomeController::class, 'library'])->name('library');
Route::get('/library/audio', [HomeController::class, 'libraryAudio'])->name('library.audio');
Route::delete('/library/delete/{id}', [HomeController::class, 'deleteLibrary'])->name('library.delete');
Route::get('/listening', [HomeController::class, 'listening'])->name('listening');

// ==================== Revenue / Reports ====================
Route::get('/admin/revenue', [App\Http\Controllers\AdminController::class, 'revenue'])->name('admin.revenue');
Route::get('/admin/revenue/export-pdf', [App\Http\Controllers\AdminController::class, 'exportRevenuePdf'])
    ->name('admin.revenue.export_pdf');