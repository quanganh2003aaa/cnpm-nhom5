<?php

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

Route::get('/', 'ShopController@home')->name('shop.home');

Route::get('shop/singleProduct/{idProduct}', 'ShopController@singleProduct')->name('shop.singleProduct');
Route::get('shop/List/{brand}', 'ShopController@listAll')->name('shop.listAll');
Route::get('shop/Search/List', 'ShopController@search')->name('shop.search');

Route::get('Login', 'UserController@getLogin')->name('get.login');
Route::get('Register', 'UserController@getRegister')->name('get.register');
Route::post('Register', 'UserController@postRegister')->name('post.register');
Route::post('Login', 'UserController@postLogin')->name('post.login');

Route::middleware(['middleware' => 'auth'])->group( function () {
    
    Route::get('Admin', 'RevenueController@index')->name('admin.home');

    Route::get('Admin/Revenue/create', 'RevenueController@create')->name('admin.revenue.create');
    Route::post('Admin/Revenue/store', 'RevenueController@store')->name('admin.revenue.store');

    Route::get('Admin/Users', 'UserController@users')->name('admin.users');
    Route::post('Admin/Users/update/{user}', 'UserController@edit')->name('admin.users.update');
    Route::delete('Admin/Users/delete/{user}', 'UserController@destroy')->name('admin.users.delete');
    Route::get('Admin/Oders', 'OrderController@listOrderAdmin')->name('admin.orders');
    Route::get('Admin/Oders/{order}', 'OrderController@orderSingleAdmin')->name('admin.orderSingleAdmin');
    Route::put('Admin/Oders/Comfirm/{order}', 'OrderController@comfirmOrder')->name('admin.comfirmOrder');
    Route::put('Admin/Oders/Complete/{order}', 'OrderController@completeOrder')->name('admin.completeOrder');
    Route::put('Admin/Oders/Delete/{order}', 'OrderController@deleteOrder')->name('admin.deleteOrder');

    Route::get('Admin/Product/index', 'Admin\ProductController@index')->name('admin.product.index');
    Route::get('Admin/Product/create', 'Admin\ProductController@create')->name('admin.product.create');
    Route::get('Admin/Product/edit/{product}', 'Admin\ProductController@edit')->name('admin.product.edit');
    Route::post('Admin/Product/store', 'Admin\ProductController@store')->name('admin.product.store');
    Route::put('Admin/Product/update/{product}', 'Admin\ProductController@update')->name('admin.product.update');
    Route::delete('Admin/Product/delete/{product}', 'Admin\ProductController@destroy')->name('admin.product.delete');

    Route::get('Admin/Brand/index', 'Admin\BrandController@index')->name('admin.brand.index');
    Route::get('Admin/Brand/create', 'Admin\BrandController@create')->name('admin.brand.create');
    Route::post('Admin/Brand/store', 'Admin\BrandController@store')->name('admin.brand.store');
    Route::get('Admin/Brand/edit/{brand}','Admin\BrandController@edit')->name('admin.brand.edit');
    Route::put('Admin/Brand/update/{brand}', 'Admin\BrandController@update')->name('admin.brand.update');
    Route::delete('Admin/Brand/delete/{brand}', 'Admin\BrandController@destroy')->name('admin.brand.delete');

    Route::post('logout', 'UserController@logout')->name('logout');
    Route::post('shop/My-Account/Update', 'UserController@update')->name('user.update');
    Route::get('shop/User/Add-cart', 'UserController@addCart')->name('user.addCart');
    Route::get('shop/User/Check-out', 'ShopController@checkOut')->name('user.checkOut');
    Route::post('shop/User/Order', 'UserController@thank')->name('user.order');

    Route::get('shop/My-Account', 'ShopController@myAccount')->name('shop.myAccount');
    Route::get('shop/Cart', 'ShopController@cart')->name('shop.cart');
    Route::get('shop/Cart/delete/{i}', 'ShopController@deleteCart')->name('shop.deleteCart');
    Route::post('shop/Cart/update/ddddd', 'ShopController@updateCartPost');
});


