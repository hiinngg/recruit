<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Talent extends Common
{

    public function talentList($page = "", $limit = "")
    {
        if (! isset($count)) {
            $this->count = Db::name("page")->where("column", "人才定制")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("page")->where("column", "人才定制")
                ->order("createtime desc")
                ->page($page, $limit)
                ->select();
            
            return json([
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                "data" => $result
            ]);
        }
        
        return $this->fetch();
    }

    public function imgUpload()
    {
        $image = \think\Image::open(request()->file('image'));

        $pathname='/image/admin/'.md5(uniqid()).".".$image->type();

        $image->thumb(300, 150)->save(".".$pathname);

        $data=[
            'column'=>'人才定制',
            'title'=>'人才定制',
            'content'=>$pathname,
            'status'=>1,
            'createtime'=>date("Y-m-d H:i:s")
        ];
      if(Db::name("page")->insert($data)==1){
          return 1;
      }

      /*  if ($file) {
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
        }*/
    }

    public function statusChange(){

         $post = $this->request->post();
        if (Db::name('page')->where("pageid", $post['pageid'])->update([
            'status' => $post['status']
        ])) {
            return 1;
        } else {
            return 0;
        }

    }
    public function talentDel(){

        $post = $this->request->post();
        if(Db::name("page")->where("pageid",$post['pageid'])->delete()==1){
            unlink(".".$post['path']);
            return 1;
        }

    }

}
