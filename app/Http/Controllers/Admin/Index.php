<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 14:15
 */
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\libs\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder;
use App\libs\alipay\wappay\service\AlipayTradeService;
use PhpParser\Node\Scalar\MagicConst\Dir;


class Index extends Controller
{
    public function index(Request $request)
    {
        return view("admin.index.index");
    }

    public function welcome()
    {
        return view('admin.index.welcome');
    }
}