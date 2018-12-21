<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/14
 * Time: 15:06
 */

return [

    //应用ID,您的APPID。
    'app_id' => "2013121100055554",

    //商户私钥，您的原始格式RSA私钥
    'merchant_private_key' => "MIIEpAIBAAKCAQEAvkbp5JDWqXHX3fBiNg8/G2WRmsRkl+83tRscPr7i9UUWpZHpL/RZZxcwO0h+r5MjmwG9vdN8ImYsznR/nC4Q4SUhj2FitJ9EmrsK8cLuUr5m+6heM8YCXjr65UkMae4/7994WFwzXv5WXz2LdcLyH49UnNnpL/Y4FXMrXQ0ViV7iRKPUeawaSQ5yyanl1IGR1m6MFjNojFFiQD3IOkE2KFQQgX0SN5BvUhGTPm1DNUhiAPg7P2GjIw1Kf8ibovEvU+rbW5/KDHYcdfd91sMOtZEoNPMiQbE/Gk5yE8miZfTc2QGmq0uX0B9ZYwtZ9729y26M8IDDQmpPH7h6OuNIQwIDAQABAoIBAEfpBPwcwQPIwoxeDL/hgzgXaq/TCTFidus7E7Gi8qM/OQ/Z1QcKkb8kRFYjT72LHim2vr6+7msRsl1UKeYcgsSUA9rsMyGQD51qkvhLc0ZSLxlsyC1I6Bw0rh15PffK0t8U1aaPMdr0xC+6UrpuspK62H9u23IE260/mWPRThJb4fYn1rBD/t1AjrCorRkWVzINeIwdwCuWzlVVJ53tUa9ZLefpWUPgh8jYpgvYfLq6t1wZENscgnEZ0kNLRnhz+43cZclhkRYDoV2r2vo2TtekoMysCzgFjDiSnUg+nDuENNo27I8OGW+3/SGVpp3U3vn8o6IsmG0WZin4nHYm0gECgYEA9G+NXU0OhxESHtZ0FJ++yNkMLPRAZMBg6G6sAKP426DWV+CFxkM3Vu9ivbdVVo1o9z21wWjaKk83loqdW+HboM5w9SkpDjYtF0dpekUBSSGmTRs6VAYd8oxPmgLyOOIQsnx7VVg7dubR9JzQEGD51WNwy+B8Ecf8uZJxmHh5BOcCgYEAx0ds/TWZx8uBfxmqmEyKDwWa0fgLXQCfLKDpyl3Wvsff+23KTXi2Pvx6F0zlj9jpe7nUM9diH2JtJsHtoPS9CjPdQG6VjPUpW351nU4a+wPXFsmMPP3h+Tmqm5d/t6H8JBfwFmOn2tClkidHHBMsdSbhAOjSeaWaXftt2APemkUCgYEApR2Nko7w11Ayu14F/8CA8c+cJ+m+bdB+JcRMsAoTmtiksava8biJ81G1k436OYNAenLXChU3+giU9j4gWebRo2iQaSsqrozuHKGCoLNoUOxIGCHiXsvbAvLA+rouwToEKW1pKpd1Y7Y78U7URZwcZ4bKtQ2pAaHkF77SuTn4FdUCgYA1IiQ7N0lzbh1vCCbmSLIe4z2uclaFS58lRRpQ7MhPQffEkDd6hI8DKEpdYBFtU0adyKR91hXBjHrR9K8pVVf6Gm4JufKCDPQkAwnVEXg8KX/2AXM05/SSgP+uUKyrB7O04/UN4zBkNXGQEIzzPWGDMwSXO3yzFqacHGfjStTViQKBgQDk7ZHE5ceOOvIZRkbLuHiTcN8EEd6UHfO9uMJ9UzOr9sDJWMS4FDj3+sn6QSRW9vUf23KSONZ/hXT+Lbxq7ijJKvILUoWOh5xMuYTFDtzybU3tYJF5wgSf/OgQrTjc85chjiDbvDT/XX2mFqQXdnC+NJChwmmUmdj7yGjjTBU17g==",

    //异步通知地址
    'notify_url' => "http://139.196.73.211/payment2/notify.php",
    //http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php

    //同步跳转
    'return_url' => "http://139.196.73.211/payment2/notify.php",
    //http://mitsein.com/alipay.trade.wap.pay-PHP-UTF-8/return_url.php
    // jk.mrwangqi.com

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlcdmRbN3a8aOgsT0vVjAYcdXufgHA/EyBzwi6dOap40saSwAEfLvGjNz06XXaV5Tsbv0M5egJrClvnJSmfghab7KWuWI9IfLvKLC4IODE1WnbCbuheXcGEkHS5ytTMeRZLgtuu54JTGngMa0ZiqeX8vZnaOOJD7WAuDAdaFevMZTuuKGtirqMNiTqKNanVInp2LBcp4Dw0ECf1mePhFPLo1Bc/Vvf/5+X41v+MLLoEBH8V1bTyx4foEvZLLzEKV8hsKlZFrJTyeckhq1W8wYG6lEoMxNgxrfBbcWF0jC07xYbwhEUZ6pxqGR+Zr7c1Mifmy/r8VH2XHaQ9lNS7NvywIDAQAB",
];