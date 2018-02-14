<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 22:29
 */
namespace app\admin\controller;


use think\Db;
use app\common\controller\Excel;

class Position extends  Common{

    protected  $count;

    public function positionList($page="", $limit="")
    {
        if ($this->request->isAjax()) {

            if (! isset($count)) {
                $this->count = Db::name("position")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            $res=Db::view("re_position",'poid,cid,name,is_subsidy,createtime,is_show,is_top')->view("re_company",['name'=>'cname'],"re_company.cid=re_position.cid")
                ->where("re_position.status",1)
                ->order("is_top,createtime desc")
                ->page($page, $limit)
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
    
    public function  getexcel(){
        $excel = new Excel();
        $filename = '普工申请'.date('YmdHis');
        $header = array('姓名','手机号','职位名称','申请时间');
        $index = array('name','tel','pname','createtime');
        $res = Db::view("position_user")->view("position",['name'=>'pname'],"position.poid=position_user.poid")
        ->order("createtime desc")
        ->select();
        
        $excel->createtable($res,$filename,$header,$index);
        
        
    }
    
    
    
    
    public  function  myposition($poid="",$page = "", $limit = ""){
    
        if ($this->request->isAjax()) {
    
            if (! isset($count)) {
                $this->count = Db::name("position_user", "*")->where('poid',$poid)->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
    
            $res = Db::name("position_user", "*")->where('poid',$poid)
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
        $this->assign('poid',$poid);
        return $this->fetch();
    
    
    }

    public function statusChange(){
        $post = $this->request->post();
        if (Db::name('position')->where("poid", $post['poid'])->update([
            'is_show' => $post['is_show']
        ])) {
            return 1;
        } else {
            return 0;
        }

    }
    public function settop(){
        
        $post = $this->request->post();
        if($post['is_top']==1){
            if(Db::name("position")->where("is_top",1)->count()==3){
               return 3; 
            }
        }
        if (Db::name('position')->where("poid", $post['poid'])->update([
            'is_top' => $post['is_top']
        ])) {
            return 1;
        } else {
            return 0;
        }
    
    }

    public  function  positionPreview($poid=""){
    if($poid!=""){
        $res=Db::view("re_position",'*')->view("re_company",['name'=>'cname'],"re_company.cid=re_position.cid")
            ->where("re_position.poid",$poid)
            ->find();

        if(isset($res['treatment'])){
            $res['treatment']=json_decode($res['treatment'],true);
        }

      $this->assign("data",$res);
      return $this->fetch();

    }
    }



}