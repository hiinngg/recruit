<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\course\editcourse.html";i:1514338057;}*/ ?>
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
    <label class="layui-form-label">课程名称</label>
    <div class="layui-input-block">
      <input type="text" name="name" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']: ''; ?>">
    </div>
  </div>
<div class="layui-form-item">
    <label class="layui-form-label">课程价格</label>
    <div class="layui-input-block">
      <input type="number" name="price" required  lay-verify="required" placeholder="请输入课程价格" autocomplete="off" class="layui-input" value="<?php echo isset($data['price'])?$data['price']:''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">课程学时</label>
    <div class="layui-input-block">
      <input type="text" name="period" required  lay-verify="required" placeholder="请输入课程学时" autocomplete="off" class="layui-input" value="<?php echo isset($data['price'])?$data['price']:''; ?>">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">课程分类</label>
    <div class="layui-input-block">
      <select name="cates" lay-verify="required"   lay-filter="type">
        <option value=""></option>
        <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
           <option value="<?php echo $vo['cateid']; ?>"><?php echo $vo['name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>

   <div class="layui-form-item">
    <label class="layui-form-label">授课形式</label>
    <div class="layui-input-block">
      <select name="type" lay-verify="required"   lay-filter="type">
        <option value=""></option>
        <option value="2">微信授课</option>
        <option value="1">直播授课</option>
        <option value="0">线下授课</option>
      </select>
    </div>
  </div> 
   
  
    <div class="layui-form-item  link disable">
    <label class="layui-form-label">课程链接</label>
    <div class="layui-input-block">
      <input   disabled type="text" name="link"  placeholder="如需要请加入课程链接（以'http://'或'https://'开头）" autocomplete="off" class="layui-input" value="<?php echo isset($data['link'])?$data['link']: ''; ?>">
    </div>
  </div>
  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">课程简介</label>
    <div class="layui-input-block">
      <textarea name="desc" rows="4" placeholder="请填写课程简介" class="layui-textarea" value=""></textarea>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">导师</label>
    <div class="layui-input-block">
      <input type="text" name="teacher" required  lay-verify="required" placeholder="请输入导师名" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']: ''; ?>">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">手机号码</label>
    <div class="layui-input-block">
      <input type="text" name="tel" required  lay-verify="required" placeholder="请输入手机号码" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']: ''; ?>">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">目录</label>
    <div class="layui-input-block">
      <textarea name="menu" rows="8" placeholder="请输入目录" class="layui-textarea" value=""></textarea>
    </div>
  </div>
  
  <div class="label_img layui-form-item">
    <label class="layui-form-label">封面</label>
 	<button type="button" class="layui-btn " id="cover">
 	<input type="text"  hidden name="label_img" value="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" />
	<i class="layui-icon">&#xe67c;</i>上传
	</button>
	<div class="img" style="margin:15px 0 0 110px;position:relative;">
	<?php if(isset($data)): ?>
         <img  src="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" width='200px' height='100px' style="object-fit:cover;">	
    <?php endif; ?>			   
	</div>	
  </div>



<div style="margin-bottom:30px;display:flex;margin-left:63px;">
  <p style="margin-right:15px;">内容</p>
  <script id="container" name="content" type="text/plain">  
  <?php echo isset($data['content'])?$data['content']:''; ?>
  </script>
</div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即发布</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>
    
    <script type="text/javascript" src="/admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/admin/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>
	 var ue = UE.getEditor('container',{
		 initialFrameWidth :1000,
		 initialFrameHeight :300,
		 zIndex:300	,
		 pasteplain:true
	 });
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

		  form.on('select(type)', function(data){
		    linkStatus(data.value)
			});  

		  //监听提交
		  form.on('submit(formDemo)', function(data){
	 		if(data.field.label_img==""){
				layer.msg("请上传封面",{icon:5,shift:6})
				return false;
			} 
			if(ue.getContent()==""){
				layer.msg("请编辑内容",{icon:5,shift:6})
				return false;
			}
	    data.field['desc']=data.field['desc'].replace(/\n|\r\n/g,"<br>");
	    data.field['menu']=data.field['menu'].replace(/\n|\r\n/g,"<br>");
	    
	     var url="<?php echo url('addCourse'); ?>";
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
			  ,url: "<?php echo url('imgUpload'); ?>",
			  field:"image"
			  ,done: function(res, index, upload){			  
			    if(res.code == 0){		
			     $("input[name='label_img']").val(res.src.replace(/\\/g,'/'))
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