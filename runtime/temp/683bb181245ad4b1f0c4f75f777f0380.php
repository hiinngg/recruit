<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\course\coursedetail.html";i:1514601696;}*/ ?>
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
    	text-overflow:ellipsis; 
    	white-space:nowrap; 
		text-overflow:ellipsis; 
		-o-text-overflow:ellipsis; 
		overflow: hidden; 
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

        <div class="container">
            <h3 class="text-center"><?php echo $data['name']; ?></h3>
            <hr />

            <div class="row">
                <div class="col-100" style="padding-right:0;">
                    <img src="<?php echo $data['label_img']; ?>" height="200px;" style="object-fit:contain;" width="100%" />
                </div>
                <div class="col-100 text-center col-center" style="">

                    <p>价格：&yen;<?php echo $data['price']; ?></p>
                    <p>课程简介：<?php echo $data['desc']; ?></p>
                    <p>课程形式：<?php echo $data['type']; ?></p>

                    <p><a href="#" class="button button-dark courseApply" data-id="<?php echo $data['courseid']; ?>">马上报名</a></p>

                </div>
            </div>

            <hr />


            <div class="buttons-tab">
                <a href="#tab1" class="tab-link active button">课程目录</a>
                <a href="#tab2" class="tab-link button">课程介绍</a>

            </div>
            <hr />
            <div class="content-block">
                <div class="tabs">
                    <div id="tab1" class="tab active">
                        <div class="content-block">
                            <div class="col-md-50" style="padding-right:0;">

                            </div>
                            <div class="col-md-50">
                                <p><?php echo $data['content']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <div class="content-block">
                            <p class="text-center">
                                <?php echo $data['menu']; ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>



    </div>




<script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>


<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm-extend.min.js' charset='utf-8'></script>
<script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script> 
<script>
$(function(){

    $(".courseApply").on("click",function(e){
        e.stopPropagation();
        var id=$(this).attr("data-id");
        $.ajax({
            url:"<?php echo url('course/apply'); ?>",
            data:{courseid:id},
            beforeSend:function(){

                $.showPreloader('请等待')
            },
            type:"post",
            success:function(data){
                $.hidePreloader();
                if(data==1){
                    $.alert('报名成功')
                }else{
                    $.alert(data)
                }

            },
            complete:function(){
                $.hidePreloader();
            }


        })
    })


	$.init();
    $.config = {router: false}	
});
</script>
</body>
</html>