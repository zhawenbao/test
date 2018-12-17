<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 14:15
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Index extends Controller
{
    public function index(Request $request)
    {
        $out_trade_no =date('YmdHis111');          //公共方法生成唯一订单号
        $subject = 'test';                           //数据仅供测试，下同
        $total_amount = 0.01;
        $body = 'test test!';
        $timeout_express="1m";

        $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);

        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($out_trade_no);
        $payRequestBuilder->setTotalAmount($total_amount);

        $payRequestBuilder->setTimeExpress($timeout_express);


        $payResponse = new AlipayTradeService();

        $result=$payResponse->wapPay($payRequestBuilder,config('alipay.return_url'),config('alipay.notify_url'));
//        return view("admin.index.index");
    }

    public function welcome()
    {
        return view('admin.index.welcome');
    }
}