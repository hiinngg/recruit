<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\wamp6\wamp64\www\recruit\public/../application/admin\view\course\courseset.html";i:1513862297;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>内容编辑</title>
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
.sever{
	margin-top:30px;
	
}
</style>
<body style="overflow:scroll;">

<form  class="layui-form hide" action="">
<div class="layui-form-item">
    <div class="layui-input-block"  style="margin-left:0;">
      <select name="type" lay-verify="required"   lay-filter="type">
        <option value=""></option>
      <?php if(is_array($courselist) || $courselist instanceof \think\Collection || $courselist instanceof \think\Paginator): $i = 0; $__LIST__ = $courselist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>
          <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>
          <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>
          <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>
          <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>
          <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>
          <option value="<?php echo $vo['courseid']; ?>"><?php echo $vo['name']; ?></option>


      <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div> 
   
</form>

<div class="sever"><button class="layui-btn">选择课程</button></div>
<hr />
<div class="sever"><button class="layui-btn">选择课程</button></div>
<hr />
<div class="sever"><button class="layui-btn">选择课程</button></div>
<hr />
<div class="sever"><button class="layui-btn">选择课程</button></div>

<button class="sever layui-btn layui-btn-normal">保存</button>

    <!-- 实例化编辑器 -->
	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>

	layui.use(['form','upload','layer'], function(){
		  var form   = layui.form;
		  var upload = layui.upload;
		  var layer  = layui.layer;
		  $(".sever button").on("click",function(){
			  
			  layer.open({
				  type: 1,
				  shade: false,
				  title: false, //不显示标题
				  content: $('.layui-form'), //捕获的元素，注意：最好该指定的元素要存放在body最外层，否则可能被其它的相对元素所影响
				  area: ['500px', '300px']
				});
			  
		  })




		  
		  
		  
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

	     var url="<?php echo url('editArticle'); ?>";
	     var data={data:data.field}
	     data['txt']=ue.getContentTxt();
		     <?php if(isset($data)): ?>
		     data['postid']="<?php echo $data['postid']; ?>"
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
			     $("input[name='label_img']").val('/temp/'+res.src.replace(/\\/g,'/'))
			     if($(".img").children("img").length>0){
			    	 $(".img").children("img").attr("src",'/temp/'+res.src.replace(/\\/g,'/'))
			     }else{
			    	 $(".img").append('<img   style="object-fit:cover;"  width="200px" height="100px"  src="/temp/'+res.src.replace(/\\/g,'/')+'"  />')
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