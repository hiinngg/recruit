<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\job\joblist.html";i:1518315034;s:72:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\layout.html";i:1518423604;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="keywords" content="<?php echo $pc['keywords']; ?>" />
<link rel="stylesheet" href="/static/css/swiper.min.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/admin/layui/css/layui.css" />
 <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css" /> 
<link rel="stylesheet" href="/static/css/hover-min.css" />
<link rel="stylesheet" href="/static/css/bootsnav.css" />

<title><?php echo $pc['title']; ?></title>
</head>
<style>
/* common */
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

.carousel-inner>.item>img{
	vertical-align: middle;
	display:inline-block;
	
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


/*common  */

/* index */

.company-logo{
	width:128px;
	height:64px;
	
}
#mynav>ul>li>a{
   color:#000000;
   background:#ffffff;
    border-bottom:2px solid #FFFFFF;
}
#mynav>ul>li>a:active,#mynav>ul>li>a:hover,#mynav>ul>li>a:focus,#mynav .active a{
     border-bottom:2px solid #1881EC;
     color:#1881EC;
}
/*index  */

/*course  */
.hvr-sweep-to-top:before{
	z-index:10;
	background:#000000;
	opacity:0.5;
	-webkit-transition-duration: .2s;
    transition-duration: .2s;
}



#course{
  border:0;	
}
 #course a{
  	border:0;
 	color:#000000;

 }  
 #course a:active,#course a:hover,#course a:focus, #course .active a{
	color:#1881EC;
 	
 }
 .course-item{
	cursor:pointer;
 	width:380px;
 	
 }
 .course-name:hover{
	color:#1881EC;
 }
 
 #detail{
	border:0;
 }
 #detail a{
  	border:0;
 	color:#000000;
 	background:#ffffff;
 }
#detail a:active,#detail a:hover,#detail a:focus,#detail .active a{
	color:#1881EC;	
 }
 
 
/*course  */
 
/*userreg*/
.userregform .layui-form-radio i:hover, .layui-form-radioed i{
	color:#1881EC;
}
.userregform label{
	white-space:nowrap;
}
 
 
/*userreg  */
.mylabel{
	font-weight:normal;
	font-size:14px;
	
}
/* userreg */
 .myModal-open{
   overflow-y:scroll;
padding-right:0 !important;
} 


.wechat:hover,.wechat:active,.wechat:focus{
	color:green;
	cursor:pointer;
}

/* 验证码样式 */
.captcha img{
	max-width:100%;
}



</style>
<body style="">
<nav class="navbar navbar-default row-center" style="margin-bottom: 0;background:#ffffff;align-items:flex-end;">
  <div class="container " style="height:100%;position:relative;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
        <span class="sr-only">响应式汉堡按钮</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
       <a class="navbar-brand" href="#"  style="overflow:hidden;padding-top:0;padding-bottom:0;height:auto;">
      <img src="<?php echo $logo; ?>" alt=""  />
      </a>
      
    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="mynav"  style="position:absolute;bottom:0;margin-left:64px;width:100%;">
 
     <ul class="nav navbar-nav "  style="margin-left:15px;" >
      <li  data-c="index" class="active"><a href="<?php echo url('index/index'); ?>">首页 <span class="sr-only">(current)</span></a></li>
      <?php if(is_array($navlist) || $navlist instanceof \think\Collection || $navlist instanceof \think\Paginator): $i = 0; $__LIST__ = $navlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li data-c="<?php echo $vo['c']; ?>"><a href="<?php echo $vo['column']; ?>"><?php echo $vo['name']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>

        <ul class="nav navbar-nav  "  style="display:inline-block;position:absolute;right:0;" >
            <?php if(isset($username)): ?>
         <!--   <div class="navbar-text ">

                <span> 用户  </span>

            </div>-->

            <li  class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a target="_blank" href="<?php echo url('user/index'); ?>">个人中心</a></li>
                    <li><a href="<?php echo url('user/logout'); ?>">退出</a></li>
                </ul>
            </li>
            <?php else: ?>
            <p class="navbar-text navbar-right"><a href="#" class="navbar-link useroper" data-toggle="modal" data-target="#userModal">注册/登录</a></p>
            <?php endif; ?>



        </ul>

     
      <!--       <p class="navbar-text navbar-right "><a href="<?php echo url('index/user/index'); ?>" class="navbar-link" >个人后台</a></p> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 <div style="text-align:center;">
