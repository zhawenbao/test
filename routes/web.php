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

Route::prefix('admin')->group(function () { //后台路由
    Route::get('index', "Admin\Index@index"); //首页
    Route::get('welcome', "Admin\Index@welcome"); //欢迎页面

});
//Route::get('admin.index', 'Admin/Index@index');