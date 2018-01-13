<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Db;
use app\common\controller\Download;
class User extends Controller
{
   protected $tran=['男','女'];

    public function index()
    {
        if(!Session::has("username")){
            return $this->redirect("index/index");
        }
        return $this->fetch();
    }
    public function login(){

        $post = $this->request->post();
        $userid=Db::name("user")->where(['telphone'=>$post['username'],'userpassword'=>md5($post['userpass'])])->value("userid");
        if($userid&&$userid!=""){
            Session::set("username",$userid);
            return 1;
        }else{
            return "用户名或密码错误";
        }
    }
    public function info(){

        
      $data=Db::name("resume")->where("userid",Session::get("username"))->find();
      if($data){
          $user=Db::name("user")->where("userid",Session::get("username"))->find();
          $this->assign("user",$user);
          $data['sex']=$this->tran[$data['sex']];
          $this->assign("data",$data);
      }
        return $this->fetch();
    }
    public  function  logout(){
        Session::delete("username");
         return $this->redirect("index/index");

    }
    
    
    public function  evalDownload($evalid){
    
        $download=new Download(Db::name("evaluation")->where("evalid",$evalid)->value("path"));
        $download->download();
    
    }
    
   public function myCourseList($page = "", $limit = "")
    {
        if ($this->request->isAjax()) {
            
            if (! isset($count)) {
                $this->count = Db::name("course_user")->where([
                    'userid' =>Session::get("username")
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
        $res=Db::view("course_user","*")->view("course","name,type,period,teacher,contact","course.courseid=course_user.courseid")->where("course_user.userid",Session::get("username"))
            ->page($page,$limit)
            ->order("course_user.createtime desc")
            ->select();      
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }
    
    public function myJobList($page = "", $limit = "")
    {
        if ($this->request->isAjax()) {
    
            if (! isset($count)) {
                $this->count = Db::name("job_user")->where([
                    'userid' =>Session::get("username")
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
    
            $res=Db::name("job_user")->where("userid",Session::get("username"))
            ->page($page,$limit)
            ->order("createtime desc")
            ->select();
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }
    
    public  function mySet(){
        return $this->fetch();
    }
    
    public function changePwd(){
        $post=$this->request->post();
        if(!Db::name("user")->where(['userid'=>Session::get("username"),'userpassword'=>md5($post['data']['oldpwd'])])->find()){
            return "原密码输入错误";
        }
        if(Db::name("user")->where("userid",Session::get("username"))->update(['userpassword'=>md5($post['data']['pwd'])])>=0){
            Session::delete("username");
            return 1;
        }else{
            return "更改失败";
        }
    }
    
    
    public function myEvaluationList($page = "", $limit = ""){
        
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count = Db::name("evaluation")->where([
                    'userid' =>Session::get("username")
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            $res=Db::name("evaluation")->where("userid",Session::get("username"))
            ->page($page,$limit)
            ->order("createtime desc")
            ->select();
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
        
    }
    
   public function imgUpload()
    {
        $file = request()->file('image');
        if ($file) {
            $info = $file->rule(function(){
                
                return md5(uniqid());
                
            })->move(ROOT_PATH . 'public' . DS . 'image'.DS.'user');
            if ($info) {
                
                Db::name("resume")->where('userid',Session::get("username"))->update(['avastar'=>'/image/user/'.$info->getSaveName()]);
                
                return [
                    'code' => 0,
                    'src' =>'/image/user/'.$info->getSaveName()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
    
   
    
    
}