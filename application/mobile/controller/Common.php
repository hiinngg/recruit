<?php
namespace  app\mobile\controller;


use think\Controller;
use think\Cookie;
use think\Db;

class Common  extends Controller{
    
    

    public function _initialize()
    {
      /*  // 判断cookie值
        if (!Cookie::has("rec_openid")) {
            //             Cookie::forever("rec_openid", 'oDCE6wb4LsMznXwcxM1Uj2WzljOI');//
            //             return;
            $this->gettokenid();
        } */
    
        //  $cus = Db::table('customer')->where('openid', "oDCE6wYQTw6YbagLtsuUX5kYytVc")->find();
    
    
    }
    
    public function gettokenid()
    {
        // 调起微信授权
        $getuserinfo = new \Getuserinfo(APPID, APPSECRET);
        $code = $this->request->get("code");
        if ($code) {
            /* $userinfo = $this->getuserinfo->getuser($this->getuserinfo->getaccesstoken($code), $openid); */
            $res = $getuserinfo->gettokenandid($code);
            $this->init($res);
            return;
        }
    
        $appid = $getuserinfo->appId;
        $redirect = urlencode(HTTP . DOMAIN . "/mobile/common/gettokenid");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . $redirect . "&response_type=code&scope=snsapi_userinfo&state=0#wechat_redirect";
        $this->redirect($url);
    }
    
    public function init($res)
    {
        $res = json_decode($res);
        if (!isset($res->openid)) {
            exit();
        }
        Cookie::forever("rec_openid", $res->openid); // 设置永久cookie
        if (!Db::name("user")->where("openid", $res->openid)->find()) {
            // =>需要获取详细信息并保存数据库
            $getuserinfo = new \Getuserinfo(APPID,APPSECRET);
            $userinfo = $getuserinfo->getuser($res->access_token, $res->openid);
            $userinfo = json_decode($userinfo);
            $userinfo->headimgurl = str_replace("\\", "", $userinfo->headimgurl);
            $logo_url = "/image/wx_headimg/" . md5(uniqid()) . ".jpg";
            if ($getuserinfo->getImg($userinfo->headimgurl, "." . $logo_url)) {
                $image = \think\Image::open("." . $logo_url);
                $image->thumb(300, 300)->save("." . $logo_url);
            }
           $data=[
               'openid'=>$res->openid,
               'status'=>1,
               'createtime'=>date("Y-m-d H:i:s")    
           ];
            if (Db::name("user")->insert($data)) {
                 $this->setResume(Db::name('user')->getLastInsID(), $logo_url);
                $this->redirect('/mobile/index');
            } else
                $this->error();
        } else
            $this->redirect('/mobile/index');
    }
    
    
    public  function setResume($userid,$logo_url){
        $resume=[
            'userid'=>$userid,
            'avastar'=>$logo_url,
            'status'=>1,
            'createtime'=>date("Y-m-d H:i:s")
        
        ];
        if(Db::name("resume")->insert($resume)){
            Db::name("user")->where("userid",$userid)->update(['resumeid'=>Db::name('resume')->getLastInsID()]);
        }
    }
    
    
    public function getjsapi()
    {
        $jssdk = new \jssdk(APPID, APPSECRET);
        $arr = $jssdk->getSignPackage();
        $this->assign('arr', $arr);
    }
    
}