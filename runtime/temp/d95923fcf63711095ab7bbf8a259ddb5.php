<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\course\courselist.html";i:1514387236;}*/ ?>
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
<dv class="page">
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
        <a class="tab-item active" href="#">

            <span class="tab-label">微课</span>
        </a>
        <a class="tab-item" href="#">

            <span class="tab-label">找工作</span>
        </a>
        <a class="tab-item" href="#">
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
            <a href="#tab1" class="tab-link active button">全部</a>
            <a href="#tab2" class="tab-link button">待付款</a>
            <a href="#tab3" class="tab-link button">待发货</a>
            <a href="#tab2" class="tab-link button">待付款</a>
            <a href="#tab3" class="tab-link button">待发货</a>
            <a href="#tab2" class="tab-link button">待付款</a>
            <a href="#tab3" class="tab-link button">待发货</a>
            <a href="#tab2" class="tab-link button">待付款</a>
            <a href="#tab3" class="tab-link button">待发货</a>

        </div>
        <div class="content-block">
            <div class="tabs">
                <div id="tab1" class="tab active">
                    <div class="content-block">
                        <p>This is tab 1 content</p>
                    </div>
                </div>
                <div id="tab2" class="tab">
                    <div class="content-block">
                        <p>This is tab 2 content</p>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <div class="content-block">
                        <p>This is tab 3 content</p>
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
    $.init();
    $.config = {router: false}
</script>
</body>
</html>