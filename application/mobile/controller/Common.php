<?php
namespace  app\mobile\controller;


use think\Controller;
use think\Cookie;
use think\Db;
use think\Log;
use think\Session;

class Common  extends Controller{
    
    

    public function _initialize()
    {
       // 判断cookie值
      
        if(Cookie::has("rec_openId")){
            $query = Db::name("user")->where("openid", Cookie::get("rec_openId"))->value("telphone");
            if (empty($query)) {
                Cookie::delete("rec_openId");
            }else{
                return;
            }
        }
        if(Session::has("muser.openid")){
            $query = Db::name("user")->where("openid", Session::get("muser.openid"))->value("telphone");
            if (!empty($query)) {
                Session::delete("muser");
                return;
            }
        }
        
        
         if (!Session::has("muser.openid")&&!Cookie::has("rec_openId")) {
             
            //             Cookie::forever("rec_openid", 'oDCE6wb4LsMznXwcxM1Uj2WzljOI');//
            //             return;
            $this->gettokenid();
         
        } 
       
    
        //  $cus = Db::table('customer')->where('openid', "oDCE6wYQTw6YbagLtsuUX5kYytVc")->find();
    
    
    }
    
    public function gettokenid()
    {
        // 调起微信授权
        $getuserinfo = new \Getuserinfo(APPID, APPSECRET);
        $code = $this->request->get("code");
        if ($code&&$code!="") {
            /* $userinfo = $this->getuserinfo->getuser($this->getuserinfo->getaccesstoken($code), $openid); */
            $res = $getuserinfo->gettokenandid($code);
     
            $this->init($res);
            return ;
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
          //  $this->gettokenid();
          var_dump($res);
         exit();
        }
        //Cookie::forever("rec_openId", $res->openid); // 设置永久cookie

        $query=Db::name("user")->where("openid", $res->openid)->value("telphone");
        if (empty($query)) {
            //先把信息返回给前台
       
             $getuserinfo = new \Getuserinfo(APPID,APPSECRET);
            $userinfo = $getuserinfo->getuser($res->access_token, $res->openid);
            $userinfo = json_decode($userinfo);
            $userinfo->headimgurl = str_replace("\\", "", $userinfo->headimgurl);
            
            //暂时先存储在session
            Session::set('muser.openid',$res->openid);
            Session::set("muser.imgurl",$userinfo->headimgurl);
            $this->redirect('/mobile/index');
            
  
        } else{
            Cookie::forever("rec_openId", $res->openid);
            $this->redirect('/mobile/index');
        }
           
    }
    
    
    public  function setResume($userid,$logo_url){
        $resume=[
            'userid'=>$userid,
            'avastar'=>$logo_url,
            'status'=>0,
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