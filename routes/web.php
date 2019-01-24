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

Route::prefix('wx')->group(function () { //后台路由
    Route::get('index', "Wx\Index@index"); //首页
    Route::get('token', "Wx\Index@getAccessToken"); //token
});
