<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\index\profile.html";i:1513816780;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>企业资料</title>
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

<body style="overflow:scroll;">

<div class="layui-container">

<p style="text-align:center;font-size:18px;line-height:2;"><span >企业全称：</span><?php echo isset($data['fullname'])?$data['fullname']:""; ?></p>
<p style="text-align:center;font-size:18px;line-height:2;"><span >HR联系人：</span><?php echo isset($data['contact'])?$data['contact']:""; ?></p>
<!-- <p class="sever" style="text-align:center;"><button class="layui-btn" >修改资料</button></p> -->


<p class="sever" style="text-align:center;font-size:18px;line-height:2;">办公室环境照片</p>

<div class="sever row-center" style="margin-left:15px;">

<?php if(is_array($data['pics']) || $data['pics'] instanceof \think\Collection || $data['pics'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

<div style="border:1px solid #c2c2c2; width:300px;height:150px;position:relative;" class="text-center companyimg" id="image1">
<img src="<?php echo $vo; ?>" alt="" style="width:100%;height:100%;object-fit:center;background:#ccc;" />
</div>

<?php endforeach; endif; else: echo "" ;endif; ?>

</div>


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