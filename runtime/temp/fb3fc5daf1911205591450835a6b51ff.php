<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\wamp3\wamp64\www\recruit\public/../application/position\view\index\index.html";i:1516357236;s:83:"D:\wamp3\wamp64\www\recruit\public/../application/position\view\positionlayout.html";i:1516353666;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
	<title>企业直聘</title>
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

  

.weui-navbar:after,.weui-navbar__item:after,.hidden{
display:none; 
}
.weui-navbar__item.weui-bar__item--on{
color:#1881ec;
background:#ffffff;
}


</style>
<body style="overflow:hidden;height:100vh;">
<div style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:center;border-bottom:1px solid #eee;">

<span class="fa fa-angle-left" style="margin-left:10px;display:none;"></span>
<span >首页</span>

</div>
 <div style="width:100%;height:155px;">
<img src="/static/images/user.png" alt="" style="width:100%;height:100%;" />
</div>
 <div class="" style="height:100%;padding:0 15px 60px 15px;">

 

<div class="weui-tab">
  <div class="weui-navbar">
    <a class="weui-navbar__item weui-bar__item--on" href="#tab1">
      所有企业
    </a>
    <a class="weui-navbar__item" href="#tab2">
      入职补贴
    </a>
   <a class="weui-navbar__item" href="#tab2">
     求职须知
    </a>
  </div>
  <div class="weui-tab__bd">
    <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
        <div class=" jobs " style="margin:0;width:100%;background:#eee;">
	      <div class="row-center" style="width:100% ;height:100px;align-items:center;margin:15px 0;background:#ffffff;">
		      
		        <img src="/static/images/user.png" alt="" style="width:40%; height:100%;" />
		   
		      <div class="row-center" style="width:60%;height:100%;flex-wrap:wrap;"> 
		        <div class="col-center" style="width:80%;height:80%;justify-content:space-around;" >
			       <h5>中山长虹电器有限公司</h5>
			       <p class="texts-hide" style="font-size:9px;padding-left:3px;"></p> 
		        </div>
		        <img src="/static/images/subsidy.png" alt="" style="width:20%; height:80%;object-fit:contain;" /> 
		        <p class="row-center" style="justify-content:space-between; flex-basis:100%;flex-shrink:0;"><span  style="font-size:9px;padding-left:3px;"   >已有321人报名</span><span>3000-5000</span></p>
		      </div>
	      </div>
	       <div class="row-center" style="width:100% ;height:100px;align-items:center;margin:15px 0;background:#ffffff;">
		      
		        <img src="/static/images/user.png" alt="" style="width:40%; height:100%;" />
		   
		      <div class="row-center" style="width:60%;height:100%;flex-wrap:wrap;"> 
		        <div class="col-center" style="width:80%;height:80%;justify-content:space-around;" >
			       <h5>中山长虹电器有限公司</h5>
			       <p class="texts-hide" style="font-size:9px;padding-left:3px;"></p> 
		        </div>
		        <img src="/static/images/subsidy.png" alt="" style="width:20%; height:80%;object-fit:contain;" /> 
		        <p class="row-center" style="justify-content:space-between; flex-basis:100%;flex-shrink:0;"><span  style="font-size:9px;padding-left:3px;"   >已有321人报名</span><span>3000-5000</span></p>
		      </div>
	      </div>
	  </div><!-- item -->
      
      
     <div class="text-center  hidden">
          <a href="javascript:;"  data-currentpage="1"  data-cateid=""   style="margin-top:15px;"  class="weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips">暂无更多数据</span>
	</div><!-- no more -->
    </div><!-- tab -->
    
    
    
    
    <div id="tab2" class="weui-tab__bd-item">
      <h1>页面二</h1>
    </div>
  <div id="tab3" class="weui-tab__bd-item">
      <h1>页面三</h1>
    </div>
  </div>
</div>



 </div>
 <div class="weui-footer " style="background:#eee;color:#333;position:absolute;bottom:0;width:100%;height:60px;">
  <p class="weui-footer__links">
    <a href="javascript:void(0);" class="weui-footer__link">首页</a>
    <a href="javascript:void(0);" class="weui-footer__link">关于我们</a>
      <a href="javascript:void(0);" class="weui-footer__link">企业入口</a>
  </p>
  <p class="weui-footer__text">企业直聘网：为您匹配理想的打工生活</p>
    <p class="weui-footer__text">企业直聘 © 2008-2016 </p>
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










</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    