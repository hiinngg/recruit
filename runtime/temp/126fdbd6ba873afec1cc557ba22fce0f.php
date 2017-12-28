<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\position\jobdetail.html";i:1514433218;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" href="/static/css/swiper.min.css" />
	<title>首页</title>
</head>
<style>
html {
	font-family:-apple-system, BlinkMacSystemFont, 'Microsoft YaHei', sans-serif;

}
    .row-center{
        display:flex;
        justify-content:center;
        align-items:center;
    }
.col-center{
    display:flex;
    flex-direction: column;
    justify-content:center;
    align-items:center;
}
.item-title p{
	margin:0;
}


</style>

<body style="margin:0;">
<div class="page">
   <!-- <header class="bar bar-nav">
        <a class="button button-link button-nav pull-left" href="/demos/card" data-transition='slide-out'>
            <span class="icon icon-left"></span>
            返回
        </a>
        <h1 class="title">我的生活</h1>
    </header>-->
    <nav class="bar bar-tab" style="background:#000000;color:#ffffff;">
        <a class="tab-item " href="<?php echo url('index/index'); ?>">

            <span class="tab-label">首页</span>
        </a>
        <a class="tab-item " href="<?php echo url('course/courseList'); ?>">

            <span class="tab-label">微课</span>
        </a>
        <a class="tab-item active" href="<?php echo url('position/jobList'); ?>">

            <span class="tab-label">找工作</span>
        </a>
        <a class="tab-item" href="<?php echo url('user/index'); ?>">
            <span class="tab-label">我的</span>
        </a>
    </nav>
    <div class="content " style="background:#ffffff;">

            <!-- Slider -->
            <div class="swiper-container" >
                <div class="swiper-wrapper">
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1n3rZHFXXXXX9XFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i4/TB10rkPGVXXXXXGapXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                    <div class="swiper-slide" ><img style="width:100%;height:226px;object-fit:cover;" src="//gqianniu.alicdn.com/bao/uploaded/i4//tfscom/i1/TB1kQI3HpXXXXbSXFXXXXXXXXXX_!!0-item_pic.jpg_320x320q60.jpg" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>


<div class="container sever">
    <div class="row row-center">
        <div class="col-50 col-center">
            <div class="text-left">
                <h4>企业名称：<?php echo $data['fullname']; ?></h4>
                <h4 class="sever">岗位名称：<?php echo $data['name']; ?></h4>
                <h4 class="sever">岗位薪酬：<?php echo $data['salary_min']; ?>-<?php echo $data['salary_max']; ?>元</h4>
            </div>

        </div>
        <div class="col-50 col-center">
      <p><a href="#" class="button button-dark">点击报名</a></p>
        </div>
    </div>


    <div class="text-center sever">
        <h2>工作描述</h2>
        <p class="sever"><?php echo $data['desc']; ?></p>
    </div>

    <div class="text-center sever">
        <h2>岗位福利</h2>
        <p class="sever">
            <?php if(is_array($data['treatment']) || $data['treatment'] instanceof \think\Collection || $data['treatment'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['treatment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <span><?php echo $vo; ?></span>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </p>
    </div>

    <div class="text-center sever">
        <h2>工厂环境</h2>
        <div class="swiper-container" id="jobDetail">
            <div class="swiper-wrapper">

                <?php if(is_array($data['position_pics']) || $data['position_pics'] instanceof \think\Collection || $data['position_pics'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['position_pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="swiper-slide row-center"  style="width:300px;">

                    <img   style="object-fit:cover;width:300px;height:150px;"   src="<?php echo $vo; ?>"  />

                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
            <div class="swiper-button-prev"  style=""></div>
            <div class="swiper-button-next" style="" ></div>
        </div>

    </div>


</div>



    </div>
</div>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>


<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script src="/static/js/swiper.min.js"></script>
<script>


$(function(){
	  $.init();
	    $.config = {router: false}
	  
	    var jobSwiper = new Swiper ('#jobDetail', {

	     

	        // 如果需要前进后退按钮
	        navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	        },

	    })	
});
  
    
    
    
</script>
</body>
</html>