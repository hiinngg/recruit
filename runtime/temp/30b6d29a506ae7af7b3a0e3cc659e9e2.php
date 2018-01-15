<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\course\courselist.html";i:1516012238;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516011592;}*/ ?>
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
body,html{
	font-family:"Helvetica Neue", Helvetica, Arial, "PingFang SC", "Hiragino Sans GB", "Heiti SC", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
	color:#333;
	font-size:16px;
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
  

.course-item p,h4{
margin:0;
}
.cate-item{
color:#000000;
}
.cate-item:hover,.cate-item:active,.cate-item:focus{
color:#1881EC;
}


</style>
<body style="height:100vh;">
<div style="position:fixed;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">
<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span class="fa fa-list" style="margin-right:10px;"></span>
</div>
  <div class="weui-tab">
    <div class="weui-tab__panel" style="width:100%;">
     <div class="content" style="width:100%;">
     
<div class="content-padded"   style="height:30px;">
<p></p>
</div>  

<div class="swiper-container sever" id="cates"  style="border-bottom:1px solid #eee;padding:0 15px;">

    <div class="swiper-wrapper">
       <div class="swiper-slide" style="width:auto;line-height:2;">
         <a href="#" style="margin:0;color:#1881Ec;">职造课程</a>
       </div>
    <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="swiper-slide" style="width:auto;line-height:2;">
	        <div class="weui-navbar__item weui_bar__item_on" style="padding:0;">
	                   <?php echo $vo['name']; ?>
	        </div>
        </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
	<div class="tabs">
	   <div id="tab0"    class="tab row active  infinite-scroll courselist">
       
         </div>


	   <div id="tab1" class="tab row  infinite-scroll courselist"></div>
	   <div id="tab2" class="tab  row  infinite-scroll courselist"></div>
	</div>





     </div>
    </div>
    <div class="weui-tabbar" style="position:fixed;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  " >
            <p class="weui-tabbar__label" style="line-height:2.5;">微信</p>
        </a>
        <a href="<?php echo url('course/courselist'); ?>" class="weui-tabbar__item weui-bar__item_on">

            <p class="weui-tabbar__label" style="line-height:2.5;">微课</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">找工作</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item ">
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




var cates = new Swiper('#cates',{
slidesPerView :'auto',
spaceBetween : 20,
})

var loading = false;  //状态标记
$(document.body).infinite().on("infinite", function() {
  if(loading) return;
  loading = true;
  setTimeout(function() {
    $("#list").append("<p> 我是新加载的内容 </p>");
    loading = false;
  }, 1500);   //模拟延迟
});








</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    