<?php
namespace app\index\controller;

use think\Db;
use think\Session;

class Register extends Common
{

    public function userRegister()
    {   
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            if (! Session::has("username")) {
                return 0;
            }
            $data=[
                'userid'=>Session::get("username"),
                'truename'=>$post['data']['name'],
                'sex'=>$post['data']['sex'],
                'position'=>$post['data']['position'],
                'graduated'=>$post['data']['graduated'],
                'education'=>$post['data']['edu'],
                'selfevaluation'=>$post['data']['selfevaluation'],
                'experience'=>$post['data']['experience'],
                'birthdate'=>$post['data']['date'],
                'status'=>1,
                'createtime'=>date("Y-m-d H:i:s")
            ];
            if(Db::name("resume")->insert($data)==1){
                $resumeid =  Db::name('resume')->getLastInsID();
               $a =  Db::name("user")->where("userid",$data['userid'])
                    ->update(['userpassword'=>md5($post['data']['pwd']),'resumeid'=>$resumeid]);
                return 1;
            }
        }
        if (! Session::has("username")) {
            return $this->redirect("index/index");
        }
        return $this->fetch();
    }
    public function  editRegister(){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            if (! Session::has("username")) {
                return 0;
            }
            $data=[
                'userid'=>Session::get("username"),
                'truename'=>$post['data']['name'],
                'sex'=>$post['data']['sex'],
                'position'=>$post['data']['position'],
                'graduated'=>$post['data']['graduated'],
                'education'=>$post['data']['edu'],
                'selfevaluation'=>$post['data']['selfevaluation'],
                'experience'=>$post['data']['experience'],
                'birthdate'=>$post['data']['date'],
                'status'=>1,
                'createtime'=>date("Y-m-d H:i:s")
            ];
            if(Db::name("resume")->where("userid",$data['userid'])->update($data)>=0){

                return 1;
            }
        }

      $data=Db::name('resume')->where("userid",Session::get("username"))->find();
      $this->assign("data",$data);
      return $this->fetch('userRegister');

    }

    public function userBaseRegister()
    {
        $post = $this->request->post();
        $result = $this->validate([
            'telphone' => $post['mobile']
        ], [
            'telphone' => "unique:user,telphone"
        ]);
        if (true !== $result) {
            return [
                'code' => 0,
               'msg'=>"该手机号已被注册"
            ];
        }
        
        
        $data = [
            'telphone' => $post['mobile'],
            'status' => 1,
            'createtime' => date("Y-m-d H:i:s")
        ];
        if (Db::name("user")->insert($data) == 1) {
            $userid=Db::name('user')->getLastInsID();
            Session::set("username",$userid);
            return [
                'code' => 1,
                "userid" => $userid
            ];
        }
    }

    public function companyReg()
    {
        if ($this->request->isAjax()) {
            
            $post = $this->request->post();
            $result = $this->validate([
                'name' => $post['data']['name']
            ], [
                'name' => "unique:company,name"
            ]);
            if (true !== $result) {
                return "已存在该企业名称";
            }

            $data = [
                'name' => trim($post['data']['name']),
                'password' => md5($post['data']['pwd']),
                'contact' => trim($post['data']['tel']),
                'status' => 0,
                'createtime' => date("Y-m-d H:i:s")
            ];
            
            if (($post['data']['fullName'] != "") && (isset($post['images']))) {
                $pics = [];
                if (isset($post['images']['image4'])) {
                    // 有企业logo
                    $data['avastar'] = transOneImage($post['images']['image4'], "/image/company");
                    unset($post['images']['image4']);
                }
                foreach ($post['images'] as $k => $val) {
                    array_push($pics, transOneImage($val, "/image/company"));
                }
                
                // 成为内推企业
                $data['fullname'] = trim($post['data']['fullName']);
                $data['pics'] = json_encode($pics, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
                $data['status'] = 1;
            }
            
            if (Db::name("company")->insert($data) <= 0) {
                return "新增失败";
            }
            
            return 1;
        }
        return $this->fetch();
    }

    public function imgUpload()
    {
        $file = request()->file('image');
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'temp');
            if ($info) {
                return [
                    'code' => 0,
                    'src' => $info->getSaveName()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}