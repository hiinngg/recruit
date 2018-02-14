<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\common\controller\Editor;

/**
 * @author ljq
 * 文章管理
 */
class Post extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($page="",$limit="",$keyword="")
    {
        if (! isset($count)) {
            $this->count =Db::name("post")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("post")->order("createtime desc")
                ->where("title", 'like', "%" . $keyword . "%")
                ->page($page, $limit)
                ->select();
            
            return json([
                'code' => 0,
                'msg' => "",
                "count" => ($keyword == "") ? $this->count : count($result),
                "data" => $result
            ]);
        }
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        
        return $this->fetch('edit');
        
        
        //
    }
    
    public function showChange()
    {
        $post = $this->request->post();
        if (Db::name('post')->where("postid", $post['postid'])->update([
            'is_show' => $post['is_show']
        ])) {
            return 1;
        } else {
            return 0;
        }
    }
    
    
    

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
      $post = $request->post();
        $editor = new Editor($post['content']);
        $editor->imageDel();
        $editor->imageTrans();
        $post['content'] = $editor->getContent();
        $data = [
            'title' => trim($post['data']['title']),
            'content' => $post['content'],
         
            'createtime' => date("Y-m-d H:i:s")
   
        ];
        if (Db::name("post")->insert($data) == 1) {
            return 1;
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
          $data = Db::name("post")->where("postid", $id)
            ->field("postid,title,content")
            ->find();
        $this->assign("data", $data);
        return $this->fetch("edit");
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
         $post = $request->post();
        $editor = new Editor($post['content']);
        $editor->setOldContent($post['oldContent']);
        $editor->imageDel();
        $editor->imageTrans();
        $post['content'] = $editor->getContent();
        if (Db::name("post")->where("postid", $post['postid'])->update([
            'content' => $post['content'],
            'title' => $post['data']['title']
        ]) >= 0) {
            return 1;
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $post = $this->request->post();
        $content = Db::name("post")->where("postid", $post['postid'])->value("content");
        $editor = new Editor($content);
        
        if (Db::name('post')->where("postid", $post['postid'])->delete()) {
            $editor->delAllImage();
            return 1;
        } else {
            return 0;
        }
    }
}
