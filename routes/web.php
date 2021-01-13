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
|--------------------------------------------------------------------------
| ユーザ登録機能
|--------------------------------------------------------------------------
*/

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

/*
|--------------------------------------------------------------------------
| ログイン機能
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| ルートディレクトリへのアクセス時
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| 出品者(管理者含む)のみのルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'seller', 'name' => 'seller.', 'middleware' => ['auth', 'can:edit']], function () {
    Route::resource('items', 'SellerController');
    Route::get('product/edit', 'BackProductController@edit')->name('back_product_edit');
Route::put('product/update', 'BackProductController@update')->name('user_update');
});

/*
|--------------------------------------------------------------------------
| ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'can:onlyShow']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/order-history', 'OrderController@showOrderHistory')->name('o_history');
    Route::get('/order-detail/delete', 'OrderController@deleteOrder')->name('delete_order');
    Route::get('/order-detail', 'OrderController@showOrderDetail')->name('o_detail');
});

/*
|--------------------------------------------------------------------------
| ユーザ情報一覧
|--------------------------------------------------------------------------
*/
Route::get('/user_info', 'UserController@show')->name('user_info');

/*
|--------------------------------------------------------------------------
| ユーザ情報編集
|--------------------------------------------------------------------------
*/
Route::get('/user_edit', 'UserController@edit')->name('user_edit');
Route::put('/user_update', 'UserController@update')->name('user_update');


/*
|--------------------------------------------------------------------------
| ユーザ情報削除
|--------------------------------------------------------------------------
*/
Route::get('/delete', 'UserController@delete')->name('user_delete');
Route::post('/remove', 'UserController@remove')->name('user_remove');



//商品検索機能
Route::get('show', 'ProductController@index')->name('show');

/*
|--------------------------------------------------------------------------
| 開発中
|--------------------------------------------------------------------------
*/


Route::resource('cartitem', 'CartController', ['only' => ['index']]);

Route::group(["prefix" => 'iteminfo'], function() {
    Route::get('/{id}', 'CartController@show');
    Route::post('/add', 'CartController@addCart')->name('addcart');
});

Route::get('searchproduct', 'ProductController@search')->name('searchproduct');


