<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\company\companypreview.html";i:1516778130;}*/ ?>
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

<p style="text-align:center;font-size:18px;line-height:2;"><span >企业全称：</span><?php echo (isset($data['fullname']) && ($data['fullname'] !== '')?$data['fullname']:"（未填）"); ?></p>
<!-- <p class="sever" style="text-align:center;"><button class="layui-btn" >修改资料</button></p> -->
<p class="sever" style="text-align:center;font-size:18px;line-height:2;">企业logo</p>
<?php if($data['avastar'] != ''): ?>
<img src="<?php echo $data['avastar']; ?>" alt="" style="width:128px; height:64px;margin:0 auto;text-align:center;display:block;" />
<?php else: ?>
<p style="text-align:center;">（未填）</p>
<?php endif; ?>



<p class="sever" style="text-align:center;font-size:18px;line-height:2;">办公室环境照片</p>

<div class="row-center" >

<?php if(isset($data['pics'])): if(is_array($data['pics']) || $data['pics'] instanceof \think\Collection || $data['pics'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['pics'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

<div style="margin-right:15px; width:300px;height:150px;position:relative;" class="text-center companyimg" id="image1">
<img src="<?php echo $vo; ?>" alt="" style="width:100%;height:100%;object-fit:center;background:#ccc;" />
</div>

<?php endforeach; endif; else: echo "" ;endif; else: ?>
<p style="text-align:center;">（未填）</p>
<?php endif; ?>


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