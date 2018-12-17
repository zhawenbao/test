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
    Route::get('article_list', "Admin\Article@list"); //资讯管理
    Route::get('article_add', "Admin\Article@add"); //添加资讯管理
    Route::get('picture_add', "Admin\Picture@add"); //添加图片
    Route::get('picture_list', "Admin\Picture@list"); //图片列表
    Route::get('picture_show', "Admin\Picture@show"); //图片编辑
    Route::get('goods_list', "Admin\Goods@list"); //商品列表
    Route::get('goods_add', "Admin\Goods@add"); //商品列表
    Route::get('goods_brand', "Admin\Goods@brand"); //商品列表
    Route::get('goods_category', "Admin\Goods@category"); //商品列表

    //支付接口
    Route::get('dopay','Admin\AlipayWap@index');
    Route::get('return','Admin\AlipayWap@alipayReturn');
    Route::get('notify','Admin\AlipayWap@alipayNotify');

});
//Route::get('admin.index', 'Admin/Index@index');