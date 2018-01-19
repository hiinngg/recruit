<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\company\positionedit.html";i:1516351454;s:78:"D:\wamp3\wamp64\www\recruit\public/../application/mobile\view\indexlayout.html";i:1516326769;}*/ ?>
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
        <div class="weui-cell__hd"><label class="weui-label">招聘人数</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="number"   value="<?php echo isset($data['number'])?$data['number']:''; ?>">
        </div>
  </div>
  
   <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">职位薪酬</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  name="salary"   value="<?php echo isset($data['salary'])?$data['salary']:''; ?>">
        </div>
  </div>
      <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">岗位福利</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" type="text"  id="treatment" name="treat" value="<?php echo $data['value']; ?>" data-value="<?php echo $data['value']; ?>" >
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



var items=[
  
  ];

	<?php if(isset($data)): ?>
		  var desc="<?php echo $data['desc']; ?>";
	      $("select[name='subsidy']").val("<?php echo $data['is_subsidy']; ?>").change()
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  $("textarea[name='desc']").text(desc)
		  
		  
		  <?php if(is_array($data['arr']) || $data['arr'] instanceof \think\Collection || $data['arr'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['arr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		  items.push({
		  title:"<?php echo $vo; ?>",
		  value:"<?php echo $vo; ?>"
		  })
		  <?php endforeach; endif; else: echo "" ;endif; ?>
		    $("#treatment").select("update", { multi:true,items:items })
		  
	<?php endif; ?>




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
    	
    	url:"<?php echo url('positionedit'); ?>",
    	data:{data:data,poid:<?php echo $data['poid']; ?>},
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
    