<img class="mycarousel" src="<?php echo current($banner)['src']; ?>"  <?php if(current($banner)['url'] != ''): ?>data-url="<?php echo current($banner)['url']; ?>"<?php endif; ?> >
</div>


<div class="container sever col-center">
<h2 class="text-center">找工作</h2>
<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="sever  row " style="width:900px;height:200px;">
    
   <div class="col-md-4" style="height:200px;">
       <img  src="<?php echo $vo['pic']; ?>"  width="100%"  height="200px" >
   </div>
   
   <div class="col-md-5" style="height:100%;">
   <div class="col-center" style="align-items:flex-start;height:100%;">
     <p><strong>企业名称：</strong><?php echo $vo['cname']; ?></p>
       <p><strong>招聘岗位：</strong><?php echo $vo['name']; ?></p>
       <p><strong>岗位职责：</strong><?php echo $vo['desc']; ?></p>
   </div>
     
   </div>
   
   <div class="col-md-3 col-center" style="justify-content:space-between;height:100%;">
       <p>
       <span class="fa fa-map-marker"></span>
       <?php echo $vo['location']; ?>
       </p> 
       
       <button type="button" class="btn jobApply "   data-loading-text="正在报名..." data-jobid="<?php echo $vo['jobid']; ?>" style="width:100%;background:#000000; color:#ffffff;">申请工作</button> 
       
   </div>
        
<!--        -->
  
  

</div>
   <?php endforeach; endif; else: echo "" ;endif; ?>
<!--<button type="button"  c class='center-block btn btn-default'>更多工作</button>-->



	<div class="container sever col-center">
	<h2 class="text-center">内推企业</h2>

	<div class=""  >
	 <?php if(is_array($companydata) || $companydata instanceof \think\Collection || $companydata instanceof \think\Paginator): $i = 0; $__LIST__ = $companydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	  
	 <img class="lazyload" data-src="<?php echo $vo['avastar']; ?>" alt=""   width="128px" height="64px"  style="margin-top:15px;">
	       
	 <?php endforeach; endif; else: echo "" ;endif; ?>
	
	</div>
	</div>
   

</div>


<div class="modal fade"  role="dialog" id="addjob" style="">
 <div class="modal-dislog" style=" position:absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
     <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="text-center text-success">申请成功！</h4>
        </div>
        <div class="modal-body">
        
        <p class="text-center text-success"><span class="fa fa-check-circle fa-3x"></span></p>
        <p class="text-center">您的工作申请已提交</p>
        <p class="text-center">职造师稍后会与您联系！</p>
        <p class="text-center">Thankyou</p>
          
        </div>
<!--         <div class="modal-footer">
        <a type="button" href="<?php echo url('index/index'); ?>" class="btn btn-default">返回首页</a>
        <a type="button" href="<?php echo url('companyadmin/index/login'); ?>" class="btn btn-primary">马上登陆</a>
        <button></button>
        </div>  --> 
     
    </div>

 </div>

</div> 










