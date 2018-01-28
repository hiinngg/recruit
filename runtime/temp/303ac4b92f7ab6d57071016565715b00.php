<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\course\detail.html";i:1517036580;s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1517035579;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
	<title>小猫直聘</title>
<!-- 	<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css"> -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/weui/1.1.2/style/weui.min.css">
   <link rel="stylesheet" href="https://cdn.bootcss.com/jquery-weui/1.2.0/css/jquery-weui.min.css">
   <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
</head>
<style>

body {
    font-family: -apple-system, BlinkMacSystemFont, "PingFang SC","Helvetica Neue",STHeiti,"Microsoft Yahei",Tahoma,Simsun,sans-serif;
    box-sizing:border-box;
	margin:0;
	padding:0;
}
.row-center{
	display:flex;
	align-items:center;
	justify-content:center;
}
.col-center{
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
}
.sever{
	margin-top:30px;
}
.hidden{
    display:none;
}
.line-indent{
	text-indent:2em;
}
.text-nowrap{
	white-space:nowrap; 
	text-overflow:ellipsis; 
	-o-text-overflow:ellipsis; 
	overflow: hidden; 
}
.weui-bar__item_on P{
	color:#1881EC !important;
}
  .course-item p{
   margin:0;
  	white-space:nowrap; 
text-overflow:ellipsis; 
-o-text-overflow:ellipsis; 
overflow: hidden; 
  }

  
  .weui-tabbar__label{
	font-size:16px;
  }
  .text-center{
	text-align:center;
  }
.texts-hide{
	width:100%;
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 3;
overflow: hidden;
word-wrap:break-word;
word-break: break-all;
}
.text-hide{
	width:100%;
overflow: hidden;
text-overflow:ellipsis;
white-space: nowrap;
word-wrap:break-word;
word-break: break-all;

}
.weui-toptips{
	z-index:2000;
}

  


.course-item p,h4{
margin:0;
}
.cate-item{
color:#000000;
}
.cate-item:hover,.cate-item:active,.cate-item:focus{
color:#1881EC;
}
.weui-navbar:after,.weui-navbar__item:after,.hidden{
display:none; 
}
.weui-navbar__item.weui-bar__item--on{
color:#1881ec;
background:#ffffff;
}
.course-item p,h4{
margin:0;
}
.course-item{
width:45%;
}




</style>
<body style="">
<!--<div style="position:fixed;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">

<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span >首页</span>
<span class="fa fa-list menu" style="margin-right:10px;"></span>
</div>-->
  <div class="main" style="position:absolute;overflow-y: scroll;top:0;bottom:50px;width:100%;-webkit-overflow-scrolling: touch;" >
   
     <div class="content" style="width:100%;height:auto;">
     
<!-- <div>
<img src="/static/images/zzz.jpg" style="width:100%;object-fit:contain;" alt="" />
</div>  -->
<h3 class="text-center"><?php echo $data['name']; ?></h3>
<div class="" >
	   <img src="<?php echo $data['label_img']; ?>" height="200px;" style="object-fit:contain;" width="100%" />
</div>
	<div class="sever row-center" style="padding:0  8px;line-height:2;">
	   
	   <div class=" col-center" style="align-items:flex-start;width:60%;">
	   <p><span style="font-weight:bold;">课程形式：</span><span><?php echo $data['type']; ?></span></p>
	   <p><p><strong >课程简介：</strong></p><p ><?php echo $data['desc']; ?></p></p>
	   </div>
	   
	   <div class="col-md-3 col-center"  style="justify-content:space-between;width:40%;">

	<h3 style="color:#1881EC;">&yen;&nbsp;<?php echo $data['price']; ?>元 </h3>
	<small >已有<?php echo $data['apply']; ?>人报名</small>
	<a href="javascript:;" data-courseid="<?php echo $data['courseid']; ?>" class="weui-btn weui-btn_plain-default weui-btn_mini apply" style="background:#1881EC;color:#ffffff;border-color:#ffffff;">马上报名</a>
     
	</div>
	   
	</div>
	
	<div class="weui-tab">
  <div class="weui-navbar">
    <a class="weui-navbar__item weui-bar__item--on" href="#tab1">
     课程介绍
    </a>
    <a class="weui-navbar__item" href="#tab2">
     课程目录
    </a>
  
  </div>
  <div class="weui-tab__bd" >
    <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active" style="padding:0 10px;">
     <?php echo $data['content']; ?>
    </div>
    <div id="tab2" class="weui-tab__bd-item">
     <p style="padding:0 10px;"><?php echo $data['menu']; ?></p>
    </div>

  </div>
</div>
	



    </div>

</div>
      <div class="weui-tabbar" style="position:fixed;bottom:0;z-index:1000;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  " >
            <p class="weui-tabbar__label" style="line-height:2.5;">首页</p>
        </a>
        <a href="<?php echo url('course/courselist'); ?>" class="weui-tabbar__item weui-bar__item_on">

            <p class="weui-tabbar__label" style="line-height:2.5;">微课</p>
        </a>
        <a href="<?php echo url('job/joblist'); ?>" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">找工作</p>
        </a>
        <a href="<?php echo url('user/index'); ?>" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">我的</p>
        </a>
    </div>
  
  
  
 <!--    <div class="panel-overlay"></div>
    Left Panel with Reveal effect
    <div class="panel panel-left panel-reveal">
        <div class="content-block">
            <p>这是一个侧栏</p>
            <p></p>
            Click on link with "close-panel" class will close panel
            <p><a href="#" class="close-panel">关闭</a></p>
        </div>
    </div>  -->
<!--    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
   <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script> -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="/static/js/swiper.min.js"></script>

<script>




$(function(){


$(".apply").on("click",function(){
var courseid = $(this).attr("data-courseid")
$.ajax({
url:"<?php echo url('apply'); ?>",
data:{courseid:courseid},
type:"post",
beforeSend:function(){

$.showLoading()
},
success:function(data){
$.hideLoading();
if(data==1){
 
     $.alert('<p>报名成功</p>','');
}else{
$.alert(data,'');
}
}

})


})



})




  




$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "企业后台",
		    onClick: function() {
		      window.location.href="<?php echo url('company/login'); ?>"
		    }
		  }]
		});
	
})




</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    