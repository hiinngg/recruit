<?php
namespace app\index\controller;

use think\Db;

class Talent extends Common
{

    public function talent()
    {
        
        $this->assign("data",Db::name("page")->where("column","找人才")->value("content"));
        
        return $this->fetch();
    }
}