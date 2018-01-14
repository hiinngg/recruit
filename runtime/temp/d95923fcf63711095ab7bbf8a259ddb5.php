<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\course\courselist.html";i:1515923100;s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1515921432;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
	<title>小猫直聘</title>
	<link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">

    
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
  .course-item p{
   margin:0;
  	white-space:nowrap; 
text-overflow:ellipsis; 
-o-text-overflow:ellipsis; 
overflow: hidden; 
  }

.course-item p,h4{
margin:0;
}


</style>
<body>
   <div class="page-group">
        <!-- 单个page ,第一个.page默认被展示-->
        <div class="page">
            <!-- 标题栏 -->
            <header class="bar bar-nav">
              <h1 class="title">微课</h1>  
               <span class="icon icon-menu pull-right"></span>
            </header>

            <!-- 工具栏 -->
            <nav class="bar bar-tab">
		     <nav class="bar bar-tab" style="color:#1881EC;">		 
		      <a class="tab-item  external  " href="<?php echo url('index/index'); ?>">
		           <span class="tab-label">首页</span>
		      </a>
		      <a class="tab-item external active" href="<?php echo url('course/courseList'); ?>">
		            <span class="tab-label">微课</span>
		      </a>
	          <a class="tab-item external " href="<?php echo url('position/jobList'); ?>">
              <span class="tab-label">找工作</span>
              </a>

	          <a class="tab-item external  " href="<?php echo url('user/index'); ?>">
	            <span class="tab-label">我的</span>
	          </a>
		    </nav>
            </nav>

            <!-- 这里是页面内容区 -->
            <div class="content">
                <div class="content-block" style="margin-top:0;">
<div class="content-padded">
<p></p>
</div>  

<div class="buttons-tab fixed-tab" style="overflow: scroll;">

<a href="#" class="tab-link button">职造课程</a>
<?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<a href="#tab<?php echo $key; ?>"  data-cateid="<?php echo $vo['cateid']; ?>"    class="tab-link <?php if($i == '1'): ?>active<?php endif; ?> button"><?php echo $vo['name']; ?></a>
<?php endforeach; endif; else: echo "" ;endif; ?>
 </div>

	<div class="tabs">
	   <div id="tab0"    class="tab row active  infinite-scroll courselist">
           <div class="list-block">
               <ul class="list-container">
                   <li class="item-content"><div class="item-inner"><div class="item-title">条目</div></div></li>

                   <li class="item-content"><div class="item-inner"><div class="item-title">条目</div></div></li>
               </ul>
           </div>
           <!-- 加载提示符 -->
           <div class="infinite-scroll-preloader">
               <div class="preloader">
               </div>
           </div>

         </div>


	   <div id="tab1" class="tab row  infinite-scroll courselist"></div>
	   <div id="tab2" class="tab  row  infinite-scroll courselist"></div>
	</div>




</div>
            </div>
        </div>

        <!-- 其他的单个page内联页（如果有） -->
       
       
       

    </div>

    <!-- popup, panel 等放在这里 -->
    
    
    
    
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
   <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.js' charset='utf-8'></script>
   <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.js' charset='utf-8'></script>

<script>
$(function(){


$(document).on("pageInit", function(e, pageId, page) {
console.log(page)
//多个标签页下的无限滚动
var loading = false;
// 每次加载添加多少条目
var itemsPerLoad = 20;
// 最多可加载的条目
var maxItems = 100;
var lastIndex = $('.list-container li')[0].length;
function addItems(number, lastIndex) {
// 生成新条目的HTML
var html = '';
for (var i = lastIndex + 1; i <= lastIndex + number; i++) {
html += '<li class="item-content" onClick="alert(1)"><div class="item-inner"><div class="item-title">新条目</div></div></li>';
}
// 添加新条目
$('.infinite-scroll.active .list-container').append(html);
}
$(page[0]).find(".infinite-scroll").on('infinite', function() {
// 如果正在加载，则退出
if (loading) return;
// 设置flag
loading = true;
var tabIndex = 0;
if($(this).find('.infinite-scroll.active').attr('id') == "tab2"){
tabIndex = 0;
}
if($(this).find('.infinite-scroll.active').attr('id') == "tab3"){
tabIndex = 1;
}
lastIndex = $('.list-container').eq(tabIndex).find('li').length;
// 模拟1s的加载过程
setTimeout(function() {
// 重置加载flag
loading = false;
if (lastIndex >= maxItems) {
// 加载完毕，则注销无限加载事件，以防不必要的加载:$.detachInfiniteScroll($('.infinite-scroll').eq(tabIndex));多个无线滚动请自行根据自己代码逻辑判断注销时机
// 删除加载提示符
$('.infinite-scroll-preloader').eq(tabIndex).hide();
return;
}
addItems(itemsPerLoad,lastIndex);
// 更新最后加载的序号
lastIndex =  $('.list-container').eq(tabIndex).find('li').length;
$.refreshScroller();
}, 1000);
});
});
$(".tab-link").on("click",function(){
var targetdom=$(this).attr("href");
var $cateid=$(this).attr("data-cateid");
var $page=parseInt($(this).attr("data-currentpage"));
	$.ajax({
	url:"<?php echo url('course/catedetail'); ?>",
	data:{cateid:$cateid,page:$page},
	beforeSend:function(){
	 $.showPreloader();
	},
	success:function(data){
	
	},
	complete:function(){
	$.hidePreloader();
	}
	})
})


$.init();

});
</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    