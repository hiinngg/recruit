<?php
namespace  app\mobile\controller;


use think\Db;
use think\Cookie;

class Job  extends  Common{
    
    
    public  function  jobList(){
        
       $this->assign("jobcates",Db::name("jobcate")->select());
       return  $this->fetch();
    }
    public function catedetail($cateid,$page=1){
        $job = Db::view("re_job", "*")->view("re_jobcate", [
            'name' => "catename"
        ], "re_jobcate.cateid=re_job.cate")
            ->where(['re_job.status'=>1,'re_job.cate'=>$cateid])
            ->page($page,4)
            ->select();
        /*   $cate = [];
         $data = [];
         foreach ($course as $val) {
         $data[$val['cateid']][] = $val;

         $cate[$val['cateid']] = $val['catename'];
         }  */
        return  $job;
    }


    public function jobDetail($poid){
        
         $res=Db::view("re_position","*")->view("re_company","position_pics,fullname","re_company.cid=re_position.cid")
                ->where("re_position.poid",$poid)->find();
            $res['position_pics']=json_decode($res['position_pics'],true);
            $res['treatment']=json_decode($res['treatment'],true);
            $this->assign("data",$res);
        
        
        return $this->fetch();
    }
    
    public function apply(){

        
            $userid=Db::name("user")->where("openid",Cookie::get("rec_openid"))->value("userid");
            $post=$this->request->post();
            if(Db::name('job_user')
                ->where(['userid'=>$userid,'jobid'=>$post['jobid']])->find()){
                    return "你已申请该工作";
            }
            $data=[
                'userid'=>$userid,
                'jobid'=>$post['jobid'],
                'status'=>0,
                'createtime'=>date("Y-m-d H:i:s"),
                'feedback'=>""
            ];
            if(Db::name("job_user")->insert($data)==1){
                return 1;
            }else{
                return "申请失败";
            }
        
        
        
        
        
    }
    
    
    
    
}