<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\company\reg.html";i:1516282020;s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516279864;}*/ ?>
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

  

.bg:after{
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    background-color: #ffffff;
    opacity: 0.3;
    z-index: 0;
    width: 100%;
    height: 100%;
}
.weui-cell:before,.weui-cell:after,.weui-cells:after, .weui-cells:before{
display:none;
}
.weui-cell input{

background:#ffffff;
border-radius:5px;
padding-left:10px;
border:1px solid #ccc;
}
.weui-uploader__input-box{
float:none;
width:175px;height:100px;
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
     
<div class="bg" style="position:relative;z-index:0;background-image:url('/static/images/user.png');background-size:cover;height:100vh; width:100%;overflow:scroll;background-attachment: fixed;">

<div class="weui-cells weui-cells_form " style="position:absolute;z-index:1;width:100%;min-height:100vh; background-color: rgba(0,0,0,0);">
	 <div class="weui-cell" >
	  <div class="weui-cell__hd" ><label class="weui-label">企业名称</label></div>
	    <div class="weui-cell__bd" >
	      
	      <input class="weui-input"  name="username" type="text"  >
	    </div>
	  </div>
	   <div class="weui-cell" >
	  <div class="weui-cell__hd"><label class="weui-label">登录密码</label></div>
	    <div class="weui-cell__bd" >
	      <input class="weui-input" name="userpass" type="password"  >
	    </div>
	  </div>
	   <div class="weui-cell" >
	  <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
	    <div class="weui-cell__bd" >
	      
	      <input class="weui-input" name="userpass" type="password"  >
	    </div>
	  </div>
	   <div class="weui-cell" >
	   <div class="weui-cell__hd"><label class="weui-label">HR联系电话</label></div>
	    <div class="weui-cell__bd" >
	       
	      <input class="weui-input" name="userpass" type="password" >
	    </div>
	  </div>
	  
	  <h4  style="margin-left:10px; color:#1881EC;">完成以下信息成为内推企业</h4>
	  
	   <div class="weui-cell" >
	   <div class="weui-cell__hd"><label class="weui-label">企业全称</label></div>
	    <div class="weui-cell__bd" >
	       
	      <input class="weui-input" name="userpass" type="password" >
	    </div>
	  </div>
	   <div class="weui-cell" >
	   <div class="weui-cell__hd"><label class="weui-label">企业地址</label></div>
	    <div class="weui-cell__bd" >
	       
	      <input class="weui-input" name="userpass" type="password" >
	    </div>
	  </div>
   <div class="weui-cell">
    <div class="weui-cell__bd">
      <div class="weui-uploader">
       <div class="weui-uploader__hd">
          <p class="weui-uploader__title">企业LOGO</p>   
        </div>

           <div class="weui-uploader__input-box" style="width: 128px;height: 64px;">
            <input id="uploaderInput1" class="weui-uploader__input"  type="file" accept="image/*" multiple="">
               <span style="position:absolute;bottom:0;right:-128px;">128px*64px</span>
          </div>
      </div>
     </div>
    </div>
	  
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <div class="weui-uploader">
       <div class="weui-uploader__hd">
          <p class="weui-uploader__title">办公环境</p>   
        </div>

           <div class="weui-uploader__input-box">
            <input id="uploaderInput2" class="weui-uploader__input"  type="file" accept="image/*" multiple="">
           <span style="position:absolute;bottom:0;right:-50%;">企业门口</span>
          </div>
           <div class="weui-uploader__input-box">
            <input id="uploaderInput3" class="weui-uploader__input"  type="file" accept="image/*" multiple="">
           <span style="position:absolute;bottom:0;right:-50%;">办公环境</span>
           </div>
           <div class="weui-uploader__input-box">
            <input id="uploaderInput4" class="weui-uploader__input"  type="file" accept="image/*" multiple="">
          <span style="position:absolute;bottom:0;right:-50%;">办公环境</span>
          </div>
      </div>
     </div>
    </div>

    <a href="javascript:;" class="weui-btn weui-btn_plain-default" style="margin:0 15px;">提交</a>
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






$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "企业后台",
		    onClick: function() {
		      window.location.href="<?php echo url('company/login'); ?>"
		    }
		  },{
		    text: "删除",
		    onClick: function() {
		      //do something
		    }
		  }]
		});
	
})


</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    