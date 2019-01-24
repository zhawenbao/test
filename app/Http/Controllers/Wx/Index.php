<?php
/**
 * Created by PhpStorm.
 * User: zhawb1
 * Date: 2018/12/7
 * Time: 14:15
 */
namespace App\Http\Controllers\Wx;

use App\Http\Controllers\Controller;


class Index extends Controller
{

    const TOKEN = 'GreatMe'; // Token
    protected $appid = 'wx62c2f1f5d67a793b';  // 开发者ID
    protected $appsecret = '94fcb6241c4689ce75fb3bd83ed0319f'; // 开发者秘钥
    protected $postObj;
    /**
     * [__construct 构造方法]
     */
    public function __construct()
    {
        // 处理微信post到开发url上的xml数据包
        $postStr = file_get_contents("php://input");
//        file_put_contents('postStr.xml', $postStr);
        libxml_disable_entity_loader(true);
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $this->postObj = $postObj;
    }
    /**
     * [index]
     * @return [type] [description]
     */
    public function index()
    {
        // 校验服务器
         $echoStr = $_GET["echostr"];
         if($this->checkSignature()){
         	echo $echoStr;
         }
//        $this->reply();
    }
    /**
     * [checkSignature 校验微信签名]
     * @return [type] [description]
     */
    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = self::TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    /**
     * [reply 回复消息]
     * @return [type] [description]
     */
    public function reply()
    {
        $postObj =  $this->postObj;
        switch ($postObj->MsgType) {
            // 事件消息
            case 'event':
                $resultStr = $this->event();
                break;
            // 文本消息
            case 'text':
                $resultStr = $this->keyword();
                break;
            // 图片消息
            case 'image':
                break;
            // 语音消息
            case 'voice':
                break;
            // 视频消息
            case 'video':
                break;
            // 小视频消息
            case 'shortvideo':
                break;
            // 地址消息
            case 'location':
                break;
            // 连接消息
            case 'link':
                break;
            default:
                $resultStr = $this->responseText('你发的毛啊?');
                break;
        }
        file_put_contents('resultStr.xml', $resultStr);
        echo $resultStr;
    }
    /**
     * [keyword 关键词回复]
     * @return [type] [description]
     */
    public function keyword()
    {
        $postObj = $this->postObj;
        // 获取接受消息文本内容
        $keyword = $postObj->Content;
        // 通过 $keyword 从数据库获取相关数据
        // 根据需求回复对应 类型消息
        // 测试
        if($keyword == '二次元'){
            $resultStr = $this->responseImage('./timg.jpg');
        }
        return $resultStr;
    }
    /**
     * [event 事件列表]
     * @return [type] [description]
     */
    protected function event()
    {
        $postObj = $this->postObj;
        switch ($postObj->Event) {
            // 订阅事件
            case 'subscribe':
                // 获取用户基本信息
                $this->user_info();
                $resultStr = $this->responseText('Welcome Thinksite~!~');
                break;
            // 取消订阅事件
            case 'unsubscribe':
                // 取消关注之后需要实现一些业务逻辑: 数据库操作-->把user表中is_guanzhu=0
                file_put_contents($postObj->fromUsername.'.txt', 'md');
                break;
            // 菜单事件
            case 'CLICK':
                // 点击菜单事件推送
                $resultStr = $this->menuKey($postObj->EventKey);
                break;
            default:
                // code...
                break;
        }
        return $resultStr;
    }
    public function user_info()
    {
        $postObj = $this->postObj;
        $openid = $postObj->FromUserName; // openid
        $access_token = $this->getAccessToken();
        $api = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";
        $rs = $this->httpRequest($api);
        $data = json_decode($rs, 1);

        $pdo = new \PDO('mysql:host=localhost;dbname=thinksite', 'root', 'root');
        $pdo->exec('set names urf8');

        $sql = "INSERT INTO users (user_id,openid,nickname,sex,city,headimgurl,subscribe) VALUES(null,'{$data['openid']}','{$data['nickname']}',{$data['sex']},'{$data['city']}','{$data['headimgurl']}',1)";
        $pdo->exec($sql);
    }
    public function menuKey($key)
    {

    }
    /**
     * [autoMenu 自定义菜单]
     * @param  array  $menuArray [菜单数据]
     * @return [type]            [description]
     */
    public function autoMenu($menuArray=[])
    {
        $access_token = $this->getAccessToken();
        $api = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $menuData = '
        {
            "button":
            [
                {    
                    "type":"click",
                    "name":"今日歌曲",
                    "key":"music"
                },
                {
                    "name":"新闻",
                    "sub_button":
                    [
                        {    
                            "type":"view",
                            "name":"搜索",
                            "url":"http://www.soso.com/"
                        },
                        {
                            "type":"view",
                            "name":"百度一下",
                            "url": "https://www.baidu.com"
                        },
                        {
                            "type":"click",
                            "name":"赞一下我们",
                            "key":"praise"
                        }
                    ]
                },
                {    
                    "type":"click",
                    "name":"点我惊喜",
                    "key":"surprise"
                }
            ]
        }';
        $rs = $this->httpRequest($api, $menuData);
        echo $rs;
    }
    /**
     * [responseText 回复文本消息]
     * @param  [string] $content      [文本消息内容]
     * @return [string]               [文本消息的xml]
     */
    public function responseText($content)
    {
        $postObj = $this->postObj;
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[text]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                    </xml>";
        $resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $content);
        return $resultStr;
    }
    /**
     * [responseImage 回复图片消息]
     * @param  [string] $media_id     [图片的mediaid]
     * @return [stirng]               [图片消息的xml]
     * $this->responseImage('./file');
     */
    public function responseImage($file)
    {
        $postObj = $this->postObj;
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[image]]></MsgType>
                        <Image>
                            <MediaId><![CDATA[%s]]></MediaId>
                        </Image>
                    </xml>";
        $media_id = $this->getMediaId($file);
        $resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $media_id);
        return $resultStr;
    }
    /**
     * [responseVideo 回复视频消息]
     * @param  [type] $media_id     [description]
     * @param  [type] $title        [description]
     * @param  [type] $description  [description]
     * @return [type]               [description]
     */
    public function responseVideo($videoFile, $title, $description)
    {
        $postObj = $this->postObj;
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[video]]></MsgType>
                        <Video>
                            <MediaId><![CDATA[%s]]></MediaId>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                        </Video> 
                    </xml>";
        $media_id = $this->getMediaId($videoFile);
        $resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $media_id, $title, $description);
        return $resultStr;
    }
    /**
     * [responseMusic 回复音乐消息]
     * @param  [type] $title          [description]
     * @param  [type] $description    [description]
     * @param  [type] $musicUrl      [description]
     * @param  [type] $hqMusicUrl      [description]
     * @param  [type] $thumbFile [description]
     * @return [type]                 [description]
     */
    public function responseMusic($title, $description, $musicUrl, $hqMusicUrl, $thumbFile)
    {
        $postObj = $this->postObj;
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[music]]></MsgType>
                        <Music>
                            <Title><![CDATA[%s]]></Title>
                            <Description><![CDATA[%s]]></Description>
                            <MusicUrl><![CDATA[%s]]></MusicUrl>
                            <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                            <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                        </Music>
                    </xml>";
        $thumb_media_id = $this->getMediaId($thumbFile);
        $resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), $title, $description, $musicUrl, $hqMusicUrl, $thumb_media_id);
        return $resultStr;
    }
    /**
     * [responseImgArticle 回复图文消息]
     * @param  [Array] $data        [图文数据]
     * @return [type]               [description]
     */
    public function responseImgArticle($articles)
    {
        $postObj = $this->postObj;
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[news]]></MsgType>
                        <ArticleCount>%s</ArticleCount>
                        <Articles>";
        foreach ($articles as $value) {
            $textTpl .= "<item>
                                <Title><![CDATA[{$value['title']}]]></Title> 
                                <Description><![CDATA[{$value['description']}]]></Description>
                                <PicUrl><![CDATA[{$value['picurl']}]]></PicUrl>
                                <Url><![CDATA[{$value['url']}]]></Url>
                            </item>";
        }
        $textTpl .= "</Articles>
                    </xml>";
        $resultStr = sprintf($textTpl, $postObj->FromUserName, $postObj->ToUserName, time(), count($articles));
        return $resultStr;
    }

    /**
     * [getMediaId 素材管理(多媒体文件上传)]
     * @param  [type] $file [description]
     * @param  string $type [description]
     * @return [type]       [description]
     */
    protected function getMediaId($file, $type='image'){
        $access_token = $this->getAccessToken();
        $params = [
            'access_token'  => $access_token,
            'type'          => $type
        ];
        $api = "https://api.weixin.qq.com/cgi-bin/media/upload?".http_build_query($params);
        $file = realpath($file);
        // 注意PHP版本
        if(version_compare(PHP_VERSION, '5.5', '<')){
            $fileInfo = [
                'meida' => "@".$file
            ];
        }else{
            $fileInfo = [
                'meida' => new \CURLFile($file)
            ];
        }
        $rs = $this->httpRequest($api, $fileInfo);
        $data = json_decode($rs, 1);
        if(isset($data['media_id'])){
            return $data['media_id'];
        }else{
            return false;
        }
    }
    /**
     * [access_token 获取AccessToken]
     * @return [string] [Access_token]
     */
    protected function getAccessToken()
    {
        $appid = $this->appid;
        $appsecret = $this->appsecret;
        $api = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
        $rs = $this->httpRequest($api);
        $data = json_decode($rs, 1);
        return $data['access_token'];
    }
    /**
     * [httpRequest CURL发送http/https请求]
     * @param  [string] $url      [请求url]
     * @param  array    $postData [post请求的发送的数据]
     * @return [string]           [请求返回的数据]
     */
    protected function httpRequest($url, $postData=[])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // post 请求
        if(!empty($postData)){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        //curl注意事项，如果发送的请求是https，必须要禁止服务器端校检SSL证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 设置http请求头信息
        $header = ['Accept-Charset: utf-8'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // 设置请求的结果以字符串的形式返回
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $rs = curl_exec($ch);
        curl_close($ch);
        return $rs;
    }
}
$wx = new Index;
$wx->index();
// $wx->autoMenu(); // 这个是主动接口，需要手动调用