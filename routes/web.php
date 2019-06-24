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

Route::get('/', 'CategoryController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('category', 'CategoryController')->parameters([
    'category' => 'id'
]);
Route::get('/products', 'ProductController@showproducts')->name('product.index');
Route::get('/product/showproducts/{categoryid}', 'ProductController@findByCategory')->name('product.findbycat');
Route::get('/product/viewproduct/{productid}', 'ProductController@show')->name('product.viewprod');

Route::resource('product', 'ProductController');

Route::get('/shoppingcart', 'ShoppingCartController@getShoppingCart')->name('cart.index');

Route::get('/shoppingcart/add/{id}', 'ShoppingCartController@addProductToShoppingCart')->name('cart.addProduct');

Route::get('/shoppingcart/addqty/{id}', 'ShoppingCartController@addProductQty')->name('cart.addQty');
Route::get('/shoppingcart/removeproduct/{id}', 'ShoppingCartController@removeProduct')->name('cart.removeProduct');

Route::get('/placeorder', 'orderController@placeOrder')->name('order.place');