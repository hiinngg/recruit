<?php
namespace app\admin\controller;

use think\Db;
use app\common\controller\Category;
use app\common\controller\Editor;

/**
 *
 * @author Administrator
 *         课程管理
 */
class Course extends Common
{

    public function courseSet()
    {
        $res = Db::name("course")->where("is_show", 1)->column("name");
        if (! empty($res)) {
            $this->assign("data", $res);
        }
         $this->assign("courselist",Db::name("course")->where("status",1)->field("courseid,name")->select());      
        return $this->fetch();
    }

    /**
     * 课程管理页面
     *
     * @access public
     *         获取分类列表
     * @return array 模板渲染
     *        
     */
    public function index()
    {
        $this->assign("tree", $this->getData());
        
        return $this->fetch();
    }

    /**
     * 课程列表
     *
     * @access public
     * @param mixed $arg1
     *            参数一的说明
     * @return array 返回类型
     */
    public function courseList()
    {
        $category = new Category(Db::name("category")->select());
        $this->assign("cates", $category->getoption());
        
        return $this->fetch();
    }

    /**
     * layui table 接口
     *
     * @access public
     * @param mixed $page
     *            当前页数
     * @param mixed $limit
     *            每页条数
     * @return json
     */
    public function courseByCate($page, $limit, $cateid = "")
    {
        if ($this->request->isAjax()) {
            
            if (! isset($count)) {
                $this->count = Db::name("course")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            if ($cateid != "") {
                
                $res = Db::name("course")->page($page, $limit)
                    ->where([
                    'cateid' => $cateid
                ])
                    ->field("courseid,name,price,type,status,createtime")
                    ->order("createtime desc")
                    ->select();
            } else {
                $res = Db::name("course")->page($page, $limit)
                    ->field("courseid,name,price,type,status,createtime")
                    ->order("createtime desc")
                    ->select();
            }
            
            return [
                'code' => 0,
                'msg' => "",
                "count" => ($cateid == "") ? $this->count : count($res),
                'data' => $res
            ];
        }
        return $this->fetch();
    }

    /**
     * 添加课程 *
     *
     * @access public
     * @return 模板渲染
     */
    public function addCourse()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $content = new Editor($post['data']['content']);
            $content->imageTrans();
            $post['data']['content'] = $content->getContent();
            $data = [
                'menu' => $post['data']['menu'],
                'cateid' => $post['data']['cates'],
                'name' => trim($post['data']['name']),
                'price' => $post['data']['price'],
                'type' => $post['data']['type'],
                'desc' => mb_substr($post['data']['desc'], 0, 30, 'UTF-8'),
                'label_img' => transOneImage($post['data']['label_img'], "/image/admin"),
                'content' => $post['data']['content'],
                'createtime' => date("Y-m-d H:i:s"),
                'status' => 1
            ];
            if (isset($post['data']['link'])) {
                
                $data['link'] = $post['data']['link'];
            }
            if (Db::name("course")->insert($data) != 1) {
                return "新增失败";
            }
            delDir("/temp/admin");
            return 1;
        }
        $category = new Category(Db::name("category")->select());
        $this->assign("cates", $category->getoption());
        return $this->fetch('editCourse');
    }

    /**
     * 改变状态
     *
     * @access public
     * @param mixed $arg1
     *            参数一的说明
     * @return array 返回类型
     */
    public function statusChange()
    {
        $post = $this->request->post();
        if (Db::name('course')->where("courseid", $post['courseid'])->update([
            'status' => $post['status']
        ])) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * 编辑课程
     *
     * @access public
     * @param mixed $courseid
     *            course表的主键
     * @return 渲染模板
     */
    public function editCourse($courseid = "")
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $old_data = Db::name("course")->where("courseid", $post['courseid'])
                ->field("label_img,content")
                ->find();
            $content = new Editor($post['data']['content']);
            $content->setOldContent($old_data['content']);
            $content->imageDel();
            $content->imageTrans();
            $post['data']['content'] = $content->getContent();
            $data = [
                'menu' => $post['data']['menu'],
                'cateid' => $post['data']['cates'],
                'name' => trim($post['data']['name']),
                'price' => $post['data']['price'],
                'type' => $post['data']['type'],
                'desc' => mb_substr($post['data']['desc'], 0, 30, 'UTF-8'),
                'label_img' => transOneImage(matchImage($post['data']['label_img'], $old_data['label_img']), "/image/admin"),
                'content' => $post['data']['content'],
                'status' => 1
            ];
            if (isset($post['data']['link'])) {
                
                $data['link'] = $post['data']['link'];
            }
            delDir("/temp/admin");
            if (Db::name("course")->where("courseid", $post['courseid'])->update($data) >= 0) {
                return 1;
            } else {
                return "保存失败";
            }
        }
        
        $res = Db::name("course")->where("courseid", $courseid)->find();
        $this->assign("data", $res);
        $category = new Category(Db::name("category")->select());
        $this->assign("cates", $category->getoption());
        return $this->fetch("editCourse");
    }

    /**
     * 删除课程
     *
     * @access public
     * @param mixed $arg1
     *            参数一的说明
     * @return 1
     */
    public function delCourse()
    {
        $post = $this->request->post();
        
        $data = Db::name("course")->where("courseid", $post['courseid'])
            ->field("label_img,content")
            ->find();
        
        $content = new Editor($data['content']);
        $content->delAllImage();
        unlink("." . $data['label_img']);
        if (Db::name("course")->where("courseid", $post['courseid'])->delete()) {
            
            return 1;
        }
    }

    /**
     * 获取课程分类
     *
     * @access public
     * @return json
     */
    public function getData()
    {
        $data = Db::name('category')->select();
        foreach ($data as $k => $val) {
            
            $data[$k]['href'] = $val['cateid'];
        }
        
        $res = [];
        $tree = [];
        // 整理数组
        foreach ($data as $key => $vo) {
            $res[$vo['cateid']] = $vo;
            $res[$vo['cateid']]['children'] = [];
        }
        unset($data);
        
        // 查询子孙
        foreach ($res as $key => $vo) {
            if ($vo['parentid'] != 0) {
                $res[$vo['parentid']]['children'][] = &$res[$key];
            }
        }
        
        // 去除杂质
        foreach ($res as $key => $vo) {
            if ($vo['parentid'] == 0) {
                $tree[] = $vo;
            }
        }
        unset($res);
        
        $tree = json_encode($tree);
        
        return $tree;
    }

    /**
     * 添加课程分类
     *
     * @access public
     * @return array
     */
    public function addCate()
    {
        $post = $this->request->post();
        $result = $this->validate([
            'name' => $post['name']
        ], [
            'name' => "unique:category,name"
        ]);
        if (true !== $result) {
            return "已存在该分类名称";
        }
        if (Db::name("category")->insert([
            'parentid' => $post['pid'],
            "name" => $post['name'],
            'createtime' => date("Y-m-d H:i:s")
        ]) != 1) {
            return "新增失败";
        }
        return [
            'code' => 1,
            "cateid" => Db::name('category')->getLastInsID()
        ];
    }

    /**
     * 编辑课程分类
     *
     * @access public
     * @return array
     */
    public function editCate()
    {
        $post = $this->request->post();
        
        $result = $this->validate([
            'name' => $post['name']
        ], [
            'name' => "unique:category,name"
        ]);
        if (true !== $result) {
            return "已存在该分类名称";
        }
        if (Db::name("category")->where("cateid", $post['id'])->update([
            "name" => $post['name']
        ]) < 0) {
            return "保存失败";
        }
        return 1;
    }

    /**
     * 删除课程分类
     *
     * @access public
     * @return array
     */
    public function delCate()
    {
        $post = $this->request->post();
        
        if (Db::name("category")->where("cateid", $post['id'])->delete() > 0) {
            
            return 1;
        }
    }

    /**
     * 图片上传接口
     *
     * @access public
     * @param mixed $arg1
     *            参数一的说明
     * @return array 返回类型
     */
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