<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\user\myset.html";i:1514353600;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新闻管理</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style type="text/css">
.flex-row {
	display: flex;
	align-items: center;
}
</style>

<body  style="scroll-x:scroll;">
<p>修改密码</p>
	  <form action="" class="layui-form">
	  <div class="layui-form-item">
    <label class="layui-form-label">原密码</label>
    <div class="layui-input-block">
      <input type="password" name="oldpwd" required  lay-verify="required" placeholder="请输入原密码" autocomplete="off" class="layui-input" value="<?php echo isset($data['price'])?$data['price']:''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">新密码</label>
    <div class="layui-input-block">
      <input type="password" name="pwd" required  lay-verify="required" placeholder="请输入新密码" autocomplete="off" class="layui-input" value="<?php echo isset($data['price'])?$data['price']:''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">确认新密码</label>
    <div class="layui-input-block">
      <input type="password" name="pwd2" required  lay-verify="required" placeholder="请再次输入新密码" autocomplete="off" class="layui-input" value="<?php echo isset($data['price'])?$data['price']:''; ?>">
    </div>
  </div>
   <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">保存</button>

    </div>
  </div>
	  
	  </form>
    <script src="/admin/layui/layui.js"></script>
	<script type="text/javascript">
	
		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var form=layui.form;
			
			  form.on('submit(formDemo)', function(data){
				  if(data.field.pwd!=data.field.pwd2){
				    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
				    	 return false;
				     }	
	    
			     var url="<?php echo url('changePwd'); ?>";
			     var data={data:data.field}
	
				    $.ajax({
				    	url:url,
				    	data:data,
				    	type:"POST",
				    	beforeSend:function(){
				    	 layer.load(2, {shade: false});
				    	},
				    	success:function(data){
				    		layer.closeAll()
				    		if(data==1){
				    			layer.msg("保存成功,请重新登录",{ time: 700 },function(){
				    			 top.location.href="<?php echo url('index/index'); ?>"
				    			})
				    		}else{
				    			layer.msg(data)
				    		}
				    	}		    
				    }) 
				    return false;
				  });
				 
		});
	

	

		
		
	</script>


</body>

</html>