<div class="container-fluid sever" style="background:#DFDFDF;">
<div class="container" style="height:100%;">
<h4 class="text-center">宣传口号：<?php echo $footer['catchword']; ?></h4>
	<div class="row row-center">
	   <div class="col-md-4 col-center" style="border-right:1px solid #ffffff;">
          <div style="background:#ffffff;width:150px;height:150px;position:relative;line-height:150px;">
       <video  src="<?php echo $footer['myvideo']; ?>"  width="150px" height="150px"  >
       您的浏览器不支持在线播放视频
       </video>
       <span id="footvideo" class="fa fa-play-circle fa-3x" style="position:absolute;color:#ffffff;cursor:pointer;top: 50%;left: 50%;transform: translate(-50%, -50%);"></span> 
         </div>
        </div>
	   <div class="col-md-4 col-center" style="height:150px;border-right:1px solid #ffffff;overflow:auto;">
        <?php if(is_array($posts) || $posts instanceof \think\Collection || $posts instanceof \think\Paginator): $i = 0; $__LIST__ = $posts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <p><a href="<?php echo url('post/postdetail','postid='.$vo['postid']); ?>"><?php echo $vo['title']; ?></a></p>
        <?php endforeach; endif; else: echo "" ;endif; ?>   
       </div>
	   <div class="col-md-4 col-center">
      <div style="background:#ffffff;width:150px;height:150px;">
      <img src="<?php echo $footer['label_img']; ?>" width="100%"  height="100%" />
      </div>
      </div>
	</div>
	<h5 class='text-center'>Copyright@2013-2018 ZHONGSHAN ZMR Co.Ltd掌门人网络科技有限公司技术支持</h5>
</div>
</div>

<!-- 用户注册时弹出 -->

<div class="modal fade"  role="dialog" id="userModal" style="">
 <div class="modal-dislog" style="width:350px;  position:absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
     <div class="hidden modal-content userReg">
     
        <div style="padding:15px;">
          <h4 style="border-bottom:2px solid #1881EC;margin-bottom:0;display:inline-block;padding-bottom:15px;">绑定信息</h4>
          <hr  style="margin:0;" />
        </div>




        <div class="modal-body">
        
        	<form class="form-horizontal" >
        	
        	<div class="form-group">
	        	<div class="col-md-12">
	        	<label class="control-label hidden mylabel" for="tel">手机号码不能为空</label>
	        	  <input type="tel"  name="tel" id="tel" class="form-control" placeholder="请输入手机号码" />
	        	</div>
        	</div>
        	
            <div class="form-group">
            <div class="col-md-6">
            <label class="control-label hidden mylabel" for="code">验证码不能为空</label>
            	<input type="text"  name="captcha" id="code" class="form-control" placeholder="请输入验证码" />
            </div>

            <div class="col-md-6">
              <div class="captcha" style="max-width:100%;"><?php echo captcha_img(); ?></div>
            </div>            
        	</div>
        	
            <div class="form-group">
            <div class="col-md-7">
            <label class="control-label hidden mylabel" for="code">验证码不能为空</label>
            	<input type="text"  name="code" id="code" class="form-control" placeholder="请输入验证码" />
            </div>

             <div class="col-md-5">
               <button type="button"   style="width:100%;" class="btn btn-default sendsns">验证码</button>
             </div>            
        	</div>

                <h5>有账号了？现在去 <a href="#" class="login">登录</a></h5>
        	<button  type="submit"   class="center-block btn btn-default userRegister "  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">提交</button>
        	</form>
        </div>
    </div>
     <div class="modal-content userLogin">

         <div style="padding:15px;">
             <h4 style="border-bottom:2px solid #1881EC;margin-bottom:0;display:inline-block;padding-bottom:15px;">登录</h4>
             <hr  style="margin:0;" />
         </div>

         <div class="modal-body">

             <form class="form-horizontal">

                 <div class="form-group">
                     <div class="col-md-12">
                         <label class="control-label hidden mylabel" for="tel">手机号码不能为空</label>
                         <input type="text"  name="username"  class="form-control" placeholder="请输入手机号码" />
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="col-md-12">
                         <label class="control-label hidden mylabel" for="tel">密码不能为空</label>
                         <input type="password"  name="userpass" class="form-control" placeholder="请输入密码" />
                     </div>
                 </div>

                 <h5>还没有账号？现在去 <a href="#" class="reg">注册</a></h5>
                 <h6>使用以下账号直接登录</h6>
                 <p><span class="fa fa-wechat wechat"></span></p>
                 <button  type="submit" class="center-block btn btn-default userlogin"  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">登录</button>
             </form>
         </div>
     </div>
 </div>
