<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 16:14
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Article extends Controller
{
    public function list()
    {
        return view('admin.article.article_list');
    }

    public function add()
    {
        return view('admin.article.article_add');
    }
}