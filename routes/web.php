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

/*
|-----------------------------------------------------------------
| ユーザ登録機能
|-----------------------------------------------------------------
*/

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

/*
|-----------------------------------------------------------------
| ログイン機能
|-----------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/*
|-----------------------------------------------------------------
| ルートディレクトリへのアクセス時
|-----------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', function () {
    return view('home');
});

/*
|-----------------------------------------------------------------
| ログイン後
|-----------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

/*
|-----------------------------------------------------------------
| 商品検索機能
|-----------------------------------------------------------------
*/
Route::get('show', 'ProductController@index')->name('show');
Route::get('searchproduct', 'ProductController@search')->name('searchproduct');

/*
|-----------------------------------------------------------------
| カート内商品一覧
|-----------------------------------------------------------------
*/
Route::resource('cartlist', 'CartController', ['only' => ['index']]);

Route::group(["prefix" => 'iteminfo'], function () {
    Route::get('/{id}', 'CartController@show');
    Route::post('/add', 'CartController@addCart')->name('addcart');
});
Route::post('prodinfo/cartListRemove', 'CartController@remove')->name('itemRemove');
Route::get('noCartList', function () {
    return view('no_cart_list');
})->name('noCart');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
