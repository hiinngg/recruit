<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\user\addeval.html";i:1514360359;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>新增课程</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style>
.label_img{
	object-fit:cover;
	width:100%;
	height:100%;
}
.hide{
	display:none;
}
.disable label,.disable input{
	color:#c2c2c2;
   cursor:not-allowed;
}
</style>

<body style="overflow:scroll;">

	<form class="layui-form" action=""  style="width:70%;">
  <div class="layui-form-item">
    <label class="layui-form-label">报告标题</label>
    <div class="layui-input-block">
      <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" >
    </div>
  </div>

  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">报告说明</label>
    <div class="layui-input-block">
      <textarea name="desc" rows="4" placeholder="请填写说明" class="layui-textarea" ></textarea>
    </div>
  </div>

  
  <div class="label_img layui-form-item">
    <label class="layui-form-label">评测报告</label>
 	<button type="button" class="layui-btn " id="cover">
 	<input type="text"  hidden name="eval"  />
	<i class="layui-icon">&#xe67c;</i>上传
	</button>
   <p class=" status" style="margin-left:110px;margin-top:15px;"></p>
  </div>



  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即发布</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>
    
    <!-- 实例化编辑器 -->
	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>

	layui.use(['form','upload','layer'], function(){
		  var form   = layui.form;
		  var upload = layui.upload;
		  var layer  = layui.layer;
		 

		  //监听提交
		  form.on('submit(formDemo)', function(data){
	 		if(data.field.eval==""){
				layer.msg("请上传报告",{icon:5,shift:6})
				return false;
			} 
/* 	    data.field['desc']=data.field['desc'].replace(/\n|\r\n/g,"<br>");
	    data.field['menu']=data.field['menu'].replace(/\n|\r\n/g,"<br>"); */
	    
	     var url="<?php echo url('addeval'); ?>";
	     var data={data:data.field,userid:"<?php echo \think\Request::instance()->get('userid'); ?>"}
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
		    			layer.msg("保存成功",{ time: 700 },function(){
		    			  history.go(0)
		    			})
		    		}
		    	}		    
		    }) 
		    return false;
		  });
		  		  
		  upload.render({
			   elem: '#cover'
			  ,url: "<?php echo url('fileUpload'); ?>",
			  field:"file",
			  accept:"file"
			  ,done: function(res, index, upload){			  
			    if(res.code == 0){		
			     $("input[name='eval']").val(res.file.replace(/\\/g,'/'))
			     $("p.status").text("报告已上传");
			    }			    
			    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
			    var item = this.item;
			    
			    //文件保存失败
			    //do something
			  }
			});      
			   
		  
		  
		});
	
	function linkStatus(val){
		
		if(val != 0){
		     $(".link").removeClass("disable")
		     $(".link").find("input").prop("disabled",false)
		     $(".link").find("input").attr("lay-verify","required")
		}else{
			 $(".link").find("input").val("")
			 $(".link").addClass("disable")
			 $(".link").find("input").prop("disabled",true)
		     $(".link").find("input").removeAttr("lay-verify")
		}
		
	}
	
	</script>

</body>
</html>