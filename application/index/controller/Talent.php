<?php
namespace app\index\controller;

use think\Db;

class Talent extends Common
{

    public function talent()
    {
        $res1=Db::name("page")->where("title","人才定制")->value("content");
        if(!empty($res1)){
            $this->assign("talent",$res1);
        }
        $res2=Db::name("page")->where("title","团队定制")->value("content");
        if(!empty($res2)){
            $this->assign("team",$res2);
        }
        return $this->fetch();
    }
}