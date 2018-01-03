<?php
namespace app\admin\controller;

use think\Db;

class Info extends Common
{

    public function index()
    {
        $res = Db::name("page")->where("column", "站点信息")->field("content,pageid")->find();
        if($res){
            $this->assign("data", json_decode($res['content'],true));
            $this->assign("pageid", $res['pageid']);
        }
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
        
        $content=json_decode(Db::name("page")->where("pageid",$post['pageid'])->value("content"),true);
        $post['data']["label_img"] = transOneImage($post['data']['label_img'], "/image/admin");
        $post['data']["myvideo"] = TransVideo(matchImage($post['data']['myvideo'], $content['myvideo']));
        $data = [
            'content' => json_encode($post['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK)
        ];
        if (Db::name("page")->where("pageid",$post['pageid'])->update($data) >= 0) {
            delDir("/temp/admin");
            return 1;
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