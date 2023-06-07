<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('tologin');
    Route::post('/login', 'aauth')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/register', 'toregister')->name('toregister');
    Route::post('/register', 'register')->name('register');
});
Route::controller(cartController::class)->group(function () {
    Route::post('/add', 'store')->name('addToCart');
    Route::get('/delete/{cart}', 'delete')->name('dropFromCart');
    Route::get('/dropall', 'clearCart')->name('clearCart');
    Route::post('/update/cart', 'updateCart')->name('updateCart');
});
Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/show/{product}', 'show')->name('show');
    Route::get('/viewCart', 'viewCart')->name('viewCart');
    Route::get('/viewCart', 'viewCart')->name('viewCart');
    Route::post('/searchClient', 'searchClient')->name('searchClient');
    Route::post('/filterByCaregory', 'filterByCaregory')->name('filterByCaregory');
});
Route::middleware("auth")->controller(OrderController::class)->group(function () {
    Route::post('/create/order', 'createOrder')->name('createOrder');
    Route::post('/buynow', 'buynow')->name('buynow');
    Route::get('/create/order', 'createOrderfromCart')->name('createOrderfromCart');
    Route::get('/orders', 'index')->name('orders.index');
    Route::get('/order/{order}', 'dropOrder')->name('order.drop');
});
Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'tologin')->name('admin.login');
    Route::post('/login', 'login')->name('admin.login');
});
Route::prefix('admin')->middleware("auth.admin")->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/confirm', 'confirm')->name('order.confirm');
    Route::post('/store', 'store')->name('store');
    Route::post('/addBrand', 'addBrand')->name('addBrand');
    Route::post('/addCategory', 'addCategory')->name('addCategory');
    Route::get('/brand/drop/{brand}', 'deleteBrand')->name('brand.delete');
    Route::get('/brand/dropAll', 'dropAllBrands')->name('brands.dropAll');
    Route::get('/category/dropAll', 'dropAllCategories')->name('categories.dropAll');
    Route::get('/category/{category}', 'deletecategory')->name('category.delete');
    Route::get('/logout', 'logout')->name('admin.logout');
});
Route::prefix('admin')->controller(AdminProductController::class)->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::post('/search', 'search')->name('search');
    Route::get('/deleteProduct/{product:id}', 'deleteProduct')->name('product.delete');
    Route::get('/forceDeleteProduct/{product:id}', 'forceDeleteProduct')->name('product.forceDelete');
    Route::get('/restoreProduct/{id}', 'restoreProduct')->name('product.restoreProduct');
});
Route::prefix('admin')->controller(AdminOrderController::class)->group(function () {
    Route::get('/order/{order}', 'confirm')->name('order.confirm');
    Route::get('/order/drop/{order}', 'cancel')->name('order.cancel');
});
Route::controller(ErrorController::class)->group(function(){
    Route::get('error/back','back')->name('error.back');
});
