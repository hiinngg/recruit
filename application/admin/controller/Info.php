<?php
namespace app\admin\controller;

use think\Db;
use think\Exception;

class Info extends Common
{

    public function index()
    {
        $res = Db::name("page")->where("column", "站点信息")->field("content,pageid")->find();
        $pc_desc = Db::name("page")->where("column", "pc-desc")->field("content,pageid")->value("content");
        $po_desc  = Db::name("page")->where("column", "直聘-desc")->field("content,pageid")->value("content");
        if($res){
            $this->assign("data", json_decode($res['content'],true));
            $this->assign("pageid", $res['pageid']);
        }
        $logo=Db::name("page")->where("column","logo")->value("content");
        $this->assign("logo",$logo);
     
        $this->assign("pc",json_decode($pc_desc,true));
        $this->assign("po",json_decode($po_desc,true));
        return $this->fetch();
    }

    public function addInfo()
    {
        $post = $this->request->post();
        $post['data']["label_img"] = transOneImage($post['data']['label_img'], "/image/admin");
        $post['data']["myvideo"] = TransVideo($post['data']['myvideo']);
        $data = [
            'column' => "站点信息",
            "title" => "站点信息",
            'content' => json_encode($post['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK),
            'status' => 1,
            'createtime' => date("Y-m-d H:i:s")
        ];
        if (Db::name("page")->insert($data) == 1) {
            delDir("/temp/admin");
            return 1;
        }
    }
    
    public function editInfo(){
        
        $post = $this->request->post();
        Db::startTrans();
        try {
            //视频、口号等
            $content=json_decode(Db::name("page")->where("pageid",$post['pageid'])->value("content"),true);
            $post['data']["label_img"] = transOneImage($post['data']['label_img'], "/image/admin");
           $post['data']["myvideo"] = TransVideo(matchImage($post['data']['myvideo'], $content['myvideo']));
            $data = [
                'content' => json_encode($post['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK)
            ];
            Db::name("page")->where("pageid",$post['pageid'])->update($data);
            
            //logo
            Db::name("page")->where("column","logo")->update(['content'=>transOneImage($post['data']['logo'], "/image/admin",64,64)]);
            
            
            
            //pc meta
            $pc_desc=json_encode(['title'=>$post['data']['pctitle'],'keywords'=>$post['data']['pckeywords']],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK);
            Db::name("page")->where("column","pc-desc")->update(['content'=>$pc_desc]);
            
            //企业直聘 meta
      
            $po_desc=json_encode(['title'=>$post['data']['potitle'],'keywords'=>$post['data']['pokeywords']],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK);
            Db::name("page")->where("column","直聘-desc")->update(['content'=>$po_desc]);
            
            Db::commit();
            delDir("/temp/admin");
            return 1;
          
            
        } catch (Exception $e) {
            Db::rollback();
            return $e->getMessage();
        }
     
        
    }

    public function imgUpload()
    {
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


    /*
     *
     * 注意:需要修改php.ini中对上传文件大小限制的修改
     * “max_execution_time =" 数值改为 1200
       “max_input_time =  ”   数值改为 1200
       “memory_limit =   ”    数值改为 256
       “post_max_size = ”   100M（开发环境）
       “upload_max_filesize = ” 100M（开发环境）
                   还要改php文件夹里面的
       
     *
     * */
    public function videoUpload()
    {
        $file = request()->file('video');
        if ($file) {
            $info = $file->rule(function () {
                return md5(uniqid());
            })->move(ROOT_PATH . 'public' . DS . 'temp' . DS . 'admin');
            if ($info) {
                return [
                    'code' => 0,
                    'src' => "/temp/admin/" . $info->getFileName(),
                    'filename'=>$info->getInfo()
                ];
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
    
    
}