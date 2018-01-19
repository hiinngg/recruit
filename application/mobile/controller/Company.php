<?php
namespace app\mobile\controller;

use think\Controller;
use think\Db;
use think\Session;

class Company extends Controller
{

    public function index()
    {
        if(!Session::has("cid")){
             return $this->fetch("login");
        }
        $data=Db::name("company")->where("cid",Session::get("cid"))->find();

        if(isset($data['pics'])){
            $data['pics']=json_decode( $data['pics'],true);
        }
        $this->assign("data",$data);
        return $this->fetch();
    
     
    }
    
    public function logout(){
        
        Session::delete("cid");
        return $this->fetch("login");
    }
    

    public function addtalent(){
        
        $post = $this->request->post();
        $data = [
            'name' => trim($post['data']['name']),
            'cid' => Session::get("cid"),
            'skill' => $post['data']['skill'],
            'salary'=>$post['data']['salary'],
            'location'=>$post['data']['location'],
            'content' => $post['data']['content'],
            'createtime' => date("Y-m-d H:i:s"),
            'feedback'=>"",
            'status' => 0
        ];
        if (! Db::name("talent")->insert($data) > 0) {
            return "保存失败，请重试";
        }
        return 1;
        
    }
    
   
    
    
    public function addposition(){
        
        if ($this->request->isAjax()) {
            $post = $this->request->post();

            // 执行保存
            $data = [
                'cid' => Session::get("cid"),
                'name' => trim($post['data']['name']),
                'number' => $post['data']['number'],
                'salary' => $post['data']['salary'],    
                'desc' => $post['data']['desc'],
                'is_subsidy'=>$post['data']['subsidy'],
                'treatment' =>json_encode(explode(",",$post['data']['treat']),JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_NUMERIC_CHECK) ,
                'createtime' => date("Y-m-d H:i:s"),
                'status' => 1
            ];
            if (Db::name("position")->insert($data) <= 0) {
                return "新增失败";
            }
        /*     if (isset($post['image'])) {
                //检查原先的工厂图片
                $this->changePics($post['image']);
                // 保存或更新到company
                $this->savePics($post['image']);
            } */
            return 1;
        }
       /*  $position_pics=Db::name("company")->where("cid",$this->companyid)->value("position_pics");
        
        $this->assign("pics", $position_pics ?  (json_decode($position_pics, true) + [1,2,3,4,5]): [1,2,3,4,5]);
        $this->assign("treat",$this->treat); */
        return $this->fetch('editposition');
        
    }
    
    public function addteam(){
    
        $post = $this->request->post();
        $data = [
            'name' => trim($post['data']['name']),
            'cid' => Session::get("cid"),
            'desc' => $post['data']['desc'],
            'result'=>$post['data']['result'],
            'createtime' => date("Y-m-d H:i:s"),
            'status' => 1
        ];
        if (! Db::name("team")->insert($data) > 0) {
            return "保存失败，请重试";
        }
        return 1;
    
    }
    public function  talentedit($taid){
      
        if($this->request->isAjax()){
            
            $post = $this->request->post();
            $data = [
                'name' => trim($post['data']['name']),
                'skill' => $post['data']['skill'],
                'salary'=>$post['data']['salary'],
                'location'=>$post['data']['location'],
                'content' => $post['data']['content'],
            ];
            if (! Db::name("talent")->where("taid",$taid)->update($data) < 0) {
                return "保存失败，请重试";
            }
            return 1;
            
        }
       
        $data=Db::name("talent")->where("taid",$taid)->find();
        $this->assign("data",$data);
        return $this->fetch();
       
    }
    public  function  positionedit($poid){
    
    
        
        if ($this->request->isAjax()) {
            $post = $this->request->post();
        
            // 执行保存
            $data = [
               
                'name' => trim($post['data']['name']),
                'number' => $post['data']['number'],
                'salary' => $post['data']['salary'],
                'desc' => $post['data']['desc'],
                'is_subsidy'=>$post['data']['subsidy'],
                'treatment' =>json_encode(explode(",",$post['data']['treat']),JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_NUMERIC_CHECK) ,
          
            ];
            if (Db::name("position")->where("poid",$poid)->update($data) < 0) {
                return "保存失败";
            }
            /*     if (isset($post['image'])) {
             //检查原先的工厂图片
             $this->changePics($post['image']);
             // 保存或更新到company
             $this->savePics($post['image']);
             } */
            return 1;
        }
        
        
        $data=Db::name("position")->where("poid",$poid)->find();
        if(isset($data['treatment'])){
            
            $data['arr']=json_decode($data['treatment'],true);
            $data['value']=implode(",", $data['arr']);
        }
        $this->assign("data",$data);
        return $this->fetch();
    }
    
    
    public function  teamedit($teamid){
        
        if($this->request->isAjax()){
        
            $post = $this->request->post();
            $data = [
                'name' => trim($post['data']['name']),
            
                'desc'=>$post['data']['desc'],
                'result' => $post['data']['result'],
            ];
            if (! Db::name("team")->where("teamid",$teamid)->update($data) < 0) {
                return "保存失败，请重试";
            }
            return 1;
        
        }
         
        $data=Db::name("team")->where("teamid",$teamid)->find();
        $this->assign("data",$data);
        return $this->fetch();
         
    }
    
