<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 17:01
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Goods extends Controller
{
    public function list()
    {
        return view('admin.goods.goods_list');
    }

    public function add()
    {
        return view('admin.goods.goods_add');
    }

    public function brand()
    {
        return view('admin.goods.goods_brand');
    }
    
    public function category()
    {
        return view('admin.goods.goods_category');
    }
}