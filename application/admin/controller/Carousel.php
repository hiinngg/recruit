<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Carousel extends Controller
{

    public function carlist($page = "", $limit = "")
    {
        if ($this->request->isAjax()) {
            if (! isset($count)) {
                $this->count = Db::name("carousel")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res = Db::name("carousel")
                ->page($page,$limit)
                ->order("createtime")
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
    
    public function imgUpload()
    {
        $file = request()->file('image');
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'temp' );
            if ($info) {
                return [
                    'code' => 0,
                    'src' => "/temp/" . $info->getSaveName()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
    
    
    public  function  edit($carid){
        
        if($this->request->isAjax()){
            $post=$this->request->post();
            $pics=[];
            if(isset($post['images'])){
                foreach ($post['images'] as $k=>$val){
                    array_push($pics, transOneImage($val , "/image/admin"));
                }
            
            }
            $data=[
              'path'=>json_encode($pics,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK)  
            ];
          if(Db::name("carousel")->where("carid",$post['carid'])->update($data)>=0){
              return 1;
          }
            
        }
        
        
        
         $data=Db::name("carousel")->where("carid",$carid)->find();
        
        
            $data['path']= $data['path'] ? json_decode($data['path'],true)+[1,2,3]:[1,2,3];
            $this->assign("data",$data);
    
            return $this->fetch();
    
        return $this->fetch();
        
    }
}