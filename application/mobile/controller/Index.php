<?php 
namespace app\mobile\controller;


use think\Db;

class Index extends Common{
    
    
    public function index(){
        $this->assign("data",Db::name("page")->where("title","首页介绍")->value("content"));
        $this->assign("coursedata",Db::name("course")->where("is_show",1)->field("courseid,name,label_img,price,desc,pageview")->order("is_top,createtime desc")->select());
        $this->assign("companydata",Db::name("company")->where("status",1)->where("avastar",'neq',"")->field("cid,avastar")->select());
        $res=Db::name("carousel")->where("name","首页")->value("path");
        $this->assign("carousel",json_decode($res,true));
        return $this->fetch();
        
    }
    
    public function mobiledetail($postid){
      
        $content=Db::name("post")->where("postid",$postid)->field("title,content")->find();
        $this->assign("content",$content);
        return $this->fetch();
    }
    
    
    
}



