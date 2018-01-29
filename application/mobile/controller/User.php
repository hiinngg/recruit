<?php
namespace   app\mobile\controller;


use think\Cookie;
use think\Db;
use app\common\controller\Download;

class User extends Common{
    
    
    public  function  index(){
      
        $userid = Db::name("user")->where("openid",Cookie::get("rec_openid"))->value("userid");
        $res=Db::view("re_user","*")->view("re_resume","*","re_resume.userid=re_user.userid")->where("re_user.userid",$userid)
        ->find();
        if(!$res['truename']||$res['truename']==""){
            $this->assign("none");
        }
        $eval=Db::name("evaluation")->where("userid",$userid)->select();
        
        if(!empty($eval)){
            $this->assign("eval",$eval);
        }
       
   /*      $courselist=Db::view("course_user","*")->view("course","name,type,period,teacher,contact","course.courseid=course_user.courseid")
        ->view("user","*","user.userid=course_user.userid")
        ->where("user.openid",Cookie::get("rec_openid"))
        ->order("course_user.createtime desc")
        ->select(); */
        
        
  /*        $joblist=Db::name("job_user")->where("userid",Session::get("username"))
        ->page($page,$limit)
        ->order("createtime desc")
        ->select(); */
        //$this->assign("courselist",$courselist);
        $this->assign("data",$res); 
       
        return $this->fetch();
    }
    
    public function evalDownload($evalid){
        $download=new Download(Db::name("evaluation")->where("evalid",$evalid)->value("path"));
        $download->download();
    }
    
    public  function jobuser(){
        
        $data=Db::view("job_user","*")->view("user","userid","user.userid=job_user.userid")->view("job","name","job.jobid=job_user.jobid")->where(['user.openid'=>Cookie::get("rec_openid")])->select();
        return $data;
        
        
    }
    public  function courseuser(){
    
        $data=Db::view("course_user","*")->view("user","userid","user.userid=course_user.userid")->view("course","name,teacher,contact","course.courseid=course_user.courseid")->where(['user.openid'=>Cookie::get("rec_openid")])->select();
        return $data;
    
    
    }
    
    public  function  evalapply(){
        
        
        
      $userid = Db::name("user")->where("openid",Cookie::get("rec_openid"))->value("userid");
    
      if(Db::name("user")->where("userid",$userid)->update([
          'eval'=>1,
          'evaltime'=>time()
      ])){
          
          return 1;
      }
        
        
    }
    
    
    
    
    
    public function  editinfo(){
        $post = $this->request->post();
        $data=[
            'truename'=>$post['data']['name'],
            'sex'=>$post['data']['sex'],
            'position'=>$post['data']['position'],
            'graduated'=>$post['data']['graduated'],
            'education'=>$post['data']['edu'],
            'selfevaluation'=>$post['data']['selfevaluation'],
            'experience'=>$post['data']['experience'],
            'birthdate'=>$post['data']['date'],
            'status'=>1
        ];
        if(Db::name("resume")->where("userid",Db::name("user")->where("openid",Cookie::get("rec_openid"))->value("userid"))->update($data)>=0){
        
            return 1;
      }else{
          return "保存失败";
      }
    }
    
    
    
    
    
    
}