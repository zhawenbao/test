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
    Route::get('valid', "Wx\WxSample@index"); //首页
});

Route::prefix('home')->group(function () { //后台路由
    Route::match(['post','get'],'file', "Home\UploadFile@upload"); //首页
    Route::match(['post','get'],'file1', "Home\UploadFile@upload1"); //首页
});

