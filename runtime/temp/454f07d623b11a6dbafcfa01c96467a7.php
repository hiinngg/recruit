<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\wamp3\wamp64\www\recruit\public/../application/position\view\index\detail.html";i:1516872690;s:83:"D:\wamp3\wamp64\www\recruit\public/../application/position\view\positionlayout.html";i:1516774110;}*/ ?>
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
    height:100vh;
    overflow: scroll;
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

  




</style>
<body style="overflow:scroll;min-height:100%;background:#eee;">

 <div class="" style="">

 
<?php if(isset($data['toppic'])): ?>
 <div style="width:100%;height:155px;">
   <img src="<?php echo $data['toppic']; ?>" alt="" style="width:100%;height:100%;" />
 </div>
<?php endif; ?>

<div style="height:100%;padding:0 15px;background:#ffffff;">
<div  class="row-center "  style="flex-wrap:wrap;align-content:space-around;justify-content:space-between;border-bottom:1px solid #eee;padding-top:10px;">
<h3 style="width:70%;"><?php echo $data['cfname']==""?$data['cname']:$data['cfname']; ?></h3>
<a href="javascript:;" class="weui-btn weui-btn_plain-default apply " style="white-space:nowrap; width:30%;background:#1881EC;color:#ffffff;border-color:#1881EC;">免费报名</a>
<p style="margin:8px 0;color:#1881EC;"><?php echo $data['salary']; ?></p>
<p style="margin:8px 0;">已有<?php echo $data['apply']; ?>人报名</p>
</div><!-- info -->

<div style="border-bottom:1px solid #eee;">
<p style="background:#E6E6E6;padding:10px;line-height:2;border-radius:8px;">岗位福利</p>

<div style="padding:10px;">

<?php if(is_array($data['treatment']) || $data['treatment'] instanceof \think\Collection || $data['treatment'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['treatment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>


<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-default" style="background:#1881EC;color:#ffffff;border-color:#1881EC;"><?php echo $vo; ?></a>

<?php endforeach; endif; else: echo "" ;endif; ?>

</div>

</div>


<div style="border-bottom:1px solid #eee;">
<p style="background:#E6E6E6;padding:10px;line-height:2;border-radius:8px;">企业与工作说明</p>

<div style="padding:8px 0;"><?php echo $data['desc']; ?></div>

</div>


<div style="border-bottom:1px solid #eee;">
<p style="background:#E6E6E6;padding:10px;line-height:2;border-radius:8px;">工作环境照片</p>

<?php if(isset($data['pics'])): ?>
<div class="sever swiper-container">
    <div class="swiper-wrapper">
    <?php if(is_array($data['pics']) || $data['pics'] instanceof \think\Collection || $data['pics'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
        <div class="swiper-slide">
        <img src=" <?php echo $vo1; ?>" alt=""  width="175px"  height="100px" />
       </div>

    <?php endforeach; endif; else: echo "" ;endif; ?>

    </div>

    
    <!-- 如果需要导航按钮 -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

</div>

<?php endif; ?>



</div>



</div>



 </div>

       <div class="weui-footer " style="background:#eee;color:#333;width:100%;height:60px;">
         <p class="weui-footer__links">
             <a href="<?php echo url('mobile/index/index'); ?>" class="weui-footer__link">首页</a>
             <a href="javascript:void(0);" class="weui-footer__link">关于我们</a>
             <a href="<?php echo url('mobile/company/index'); ?>" class="weui-footer__link">企业入口</a>
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




$(".apply").on("click",function(){
$.modal({
  title: "报名",
  autoClose: false ,
  text: '<p class="weui-prompt-text"></p>'+
  '<input type="text" class="weui-input weui-prompt-input" id="weui-prompt-username" name="name"  placeholder="姓名">'+
  '<input type="text"  name="tel"  class="weui-input weui-prompt-input" id="weui-prompt-password"  placeholder="电话">'+
  '<p class="weui-prompt-text" style="margin-top:10px;">报名后直聘专员会第一时间联系您</p>',
  buttons: [
    { text: "取消", onClick: function(){
       $.closeModal();
    } },
    { text: "确认", onClick: function(){
     if($("input[name='name']").val()==""||$("input[name='tel']").val()==""){
     $.toptip('姓名或电话不能为空', 'error');
     return;
     }
     $.closeModal();
     $.ajax({
     url:"<?php echo url('apply'); ?>",
     type:"post",
     data:{name:$("input[name='name']").val(),tel:$("input[name='tel']").val(),poid:"<?php echo $data['poid']; ?>"},
     beforeSend:function(){
     $.showLoading();
     },
     success:function(data){
     if(data==1){
     $.hideLoading();
     $.alert('<p>您的职位申请已成功</p><p>请注意接听直聘电话，安排入职事宜</p><p style="color:red">直聘服务电话：13455555555</p>','');
     }
     
     }
     })
} },
  ]
});


})



 var mySwiper = new Swiper ('.swiper-container', {
slidesPerView : 2,
spaceBetween : 20,

    // 如果需要前进后退按钮
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    
    // 如果需要滚动条
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })    






</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    