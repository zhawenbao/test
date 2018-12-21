<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/21
 * Time: 15:29
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Alipay\pagepay\service\AlipayTradeService;
use App\Alipay\pagepay\buildermodel\AlipayTradePagePayContentBuilder;

class Pay extends Controller
{
    public function index()
    {
        return view('admin.pay.index');
    }

    public function pagePay()
    {
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = trim($_POST['WIDout_trade_no']);

        //订单名称，必填
        $subject = trim($_POST['WIDsubject']);

        //付款金额，必填
        $total_amount = trim($_POST['WIDtotal_amount']);

        //商品描述，可空
        $body = trim($_POST['WIDbody']);

        //构造参数
        $payRequestBuilder = new AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $aop = new AlipayTradeService();
        $response = $aop->pagePay($payRequestBuilder,config("alipay.return_url"),config("alipay.notify_url"));

        //输出表单
        var_dump($response);
    }
}