<?php

Route::get('/', function () {
    return 'Admin Page';
})->name('dashboard');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');

Route::get('data/categories', 'DataTable\CategoryController')->name('categories.data');
Route::get('data/products', 'DataTable\ProductController')->name('products.data');
