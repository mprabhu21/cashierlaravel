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

//Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('login', 'Auth\AuthController@index')->name('login');
Route::get('registration', 'Auth\AuthController@registration')->name('register');
Route::post('post-login', 'Auth\AuthController@postLogin')->name('login.post'); 
Route::post('post-registration', 'Auth\AuthController@postRegistration')->name('register.post'); 
Route::get('dashboard', 'Auth\AuthController@dashboard'); 
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('products', 'productsController@getAction');
Route::get('products/{id}', 'productsController@getProductDetail');

Route::get('purchase/{id}', 'purchaseController@getAction');
Route::post('order-post', 'purchaseController@orderPost')->name('order-post');

Route::get('orders', 'orderController@getAction')->name('orders');