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

class User extends Common
{

    protected $tran = [
        '男',
        '女'
    ];

    public function UserList($page = "", $limit = "",$tel="")
    {
        if ($this->request->isAjax()) {
            
            if (! isset($count)) {
                $this->count = Db::view("re_user", "resumeid as rsid,userid as user_id,telphone,createtime as time")->view("re_resume", "*", "re_resume.resumeid=re_user.resumeid", "LEFT")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res = Db::view("re_user", "resumeid as rsid,userid as user_id,telphone,createtime as time ,eval ")->view("re_resume", "*", "re_resume.resumeid=re_user.resumeid", 'LEFT')
                ->page($page, $limit)
                ->order("time desc")
                ->where("telphone",'like',"%".$tel."%")
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
    
    public  function getdetail($userid){
        
        $res = Db::view("re_user", "resumeid as rsid,userid as user_id,telphone,createtime as time")->view("re_resume", "*", "re_resume.resumeid=re_user.resumeid", 'LEFT')
         ->where("re_user.userid",$userid)
         ->find();
        return $res;
        
        
    }
    

    

    public function addeval($userid = "")
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            
            $data = [
                'userid' => $post['userid'],
                'path' => transFile($post['data']['eval']),
                'status' => 1,
                'createtime' => date("Y-m-d H:i:s"),
                'desc' => $post['data']['desc'],
                'name' => $post['data']['name']
            ];
            if (Db::name("evaluation")->insert($data) == 1) {
                return 1;
            }
        }
        
        return $this->fetch();
    }
    
    public function  editcfeedback(){
        
        
    }
    

    public function jobuser($page="",$limit="",$userid="")
    {
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count = Db::view("job_user")->view("job",['name'=>'jname'],"job.jobid=job_user.jobid")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            if($userid!=""){
                $res =  Db::view("job_user")->view("job",['name'=>'jname'],"job.jobid=job_user.jobid")
                ->page($page, $limit)
                ->where("job_user.userid",$userid)
                ->order("createtime desc")
                ->select();
                
            }else{
                $res =  Db::view("job_user")->view("job",['name'=>'jname'],"job.jobid=job_user.jobid")
                ->page($page, $limit)
                ->order("createtime desc")
                ->select();
            }
            
          
        
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        
        return $this->fetch();
    }

    public function courseuser($page="",$limit="",$userid="")
    {
        
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count =Db::view("course_user")->view("course",['name'=>'cname'],"course.courseid=course_user.courseid")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            
            if($userid!=""){
                
                $res = Db::view("course_user")->view("course",['name'=>'cname'],"course.courseid=course_user.courseid")
                ->page($page, $limit)
                ->where("course_user.userid",$userid)
                ->order("createtime desc")
                ->select();
                
            }else{
                $res = Db::view("course_user")->view("course",['name'=>'cname'],"course.courseid=course_user.courseid")
                ->page($page, $limit)
                ->order("createtime desc")
                ->select();
                
            }
          
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        
        return $this->fetch();
    }
 
    
    public function evaluser($page="",$limit="",$userid=""){
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count =  Db::name("user")->where("evaltime",'neq',"")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            if($userid!=""){
                $res = Db::name("user")->where("evaltime",'neq',"")
                ->page($page, $limit)
                ->where("userid",$userid)
                ->order("evaltime desc")
                ->select();
            }else{
                   $res = Db::name("user")->where("evaltime",'neq',"")
                ->page($page, $limit) 
                ->order("evaltime desc")
                ->select();
            }
        
             
        
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }
    
    

    public function pouser($page="",$limit="",$userid="")
    {
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count = Db::view("position_user")->view("position",['name'=>'poname'],"position.poid=position_user.poid")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            if($userid!=""){
                $res = Db::view("position_user")->view("position",['name'=>'poname'],"position.poid=position_user.poid")
                ->page($page, $limit)
                ->where("position_user.userid",$userid)
                ->order("createtime desc")
                ->select();
            }else{
                $res = Db::view("position_user")->view("position",['name'=>'poname'],"position.poid=position_user.poid")
                ->page($page, $limit)
                ->order("createtime desc")
                ->select();
            }
            
       
        
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }

    public function evalDownload($evalid)
    {
        $download = new Download(Db::name("evaluation")->where("evalid", $evalid)->value("path"));
        $download->download();
    }

    public function evalbyuse($userid = "", $page = "", $limit = "")
    {
        if ($this->request->isAjax()) {
            
            if (! isset($count)) {
                $this->count = Db::name("evaluation")->where([
                    'userid' => $userid
                ])->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res = Db::name("evaluation")->where("userid", $userid)
                ->page($page, $limit)
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

    public function fileUpload()
    {
        $file = request()->file('file');
        
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            /*
             * $datefloder = './temp/'.date('Ymd');
             * if (!file_exists($datefloder)) {
             * mkdir($datefloder);
             * }
             */
            $info = $file->rule(function () {
                return md5(uniqid());
            })->move("./temp/admin");
            if ($info) {
                
                return [
                    'code' => 0,
                    'file' => '/temp/admin/' . $info->getSavename()
                ];
            }
        }
    }

    public function info($userid)
    {
        $data = Db::name("resume")->where("userid", $userid)->find();
        if ($data) {
            $user = Db::name("user")->where("userid", $userid)->find();
            $this->assign("user", $user);
            $data['sex'] = $this->tran[$data['sex']];
            $this->assign("data", $data);
        }
        
        return $this->fetch();
    }
}