<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/17
 * Time: 15:01
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\alipay\wappay\buildermodel\AlipayTradeCloseContentBuilder;
use App\Libs\alipay\wappay\service\AlipayTradeService;
use App\Libs\alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder;
use App\Libs\alipay\aop\request\AlipayFundTransToaccountTransferRequest;
use App\Libs\alipay\aop\AopClient;

class Pay extends Controller
{

    public function index()
    {
/* *
 * 功能：支付宝手机网站支付接口(alipay.trade.wap.pay)接口调试入口页面
 * 版本：2.0
 * 修改日期：2016-11-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 请确保项目文件有可写权限，不然打印不了日志。
 */

        /*header("Content-type: text/html; charset=utf-8");


        require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'service/AlipayTradeService.php';
        require_once dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'buildermodel/AlipayTradeWapPayContentBuilder.php';
        require dirname ( __FILE__ ).DIRECTORY_SEPARATOR.'./../config.php';
        if (!empty($_POST['WIDout_trade_no'])&& trim($_POST['WIDout_trade_no'])!=""){
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = $_POST['WIDout_trade_no'];

            //订单名称，必填
            $subject = $_POST['WIDsubject'];

            //付款金额，必填
            $total_amount = $_POST['WIDtotal_amount'];

            //商品描述，可空
            $body = $_POST['WIDbody'];

            //超时时间
            $timeout_express="1m";

            $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);

            $payResponse = new AlipayTradeService($config);
            $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

            return ;
        }*/
        return view("admin.pay.index");
    }

    public function dopay(Request $request)
    {
        $out_trade_no =date('YmdHis') . 11111;          //公共方法生成唯一订单号
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

//        require_once '../../..Libs/alipay/wappay/service/AlipayTradeService.php';
        $payResponse =new AlipayTradeService();

        $result=$payResponse->wapPay($payRequestBuilder,config('alipay.return_url'),config('alipay.notify_url'));
    }

    public function transfer()
    {
        $aop = new AopClient();
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2088802812998540';
        $aop->rsaPrivateKey = '-----BEGIN PRIVATE KEY-----
MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDJqYXkT/LO9vNP
mLI+E23tQ8sf0MIDEwxOrWGDqIaS94orcUrWZ59rJw1014yqNtMN1nzxbBGXoja3
+Vzj6lQLDq0RvQ3lEbCwhM1LI+MA4oH/vmeXh+2i22S/7PN+FNRA9PeE9z95iAHS
1aj/OaRGAZHyePLFFZ4ZPruhekfyOdJkDHalnyA10JDfyRdMltJs8duxf9Zycvfu
eXj4oSkxje4YG8hUSZCJI6Ap0X+afJ80eIJvRzzzt0WwWQ9YPXHsVuBijrUDkuWZ
hdtCb0UYO9v84u+TRuxmMR8bGBwnlwdnQLcDZxGc9CNtToK/qgZ6kh3m+IXCrjW9
HFeSVYgjAgMBAAECggEAXWxMm/WxvdHH7FMIGBv2LBnhCy8yAiyb4gMOjujO110Y
RIHqsqM0xnZEFKIbB2v4oIuCPHHdQIskoFxEfU28e5bj9LjJrBpi6ZPMa4gHjQxi
PzFdWmTdYToUVZmXQAy0PBeAZ7gHTu0EM0FKVlrE0K2/iD4h8c3O/VEDqY41sG/o
hBK73v/xy0aQETJTCmUqDyCkALTTvsG32vaHPdvyhSF6CjAt8QBaf+iQTpNS9hIE
KfMK2WALNA+NojLC/gq7RtiMXWtmlYBC2eRGcnYdmuxdAgcixN0jyWRny25B2Duq
8dTTzrFc8N2rb6y+q2QXRNMLT/ANyf1WbmR3HOajAQKBgQDoqVO6gQQXmtNWW6F0
DaoswVzK3zvpUmXM3gjbNubIFt6OQOZkFvKZSf26X7NRQohqonSzHNqq7/kyDwg0
5RwtU60uqk0Txx8A95pF75Pu8cw9zWFLSfZniP4v4IgExzoNJu6xOS6yjQbRIpr5
YHjTfQwYOA+V0XJd1R5JzkbVgQKBgQDd5CUxzbVTb7jk0RV7W2N/u5jRGUnVTNzo
T9Gse+TJ1flJZdlBY6BYGfIzM4tvydW/Wc5pmtRYTlde4v0DfUJK+5qZcdXaiBIu
fpB5XaUTrm8UL7DR3FMvuRVptiPQuuZ5e+S7VQYyRStNNFjOiY5QsCZpfc7cHDW+
XCRsRo0XowKBgEmq677/ANu0gzwx0UJc3UhEhWwbGO48z8z5dNZsYNB0JU3nkMua
VIBi5Drx+GY/adBR1h+sgDRlvYKzLccJ0E0t1IUVGUis4M0+mROR00ZyO1hKQodD
SQjpYIqqTocsyd3GOQfWcknIy6LGkUlq2XclfgHhJlYqtkqto2R9MwKBAoGAVQas
fgYeeodwKTY5bhiZ6wNezplLIpIegGK9rMOY6wK0ULzXYGgltDzVA2u3/bEw1+84
2ly7C8+RSUnfvCuOcJ8zIaNuWBwWI3zaLbeFnyITbH/N2Mz9j2bz3pst5DkKQfkI
sAQnqLG6ow3xDcvGHgMx5PCRiOTCb1xtlJQAUtMCgYAcJ0PX6xD9ySc9fX8Vd0jy
6ITmrYJS43lcmbCW9PShf1eDtZDTr0SStJppiK0G7Z2kmYr1HjkiSBfV4MInZhMm
31rWtPL0ww0jiEFRhaiDvW5Lc74cMBbD3qw/4jcYQsyShs0inUqNToEionCyQqR+
/0NKL3Yhl9S8RvdIS8NA+w==
-----END PRIVATE KEY-----
';
        $aop->alipayrsaPublicKey='-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyamF5E/yzvbzT5iyPhNt
7UPLH9DCAxMMTq1hg6iGkveKK3FK1mefaycNdNeMqjbTDdZ88WwRl6I2t/lc4+pU
Cw6tEb0N5RGwsITNSyPjAOKB/75nl4ftottkv+zzfhTUQPT3hPc/eYgB0tWo/zmk
RgGR8njyxRWeGT67oXpH8jnSZAx2pZ8gNdCQ38kXTJbSbPHbsX/WcnL37nl4+KEp
MY3uGBvIVEmQiSOgKdF/mnyfNHiCb0c887dFsFkPWD1x7FbgYo61A5LlmYXbQm9F
GDvb/OLvk0bsZjEfGxgcJ5cHZ0C3A2cRnPQjbU6Cv6oGepId5viFwq41vRxXklWI
IwIDAQAB
-----END PUBLIC KEY-----
';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='GBK';
        $aop->format='json';

        $request = new AlipayFundTransToaccountTransferRequest();
        $request->setBizContent("{" .
            "\"out_biz_no\":\"3142321423432\"," .
            "\"payee_type\":\"ALIPAY_LOGONID\"," .
            "\"payee_account\":\"abc@sina.com\"," .
            "\"amount\":\"0.1\"," .
            "\"payer_show_name\":\"上海交通卡退款\"," .
            "\"payee_real_name\":\"张三\"," .
            "\"remark\":\"转账备注\"" .
            "  }");
        $result = $aop->execute($request);

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        if(!empty($resultCode)&&$resultCode == 10000){
            echo "成功";
        } else {
            echo "失败";
        }






    }
}