</div> 
<!-- 用户注册时弹出 -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/static/js/lazyload.min.js"></script>
<script src="/static/js/swiper.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script  src="/static/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/js/bootsnav.js"></script>

<script>

var countdown=60; 

var isScroll = function (el) { // test targets   
	var elems = el ? [el] : [document.documentElement, document.body];   
	var scrollX = false, scrollY = false;    
	for (var i = 0; i < elems.length; i++) {      var o = elems[i];     
	// test horizontal     
	var sl = o.scrollLeft;     
	o.scrollLeft += (sl > 0) ? -1 : 1;    
	o.scrollLeft !== sl && (scrollX = scrollX || true);  
	o.scrollLeft = sl;     
	// test vertical    
	var st = o.scrollTop;  
	o.scrollTop += (st > 0) ? -1 : 1;    
	o.scrollTop !== st && (scrollY = scrollY || true);   
	o.scrollTop = st;  
	}    
	// ret  
	return scrollY; 
		}; 
		
function settime(obj) { //发送验证码倒计时
    if (countdown == 0) { 
        obj.attr('disabled',false); 
        //obj.removeattr("disabled"); 
        obj.text("重新发送");
        countdown = 60; 
        return;
    } else { 
        obj.attr('disabled',true);
        obj.text("重新发送(" + countdown + ")");
        countdown--; 
    } 
setTimeout(function() { 
    settime(obj) }
    ,1000) 
}		
		
		

$(function(){
	lazyload();
})		
		
$(".captcha").on("click",function(){
	$(this).html('<?php echo captcha_img(); ?>')
})




$('#companyReg').modal({
	  'backdrop':'static',
	  'show':false,
	  "keyboard":false
})
 $('#addjob').modal({
  'show':false,
 })
$("#userModal").modal({
 'show':false, 
})
 
$('#userModal').on('show.bs.modal', function (e) {
	console.log("dsf")
	if (isScroll()) {
		console.log("dfsd")
		  $("body").addClass("myModal-open")
		}

}) 
$('#userModal').on('hidden.bs.modal', function (e) {
	    $("body").removeClass("myModal-open")
}) 


 
 
$(".mycarousel").on("click",function(){
if($(this).attr("data-url")){
location.href=$(this).attr("data-url")
}

}) 
 
function viewdata(initdata){
	var html="";
	 for(key in initdata  ){
		 
	html+='<div class="course-item  col-md-4"  style="width:380px;padding:0 15px;"  data-id="'+initdata[key]['courseid']+'">'+
			'<div class="hvr-sweep-to-top coursehover" style="height:200px;width:350px;">'+
			'<img  class="" src="'+initdata[key]['label_img']+'" width="350px"  height="200px"  style="object-fit: cover;position:absolute;" />'+
			'<button class="btn btn-default hidden courseApply" data-loading-text="正在报名..." data-id="'+initdata[key]['courseid']+'" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index:20;" >加入课程</button>'+
			'</div>'+
			'<h3>'+initdata[key]['name']+'</h3>'+
			'<p class="text-nowrap">'+initdata[key]['desc']+'</p>'+
			'<p>'+
			'<span class="fa fa-eye"></span>'+
			'<span>'+initdata[key]['pageview']+'</span>'+
			'<span class="pull-right">'+initdata[key]['price']+'元</span>'+
			'</p></div>'	 
	 }
	
   $("#courselist").children(".row").append(html);

}
/*common*/
<?php if(isset($nav)): ?>
$("#mynav").find("li").removeClass("active");
$("#mynav").find("li[data-c='<?php echo $nav; ?>']").addClass("active")
<?php endif; ?>

$("#footvideo").on("click",function(event){
	var that=$(this)
	layer.open({
		  type: 2,
		  title: false,
		  area: ['630px', '360px'],
		  shade: 0.8,
		  closeBtn: 0,
		  shadeClose: true,
		  content: that.parent().children("video").attr("src")
		});
})


/*common  */

