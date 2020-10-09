<?php

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $categories = Category::get();
//     $products = Product::paginate(12);
//     return view('welcome', [
//         'categories' => $categories,
//         'products' => $products,
//     ]);
// });

// Route::get('/', function () {
//     return view('home');
// })->name('index');

Route::livewire('/', 'home')->name('index');
Route::livewire('/product/{product:slug}', 'product-detail')->name('product.detail');
Route::livewire('/cart', 'cart-index')->name('cart.index');
Route::livewire('/checkout', 'checkout')->name('checkout.index');
Route::livewire('/payment/{order}', 'payment')->name('payment.index');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
