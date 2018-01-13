<?php 
namespace app\mobile\controller;


use think\Db;

class Index extends Common{
    
    
    public function index(){
        $this->assign("data",Db::name("page")->where("title","首页介绍")->value("content"));
        $this->assign("coursedata",Db::name("course")->where("is_show",1)->field("courseid,name,label_img,price,desc,pageview")->select());
        $this->assign("companydata",Db::name("company")->where("status",1)->field("cid,avastar")->select());
    
        return $this->fetch();
        
    }
    
    
}



