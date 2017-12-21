<?php
namespace app\index\controller;

use think\Db;

class Index extends Common
{ 
  
    public function index()
    {
        
        $this->assign("data",Db::name("page")->where("column","首页介绍")->field("title,content")->find());
    
      
        return $this->fetch();
    }
}
