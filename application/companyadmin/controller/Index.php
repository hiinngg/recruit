<?php
namespace app\companyadmin\controller;

use think\Controller;
use think\Db;
use think\Session;

/**
 *
 * @author Administrator
 *         后台首页
 */
class Index extends Controller
{

    public function index(Common $common)
    {
        $this->assign("data", Db::name("company")->where("cid", $common->companyid)
            ->field("avastar,name")->find());
        
        return $this->fetch();
    }

    public function profile(Common $common)
    {
        $res = Db::name("company")->where("cid", $common->companyid)->find();
        if (isset($res['pics'])) {
            
            $res['pics'] = json_decode($res['pics'],true);
        }
        $this->assign("data", $res);
        return $this->fetch();
    }

    public function login()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $res = Db::name("company")->where([
                'name' => $post['data']['name'],
                'password' => md5($post['data']['password'])
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

    public function logout()
    {
        Session::delete("cid");
        return $this->fetch("login");
    }
}