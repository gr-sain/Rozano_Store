<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\CategoryController as ControllersCategoryController;
use App\Http\Controllers\HomeBannerController as ControllersHomeBannerController;
use App\Http\Controllers\ProductController as ControllersProductController;

// Route::get('/', fn () => view('pages.index'))->name('user.home');
Route::get('/', [ControllersHomeBannerController::class, 'index'])->name('user.home');
// Route::get('/shop', fn () => view('pages.shop'))->name('shop');
Route::get('/shop', [ControllersProductController::class, 'index'])->name('shop.index');
Route::get('/details', fn () => view('pages.details'))->name('details');
Route::get('/compare', fn () => view('pages.compare'))->name('compare');

Route::get('/login', fn () => view('pages.login'))->name('login');
Route::get('/register', fn () => view('pages.register'))->name('register');
Route::get('/cart', fn () => view('pages.cart'))->name('cart');
Route::get('/wishlist', fn () => view('pages.wishlist'))->name('wishlist');

Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); 




Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/checkout', fn () => view('pages.checkout'))->name('checkout');
    Route::get('/myaccount', fn () => view('pages.myaccount'))->name('myaccount');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/index', fn () => view('admin.pages.index'))->name('admin.home');

    // Route::get('/products', fn () => view('admin.componets.products'))->name('admin.products');
    Route::delete('products/images/{id}', [ProductController::class, 'deleteImage'])
            ->name('admin.product.image.delete');
    Route::resource('products', ProductController::class)->parameters([
        'product' => 'product'
    ]);
    // Route::get('/categories', fn () => view('admin.componets.categories'))->name('admin.categories');
    Route::resource('categories', CategoryController::class)->parameters([
        'category' => 'category'
    ]);
    Route::resource('brands', BrandController::class)->parameters([
        'brand' => 'brand'
    ]);
    Route::get('/reviews', fn () => view('admin.componets.reviews'))->name('admin.reviews');
    Route::get('custmers', fn () => view('admin.componets.customers'))->name('admin.customers');
    // Route::get('/brands', fn () => view('admin.componets.brands'))->name('admin.brands');
    Route::get('/coupon', fn () => view('admin.componets.coupon'))->name('admin.coupons');
    Route::get('/orders', fn () => view('admin.componets.orders'))->name('admin.orders');
    Route::get('/shipping', fn () => view('admin.componets.shipping'))->name('admin.shippings');
    Route::get('/settings', fn () => view('admin.componets.settings'))->name('admin.settings');
    Route::get('/profile', fn () => view('admin.profile'))->name('admin.profile');
    // Route::get('/benner', fn()=> view('admin.componets.benner'))->name('admin.benner');

    Route::resource('benner', HomeBannerController::class)->parameters([
        'benner' => 'homeBanner'
    ]);
});
