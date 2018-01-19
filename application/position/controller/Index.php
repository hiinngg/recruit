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

    
}