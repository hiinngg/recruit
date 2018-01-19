<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\user\index.html";i:1516279864;s:78:"D:\wamp6\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516366442;}*/ ?>
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
     
<div class="wrap" style="position:relative;width:100%;height:226px; background-image: url(/static/images/user.png);background-size:cover;">
  <img src="<?php echo $data['avastar']; ?>"  style="position:absolute;z-index:10;top:50%;left:50%;margin-top:-73px;margin-left:-73px; width:146px;height:146px;border-radius:50%;border:5px solid #717171;"/>
</div>
<div class="weui-tab">
  <div class="weui-navbar" style="border-bottom:1px solid #eee;">
    <a class="weui-navbar__item weui-bar__item--on" href="#tab1">
      我的简历
    </a>
    <a class="loaditem  weui-navbar__item"  data-url="<?php echo url('user/jobuser'); ?>"  href="#tab2">
      我的申请
    </a>
        <a class="loaditem weui-navbar__item"  data-url="<?php echo url('user/courseuser'); ?>" href="#tab3">
      我的课程
    </a>
 
  </div>
  <div class="weui-tab__bd">
    <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
     
       <div style="padding:0 15px;">
        <?php if(isset($none)): ?>
            <p class="text-center sever">你还没有填写简历,<a href="#" href="javascript:;" class="open-popup" data-target="#resume"  >马上去填写</a></p>
            <?php else: ?>   
            
          <div class="weui-panel weui-panel_access">
       <!--  <div class="weui-panel__hd">文字组合列表</div> -->
        <div class="weui-cells">
		  <div class="weui-cell">
		    <div class="weui-cell__bd">
		      <p>姓名</p>
		    </div>
		    <div class="weui-cell__ft"><?php echo $data['truename']; ?></div>
		  </div>
		   <div class="weui-cell">
		    <div class="weui-cell__bd">
		      <p>性别</p>
		    </div>
		    <div class="weui-cell__ft"><?php echo $data['sex']==0?'男':"女"; ?></div>
		  </div>
		  <div class="weui-cell">
		    <div class="weui-cell__bd">
		      <p>出生日期</p>
		    </div>
		    <div class="weui-cell__ft"><?php echo $data['birthdate']; ?></div>
		 </div>
		  <div class="weui-cell">
		    <div class="weui-cell__bd">
		      <p>目标职位</p>
		    </div>
		    <div class="weui-cell__ft"><?php echo $data['position']; ?></div>
		 </div>
		   <div class="weui-cell">
		    <div class="weui-cell__bd">
		      <p>毕业院校</p>
		    </div>
		    <div class="weui-cell__ft"><?php echo $data['graduated']; ?></div>
		 </div>
		   <div class="weui-cell">
		    <div class="weui-cell__bd">
		      <p>学历</p>
		    </div>
		    <div class="weui-cell__ft"><?php echo $data['education']; ?></div>
		 </div>
		</div><!-- cells -->
		
		 <div class="weui-panel__bd">
          <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title">自我评价</h4>
            <p class="weui-media-box__desc"><?php echo $data['selfevaluation']; ?></p>
          </div>
          <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title">工作经历</h4>
            <p class="weui-media-box__desc"><?php echo $data['experience']; ?></p>
          </div>
        </div>
      </div><!-- panel -->
      
        <a href="javascript:;"  data-target="#resume" class="open-popup weui-btn weui-btn_plain-default">修改简历</a>     
      
	  
	      
        <?php endif; ?>
       </div>
     <div id="resume" class="weui-popup__container"  style="z-index:1001;">
  <div class="weui-popup__overlay"></div>
  <div class="weui-popup__modal" >
<div class="close-popup" style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:flex-start;border-bottom:1px solid #eee;">
<span class="fa fa-angle-left" style="margin:0 10px;"></span>
<span>返回</span>
</div>
 <div class="weui-cells weui-cells_form" style="margin-top:35px;">
   
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">姓名</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="name"  placeholder="请输入姓名" value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
  <div class="weui-cell">
    <div class="weui-cell__hd"><label for="" class="weui-label">出生年月</label></div>
    <div class="weui-cell__bd">
      <input class="weui-input" type="date" name="date" value="<?php echo isset($data['birthdate'])?$data['birthdate']:''; ?>">
    </div>
  </div>
  
 <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">性别</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="sex">
            <option value="0">男</option>
            <option value="1">女</option>
          </select>
        </div>
      </div>
 <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">目标职业</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text" name="position"  placeholder="请输入职业" value="<?php echo isset($data['position'])?$data['position']:''; ?>">
        </div>
  </div>
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">毕业院校</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="graduated" placeholder="请输入院校名" value="<?php echo isset($data['graduated'])?$data['graduated']:''; ?>">
        </div>
  </div>
  
<div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">学历</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="edu">
          <option value="">请选择</option>
          <option value="初中">初中</option>
                <option value="高中">高中</option>
                  <option value="大专">大专</option>
                    <option value="本科">本科</option>
                    
                      <option value="硕士">硕士</option>
                        <option value="博士">博士</option>
          </select>
        </div>
      </div>
      
   <div class="weui-cells__title">自我评价</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="selfevaluation" placeholder="请输入自我评价" rows="4"></textarea>
     <!--  <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>

<div class="weui-cells__title">工作经历</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="experience" placeholder="请输入工作经历" rows="4"></textarea>
      <!-- <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>   
  
</div>
 
<div class="button_sp_area text-center">
        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary close-popup">取消</a>
        <a href="javascript:;" class="save weui-btn weui-btn_mini weui-btn_default">提交</a>
</div> 

  </div>
