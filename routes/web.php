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
    return view('before_login');
});


/*
|--------------------------------------------------------------------------
| 出品者(管理者含む)のみのルーティング
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'seller', 'name' => 'seller.', 'middleware' => ['auth', 'can:edit']], function () {
    Route::resource('items', 'SellerController');
    Route::get('seller_search', 'SellerController@search')->name('seller_search');
    Route::get('product/edit/{id}', 'BackProductController@edit')->name('back_product_edit');
    Route::put('product/update/{id}', 'BackProductController@update')->name('back_product_update');
    Route::delete('product/delete/{id}', 'BackProductController@destroy')->name('back_product_delete');
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
| ユーザ情報一覧、編集、削除
|--------------------------------------------------------------------------
*/
<<<<<<< HEAD
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


=======
Route::group(['prefix' => 'user'], function(){
    Route::get('info', 'UserController@show')->name('user/info');
    Route::get('edit', 'UserController@edit')->name('user/edit');
    Route::put('update', 'UserController@update')->name('user/update');
    Route::get('delete', 'UserController@index')->name('user/delete');
    Route::post('delete', 'UserController@delete')->name('delete');
});
>>>>>>> develop_alpha

/*
|--------------------------------------------------------------------------
| 商品検索機能
|--------------------------------------------------------------------------
*/
Route::get('show', 'ProductController@index')->name('show');
Route::get('searchproduct', 'ProductController@search')->name('searchproduct');



/*
|--------------------------------------------------------------------------
| カート機能
|--------------------------------------------------------------------------
*/
Route::resource('cartitem', 'CartController', ['only' => ['index']]);

Route::group(["prefix" => 'iteminfo'], function() {
    Route::get('/{id}', 'CartController@show')->name('iteminfo');
    Route::post('/add', 'CartController@addCart')->name('addcart');
});

Route::get('purchase_completed', 'CartController@showPurchaseCompleted')->name('purchase_completed');


