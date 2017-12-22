<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;

class Team  extends  Common{
    
    
    public function  teamList($page="",$limit=""){
        
             if (!isset($count)) {
                    $this->count = Db::name("page")->where("column","团队定制")->count();
                    if ($this->count == 0) {
                        $this->assign("none", "none");
                    }
                }
                if ($this->request->isAjax()) {
                    // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
                    $result = Db::name("page")
                        ->where("column","团队定制")
                        ->order("createtime desc")
                        ->page($page, $limit)
                        ->select();
        
                    return json([
                        'code' => 0,
                        'msg' => "",
                        "count" => $this->count,
                        "data" => $result
                    ]);
        
                }
        
         return $this->fetch();     
    }
    
    
}