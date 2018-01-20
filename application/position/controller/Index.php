<?php
namespace  app\position\controller;


use think\Controller;
use think\Db;

class Index extends Controller{
    
   public function index(){
       
       
      return $this->fetch();
   } 
   public  function allposition($page=1){
       $data=Db::view("position","*")
           ->view("company",['name'=>"cname",'fullname'=>"cfname"],"company.cid=position.cid")
           ->where("position.is_show",1)
           ->page($page,4)
           ->order("createtime desc")
           ->select();
       foreach ($data as $k=>$val){
           if(isset($val['treatment'])){
               $data[$k]['treatment']=json_decode($data[$k]['treatment'],true);
           }
       }
       return $data;
   }
    public  function subposition($page=1){
        $data=Db::view("position","*")
            ->view("company",['name'=>"cname",'fullname'=>"cfname"],"company.cid=position.cid")
            ->where(['position.is_show'=>1,'position.is_subsidy'=>1])
            ->page($page,4)
            ->order("createtime desc")
            ->select();
        foreach ($data as $k=>$val){
            if(isset($val['treatment'])){
                $data[$k]['treatment']=json_decode($data[$k]['treatment'],true);
            }
        }
        return $data;
    }
    
    public  function detail($poid){
        
        $data=Db::view("position","*")->view("company",['name'=>"cname",'fullname'=>"cfname",'position_pics'=>"pics"],"company.cid=position.cid")
        ->where("poid",$poid)->find();
        if(isset($data['pics'])){
            
            $data['pics']=json_decode($data['pics'],true);
            
        }
        $data['treatment']=json_decode($data['treatment'],true);
        $this->assign("data",$data);
        return $this->fetch();
        
        
    }
    
    public  function  apply(){
        $post=$this->request->post();
        $data=[
            'name'=>$post['name'],
            'tel'=>$post['tel'],
            'createtime'=>date("Y-m-d H:i:s"),
            'poid'=>$post['poid']
        ];
        if(Db::name("position_user")->insert($data)==1){
           Db::name('position')->where('poid', $post['poid'])->setInc('apply');
            return 1;
        }
        
        
        
    }

    
}