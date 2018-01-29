<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\wamp3\wamp64\www\recruit\public/../application/position\view\index\index.html";i:1517186675;s:83:"D:\wamp3\wamp64\www\recruit\public/../application/position\view\positionlayout.html";i:1516774110;}*/ ?>
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

  

.weui-navbar:after,.weui-navbar__item:after,.hidden{
display:none; 
}
.weui-navbar__item.weui-bar__item--on{
color:#1881ec;
background:#ffffff;
}


</style>
<body style="overflow:scroll;min-height:100%;background:#eee;">

 <div class="" style="">

 
 
   <div class=" swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
        <img src="/static/images/user.png" alt=""  width="100%"  height="155px" />
       </div>
    </div>

  

</div>


<div class="weui-tab"  >
  <div class="weui-navbar">
    <a class="weui-navbar__item weui-bar__item--on all" href="#tab1">
      所有企业
    </a>
    <a class="weui-navbar__item sub" href="#tab2">
      入职补贴
    </a>
   <a class="weui-navbar__item" href="#tab3">
     求职须知
    </a>
  </div>
  <div class="weui-tab__bd">
    <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active"  style="background:#eee;">
        <div class=" jobs " style="margin:0;">

	    
	  </div><!-- item -->
      
      
     <div class="text-center  hidden">
          <a href="javascript:;"  data-currentpage="1"  data-cateid=""   style="margin-top:15px;"  class="weui-btn weui-btn_mini weui-btn_default loadmoreall">更多职位</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips">暂无更多数据</span>
	</div><!-- no more -->
    </div><!-- tab -->
    
    
    
    
    <div id="tab2" class="weui-tab__bd-item" style="">
		<div class=" sub_jobs " style="margin:0;width:100%;background:#eee;overflow: scroll;">
        

		</div><!-- item -->


		<div class="text-center  hidden">
			<a href="javascript:;"  data-currentpage="1"  data-cateid=""   style="margin-top:15px;"  class="weui-btn weui-btn_mini weui-btn_default loadmoresub">更多职位</a>
		</div><!-- loadmore -->

		<div class="weui-loadmore hidden loading">
			<i class="weui-loading"></i>
			<span class="weui-loadmore__tips">正在加载</span>
		</div><!-- loading -->

		<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
			<span class="weui-loadmore__tips">暂无更多数据</span>
		</div><!-- no more -->
    </div>
  <div id="tab3" class="weui-tab__bd-item">
      <h1 class="text-center">求职须知</h1>
      <p style="margin-bottom:30px;">内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容</p>
    </div>
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



