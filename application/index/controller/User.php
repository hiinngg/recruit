<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Db;

class User extends Controller
{
   protected $tran=['男','女'];

    public function index()
    {
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
    
    
}