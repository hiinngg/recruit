<?php
namespace  app\index\controller;


use think\Db;

class Job extends Common{
    
    
    public function  jobList(){


        $res=Db::view("re_position","poid,name")->view("re_company","position_pics","re_company.cid=re_position.cid")
            ->where("re_position.is_show",1)->select();

        foreach ($res as $k=>$val){

         $arr=json_decode($val['position_pics'],true);
         $res[$k]['position_pics']=$arr[0];

        }
        $this->assign("position",$res);
        $this->assign("companydata",Db::name("company")->where("status",1)->field("cid,avastar")->select());
        return $this->fetch();
        
    }

    public  function   jobDetail($poid=""){
        if($poid!=""){
            $res=Db::view("re_position","*")->view("re_company","position_pics,fullname","re_company.cid=re_position.cid")
                ->where("re_position.poid",$poid)->find();
            $res['position_pics']=json_decode($res['position_pics'],true);
            $res['treatment']=json_decode($res['treatment'],true);
            $this->assign("data",$res);

    }
       

        return $this->fetch();
    }
    
}