<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\Admin\IndexController::class)->group(function () {
    Route::get('/', 'index')->name('website.main.page');
    Route::get('/details/{id}', 'detailsProduct')->name('details.product');
    Route::post('/addtocart/{id}', 'AddtoCart')->name('add.to.cart')->middleware('auth');
    Route::get('/DisplayCart', 'DisplayCart')->name('DisplayCart');
    Route::delete('/DeleteOfCart/{id}', 'DeleteOfCart')->name('DeleteOfCart');
    Route::get('/DeleteAllUserCart', 'DeleteAllUserCart')->name('DeleteAllUserCart');
    Route::get('/DisplayUser','DisplayUser')->name('DisplayUser');
    Route::get('/DisplayOrders','DisplayOrders')->name('DisplayOrders');
});

Route::prefix('hoseinbayati')->get('/admin', function () {
    return view('Admin/template/app');
})->middleware('auth')->name('admin');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/products', \App\Http\Controllers\Admin\ProductController::class);
Route::resource('/contents', \App\Http\Controllers\Admin\ContentController::class);
