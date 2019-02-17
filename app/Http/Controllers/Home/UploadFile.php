<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2019/1/29
 * Time: 15:42
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadFile extends Controller
{
    public function upload(Request $request)
    {

        if($request->isMethod('post')){
            var_dump($request->post('userName'));
        };
        return view("home.file.file");
    }

    public function upload1(Request $request)
    {

        $type = explode('/', $_FILES["fileName"]["type"]);
        if (!in_array('jpeg', $type)){
            echo "格式不正确"; die();
        }//判断格式
        $_FILES["fileName"]["name"] = date('Ymd',time()) . '.' . $type[1];
        if (!file_exists("/upload/". date("Ymd", time()))) {
            mkdir("/upload/". date("Ymd", time()),0777,true);
        }//新建文件

        if (file_exists("/upload/". date("Ymd", time()) . $_FILES["fileName"]["name"])) {
            unlink("/upload/" . date("Ymd", time()) .'/' .$_FILES["fileName"]["name"]);
        } //删除键文件

        move_uploaded_file($_FILES["fileName"]["tmp_name"],
            "/upload/". date("Ymd", time()) . '/' . $_FILES["fileName"]["name"]); //移动文件
        echo "Stored in: " . "/upload/" . date("Ymd", time()) . '/' . $_FILES["fileName"]["name"]; // 输出文件

    }
}