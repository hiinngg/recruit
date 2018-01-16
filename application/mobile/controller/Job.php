<?php
namespace  app\mobile\controller;


use think\Db;

class Job  extends  Common{
    
    
    public  function  jobList(){
        
       $this->assign("jobcates",Db::name("jobcate")->select());
       return  $this->fetch();
    }
    public function jobDetail($poid){
        
         $res=Db::view("re_position","*")->view("re_company","position_pics,fullname","re_company.cid=re_position.cid")
                ->where("re_position.poid",$poid)->find();
            $res['position_pics']=json_decode($res['position_pics'],true);
            $res['treatment']=json_decode($res['treatment'],true);
            $this->assign("data",$res);
        
        
        return $this->fetch();
    }
    
    
    
    
}