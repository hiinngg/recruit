<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\position\joblist.html";i:1514438794;}*/ ?>
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
 <div class="buttons-tab">
    <a href="#tab1" class="tab-link active button">所有企业</a>
    <a href="#tab2" class="tab-link button">入职补贴</a>
    <a href="#tab3" class="tab-link button">求职须知</a>
  </div>
  <div class="content-block">
    <div class="tabs">
      <div id="tab1" class="tab active">
        <div class="content-block">
         <!-- 所有企业 -->
          <div class="list-block">
			    <ul>
			    <?php if(is_array($position) || $position instanceof \think\Collection || $position instanceof \think\Paginator): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			     <li class="item-content  job    {neq name="$vo.is_subsidy" value="1"}item-link {neq}"   data-poid="<?php echo $vo['poid']; ?>">
			      <?php if($vo['is_subsidy'] != '1'): ?>
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			      <?php endif; ?>
			   
			        <div class="item-inner">
			          <div class="item-title">
			          <p><?php echo $vo['name']; ?></p>
			          <p style="font-size:14px;">XXXXXX</p>
			          <p><?php echo $vo['salary_min']; ?>-<?php echo $vo['salary_max']; ?>元</p>
			          </div>	
			          
			          <?php if($vo['is_subsidy'] == '1'): ?>
			          <img src="/static/images/a123.png"  width="96px"  height="72px" alt="" />
			          <?php endif; ?>		     
			        <!--   <img src="/static/images/a123.png"  width="96px"  height="72px" alt="" /> -->
			        </div>
			      </li>
			    <?php endforeach; endif; else: echo "" ;endif; ?> 
			    </ul>
        </div>
         
         
        </div>
      </div>
      <div id="tab2" class="tab">
        <div class="content-block">
         <div class="list-block">
			    <ul>
			    <?php if(is_array($subsidy) || $subsidy instanceof \think\Collection || $subsidy instanceof \think\Paginator): $i = 0; $__LIST__ = $subsidy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			     <li class="item-content  job   {neq name="$vo.is_subsidy" value="1"}item-link {neq}"  data-poid="<?php echo $vo['poid']; ?>">
			      <?php if($vo['is_subsidy'] != '1'): ?>
			        <div class="item-media"><i class="icon icon-f7"></i></div>
			      <?php endif; ?>
			   
			        <div class="item-inner">
			          <div class="item-title">
			          <p><?php echo $vo['name']; ?></p>
			          <p style="font-size:14px;">XXXXXX</p>
			          <p><?php echo $vo['salary_min']; ?>-<?php echo $vo['salary_max']; ?>元</p>
			          </div>	
			          
			          <?php if($vo['is_subsidy'] == '1'): ?>
			          <img src="/static/images/a123.png"  width="96px"  height="72px" alt="" />
			          <?php endif; ?>		     
			        <!--   <img src="/static/images/a123.png"  width="96px"  height="72px" alt="" /> -->
			        </div>
			      </li>
			    <?php endforeach; endif; else: echo "" ;endif; ?> 
			    </ul>
        </div>
        </div>
      </div>
      <div id="tab3" class="tab">
        <div class="content-block">
               <h2 class="text-center">求职须知</h2>
          <p>内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>

<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script>
$(function(){
	  $.init();
	    $.config = {router: false}
	    $(".job").on("click",function(){
	    	id=$(this).attr("data-poid");
	    	location.href='jobDetail?poid='+id
	    	
	    })
});
  
    
</script>
</body>
</html>