<?php
namespace app\companyadmin\controller;

use think\Controller;
use think\Db;

class Cprofile extends Common
{

    public function getCprofile()
    {
        Db::name("cprofile")->where("cid", $this->companyid)->find();
    }

    public function editCprofile()
    {
        $res = Db::name("company")->where("cid", $this->companyid)->find();
        if (isset($res['pics'])) {
            
            $res['pics'] = json_decode($res['pics']);
        }
        $this->assign("data", $res);
        $this->view->engine->layout("../../index/view/layout");
        return $this->fetch("index@register/companyreg");
    }
}