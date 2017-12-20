<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

class Nav extends Common
{

    public function navList()
    {
        if ($this->request->isAjax()) {
            
            if (! isset($count)) {
                $this->count = Db::name("nav")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            
            $res = Db::name("nav")->order("sortid")->select();
           
            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count,
                'data' => $res
            ];
        }
        return $this->fetch();
    }

   public function  sortChange(){

        $post=$this->request->post();

        Db::name("nav")->where("sortid",$post['sortid']-1)->setInc("sortid");
        Db::name("nav")->where("navid",$post['navid'])->setDec('sortid');

        return 1;


    }

    public function statusChange()
    {
        $post = $this->request->post();
        if (Db::name('nav')->where("navid", $post['navid'])->update([
            'status' => $post['status']
        ])) {
            return 1;
        } else {
            return 0;
        }
    }

    public function nameChange(){
        $post = $this->request->post();
        if (Db::name('nav')->where("navid", $post['navid'])->update([
            'name' => $post['name']
        ])) {
            return 1;
        } else {
            return 0;
        }


    }
}