<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 0:35
 */
namespace app\admin\controller;


use think\Db;

class User  extends  Common{


    public function UserList($page="", $limit="")
    {
        if ($this->request->isAjax()) {

            if (! isset($count)) {
                $this->count = Db::name("user")->count();
                if ($this->count == 0) {
                    $this->assign("none", "none");
                }
            }
            $res = Db::name("user")->page($page, $limit)
                ->order("createtime desc")
                ->select();

            return [
                'code' => 0,
                'msg' => "",
                "count" => $this->count ,
                'data' => $res
            ];
        }
        return $this->fetch();
    }



}