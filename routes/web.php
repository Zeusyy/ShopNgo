<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
->name('home');

// Route::get('/phone', 'ProductController@index')
// ->name('phone');

Route::resource('product','ProductController');

// cart
Route::get('/cart',"CartController@index")
->name('cart.index');

Route::get('/addCart/{id}',"CartController@add")
->name('cart.add');

Route::get('/deleteCart/{id}',"CartController@deleteCart")
->name('cart.delete');

Route::get('/clearCart',"CartController@clearCart")
->name('cart.clear');




