<?php 
namespace app\mobile\controller;


use think\Db;

class Index extends Common{
    
    
    public function index(){
        $this->assign("coursedata",Db::name("course")->where("is_show",1)->field("courseid,name,label_img")->select());
        return $this->fetch();
        
    }
    
    
}



