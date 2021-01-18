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
// ユーザー登録画面へ
Route::get('/signup',function(){
    return view('customer_information_registration');
});
// ユーザー登録コントローラーへ
Route::post('/signup/create', 'UserRegistrationController@create');
