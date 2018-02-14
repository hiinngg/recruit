<?php
namespace app\common\controller;

/**
 *
 * @author Administrator
 *         无限级分类
 *         生成列表
 */
class Category
{

    protected $data;
    
    protected $parentid="parentid";
    
    protected $title="name";
    
    protected $cateid="cateid";

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    
    /**  
    * 获取最终数据
    * 
    * @access public 
    * @return array 
    */  
    public function getoption(){
        
      $tree = $this->gettree($this->data);
      return $this->option($this->prefix($tree));  
        
    }
    
    
    /**  
    * 调整data顺序(递归) 
    * 
    * @access public 
    * @param mixed $cates 无序的数据
    * @param mixed $pid 父类id
    * @return array
    */  
    public function gettree($cates,$pid=0) {
        $tree=[];
        foreach ($cates as $cate){
            if( $cate[$this->parentid]==$pid ){
                $tree[]=$cate;
                $tree=array_merge($tree,$this->gettree($cates,$cate[$this->cateid]));
            }
        }
        return $tree;
    }
    
    
    /**  
    * 按照特定结构（多级菜单） 
    * 
    * @access public 
    * @param mixed $arg1 有序的数据
    * @return array 返回类型
    */  
    public function  getmenu(){
        $tree=[];
        $res = [];
        // 整理数组
        foreach ($this->data as $key => $vo) {
            $res[$vo[$this->cateid]] = $vo;
     
        }
        unset($this->data);
        
        // 查询子孙
        foreach ($res as $key => $vo) {
            if ($vo[$this->parentid] != 0) {
                $res[$vo[$this->parentid]]['children'][] = &$res[$key];
            }
        }
        
        // 去除杂质
        foreach ($res as $key => $vo) {
            if ($vo[$this->parentid] == 0) {
                $tree[] = $vo;
            }
        }
        unset($res);
       return $tree;
    }
     
    
    /**
     * 按照特定结构（多级菜单）
     *
     * @access public
     * @param mixed $arg1 有序的数据
     * @return array 返回类型
     */
    public function  getallmenu(){
        $tree=[];
        $res = [];
        // 整理数组
        foreach ($this->data as $key => $vo) {
            $res[$vo[$this->cateid]] = $vo;
             
        }
        unset($this->data);
    
        // 查询子孙
        foreach ($res as $key => $vo) {
            if ($vo[$this->parentid] != 0) {
                $res[$vo[$this->parentid]]['children'][] = &$res[$key];
            }
        }
    
        // 去除杂质
        foreach ($res as $key => $vo) {
            if ($vo[$this->parentid] == 0) {
                $tree[] = $vo;
            }
        }
        unset($res);
        return $tree;
    }
    
    
    
    
    
    /**  
    * 以符号分隔父类和子类
    * 
    * @access public 
    * @param mixed $cates 有序的数据
    * @param mixed $p 分隔符号
    * @return array 
    */  
    public function  prefix($cates,$p='|——'){
        $tree=[];
        $num=1;
        $pre=[0=>1];
        while ($val = current($cates)){
            $key=key($cates);
            if($key>0){
                if($cates[$key-1][$this->parentid]!=$val[$this->parentid]){
                    $num++;
                }
            }
            if(array_key_exists( $val[$this->parentid], $pre)){
                $num=$pre[$val[$this->parentid]];
            }
            $val[$this->title]=str_repeat($p, $num).$val[$this->title];
            $tree[]=$val;
            $pre[$val[$this->parentid]]=$num;
            next($cates);
        }
        return $tree;
    
    }
     
    
    
    /**  
    * 重新生成数组
    * 
    * @access public 
    * @param mixed $tree 有符号分隔的有序数据
    * @return array
    */  
    public function option($tree){
        //$option[]=['cateid'=>0,'title'=> '添加顶级分类'];
    
        foreach ($tree as $cate){
            $option[]=[$this->cateid=>$cate[$this->cateid],$this->title=>$cate[$this->title]];
        }
        return $option;
    }
    
}