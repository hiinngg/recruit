<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\company\login.html";i:1516326805;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516351781;}*/ ?>
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
  .content{
	margin-top:35px;
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

  

.bg:after{
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    background-color: #ffffff;;
    opacity: 0.5;
    z-index: 0;
    width: 100%;
    height: 100%;
}



</style>
<body style="overflow:hidden;height:100vh;">
<div style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">

<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span >首页</span>
<span class="fa fa-list menu" style="margin-right:10px;"></span>
</div>
  <div class="weui-tab">
    <div class="weui-tab__panel" style="width:100%;overflow:scroll;">
     <div class="content" style="width:100%;">
     
<div class="bg" style="position:relative;z-index:0;background-image:url('/static/images/login.png');background-size:cover;min-height:100vh; width:100%;overflow:hidden;background-attachment: fixed;">

<div style="position:absolute;z-index:1; border-radius:20px; top: 40%;left: 50%;transform: translate(-50%, -50%);width:80%;background:#ffffff;margin:0 auto;padding:15px;">
<p class="text-center">企业入口</p>
	<div class="weui-cells weui-cells_form">
	 <div class="weui-cell" style="background:#eee;border-radius:10px;">
	  
	    <div class="weui-cell__bd" >
	      <input class="weui-input"  name="username" type="text"  placeholder="用户名">
	    </div>
	  </div>
	   <div class="weui-cell" style="background:#eee;margin-top:10px;border-radius:10px;">
	 
	    <div class="weui-cell__bd" >
	      <input class="weui-input" name="userpass" type="password"  placeholder="密码">
	    </div>
	  </div>
	</div>
	<div class="sever text-center">
	<a href="javascript:;"  class=" weui-btn weui-btn_mini  weui-btn_plain-default login">登录</a>
	<p >还没有账号，去 <a style="color:#1881EC;" href="<?php echo url('company/reg'); ?>">注册</a></p>
    </div>
	
	</div>
</div>

     </div>
    </div>
    <div class="weui-tabbar" style="position:absolute;bottom:0;z-index:1000;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  " >
            <p class="weui-tabbar__label" style="line-height:2.5;">微信</p>
        </a>
        <a href="<?php echo url('course/courselist'); ?>" class="weui-tabbar__item ">

            <p class="weui-tabbar__label" style="line-height:2.5;">微课</p>
        </a>
        <a href="<?php echo url('job/joblist'); ?>" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">找工作</p>
        </a>
        <a href="<?php echo url('user/index'); ?>" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">我的</p>
        </a>
    </div>
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
$(".login").on("click",function(){
if($("input[name='username']").val()==""||$("input[name='userpass']").val()==""){
	$.toptip('请输入用户名或密码', 'error');
	return;
}
$.ajax({
  url:"<?php echo url('company/login'); ?>",
  data:{username:$("input[name='username']").val(),userpass:$("input[name='userpass']").val()},
  type:"post",
  beforeSend:function(){
      $.showLoading()
  },
  success:function(data){
	  if(data==1){
	  $.toptip('登录成功', 'success');
	  setTimeout(function(){
	   location.href="<?php echo url('company/index'); ?>"
	  },1000)
	
	  }else{
	   $.toptip('用户名或密码错误', 'error');
	  }
  },
  complete:function(){
   $.hideLoading()
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
    