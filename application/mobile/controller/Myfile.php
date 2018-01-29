<?php
namespace  app\mobile\controller;


use think\Db;
use app\common\controller\Download;

class Myfile {
    
    public function evalDownload($evalid){
        $download=new Download(Db::name("evaluation")->where("evalid",$evalid)->value("path"));
        $download->download();
    }
    
    
}