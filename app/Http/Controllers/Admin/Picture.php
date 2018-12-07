<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 16:35
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Picture extends Controller
{
    public function list()
    {
        return view('admin.picture.picture_list');
    }

    public function add()
    {
        return view('admin.picture.picture_add');
    }

    public function show()
    {
        return view('admin.picture.picture_show');
    }
}