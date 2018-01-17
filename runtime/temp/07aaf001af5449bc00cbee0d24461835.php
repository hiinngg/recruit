<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\index\index.html";i:1516007131;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516167354;}*/ ?>
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
    
<link rel="stylesheet" href="/static/css/swiper.min.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<style>

body {
    font-family: -apple-system, BlinkMacSystemFont, "PingFang SC","Helvetica Neue",STHeiti,"Microsoft Yahei",Tahoma,Simsun,sans-serif;

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
  

.company-logo{
width:8rem; 
height:4rem; 
}
.course-item p,h4{
margin:0;
}
.course-item{
width:45%;
}


</style>
<body style="height:100vh;">
<div style="position:fixed;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">
<span >首页</span>
<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>

<span class="fa fa-list" style="margin-right:10px;"></span>
</div>
  <div class="weui-tab">
    <div class="weui-tab__panel" style="width:100%;">
     <div class="content" style="width:100%;">
     
    <div class="swiper-container" id="coursel" >
            <div class="swiper-wrapper">
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1n3rZHFXXXXX9XFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i4/TB10rkPGVXXXXXGapXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1kQI3HpXXXXbSXFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>           
		     <div class="content-padded" style="padding:15px;">
		            <p><?php echo $data; ?></p>
		    </div>    
       <h2 class="text-center ">职造课程</h2>
       <div class="row-center" style="margin:0;width:100%;flex-wrap:wrap;justify-content:space-around;">
      <?php if(is_array($coursedata) || $coursedata instanceof \think\Collection || $coursedata instanceof \think\Paginator): $i = 0; $__LIST__ = $coursedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class=" course-item">
          <img src="<?php echo $vo['label_img']; ?>" style="object-fit:cover;width:100%;height:8rem;" />
       <h4><?php echo $vo['name']; ?></h4>
       <p class="text-nowrap"><?php echo $vo['desc']; ?></p>
       <p>
       <span class="fa fa-eye"></span>
       <span><?php echo $vo['pageview']; ?></span>
       <span class="pull-right"><?php echo $vo['price']; ?>元</span>
       </p>
	  </div>
	  <?php endforeach; endif; else: echo "" ;endif; ?>
	  </div>

	<div class="container sever">
	<h2 class="text-center">内推企业</h2>
	
	<div class="swiper-container sever" id="company-list">
	    <div class="swiper-wrapper ">
	        <?php if(is_array($companydata) || $companydata instanceof \think\Collection || $companydata instanceof \think\Paginator): $i = 0; $__LIST__ = $companydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	        <div class="swiper-slide company-logo">
	            <img src="<?php echo $vo['avastar']; ?>" alt=""  style="width:100%;height:100%;"   >
	        </div>
	        <?php endforeach; endif; else: echo "" ;endif; ?>
	
	    </div>
	</div>
	</div>
   
   

     </div>
    </div>
    <div class="weui-tabbar" style="position:fixed;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  weui-bar__item_on" >
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
<script src="/static/js/swiper.min.js"></script>
<script>



  var mySwiper = new Swiper ('#company-list', {
	slidesPerView : "auto",
	spaceBetween : 20,
    freeMode:true
  })
    var coursel = new Swiper ('#coursel', {
    pagination: {
     el: '.swiper-pagination',
    },
  })
    





</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    