$(".courseApply").on("click",function(e){

e.stopPropagation();
 var $btn = $(this).button('loading')
var id=$(this).attr("data-id");
$.ajax({
	url:"<?php echo url('course/apply'); ?>",
    data:{courseid:id},
    type:"post",
	success:function(data){
	
		if(data==1){
			layer.msg("报名成功")
		}else if(data===0){
			 $(".useroper").trigger("click")
		}else if(data==2){
		      location.href="<?php echo url('register/userRegister'); ?>";
		}else{
			layer.msg(data)
		}
		
	},
    complete:function(){
        $btn.button('reset')
}
	
	
})
})


$(".jobApply").on("click",function(){
var $btn = $(this).button('loading')
var id=$(this).attr("data-jobid");
$.ajax({
	url:"<?php echo url('job/apply'); ?>",
    data:{jobid:id},
    type:"post",
	success:function(data){
		if(data==1){
			$('#addjob').modal('toggle')
		}else if(data===0){
			 $(".useroper").trigger("click")
		}else if(data==2){
		      location.href="<?php echo url('register/userRegister'); ?>";
		}else{
			layer.msg(data)
		}
		
	},
    complete:function(){
        $btn.button('reset')
}
	
	
})
})


$("#courselist").on({
	mouseenter:function(){
	    
		$(this).children("button").removeClass("hidden")
	},
	mouseleave:function(){
		$(this).children("button").addClass("hidden")
	}
},'.coursehover')

/*报名课程  */

/*首页  */
  var mySwiper = new Swiper ('#company-list', {
	direction: 'vertical',
	slidesPerView : "auto",
	spaceBetween : 20,
      freeMode:true
  })  


/* /首页  */

