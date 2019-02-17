<?php
/**
  * wechat php test
  */
namespace App\Http\Controllers\Wx;

use App\Http\Controllers\Controller;

class WxSample extends Controller
{

    public function __construct()
    {

    }


    public function index()
    {
        $wx = new Index();
        $wx->valid();
    }
}

?>