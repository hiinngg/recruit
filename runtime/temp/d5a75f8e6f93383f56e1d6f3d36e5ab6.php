<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\wamp6\wamp64\www\recruit\public/../application/index\view\course\courselist.html";i:1514465825;s:72:"D:\wamp6\wamp64\www\recruit\public/../application/index\view\layout.html";i:1514378382;}*/ ?>
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
<nav class="navbar navbar-default" style="margin-bottom: 0;background:#ffffff;">
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
      <?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>

        <ul class="nav navbar-nav navbar-right "  style="display:inline-block;" >
            <?php if(isset($username)): ?>
         <!--   <div class="navbar-text ">

                <span> 用户  </span>

            </div>-->

            <li  class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo url('user/index'); ?>">个人中心</a></li>
                    <li><a href="<?php echo url('user/logout'); ?>">退出</a></li>
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

 <img src="/static/images/zzz.jpg" width="100%" style="height:400px;object-fit:cover;" alt="...">
<div class="container sever">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="course">
    <li ><a href="#" style="color:#000000;">课程分类</a></li>
    <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    
      <li role="presentation" class="<?php if($i == '1'): ?>active<?php endif; ?>"><a href="#c<?php echo $key; ?>"  role="tab" data-toggle="tab"><?php echo $vo; ?></a></li>
    
    <?php endforeach; endif; else: echo "" ;endif; ?>
 
  </ul>
  
</div>

 
   
  <!-- Tab panes -->
  <div class="tab-content container sever">
    <?php if(is_array($course) || $course instanceof \think\Collection || $course instanceof \think\Paginator): $i = 0; $__LIST__ = $course;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    
    
    
        <div role="tabpanel row" class="tab-pane <?php if($i == '1'): ?>active<?php endif; ?>" id="c<?php echo $key; ?>">
      <h3 class="text-center" style="margin-bottom:30px;"><?php echo $cate[$key]; ?></h3>
    <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cour): $mod = ($i % 2 );++$i;?>
        <div class="col-md-3   course-item" data-id="<?php echo $cour['courseid']; ?>">
	       <img src="<?php echo $cour['label_img']; ?>" alt="" style="width:350px;height:200px;"/>
	       <h4  class="course-name"><?php echo $cour['name']; ?></h4>
	       <h5><?php echo $cour['desc']; ?></h5>
	       <p>&yen;<?php echo $cour['price']; ?></p>
	    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
    
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <div role="tabpanel" class="tab-pane" id="profile">2</div>
    <div role="tabpanel" class="tab-pane" id="messages">3</div>
    <div role="tabpanel" class="tab-pane" id="settings">4</div>
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
                 <button  type="submit" class="center-block btn btn-default userlogin"  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">登录</button>
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

$("#courseApply").on("click",function(){
    var $btn = $(this).button('loading')
var id=$(this).attr("data-id");
$.ajax({
	url:"<?php echo url('course/apply'); ?>",
    data:{courseid:id},
    type:"post",
	success:function(data){
		if(data==1){
			layer.msg("报名成功")
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
var id=$(this).attr("data-pageid");
$.ajax({
	url:"<?php echo url('job/apply'); ?>",
    data:{pageid:id},
    type:"post",
	success:function(data){
		if(data==1){
			layer.msg("申请成功")
		}else{
			layer.msg(data)
		}
		
	},
    complete:function(){
        $btn.button('reset')
}
	
	
})
})


/*报名课程  */

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


});//layui

/*报名课程  */




</script>


</body>
</html>