<?php
namespace app\index\controller;

use think\Db;

class Talent extends Common
{

    public function talent()
    {
        $res1=Db::name("page")->where("column","人才定制")->column("content");
        if(!empty($res1)){
            $this->assign("talent",$res1);
        }
        $res2=Db::name("page")->where("column","团队定制")->column("content");
        if(!empty($res2)){
            $this->assign("team",$res2);
        }
        return $this->fetch();
    }
}