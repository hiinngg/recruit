<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Banner extends Controller
{

    public function bannerlist($page = "", $limit = "")
    {
        if ($this->request->isAjax()) {
            if (! isset($count)) {
                $this->count = Db::name("banner")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res = Db::name("banner")->page($page, $limit)->select();
            
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }

    public function edit($bannerid)
    {
        
        if($this->request->isAjax()){
            $post=$this->request->post();
            $pics=[];
            $pics_src=[];
            if(isset($post['images'])){
               
                foreach ($post['images'] as $k=>$val){
                    $image=cropOneImage($val['src'] , "/image/admin");
                    $array=['url'=>$val['url']?$val['url']:"",'src'=>$image];
                    array_push($pics_src, $image);
                    array_push($pics, $array);
                }
   
                $old_pics = Db::name("banner")->where("bannerid",$post['bannerid'])->value("path");
       
                foreach (json_decode($old_pics,true) as $k=>$val){
                
                    if(array_search($val['src'],$pics_src)===false){
                        @unlink(".".$val['src']);
                    }
                  
                }
        
            }
            $data=[
                'path'=>json_encode($pics,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK)
            ];
            if(Db::name("banner")->where("bannerid",$post['bannerid'])->update($data)>=0){
                return 1;
            }
        
        }
        
        
        
        
        
        $data=Db::name("banner")->where("bannerid",$bannerid)->find();
        
        
        $data['path']= $data['path'] ? json_decode($data['path'],true)+[1]:[1];
        $this->assign("data",$data);
        
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
    
}