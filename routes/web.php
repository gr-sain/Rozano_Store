<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('user.home');

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/compare', function () {
    return view('pages.compare');
})->name('compare');

Route::get('/shop', function () {
    return view('pages.shop');
})->name('shop');

Route::get('/details', function () {
    return view('pages.details');
})->name('details');
Route::get('/wishlist', function () {
    return view('pages.wishlist');
})->name('wishlist');

Route::get('/login', function () {
    return view('pages.login-register');
})->name('login');

Route::get('/register', function () {
    return view('pages.register');
})->name('register');


Route::get('/myaccount', function () {
    return view('pages.myaccount');
})->name('myaccount');




Route::get('/admin/index', function () {
    return view('admin.pages.index');
})->name('admin.home');

Route::get('/admin/products', function () {
    return view('admin.componets.products');
})->name('admin.products');


Route::get('/admin/orders', function () {
    return view('admin.componets.orders');
})->name('admin.orders');

Route::get('/admin/customers', function () {
    return view('admin.componets.customers');
})->name('admin.customers');
Route::get('/admin/categories', function () {
    return view('admin.componets.categories');
})->name('admin.categories');

Route::get('/admin/reviews', function () {
    return view('admin.componets.reviews');
})->name('admin.reviews');

Route::get('/admin/coupon', function () {
    return view('admin.componets.coupon');
})->name('admin.coupons');

Route::get('/admin/shipping', function () {
    return view('admin.componets.shipping');
})->name('admin.shippings');


Route::get('/admin/settings', function () {
    return view('admin.componets.settings');
})->name('admin.settings');

Route::get('/admin/profile', function () {
    return view('admin.profile');
})->name('admin.profile');