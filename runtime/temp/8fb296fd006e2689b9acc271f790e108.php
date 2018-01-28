<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\position\positionpreview.html";i:1517032849;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>职位预览</title>
    <link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style>
 .sever{
     margin-top:30px;

 }


</style>
<body>
<div class="layui-container">
<p class="sever">公司名：<?php echo $data['cname']; ?></p>
<p class="sever">职位名：<?php echo $data['name']; ?></p>
<p class="sever">招聘人数：<?php echo $data['number']; ?></p>
<p class="sever">薪酬：<?php echo $data['salary']; ?></p>
<p class="sever">工作描述：</p>
    <p><?php echo $data['desc']; ?></p>
<p class="sever">待遇：
<?php if(is_array($data['treatment']) || $data['treatment'] instanceof \think\Collection || $data['treatment'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['treatment'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

  <span><?php echo $vo; ?></span>

    <?php endforeach; endif; else: echo "" ;endif; ?>
</p>


</div>


<script src="/admin/layui/layui.js"></script>
</body>
</html>