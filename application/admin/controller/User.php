<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 0:35
 */
namespace app\admin\controller;


use think\Db;
use app\common\controller\Download;

class User  extends  Common{

protected  $tran=['男','女'];
    public function UserList($page="", $limit="")
    {
        if ($this->request->isAjax()) {

            if (! isset($count)) {
                $this->count =Db::view("re_user","resumeid as rsid,userid as user_id,telphone,createtime as time")->view("re_resume","*","re_resume.resumeid=re_user.resumeid","LEFT")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res=Db::view("re_user","resumeid as rsid,userid as user_id,telphone,createtime as time")->view("re_resume","*","re_resume.resumeid=re_user.resumeid",'LEFT')
            ->page($page, $limit)
            ->order("time desc")
            ->select();

            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count ,
                'data' => $res
            ];
        }
        return $this->fetch();
    }
    
    public function  addeval($userid=""){
        
        if($this->request->isAjax()){
            $post=$this->request->post();
            
            $data=[
            'userid'=>$post['userid'],
            'path'=>transFile($post['data']['eval']),
            'status'=>1,
            'createtime'=>date("Y-m-d H:i:s"),
            'desc'=>$post['data']['desc'],
            'name'=>$post['data']['name'],
            ];
            if(Db::name("evaluation")->insert($data)==1){
                return 1;
            }
        }
        
        
        return $this->fetch();
    }
    
    public function  evalDownload($evalid){
        
            $download=new Download(Db::name("evaluation")->where("evalid",$evalid)->value("path"));
            $download->download();
      
    }
    
    
    public  function evalbyuse($userid="",$page="",$limit=""){
        
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count = Db::name("evaluation")->where([
                    'userid' =>$userid
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            $res=Db::name("evaluation")->where("userid",$userid)
            ->page($page,$limit)
            ->order("createtime desc")
            ->select();
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        
        return $this->fetch();
        
    }
    public function fileUpload(){
        $file = request()->file('file');
    
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            /*  $datefloder = './temp/'.date('Ymd');
             if (!file_exists($datefloder)) {
             mkdir($datefloder);
             } */
            $info = $file->rule(function(){
                return md5(uniqid());
            })->move("./temp/admin");
            if($info){
                 
                return [
                    'code' => 0,
                    'file' => '/temp/admin/'.$info->getSavename()
                ];
            }
            
        }
    }
    
    public function info($userid){
  
        $data=Db::name("resume")->where("userid",$userid)->find();
        if($data){
            $user=Db::name("user")->where("userid",$userid)->find();
            $this->assign("user",$user);
            $data['sex']=$this->tran[$data['sex']];
            $this->assign("data",$data);
        }
     
        return $this->fetch();
    }



}