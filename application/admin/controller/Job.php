<?php
namespace app\admin\controller;

use think\Db;

class Job extends Common
{

    public function jobList($page = "", $limit = "")
    {
        if (! isset($count)) {
            $this->count = Db::name("page")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("job")->order("createtime desc")
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
                'pic' => transOneImage(matchImage($post['data']['pic'], $old_img), '/image/admin'),
            ];
            
            if(Db::name("job")->where("jobid",$post['jobid'])->update($data)>=0){
                return  1;
            }
        }
        $this->assign("data", Db::name("job")->where("jobid", $jobid)
            ->find());
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
                'createtime' => date("Y-m-d H:i:s")
            ];
            delDir("/temp/admin");
            if (Db::name("job")->insert($data) == 1) {
                return 1;
            }
        }
        
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