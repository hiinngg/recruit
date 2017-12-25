<?php
namespace app\index\controller;

use think\Controller;
use think\Session;

class User extends Controller
{

    public function index()
    {
        return $this->fetch();
    }
    public function login(){


    }

    public  function  logout(){
        Session::delete("username");
         return $this->redirect("index/index");

    }
    
    
}