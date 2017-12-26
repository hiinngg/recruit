<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\index\index.html";i:1514162107;s:72:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\layout.html";i:1514199672;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/static/css/swiper.min.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/admin/layui/css/layui.css" />
<link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css" />
<title>招聘网站</title>
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
.sever{
	margin-top:30px;
}
/*common  */

/* index */

.company-logo{
	width:128px;
	height:64px;
	background:#ccc;
}
#mynav a{
   color:#000000;
   background:#ffffff;
}
#mynav a:active,#mynav a:hover,#mynav a:focus,#mynav .active a{
     border-bottom:2px solid #1881EC;
     color:#1881EC;
}
/*index  */

/*course  */
#course{
  border:0;	
}
 #course a{
  	border:0;
 	color:#000000;
 	background:#ffffff;
 }  
 #course a:active,#course a:hover,#course a:focus, #course .active a{
	color:#1881EC;
 	
 }
 .course-item{
	cursor:pointer;
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
</style>
<body>
<nav class="navbar navbar-default" style="margin-bottom: 0;">
  <div class="container " style="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
        <span class="sr-only">响应式汉堡按钮</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo url('index/index'); ?>" >logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="mynav">
 
     <ul class="nav navbar-nav "  style="display:inline-block;" >
      <li  data-c="index" class="active"><a href="<?php echo url('index/index'); ?>">首页 <span class="sr-only">(current)</span></a></li>
      <?php if(is_array($navlist) || $navlist instanceof \think\Collection || $navlist instanceof \think\Paginator): $i = 0; $__LIST__ = $navlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li data-c="<?php echo $vo['c']; ?>"><a href="<?php echo $vo['column']; ?>"><?php echo $vo['name']; ?></a></li>
      <?php endforeach; endif; else: echo "" ;endif; if(session('?username') == true): ?>
       <div class="navbar-text navbar-right ">
      
      <span> 用户  <?php echo session('username'); ?></span>
         <ul class="dropdown-menu">
		   <li><a href="#">Action</a></li>
		   <li><a href="#">Another action</a></li>
		   <li><a href="#">Something else here</a></li>
		   <li role="separator" class="divider"></li>
		   <li><a href="#">Separated link</a></li>
		 </ul>           
    
       <span> ,你好</span>          
       </div>
       
        <li  class="dropdown navbar-right ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
       <?php else: ?>
        <p class="navbar-text navbar-right "><a href="#" class="navbar-link" data-toggle="modal" data-target="#userModal">注册/登录</a></p>
      <?php endif; ?> 
      </ul>
     
      <!--       <p class="navbar-text navbar-right "><a href="<?php echo url('index/user/index'); ?>" class="navbar-link" >个人后台</a></p> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/static/images/ccc.jpg" width="1920px" style="height:550px;object-fit:cover;"  alt="...">
    </div>
    <div class="item">
       <img src="/static/images/zzz.jpg" width="1920px" style="height:550px;object-fit:cover;" alt="...">
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="container sever">
<h2 class="text-center"><?php echo $data['title']; ?></h2>
<p><?php echo $data['content']; ?></p>
</div>


<div class="container sever">
<h2 class="text-center">职造课程</h2>
<div class="row sever row-center">
 <?php if(is_array($coursedata) || $coursedata instanceof \think\Collection || $coursedata instanceof \think\Paginator): $i = 0; $__LIST__ = $coursedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="col-md-3 col-center">
        <img src="<?php echo $vo['label_img']; ?>" width="300px"  height="150px"  style="object-fit: cover;" />
        <h4><?php echo $vo['name']; ?></h4>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

</div>
</div>

<!-- <p class="text-center sever">
<a href="" class="btn btn-default text-center" style="border-radius:15px;">更多课程</a>
</p> -->


<div class="container sever">
<h2 class="text-center">内推企业</h2>

<div class="swiper-container sever" id="company-list">
    <div class="swiper-wrapper row-center">
        <?php if(is_array($companydata) || $companydata instanceof \think\Collection || $companydata instanceof \think\Paginator): $i = 0; $__LIST__ = $companydata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="swiper-slide company-logo">
            <img src="<?php echo $vo['avastar']; ?>" alt="" width="100%" height="100%"  style="object-fit: cover;">
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
</div>

</div>




<div class="container-fluid sever" style="background:#DFDFDF;">
<div class="container" style="height:100%;">
<h4 class="text-center">宣传口号：<?php echo $footer['catchword']; ?></h4>
	<div class="row row-center">
	   <div class="col-md-4 col-center" style="border-right:1px solid #ffffff;">
          <div style="background:#ffffff;width:150px;height:150px;">视频</div>
        </div>
	   <div class="col-md-4 col-center" style="height:150px;border-right:1px solid #ffffff;">
     <?php echo $footer['desc']; ?>
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
        
        	<form class="form-horizontal">
        	
        	<div class="form-group">
	        	<div class="col-md-12">
	        	<label class="control-label hidden mylabel" for="tel">手机号码不能为空</label>
	        	  <input type="tel"  name="tel" id="tel" class="form-control" placeholder="请输入手机号码" />
	        	</div>
        	</div>
        	
            <div class="form-group">
            <div class="col-md-8">
            <label class="control-label hidden mylabel" for="code">验证码不能为空</label>
            	<input type="text"  name="code" id="code" class="form-control" placeholder="请输入验证码" />
            </div>

             <div class="col-md-4">
               <button type="button"  style="width:100%;" class="btn btn-default">验证码</button>
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
                     
                         <input type="text"   class="form-control" placeholder="请输入手机号码" />
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="col-md-12">
                         <input type="text"  class="form-control" placeholder="请输入密码" />
                     </div>
                 </div>

                 <h5>还没有账号？现在去 <a href="#" class="reg">注册</a></h5>
                 <button  type="submit" class="center-block btn btn-default"  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">登录</button>
             </form>
         </div>
     </div>
 </div>
</div> 
<!-- 用户注册时弹出 -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/static/js/swiper.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script  src="/static/bootstrap/js/bootstrap.min.js"></script>
<script>
/*common*/
<?php if(isset($nav)): ?>
$("#mynav").find("li").removeClass("active");
$("#mynav").find("li[data-c='<?php echo $nav; ?>']").addClass("active")
<?php endif; ?>

/*common  */



/*首页  */
  var mySwiper = new Swiper ('#company-list', {
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
  $('#companyReg').modal({
	  'backdrop':'static',
	  'show':false,
	  "keyboard":false
  })
   var images={};
  
   form.on('submit(companyReg)', function(data){
	   var $btn = $(data.elem).button('loading')
     if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	 return;
     }	  
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
			    	  	$(item).children("span.plus").addClass("hidden")
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
  $(".course-item").on("click",function(){
	 var id=$(this).attr("data-id");
	  location.href="../course/courseDetail?courseid="+id;
	  
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
 	$.ajax({
		url: "<?php echo url('register/userBaseRegister'); ?>",
		data:{mobile:$tel.val(),code:$code.val()},
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


});//layui




</script>


</body>
</html>