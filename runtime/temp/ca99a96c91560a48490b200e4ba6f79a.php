<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\job\editjob.html";i:1514704070;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>新增工作定制</title>
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
    <label class="layui-form-label">企业名称</label>
    <div class="layui-input-block">
      <input type="text" name="cname" required  lay-verify="required" placeholder="请输入企业名称" autocomplete="off" class="layui-input" value="<?php echo isset($data['cname'])?$data['cname']: ''; ?>">
    </div>
  </div>
<div class="layui-form-item">
    <label class="layui-form-label">岗位名称</label>
    <div class="layui-input-block">
      <input type="text" name="name" required  lay-verify="required" placeholder="请输入岗位名称" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">地点</label>
    <div class="layui-input-block">
      <input type="text" name="location" required  lay-verify="required" placeholder="请输入工作地点" autocomplete="off" class="layui-input" value="<?php echo isset($data['location'])?$data['location']:''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">职责</label>
    <div class="layui-input-block">
      <textarea name="desc" rows="4" placeholder="请填写岗位职责" class="layui-textarea" value=""></textarea>
    </div>
  </div>

  <div class="label_img layui-form-item">
    <label class="layui-form-label">企业图片</label>
 	<button type="button" class="layui-btn " id="cover">
 	<input type="text"  hidden name="pic" value="<?php echo isset($data['pic'])?$data['pic']:''; ?>" />
	<i class="layui-icon">&#xe67c;</i>上传
	</button>
	<div class="img" style="margin:15px 0 0 110px;position:relative;">
	<?php if(isset($data)): ?>
         <img  src="<?php echo isset($data['pic'])?$data['pic']:''; ?>" width='200px' height='100px' style="object-fit:cover;">	
    <?php endif; ?>			   
	</div>	
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
		  
		  <?php if(isset($data)): ?>
		  $("select[name='cates']").val("<?php echo $data['cateid']; ?>").change();
		  $("select[name='type']").val("<?php echo $data['type']; ?>").change();
		  linkStatus("<?php echo $data['type']; ?>")
		  
		  var desc="<?php echo $data['desc']; ?>";
		  var menu="<?php echo $data['menu']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  menu=menu.replace(reg,"\n");
		  $("textarea[name='desc']").text(desc)
		  $("textarea[name='menu']").text(menu)
		  
		  form.render()
		  <?php endif; ?>



		  //监听提交
		  form.on('submit(formDemo)', function(data){
	 		if(data.field.pic==""){
				layer.msg("请企业图片",{icon:5,shift:6})
				return false;
			} 
	
	    data.field['desc']=data.field['desc'].replace(/\n|\r\n/g,"<br>");
	    
	     var url="<?php echo url('addJob'); ?>";
	     var data={data:data.field}
		     <?php if(isset($data)): ?>
	     url="<?php echo url('editCourse'); ?>"
		     data['courseid']="<?php echo $data['courseid']; ?>"
		     <?php endif; ?>
		    $.ajax({
		    	url:url,
		    	data:data,
		    	type:"POST",
		    	beforeSend:function(){
		    	 layer.load(2, {shade: false});
		    	},
		    	success:function(data){
		    		layer.closeAll('loading')
		    		if(data==1){
		    			layer.msg("保存成功",{ time: 700 },function(){
		    			  history.go(0)
		    			})
		    		}
		    	},
           complete:function(){
                layer.closeAll("loading")
            }
		    }) 
		    return false;
		  });
		  		  
		  upload.render({
			   elem: '#cover'
			  ,url: "<?php echo url('imgUpload'); ?>",
			  field:"image"
			  ,done: function(res, index, upload){			  
			    if(res.code == 0){		
			     $("input[name='pic']").val(res.src.replace(/\\/g,'/'))
			     if($(".img").children("img").length>0){
			    	 $(".img").children("img").attr("src",res.src.replace(/\\/g,'/'))
			     }else{
			    	 $(".img").append('<img   style="object-fit:cover;"  width="200px" height="100px"  src="'+res.src.replace(/\\/g,'/')+'"  />')
			     }
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