    public  function talentlist(){
        
        
            $data=Db::name("talent")->where(['cid'=>Session::get("cid")])->order("createtime desc")->select();
            return $data;

    }
    public  function teamlist(){
    
    
        $data=Db::name("team")->where(['cid'=>Session::get("cid")])->order("createtime desc")->select();
        return $data;
    
    }
    public  function positionlist(){
    
    
        $data=Db::name("position")->where(['cid'=>Session::get("cid")])->order("createtime desc")->select();
        foreach ($data as $k=>$val){
            if(isset($val['treatment'])){
                $data[$k]['treatment']=json_decode($data[$k]['treatment'],true);
            }
        }
     
        return $data;
    
    }
    public function login()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $res = Db::name("company")->where([
                'name' => $post['username'],
                'password' => md5($post['userpass'])
            ])->value("cid");
            if ($res) {
                Session::set("cid", $res);
                return 1;
            } else {
                return "用户不存在或者密码错误";
            }
        }
        
        return $this->fetch();
    }

    public function reg()
    {
        if ($this->request->isAjax()) {
            
            $post = $this->request->post();
            
            $result = $this->validate([
                'name' => $post['name']
            ], [
                'name' => "unique:company,name"
            ]);
            if (true !== $result) {
                return "已存在该企业名称";
            }
            
            $data = [
                'name' => trim($post['name']),
                'password' => md5($post['pwd']),
                'contact' => trim($post['tel']),
                'status' => 0,
                'createtime' => date("Y-m-d H:i:s")
            ];
            
            if (($post['fullname'] != "") && (! empty($_FILES))) {
                $pics = [];
                if (isset($_FILES['avastar'])) {
                    // 有企业logo
                    $data['avastar'] = $this->regimg($_FILES['avastar'], 128, 64);
                    unset($_FILES['avastar']);
                }
                if (! empty($_FILES)) {
                    foreach ($_FILES as $k => $val) {
                        // array_push($pics, transOneImage($val, "/image/company"));
                        $pics[$k] = $this->regimg($val);
                    }
                    $data['pics'] = json_encode($pics, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
                }
                
                // 成为内推企业
                $data['fullname'] = trim($post['fullname']);
            }
            
            if (Db::name("company")->insert($data) <= 0) {
                return "新增失败";
            }
            
            return 1;
        }
        return $this->fetch();
    }

    public function regimg($val, $width = 350, $height = 200)
    {
        // $file = $_FILES;
        // $finfo = new \finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search($val['type'], array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        ), true)) {
            return 0;
        }
        
        $uniqid = md5(uniqid());
        $img = "/image/company/" . $uniqid . "." . $ext;
        $image = \think\Image::open($val['tmp_name']);
        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
        $image->thumb($width, $height, \think\Image::THUMB_CENTER)->save("." . $img);
        
        // move_uploaded_file($val['tmp_name'], "./temp/" . $this->user . "/" . $uniqid . "." . $ext);
        
        // return "/temp/" . $this->user . "/" . $uniqid . "." . $ext;
        // $res[$k] = "/temp/" . $this->user . "/" . $uniqid . "." . $ext;
        
        return $img;
    }
}