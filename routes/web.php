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
    return view('top');
});
// ユーザー登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/detail/{id}', 'MProductController@show')->name('detail');
Route::post('/addCart', 'CartController@addCart')->name('addCart');
Route::get('/cart/list','CartController@CartList')->name('cart.list');

// ログインユーザのみ
Route::group(['middleware' => 'auth'], function(){
    Route::get('user/information', 'UserInformationController@show');
});
