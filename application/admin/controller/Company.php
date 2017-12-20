<?php
namespace  app\admin\controller;


use think\Db;

class Company extends Common{
    
    
    public function companyList($page = 1, $limit = 10,$keyword=""){
        
        
        if (! isset($count)) {
            $this->count = Db::name("company")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("company")->field("cid,name,fullname,contact,status,createtime")
            ->order("createtime desc")
            ->where("name|fullname",'like',"%".$keyword."%")
            ->page($page, $limit)
            ->select();
             
            return json([
                'code' => 0,
                'msg' => "",
                "count" =>  ($keyword=="") ? $this->count : count($result),
                "data" => $result
            ]);
             
        }
   
        return $this->fetch();
        
    }
    
    
    public function  companyPreview($cid=""){
        
        $res=Db::name("company")->where("cid",$cid)->find();
        if(isset($res['pics'])){
        
            $res['pics']= json_decode($res['pics']);
        
        }
        $this->assign("data",$res);
        return $this->fetch();
        
        
    }
    
    public function statusChange(){
        $post = $this->request->post();
        if(Db::name('company')->where("cid",$post['cid'])->update(['status'=>$post['status']])){
            return 1;
        }else{
            return 0;
        }
    }
    
    
    
}