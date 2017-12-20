<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\course\index.html";i:1513772608;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>课程管理</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" type="text/css"
	href="/admin/layui/css/layui.css" media="all">

</head>

<style>
.panel {
	margin-bottom: 0;
}
 i{
 	
    cursor: pointer !important ; 
	cursor: hand !important;
 } 
 body{

 }

  a:hover{
	background-color:#E6E6E6 ;
 } 

.active{
	background:#E6E6E6;
}
.hide{
	display:none;
}

</style>
<body style="height:100%;">



	<div    style="height:100%;">
				<div class="panel panel-default"
					style=" position:fixed;   width: 250px; height:800px;   overflow:auto;">
					<div class="panel-body"  style=" ">
						<h4 style="text-align: center;">课程分类管理</h4>
						<ul unselectable="on" id="demo"
							style="margin-top: 30px; -moz-user-select: none; -webkit-user-select: none;"
							onselectstart="return false;"  ></ul>
							<button  id="addcate" class="layui-btn  layui-btn-primary"  style="margin-top:20px; margin-left:28px; width:70%;">添加分类</button>
					</div>
	</div>
		
	

	</div>


	<script type="text/javascript" src="/admin/layui/layui.js"></script>
	<script type="text/javascript">
 	layui.use(['jquery','layer','element','laypage','form','tree'],function(){
	      window.jQuery = window.$ = layui.jquery;
	      window.layer = layui.layer;
	      var form  =  layui.form;
	      var elem = layui.element;
	  	  

		  //初始化layer.tree
		   var tree = layui.tree({
 	    	  elem: '#demo',
 	    	  nodes:<?php echo $tree; ?>
 	    	});	
	  	  
			window.onload=function(){

	  		  	 //删除layui-tree 自带的样式    
	  		      $("i.layui-tree-branch").remove();
	  		      $("i.layui-tree-leaf").remove();
	  			  //添加操作的图标
	  			  $("ul#demo").find("a").after("<i  class='layui-icon select hide add' )'>&#xe608;</i> <i    class='layui-icon edit select hide'>&#xe642;</i> <i    class='layui-icon del select hide'>&#xe640;</i> ")	  
	  			  $("ul#demo").find("li").each(function(){
	  				    var id = $(this).children("a").attr("href");
	  				    $(this).children("a").attr("href","../course/courseByCate?id="+id);
	  				    $(this).attr("id",id)
	  			  })
	  		}

//添加顶级分类
	$("#addcate").on("click",function(){
		layer.prompt({title: '输入分类名称，并确认', formType:0}, function(text, index){
			  layer.close(index);
			 $.ajax({
				 url:"<?php echo url('addCate'); ?>",
				 data:{pid:0,name:text},
				 type:"post",
				 beforeSend:function(){
					layer.load(2) 
				 },
				 success:function(data){
					 layer.closeAll();
					 if(data.code==1){
						 $("ul#demo").append("<li  pid='0'   id="+(data.cateid)+"><a href='../cproduct/search?id="+data.cateid+"'  target='aaa' ><cite>"+text+"</cite> </a><i  class='layui-icon select hide add' )'>&#xe608;</i> <i    class='layui-icon edit select hide'>&#xe642;</i> <i    class='layui-icon del select hide'>&#xe640;</i></li>");
					 }else{
						 layer.msg(data)
					 }
				 },
				 complete:function(){
					 layer.closeAll("loading");
				 } 
			 })
			});	
})
//显示/隐藏 分类的操作栏
$("ul#demo").on({
    mouseover: function(event) {
   	  event.stopPropagation();
      $(this).children(".select").removeClass("hide")
    },
    
    mouseout: function(event) { 
     event.stopPropagation(); 
     $(this).children(".select").addClass("hide")
    }, 

},"li","a")

//添加子分类
$("ul#demo ").on("click","li .add",function(){
     var pid = $(this).closest("li").attr("id");
     var that= $(this).closest("li");
 	layer.prompt({title: '输入子分类名称，并确认', formType:0}, function(text, index){
		  layer.close(index);
		 $.ajax({
			 url:"<?php echo url('addCate'); ?>",
			 data:{pid:pid,name:text},
			 type:"post",
			 beforeSend:function(){
				layer.load(2) 
			 },
			 success:function(data){
				 layer.closeAll();
				 if(data.code==1){
					 if(that.children("ul").length == 0){
						 //表示要新增   i 以及 ul 标签
						 that.prepend('<i class="layui-icon layui-tree-spread">&#xe625;</i>')
						 that.append("<ul class='layui-show'><li  pid="+pid+"   id="+(data.cateid)+"><a href='../cproduct/search?id="+data.cateid+"'  target='aaa' ><cite>"+text+"</cite> </a><i  class='layui-icon select hide add' )'>&#xe608;</i> <i    class='layui-icon edit select hide'>&#xe642;</i> <i    class='layui-icon del select hide'>&#xe640;</i></li></ul>")
					 }else{
						that.children("ul").append("<li pid="+pid+"    id="+(data.cateid)+"><a href='../cproduct/search?id="+data.cateid+"'  target='aaa' ><cite>"+text+"</cite> </a><i  class='layui-icon select hide add' )'>&#xe608;</i> <i    class='layui-icon edit select hide'>&#xe642;</i> <i    class='layui-icon del select hide'>&#xe640;</i></li>"); 
					 }
				 }else{
					 layer.msg(data)
				 }
			 },
			 complete:function(){
				 layer.closeAll("loading");
			 } 
		 })
		});	
})
//重命名
$("ul#demo ").on("click","li .edit",function(){
   var node=$(this).parent().children("a").children("cite");
   var id=$(this).parent().attr("id")
   var that= $(this).closest("li");
 	layer.prompt({title: '输入新的分类名称，并确认',value:node.text(), formType:0}, function(text, index){
		  layer.close(index);
		 $.ajax({
			 url:"<?php echo url('editCate'); ?>",
			 data:{id:id,name:text},
			 type:"post",
			 beforeSend:function(){
				layer.load(2) 
			 },
			 success:function(data){
				 layer.closeAll();
				 if(data == 1){
			      node.text(text);
				 }else{
					 layer.msg(data)
				 }
			 },
			 complete:function(){
				 layer.closeAll("loading");
			 } 
		 })
		});	
})
//删除分类
$("ul#demo ").on("click","li .del",function(){
	
	  var that= $(this).closest("li");
	if(that.children("ul").length > 0){
		layer.msg("该分类下含有子分类不能删除")
		return;
	}
   var id=$(this).parent().attr("id")

 layer.confirm('确定要删除？该分类下的课程亦将删除！', {
  btn: ['删除','取消'] 
}, function(){
	 $.ajax({
		 url:"<?php echo url('delCate'); ?>",
		 data:{id:id},
		 type:"post",
		 beforeSend:function(){
			layer.load(2) 
		 },
		 success:function(data){
			 layer.closeAll();
			 if(data == 1){
			 
		       if((that.parent("ul").children("li").length == 1)&&(that.parent("ul").parent("li").children("i.layui-tree-spread").length=1)){
		    	   //要把分类名前的三角符号和ul标签删除
		    	    that.parent("ul").parent("li").children("i.layui-tree-spread").remove();		   
		       }
		      that.remove()
			 }else{
				 layer.msg(data)
			 }
		 },
		 complete:function(){
			 layer.closeAll("loading");
		 } 
	 })
});

})
//打开/关闭菜单
 	
	$("ul#demo").on({
	
	click:function(event){
		event.stopPropagation();
		event.preventDefault();
		if( $(this).parent().children("ul").hasClass("layui-show")){
			
			  spread=false;
			  $(this).html("&#xe623;");
	    	  $(this).parent().children("ul").removeClass("layui-show");
	    	  return;
		}else{	
			
			spread=true;
	     $(this).html("&#xe625;");
   		 $(this).parent().children("ul").addClass("layui-show"); 
   		return;
		} 
	   return;
	}	
},  'i.layui-tree-spread');  

 	      	
 }); 

</script>



</body>

</html>