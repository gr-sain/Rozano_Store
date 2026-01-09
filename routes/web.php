<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('user.home');

Route::get('/cart', function () {
    return view('pages.cart');
});

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');

Route::get('/comapre', function () {
    return view('pages.compare');
});

Route::get('/shop', function () {
    return view('pages.shop');
});

Route::get('/details', function () {
    return view('pages.details');
});

Route::get('/wishlist', function () {
    return view('pages.wishlist');
});

Route::get('/login', function () {
    return view('pages.login-register');
});


Route::get('/admin/index', function () {
    return view('admin.pages.index');
})->name('home');

Route::get('/admin/products', function () {
    return view('admin.componets.products');
})->name('products');


Route::get('/admin/orders', function () {
    return view('admin.componets.orders');
})->name('orders');

Route::get('/admin/customers', function () {
    return view('admin.componets.customers');
})->name('customer');

Route::get('/admin/categories', function () {
    return view('admin.componets.categories');
})->name('categories');

Route::get('/admin/reviews', function () {
    return view('admin.componets.reviews');
})->name('reviews');

Route::get('/admin/coupon', function () {
    return view('admin.componets.coupon');
})->name('coupons');

Route::get('/admin/shipping', function () {
    return view('admin.componets.shipping');
})->name('shippings');

Route::get('/admin/settings', function () {
    return view('admin.componets.settings');
})->name('settings');

Route::get('/admin/profile', function () {
    return view('admin.profile');
})->name('profile');