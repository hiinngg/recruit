<?php
namespace  app\position\controller;


use think\Controller;
use think\Db;

class Index extends Controller{
    
   public function index(){
       
       
      return $this->fetch();
   } 
   public  function allposition(){
       
      // $data=Db::view("position","*")->view("company","name,fullname","")
   }
    
}