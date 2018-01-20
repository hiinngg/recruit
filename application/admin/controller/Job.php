<?php
namespace app\admin\controller;

use think\Db;

class Job extends Common
{

    public function jobList($page = "", $limit = "")
    {
        if (! isset($count)) {
            $this->count =Db::view("re_job","*")->view("re_jobcate",["name"=>"catename"],"re_jobcate.cateid=re_job.cate")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
  
            
           $result = Db::view("re_job","*")->view("re_jobcate",["name"=>"catename"],"re_jobcate.cateid=re_job.cate")->order("createtime desc")    
                   ->page($page, $limit)
                   ->select();
            return json([
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                "data" => $result
            ]);
        }
        
        return $this->fetch();
    }
    
    public  function  editfeedback(){
        $post = $this->request->post();
        Db::name("talent")->where("taid", $post['taid'])->update([
            "feedback"=>$post['text'],
            'status'=>1
        ]);
         
        return 1;
    }
    
    public  function  myjob($jobid="",$page = "", $limit = ""){
        
        if ($this->request->isAjax()) {
        
            if (! isset($count)) {
                $this->count = Db::view("re_job_user", "*")->view("re_user", "telphone", "re_user.userid=re_job_user.userid")->where('re_job_user.jobid',$jobid)->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            $res = Db::view("re_job_user", "*")->view("re_user", "telphone", "re_user.userid=re_job_user.userid")->where('re_job_user.jobid',$jobid)
            ->page($page, $limit)
            ->order("re_job_user.createtime desc")
            ->select();
        
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        $this->assign('jobid',$jobid);
        return $this->fetch();
        
        
    }
    
    public function edituserfeedback(){
        
        $post = $this->request->post();
        Db::name("job_user")->where("orderid", $post['orderid'])->update([
            "feedback"=>$post['text'],
            'status'=>1
        ]);
         
        return 1;
    }
    
    public function ctalent($page = "", $limit = ""){
    
      if($this->request->isAjax()){

            if (! isset($count)) {
                $this->count = Db::name("talent")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res =  Db::name("talent")
            ->page($page, $limit)
    
            ->order("createtime desc")
            ->select();
            
            return ['code'=>0,'msg'=>"","count"=>$this->count,'data'=>$res];
        }
        return $this->fetch();
    
    }
    
    public function addcate($name){
        $data=[
            'name'=>$name,
            'createtime'=>date("Y-m-d H:i:s")
        ];
        if(Db::name("jobcate")->insert($data)==1){
            return 1;
        }

    }
    
    public  function  editcate($name,$cateid){
        $data=[
            'name'=>$name,
     
        ];
        if(Db::name("jobcate")->where('cateid',$cateid)->update($data)>=0){
            return 1;
        }
    }
    public  function catedel(){
        $post=$this->request->post();
        if(Db::name("jobcate")->where("cateid",$post['cateid'])->delete()==1){
            return 1;
        }
        
    }
    

    
    
    
    public function  jobcate($page = "", $limit = ""){
        if (! isset($count)) {
            $this->count = Db::name("jobcate")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("jobcate")->order("createtime desc")
            ->page($page, $limit)
            ->select();
        
            return json([
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                "data" => $result
            ]);
        }
        
        return $this->fetch();
    }

    public function editJob($jobid)
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $old_img=Db::name("job")->where("jobid",$post['jobid'])->value("pic");
            $data = [
                'name' => $post['data']['name'],
                'cname' => $post['data']['cname'],
                'location' => $post['data']['location'],
                'desc' => $post['data']['desc'],
                'cate'=>$post['data']['cate'],
                'pic' => transOneImage(matchImage($post['data']['pic'], $old_img), '/image/admin'),
            ];
            
            if(Db::name("job")->where("jobid",$post['jobid'])->update($data)>=0){
                return  1;
            }
        }
        $this->assign("data", Db::name("job")->where("jobid", $jobid)
            ->find());
        $this->assign("catelist",Db::name("jobcate")->select());
        return $this->fetch('editjob');
    }

    public function addJob()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $data = [
                'name' => $post['data']['name'],
                'cname' => $post['data']['cname'],
                'location' => $post['data']['location'],
                'desc' => $post['data']['desc'],
                'pic' => transOneImage($post['data']['pic'], '/image/admin'),
                'status' => 1,
                'cate'=>$post['data']['cate'],
                'createtime' => date("Y-m-d H:i:s")
            ];
            delDir("/temp/admin");
            if (Db::name("job")->insert($data) == 1) {
                return 1;
            }
        }
        $this->assign("catelist",Db::name("jobcate")->select());
        return $this->fetch("editjob");
    }

    public function imgUpload()
    {
        /*
         * $image = \think\Image::open(request()->file('image'));
         *
         * $pathname='/image/admin/'.md5(uniqid()).".".$image->type();
         *
         * $image->thumb(350, 200)->save(".".$pathname);
         *
         * $data=[
         * 'column'=>'找工作',
         * 'title'=>'找工作',
         * 'content'=>$pathname,
         * 'status'=>1,
         * 'createtime'=>date("Y-m-d H:i:s")
         * ];
         * if(Db::name("page")->insert($data)==1){
         * return 1;
         * }
         */
        $file = request()->file('image');
        if ($file) {
            $info = $file->rule(function () {
                return md5(uniqid());
            })->move(ROOT_PATH . 'public' . DS . 'temp' . DS . 'admin');
            if ($info) {
                return [
                    'code' => 0,
                    'src' => "/temp/admin/" . $info->getFileName()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function statusChange()
    {
        $post = $this->request->post();
        if (Db::name('job')->where("jobid", $post['jobid'])->update([
            'status' => $post['status']
        ])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function jobDel()
    {
        $post = $this->request->post();
        
         $img=Db::name("job")->where("jobid",$post['jobid'])->value("pic");
        
        if (Db::name("job")->where("jobid",$post['jobid'])->delete() == 1) {
            unlink("." . $img);
            return 1;
        }
    }
}