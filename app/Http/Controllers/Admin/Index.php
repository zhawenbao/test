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


    /***
     * 冒泡排序
     */
    public function maoPao()
    {
        $a = [1, 10, 6, 8, 9, 5, 2, 4];

        $b = "";

        for($i = 0; $i< count($a) -1 ;$i ++){
            for($j =1; $j < count($a)-$i -1 ; $j ++){
                if($a[$j] > $a[$j +1]){
                    $b = $a[$j];
                    $a[$j] = $a[$j +1];
                    $a[$j +1] = $b;
                }
            }
        }
        dump($a);
    }

    public function phpSort()
    {
//        $info = ['apple', 'car', 'balana', 'dir'];
        //PHP升序排序函数
//        sort($info,SORT_NUMERIC);
        //php降序排序函数
//        rsort($info);
//        dump($info);


        //数组排序


    }
}