$(function(){

  function text(obj){

	el = obj.get(0);
	s = obj.text();
	n = el.offsetHeight;
		for (i = 0; i < s.length; i++) {
		el.innerHTML = s.substr(0, i);
			if (n < el.scrollHeight) {
			el.style.overflow = 'hidden';
			el.innerHTML = s.substr(0, i - 3) + '...';
			break;
			}
		}
	}

var mySwiper = new Swiper ('.swiper-container', {

  }) 


//渲染数据
function viewdata(obj,initdata,invoke){
	var html="";
	 for(key in initdata  ){

if(initdata[key]['treatment']){
treat=""
for(i in initdata[key]['treatment'] ){
treat+=' <span>'+initdata[key]['treatment'][i]+'</span>';
}
}
logo="";

if(initdata[key]['pics']&&(initdata[key]['pics']!='')){
logo= '<div style="width:40%; height:100%;"><img src="'+initdata[key]['pics']+'" alt="" style="width:100%; height:100%;" /></div> ';

}else{

logo= '<p style="text-align:center;width:40%;height:100%;line-height:100px;">暂无企业图片</p>';
}

sub="";
if(initdata[key]['is_subsidy']==1){
sub= ' <img src="/static/images/sub.jpg"  style="width:35px; height:70px;" /> ';
}else{
sub= '<div style="width:20%; height:80%;"></div> ';
}
	html+= '<div class="po row-center"  data-poid="'+initdata[key]['poid']+'" style="width:100% ;height:100px;justify-content:flex-start;margin:15px 0;background:#ffffff;">'+
		       logo+
		     ' <div class="row-center" style="width:60%;height:100%;flex-wrap:wrap;padding-right:15px;padding-left:4px;"> '+
		       ' <div class="col-center" style="width:80%;height:80%;justify-content:space-around;align-items:flex-start;" >'+
			      ' <h5 >'+(initdata[key]['cfname']==""?initdata[key]['cname']:initdata[key]['cfname'])+'</h5>'+
			       '<p class="texts-hide" style="font-size:11px;padding-left:3px;">'+treat+'</p> '+
		       ' </div>'+
		      sub+
		     '  <p class="row-center" style="justify-content:space-between; flex-basis:100%;flex-shrink:0;"><span  style="font-size:9px;padding-left:3px;"   >已有'+initdata[key]['apply']+'人报名</span><span  style="color:#1881EC;">'+initdata[key]['salary']+'</span></p>'+
		     ' </div>'+
	      '</div>';
	 }
	 
	 if(invoke){
	  $(obj).html(html);
	 }else{
	    $(obj).append(html);
	 }

}

$(".all").on("click",function(){
var that=$(this);

$.ajax({
url:"<?php echo url('allposition'); ?>",
data:{page:1},
beforeSend:function(){
$(that.attr("href")).find(".nomore").addClass("hidden")
$(that.attr("href")).find("a.loadmore").attr("data-currentpage",1)
$.showLoading();
},
success:function(data){
if(data.length == 0){
$(that.attr("href")).find(".nomore").removeClass("hidden")
return;
}
if(data.length == 4){
$(that.attr("href")).find(".loadmoreall").parent().removeClass("hidden");
}
viewdata($(that.attr("href")).find(".jobs"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})

$(".sub").on("click",function(){
var that=$(this);

$.ajax({
url:"<?php echo url('subposition'); ?>",
data:{page:1},
beforeSend:function(){
$(that.attr("href")).find(".nomore").addClass("hidden")
$(that.attr("href")).find("a.loadmore").attr("data-currentpage",1)
$.showLoading();
},
success:function(data){
if(data.length == 0){
$(that.attr("href")).find(".nomore").removeClass("hidden")
return;
}
if(data.length == 4){
$(that.attr("href")).find(".loadmoresub").parent().removeClass("hidden");
}
viewdata($(that.attr("href")).find(".sub_jobs"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})

$(".jobs").on("click",".po",function(){
var poid=$(this).attr("data-poid");
location.href="/position/index/detail?poid="+poid;

})

$(".sub_jobs").on("click",".po",function(){
var poid=$(this).attr("data-poid");
location.href="/position/index/detail?poid="+poid;

})


$(".weui-navbar a.weui-bar__item--on").trigger("click")




//加载更多   
$(".loadmoreall").on("click",function(){
        var that=$(this)
    	page=parseInt($(this).attr("data-currentpage"))

    	$.ajax({
    		url:"<?php echo url('allposition'); ?>",
    		data:{page:page+1},
    		beforeSend:function(){
    		that.parent().next().removeClass("hidden")
    		that.parent().addClass("hidden")
    		},
    		success:function(data){
    			if(data.length == 0){
    			   that.parent().next().next().removeClass("hidden")
    			     that.parent().next().addClass("hidden")
    			   return;
    			}
    			if(data.length > 0){
    				that.parent().removeClass("hidden")
    			}
    		    that.parent().next().addClass("hidden")
    		    that.attr("data-currentpage",page+1)
    			viewdata(that.parent().prev(),data,false)
    		},

    	})
  
})


$(".loadmoresub").on("click",function(){
var that=$(this)
page=parseInt($(this).attr("data-currentpage"))

$.ajax({
url:"<?php echo url('subposition'); ?>",
data:{page:page+1},
beforeSend:function(){
that.parent().next().removeClass("hidden")
that.parent().addClass("hidden")
},
success:function(data){
if(data.length == 0){
that.parent().next().next().removeClass("hidden")
that.parent().next().addClass("hidden")
return;
}
if(data.length > 0){
that.parent().removeClass("hidden")
}
that.parent().next().addClass("hidden")
that.attr("data-currentpage",page+1)
viewdata(that.parent().prev(),data,false)
},

})

})


})








</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    