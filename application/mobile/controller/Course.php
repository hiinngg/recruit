<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 22:53
 */
namespace app\mobile\controller;
use think\Cookie;
use think\Db;
use think\Session;
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
        $this->assign("cates",$tree);
        return $this->fetch();
    }

    public function courseDetail($courseid)
    {
        $data=Db::name("course")->where("courseid",$courseid)->field("courseid,name,price,type,desc,menu,content,label_img")->find();
        $data['type']=$this->tran[$data['type']];
        $this->assign("data",$data );

        return $this->fetch();
    }
    
    public function catedetail($cateid,$page=1){
        $course = Db::view("re_course", "courseid,label_img,name,desc,price,cateid,pageview")->view("re_category", [
            'name' => "catename"
        ], "re_category.cateid=re_course.cateid")
        ->where(['re_course.status'=>1,'re_course.cateid'=>$cateid])
        ->page($page,4)
        ->select();
        /*   $cate = [];
         $data = [];
         foreach ($course as $val) {
         $data[$val['cateid']][] = $val;
    
         $cate[$val['cateid']] = $val['catename'];
         }  */
        return  $course;
    }
    
    public function  detail($courseid){
        if(!Session::has("flag")){
            Session::set("flag",1);
            Db::name("course")->where("courseid",$courseid)->setInc('pageview');
        }
        $data=Db::name("course")->where("courseid",$courseid)->field("courseid,name,price,type,desc,menu,content,label_img,apply")->find();
        $data['type']=$this->tran[$data['type']];
        $this->assign("data",$data );
        
        return $this->fetch();
        
        
    }
    
    

    public function apply(){

        $post=$this->request->post();
        if(Db::name('course_user')
            ->where(['userid'=>Db::name("user")->where("openid",Cookie::get("rec_openid"))->value("userid"),'courseid'=>$post['courseid']])->find()){
            return "你已报名该课程";
        }
        $data=[
            'userid'=>Db::name("user")->where("openid",Cookie::get("rec_openid"))->value("userid"),
            'courseid'=>$post['courseid'],
            'feedback'=>'',
            'status'=>0,
            'createtime'=>date("Y-m-d H:i:s")
        ];
        if(Db::name("course_user")->insert($data)==1){
            Db::name('course')->where('courseid', $post['courseid'])->setInc('apply');
            return 1;
        }else{
            return "报名失败";
        }

    }
}