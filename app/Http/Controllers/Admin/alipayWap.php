<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/14
 * Time: 15:30
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libs\alipay\wappay\buildermodel\AlipayTradeCloseContentBuilder;
use App\libs\alipay\wappay\service\AlipayTradeService;
use App\Libs\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder;

class AlipayWap extends Controller
{
    public function index(Request $request) {
        return 'one';
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



    }

    /**
     *支付同步回调接口，在config/alipay.php的return_url参数进行配置

     */
    public function alipayReturn() {
        return 1;
    }

    /**
     *支付异步回调接口，在config/alipay.php的notify_url参数进行配置
     */
    public function alipayNotify() {

    }
}