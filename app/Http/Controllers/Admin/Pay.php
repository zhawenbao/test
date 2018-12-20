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
        $str = <<<EOD
MIIEogIBAAKCAQEAyamF5E/yzvbzT5iyPhNt7UPLH9DCAxMMTq1hg6iGkveKK3FK1mefaycNdNeMqjbTDdZ88WwRl6I2t/lc4+pUCw6tEb0N5RGwsITNSyPjAOKB/75nl4ftottkv+zzfhTUQPT3hPc/eYgB0tWo/zmkRgGR8njyxRWeGT67oXpH8jnSZAx2pZ8gNdCQ38kXTJbSbPHbsX/WcnL37nl4+KEpMY3uGBvIVEmQiSOgKdF/mnyfNHiCb0c887dFsFkPWD1x7FbgYo61A5LlmYXbQm9FGDvb/OLvk0bsZjEfGxgcJ5cHZ0C3A2cRnPQjbU6Cv6oGepId5viFwq41vRxXklWIIwIDAQABAoIBAF1sTJv1sb3Rx+xTCBgb9iwZ4QsvMgIsm+IDDo7oztddGESB6rKjNMZ2RBSiGwdr+KCLgjxx3UCLJKBcRH1NvHuW4/S4yawaYumTzGuIB40MYj8xXVpk3WE6FFWZl0AMtDwXgGe4B07tBDNBSlZaxNCtv4g+IfHNzv1RA6mONbBv6IQSu97/8ctGkBEyUwplKg8gpAC0077Bt9r2hz3b8oUhegowLfEAWn/okE6TUvYSBCnzCtlgCzQPjaIywv4Ku0bYjF1rZpWAQtnkRnJ2HZrsXQIHIsTdI8lkZ8tuQdg7qvHU086xXPDdq2+svqtkF0TTC0/wDcn9Vm5kdxzmowECgYEA6KlTuoEEF5rTVluhdA2qLMFcyt876VJlzN4I2zbmyBbejkDmZBbymUn9ul+zUUKIaqJ0sxzaqu/5Mg8INOUcLVOtLqpNE8cfAPeaRe+T7vHMPc1hS0n2Z4j+L+CIBMc6DSbusTkuso0G0SKa+WB4030MGDgPldFyXdUeSc5G1YECgYEA3eQlMc21U2+45NEVe1tjf7uY0RlJ1Uzc6E/RrHvkydX5SWXZQWOgWBnyMzOLb8nVv1nOaZrUWE5XXuL9A31CSvuamXHV2ogSLn6QeV2lE65vFC+w0dxTL7kVabYj0LrmeXvku1UGMkUrTTRYzomOULAmaX3O3Bw1vlwkbEaNF6MCgYBJquu+/wDbtIM8MdFCXN1IRIVsGxjuPM/M+XTWbGDQdCVN55DLmlSAYuQ68fhmP2nQUdYfrIA0Zb2Csy3HCdBNLdSFFRlIrODNPpkTkdNGcjtYSkKHQ0kI6WCKqk6HLMndxjkH1nJJyMuixpFJatl3JX4B4SZWKrZKraNkfTMCgQKBgFUGrH4GHnqHcCk2OW4YmesDXs6ZSyKSHoBivazDmOsCtFC812BoJbQ81QNrt/2xMNfvONpcuwvPkUlJ37wrjnCfMyGjblgcFiN82i23hZ8iE2x/zdjM/Y9m896bLeQ5CkH5CLAEJ6ixuqMN8Q3Lxh4DMeTwkYjkwm9cbZSUAFLTAoGAHCdD1+sQ/cknPX1/FXdI8uiE5q2CUuN5XJmwlvT0oX9Xg7WQ069EkrSaaYitBu2dpJmK9R45IkgX1eDCJ2YTJt9a1rTy9MMNI4hBUYWog71uS3O+HDAWw96sP+I3GELMkobNIp1KjU6BIqJwskKkfv9DSi92IZfUvEb3SEvDQPs=
EOD;
//        $str = chunk_split($str, 64, "\n");
//        $private_key = "-----BEGIN RSA PRIVATE KEY-----\n$str-----END RSA PRIVATE KEY-----\n";
        $aop->rsaPrivateKey = $str;

        $str1 = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyamF5E/yzvbzT5iyPhNt7UPLH9DCAxMMTq1hg6iGkveKK3FK1mefaycNdNeMqjbTDdZ88WwRl6I2t/lc4+pUCw6tEb0N5RGwsITNSyPjAOKB/75nl4ftottkv+zzfhTUQPT3hPc/eYgB0tWo/zmkRgGR8njyxRWeGT67oXpH8jnSZAx2pZ8gNdCQ38kXTJbSbPHbsX/WcnL37nl4+KEpMY3uGBvIVEmQiSOgKdF/mnyfNHiCb0c887dFsFkPWD1x7FbgYo61A5LlmYXbQm9FGDvb/OLvk0bsZjEfGxgcJ5cHZ0C3A2cRnPQjbU6Cv6oGepId5viFwq41vRxXklWIIwIDAQAB
-----END PUBLIC KEY-----
EOD;
//        $str = chunk_split($str, 64, "\n");
//        $public_key = "-----BEGIN PUBLIC KEY-----\n$str-----END PUBLIC KEY-----\n";

        $aop->alipayrsaPublicKey=$str1;
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset='GBK';
        $aop->format='json';
//        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);

        $request = new AlipayFundTransToaccountTransferRequest();
        $request->setBizContent("{" .
            "\"out_biz_no\":\"3142321423432\"," .
            "\"payee_type\":\"ALIPAY_LOGONID\"," .
            "\"payee_account\":\"13866569962\"," .
            "\"amount\":\"1\"," .
            "\"payer_show_name\":\"转账\"," .
            "\"payee_real_name\":\"查文宝\"," .
            "\"remark\":\"测试转账\"" .
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