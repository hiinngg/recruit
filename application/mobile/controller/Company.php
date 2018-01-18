<?php
namespace app\mobile\controller;

use think\Controller;
use think\Db;
use think\Session;

class Company extends Controller
{

    public function login()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $res = Db::name("company")->where([
                'name' => $post['username'],
                'password' => md5($post['userpass'])
            ])->value("cid");
            if ($res) {
                Session::set("cid", $res);
                return 1;
            } else {
                return "用户不存在或者密码错误";
            }
        }
        
        return $this->fetch();
    }

    public function reg()
    {
        return $this->fetch();
    }
}