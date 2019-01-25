<?php
/**
  * wechat php test
  */
namespace App\Http\Controllers\Wx;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Wx\Index;

class WxSample extends Controller
{
    const TOKEN = "GreatMe";

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