<?php
namespace app\mobile\controller;

use think\Cookie;
use think\Db;
use app\common\controller\Download;
use think\Session;
use Yunpian\Sdk\YunpianClient;

class User extends Common
{

    public function index()
    {
        $userid = Db::name("user")->where("openid", Cookie::get("rec_openId"))->value("userid");
        $res = Db::view("re_user", "*")->view("re_resume", "*", "re_resume.userid=re_user.userid")
            ->where("re_user.userid", $userid)
            ->find();
        if (! $res['truename'] || $res['truename'] == "") {
            $this->assign("none");
        }
        $eval = Db::name("evaluation")->where("userid", $userid)->select();
        
        if (! empty($eval)) {
            $this->assign("eval", $eval);
        }
        
        /*
         * $courselist=Db::view("course_user","*")->view("course","name,type,period,teacher,contact","course.courseid=course_user.courseid")
         * ->view("user","*","user.userid=course_user.userid")
         * ->where("user.openid",Cookie::get("rec_openId"))
         * ->order("course_user.createtime desc")
         * ->select();
         */
        
        /*
         * $joblist=Db::name("job_user")->where("userid",Session::get("username"))
         * ->page($page,$limit)
         * ->order("createtime desc")
         * ->select();
         */
        // $this->assign("courselist",$courselist);
        $this->assign("data", $res);
        
        return $this->fetch();
    }

    public function evalDownload($evalid)
    {
        $download = new Download(Db::name("evaluation")->where("evalid", $evalid)->value("path"));
        $download->download();
    }

    public function jobuser()
    {
        $data = Db::view("job_user", "*")->view("user", "userid", "user.userid=job_user.userid")
            ->view("job", "name", "job.jobid=job_user.jobid")
            ->where([
            'user.openid' => Cookie::get("rec_openId")
        ])
            ->order("job_user.createtime desc")
            ->select();
        return $data;
    }

    public function courseuser()
    {
        $data = Db::view("course_user", "*")->view("user", "userid", "user.userid=course_user.userid")
            ->view("course", "name,teacher,contact", "course.courseid=course_user.courseid")
            ->where([
            'user.openid' => Cookie::get("rec_openId")
        ])
            ->order("course_user.createtime desc")
            ->select();
        return $data;
    }

    public function evalapply()
    {
        $userid = Db::name("user")->where("openid", Cookie::get("rec_openId"))->value("userid");
        
        if (Db::name("user")->where("userid", $userid)->update([
            'eval' => 1,
            'evaltime' => time()
        ])) {
            
            return 1;
        }
    }

    
public function sendsns(){
        $post = $this->request->post();
        $result = $this->validate([
            'telphone' => $post['signtel'],
        ], [
            'telphone' => "require|length:11|unique:user,telphone",
        ],['telphone.length'=>"请输入有效的手机号码",'telphone.unique'=>"手机已经被注册"]);
        if (true !== $result) {
            return $result;
        }
        $clnt =YunpianClient::create(YunPianApiKey);
        $num=createRandNum(6);
  /*       Session::init([
            'expire'=>60
        ]); */
        Session::set("smscode",$num);
       // return $num;
        $param = [YunpianClient::MOBILE => $post['signtel'],YunpianClient::TEXT =>'【遇见offer】感谢您注册小猫招聘，您的验证码是'.$num];
        $r = $clnt->sms()->single_send($param);

        if($r->isSucc()){
           
            //$r->data()
            return 1;
            //return 1;
        }else{
           //todo
        return  "msg:".$r->msg()."code:".$r->code();
        }
    }
    
    //发送短信异常处理
    private function smsdeal($code){
      if($code >= 0){
          return "系统繁忙，请稍后再试";
      }else{
          return "发送失败";
      }
    }
    
