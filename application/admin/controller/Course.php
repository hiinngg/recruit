<?php
namespace app\admin\controller;

use think\Db;

/**
 *
 * @author Administrator
 *         课程管理
 */
class Course extends Common
{
/**  
* 课程管理页面
* 
* @access public 
    获取分类列表
* @return array 模板渲染
*/  
    public function index()
    {
        $this->assign("tree", $this->getData());
        
        return $this->fetch();
    }

    /**  
    * layui table  接口
    * 
    * @access public 
    * @param mixed $page 当前页数
    * @param mixed $limit 每页条数
    * @return json
    */  
    public function courseByCate($page,$limit,$cateid="")
    {
        if($this->request->isAjax()){
        
            if (! isset($count)) {
                $this->count = Db::name("course")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
        
            $res =  Db::name("course")
            ->page($page, $limit)
            ->field("courseid,name,price,type,status,createtime")
            ->order("createtime desc")
            ->select();
        
            return ['code'=>0,'msg'=>"","count"=>$this->count,'data'=>$res];
        }
        return $this->fetch();
        
        
        
    }
    
    /**  
    * 添加课程    * 
    * @access public 
    * @return 模板渲染
    */  
    public function addCourse(){
        
       
        
        return $this->fetch('editCourse');
        
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
    *添加课程分类
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
     *编辑课程分类
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
     *删除课程分类
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
}