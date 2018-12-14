<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/14
 * Time: 15:06
 */

return [

    //应用ID,您的APPID。
    'app_id' => "2088802812998540",

    //商户私钥，您的原始格式RSA私钥
    'merchant_private_key' => "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDJqYXkT/LO9vNP
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
/0NKL3Yhl9S8RvdIS8NA+w==",

    //异步通知地址
    'notify_url' => "https://47.96.102.32",
    //http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php

    //同步跳转
    'return_url' => "https://47.96.102.32",
    //http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php
    // jk.mrwangqi.com

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyamF5E/yzvbzT5iyPhNt7UPLH9DCAxMMTq1hg6iGkveKK3FK1mefaycNdNeMqjbTDdZ88WwRl6I2t/lc4+pUCw6tEb0N5RGwsITNSyPjAOKB/75nl4ftottkv+zzfhTUQPT3hPc/eYgB0tWo/zmkRgGR8njyxRWeGT67oXpH8jnSZAx2pZ8gNdCQ38kXTJbSbPHbsX/WcnL37nl4+KEpMY3uGBvIVEmQiSOgKdF/mnyfNHiCb0c887dFsFkPWD1x7FbgYo61A5LlmYXbQm9FGDvb/OLvk0bsZjEfGxgcJ5cHZ0C3A2cRnPQjbU6Cv6oGepId5viFwq41vRxXklWIIwIDAQAB",
];