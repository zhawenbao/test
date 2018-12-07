<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 14:15
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class Index extends Controller
{
    public function index()
    {
        return view("admin.index.index");
    }

    public function welcome()
    {
        return view('admin.index.welcome');
    }
}