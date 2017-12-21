<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/20
 * Time: 22:36
 */
namespace app\admin\controller;

use think\Db;
use app\common\controller\Editor;



class Page extends  Common{

    protected $count;

    public  function pageList($page = 1, $limit = 10)
    {
        if (!isset($count)) {
            $this->count = Db::name("page")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("page")
                ->where("column","neq","站点信息")
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

    public function editPage($pageid=""){

        if($this->request->isAjax()){
            $post=$this->request->post();
            $old_data = Db::name("page")->where("pageid", $post['pageid'])
                ->field("content")
                ->find();
            $content = new Editor($post['data']['content']);
            $content->setOldContent($old_data['content']);
            $content->imageDel();
            $content->imageTrans();
            $post['data']['content'] = $content->getContent();
            $data=[
                'title'=>$post['data']['name'],
                'content'=> $post['data']['content']
            ];
        if(Db::name("page")->where("pageid",$post['pageid'])->update($data)>=0){
           return 1;
        }

        }


        $this->assign("data",Db::name("page")->where("pageid",$pageid)->find());
        return $this->fetch();
    }

}