layui.use(['layer', 'form','upload','laydate'], function(){
  var layer = layui.layer
  ,form = layui.form;
   var upload= layui.upload;
   var laydate=layui.laydate;
  
  /*企业注册  */

   var images={};
  
   $(".sendsns").on("click",function(){
		var that = $(this) 
	  $tel = $("input[name='tel']").val();
	  $captcha = $("input[name='captcha']").val();	
		if($tel==""){
			layer.msg("请填写手机号")
			return;
		}
		if($captcha==""){
			layer.msg("请填写验证码")
			return;
		}
	     $.ajax({
	    	 url:"<?php echo url('register/sendsns'); ?>",
	    	 data:{tel:$tel,captcha:$captcha},
	    	 type:"post",
	    	 beforeSend:function(){
	    		 layer.load(2)
	    	 },
	    	 success:function(data){
	    		 layer.closeAll("loading")
	    	   if(data==1){
	    		   layer.msg("验证码已发送，请查收短信")
	    		  
	    	   }else{
	    		   $(".captcha").html('<?php echo captcha_img(); ?>')
	    		   layer.msg(data)   
	    	   }
	    	 },
	    	 complete:function(){
	    		 settime(that)
	    	 }
	    	 
	     })
		
	})
  
  
  
  
   form.on('submit(companyReg)', function(data){
	   var $btn = $(data.elem).button('loading')
     if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	 return;
     }
  /*  if(JSON.stringify(images) == "{}"){
	   layer.msg("请上传公司图片",{icon:5,shift:6});
   } 
 */

    $.ajax({
    	url:"<?php echo url('companyReg'); ?>",
    	data:{data:data.field,images:images},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		if(data==1){
    			$('#companyReg').modal('toggle')
    		}else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		  $btn.button('reset')
    	}
    }) 
    return false;
  });
   
   
   //企业资料更新
   form.on('submit(companyRegupdate)', function(data){
	   var $btn = $(data.elem).button('loading')
	   
/*      if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	 return;
     } */
 /*   if(JSON.stringify(images) == "{}"){
	   layer.msg("请上传公司图片",{icon:5,shift:6});
   }  */
    $.ajax({
    	url:"<?php echo url('editcprofile'); ?>",
    	data:{data:data.field,images:images},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		if(data==1){
    		layer.msg("更新成功",function(){
    			location.href="<?php echo url('companyadmin/index/index'); ?>"    			
    		})
    		
    		}else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		  $btn.button('reset')
    	}
    }) 
    return false;
  }); 
   
   
   
   
   /* 用户注册 */
   form.on('submit(userreg)', function(data){
	 var $btn = $(data.elem).button('loading')
     if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	
    	 return false; 
     }	
	  data.field['experience']=data.field['experience'].replace(/\n|\r\n/g,"<br>");
	  data.field['selfevaluation']=data.field['selfevaluation'].replace(/\n|\r\n/g,"<br>");  
    $.ajax({
    	url:"<?php echo url('register/userRegister'); ?>",
    	data:{data:data.field},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		layer.closeAll("loading")
    		if(data==1){
    			layer.msg("保存成功!");
    		}else if(data==0){
    			layer.msg("请先登录");
    		}
    		
    		else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		   setTimeout(function(){
    				location.href="<?php echo url('index/index'); ?>"
    			},500)
    		  $btn.button('reset')


    	}
    }) 
    return false;
  });

    form.on('submit(editreg)', function(data){
        var $btn = $(data.elem).button('loading')
        data.field['experience']=data.field['experience'].replace(/\n|\r\n/g,"<br>");
        data.field['selfevaluation']=data.field['selfevaluation'].replace(/\n|\r\n/g,"<br>");
        $.ajax({
            url:"<?php echo url('register/editRegister'); ?>",
            data:{data:data.field},
            type:"post",
            beforeSend:function(){
                layer.load(2);
            },
            success:function(data){
                layer.closeAll("loading")
                if(data==1){
                    layer.msg("保存成功!");
                }else if(data==0){
                    layer.msg("请先登录");
                }

                else{
                    layer.msg(data)
                }

            },
            complete:function(){
                layer.closeAll("loading")
                setTimeout(function(){
                    location.href="<?php echo url('index/index'); ?>"
                },500)
                $btn.button('reset')


            }
        })
        return false;
    });


    
  /* /企业注册*/
	  upload.render({
			   elem: '.companyimg',
			  url: "<?php echo url('imgUpload'); ?>",
			  field:"image",
			  multiple:true,
	         before: function(obj){ 
					layer.load(2); 
		      }
			  ,done: function(res, index, upload){	
				  layer.closeAll("loading")
			    if(res.code == 0){
			    	
			    	var item = this.item;	
			    	images[$(item).attr("id")]='/temp/'+res.src.replace(/\\/g,'/')			    	
			    	if($(item).children("img").length>0){
			    		$(item).children("img").attr("src",'/temp/'+res.src.replace(/\\/g,'/'));
			    	}else{
			    	  	$(item).children("span").addClass("hidden")
				    	$(item).children("span.del").removeClass("hidden")
				    	$(item).removeClass("companyimg")
				    	$(item).append('<img   style="object-fit:cover;width:100%;height:100%;"   src="/temp/'+res.src.replace(/\\/g,'/')+'"  />')
			    	}
			    }			    
			  }
			});      
			   
  /*  企业注册图片上传*/
  
  /* 课程 */
  
  //点击进入课程内页
  $("#courselist").on("click",".course-item",function(){
	 var id=$(this).attr("data-id");
	  location.href="../../index/course/courseDetail?courseid="+id;
	  
  })
  /* 课程 */


  /*用户注册按钮*/
$(".reg").on("click",function(e){

e.preventDefault();
$(this).closest(".modal-content").addClass("hidden");
$(".userReg").removeClass("hidden")

})

