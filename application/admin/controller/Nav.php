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
}