<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\index\index.html";i:1518329520;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1518487817;}*/ ?>
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
    box-sizing:border-box;
	margin:0;
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

  

.company-logo{
width:8rem; 
height:4rem; 
}
.course-item p,h4{
margin:0;
}
.course-item{
width:50%;
box-sizing:border-box;
padding-right:5%;
}


</style>
<body style="">
<!--<div style="position:fixed;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">

<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span >首页</span>
<span class="fa fa-list menu" style="margin-right:10px;"></span>
</div>-->
  <div class="main" style="position:absolute;overflow-y: scroll;top:0;bottom:50px;width:100%;-webkit-overflow-scrolling: touch;" >
   
     <div class="content" style="width:100%;height:auto;">
     
    <div class="swiper-container" id="coursel" >
            <div class="swiper-wrapper">
            <?php if(is_array($carousel) || $carousel instanceof \think\Collection || $carousel instanceof \think\Paginator): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="swiper-slide " style="width:100%;height:155px;text-align:center;" >
             <img class="mycarousel"  src="<?php echo $vo['src']; ?>"  <?php if($vo['url'] != ''): ?>data-url="<?php echo $vo['url']; ?>"<?php endif; ?>  alt=""  style="max-width:100%;height:100%;">
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>     
            </div>
                <div class="swiper-pagination"></div>
            </div>           
		     <div class="content-padded" style="padding:15px;">
		            <p><?php echo $data; ?></p>
		    </div>    
       <h2 class="text-center ">职造课程</h2>
       <div class="row-center" style="margin-left:5%;flex-wrap:wrap;justify-content:flex-start;">
      <?php if(is_array($coursedata) || $coursedata instanceof \think\Collection || $coursedata instanceof \think\Paginator): $i = 0; $__LIST__ = $coursedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <div class=" course-item" data-courseid="<?php echo $vo['courseid']; ?>">
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

	<div class="container sever col-center">
	<h2 class="text-center">内推企业</h2>

	<div class="sever " style="padding-left:15px;">
	  
	        <?php if(is_array($companydata) || $companydata instanceof \think\Collection || $companydata instanceof \think\Paginator): $i = 0; $__LIST__ = $companydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	    
	            <img src="<?php echo $vo['avastar']; ?>" alt=""  style="width:128px;height:64px;max-width:50%;margin-right:15px;"   >
	      
	        <?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	</div>
   
   

    </div>

</div>
      <div class="weui-tabbar" style="position:fixed;bottom:0;z-index:1000;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  weui-bar__item_on" >
            <p class="weui-tabbar__label" style="line-height:2.5;">首页</p>
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
<script src="/vconsole/dist/vconsole.min.js"></script>
<script src="/static/js/lazyload.min.js"></script>
<script src="https://cdn.bootcss.com/jquery-weui/1.2.0/js/jquery-weui.min.js"></script>
<script src="/static/js/swiper.min.js"></script>
<script src="/static/js/swiper.min.js"></script>
<script>
$(function(){
	var vConsole = new VConsole();
	
	$(".mycarousel").on("click",function(){
		if($(this).attr("data-url")){
		location.href=$(this).attr("data-url")
		}

		}) 
		
login();		
		

		
		
$(document).on({
	'click':function(){
		$.closeModal();	
		signin()
	}
	
},".signin")


$(document).on({
	'click':function(){
		$.closeModal();	
		login()
	}
	
},".bind")		

		

$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "企业后台",
		    onClick: function() {
		      window.location.href="<?php echo url('company/index'); ?>"
		    }
		  }]
		});
	
})

	
function  login(){
	
	$.modal({
		  title: "请关联您的账号",
		  autoClose: false ,
		  text: '<p class="weui-prompt-text"></p>'+
		  '<input type="text" class="weui-input weui-prompt-input" id="weui-prompt-username" name="logtel"  placeholder="手机">'+
		  '<input type="text"  name="pwd"  class="weui-input weui-prompt-input" id="weui-prompt-password"  placeholder="密码">'+
		  '<p class="weui-prompt-text " style="margin-top:10px;">还没有账号？<span class="signin" style="color:#1881EC;">马上去注册</span></p>',
		  buttons: [
		    { text: "绑定", onClick: function(){
	    	 if($("input[name='logtel']").val()==""||$("input[name='pwd']").val()==""){ 
	    	 $.toptip('手机或密码不能为空', 'error'); 
	    	 return false;
	    	 }
		    } },
		  ]
		});
	
}	
function  signin(){
	$.modal({
		  title: "请关联您的账号",
		  autoClose: false ,
		  text: '<p class="weui-prompt-text"></p>'+
		  '<div class="weui-cell">'+
		    '<div class="weui-cell__bd">'+
		      '<input class="weui-input" type="number" name="signtel" pattern="[0-9]*" placeholder="请输入手机号">'+
		    '</div>'+
		  '</div>'+
		  '<div class="weui-cell weui-cell_vcode">'+
		   ' <div class="weui-cell__bd">'+
		      '<input class="weui-input" type="code" placeholder="请输入验证码">'+
		    '</div>'+
		    '<div class="weui-cell__ft">'+
		      '<button class="weui-vcode-btn" style="color:#1881EC;">获取验证码</button>'+
		    '</div>'+
		  '</div>'+
		  '<p class="weui-prompt-text " style="margin-top:10px;">已经有账号了？<span class="bind" style="color:#1881EC;">马上去登录</span></p>',
		  buttons: [
		    { text: "创建并绑定", onClick: function(){
		    	 if($("input[name='signtel']").val()==""||$("input[name='code']").val()==""){
		    		 
			    	 $.toptip('手机或验证码不能为空', 'error');
			    	 
			    	 return false;
			    	 
			    	 }
		    } },
		  ]
		});
}
	
	
	
})










$(".course-item").on("click",function(){
var courseid=$(this).attr("data-courseid")
location.href="/mobile/course/detail?courseid="+courseid;
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
    