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
        $data = [
            'column' => "站点信息",
            "title" => "站点信息",
            'content' => json_encode($post['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK),
            'status' => 1,
            'createtime' => date("Y-m-d H:i:s")
        ];
        if (Db::name("page")->insert($data) == 1) {
            return 1;
        }
    }
    
    public function editInfo(){
        
        $post = $this->request->post();
        $post['data']["label_img"] = transOneImage($post['data']['label_img'], "/image/admin");
        $data = [
            'content' => json_encode($post['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK)
        ];
        if (Db::name("page")->where("pageid",$post['pageid'])->update($data) >= 0) {
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
}