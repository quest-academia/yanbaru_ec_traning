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

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン機能
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// ユーザ情報確認
Route::get('/user_info', 'UserController@show')->name('user.info');


//商品詳細画面表示
Route::get('product', 'ProductDetailsController@index')->name('product.index');
Route::post('addCart', 'ProductDetailsController@addCart')->name('cart.index');

// ユーザー情報編集
Route::get('/user_edit', 'UserController@edit')->name('user.edit');
Route::put('/user_update', 'UserController@update')->name('user.update');

// ユーザー情報削除
Route::get('/delete', 'UserController@delete')->name('user.delete');
// 注文履歴
Route::get('/orders', 'OrdersController@show')->name('product.history');

// オーダー情報詳細画面
Route::get('/order_detail', 'OrderDetailController@showOrderDetail')->name('order.detail');
Route::get('/order_detail/{id}', 'OrderDetailController@edit')->name('order.edit');
