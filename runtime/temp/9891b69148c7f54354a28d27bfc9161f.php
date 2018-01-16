<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\job\joblist.html";i:1516109558;s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516104906;}*/ ?>
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
  

.job-item p,h4{
margin:0;
}
.cate-item{
color:#000000;
}
.cate-item:hover,.cate-item:active,.cate-item:focus{
color:#1881EC;
}
.weui-navbar:after,.weui-navbar__item:after,.hidden{
display:none; 
}
.weui-navbar__item.weui-bar__item--on{
color:#1881ec;
background:#ffffff;
}
.job-item p,h4{
margin:0;
}
.job-item{
display:flex;
width:100%;
margin:13px 0;
height:80px;
background: #FFFFFF;
}
.texts-hide{
display: -webkit-box;
-webkit-box-orient: vertical;
-webkit-line-clamp: 3;
overflow: hidden;
word-wrap:break-word;
}
.text-hide{
overflow: hidden;
text-overflow:ellipsis;
white-space: nowrap;
word-wrap:break-word;
}



</style>
<body style="height:100vh;">
<div style="position:fixed;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">
<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span class="fa fa-list" style="margin-right:10px;"></span>
</div>
  <div class="weui-tab">
    <div class="weui-tab__panel" style="width:100%;">
     <div class="content" style="width:100%;">
     
<div>
<img src="/static/images/zzz.jpg" style="width:100%;object-fit:contain;" alt="" />
</div> 

<div class="weui-tab" id='page-infinite-navbar' style="padding:15px;padding-top:0;">

    <div class="swiper-container" id="cates" style="border-bottom:1px solid #eee;" >
   <div class="swiper-wrapper weui-navbar"  > 
    <?php if(is_array($jobcates) || $jobcates instanceof \think\Collection || $jobcates instanceof \think\Paginator): $i = 0; $__LIST__ = $jobcates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	         <a href='#tab<?php echo $vo['cateid']; ?>'   data-cateid="<?php echo $vo['cateid']; ?>" class="swiper-slide weui-navbar__item  <?php if($i == '1'): ?>weui-bar__item--on<?php endif; ?>"  style="flex:0 0 auto;width:auto;padding:13px 5px;">
                <?php echo $vo['name']; ?>
             </a>   
    <?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
   </div> 
 
	
<div class="weui-tab__bd" style="background: #FAFAFA;">
<?php if(is_array($jobcates) || $jobcates instanceof \think\Collection || $jobcates instanceof \think\Paginator): $i = 0; $__LIST__ = $jobcates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
  <div id="tab<?php echo $vo['cateid']; ?>" class="weui-tab__bd-item   <?php if($i == '1'): ?> weui-tab__bd-item--active<?php endif; ?>  " style="">
      <!-- cate name -->
      
      <div class=" jobs" style="margin:0;width:100%;flex-wrap:wrap;justify-content:space-around;">

	  </div><!-- item -->
      
      
     <div class="text-center  hidden">
          <a href="javascript:;"  data-currentpage="1"  data-cateid="<?php echo $vo['cateid']; ?>"   style="margin-top:15px;"  class="weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips">暂无更多数据</span>
	</div><!-- no more -->
	
    </div><!-- tab -->
<?php endforeach; endif; else: echo "" ;endif; ?>

</div>

</div>

     </div>
    </div>
    <div class="weui-tabbar" style="position:fixed;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  " >
            <p class="weui-tabbar__label" style="line-height:2.5;">微信</p>
        </a>
        <a href="<?php echo url('course/courselist'); ?>" class="weui-tabbar__item ">

            <p class="weui-tabbar__label" style="line-height:2.5;">微课</p>
        </a>
        <a href="<?php echo url('job/joblist'); ?>" class="weui-tabbar__item weui-bar__item_on">
            <p class="weui-tabbar__label" style="line-height:2.5;">找工作</p>
        </a>
        <a href="javascript:;" class="weui-tabbar__item ">
            <p class="weui-tabbar__label" style="line-height:2.5;">我的</p>
        </a>
    </div>
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



//渲染数据
function viewdata(obj,initdata,invoke){
	var html="";
	 for(key in initdata  ){ 
	html+='<div class="job-item "  >'+
	         '<div style="flex-grow:3;">'+
		       '<h3>'+initdata[key]['name']+'</h3>'+
			   '<div  style="display:flex;width:100%;">'+
			     '<p style="flex-grow:1;white-space: nowrap;" >工作职责：</p>'+
			     '<p  class="text-hide" style="flex-grow:2;height:50px;">'+initdata[key]['desc']+'</p>'+
		      '</div>'+
	         '</div>'+
	         '<div class="text-center" style="flex-grow:1;flex-shrink:0;display:flex;align-items:center;flex-direction: column;justify-content: space-around;" >'+
		       '<p class="text-hide"><span class="fa fa-map-marker"></span><span>'+initdata[key]['location']+'</span></p>'+
		       '<a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_plain-default " style="white-space:nowrap;">点击报名</a>'+
	         '</div>'+
           '</div>';
	 }
	 
	 if(invoke){
	  $(obj).html(html);
	 }else{
	    $(obj).append(html);
	 }

}

$(".weui-navbar a").on("click",function(){
var that=$(this);
var cateid=$(this).attr("data-cateid");
$.ajax({
url:"<?php echo url('job/catedetail'); ?>",
data:{cateid:cateid,page:1},
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
$(that.attr("href")).find(".loadmore").parent().removeClass("hidden");
}
viewdata($(that.attr("href")).find(".jobs"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})

$(".weui-navbar a.weui-bar__item--on").trigger("click")


//初始化分类列表
var cates = new Swiper('#cates',{
slidesPerView :'auto',
})

//加载更多   
$(".loadmore").on("click",function(){
        var that=$(this)
    	page=parseInt($(this).attr("data-currentpage"))
    	cateid=$(this).attr("data-cateid")
    	$.ajax({
    		url:"<?php echo url('job/catedetail'); ?>",
    		data:{cateid:cateid,page:page+1},
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
    			if(data.length == 4){
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
    