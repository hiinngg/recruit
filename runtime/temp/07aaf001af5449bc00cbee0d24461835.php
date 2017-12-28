<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\index\index.html";i:1514438765;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
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
       <a class="tab-item active" href="<?php echo url('index/index'); ?>">

            <span class="tab-label">首页</span>
        </a>
        <a class="tab-item " href="<?php echo url('course/courseList'); ?>">

            <span class="tab-label">微课</span>
        </a>
        <a class="tab-item" href="<?php echo url('position/jobList'); ?>">

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
       <h2 class="text-center">职造课程</h2>
   <div class="row content-padded row-center" style="margin:0;justify-content: space-around;">
       <?php if(is_array($coursedata) || $coursedata instanceof \think\Collection || $coursedata instanceof \think\Paginator): $i = 0; $__LIST__ = $coursedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <div class="col-30 col-center">
           <img src="<?php echo $vo['label_img']; ?>" width="146px"  height="103px"  style="object-fit:contain;" />
           <h4 style="margin-top:10px;"><?php echo $vo['name']; ?></h4>
       </div>
       <?php endforeach; endif; else: echo "" ;endif; ?>



   </div>


    </div>
</div>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>


<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script>

$(function(){
	$.init();
    $.config = {router: false}	
});
    
</script>
</body>
</html>