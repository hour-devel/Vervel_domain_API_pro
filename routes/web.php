<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToDo_ListController;


//admin
Route::get('/API', function () {
    return view('admin.index');
})->name('dashboard');
Route::resource('/API/User', 'UserController')->shallow();
Route::resource('/API/Customer', 'CustomerController')->shallow();
Route::resource('/API/Layout', 'LayoutController')->shallow();
Route::resource('/API/Category', 'CategoryController')->shallow();
Route::resource('/API/Product', 'ProductController')->shallow();
Route::get('/API/Product_Image/{id}', [ProductController::class , 'destroy'])->name('Product_Image.destroy');
Route::post('/api/product/upload', [ProductController::class , 'upload'])->name('tiny_upload_img');
Route::resource('/API/Import', 'ImportController')->shallow();
Route::get('/API/Import_Amount/add_amount/{id}', [ImportController::class , 'add']);
Route::get('/API/Import_detail', [ImportController::class , 'import_detail'])->name('import_detail');
Route::get('/Calender', function () {
    return view('admin.component.calender');
})->name('calender');
Route::apiResource('/API/ToDo-List', 'ToDo_ListController');
Route::put('/API/ToDo-List/Status_update/{id}/{status}', [ToDo_ListController::class ,'status_update']);

//home page

// backend
Route::post('/authenticate', [CustomerController::class , 'authenticate'])->name('login_customer');
Route::get('/logout', [CustomerController::class , 'logout'])->name('logout_customer');
Route::get('/API/Web/Index', [HomeController::class , 'index']);
Route::get('/API/Web/Product/{cate?}/{lay?}/{limit?}', [HomeController::class , 'Product']);
Route::get('/API/Web/Product/{cate?}', [HomeController::class , 'Product']);
Route::get('/API/Web/Keyboard', [HomeController::class , 'keyboard']);
Route::get('/API/Web/Mouse', [HomeController::class , 'mouse']);
Route::get('/API/Web/Keycap', [HomeController::class , 'keycap']);
Route::get('/API/Web/Product_Detail/{id}', [HomeController::class , 'product_detail']);
Route::get('/API/Web/Add_Card/{id}', [HomeController::class , 'add_card']);

// frontend
Route::get('/Web', function() {
    return view('index');
})->name('index');
Route::get('/Web/Login', function() {
    return view('home.login');
})->name('login');
Route::get('/Web/Sign-In', function() {
    return view('home.sign-in');
})->name('sign-in');
Route::get('/Web/Card', function() {
    return view('home.card');
})->name('card');
Route::get('/Web/Product', function() {
    return view('home.product');
})->name('product');
Route::get('/Web/Product/{categpry}', function() {
    return view('home.product');
})->name('product_cate');
Route::get('Web/Keyboard', function() {
    return view('home.keyboard');
})->name('keyboard');
Route::get('/Web/Mouse', function() {
    return view('home.mouse');
})->name('mouse');
Route::get('/Web/Keycap', function() {
    return view('home.keycap');
})->name('keycap');
Route::get('/Web/Contact_us', function() {
    return view('home.contact_us');
})->name('contact_us');
Route::get('/Web/Developer', function() {
    return view('home.developer');
})->name('builder');
Route::get('/Web/Product_Detail/{id}', function() {
    return view('home.product_detail');
})->name('product_detail');