<?php
namespace  app\index\controller;



use think\Controller;
use app\mobile\controller\Index;

class Post extends Controller{
    
    public  function postdetail($postid){
     
        
    
        $detect = new \Mobile_Detect();
        if ($detect->isMobile()) {
           return $this->redirect("mobile/index/mobiledetail",['postid'=>$postid]);
        }else{
          
             return $this->redirect("index/index/pcdetail",['postid'=>$postid]);
        }
       
        
    }

    

    
    
}