   public function userreg(){

       $post = $this->request->post();
       $result = $this->validate([
           'telphone' => $post['signtel'], 
           'signpwd' =>$post['signpwd'],
           'signpwd2'=>$post['signpwd2']
       ], [
           'telphone' => "length:11|unique:user,telphone",
           'signpwd' => "require|confirm:signpwd2",
           'signpwd2' => "require|confirm:signpwd",
       ],[
           'telphone.length'=>"请输入有效的手机号码",
           'telphone.unique'=>"手机已经被注册",
           'signpwd.confirm'=>'密码两次输入不一致',
           'signpwd2.confirm'=>"密码两次输入不一致",
           'signpwd.require'=>'密码不能为空',
           'signpwd2.require'=>'密码不能为空'
           
       ]);
       if (true !== $result) {
           return [
               'code' => 0,
               'msg'=>$result
           ];
       }
        //验证短信验证码
       if(!Session::has("smscode")){
           return [
               'code' => 0,
               'msg'=>"短信验证码错误"
           ];
       }
       
       
       if($post['code']!=Session::get("smscode")){
           return [
               'code' => 0,
               'msg'=>"短信验证码错误"
           ];
       } 
       
       
       //验证成功
       $data = [
           'telphone' => $post['signtel'],
           'userpassword'=>md5($post['signpwd']),
           'status' => 1,
           'createtime' => date("Y-m-d H:i:s")
       ];
       if (Db::name("user")->insert($data) == 1) {
           $userid=Db::name('user')->getLastInsID();
           $this->userupdate($userid);
          return 1;
       }
   } 
    
   
 
    
    
    public function userbind()
    {
        $post = $this->request->post();
        $result = $this->validate([
            'telphone' => $post['logtel'],
            'pwd' => $post['pwd']
        ], [
            'telphone' => "require|length:11",
            'pwd' => 'require'
        ], [
            'telphone.length' => "请输入有效的手机号码"
        ]);
        if (true !== $result) {
            return $result;
        }
        $userid = Db::name("user")->where([
            'telphone' => $post['logtel'],
            'userpassword' =>md5($post['pwd'])
        ])->value('userid');
        if ($userid) {
            return $this->userupdate($userid);
        } else {
            return "用户名或密码不正确";
        }
    }

    public function userupdate($userid)
    {
        if (! Session::has('muser')) {
            return 0;
        }
        $muser = Session::pull("muser");
        
        $data = [
            'openid' => $muser['openid']
        ];
        if (Db::name("user")->where('userid', $userid)->update($data)) {
            Cookie::forever("rec_openId",  $muser['openid']);
            if (Db::name("user")->where('userid', $userid)->value("resumeid") == 0) {
                $this->setResume($userid, $muser['imgurl']);
            }
            
            return 1;
        } else
            $this->error();
    }

    public function setResume($userid, $url)
    {
    
            $getuserinfo = new \Getuserinfo(APPID, APPSECRET);
        
        $logo_url = "/image/wx_headimg/" . md5(uniqid()) . ".jpg";
        if ($getuserinfo->getImg($url, "." . $logo_url)) {
            $image = \think\Image::open("." . $logo_url);
            $image->thumb(300, 300)->save("." . $logo_url);
        }
        $resume = [
            'userid' => $userid,
            'avastar' => $logo_url,
            'createtime'=>date("Y-m-d H:i:s")
        ];
        if (Db::name("resume")->insert($resume)) {
            Db::name("user")->where("userid", $userid)->update([
                'resumeid' => Db::name('resume')->getLastInsID()
            ]);
        }
    }

    public function  editprofile(){
        $userid = Db::name("user")->where("openid", Cookie::get("rec_openId"))->value("userid");
        $res = Db::view("re_user", "*")->view("re_resume", "*", "re_resume.userid=re_user.userid")
        ->where("re_user.userid", $userid)
        ->find();
        if (! $res['truename'] || $res['truename'] == "") {
            $this->assign("none");
        }  
        $this->assign("data", $res);
        
        return $this->fetch();
    }
    
    
    public function editinfo()
    {
        $post = $this->request->post();
        $data = [
            'truename' => $post['data']['name'],
            'sex' => $post['data']['sex'],
            'position' => $post['data']['position'],
            'graduated' => $post['data']['graduated'],
            'education' => $post['data']['edu'],
            'selfevaluation' => $post['data']['selfevaluation'],
            'experience' => $post['data']['experience'],
            'birthdate' => $post['data']['date'],
            'status' => 1
        ];
        if (Db::name("resume")->where("userid", Db::name("user")->where("openid", Cookie::get("rec_openId"))
            ->value("userid"))
            ->update($data) >= 0) {
            
                
                
                
            return 1;
        } else {
            return "保存失败";
        }
    }
}