<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\admin\controller\Course;
use think\Session;
use think\captcha\Captcha;


class Common extends Controller
{

    protected $trans;

    public function _initialize()
    {
        //判断是否是手机登录
        $detect = new \Mobile_Detect();
        if ($detect->isMobile()) {
            return $this->redirect("mobile/index/index");
        }
        
        //判断session
        if (Session::has("username")) {
            $this->assign("username", Db::name("user")->where("userid", Session::get("username"))
                ->value("telphone"));
        }
        $this->trans = [
            '课程列表' => [
                'url' => \think\Url::build('course/courseList'),
                "m" => "course"
            ],
            "职位列表" => [
                'url' => \think\Url::build('job/jobList'),
                "m" => "job"
            ],
            "找人才" => [
                'url' => \think\Url::build('talent/talent'),
                "m" => "talent"
            ],
            "企业后台" => [
                'url' => \think\Url::build('companyadmin/index/login'),
                "m" => "register"
            ]
        ];
        
        
        //获取导航
        $nav = Db::name("nav")->where("status", 1)
            ->order("sortid")
            ->select();
        foreach ($nav as $k => $val) {
            $nav[$k]['c'] = $this->trans[$val['column']]['m'];
            $nav[$k]['column'] = $this->trans[$val['column']]['url'];
        }
        $this->assign("navlist", $nav);
        
        
        //获取导航设置
        $res = Db::name("page")->where("column", "站点信息")
            ->field("content,pageid")
            ->find();
        $this->assign("footer", json_decode($res['content'], true));
        
        //获取文章列表
        $posts = Db::name("post")->where("is_show", 1)
                ->field("postid,title")
                ->select();
        $this->assign("posts",$posts);
  
        
        //获取title ,keywords
        $pc_desc=Db::name("page")->where("column","pc-desc")->value("content");
        $this->assign("pc",json_decode($pc_desc,true));
        
        //获取logo
        $this->assign("logo",Db::name("page")->where("column","logo")->value("content"));
        
        $this->assign('nav', strtolower($this->request->controller()));
        $this->view->engine->layout("layout");
        

        
    }
}