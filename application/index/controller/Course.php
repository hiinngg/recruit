<?php
namespace app\index\controller;

use think\Db;
use think\Session;
use think\Cookie;
use app\common\controller\Category;

/**
 *
 * @author ljq
 *         职学院
 */
class Course extends Common
{
    //0：线下授课  1：直播授课   2：微信授课
    protected $tran=['线下授课','直播授课','微信授课'];

    public function courseList($cateid="")
    { 
        $cate=new Category(Db::name("category")->select()); 
        $tree=$cate->getmenu();
        $sel_cateid=$cateid==""?$tree[0]['cateid']:$cateid;
        if($cateid==0){
            $sel_cateid=0;
            $this->assign("catename","所有课程");
        }else{
            $this->assign("catename",Db::name("category")->where("cateid",$sel_cateid)->value("name"));
        }
        $this->assign("course",$this->catedetail($sel_cateid));

        $this->assign("cateid",$sel_cateid);
        $this->assign("cates",$tree);
        return $this->fetch();
    }

    public function courseDetail($courseid)
    {
      if(!Session::has("flag")){
       Session::set("flag",1);
       Db::name("course")->where("courseid",$courseid)->setInc('pageview');
       }   
       $data=Db::name("course")->where("courseid",$courseid)->field("courseid,name,price,type,desc,menu,content,label_img,apply")->find();
       $data['type']=$this->tran[$data['type']];
        $this->assign("data",$data );
        
       return $this->fetch();
    }
    
    public function catedetail($cateid,$page=1){
        if($cateid==0){
            $query=['re_course.status'=>1];
        }else{
            $query=['re_course.status'=>1,'re_course.cateid'=>$cateid];
        }
        $course = Db::view("re_course", "courseid,label_img,name,desc,price,cateid,pageview")->view("re_category", [
            'name' => "catename"
        ], "re_category.cateid=re_course.cateid")
        ->where($query)
        ->order("is_top,re_course.createtime desc")
        ->page($page,6)
        ->select();
   /*   $cate = [];
        $data = [];
       foreach ($course as $val) {
            $data[$val['cateid']][] = $val;
        
            $cate[$val['cateid']] = $val['catename'];
        }  */
      return  $course;
    }
    

    public function apply(){

        if(!Session::has("username")){
            return 0;
        }
        $post=$this->request->post();
        if(Db::name('course_user')
            ->where(['userid'=>Session::get("username"),'courseid'=>$post['courseid']])->find()){
            return "你已报名该课程";
        }
        $data=[
            'userid'=>Session::get("username"),
            'courseid'=>$post['courseid'],
            'feedback'=>'',
            'status'=>0,
            'createtime'=>date("Y-m-d H:i:s")
        ];
        if(Db::name("course_user")->insert($data)==1){
            return 1;
        }else{
            return "报名失败";
        }

    }
}