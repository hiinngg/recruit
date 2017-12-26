<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\wamp6\wamp64\www\recruit\public/../application/index\view\user\info.html";i:1514298999;}*/ ?>
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
    <?php if(isset($data)): ?>
    <div style="width:200px;height:200px;border-radius: 50%;">
        <img src="<?php echo isset($user['avastar'])?$user['avastar']:'/static/images/avastar.png'; ?>" style="widht:100%;height:100%;object-fit:cover;">
    </div>

  <div  style="margin-top:30px;text-align:center;line-height:1.75;">

      <p><span>姓名：</span><span>11</span></p>
      <p><span>性别：</span><span><?php echo $data['sex']; ?></span></p>
      <p><span>出生日期：</span><span><?php echo $data['birthdate']; ?></span></p>
      <p><span>目标职位：</span><span><?php echo $data['position']; ?></span></p>
      <p><span>毕业院校：</span><span><?php echo $data['graduated']; ?></span></p>
      <p><span>学历：</span><span><?php echo $data['education']; ?></span></p>
      <p><span>自我评价：</span><span><?php echo $data['selfevaluation']; ?></span></p>
      <p><span>工作经历：</span><span><?php echo $data['experience']; ?></span></p>
       <a target="_parent" href="<?php echo url('register/editRegister'); ?>" class="layui-btn" style="margin-top:30px;">修改</a>
  </div>


<?php else: ?>

    <p>你还没有详细的信息，<a  target="_parent" href="<?php echo url('register/userRegister'); ?>">马上去填写</a></p>
    <?php endif; ?>




</div>

<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script>
    window.onload=function(){

    }

    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>

</body>
</html>