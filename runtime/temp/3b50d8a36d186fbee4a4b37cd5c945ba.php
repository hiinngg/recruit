<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\user\info.html";i:1516783334;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>个人资料</title>
    <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style>
    .sever{
        margin-top:30px;
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
</style>

<body style="overflow-y:scroll;">

<div class="layui-container-fluid"  style="/* display:flex;flex-direction: column ;justify-content:center;align-items: center; */">
    <?php if(isset($data)): ?>
    <div class="layui-row">
	    <div class="layui-col-md3  col-center" >
         <img   src="<?php echo $data['avastar']==''?'/static/images/avastar.png' : $data['avastar']; ?>" style="width:200px;height:200px;border-radius:50%;object-fit:cover;">
         <button class="layui-btn sever change">点击上传头像</button>
         
      <div  class="sever" style="text-align:left;">
	      <p><span>姓名：</span><span><?php echo $data['truename']; ?></span></p>
	      <p><span>性别：</span><span><?php echo $data['sex']; ?></span></p>
	      <p><span>出生日期：</span><span><?php echo $data['birthdate']; ?></span></p>
	      <p><span>目标职位：</span><span><?php echo $data['position']; ?></span></p>
	      <p><span>毕业院校：</span><span><?php echo $data['graduated']; ?></span></p>
	      <p><span>学历：</span><span><?php echo $data['education']; ?></span></p>
      </div> 

    <a target="_parent" href="<?php echo url('register/editRegister'); ?>" class="layui-btn sever" >修改</a>
        </div>

	    <div class="layui-col-md9">
        <p style="font-size:24px;">自我评价</p>
        <p style="font-size:16px;margin-top:15px;"><?php echo $data['selfevaluation']; ?></p>
        <p class="sever" style="font-size:24px;">工作经历</p>
        <p style="font-size:16px;margin-top:15px;"><?php echo $data['experience']; ?></p>
 

        </div>
    </div>
    
    
    
  <!--   <div style="width:200px;height:200px;border-radius: 50%;">
        <img  class="change"  src="<?php echo isset($data['avastar'])?$data['avastar']: '/static/images/avastar.png'; ?>" style="width:200px;height:200px;border-radius:50%;object-fit:cover;">
    </div>

  <div  style="margin-top:30px;text-align:center;line-height:1.75;">



  </div> -->


<?php else: ?>

    <p>你还没有详细的信息，<a  target="_parent" href="<?php echo url('register/userRegister'); ?>">马上去填写</a></p>
    <?php endif; ?>




</div>

<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script>
    window.onload=function(){

    }

    layui.use('upload', function(){
        var form = layui.form;
        var upload = layui.upload
        upload.render({
			   elem: '.change',
			  url: "<?php echo url('imgUpload'); ?>",
			  field:"image",
	         before: function(obj){ 
					layer.load(2); 
		      }
			  ,done: function(res, index, upload){	
				  layer.closeAll("loading")
			    if(res.code == 0){
	            history.go(0)		
			    }			    
			  }
			}); 
        
        
        

    });
</script>

</body>
</html>