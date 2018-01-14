<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\index\index.html";i:1515897373;s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1515897373;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
	<title>小猫直聘</title>
	<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">

    
<link rel="stylesheet" href="/static/css/swiper.min.css" />
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
  .course-item p{
   margin:0;
  	white-space:nowrap; 
text-overflow:ellipsis; 
-o-text-overflow:ellipsis; 
overflow: hidden; 
  }

.company-logo{
width:8rem; 
height:4rem; 
}
.course-item p,h4{
margin:0;
}


</style>
<body>
   <div class="page-group">
        <!-- 单个page ,第一个.page默认被展示-->
        <div class="page">
            <!-- 标题栏 -->
            <header class="bar bar-nav">
              <h1 class="title">标题</h1>  
               <span class="icon icon-menu pull-right"></span>
            </header>

            <!-- 工具栏 -->
            <nav class="bar bar-tab">
		     <nav class="bar bar-tab" style="color:#1881EC;">		 
		      <a class="tab-item  external  active" href="<?php echo url('index/index'); ?>">
		           <span class="tab-label">首页</span>
		      </a>
		      <a class="tab-item external " href="<?php echo url('course/courseList'); ?>">
		            <span class="tab-label">微课</span>
		      </a>
	          <a class="tab-item external " href="<?php echo url('position/jobList'); ?>">
              <span class="tab-label">找工作</span>
              </a>

	          <a class="tab-item external  " href="<?php echo url('user/index'); ?>">
	            <span class="tab-label">我的</span>
	          </a>
		    </nav>
            </nav>

            <!-- 这里是页面内容区 -->
            <div class="content">
                <div class="content-block" style="margin-top:0;">
    <div class="swiper-container" id="coursel" >
            <div class="swiper-wrapper">
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1n3rZHFXXXXX9XFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i4/TB10rkPGVXXXXXGapXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1kQI3HpXXXXbSXFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            
		     <div class="content-padded">
		            <p><?php echo $data; ?></p>
		    </div>    
       <h2 class="text-center ">职造课程</h2>
       <div class="row  " style="margin:0;">
      <?php if(is_array($coursedata) || $coursedata instanceof \think\Collection || $coursedata instanceof \think\Paginator): $i = 0; $__LIST__ = $coursedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class="col-50 course-item">
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
        </div>

        <!-- 其他的单个page内联页（如果有） -->
       
       
       

    </div>

    <!-- popup, panel 等放在这里 -->
    
    
    
    
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
<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>

<script src="/static/js/swiper.min.js"></script>
<script>
$(function(){

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
    


$.init();

});
</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    