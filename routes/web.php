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

Route::group(['middleware' => 'auth'], function(){
    Route::get('user/information', 'UserInformationController@show');
    Route::resource('user/information', 'UserInformationController', ['only' => ['show', 'edit', 'update','destroy']]);
    //注文履歴画面へ
    Route::get('/orders','OrdersController@getHistory')->name('order.history');
    Route::get('/recently_orders','OrdersController@get3MonthHistory')->name('order.Months-3');
    //注文詳細画面へ
    Route::get('/order_detail','OrdersController@orderDetail')->name('order_detail');
    //購入完了画面へ
    Route::get('purchase/completed', function () {
        return view('purchase_completed');
    });
});
