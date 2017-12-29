<?php
namespace app\index\controller;

use think\Db;

class Index extends Common
{ 
  
    public function index()
    {  $this->assign("data",Db::name("page")->where("column","首页介绍")->field("title,content")->find());
       $this->assign("coursedata",Db::name("course")->where("is_show",1)->field("courseid,name,label_img,price,desc")->select());
       $this->assign("companydata",Db::name("company")->where("status",1)->field("cid,avastar")->select());
      
        return $this->fetch();
    }
}
