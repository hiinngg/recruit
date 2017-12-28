<?php
namespace  app\mobile\controller;


use think\Db;

class Position  extends  Common{
    
    
    public  function  jobList(){
        
        $res=Db::name("position")->field("poid,name,treatment,salary_min,salary_max,is_subsidy")
         ->where("re_position.is_show",1)->select();
        $subsidy=[];
         foreach ($res as $k=>$val){
        if($val['is_subsidy']==1){
            array_push($subsidy, $val);
        }
         }
         $this->assign("position",$res);
         $this->assign("subsidy",$subsidy);
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