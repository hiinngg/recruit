<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\team\editTeam.html";i:1513905258;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>团队定制</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<body style="overflow:scroll;">

	<form class="layui-form" action=""  style="width:70%;">
	
	
 <div class="layui-form-item layui-form-text">
    <div class="layui-input-block" style="margin-left:130px;">
      <p style="text-align:center;margin:15px;">团队定制说明</p>
      <textarea rows="6" name="desc" lay-verify="required" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
  </div>
  
 <div class="layui-form-item layui-form-text">
    <div class="layui-input-block"  style="margin-left:130px;">
    <p style="text-align:center;margin:15px;">团队定制预期效果</p>
      <textarea name="detail"   rows="6" lay-verify="required" placeholder="请输入内容" class="layui-textarea"></textarea>
    </div>
  </div>
  
  
  <div class="layui-form-item">
    <div class="layui-input-block" style="margin-left:130px;">
      <button class="layui-btn" lay-submit lay-filter="addTeam">立即发布</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>
    
	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>
	layui.use('form', function(){
		  var form = layui.form;
		  
		  
		  <?php if(isset($data)): ?>
		  var desc="<?php echo $data['desc']; ?>";
		  var result="<?php echo $data['result']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  result=result.replace(reg,"\n")
		  $("textarea[name='desc']").text(desc)
		  $("textarea[name='detail']").text(result)
           form.render()
		  <?php endif; ?>
		  
		  
		  //监听提交
		  form.on('submit(addTeam)', function(data){
			  data.field['desc']=data.field['desc'].replace(/\n|\r\n/g,"<br>");
			  data.field['detail']=data.field['detail'].replace(/\n|\r\n/g,"<br>");
			  
			  var url="<?php echo url('addTeam'); ?>";
			  var data={data:data.field};
			  <?php if(isset($data)): ?>
			  url="<?php echo url('teamEdit'); ?>"
			  data['teamid']="<?php echo $data['teamid']; ?>"
			  <?php endif; ?>
			  
			  
			  $.ajax({
			    	url:url,
			    	beforeSend:function(){
			    		layer.load(2)
			    	},
			    	data:data,
			    	type:"post",
			    	success:function(data){
			    		if(data==1){
			    			layer.msg("保存成功")
			    			setTimeout(function(){
			    				history.go(0)
			    			},500)
			    		}
			    	},
			    	complete:function(){
			    		layer.closeAll("loading")
			    	}
			    	
			  });
			  return false;
		
		  });
			  
		});
	</script>

</body>
</html>