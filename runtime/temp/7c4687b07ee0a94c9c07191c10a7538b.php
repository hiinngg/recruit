<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\company\index.html";i:1516351813;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516351781;}*/ ?>
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
.weui-picker-container, .weui-picker-overlay{
z-index:2000;}

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
     
<div class="wrap" style="position:relative;width:100%;height:200px; background-image: url(/static/images/user.png);background-size:cover;">
<?php if($data['avastar'] != ''): ?>
 <img src="<?php echo $data['avastar']; ?>"  style="position:absolute;z-index:10;top:50%;left:50%;width:128px;height:64px;margin-top:-32px;margin-left:-64px; border:5px solid #717171;"/>
<?php endif; ?>
 
  <h3 style="position:absolute;z-index:10;top:50%;left:50%; transform: translate(-50%, -50%);margin-top:64px;" ><?php echo $data['name']; ?></h3>
</div>
<p class="text-center " style="margin:8px 0;"><span>联系人电话：</span>&nbsp;<span><?php echo $data['contact']; ?></span></p>

<?php if(isset($data['pics'])): ?>
<div class="swiper-container sever" id="pic-list">
    <div class="swiper-wrapper " style="padding:0 15px;">
    <?php if(is_array($data['pics']) || $data['pics'] instanceof \think\Collection || $data['pics'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="swiper-slide company-logo">
            <img src="<?php echo $vo; ?>" alt=""  style="width:175px;height:100px;"   >
        </div> 
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
 <div class="swiper-button-prev"></div>
   <div class="swiper-button-next"></div>
</div>
<?php endif; ?>

<div class="weui-tab">
  <div class="weui-navbar">
    <a data-url="<?php echo url('company/talentlist'); ?>" class="weui-navbar__item weui-bar__item--on loadtaitem" href="#tab1">
     人才定制
    </a>
    <a  data-url="<?php echo url('company/teamlist'); ?>" class="weui-navbar__item loadteitem" href="#tab2">
      团队定制
    </a>
      <a  data-url="<?php echo url('company/positionlist'); ?>" class="weui-navbar__item loadpoitem" href="#tab3">
      普工招聘
    </a>
  </div>
  <div class="weui-tab__bd">
    <div id="tab1"  class="weui-tab__bd-item weui-tab__bd-item--active " style="background:#F4F4F4;position:relative;overflow: hidden;">
     <p class="open-popup" data-target="#talent" style="height:50px;background:#eee;line-height:50px;padding:0 15px;">
     <span class="fa fa-plus">&nbsp;</span><span>新增人才定制</span>
     </p>
     
        <div class="item row-center text-center"  style="width:100%;height:35px;background:#ffffff;margin:15px 0;margin-top:0;justify-content:space-around;">
               <p style="width:33%;">创建时间</p>
               <p style="width:33%;">职位名称</p>
               <p style="width:33%;">操作</p>
         </div>

           <div class="item my-items">
            
           </div>
           
           
     <div class="text-center  hidden">
      <a href="javascript:;"  data-currentpage="1"    style="margin-top:15px;"  class=" weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips" style="background:#eee;">暂无更多数据</span>
	</div><!-- no more -->
     
     
     
    </div><!-- 人才定制 -->
    <div id="tab2" class="weui-tab__bd-item">
      
     <p class="open-popup" data-target="#team" style="height:50px;background:#eee;line-height:50px;padding:0 15px;">
     <span class="fa fa-plus">&nbsp;</span><span>新增团队定制</span>
     </p>
     
        <div class="item row-center text-center"  style="width:100%;height:35px;background:#ffffff;margin:15px 0;margin-top:0;justify-content:space-around;">
               <p style="width:33%;">创建时间</p>
               <p style="width:33%;">团队名称</p>
               <p style="width:33%;">操作</p>
         </div>

           <div class="item my-items">
            
           </div>
           
           
     <div class="text-center  hidden">
      <a href="javascript:;"  data-currentpage="1"    style="margin-top:15px;"  class=" weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips" style="background:#eee;">暂无更多数据</span>
	</div><!-- no more -->
	
    </div><!-- 团队定制 -->
    <div id="tab3" class="weui-tab__bd-item">
          <p class="open-popup" data-target="#position" style="height:50px;background:#eee;line-height:50px;padding:0 15px;">
     <span class="fa fa-plus">&nbsp;</span><span>新增普工招聘</span>
     </p>
     
        <div class="item row-center text-center"  style="width:100%;height:35px;background:#ffffff;margin:15px 0;margin-top:0;justify-content:space-around;">
               <p style="width:33%;">创建时间</p>
               <p style="width:33%;">职位名称</p>
               <p style="width:33%;">操作</p>
         </div>

           <div class="item my-items">
            
           </div>
           
           
     <div class="text-center  hidden">
      <a href="javascript:;"  data-currentpage="1"    style="margin-top:15px;"  class=" weui-btn weui-btn_mini weui-btn_default loadmore">更多课程</a>
     </div><!-- loadmore -->

	<div class="weui-loadmore hidden loading">
	  <i class="weui-loading"></i>
	  <span class="weui-loadmore__tips">正在加载</span>
	</div><!-- loading -->
	
	<div class="weui-loadmore hidden  weui-loadmore_line  nomore">
	  <span class="weui-loadmore__tips" style="background:#eee;">暂无更多数据</span>
    </div>
  </div>
</div>
</div>
<div id="talent" class="weui-popup__container" style="z-index:1001;">

  <div class="weui-popup__overlay"></div>
  <div class="weui-popup__modal"  >
   <div class="close-popup" style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:flex-start;border-bottom:1px solid #eee;">
   <span class="fa fa-angle-left" style="margin:0 10px;"></span>
   <span>返回</span>
   </div>
     
     <div class="weui-cells weui-cells_form" style="margin-top:35px;">
   
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位名称</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="name"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位薪酬</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="salary"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">工作地点</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="location"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
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
        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary close-popup">取消</a>
        <a href="javascript:;" class="talentsave weui-btn weui-btn_mini weui-btn_default">提交</a>
 </div> 
     </div>
     
     
     
     
  </div>
</div>


<div id="team" class="weui-popup__container" style="z-index:1001;">

  <div class="weui-popup__overlay"></div>
  <div class="weui-popup__modal"  >
   <div class="close-popup" style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:flex-start;border-bottom:1px solid #eee;">
   <span class="fa fa-angle-left" style="margin:0 10px;"></span>
   <span>返回</span>
   </div>
     
     <div class="weui-cells weui-cells_form" style="margin-top:35px;">
   
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">团队名称</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="name"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
  
 
   <div class="weui-cells__title">定制说明</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="desc"  rows="4"></textarea>
     <!--  <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>
  
     <div class="weui-cells__title">预期效果</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="result"  rows="4"></textarea>
     <!--  <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>
  
  
  
  <div class="button_sp_area text-center">
        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary close-popup">取消</a>
        <a href="javascript:;" class="teamsave weui-btn weui-btn_mini weui-btn_default">提交</a>
 </div> 
     </div>
     
     
     
     
  </div>
</div>

<div id="position" class="weui-popup__container" style="z-index:1001;">

  <div class="weui-popup__overlay"></div>
  <div class="weui-popup__modal"  >
   <div class="close-popup" style="position:absolute;height:35px;width:100%;display:flex;top:0;background:#ffffff;z-index:1000;align-items:center;justify-content:flex-start;border-bottom:1px solid #eee;">
   <span class="fa fa-angle-left" style="margin:0 10px;"></span>
   <span>返回</span>
   </div>
     
     <div class="weui-cells weui-cells_form" style="margin-top:35px;">
   
  <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位名称</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="name"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
  
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">招聘人数</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="number"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位薪酬</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="salary"   value="<?php echo isset($data['truename'])?$data['truename']:''; ?>">
        </div>
  </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">岗位福利</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  id="treatment" name="treat"  >
        </div>
    </div>
  <a href="javascript:void(0);" class="weui-cell weui-cell_link  addtreat">
        <div class="weui-cell__bd">自定义岗位福利</div>
  </a>

   <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">入职补贴</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="subsidy">
            <option value="0" >否</option>
            <option value="1" selected>是</option>
          </select>
        </div>
      </div>
  
  
 <div class="weui-cells__title">工作描述</div>
<div class="weui-cells weui-cells_form">
  <div class="weui-cell">
    <div class="weui-cell__bd">
      <textarea class="weui-textarea" name="desc"  rows="4"></textarea>
     <!--  <div class="weui-textarea-counter"><span>0</span>/200</div> -->
    </div>
  </div>
</div>

  <div class="button_sp_area text-center">
        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary close-popup">取消</a>
        <a href="javascript:;" class="positionsave weui-btn weui-btn_mini weui-btn_default">提交</a>
 </div> 
     </div>

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



$(function(){

$(".addtreat").on("click",function(){
$.prompt({
  title: '自定义福利',
  text: '',
  input: '',
  empty: false, // 是否允许为空
  onOK: function (input) {
    items.push({
      title:input,
      value:input
    })
    $("#treatment").select("update", { items:items })
  },
  onCancel: function () {
    //点击取消
  }
});
})
var items=[
    {
      title:'五险一金',
      value: 1
    },
    {
      title: '周末双休',
      value: 2
    },
    {
      title:'员工培训',
      value: 3
    },
    {
      title: '员工旅游',
      value: 4
    },
      {
      title: '十三薪',
      value: 5
    },
  ];

$("#treatment").select({
  title: "岗位福利",
  multi: true,
  items: items
});


$(".positionsave").on("click",function(){
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

    	if($(this).parent().parent().find("textarea[name='desc']").val()==""){
    	    $.toptip('必填项不能为空', 'error');
			return ;
    	}
   data['subsidy']=$("select[name='subsidy']").val();	
    data['desc']=$(this).parent().parent().find("textarea[name='desc']").val().replace(/\n|\r\n/g,"<br>")

    $.ajax({
    	
    	url:"<?php echo url('addposition'); ?>",
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
    	
    	url:"<?php echo url('addtalent'); ?>",
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



$(".teamsave").on("click",function(){
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

    	if($("textarea[name='desc']").val()==""||$("textarea[name='result']").val()==""){
    	    $.toptip('必填项不能为空', 'error');
			return ;
    	}

    data['desc']=$("textarea[name='desc']").val().replace(/\n|\r\n/g,"<br>")
    data['result']=$("textarea[name='result']").val().replace(/\n|\r\n/g,"<br>")
    $.ajax({
    	
    	url:"<?php echo url('addteam'); ?>",
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




//渲染数据
function viewtadata(obj,initdata,invoke){
	var html="";
	 for(key in initdata  ){  
	 ttDate = initdata[key]['createtime'];   
	 ttDate = ttDate.match(/\d{4}.\d{1,2}.\d{1,2}/mg).toString(); 
     ttDate = ttDate.replace(/[^0-9]/mg, '-');
     feedbackhtml="";   
	 if(initdata[key]['status']==1){
	  feedbackhtml='<p style="margin:0;margin-top:10px;color:red;">招聘反馈</p>'+
	               '<div style="height:1px;width:80%;background: #CCCCCC;margin: 15px 0;"></div>'+
	               '<p style="color:red;">'+initdata[key]['feedback']+'</p>';
	 
	 
	 }
	html+=' <div class="item "  style="width:100%;height:auto;background:#ffffff;margin:15px 0;">'+
                '<div class="row-center text-center" style="width:100%;height:35px;justify-content:space-around;">'+
                    '<p style="width:33%;">'+ttDate+'</p>'+
                    '<p class="text-hide" style="width:33%;">'+initdata[key]['name']+'</p>'+
                    '<p data-id="'+initdata[key]['taid']+'" style="width:33%;">'+(initdata[key]['status']==1?"<span class='status' style='color:red;'>查看反馈</span>":"<span class='status'>查看</span>&nbsp;<span   class='talentedit'>编辑</span>")+'</p>'+
               '</div>'+
               ' <div  class="hidden" style="background:#eee;padding:13px;">'+
                    '<p class="texts-hide"><span>薪酬：'+initdata[key]['salary']+'</span></p>'+
                    '<div style="height:1px;width:80%;background: #CCCCCC;margin: 15px 0;"></div>'+
                    '<p class="texts-hide"><span style="font-weight:bold;">职业技能：</span>'+initdata[key]['skill']+'</p>'+
                    '<p class="texts-hide"><span style="font-weight:bold;">工作内容：</span>'+initdata[key]['content']+'</p>'+
                    feedbackhtml+
                '</div>'+
            '</div>';
           
	 }
	 
	 if(invoke){
	  $(obj).html(html);
	 }else{
	    $(obj).append(html);
	 }
}

function viewpodata(obj,initdata,invoke){
	var html="";
	 for(key in initdata  ){  
	 ttDate = initdata[key]['createtime'];   
	 ttDate = ttDate.match(/\d{4}.\d{1,2}.\d{1,2}/mg).toString(); 
     ttDate = ttDate.replace(/[^0-9]/mg, '-');
     if(initdata[key]['treatment']){
     treat=""
      for(i in initdata[key]['treatment'] ){  
        treat+=',<span>'+initdata[key]['treatment'][i]+'</span>';
     }
}
	html+=' <div class="item "  style="width:100%;height:auto;background:#ffffff;margin:15px 0;">'+
                '<div class="row-center text-center" style="width:100%;height:35px;justify-content:space-around;">'+
                    '<p style="width:33%;">'+ttDate+'</p>'+
                    '<p class="text-hide" style="width:33%;">'+initdata[key]['name']+'</p>'+
                    '<p data-id="'+initdata[key]['poid']+'" style="width:33%;"><span class="status">查看</span>&nbsp;<span  class="positionedit">编辑</span></p>'+
               '</div>'+
               ' <div  class="hidden" style="background:#eee;padding:13px;">'+
                    '<p class="texts-hide"><span style="font-weight:bold;">招聘人数：</span>'+initdata[key]['number']+'</p>'+
                    '<div style="height:1px;width:80%;background: #CCCCCC;margin: 15px 0;"></div>'+
                  '<p class="texts-hide"><span>薪酬：'+initdata[key]['salary']+'</span></p>'+
                    '<div style="height:1px;width:80%;background: #CCCCCC;margin: 15px 0;"></div>'+
                    '<p class="texts-hide"><span style="font-weight:bold;">待遇：</span>'+treat+'</p>'+
                    '<p class="texts-hide"><span style="font-weight:bold;">是否补贴：</span>'+(initdata[key]['status']==1?"是":"否")+'</p>'+
                '</div>'+
            '</div>';
           
	 }
	 
	 if(invoke){
	  $(obj).html(html);
	 }else{
	    $(obj).append(html);
	 }
}



function viewtedata(obj,initdata,invoke){
	var html="";
	 for(key in initdata  ){  
	 ttDate = initdata[key]['createtime'];   
	 ttDate = ttDate.match(/\d{4}.\d{1,2}.\d{1,2}/mg).toString(); 
     ttDate = ttDate.replace(/[^0-9]/mg, '-');

	html+=' <div class="item "  style="width:100%;height:auto;background:#ffffff;margin:15px 0;">'+
                '<div class="row-center text-center" style="width:100%;height:35px;justify-content:space-around;">'+
                    '<p style="width:33%;">'+ttDate+'</p>'+
                    '<p class="text-hide" style="width:33%;">'+initdata[key]['name']+'</p>'+
                    '<p data-id="'+initdata[key]['teamid']+'" style="width:33%;"><span class="status">查看</span>&nbsp;<span  class="teamedit">编辑</span></p>'+
               '</div>'+
               ' <div  class="hidden" style="background:#eee;padding:13px;">'+
                    '<p class="texts-hide"><span style="font-weight:bold;">定制说明：</span>'+initdata[key]['desc']+'</p>'+
                    '<div style="height:1px;width:80%;background: #CCCCCC;margin: 15px 0;"></div>'+
                    '<p class="texts-hide"><span style="font-weight:bold;">预期效果：</span>'+initdata[key]['result']+'</p>'+
                '</div>'+
            '</div>';
           
	 }
	 
	 if(invoke){
	  $(obj).html(html);
	 }else{
	    $(obj).append(html);
	 }
}



$(".loadtaitem").on("click",function(){
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
viewtadata($(that.attr("href")).find(".my-items"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})

$(".loadteitem").on("click",function(){
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
viewtedata($(that.attr("href")).find(".my-items"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})

$(".loadpoitem").on("click",function(){
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
viewpodata($(that.attr("href")).find(".my-items"),data,true)
},
complete:function(){
$.hideLoading();
}

})
})






//页面初始化时
$(".weui-navbar a.weui-bar__item--on").trigger("click")

$(".my-items").on("click",".status",function(){

    $(this).toggleClass("cl-active");
    $(this).parent().parent().next().toggleClass("hidden");
})

$(".my-items").on("click",".talentedit",function(){
var id = $(this).parent().attr("data-id")
location.href="/mobile/company/talentedit?taid="+id
})

$(".my-items").on("click",".teamedit",function(){
var id = $(this).parent().attr("data-id")
location.href="/mobile/company/teamedit?teamid="+id
})

$(".my-items").on("click",".positionedit",function(){
var id = $(this).parent().attr("data-id")
location.href="/mobile/company/positionedit?poid="+id
})

  var mySwiper = new Swiper ('#pic-list', {
       navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  })

})







$(".menu").on("click",function(){
	
	$.actions({
		  actions: [{
		    text: "退出",
		    onClick: function() {
		      window.location.href="<?php echo url('company/logout'); ?>"
		    }
		  }]
		});
	
})




</script>
</body>
</html>   
   
   
   
 
    <!-- 默认必须要执行$.init(),实际业务里一般不会在HTML文档里执行，通常是在业务页面代码的最后执行 -->
    