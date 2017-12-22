<?php
namespace app\index\controller;

use think\Db;

/**
 *
 * @author ljq
 *         职学院
 */
class Course extends Common
{

    public function courseList()
    {
        $course = Db::view("re_course", "courseid,label_img,name,desc,price,cateid")->view("re_category", [
            'name' => "catename"
        ], "re_category.cateid=re_course.cateid")
            ->where("re_course.status", 1)
            ->select();
        $cate = [];
        $data = [];
        foreach ($course as $val) {
            $data[$val['cateid']][] = $val;
            
            $cate[$val['cateid']] = $val['catename'];
        }
        $this->assign("course", $data);
        $this->assign("cate", $cate);
        return $this->fetch();
    }

    public function courseDetail($courseid)
    {
       
        $this->assign("data", Db::name("course")->where("courseid",$courseid)->field("courseid,name,price,type,desc,menu,content,label_img")->find());
        
        return $this->fetch();
    }
}