</div>
     

    </div>
    <div id="tab2" class="weui-tab__bd-item"   style="background:#eee;position:relative;overflow: hidden;">


        <div class="item row-center text-center"  style="width:100%;height:35px;background:#ffffff;margin:15px 0;justify-content:space-around;">
            <p style="width:33%;">时间</p>
            <p style="width:33%;">申请职位</p>
            <p style="width:33%;">详情</p>
        </div>

        <div class="item my-items">
    
        </div>
      
        <div class="text-center  hidden">
      <a href="javascript:;"  data-currentpage="1"    style="margin-top:15px;"  class="weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips" style="background:#eee;">暂无更多数据</span>
	</div><!-- no more -->
      
      
    </div><!-- 我的申请 -->
    
       <div id="tab3" class="weui-tab__bd-item" style="background:#eee;position:relative;overflow: hidden;">

           <div class="item row-center text-center"  style="width:100%;height:35px;background:#ffffff;margin:15px 0;justify-content:space-around;">
               <p style="width:33%;">时间</p>
               <p style="width:33%;">课程名称</p>
               <p style="width:33%;">详情</p>
           </div>

           <div class="item my-items">
            
           </div>
           
           
     <div class="text-center  hidden">
      <a href="javascript:;"  data-currentpage="1"    style="margin-top:15px;"  class="weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips" style="background:#eee;">暂无更多数据</span>
	</div><!-- no more -->
           
    </div><!-- 我的课程 -->
   
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
        <a href="<?php echo url('user/index'); ?>" class="weui-tabbar__item weui-bar__item_on">
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




//渲染数据
function viewdata(obj,initdata,invoke){
	var html="";
	 for(key in initdata  ){  
	 ttDate = initdata[key]['createtime'];   
	 ttDate = ttDate.match(/\d{4}.\d{1,2}.\d{1,2}/mg).toString(); 
     ttDate = ttDate.replace(/[^0-9]/mg, '-');   
	 
	html+=' <div class="item "  style="width:100%;height:auto;background:#ffffff;margin:15px 0;">'+
                '<div class="row-center text-center" style="width:100%;height:35px;justify-content:space-around;">'+
                    '<p style="width:33%;">'+ttDate+'</p>'+
                    '<p class="text-hide" style="width:33%;">'+initdata[key]['name']+'</p>'+
                    '<p class="status" style="width:33%;"><span class="fa fa-caret-down">&nbsp;</span>'+(initdata[key]['status']==1?"<span style='color:red;'>查看反馈</span>":"查看")+'</p>'+
               ' </div>'+
               ' <div  class="hidden" style="background:#eee;padding:13px;">'+
                    '<p class="texts-hide"><span>课程导师：'+initdata[key]['teacher']+'</span>&nbsp;<span>联系方式：'+initdata[key]['contact']+'</span></p>'+
                    '<div style="height:1px;width:80%;background: #CCCCCC;margin: 15px 0;"></div>'+
                   ' <p class="texts-hide">'+initdata[key]['feedback']+'</p>'+
                '</div>'+

            '</div>';
           
	 }
	 
	 if(invoke){
	  $(obj).html(html);
	 }else{
	    $(obj).append(html);
	 }

}

$(".loaditem").on("click",function(){
var that=$(this);
var url=$(this).attr("data-url");
$.ajax({
url:url,
beforeSend:function(){
$(that.attr("href")).find(".nomore").addClass("hidden")
//$(that.attr("href")).find("a.loadmore").attr("data-currentpage",1)
$.showLoading();
},
success:function(data){
if(data.length == 0){
$(that.attr("href")).find(".nomore").removeClass("hidden")
return;
}
//if(data.length == 4){
//$(that.attr("href")).find(".loadmore").parent().removeClass("hidden");
//}
viewdata($(that.attr("href")).find(".my-items"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})





	<?php if(isset($data)): ?>
	$("select[name='sex']").val("<?php echo $data['sex']; ?>").change()
	$("select[name='edu']").val("<?php echo $data['education']; ?>").change()
	
		  var desc="<?php echo $data['experience']; ?>";
		  var menu="<?php echo $data['selfevaluation']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  menu=menu.replace(reg,"\n");
		  $("textarea[name='experience']").text(desc)
		  $("textarea[name='selfevaluation']").text(menu)
	<?php endif; ?>
	
$(".my-items").on("click",".status",function(){
console.log("")
    $(this).toggleClass("cl-active");
    $(this).parent().next().toggleClass("hidden");
})

//保存
	
    $(".save").on("click",function(){
    	data={};
  
        $("input").each(function(){
    		
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
    /* 	if($("input[name='pwd']").val()!=$("input[name='pwd2']").val()){
    		$.alert("两次密码输入不一致")
			return ;
    	} */
    	if($("textarea[name='experience']").val()==""||$("textarea[name='selfevaluation']").val()==""){
    	    $.toptip('必填项不能为空', 'error');
			return ;
    	}
    data['sex']=$("select[name='sex']").val();	
    data['edu']=$("select[name='edu']").val();	
    data['experience']=$("textarea[name='experience']").val().replace(/\n|\r\n/g,"<br>")
    data['selfevaluation']=$("textarea[name='selfevaluation']").val().replace(/\n|\r\n/g,"<br>")
    $.ajax({
    	
    	url:"<?php echo url('editinfo'); ?>",
    	data:{data:data},
    	type:"post",
    	beforeSend:function(){
    		 $.showLoading('正在保存')
    	},
    	success:function(data){
    	    $.hideLoading();
    		if(data==1){
    	     $.toast("保存成功",500);
    	      setTimeout(function(){
    	            window.location.href="<?php echo url('user/index'); ?>"
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






})




$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "企业后台",
		    onClick: function() {
		      window.location.href="<?php echo url('company/login'); ?>"
		    }
		  }]
		});
	
})




</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    