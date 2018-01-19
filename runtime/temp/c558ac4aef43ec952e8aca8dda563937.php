<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\company\talentedit.html";i:1516342898;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516326769;}*/ ?>
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
.wrap:after{
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    background-color: #ffffff;;
    opacity: 0.5;
    z-index: 1;
    width: 100%;
    height: 100%;
}

.cl-active{
color:#1881EC;
}


</style>
<body style="overflow:hidden;height:100vh;">
<div style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:space-between;border-bottom:1px solid #eee;">

<span class="fa fa-angle-left" style="margin-left:10px;visibility:hidden;"></span>
<span >首页</span>
<span class="fa fa-list menu" style="margin-right:10px;"></span>
</div>
  <div class="weui-tab">
    <div class="weui-tab__panel" style="width:100%;overflow:scroll;">
     <div class="content" style="width:100%;">
     
   <div class="weui-cells weui-cells_form" style="margin-top:35px;">
   
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位名称</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="name"   value="<?php echo isset($data['name'])?$data['name']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位薪酬</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="salary"   value="<?php echo isset($data['salary'])?$data['salary']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">工作地点</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="location"   value="<?php echo isset($data['location'])?$data['location']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cells__title">工作内容</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="content"  rows="4"></textarea>
     <!--  <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>
  
     <div class="weui-cells__title">职业技能</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="skill"  rows="4"></textarea>
     <!--  <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>
  
  
  
  <div class="button_sp_area text-center">

        <a href="javascript:;" class="talentsave weui-btn weui-btn_mini weui-btn_default">提交</a>
 </div> 
     </div>

     </div>
    </div>
    <div class="weui-tabbar" style="position:absolute;bottom:0;z-index:1000;">
        <a href="<?php echo url('index/index'); ?>" class="weui-tabbar__item  " >
            <p class="weui-tabbar__label" style="line-height:2.5;">微信</p>
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



	<?php if(isset($data)): ?>
		  var desc="<?php echo $data['skill']; ?>";
		  var menu="<?php echo $data['content']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  menu=menu.replace(reg,"\n");
		  $("textarea[name='skill']").text(desc)
		  $("textarea[name='content']").text(menu)
	<?php endif; ?>



$(".talentsave").on("click",function(){
   	data={};
  
        $(this).parent().parent().find("input").each(function(){
    		
    		if($(this).val()==""){
    			
    	     $.toptip('必填项不能为空', 'error');
    			
    			return false;
    		}
    		data[$(this).attr("name")]=$(this).val();
    	})
    	if(data.length==0){
    	$.toptip('必填项不能为空', 'error');
    		return;
    	}

    	if($("textarea[name='skill']").val()==""||$("textarea[name='content']").val()==""){
    	    $.toptip('必填项不能为空', 'error');
			return ;
    	}

    data['skill']=$("textarea[name='skill']").val().replace(/\n|\r\n/g,"<br>")
    data['content']=$("textarea[name='content']").val().replace(/\n|\r\n/g,"<br>")
    $.ajax({
    	
    	url:"<?php echo url('talentedit'); ?>",
    	data:{data:data,taid:"<?php echo $data['taid']; ?>"},
    	type:"post",
    	beforeSend:function(){
    		 $.showLoading('正在保存')
    	},
    	success:function(data){
    	    $.hideLoading();
    		if(data==1){
    	     $.toast("保存成功",500);
    	      setTimeout(function(){
    	         location.href="<?php echo url('company/index'); ?>"
    	     },500)
    
    		}else{
    			$.toast(data);
    		}
    		
    	},
    	complete:function(){
    		
    		 $.hideLoading();
    	}
    	
    })

})





$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "企业后台",
		    onClick: function() {
		      window.location.href="<?php echo url('company/login'); ?>"
		    }
		  },{
		    text: "删除",
		    onClick: function() {
		      //do something
		    }
		  }]
		});
	
})


</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    