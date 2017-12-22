<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\info\index.html";i:1513905257;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>站点信息</title>
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
</style>

<body style="overflow:scroll;">

	<form class="layui-form" action=""  style="width:70%;">
  <div class="layui-form-item">
    <label class="layui-form-label">宣传口号</label>
    <div class="layui-input-block">
      <input type="text" name="catchword" required  lay-verify="required" placeholder="请输入宣传口号" autocomplete="off" class="layui-input" value="<?php echo isset($data['catchword'])?$data['catchword']: ''; ?>">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">视频链接</label>
    <div class="layui-input-block">
      <input type="text" name="link" required  lay-verify="required" placeholder="请输入视频链接" autocomplete="off" class="layui-input" value="<?php echo isset($data['link'])?$data['link']: ''; ?>">
    </div>
  </div>
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">描述</label>
    <div class="layui-input-block">
      <textarea name="desc" placeholder="请输入内容" class="layui-textarea" value=""><?php echo isset($data['desc'])?$data['desc']: ''; ?></textarea>
    </div>
  </div>
<!--   <div class="layui-form-item">
    <label class="layui-form-label">选择栏目</label>
    <div class="layui-input-block">
      <select name="cate" lay-verify="required">
        <option value=""></option>
        <option value="0">北京</option>
        <option value="1">上海</option>
        <option value="2">广州</option>
        <option value="3">深圳</option>
        <option value="4">杭州</option>
      </select>
    </div>
  </div> -->
  
  <div class="label_img layui-form-item">
    <label class="layui-form-label">二维码</label>
 	<button type="button" class="layui-btn " id="cover">
 	<input type="text"  hidden name="label_img" value="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" />
	<i class="layui-icon">&#xe67c;</i>上传
	</button>


	<div class="img" style="margin:15px 0 0 110px;position:relative;">
	<?php if(isset($data)): ?>
         <img  src="<?php echo isset($data['label_img'])?$data['label_img']:''; ?>" style="object-fit:cover;">	
    <?php endif; ?>			   
	</div>	

	
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo">保存</button>
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
	layui.use(['form','upload','layer'], function(){
		  var form   = layui.form;
		  var upload = layui.upload;
		  var layer  = layui.layer;
		  
		  
		  <?php if(isset($data)): ?>
		  
		  var desc="<?php echo $data['desc']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  desc=desc.replace(reg,"\n");
		  $("textarea[name='desc']").text(desc)
		  
		  form.render()
		  <?php endif; ?>
		  
		  //监听提交
		  form.on('submit(formDemo)', function(data){
	 		if(data.field.label_img==""){
				layer.msg("请上传二维码",{icon:5,shift:6})
				return false;
			}
	 		
		data.field['desc']=data.field['desc'].replace(/\n|\r\n/g,"<br>");
		
	     var url="<?php echo url('addInfo'); ?>";
	     var data={data:data.field}
		     <?php if(isset($data)): ?>
	         url="<?php echo url('editInfo'); ?>";
		     data['pageid']="<?php echo $pageid; ?>"
		     <?php endif; ?>
		    /* layer.msg(JSON.stringify(data.field)); */
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
			    	 $(".img").append('<img   style="object-fit:cover;"    src="'+res.src.replace(/\\/g,'/')+'"  />')
			     }
			    }			    
			    //获取当前触发上传的元素，一般用于 elem 绑定 class 的情况，注意：此乃 layui 2.1.0 新增
			    var item = this.item;
			    
			    //文件保存失败
			    //do something
			  }
			});      
			   
		  
		  
		});
	</script>

</body>
</html>