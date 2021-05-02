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
Route::get('user_info', 'UserController@show')->name('user.info');
// ユーザー情報編集
Route::get('user_edit', 'UserController@edit')->name('user.edit');
Route::put('user_update', 'UserController@update')->name('user.update');
// ユーザー情報削除
Route::get('delete', 'UserController@delete')->name('user.delete');

//商品検索画面
Route::get('products', 'ProductsController@index')->name('search.product');

//商品詳細画面表示
Route::get('products/{id}', 'ProductDetailsController@show')->name('product.show');
Route::post('addCart', 'ProductDetailsController@addCart')->name('addCart.index');

//カート内商品一覧
Route::get('cart', 'ProductDetailsController@takeCart')->name('cart.index');
//カート内に商品無い場合
Route::view('no-cartList', 'products/no_cart_list')->name('noCartlist');
//カート内商品削除
Route::post('itemRemove', 'ProductDetailsController@remove')->name('itemRemove');

// 注文履歴
Route::get('orders', 'OrdersController@show')->name('order.history');

// オーダー情報詳細画面
Route::resource('orders', 'OrderDetailController', ['only' => ['show', 'edit']]);

//商品追加
Route::get('newAdd', 'AddController@index')->name('newAdd.index');
Route::post('newProduct', 'AddController@store')->name('newProduct.post');
