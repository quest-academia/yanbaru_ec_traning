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
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ログイン
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//検索機能
Route::get('search', 'ProductController@search')->name('search');

Route::get('/detail/{id}', 'ProductController@show')->name('detail');
Route::post('/addCart', 'CartController@addCart')->name('addCart');
Route::get('/cart/index','CartController@index')->name('cart.index');
Route::post('/cart/list_delete', 'CartController@delete')->name('cartItemDelete');
Route::post('/CartFinalized', 'CartController@store')->name('cartFinalized');


// ログインユーザのみ
Route::group(['middleware' => 'auth'], function(){
    Route::resource('user/information', 'UserInformationController', ['only' => ['show', 'edit', 'update','destroy']]);
    //購入完了画面へ
    Route::get('purchase/completed', function () {
        return view('purchase_completed');
    });
});
