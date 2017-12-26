<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Db;

class User extends Controller
{

    public function index()
    {
        return $this->fetch();
    }
    public function login(){

        $post = $this->request->post();
        if(Db::name("user")->where(['telphone'=>$post['username'],'userpassword'=>md5($post['userpass'])])->find()){
            Session::set("username",$post['username']);
            return 1;
        }else{
            return "用户名或密码错误";
        }
        
    }

    public  function  logout(){
        Session::delete("username");
         return $this->redirect("index/index");

    }
    
    
}