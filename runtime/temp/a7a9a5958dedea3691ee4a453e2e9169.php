<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\user\info.html";i:1514355687;}*/ ?>
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
</style>

<body style="overflow-y:scroll;">

<div class="layui-container"  style="display:flex;flex-direction: column ;justify-content:center;align-items: center;">

    <div style="width:200px;height:200px;border-radius: 50%;">
        <img  class="change"  src="<?php echo $data['avastar']==''?'/static/images/avastar.png' : $data['avastar']; ?>" style="width:200px;height:200px;border-radius:50%;object-fit:cover;">
    </div>

  <div  style="margin-top:30px;text-align:center;line-height:1.75;">

      <p><span>姓名：</span><span><?php echo $data['truename']; ?></span></p>
      <p><span>性别：</span><span><?php echo $data['sex']; ?></span></p>
      <p><span>出生日期：</span><span><?php echo $data['birthdate']; ?></span></p>
      <p><span>目标职位：</span><span><?php echo $data['position']; ?></span></p>
      <p><span>毕业院校：</span><span><?php echo $data['graduated']; ?></span></p>
      <p><span>学历：</span><span><?php echo $data['education']; ?></span></p>
      <p><span>自我评价：</span><span><?php echo $data['selfevaluation']; ?></span></p>
      <p><span>工作经历：</span><span><?php echo $data['experience']; ?></span></p>
 
  </div>







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