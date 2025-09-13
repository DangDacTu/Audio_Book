<?php

use App\Http\Controllers\HomeController; // Thêm dòng này
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
   return view('welcome');
});
Route::get('/pay', function () {
   return view('pay');
});
Route::get('/admin', function () {
   return view('admin');
});
Route::get('/home', function () {
   return view('home');
});
*/

// User

Route::get('/',[HomeController::class, 'index'])->name('index');
Route::get('/home',[HomeController::class, 'index'])->name('home');

//Route::get('/admin', [AdminController::class, 'index']);
//Route::post('/admin', [AdminController::class, 'store']);

// Admin

Route::get('/admin',[AdminController::class,'index'])->name('index');
Route::get('/dashboard',[AdminController::class,'showDashboard'])->name('showDashboard');
//login
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
//logout
Route::get('/logout',[AdminController::class,'logout'])->name('index');

Route::post('/save-category-product',[AdminController::class,'save_category_product']);