<?php
namespace  app\index\controller;


use think\Db;
use think\Session;

class Job extends Common{
    
    
    public function  jobList(){


/*         $res=Db::view("re_position","poid,name")->view("re_company","position_pics","re_company.cid=re_position.cid")
            ->where("re_position.is_show",1)->select();

        foreach ($res as $k=>$val){

         $arr=json_decode($val['position_pics'],true);
         $res[$k]['position_pics']=$arr[0];

        }
        $this->assign("position",$res); */
        $res=Db::name("job")->where('status',1)->select();
        $this->assign("data",$res);
        $this->assign("companydata",Db::name("company")->where("status",1)->where("avastar",'neq',"")->field("cid,avastar")->select()); 
        
       
        
        return $this->fetch();
        
    }
    
    public  function apply(){
        if(!Session::has("username")){
            return "请先登录";
        }
        $post=$this->request->post();
        if(Db::name('job_user')
            ->where(['userid'=>Session::get("username"),'jobid'=>$post['jobid']])->find()){
                return "你已申请该工作";
        }
        $data=[
            'userid'=>Session::get("username"),
            'jobid'=>$post['jobid'],
            'status'=>0,
            'createtime'=>date("Y-m-d H:i:s")
        ];
        if(Db::name("job_user")->insert($data)==1){
            return 1;
        }else{
            return "申请失败";
        }
        
        
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