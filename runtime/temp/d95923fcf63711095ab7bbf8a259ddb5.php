<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\course\courselist.html";i:1514601116;}*/ ?>
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
    .course-item p{
	    margin:0;
    	white-space:nowrap; 
		text-overflow:ellipsis; 
		-o-text-overflow:ellipsis; 
		overflow: hidden; 
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
        <a class="tab-item active" href="<?php echo url('course/courseList'); ?>">

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
        <h3 class="text-center" style="margin-top:0;">课程分类</h3>
   
        
        
        <div class="buttons-tab" style="overflow: scroll;">
        
             
         <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
       <a href="#tab<?php echo $key; ?>" class="tab-link <?php if($i == '1'): ?>active<?php endif; ?> button"><?php echo $vo; ?></a>
        <?php endforeach; endif; else: echo "" ;endif; ?>


        </div>
        <div class="content-block">
            <div class="tabs">
       <?php if(is_array($course) || $course instanceof \think\Collection || $course instanceof \think\Paginator): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    
    
    
       <div id="tab<?php echo $key; ?>" class="row  tab <?php if($i == '1'): ?>active<?php endif; ?>">
      <h3 class="text-center" style="margin-bottom:30px;"><?php echo $cate[$key]; ?></h3>
    <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cour): $mod = ($i % 2 );++$i;?>
        <div class="col-50   course-item" data-id="<?php echo $cour['courseid']; ?>">
	       <img src="<?php echo $cour['label_img']; ?>" alt="" style="width:146px;height:103px;"/>
	       <p  class="course-name"><?php echo $cour['name']; ?></p>
	       <p><?php echo $cour['desc']; ?></p>
	       <p>&yen;<?php echo $cour['price']; ?></p>
	    </div>
	
    <?php endforeach; endif; else: echo "" ;endif; ?>

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

    $(".course-item").on("click",function(){
        var id=$(this).attr("data-id");
        location.href="../course/courseDetail?courseid="+id;

    })


    $.config = {router: false}
    $.init();

});
</script>
</body>
</html>