$(".login").on("click",function(e){

    e.preventDefault();
    $(this).closest(".modal-content").addClass("hidden");
    $(".userLogin").removeClass("hidden")

})

 $(".userRegister").on("click",function(e){
    e.preventDefault();
    $tel=$("input[name='tel']");
    $code=$("input[name='code']");
    $captcha=$("input[name='captcha']");
    if($tel.val()==""){
    	
    	$tel.closest(".form-group").addClass("has-error");
    	$tel.closest(".form-group").find("label").removeClass("hidden");
    	setTimeout(function(){
    		$tel.closest(".form-group").removeClass("has-error");
    		$tel.closest(".form-group").find("label").addClass("hidden");
    	},1500)
    	return;
    }
    if($("input[name='code']").val()==""){
    	
    	 $code.closest(".form-group").addClass("has-error");
    	 $code.closest(".form-group").find("label").removeClass("hidden")
    	setTimeout(function(){
    		 $code.closest(".form-group").removeClass("has-error");
    		 $code.closest(".form-group").find("label").addClass("hidden")
    	},1500)
    	return;
    }
    
    if($captcha.val()==""){
    	layer.msg("请输入验证码");
    	return;
    }
    
 	$.ajax({
		url: "<?php echo url('register/userBaseRegister'); ?>",
		data:{mobile:$tel.val(),code:$code.val(),captcha:$captcha.val()},
		beforeSend:function(){		
			layer.load(2);
		},
		type:"POST",
		success:function(data){
	      if(data.code==1){
	    	  layer.closeAll('loading');
	    	  layer.msg("注册成功");
	    	  setTimeout(function(){
	    		  location.href="<?php echo url('register/userRegister'); ?>";
	    	  },500)
	      }else{
	    	  layer.msg(data.msg)
	      }
		},
		complete:function(){
			 layer.closeAll('loading');
		}
	}) 

})
$(".userlogin").on("click",function(e){

    e.preventDefault();
    $username=$("input[name='username']");
    $userpass=$("input[name='userpass']");
    if( $username.val()==""){

        $username.closest(".form-group").addClass("has-error");
        $username.closest(".form-group").find("label").removeClass("hidden");
        setTimeout(function(){
            $username.closest(".form-group").removeClass("has-error");
            $username.closest(".form-group").find("label").addClass("hidden");
        },1500)
        return;
    }
    if($userpass.val()==""){

        $userpass.closest(".form-group").addClass("has-error");
        $userpass.closest(".form-group").find("label").removeClass("hidden")
        setTimeout(function(){
            $userpass.closest(".form-group").removeClass("has-error");
            $userpass.closest(".form-group").find("label").addClass("hidden")
        },1500)
        return;
    }
    $.ajax({
        url: "<?php echo url('user/login'); ?>",
        data:{username:$username.val(),userpass:$userpass.val()},
        beforeSend:function(){
            layer.load(2);
        },
        type:"POST",
        success:function(data){
            if(data==1){
                layer.closeAll('loading');
                layer.msg("登录成功");
                setTimeout(function(){
                    location.href="<?php echo url('index/index'); ?>";
                },500)
            }else{
            	layer.msg(data)
            }
        },
        complete:function(){
            layer.closeAll('loading');
        }


    })




})




  /*   用户注册  */
  laydate.render({
  elem: '#userdate'
  ,format: 'yyyy-MM-dd'
  });
  /*  */
  
 /* 职位内页*/
    var jobSwiper = new Swiper ('#jobDetail', {
        slidesPerView:'auto',
        spaceBetween : 20,

        // 如果需要前进后退按钮
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    })


    $(".loadmore").on("click",function(){
    	$load=$(this).next();
    	$text=$(this);
    	$load.removeClass("hidden")
    	$text.addClass("hidden")
    	page=parseInt($(this).attr("data-currentpage"))
    	cateid=$(this).attr("data-cateid")
    	$.ajax({
    		url:"<?php echo url('course/catedetail'); ?>",
    		data:{cateid:cateid,page:page+1},
    		success:function(data){
    			if(data.length<6){
    				$text.parent().addClass("hidden")
    			}else{
    				$text.attr("data-currentpage",page+1)
    				$load.addClass("hidden")
    				$text.removeClass("hidden")
    			}
    			viewdata(data)
    		},
    		complete:function(){
    			$load.addClass("hidden")
    			$text.removeClass("hidden")
    		}
    	})
      })
      
  
  
  
  
  
  
  
  
  
});//layui

/*报名课程  */

/*加载更多  职学院*/

    
    
    
/*加载更多  职学院 */
  
    
  
   
     
      
    
       
        
        
        





</script>


</body>
</html>