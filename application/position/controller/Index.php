<?php
namespace  app\position\controller;


use think\Controller;
use think\Db;

class Index extends Controller{
    
   public function _initialize(){
       //获取title ,keyword
       $po_desc=Db::name("page")->where("column","直聘-desc")->value("content");
       $this->assign("po",json_decode($po_desc,true));
   } 
    
   public function index(){
       
       $pics=Db::name("carousel")->where("column","企业直聘")->value("path");
       if($pics&&$pics!=""){
           $this->assign("pics",json_decode($pics,true));
       }
       
     
       
      return $this->fetch();
   } 
   public  function allposition($page=1){
       $data=Db::view("position","*")
           ->view("company",['name'=>"cname",'fullname'=>"cfname",'pics'=>'pics'],"company.cid=position.cid")
           ->where("is_show",1)
       
           ->page($page,4)
           ->order("is_top,createtime desc")
           ->select();
       
       foreach ($data as $k=>$val){
           if(isset($val['treatment'])){
               $data[$k]['treatment']=json_decode($data[$k]['treatment'],true);
           }
           if(isset($val['pics'])&&$val['pics']!=""){
               $data[$k]['pics']=current(json_decode($val['pics'],true));
           }
       }
       return $data;
   }
    public  function subposition($page=1){
        $data=Db::view("position","*")
            ->view("company",['name'=>"cname",'fullname'=>"cfname",'pics'=>'pics'],"company.cid=position.cid")
            ->where(['is_show'=>1,'is_subsidy'=>1])
            ->page($page,4)
            ->order("createtime desc")
            ->select();
        foreach ($data as $k=>$val){
            if(isset($val['treatment'])){
                $data[$k]['treatment']=json_decode($data[$k]['treatment'],true);
            }
            if(isset($val['pics'])&&$val['pics']!=""){
                $data[$k]['pics']=current(json_decode($val['pics'],true));
            }
        }
        return $data;
    }
    
    public  function detail($poid){
        
        $data=Db::view("position","*")->view("company",['name'=>"cname",'fullname'=>"cfname",'pics'=>'toppic','position_pics'=>"pics"],"company.cid=position.cid")
        ->where("poid",$poid)->find();
        if(isset($data['pics'])){
            
            $data['pics']=json_decode($data['pics'],true);
            
        }
        if(isset($data['toppic'])&&$data['toppic']!=""){
            
            $data['toppic']=current(json_decode($data['toppic'],true));
        }else{
            unset($data['toppic']);
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