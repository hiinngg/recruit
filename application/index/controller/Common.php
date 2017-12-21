<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\admin\controller\Course;

class Common extends Controller
{

    protected $trans;

    public function _initialize()
    {
        $this->trans = [
            '课程列表' => ['url'=>\think\Url::build('course/courseList'),"m"=>"course"],
            "职位列表" => ['url'=>\think\Url::build('job/jobList'),"m"=>"job"],
            "找人才" =>  ['url'=>\think\Url::build('talent/talent'),"m"=>"talent"],
            "企业后台" => ['url'=>\think\Url::build('companyadmin/index/login'),"m"=>"register"]
        ];
        
        $nav = Db::name("nav")->where("status", 1)->order("sortid")->select();
        foreach ($nav as $k=>$val) {
            $nav[$k]['c'] = $this->trans[$val['column']]['m'];
            $nav[$k]['column'] = $this->trans[$val['column']]['url'];
           
        }
        $this->assign("navlist", $nav);
       
        $res = Db::name("page")->where("column", "站点信息")->field("content,pageid")->find();
        $this->assign("footer", json_decode($res['content'],true));
      
        $this->assign('nav', strtolower($this->request->controller()));
        $this->view->engine->layout("layout");
    }
}